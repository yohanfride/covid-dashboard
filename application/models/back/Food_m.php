<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Food_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			
	
	function get_detail($id){
		$url = $this->config->item('url_node')."food/detail/".$id;				
		return json_decode($this->getData($url));
	}

	function add($data){
		$url = $this->config->item('url_node')."food/";				
		return json_decode($this->sendPost($url,$data));
	}

	function edit($id,$data){
		$url = $this->config->item('url_node')."food/edit/".$id;				
		return json_decode($this->sendPost($url,$data));
	}
	
	function del($id){
		$url = $this->config->item('url_node')."food/delete/".$id;				
		return json_decode($this->getData($url));
	}	

	function search($data){
		$url = $this->config->item('url_node')."food/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."food/count/";				
		return json_decode($this->sendPost($url,$data));
	}


}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
