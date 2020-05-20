<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
		if(!$this->session->userdata('covid-admin')) redirect(base_url() . "auth/login");
	}	
	
	public function myprofile(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Profile';
		$data['user_now'] = $this->session->userdata('covid-admin');		
		$role = $data['user_now']->role;
		if($this->input->post('save')){
			// $file = htmlspecialchars($this->input->post("curr_img"));			
			// if(($_FILES['file']['name']!='')){					
			// 	$file = $this->_doupload_file('file','assets/images/admins/');
			// 	if($file == '') $cek =0; else if(!empty($this->input->post('curr_img')))unlink('assets/images/admins/'.$this->input->post('curr_img'));
			// }			
			$input=array(
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					//'photo' => $file,
				);
			$respo = $this->admin_m->edit($this->session->userdata('covid-admin')->_id,$input);
			if($respo->is_success){				
				$data['success']='Data berhasil diubah';
				$admin = $this->admin_m->get_detail($this->session->userdata('covid-admin')->_id);
				$admin->data->role = $role;
				$this->session->set_userdata('covid-admin',$admin->data);
			} else {				
				$data['error']='Data gagal diubah';
			}								
		}	
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('admin_profile_v', $data);		
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
				$respo = $this->admin_m->pass($this->session->userdata('covid-admin')->_id,$input);				
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}						
		    }
		}
		$data['user_now'] = $this->session->userdata('covid-admin');		
		//$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('covid-admin')->_id)->data;	
		$this->load->view('admin_setting_v', $data);
	}	
    
    public function add(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Tambah Administrator';
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|min_length[6]');
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else{
				$level = $this->input->post('level');
				if($level != 'admin' && $level != 'master-admin'){
					$level = $this->input->post('kecamatan');
				} 

				$input=array(
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'level' => $level,
					'active' => 1
				);
				$respo = $this->admin_m->add($input);
				if($respo->is_success){	
					if($this->input->post('sendmail')){
                        $data_email = "<strong>Untuk sdr/i. ".$this->input->post('name')." ,</strong> 

                                    <p>Anda telah terdafatar sebagai Administrator di Dashboard Area Covid-19 Kabupaten Sampang. Berikut adalah username dan password anda: </p><br/>
                                    <p>Username : ".$this->input->post('username')."</p>
                                    <p>Password : ".$this->input->post('password')."</p>
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
                        $this->email->subject('Username dan Password Akun');
                        $this->email->message($data_email);             
                        $send = $this->email->send();
					}
					$data['success']='Data berhasil ditambahkan';
				} else {				
					$data['error']='Data gagal ditambahkan';
				}
		    }
		}
		$json = file_get_contents('data-sampang.json');
		$data['kecamatan'] = json_decode($json,true);	
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('admin_add_v', $data);		
	}

	public function edit($id){        
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Ubah Administrator';
		if($this->input->post('save')){
			$level = $this->input->post('level');
			if($level != 'admin' && $level != 'master-admin'){
				$level = $this->input->post('kecamatan');
			} 
			$input=array(
					'email' => $this->input->post('email'),
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'level' => $levelx
				);
			$respo = $this->admin_m->edit($id,$input);
			if($respo->is_success){				
				$data['success']='Data berhasil diubah';
			} else {				
				$data['error']='Data gagal diubah';
			}								
		}
		$data['data'] = $this->admin_m->get_detail($id)->data;
		if(!$data['data']){
			$data['error']='Tidak ada data';
		}	
		$json = file_get_contents('data-sampang.json');
		$data['kecamatan'] = json_decode($json,true);
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('admin_edit_v', $data);		
	}

    public function index()
	{        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Akun berhasil dihapus';	
		if($this->input->get('alert')=='failed') $data['error']="Akun gagal dihapus";
		if($this->input->get('alert')=='success2') $data['success']='Akun berhasil diubah';	
		if($this->input->get('alert')=='failed2') $data['error']="Akun gagal diubah";
		$data['title']='Manajemen Administrator';

		// $hal = ( $this->input->get('hal') )?'1':$this->input->get('hal');
		// $limit = 20;
		// $data['total'] = $this->admin_m->searc_count(array())->data;
		// $data['data'] = $this->admin_m->get_all()->data;
		// $data['pagination'] = $this->admin_m->page($data['total'],$limit,$hal);

		$data['data'] = $this->admin_m->get_all()->data;
		$data['user_now'] = $this->session->userdata('covid-admin');
		$this->load->view('admin_manage_v', $data);
	}

	public function delete($id=''){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->admin_m->del($id);
			if($del->is_success){
				redirect(base_url().'admin/?alert=success') ; 			
			} 
		//}
		redirect(base_url().'admin/?alert=failed') ; 			
	}
	
	public function active($id=''){

        $del = $this->admin_m->status($id,1);
        if ($del->is_success){            
            redirect(base_url().'admin/?alert=success2');
        }
        redirect(base_url().'admin/?alert=failed2');
    }

    public function nonactive($id=''){

        $del = $this->admin_m->status($id,2);
        if ($del->is_success){            
            redirect(base_url().'admin/?alert=success2');
        }
        redirect(base_url().'admin/?alert=failed2');
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
