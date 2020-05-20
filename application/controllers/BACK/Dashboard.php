<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		$this->load->model('kuisoner_m');
		$this->load->model('user_m');
		$this->load->model('auth_m');
		$this->load->model('kontenk_m');
		$this->load->model('schedule_m');
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
    }

	public function index()
	{        
		$data=array();
		$data['title']='Dashboard';
		//$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('smap_admin')->_id)->data;	
		$data['user_now'] = $this->session->userdata('smap_admin');		
		if($data['user_now']->role == 'Coach'){
			$data['count_athlete'] = $this->user_m->getathlete_coach_count($data['user_now']->coach_code)->data;
			$data['count_schedule'] = $this->schedule_m->get_schedule_coach_count($data['user_now']->_id)->data;	
			$id = array();
			$atl= $this->user_m->getathlete_coach($data['user_now']->coach_code)->data;
			if(count($atl)>0){
				foreach ($atl as $key) {
					$id[] = $key->_id;
				}			
				$data['count_kuisoner'] = $this->kuisoner_m->get_kuisoner_many_athlete_count($id)->data;
			} else {
				$data['count_kuisoner'] = 0;
			}
			$data['count_questions'] = $this->kontenk_m->get_list_title_count()->data;		
			$str = date("Y-m-d")."T00:00:00";
			$end = date("Y-m-d")."T23:59:59";
			$data['schedule_now'] = $this->schedule_m->get_schedule_coach($data['user_now']->_id,$str,$end)->data;
			$user = array();
			$user_l= $this->user_m->get_all()->data;                  
			foreach ($user_l as $key) {
				$user[$key->_id] = $key;
			}			
			$data['user'] = $user;
			$this->load->view('dashboard_coach_v', $data);
		}elseif($data['user_now']->role == 'Athlete'){
			$str = date("Y-m-d")."T00:00:00";
			$end = date("Y-m-d")."T23:59:59";
			$data['schedule_now'] = $this->schedule_m->get_schedule_athlete($data['user_now']->_id,$str,$end)->data;
			$data['schedule_month'] = $this->schedule_m->get_schedule_athlete($data['user_now']->_id,$str,$end)->data;
			$data['my_coach'] = $this->auth_m->search(array('coach_code'=>$data['user_now']->id_coach))->data;
			$this->load->view('dashboard_athlete_v', $data);
		}else{
			$data['count_coach'] = $this->user_m->getcoach_count()->data;
			$data['count_athlete'] = $this->user_m->getathlete_count()->data;
			$data['count_schedule'] = $this->schedule_m->search_count(array())->data;					
			$data['count_questions'] = $this->kontenk_m->get_list_title_count()->data;		
			$str = date("Y-m-d")."T00:00:00";
			$end = date("Y-m-d")."T23:59:59";
			$data['count_kuisoner'] = $this->kuisoner_m->search_count(array())->data;
			$data['schedule_now'] = $this->schedule_m->get_schedule_all($str,$end)->data;
			$user = array();
			$user_l= $this->user_m->get_all()->data;                  
			foreach ($user_l as $key) {
				$user[$key->_id] = $key;
			}			
			$data['user'] = $user;			
			$this->load->view('dasboard', $data);
		}

        //$data['user'] = $this->auth_m->get_admin_by_id($this->session->userdata('antrian_admin'));        
		
	}	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
