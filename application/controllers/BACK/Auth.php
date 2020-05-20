<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_m');
        $this->load->model('user_m');
	}

    public function login() {
        if ($this->session->userdata('smap_admin')) {
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
            $respo = $this->auth_m->login($user, $pass);                                 
            if($respo->is_success){
				if($respo->data->status){										
				    $this->session->set_userdata('smap_admin',$respo->data);                
                    redirect(base_url('dashboard'));
                } else {
					$data['error'] = "Your Account Is't Active";
				}				
            }
            else{
                $data['error'] = "Check your Username & Password";
            }
        }
        $this->load->view('user_login_v', $data);
    }
    
    public function register() {
        $this->load->library('form_validation');
        $data['error'] = FALSE;
        $data['success'] = FALSE;
        //#1 Set Form Validation
        $this->form_validation->set_rules('username', 'Username', 'xss_clean|required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Confirmation password', 'required');               
        $this->form_validation->set_rules('email', 'Email', 'xss_clean|required|trim');               
        $this->form_validation->set_rules('role', 'Role', 'xss_clean|required|trim');
        if ($this->form_validation->run($this) == FALSE) {
            //#2 Display Error Message
            $data['error'] = validation_errors();
        } else {
            $user = $this->input->post("username");
            $pass = $this->input->post('password');
            $email = $this->input->post('email');
            $role = $this->input->post('role');
            $kode_random = $this->RandomString(5);            
            $token = md5($this->RandomString(6));
            $test = true;
            if($role == 'Athlete'){
                $code = $this->input->post('code'); 
                $check = $this->auth_m->search(array('coach_code'=>$code))->data;                
                if(empty($check->_id)){
                    $test = false;
                }    
            }
            if(!$test){
                $data['error'] = "Try again : Coach Code Wrong";
            } else {
                $respo = $this->auth_m->register($user, $pass, $email,$role,$token,$code);
                if($respo->is_success){       
                    $data['success']  = true;                        
                } else if($respo->description == 'email is exists'){
                    $data['error'] = "Email are Exists";
                } else if($respo->description == 'username is exists'){
                    $data['error'] = "Username are Exists";
                }else{
                    $data['error'] = "Try again : Email and Username Exists";
                }
            }
        }        
        $this->load->view('user_regis_v', $data);
    }



    public function forgotpass() {
        $this->load->library('form_validation');
        $data['error'] = FALSE;
        $data['success'] = FALSE;
        //#1 Set Form Validation        
        $this->form_validation->set_rules('email', 'Email', 'xss_clean|required|trim');               
        if ($this->form_validation->run($this) == FALSE) {
            //#2 Display Error Message
            $data['error'] = validation_errors();
        } else {
            $kode_random = $this->RandomString(5);
            $token = md5($this->RandomString(6));
            $email = $this->input->post('email');
            $data_src = array('email'=> $email);                                             
            $respo = $this->auth_m->search($data_src);                        
            if(($respo->is_success) && $respo->data){                                       
                $user_data = $respo->data;
                $input=array(
                    'token' => $token
                );
                $user_req = $this->user_m->edit($user_data->_id,$input);                
                if($user_req->is_success){
                    $email_code = str_replace("@", md5('@'), $user_data->email);
                    $data['success'] = true;                    
                    $data_email = "<strong>Dear $user_data->username ,</strong> 

                                <p>Thanks for you to still use SMAP, to complete your reset password process, please follow this link activation :  </p><br/>
                                <p><a href=".base_url()."auth/resetpass/".$email_code."/".$token.">".base_url()."auth/resetpass/".$email_code."/".$token."</a></p>
                                <br/>
                                <br/>
                                <br/>
                                <h4><span style='margin: 0;'>Sinceraly, </span></h4>
                                <div><span style='margin: 0;'>Smart Monitoring Athlete Platform</span></div>
                                <div><span style='margin: 0;'>- Monitor your Athlete Easly -</span></div>
                                <br/>
                                .
                                ";
                    $config=$this->_mail_win();
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($this->config->item('email_from'), 'No-reply SEMAR Extension Cloud Platform');
                    $this->email->to(preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$this->input->post('email')));              
                    $this->email->subject('Reset Password SMAP');
                    $this->email->message($data_email);             
                    $send = $this->email->send();     
                }
                
            }else{
                $data['error'] = "Try again : Email not Exists";
            }
        }            
        $this->load->view('user_forgotpass_v', $data);
    }

    /*public function activation($email='', $token=''){                
        $email = str_replace(md5('@'),"@", $email);
        if(($email) && ($token)){ 
            $respo = $this->auth_m->activation($email,$token);                        
            if($respo->is_success){
                $data = array('email'=> $email, 'token'=>$token);                                 
                $user_req = $this->auth_m->search($data);                        
                if($user_req->is_success){                     
                    $this->session->set_userdata('smap_admin',$user_req->data);
                    redirect(base_url('dashboard'));                
                }               
            }else{
                $data['error'] = "Your Activation Link is Wrong";
            }
        } else {
            $data['error'] = "Your Activation Link is Wrong";
        }
        $this->load->view('user_activation_v', $data);
    }*/

    public function resetpass($email='', $token=''){                    
        $data['success'] = false;
        $data['error'] =  false;        
        $data['success2'] = false; 
        $email = str_replace( md5('@'),"@", $email);
        $data['email'] = $email;
        $data['token'] = $token;
        if(($email) && ($token)){             
            $data_src = array('email'=> $email, 'token'=>$token);                                 
            $respo = $this->auth_m->search($data_src);                        
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
                
                $updates = $this->user_m->resetpass($respo->data->_id,$input);              
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
    	 $this->session->set_userdata('smap_admin');
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


}

/* End of file  */
/* Location: ./application/controllers/ */
