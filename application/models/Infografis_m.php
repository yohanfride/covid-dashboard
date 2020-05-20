<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class infografis_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_all(){
		$url = $this->config->item('url_node')."infografis/";				
		return json_decode($this->getData($url));
	}

	function get_detail($infografis){
		$url = $this->config->item('url_node')."infografis/detail/".$infografis;				
		return json_decode($this->getData($url));
	}

	function edit($infografis,$data){
		$url = $this->config->item('url_node')."infografis/edit/".$infografis;				
		return json_decode($this->sendPost($url,$data));
	}

	function add($data){
		$url = $this->config->item('url_node')."infografis/";				
		return json_decode($this->sendPost($url,$data));
	}

	function del($id){
		$url = $this->config->item('url_node')."infografis/delete/".$id;				
		return json_decode($this->getData($url));
	}
	
	function search($data){
		$url = $this->config->item('url_node')."infografis/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."infografis/count/";				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file infografis_model.php */
/* Location: ./application/models/infografis_Model.php */
