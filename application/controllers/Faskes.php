<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faskes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('faskes_m');
		if(!$this->session->userdata('covid-admin')) redirect(base_url() . "auth/login");
	}	
	
    public function add(){ 
    	$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Tambah Fasilitas Kesehatan';
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Nama Faskes', 'required');
			$this->form_validation->set_rules('poslat', 'Lokasi', 'required');
			$this->form_validation->set_rules('poslng', 'Lokasi', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else{
				$input=array(
					'loc_long' => $this->input->post('poslng'),
					'loc_lat' => $this->input->post('poslat'),
					'nama' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'alamat' =>  $this->input->post('alamat')
				);
				$respo = $this->faskes_m->add($input);
				if($respo->is_success){	
					$data['success']='Data berhasil ditambahkan';
				} else {				
					$data['error']='Data gagal ditambahkan';
				}
		    }
		}	
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('faskes_add_v', $data);		
	}

	public function edit($id){  
		
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Ubah Fasilitas Kesehatan';
		if($this->input->post('save')){
			$input=array(
					'loc_long' => $this->input->post('poslng'),
					'loc_lat' => $this->input->post('poslat'),
					'nama' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'alamat' =>  $this->input->post('alamat')
			);
			$respo = $this->faskes_m->edit($id,$input);
			if($respo->is_success){				
				$data['success']='Data berhasil diubah';
			} else {				
				$data['error']='Data gagal diubah';
			}								
		}
		$data['data'] = $this->faskes_m->get_detail($id)->data;
		if(!$data['data']){
			$data['error']='Tidak ada data';
		}	
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('faskes_edit_v', $data);		
	}

    public function index(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Data berhasil dihapus';	
		if($this->input->get('alert')=='failed') $data['error']="Data gagal dihapus";
		$data['title']='Manajemen Fasilitas Kesehatan';
		$data['data'] = $this->faskes_m->get_all()->data;
		$data['user_now'] = $this->session->userdata('covid-admin');
		$this->load->view('faskes_v', $data);
	}

	public function delete($id=''){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->faskes_m->del($id);
			if($del->is_success){
				redirect(base_url().'faskes/?alert=success') ; 			
			} 
		//}
		redirect(base_url().'faskes/?alert=failed') ; 			
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
