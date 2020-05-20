<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class faskes_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_all(){
		$url = $this->config->item('url_node')."faskes/";				
		return json_decode($this->getData($url));
	}

	function get_detail($faskes){
		$url = $this->config->item('url_node')."faskes/detail/".$faskes;				
		return json_decode($this->getData($url));
	}

	function edit($faskes,$data){
		$url = $this->config->item('url_node')."faskes/edit/".$faskes;				
		return json_decode($this->sendPost($url,$data));
	}

	function add($data){
		$url = $this->config->item('url_node')."faskes/";				
		return json_decode($this->sendPost($url,$data));
	}

	function del($id){
		$url = $this->config->item('url_node')."faskes/delete/".$id;				
		return json_decode($this->getData($url));
	}
	
	function search($data){
		$url = $this->config->item('url_node')."faskes/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."faskes/count/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_radius($data){
		$url = $this->config->item('url_node')."faskes/radius/";				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file faskes_model.php */
/* Location: ./application/models/faskes_Model.php */
