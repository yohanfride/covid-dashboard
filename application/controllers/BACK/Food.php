<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Food extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		$this->load->model('food_m');
		//$this->load->model('aes_m');
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
    }

	public function index()
	{        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Food has been deleted';	
		if($this->input->get('alert')=='failed') $data['error']="Food can't been deleted";	
		$data['title']='Food List';
		$data['data'] = $this->food_m->search(array())->data;		
		$data['user_now'] = $this->session->userdata('smap_admin');		        
		$this->load->view('food_v', $data);
	}

	public function add(){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Food Add';		
		$data['user_now'] = $this->session->userdata('smap_admin');		
		if($this->input->post('save')){        	
        	$input = $this->input->post();
        	unset($input['save']);
        	$respo = $this->food_m->add($input);
            if($respo->is_success){             
                $data['success']=$respo->data;                  
            } else {                
                $data['error']=$respo->data;
            }                       
        }
		$this->load->view('food_add_v', $data);
	}

	public function edit($id){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Food Edit';		
		$data['user_now'] = $this->session->userdata('smap_admin');		
		
		if($this->input->post('save')){        	
        	$input = $this->input->post();
        	unset($input['save']);
        	$respo = $this->food_m->edit($id,$input);
            if($respo->is_success){             
                $data['success']=$respo->data;                  
            } else {                
                $data['error']=$respo->data;
            }                       
        }
        $data['data'] = $this->food_m->get_detail($id)->data;
		$data['id'] = $id;
		$this->load->view('food_edit_v', $data);
	}			

	public function delete($id=''){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->food_m->del($id);
			if($del->is_success){
				redirect(base_url().'food/?alert=success') ; 			
			} 
		//}
		redirect(base_url().'food/?alert=failed') ; 			
	}
	

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
