<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		$this->load->model('kontenk_m');
		//$this->load->model('aes_m');
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
    }

	public function index()
	{        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Question has been deleted';	
		if($this->input->get('alert')=='failed') $data['error']="Question can't been deleted";	
		$data['title']='Question List';
		$data['data'] = $this->kontenk_m->get_list_title()->data;		
		$data['user_now'] = $this->session->userdata('smap_admin');		        
		$this->load->view('questions_v', $data);
	}

	public function add(){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Question Add';		
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$this->load->view('questions_add_v', $data);
	}

	public function edit($id){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Question Edit';		
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$data['qtitle'] = $this->kontenk_m->get_detail($id)->data;
		$data['data'] = $this->kontenk_m->get_list_konten($id)->data;
		$this->load->view('questions_edit_v', $data);
	}			

	public function add_j(){
		if($this->input->post('save')){
			if(empty($this->input->post('field'))){
				$field = $this->input->post('title');
			} else {
				$field = $this->input->post('field');
			}

	    	$input=array(
	    		'type_kuisoner' => $this->input->post('type'),
				'Title' => $this->input->post('title'),
				'field' => $field,
				'id_parent' => $this->input->post('id')				
			);			
			$respo = $this->kontenk_m->add($input);			
			if($respo->is_success){				
				if($this->input->post('type')==1){
					echo $respo->data->_id;
				} else {
					$data['data'] = $this->kontenk_m->get_list_konten($this->input->post('id'))->data;
					$this->load->view('questions_list_v', $data);	
				}
				//$data['success']=$respo->data;					
			} else {				
				echo 'failed';
			}								    
		} else {
			echo 'failed';
		}
	}

	public function edit_j($id){
		if($this->input->post('save')){
			if(empty($this->input->post('field'))){
				$field = $this->input->post('title');
			} else {
				$field = $this->input->post('field');
			}

	    	$input=array(
	    		'type_kuisoner' => $this->input->post('type'),
				'Title' => $this->input->post('title'),
				'field' => $field,
				'id_parent' => $this->input->post('id')				
			);			
			$respo = $this->kontenk_m->edit($id,$input);			
			if($respo->is_success){				
				if($this->input->post('type')==1){
					echo $respo->data->_id;
				} else {
					$data['data'] = $this->kontenk_m->get_list_konten($this->input->post('id'))->data;
					$this->load->view('questions_list_v', $data);	
				}
				//$data['success']=$respo->data;					
			} else {				
				echo 'failed';
			}								    
		} else {
			echo 'failed';
		}
	}

	public function del_j($id="",$idp=""){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->kontenk_m->del($id);
			if($del->is_success){
				$data['data'] = $this->kontenk_m->get_list_konten($idp)->data;
				$this->load->view('questions_list_v', $data);		
			} else {
				echo 'failed';
			} 

		//}

	}	

	public function delete($id=''){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->kontenk_m->del($id);
			if($del->is_success){
				$del=$this->kontenk_m->del_item($id);
				redirect(base_url().'question/?alert=success') ; 			
			} 
		//}
		redirect(base_url().'question/?alert=failed') ; 			
	}
	

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
