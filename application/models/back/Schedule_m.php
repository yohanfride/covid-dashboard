<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			
	
	function get_detail($id){
		$url = $this->config->item('url_node')."schedule/detail/".$id;				
		return json_decode($this->getData($url));
	}

	function add($data){
		$url = $this->config->item('url_node')."schedule/";				
		return json_decode($this->sendPost($url,$data));
	}

	function edit($id,$data){
		$url = $this->config->item('url_node')."schedule/edit/".$id;				
		return json_decode($this->sendPost($url,$data));
	}
	
	function del($id){
		$url = $this->config->item('url_node')."schedule/delete/".$id;				
		return json_decode($this->getData($url));
	}

	function get_list_title(){
		$url = $this->config->item('url_node')."schedule/title/";				
		return json_decode($this->getData($url));
	}

	function get_list_schedule($id){
		$url = $this->config->item('url_node')."schedule/schedule/".$id;				
		return json_decode($this->getData($url));
	}

	function search($data){
		$url = $this->config->item('url_node')."schedule/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."schedule/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_schedule_athlete($id,$str='',$end=''){
		if(!empty($str)){
			$data = array(
				"id_athlete" => $id,
				"date_schedule" => array(
					'$gte'=> $str,
					'$lt' => $end
				)
			);
		} else {
			$data = array(
				"id_athlete" => $id
			);
		}
		$url = $this->config->item('url_node')."schedule/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_schedule_all($str='',$end=''){
		if(!empty($str)){
			$data = array(
				"date_schedule" => array(
					'$gte'=> $str,
					'$lt' => $end
				)
			);
		} else {
			$data = array();
		}	
		$url = $this->config->item('url_node')."schedule/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_schedule_coach($id,$str='',$end=''){
		if(!empty($str)){
			$data = array(
				"id_coach" => $id,
				"date_schedule" => array(
					'$gte'=> $str,
					'$lt' => $end
				)
			);
		} else {
			$data = array(
				"id_coach" => $id
			);
		}	
		$url = $this->config->item('url_node')."schedule/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_schedule_many_athlete($id,$str,$end){		
		foreach ($id as $k) {
			$d[] = array(
				"id_athlete" => $k
			);
		}
		$data = array(
			'$or' => $d,
			"date_schedule" => array(
				'$gte'=> $str,
				'$lt' => $end
			)
		);		
		$url = $this->config->item('url_node')."schedule/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_schedule_athlete_count($id,$str='',$end=''){
		if(!empty($str)){
			$data = array(
				"id_athlete" => $id,
				"date_schedule" => array(
					'$gte'=> $str,
					'$lt' => $end
				)
			);
		} else {
			$data = array(
				"id_athlete" => $id
			);
		}
		$url = $this->config->item('url_node')."schedule/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_schedule_coach_count($id,$str='',$end=''){
		if(!empty($str)){
			$data = array(
				"id_coach" => $id,
				"date_schedule" => array(
					'$gte'=> $str,
					'$lt' => $end
				)
			);
		} else {
			$data = array(
				"id_coach" => $id
			);
		}	
		$url = $this->config->item('url_node')."schedule/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_schedule_many_athlete_count($id,$str,$end){		
		foreach ($id as $k) {
			$d[] = array(
				"id_athlete" => $k
			);
		}
		$data = array(
			'$or' => $d,
			"date_schedule" => array(
				'$gte'=> $str,
				'$lt' => $end
			)
		);		
		$url = $this->config->item('url_node')."schedule/count/";				
		return json_decode($this->sendPost($url,$data));
	}


}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
