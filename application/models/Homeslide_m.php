<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class homeslide_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_all(){
		$url = $this->config->item('url_node')."homeslide/";				
		return json_decode($this->getData($url));
	}

	function get_detail($homeslide){
		$url = $this->config->item('url_node')."homeslide/detail/".$homeslide;				
		return json_decode($this->getData($url));
	}

	function edit($homeslide,$data){
		$url = $this->config->item('url_node')."homeslide/edit/".$homeslide;				
		return json_decode($this->sendPost($url,$data));
	}

	function add($data){
		$url = $this->config->item('url_node')."homeslide/";				
		return json_decode($this->sendPost($url,$data));
	}

	function del($id){
		$url = $this->config->item('url_node')."homeslide/delete/".$id;				
		return json_decode($this->getData($url));
	}
	
	function search($data){
		$url = $this->config->item('url_node')."homeslide/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."homeslide/count/";				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file homeslide_model.php */
/* Location: ./application/models/homeslide_Model.php */
