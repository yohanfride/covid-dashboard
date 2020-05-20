<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kalori extends CI_Controller {

    public function __construct() {

        parent::__construct();        
		$this->load->model('kalori_m');
		$this->load->model('food_m');		
		$this->load->model('user_m');
		//$this->load->model('aes_m');
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
    }
 	
 	public function index()
	{        
		$data=array();
		$data['success']='';
		$data['error']='';		
		$data['title']='Calories List';
		$data['user_now'] = $this->session->userdata('smap_admin');		        
		$user = array();
		if($data['user_now']->role == 'Athlete'){
			$data['data'] = $this->kalori_m->get_kalori_athlete($data['user_now']->_id)->data;					
		} else {
			$data['data'] = $this->kalori_m->search(array())->data;					
		}
		$user_l= $this->user_m->get_all()->data;                  
		foreach ($user_l as $key) {
			$user[$key->_id]['fullname'] = $key->fullname;
			$user[$key->_id]['username'] = $key->username;				
		}			
		$data['user'] = $user;
		
		$this->load->view('kalori_v', $data);
	}

	public function athlete($id)
	{        
		$data=array();
		$data['success']='';
		$data['error']='';		
		$data['title']='Athlete Calories List';
		$data['user_now'] = $this->session->userdata('smap_admin');		        
		$user = array();
		$data['data'] = $this->kalori_m->get_kalori_athlete($id)->data;									
		$data['user'] = $user;
		
		$this->load->view('kalori_v', $data);
	}
		
	public function add(){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Calories Add';		
		$data['user_now'] = $this->session->userdata('smap_admin');	
		if($this->input->post('save')){        	
        	$input = $this->input->post();
        	unset($input['save']);
        	echo '<pre>';
        	var_dump($input);
        	echo '</pre>';
        	exit();
        	$respo = $this->kalori_m->add($input);
            if($respo->is_success){             
                $data['success']=$respo->data;                  
            } else {                
                $data['error']=$respo->data;
            }                       
        }
        $data['makanan'] = $this->food_m->search(array())->data;
		$this->load->view('kalori_add_v2', $data);
	}

	public function edit($id){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Calories Edit';		
		$data['user_now'] = $this->session->userdata('smap_admin');		
		if($this->input->post('save')){        	
        	$input = $this->input->post();
        	unset($input['save']);
        	$respo = $this->kalori_m->edit($id,$input);
            if($respo->is_success){             
                $data['success']=$respo->data;                  
            } else {                
                $data['error']=$respo->data;
            }                       
        }
        $data['makanan'] = $this->food_m->search(array())->data;
        $data['id'] = $id;
		$data['data'] = $this->kalori_m->get_detail($id)->data;

		$this->load->view('kalori_edit_v', $data);
	}       
}