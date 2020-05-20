<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class front_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			
	
	function get(){
		$url = $this->config->item('url_node')."front/";				
		return json_decode($this->getData($url))->data;
	}

	function edit($data){
		$id = '0';
		$url = $this->config->item('url_node')."front/edit/".$id;				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
