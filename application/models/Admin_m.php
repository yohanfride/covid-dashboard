<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_all(){
		$url = $this->config->item('url_node')."admin/";				
		return json_decode($this->getData($url));
	}

	function get_detail($admin){
		$url = $this->config->item('url_node')."admin/detail/".$admin;				
		return json_decode($this->getData($url));
	}

	function edit($admin,$data){
		$url = $this->config->item('url_node')."admin/edit/".$admin;				
		return json_decode($this->sendPost($url,$data));
	}

	function status($admin,$status){
		$url = $this->config->item('url_node')."admin/status/".$admin."/".$status;				
		return json_decode($this->getData($url));
	}

	function pass($admin,$data){
		$url = $this->config->item('url_node')."admin/pass/".$admin;				
		return json_decode($this->sendPost($url,$data));
	}

	function resetpass($admin,$data){
		$url = $this->config->item('url_node')."admin/resetpass/".$admin;				
		return json_decode($this->sendPost($url,$data));
	}

	function login($user,$pass){
		$url = $this->config->item('url_node')."admin/login/";		
		$data = array('username'=>$user,'pass'=>$pass);
		return json_decode($this->sendPost($url,$data));
	}

	function add($data){
		$url = $this->config->item('url_node')."admin/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search($data){
		$url = $this->config->item('url_node')."admin/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."admin/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function del($id){
		$url = $this->config->item('url_node')."admin/delete/".$id;				
		return json_decode($this->getData($url));
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
