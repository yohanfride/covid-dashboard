<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('auth_m');
		$this->load->model('sensor_m');
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
	}	
	
	public function myprofile(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Profile';
		$data['user_now'] = $this->session->userdata('smap_admin');		

		if($this->input->post('save')){
			$file = htmlspecialchars($this->input->post("curr_img"));			
			if(($_FILES['file']['name']!='')){					
				$file = $this->_doupload_file('file','assets/images/users/');
				if($file == '') $cek =0; else if(!empty($this->input->post('curr_img')))unlink('assets/images/users/'.$this->input->post('curr_img'));
			}			

			if(($data['user_now']->role=='Administrator') || ($data['user_now']->role=='Super Admin')){
				$input=array(
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'fullname' => $this->input->post('name'),
					'photo' => $file,
				);
			}

			if( $data['user_now']->role=='Coach' ){				
				$input=array(
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'fullname' => $this->input->post('name'),
					'photo' => $file,
					'address' => $this->input->post('address'),
					'phone_number' => $this->input->post('phone')
				);
			}

			if( $data['user_now']->role=='Athlete' ){
				$input=array(
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'fullname' => $this->input->post('name'),
					'photo' => $file,
					'address' => $this->input->post('address'),
					'phone_number' => $this->input->post('phone'),
					'date_birth' => $this->input->post('birth'),
					'sport' => $this->input->post('sport'),
					'blood_type' => $this->input->post('blood')
				);
			}

			$respo = $this->user_m->edit($this->session->userdata('smap_admin')->_id,$input);
			if($respo->is_success){				
				$data['success']='success';
				$user = $this->user_m->get_detail($this->session->userdata('smap_admin')->_id);
				$this->session->set_userdata('smap_admin',$user->data);
			} else {				
				$data['error']='Failed';
			}								
		}		
		if( $data['user_now']->role=='Athlete' ){
			$data['my_coach'] = $this->auth_m->search(array('coach_code'=>$data['user_now']->id_coach))->data;
		}
		$data['user_now'] = $this->session->userdata('smap_admin');					
		$this->load->view('user_profile_v', $data);		
	}

	public function setting(){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Password Setting';
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('old_password', 'Old Password', 'required');
			$this->form_validation->set_rules('password', 'New Password', 'required|matches[passconf]|min_length[6]');
			$this->form_validation->set_rules('passconf', 'New Password Confirmation', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			}
		    else{
		    	$input=array(
					'pass' => $this->input->post('password'),
					'pass_old' => $this->input->post('old_password')
				);				
				$respo = $this->user_m->pass($this->session->userdata('smap_admin')->_id,$input);				
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}						
		    }
		}
		$data['user_now'] = $this->session->userdata('smap_admin');		
		//$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('smap_admin')->_id)->data;	
		$this->load->view('user_setting_v', $data);
	}	
    
    public function manage()
	{        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='User has been change';	
		if($this->input->get('alert')=='failed') $data['error']="User change process was failed";	
		$data['title']='User Management';		
		$data['user'] = $this->user_m->get_all()->data;		
		$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('smap_admin')->_id)->data;	
		$data['user_now'] = $this->session->userdata('smap_admin');		        
		$this->load->view('user_manage_v', $data);
	}

	public function active($id=''){

        $del = $this->user_m->status($id,'true');
        if ($del->is_success){            
            redirect(base_url().'user/manage/?alert=success');
        }
        redirect(base_url().'user/manage/?alert=failed');
    }

    public function nonactive($id=''){

        $del = $this->user_m->status($id,'false');
        if ($del->is_success){            
            redirect(base_url().'user/manage/?alert=success');
        }
        redirect(base_url().'user/manage/?alert=failed');
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
