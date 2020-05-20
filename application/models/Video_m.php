<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class video_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function get_all(){
		$url = $this->config->item('url_node')."video/";				
		return json_decode($this->getData($url));
	}

	function get_detail($video){
		$url = $this->config->item('url_node')."video/detail/".$video;				
		return json_decode($this->getData($url));
	}

	function edit($video,$data){
		$url = $this->config->item('url_node')."video/edit/".$video;				
		return json_decode($this->sendPost($url,$data));
	}

	function add($data){
		$url = $this->config->item('url_node')."video/";				
		return json_decode($this->sendPost($url,$data));
	}

	function del($id){
		$url = $this->config->item('url_node')."video/delete/".$id;				
		return json_decode($this->getData($url));
	}
	
	function search($data){
		$url = $this->config->item('url_node')."video/search/";				
		return json_decode($this->sendPost($url,$data));
	}

	function search_count($data){
		$url = $this->config->item('url_node')."video/count/";				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file video_model.php */
/* Location: ./application/models/video_Model.php */
