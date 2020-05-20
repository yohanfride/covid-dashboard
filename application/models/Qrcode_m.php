<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class qrcode_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_all(){
		$url = $this->config->item('url_node')."qrcode/";				
		return json_decode($this->getData($url));
	}

	function get_detail($qrcode){
		$url = $this->config->item('url_node')."qrcode/detail/".$qrcode;				
		return json_decode($this->getData($url));
	}

	function edit($qrcode,$data){
		$url = $this->config->item('url_node')."qrcode/edit/".$qrcode;				
		return json_decode($this->sendPost($url,$data));
	}

	function add($data){
		$url = $this->config->item('url_node')."qrcode/";				
		return json_decode($this->sendPost($url,$data));
	}
	
	function del($id){
		$url = $this->config->item('url_node')."qrcode/delete/".$id;				
		return json_decode($this->getData($url));
	}

	function multiadd($data){
		$url = $this->config->item('url_node')."qrcode/multi";				
		return json_decode($this->sendPost($url,$data));
	}

	function search($data){
		$url = $this->config->item('url_node')."qrcode/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."qrcode/count/";				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file qrcode_model.php */
/* Location: ./application/models/qrcode_Model.php */
