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

	function del($id){
		$url = $this->config->item('url_node')."user/delete/".$id;				
		return json_decode($this->getData($url));
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

	function add($data){
		$url = $this->config->item('url_node')."user/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search($data){
		$url = $this->config->item('url_node')."user/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."user/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function scan($user,$data){
		$url = $this->config->item('url_node')."user/scan/".$user;				
		return json_decode($this->sendPost($url,$data));
	}

	function search_radius($data){
		$url = $this->config->item('url_node')."user/radius/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_log($data){
		$url = $this->config->item('url_node')."log/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count_log($data){
		$url = $this->config->item('url_node')."log/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function get_detail_log($user){
		$url = $this->config->item('url_node')."log/detail/".$user;				
		return json_decode($this->getData($url));
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_Model.php */
