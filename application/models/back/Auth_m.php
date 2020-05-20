<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class auth_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function login($user,$pass){
		$url = $this->config->item('url_node')."user/login/";		
		$data = array('user'=>$user,'pass'=>$pass);
		return json_decode($this->sendPost($url,$data));
	}

	function register($user,$pass,$mail,$role,$token,$code){		
		$url = $this->config->item('url_node')."user/";		
		if(!empty($code)){
			$data = array('username'=>$user,'password'=>$pass, 'email'=> $mail, 'token'=>$token,'role'=>$role, 'fullname'=>$user,'id_coach'=>$code);
		} else {
			$data = array('username'=>$user,'password'=>$pass, 'email'=> $mail, 'token'=>$token,'role'=>$role, 'fullname'=>$user);
		}
		return json_decode($this->sendPost($url,$data));
	}

	function activation($mail,$token){
		$url = $this->config->item('url_node')."user/activation/";		
		$data = array('email'=> $mail, 'token'=>$token);
		return json_decode($this->sendPost($url,$data));
	}

	function search($data){
		$url = $this->config->item('url_node')."user/search/";				
		return json_decode($this->sendPost($url,$data));
	}
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
