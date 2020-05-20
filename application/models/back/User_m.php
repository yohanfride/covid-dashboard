<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class user_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_all(){
		$url = $this->config->item('url_node')."user/";				
		return json_decode($this->getData($url));
	}

	function get_detail($user){
		$url = $this->config->item('url_node')."user/detail/".$user;				
		return json_decode($this->getData($url));
	}

	function edit($user,$data){
		$url = $this->config->item('url_node')."user/edit/".$user;				
		return json_decode($this->sendPost($url,$data));
	}

	function status($user,$status){
		$url = $this->config->item('url_node')."user/status/".$user."/".$status;				
		return json_decode($this->getData($url));
	}

	function pass($user,$data){
		$url = $this->config->item('url_node')."user/pass/".$user;				
		return json_decode($this->sendPost($url,$data));
	}

	function resetpass($user,$data){
		$url = $this->config->item('url_node')."user/resetpass/".$user;				
		return json_decode($this->sendPost($url,$data));
	}

	function getcoach(){
		$data = array('role'=>'Coach');
		$url = $this->config->item('url_node')."user/search_all/";				
		return json_decode($this->sendPost($url,$data));	
	}

	function getathlete(){
		$data = array('role'=>'Athlete');
		$url = $this->config->item('url_node')."user/search_all/";				
		return json_decode($this->sendPost($url,$data));	
	}

	function getathlete_coach($id){
		$data = array('role'=>'Athlete','id_coach'=>$id);
		$url = $this->config->item('url_node')."user/search_all/";				
		return json_decode($this->sendPost($url,$data));	
	}

	function getcoach_count(){
		$data = array('role'=>'Coach');
		$url = $this->config->item('url_node')."user/count/";				
		return json_decode($this->sendPost($url,$data));	
	}

	function getathlete_count(){
		$data = array('role'=>'Athlete');
		$url = $this->config->item('url_node')."user/count/";				
		return json_decode($this->sendPost($url,$data));	
	}

	function getathlete_coach_count($id){
		$data = array('role'=>'Athlete','id_coach'=>$id);
		$url = $this->config->item('url_node')."user/count/";				
		return json_decode($this->sendPost($url,$data));	
	}

	function add($data){
		$url = $this->config->item('url_node')."user/";				
		return json_decode($this->sendPost($url,$data));
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
