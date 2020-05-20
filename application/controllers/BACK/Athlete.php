<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Athlete extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('auth_m');
		$this->load->model('kuisoner_m');
        $this->load->model('kontenk_m');
        $this->load->model('schedule_m');
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
	}	
	
    public function index()
	{        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='athlete has been change';	
		if($this->input->get('alert')=='failed') $data['error']="athlete change process was failed";	
		$data['title']='Athlete Management';		
        $data['user_now'] = $this->session->userdata('smap_admin');             
        if($data['user_now']->role == 'Coach'){
		  $data['data'] = $this->user_m->getathlete_coach($data['user_now']->coach_code)->data;				
        } else {
          $data['data'] = $this->user_m->getathlete()->data;                  
        }
		
		$this->load->view('athlete_manage_v', $data);
	}

	public function active($id=''){		
		$user_data = $this->auth_m->search(array('_id'=>$id))->data;		
        $del = $this->user_m->status($id,'1');
        if ($del->is_success){   
        	if(($user_data->status == 0) || ($user_data->status == '0')) {        	
        		    $data_email = "<strong>Dear $user_data->username ,</strong> 

                                <p>Thanks for your registering to Smart Monitoring Athlete Platform</p><br/>
                                <p>Through this email, we inform you that your account has been verified by our administrator.<br/>
                                Please <a href='".base_url()."auth/login'>sign in </a> to our website with the username and password that you used during the registration process</p>
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
                    $this->email->from($this->config->item('email_from'), 'No-reply SMAP');
                    $this->email->to(preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$user_data->email));              
                    $this->email->subject('Verification of SMAP Registration Process');
                    $this->email->message($data_email);             
                    $send = $this->email->send();                     
    
        	}
            redirect(base_url().'athlete/?alert=success');
        }
        redirect(base_url().'athlete/?alert=failed');
    }

    public function nonactive($id=''){
        $del = $this->user_m->status($id,'2');
        if ($del->is_success){            
            redirect(base_url().'athlete/?alert=success');
        }
        redirect(base_url().'athlete/?alert=failed');
    }

    public function add(){       
        $data=array();
        $data['success']='';
        $data['error']='';
        $data['title']= 'Athlete Add';
        $data['user_now'] = $this->session->userdata('smap_admin');        
        if($data['user_now']->role != 'Coach'){
            $data['coach'] = $this->user_m->getcoach()->data;
        }

        if($this->input->post('save')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'xss_clean|required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|min_length[6]');
            $this->form_validation->set_rules('passconf', 'Confirmation password', 'required');               
            $this->form_validation->set_rules('email', 'Email', 'xss_clean|required|trim');            
            if ($this->form_validation->run() == FALSE){
                $data['error'] = validation_errors();
            } else {              
                $file = '';
                if(($_FILES['file']['name']!='')){                  
                    $file = $this->_doupload_file('file','assets/images/users/');                    
                }   

                if($data['user_now']->role == 'Coach'){
                    $code = $data['user_now']->coach_code;
                } else {
                    $code = $this->input->post('coach');
                }


                $input=array(
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'fullname' => $this->input->post('name'),
                    'photo' => $file,
                    'address' => $this->input->post('address'),
                    'phone_number' => $this->input->post('phone'),
                    'date_birth' => $this->input->post('birth'),
                    'sport' => $this->input->post('sport'),
                    'blood_type' => $this->input->post('blood'),
                    'role' => 'Athlete',
                    'id_coach' => $code,
                    'status' => 1
                );
                $respo = $this->user_m->add($input);
                if($respo->is_success){             
                    $data['success']=$respo->data;                  
                } else {                
                    $data['error']=$respo->data;
                }                       
            }
        }

        $this->load->view('athlete_add_v', $data);
    }

    public function lists(){        
        $data=array();
        $data['success']='';
        $data['error']='';
        if($this->input->get('alert')=='success') $data['success']='athlete has been change';   
        if($this->input->get('alert')=='failed') $data['error']="athlete change process was failed";    
        $data['title']='Athlete List';        
        $data['user_now'] = $this->session->userdata('smap_admin');             
        if($data['user_now']->role == 'Coach'){
          $data['data'] = $this->user_m->getathlete_coach($data['user_now']->coach_code)->data;             
        } else {
          $data['data'] = $this->user_m->getathlete()->data;                  
        }
        
        $this->load->view('athlete_list_v', $data);
    }
	
    public function detail($id){       
        $data=array();
        $data['success']='';
        $data['error']='';
        $data['title']= 'Athlete Detail';     
        $data['user_now'] = $this->session->userdata('smap_admin');     
        $data['user'] = $this->user_m->get_detail($id)->data;
        $data['my_coach'] =  $this->user_m->get_detail($data['user']->_id)->data;

        ///Kuisoner////
        $data['kuisoner'] = $this->kuisoner_m->get_kuisoner_athlete($id)->data;

        //Schedule
        $data['schedule'] = $this->schedule_m->get_schedule_athlete($id)->data;        
        ///Konten Kuisoner////
        $ques = $this->kontenk_m->get_list_title()->data;
        $question = array();
        foreach ($ques as $key) {
            $question[$key->_id] = $key->Title;
        }
        $data['question'] = $question;

        $this->load->view('athlete_detail_v', $data);
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

    public function _doupload_file($name,$target){
		$img						= $name;
		$config['file_name']  		= date('dmYHis').'_'.preg_replace("/[^0-9a-zA-Z ]/", "", $_FILES[$img]['name']);
		$config['upload_path'] 		= $target;
		$config['overwrite'] 		= FALSE;
		$config['allowed_types'] 	= '*';
		$config['max_size']			= '100000';
		$config['max_width']  		= '10000';
		$config['max_height']  		= '10000';
		$config['remove_spaces']  	= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload($img)){
			$return['error'] 	 = $this->upload->display_errors();
			$return['file_name'] = '';
		}else{
			$data = array('upload_data' => $this->upload->data());
			$return['error'] 	 = '-';
			$return['file_name'] = $data['upload_data']['file_name'];
		}

		$this->upload->file_name = '';
		if($return['file_name']==''){
			return $return['error'];
			//return '-';
		}else{
			return $return['file_name'];
		}
	}


}

/* End of file  */
/* Location: ./application/controllers/ */
