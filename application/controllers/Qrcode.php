<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qrcode extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('qrcode_m');
		if(!$this->session->userdata('covid-admin')) redirect(base_url() . "auth/login");
	}	
	
    public function generate(){ 
    	$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Generate QR Code';
		if($this->input->post('save')){
			$input=array(
				'link' => $this->input->post('link'),
				'total' => $this->input->post('total')
			);
			$respo = $this->qrcode_m->multiadd($input);
			if($respo->is_success){	
				$data['success']='Data berhasil ditambahkan';
			} else {				
				$data['error']='Data gagal ditambahkan';
			}
		}	
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('qrcode_generate_v', $data);		
	}

    public function index(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Data berhasil dihapus';	
		if($this->input->get('alert')=='failed') $data['error']="Data gagal dihapus";
		$data['title']='Manajemen QR Code';

		$hal = $this->input->get('hal');
		if( $this->input->get('hal') == '' ) $hal = 1;

		$limit = 20;
		$query = array(
			'limit' => $limit,
			'skip' => ($hal-1) * $limit
		);
		
		$data['total'] = $this->qrcode_m->search_count(array())->data;
		$data['data'] = $this->qrcode_m->search($query)->data;
		$data['pagination'] = $this->qrcode_m->page($data['total'],$limit,$hal);

		$data['user_now'] = $this->session->userdata('covid-admin');
		$this->load->view('qrcode_v', $data);
	}

	public function delete($id=''){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->qrcode_m->del($id);
			if($del->is_success){
				redirect(base_url().'qrcode/?alert=success') ; 			
			} 
		//}
		redirect(base_url().'qrcode/?alert=failed') ; 			
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
