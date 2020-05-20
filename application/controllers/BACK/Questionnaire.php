<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questionnaire extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		$this->load->model('kuisoner_m');
		$this->load->model('user_m');
		$this->load->model('kontenk_m');
		//$this->load->model('aes_m');
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
    }

	public function index()
	{        
		$data=array();
		$data['success']='';
		$data['error']='';		
		if($this->input->get('alert')=='success') $data['success']='Questionnaire has been delete';	
		if($this->input->get('alert')=='failed') $data['error']="Questionnaire delete process was failed";			
		$data['title']='Questionnaire List';
		$data['user_now'] = $this->session->userdata('smap_admin');		        
		if($data['user_now']->role == 'Athlete'){
			$data['data'] = $this->kuisoner_m->get_kuisoner_athlete($data['user_now']->_id)->data;		
		} else if($data['user_now']->role == 'Coach'){
			$user = array();
			$id = array();
			$atl= $this->user_m->getathlete_coach($data['user_now']->coach_code)->data;
			if(count($atl)>0){
				foreach ($atl as $key) {
					$user[$key->_id]['fullname'] = $key->fullname;
					$user[$key->_id]['username'] = $key->username;
					$id[] = $key->_id;
				}			
				$data['user'] = $user;
				$data['data'] = $this->kuisoner_m->get_kuisoner_many_athlete($id)->data;
			} else {
				$data['data'] = array();
			}
		} else {
			$data['data'] = $this->kuisoner_m->search(array())->data;		
			$user_l= $this->user_m->getathlete()->data;                  
			$user = array();
			foreach ($user_l as $key) {
				$user[$key->_id]['fullname'] = $key->fullname;
				$user[$key->_id]['username'] = $key->username;
			}
			
			$data['user'] = $user;				
		}
		$ques = $this->kontenk_m->get_list_title()->data;
		$question = array();
		foreach ($ques as $key) {
			$question[$key->_id] = $key->Title;
		}
		$data['question'] = $question;
		$this->load->view('questionnaire_v', $data);
	}
	
	public function src($id){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Questionnaire Detail';		
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$data['data'] = $this->kuisoner_m->get_detail($id)->data;		
		$data['user'] = $this->user_m->get_detail($data['data']->id_athlete)->data;
		$data['my_coach'] =  $this->user_m->get_detail($data['user']->_id)->data;
		$this->load->view('questionnaire_info_v', $data);
	}			
	

    public function add(){       
        $data=array();
        $data['success']='';
        $data['error']='';
        $data['title']= 'Questionnaire Add';
        $data['user_now'] = $this->session->userdata('smap_admin');        
        $data['question'] = $this->kontenk_m->get_list_title()->data;
        if($this->input->post('save')){
        	if($data['user_now']->role=='Athlete'){
        		$ida = $data['user_now']->_id;
        	} else {
        		$ida = $this->input->post('id_athlete');
        	}
        	$input = $this->input->post();
        	unset($input['save']);
        	$respo = $this->kuisoner_m->add($ida,$input);
            if($respo->is_success){             
                $data['success']=$respo->data;                  
            } else {                
                $data['error']=$respo->data;
            }                       
        }
        $this->load->view('questionnaire_add_v', $data);
	}

	public function question_detail($id){
		if(!empty($id)){
			$data['question'] = $this->kontenk_m->get_list_konten($id)->data;
			if(count($data['question'])!=0){
				$this->load->view('questionnaire_quest_v', $data);			
			} else {
				echo 'not found';	
			}
		} else {
			echo 'not found';
		}
	}
	
	public function edit($id){       
        $data=array();
        $data['success']='';
        $data['error']='';
        $data['title']= 'Questionnaire Edit';
        $data['user_now'] = $this->session->userdata('smap_admin');        
        $data['data_t'] = $this->kontenk_m->get_list_title()->data;
        if($this->input->post('save')){        	
        	$input = $this->input->post();
        	unset($input['save']);
        	unset($input['id_kuisoner']);
        	$respo = $this->kuisoner_m->edit($id,$input);
            if($respo->is_success){             
                $data['success']=$respo->data;                  
            } else {                
                $data['error']=$respo->data;
            }                       
        }
        $data['data'] = $this->kuisoner_m->get_detail($id)->data;        
        $data['data_t'] = $this->kontenk_m->search(array('_id'=>$data['data']->id_kuisoner))->data;
        $data['question'] = $this->kontenk_m->get_list_konten($data['data']->id_kuisoner)->data;                
        $this->load->view('questionnaire_edit_v', $data);
	}

	public function delete($id=''){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->kuisoner_m->del($id);
			if($del->is_success){				
				redirect(base_url().'questionnaire/?alert=success') ; 			
			} 
		//}
		redirect(base_url().'questionnaire/?alert=failed') ; 			
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
