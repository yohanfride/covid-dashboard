<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class log_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_all(){
		$url = $this->config->item('url_node')."log/";				
		return json_decode($this->getData($url));
	}

	function get_detail($log){
		$url = $this->config->item('url_node')."log/detail/".$log;				
		return json_decode($this->getData($url));
	}

	function search($data){
		$url = $this->config->item('url_node')."log/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."log/count/";				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file log_model.php */
/* Location: ./application/models/log_Model.php */
