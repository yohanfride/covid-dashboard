<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		$this->load->model('schedule_m');
		$this->load->model('user_m');
		//$this->load->model('aes_m');
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
    }

	public function index()
	{        
		$data=array();
		$data['success']='';
		$data['error']='';		
		$data['title']='Schedule List';
		$data['user_now'] = $this->session->userdata('smap_admin');		        
		$user = array();
		if($data['user_now']->role == 'Coach'){
			$data['data'] = $this->schedule_m->get_schedule_coach($data['user_now']->_id)->data;					
		} else if($data['user_now']->role == 'Athlete'){
			$data['data'] = $this->schedule_m->get_schedule_athlete($data['user_now']->_id)->data;					
		} else {
			$data['data'] = $this->schedule_m->search(array())->data;					
		}
		$user_l= $this->user_m->get_all()->data;                  
		foreach ($user_l as $key) {
			$user[$key->_id]['fullname'] = $key->fullname;
			$user[$key->_id]['username'] = $key->username;				
		}			
		$data['user'] = $user;
		
		$this->load->view('schedule_v', $data);
	}
	
	public function src($id){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Schedule Detail';		
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$data['data'] = $this->kuisoner_m->get_detail($id)->data;		
		$data['user'] = $this->user_m->get_detail($data['data']->id_athlete)->data;
		$data['my_coach'] =  $this->user_m->get_detail($data['user']->_id)->data;
		$this->load->view('schedule_info_v', $data);
	}			

	public function add(){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Schedule Add';
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('date_schedule', 'Date Schedule', 'required');
			$this->form_validation->set_rules('place', 'Date Schedule', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else {		    			    	
		    	$input=array(
		    		'id_athlete' => $this->input->post('id_athlete'),
					'id_coach' => $this->session->userdata('smap_admin')->_id,
					'date_schedule' => $this->input->post('date_schedule'),					
					'place' => $this->input->post('place'),
					'information' => $this->input->post('information')
				);
				$respo = $this->schedule_m->add($input);
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}						
		    }
		}
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$data['athlete'] = $this->user_m->getathlete_coach($data['user_now']->coach_code)->data;
		$this->load->view('schedule_add_v', $data);
	}		
	

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
