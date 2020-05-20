<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class kuisoner_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			
	
	function get_detail($id){
		$url = $this->config->item('url_node')."kuisoner/detail/".$id;				
		return json_decode($this->getData($url));
	}

	function add($id,$data){
		$url = $this->config->item('url_node')."kuisoner/add/".$id;				
		return json_decode($this->sendPost($url,$data));
	}

	function edit($id,$data){
		$url = $this->config->item('url_node')."kuisoner/edit/".$id;				
		return json_decode($this->sendPost($url,$data));
	}
	
	function del($id){
		$url = $this->config->item('url_node')."kuisoner/delete/".$id;				
		return json_decode($this->getData($url));
	}	

	function search($data){
		$url = $this->config->item('url_node')."kuisoner/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kuisoner_athlete($id){
		$data = array(
			"id_athlete" => $id
		);
		$url = $this->config->item('url_node')."kuisoner/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kuisoner_many_athlete($id){				
		foreach ($id as $k) {
			$d[] = array(
				"id_athlete" => $k
			);
		}
		$d = json_encode($d);
		$data = array(
			'or' => $d
		);		
		$url = $this->config->item('url_node')."kuisoner/coach/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."kuisoner/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kuisoner_athlete_count($id){
		$data = array(
			"id_athlete" => $id
		);
		$url = $this->config->item('url_node')."kuisoner/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_kuisoner_many_athlete_count($id){				
		foreach ($id as $k) {
			$d[] = array(
				"id_athlete" => $k
			);
		}
		$d = json_encode($d);
		$data = array(
			'or' => $d
		);		
		$url = $this->config->item('url_node')."kuisoner/coach_count/";				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
