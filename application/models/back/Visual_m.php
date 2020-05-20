<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class visual_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			
	
	function get_detail($id){
		$url = $this->config->item('url_node')."visual/project/".$id;				
		return json_decode($this->getData($url));
	}

	function add($data){
		$url = $this->config->item('url_node')."visual/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search($data){
		$url = $this->config->item('url_node')."visual/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function edit($id,$data){
		$url = $this->config->item('url_node')."visual/edit/".$id;				
		return json_decode($this->sendPost($url,$data));
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */

