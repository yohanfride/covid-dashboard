<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
        $this->load->model('gugustugas_m');
	}

    public function login() {
        if ($this->session->userdata('covid-admin')) {
            redirect(base_url());
        }
        $data['error'] = FALSE;
        $this->load->view('user_login_v',$data);
    }

    public function dologin() {
        $this->load->library('form_validation');
        $data['error'] = FALSE;
        //#1 Set Form Validation
        $this->form_validation->set_rules('username', 'Username', 'xss_clean|required|trim');
        $this->form_validation->set_rules('password', 'Password', 'xss_clean|required|trim');				        
        if ($this->form_validation->run($this) == FALSE) {
            //#2 Display Error Message
            $data['error'] = validation_errors();
        } else {
            $user = $this->input->post("username");
            $pass = $this->input->post('password');
            $role = $this->input->post('role');
            if($role == "administrator"){
                $respo = $this->admin_m->login($user, $pass);
            } else {
                $respo = $this->gugustugas_m->login($user, $pass);
            }
            if($respo->is_success){
				if($respo->data->active){										
				    $this->session->set_userdata('covid-admin',$respo->data);
                     $this->session->set_userdata('covid-admin-role',$role);                
                    redirect(base_url('dashboard'));
                } else {
					$data['error'] = "Your Account Is't Active";
				}				
            } else {
                if( $respo->data == 'your account is not active')
                    $data['error'] = "Akun anda tidak aktif, silahkan hubungi Administrator"; 
                else 
                    $data['error'] = "Username dan Password anda salah"; 
            }
        }
        $this->load->view('user_login_v', $data);
    }

    public function forgotpass() {
        $this->load->library('form_validation');
        $data['error'] = FALSE;
        $data['success'] = FALSE;
        if($this->input->post('save')){
            //#1 Set Form Validation        
            $this->form_validation->set_rules('email', 'Email', 'xss_clean|required|trim');               
            if ($this->form_validation->run($this) == FALSE) {
                //#2 Display Error Message
                $data['error'] = validation_errors();
            } else {
                $kode_random = $this->RandomString(5);
                $token = md5($this->RandomString(6));
                $email = $this->input->post('email');
                $role = $this->input->post('role');
                $data_src = array('email'=> $email);                                             
                             
                if($role=='administrator'){
                    $respo = $this->admin_m->search($data_src); 
                } else {
                    $respo = $this->gugustugas_m->search($data_src); 
                }  
                if(($respo->is_success) && $respo->data){                                       
                    $user_data = $respo->data[0];
                    $input=array(
                        'token' => $token
                    );
                    if($role=='administrator'){
                        $user_req = $this->admin_m->edit($user_data->_id,$input); 
                        $c = 'a';
                    } else {
                        $user_req = $this->gugustugas_m->edit($user_data->_id,$input);
                        $c = 'b'; 
                    } 
                                    
                    
                    if($user_req->is_success){
                        $email_code = str_replace("@", md5('@'), $user_data->email);
                        $data['success'] = true;                    
                        $data_email = "<strong>Untuk akun $user_data->username ,</strong> 

                                    <p>Gunakan link berikut untuk melakukan proses reset password anda.</p><br/>
                                    <p><a href=".base_url()."auth/resetpass/".$c."/".$email_code."/".$token.">".base_url()."auth/resetpass/".$c."/".$email_code."/".$token."</a></p>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <h4><span style='margin: 0;'>Hormat Kami, </span></h4>
                                    <div><span style='margin: 0;'>Administrator - Covid-19 Kabupaten Sampang</span></div>
                                    <br/>
                                    .
                                    ";
                        $config=$this->_mail_win();
                        $this->load->library('email', $config);
                        $this->email->set_newline("\r\n");
                        $this->email->from($this->config->item('email_from'), 'No-reply Email');
                        $this->email->to(preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$this->input->post('email')));              
                        $this->email->subject('Reset Password');
                        $this->email->message($data_email);             
                        $send = $this->email->send();     
                    }
                    
                }else{
                    $data['error'] = "Try again : Email not Exists";
                }
            }            
        }
        $this->load->view('user_forgotpass_v', $data);
    }

    public function resetpass($role, $email='', $token=''){                    
        $data['success'] = false;
        $data['error'] =  false;        
        $data['success2'] = false; 
        $email = str_replace( md5('@'),"@", $email);
        $data['email'] = $email;
        $data['token'] = $token;
        if(($email) && ($token)){             
            $data_src = array('email'=> $email, 'token'=>$token); 
            if($role=='a'){
                $respo = $this->admin_m->search($data_src);                        
            } else {
                $respo = $this->gugustugas_m->search($data_src);
            }                                
            if($respo->data){
                $data['success'] = true;                
            }else{
                $data['error'] = "Your Activation Link is Wrong";
            }
        } else {
            $data['error'] = "Your Activation Link was Wrong";
        }        
        if($this->input->post('save')){            
            $this->load->library('form_validation');            
            $this->form_validation->set_rules('password', 'New Password', 'required|matches[passconf]|min_length[6]');
            $this->form_validation->set_rules('passconf', 'Confirmation password', 'required');
            if ($this->form_validation->run() == FALSE){
                $data['error'] = validation_errors();
            }
            else{
                $input=array(
                    'pass' => $this->input->post('password'),                    
                );              
                if($role=='a'){
                    $updates = $this->admin_m->resetpass($respo->data[0]->_id,$input);  
                } else {
                    $updates = $this->gugustugas_m->resetpass($respo->data[0]->_id,$input); 
                }            
                if($updates->is_success){             
                    $data['success2']=$updates->data;                  
                } else {                
                    $data['error']=$updates->data;
                }                       
            }
        }        
        $this->load->view('user_resetpass_v', $data);
    }

    
    function RandomString($j){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $j; $i++) {           
            $randstring.= $characters[rand(0, strlen($characters)-1)];          
        }
        return $randstring;
    }


    public function logout(){		
    	 $this->session->set_userdata('covid-admin');
         $this->session->set_userdata('covid-admin-role');
		 redirect(base_url('auth/login'));
    }
   

    function _mail_win()
    {
        $config = Array(
            'protocol' => $this->config->item('protocol'),
            'smtp_host' => $this->config->item('smtp_host'),
            'smtp_port' => $this->config->item('smtp_port'),
            'smtp_user' => $this->config->item('smtp_user'),
            'smtp_pass' => $this->config->item('smtp_pass'),
            'mailtype' => $this->config->item('mailtype'),
            'charset' => $this->config->item('charset'),
            'smtp_crypto' => $this->config->item('smtp_crypto')
        );
        return $config;
    }

    function _mail_unix()
    {
        $config = array(
            'mailtype' => $this->config->item('mailtype'),
            'charset' => $this->config->item('charset')
        );
        return $config;
    }


    // public function register() {
    //     $this->load->library('form_validation');
    //     $data['error'] = FALSE;
    //     $data['success'] = FALSE;
    //     //#1 Set Form Validation
    //     $this->form_validation->set_rules('username', 'Username', 'xss_clean|required|trim');
    //     $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|min_length[6]');
    //     $this->form_validation->set_rules('passconf', 'Confirmation password', 'required');               
    //     $this->form_validation->set_rules('email', 'Email', 'xss_clean|required|trim');               
    //     $this->form_validation->set_rules('role', 'Role', 'xss_clean|required|trim');
    //     if ($this->form_validation->run($this) == FALSE) {
    //         //#2 Display Error Message
    //         $data['error'] = validation_errors();
    //     } else {
    //         $user = $this->input->post("username");
    //         $pass = $this->input->post('password');
    //         $email = $this->input->post('email');
    //         $role = $this->input->post('role');
    //         $kode_random = $this->RandomString(5);            
    //         $token = md5($this->RandomString(6));
    //         $test = true;
    //         if($role == 'Athlete'){
    //             $code = $this->input->post('code'); 
    //             $check = $this->auth_m->search(array('coach_code'=>$code))->data;                
    //             if(empty($check->_id)){
    //                 $test = false;
    //             }    
    //         }
    //         if(!$test){
    //             $data['error'] = "Try again : Coach Code Wrong";
    //         } else {
    //             $respo = $this->auth_m->register($user, $pass, $email,$role,$token,$code);
    //             if($respo->is_success){       
    //                 $data['success']  = true;                        
    //             } else if($respo->description == 'email is exists'){
    //                 $data['error'] = "Email are Exists";
    //             } else if($respo->description == 'username is exists'){
    //                 $data['error'] = "Username are Exists";
    //             }else{
    //                 $data['error'] = "Try again : Email and Username Exists";
    //             }
    //         }
    //     }        
    //     $this->load->view('user_regis_v', $data);
    // }


}

/* End of file  */
/* Location: ./application/controllers/ */
