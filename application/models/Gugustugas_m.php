<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class gugustugas_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_all(){
		$url = $this->config->item('url_node')."gugustugas/";				
		return json_decode($this->getData($url));
	}

	function get_detail($gugustugas){
		$url = $this->config->item('url_node')."gugustugas/detail/".$gugustugas;				
		return json_decode($this->getData($url));
	}

	function edit($gugustugas,$data){
		$url = $this->config->item('url_node')."gugustugas/edit/".$gugustugas;				
		return json_decode($this->sendPost($url,$data));
	}

	function del($id){
		$url = $this->config->item('url_node')."gugustugas/delete/".$id;				
		return json_decode($this->getData($url));
	}

	function status($gugustugas,$status){
		$url = $this->config->item('url_node')."gugustugas/status/".$gugustugas."/".$status;				
		return json_decode($this->getData($url));
	}

	function pass($gugustugas,$data){
		$url = $this->config->item('url_node')."gugustugas/pass/".$gugustugas;				
		return json_decode($this->sendPost($url,$data));
	}

	function resetpass($gugustugas,$data){
		$url = $this->config->item('url_node')."gugustugas/resetpass/".$gugustugas;				
		return json_decode($this->sendPost($url,$data));
	}

	function login($user,$pass){
		$url = $this->config->item('url_node')."gugustugas/login/";		
		$data = array('username'=>$user,'pass'=>$pass);
		return json_decode($this->sendPost($url,$data));
	}

	function add($data){
		$url = $this->config->item('url_node')."gugustugas/";				
		return json_decode($this->sendPost($url,$data));
	}

	function multiadd($data){
		$url = $this->config->item('url_node')."gugustugas/multi";	
		return json_decode($this->sendPost($url,$data));
	}

	function search($data){
		$url = $this->config->item('url_node')."gugustugas/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."gugustugas/count/";				
		return json_decode($this->sendPost($url,$data));
	}

}

/* End of file gugustugas_model.php */
/* Location: ./application/models/gugustugas_Model.php */
