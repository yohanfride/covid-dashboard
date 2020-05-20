<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kalori_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			
	
	function get_detail($id){
		$url = $this->config->item('url_node')."kalori/detail/".$id;				
		return json_decode($this->getData($url));
	}

	function add($data){
		$url = $this->config->item('url_node')."kalori/";				
		return json_decode($this->sendPost($url,$data));
	}

	function edit($id,$data){
		$url = $this->config->item('url_node')."kalori/edit/".$id;				
		return json_decode($this->sendPost($url,$data));
	}
	
	function del($id){
		$url = $this->config->item('url_node')."kalori/delete/".$id;				
		return json_decode($this->getData($url));
	}

	function get_list_title(){
		$url = $this->config->item('url_node')."kalori/title/";				
		return json_decode($this->getData($url));
	}

	function get_list_kalori($id){
		$url = $this->config->item('url_node')."kalori/kalori/".$id;				
		return json_decode($this->getData($url));
	}

	function search($data){
		$url = $this->config->item('url_node')."kalori/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."kalori/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kalori_athlete($id,$str='',$end=''){
		if(!empty($str)){
			$data = array(
				"id_athlete" => $id,
				"created_date" => array(
					'$gte'=> $str,
					'$lt' => $end
				)
			);
		} else {
			$data = array(
				"id_athlete" => $id
			);
		}
		$url = $this->config->item('url_node')."kalori/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kalori_all($str='',$end=''){
		if(!empty($str)){
			$data = array(
				"created_date" => array(
					'$gte'=> $str,
					'$lt' => $end
				)
			);
		} else {
			$data = array();
		}	
		$url = $this->config->item('url_node')."kalori/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kalori_coach($id,$str='',$end=''){
		if(!empty($str)){
			$data = array(
				"id_coach" => $id,
				"created_date" => array(
					'$gte'=> $str,
					'$lt' => $end
				)
			);
		} else {
			$data = array(
				"id_coach" => $id
			);
		}	
		$url = $this->config->item('url_node')."kalori/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kalori_many_athlete($id,$str,$end){		
		foreach ($id as $k) {
			$d[] = array(
				"id_athlete" => $k
			);
		}
		$data = array(
			'$or' => $d,
			"created_date" => array(
				'$gte'=> $str,
				'$lt' => $end
			)
		);		
		$url = $this->config->item('url_node')."kalori/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kalori_athlete_count($id,$str='',$end=''){
		if(!empty($str)){
			$data = array(
				"id_athlete" => $id,
				"created_date" => array(
					'$gte'=> $str,
					'$lt' => $end
				)
			);
		} else {
			$data = array(
				"id_athlete" => $id
			);
		}
		$url = $this->config->item('url_node')."kalori/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kalori_coach_count($id,$str='',$end=''){
		if(!empty($str)){
			$data = array(
				"id_coach" => $id,
				"created_date" => array(
					'$gte'=> $str,
					'$lt' => $end
				)
			);
		} else {
			$data = array(
				"id_coach" => $id
			);
		}	
		$url = $this->config->item('url_node')."kalori/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kalori_many_athlete_count($id,$str,$end){		
		foreach ($id as $k) {
			$d[] = array(
				"id_athlete" => $k
			);
		}
		$data = array(
			'$or' => $d,
			"created_date" => array(
				'$gte'=> $str,
				'$lt' => $end
			)
		);		
		$url = $this->config->item('url_node')."kalori/count/";				
		return json_decode($this->sendPost($url,$data));
	}


}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
