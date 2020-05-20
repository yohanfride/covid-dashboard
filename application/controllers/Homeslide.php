<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homeslide extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('homeslide_m');
		if(!$this->session->userdata('covid-admin')) redirect(base_url() . "auth/login");
	}	
	
    public function add(){ 
    	$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Tambah Homeslide';
		if($this->input->post('save')){
			if(($_FILES['file']['name']=='')){
				$data['error'] = "File tidak ada";
			} else{
				$file = $this->_doupload_file('file',$this->config->item('public_file_folder').'homeslide/');
				$status = 0; $highlight = 0;
				if($this->input->post('status'))
					$status = 1;
				if($this->input->post('highlight'))
					$highlight = 1;
				$input=array(
					'gambar' => $file,
					'highlight' => $highlight,
					'status' => $status
				);
				$respo = $this->homeslide_m->add($input);
				if($respo->is_success){	
					$data['success']='Data berhasil ditambahkan';
				} else {				
					$data['error']='Data gagal ditambahkan';
				}
		    }
		}	
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('homeslide_add_v', $data);		
	}

	public function edit($id){  
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Ubah Homeslide';
		if($this->input->post('save')){
			$file = htmlspecialchars($this->input->post("curr_img"));			
			if(($_FILES['file']['name']!='')){					
				$file = $this->_doupload_file('file',$this->config->item('public_file_folder').'homeslide/');
				if($file == '') $cek =0; 
				else if(!empty($this->input->post('curr_img'))){
					if(file_exists($this->config->item('public_file_folder').'homeslide/'.$this->input->post('curr_img'))){
					    unlink($this->config->item('public_file_folder').'homeslide/'.$this->input->post('curr_img'));
					}
				}
			}
			$status = 0; $highlight = 0;
				if($this->input->post('status'))
					$status = 1;
				if($this->input->post('highlight'))
					$highlight = 1;
			$input=array(
				'gambar' => $file,
				'highlight' => $highlight,
				'status' => $status
			);
			$respo = $this->homeslide_m->edit($id,$input);
			if($respo->is_success){				
				$data['success']='Data berhasil diubah';
			} else {				
				$data['error']='Data gagal diubah';
			}								
		}
		$data['data'] = $this->homeslide_m->get_detail($id)->data;
		if(!$data['data']){
			$data['error']='Tidak ada data';
		}
		$data['url_media'] = $this->config->item('public_file_url');	
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('homeslide_edit_v', $data);		
	}

    public function index(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Data berhasil dihapus';	
		if($this->input->get('alert')=='failed') $data['error']="Data gagal dihapus";
		$data['title']='Manajemen Homeslide';
		$data['data'] = $this->homeslide_m->get_all()->data;
		$data['url_media'] = $this->config->item('public_file_url');	
		$data['user_now'] = $this->session->userdata('covid-admin');
		$this->load->view('homeslide_v', $data);
	}

	public function delete($id=''){					
		$data = $this->homeslide_m->get_detail($id)->data;
		if($data){
			$del=$this->homeslide_m->del($id);
			if($del->is_success){
				try {
				    unlink($this->config->item('public_file_folder').'homeslide/'.$data->gambar);
				} catch (Exception $e) {
				    
				}
				if(!empty( $data->gambar )){
					if(file_exists($this->config->item('public_file_folder').'homeslide/'.$data->gambar )){
					    unlink($this->config->item('public_file_folder').'homeslide/'.$data->gambar );
					}
				}
				redirect(base_url().'homeslide/?alert=success') ; 			
			} 
		}
		redirect(base_url().'homeslide/?alert=failed') ; 			
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
