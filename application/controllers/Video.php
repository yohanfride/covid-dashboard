<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('video_m');
		if(!$this->session->userdata('covid-admin')) redirect(base_url() . "auth/login");
	}	
	
    public function add(){ 
    	$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Tambah Tautan Video';
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('link', 'Link', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else{
				$status = 0; $highlight = 0;
				if($this->input->post('status'))
					$status = 1;
				if($this->input->post('highlight'))
					$highlight = 1;
				$input=array(
					'link' => $this->input->post('link'),
					'jenis' => $this->input->post('jenis'),
					'highlight' => $highlight,
					'status' => $status
				);
				$respo = $this->video_m->add($input);
				if($respo->is_success){	
					$data['success']='Data berhasil ditambahkan';
				} else {				
					$data['error']='Data gagal ditambahkan';
				}
		    }
		}	
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('video_add_v', $data);		
	}

	public function edit($id){  
		
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Ubah Tautan Video';
		if($this->input->post('save')){
			$status = 0; $highlight = 0;
			if($this->input->post('status'))
				$status = 1;
			if($this->input->post('highlight'))
				$highlight = 1;
			$input=array(
				'link' => $this->input->post('link'),
				'jenis' => $this->input->post('jenis'),
				'highlight' => $highlight,
				'status' => $status
			);
			$respo = $this->video_m->edit($id,$input);
			if($respo->is_success){				
				$data['success']='Data berhasil diubah';
			} else {				
				$data['error']='Data gagal diubah';
			}								
		}
		$data['data'] = $this->video_m->get_detail($id)->data;
		if(!$data['data']){
			$data['error']='Tidak ada data';
		}	
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('video_edit_v', $data);		
	}

    public function index(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Data berhasil dihapus';	
		if($this->input->get('alert')=='failed') $data['error']="Data gagal dihapus";
		$data['title']='Manajemen Tautan Video';
		$data['data'] = $this->video_m->get_all()->data;
		$data['user_now'] = $this->session->userdata('covid-admin');
		$this->load->view('video_v', $data);
	}

	public function delete($id=''){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->video_m->del($id);
			if($del->is_success){
				redirect(base_url().'video/?alert=success') ; 			
			} 
		//}
		redirect(base_url().'video/?alert=failed') ; 			
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
