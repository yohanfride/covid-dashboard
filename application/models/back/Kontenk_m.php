<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class kontenk_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			
	
	function get_detail($id){
		$url = $this->config->item('url_node')."kontenkuisoner/detail/".$id;				
		return json_decode($this->getData($url));
	}

	function add($data){
		$url = $this->config->item('url_node')."kontenkuisoner/";				
		return json_decode($this->sendPost($url,$data));
	}

	function edit($id,$data){
		$url = $this->config->item('url_node')."kontenkuisoner/edit/".$id;				
		return json_decode($this->sendPost($url,$data));
	}
	
	function del($id){
		$url = $this->config->item('url_node')."kontenkuisoner/delete/".$id;				
		return json_decode($this->getData($url));
	}

	function del_item($id){
		$url = $this->config->item('url_node')."kontenkuisoner/delitem/".$id;				
		return json_decode($this->getData($url));
	}
		

	function get_list_title(){
		$url = $this->config->item('url_node')."kontenkuisoner/title/";				
		return json_decode($this->getData($url));
	}

	function get_list_title_count(){
		$url = $this->config->item('url_node')."kontenkuisoner/title_count/";				
		return json_decode($this->getData($url));
	}

	function get_list_konten($id){
		$url = $this->config->item('url_node')."kontenkuisoner/konten/".$id;				
		return json_decode($this->getData($url));
	}

	function search($data){
		$url = $this->config->item('url_node')."kontenkuisoner/search/";				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
