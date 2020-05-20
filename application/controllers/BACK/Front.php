<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class front extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		$this->load->model('front_m');		
    }

	public function index()
	{        
		$data=array();				
		$data['data'] = $this->front_m->get();
		$this->load->view('front_v', $data);				
	}

	public function setting()
	{        
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
		$data=array();
		$data['title']= 'Front Setting List';				
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$data['data'] = ['Head & Video','Home','About','User Guide','Contact'];		
		$data['link'] = ['','','head','home','about','user_guide','contact'];		
		$this->load->view('front_setting_v', $data);				
	}			

	public function head()
	{        
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
		$data=array();
		$data['title']= 'Front Setting - Head & Video';		
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('head_title', 'Website Title', 'required');
			$this->form_validation->set_rules('menu_title', 'Menu Header Title', 'required');
			$this->form_validation->set_rules('video', 'Video Link', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else {		    			    	
		    	$input=array(
		    		'head_title' => $this->input->post('head_title'),
					'menu_title' => $this->input->post('menu_title'),
					'video_link' => $this->input->post('video')
				);
				$respo = $this->front_m->edit($input);
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}						
		    }
		}
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$data['data'] = $this->front_m->get();
		$this->load->view('front_head_v', $data);				
	}		

	public function home()
	{        
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");
		$data=array();
		$data['title']= 'Front Setting - Home';		
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Home Content Title ', 'required');
			$this->form_validation->set_rules('content', 'Home Content', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else {		    			    	
		    	$input=array(
		    		'home_content_title' => $this->input->post('title'),
					'home_content' => $this->input->post('content'),
					'home_p1_icon' => $this->input->post('p1_icon'),
					'home_p1_title' => $this->input->post('p1_title'),
					'home_p1_content' => $this->input->post('p1_content'),
					'home_p2_icon' => $this->input->post('p2_icon'),
					'home_p2_title' => $this->input->post('p2_title'),
					'home_p2_content' => $this->input->post('p2_content'),
					'home_p3_icon' => $this->input->post('p3_icon'),
					'home_p3_title' => $this->input->post('p3_title'),
					'home_p3_content' => $this->input->post('p3_content'),
					'home_p4_icon' => $this->input->post('p4_icon'),
					'home_p4_title' => $this->input->post('p4_title'),
					'home_p4_content' => $this->input->post('p4_content')
				);
				$respo = $this->front_m->edit($input);
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}						
		    }
		}
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$data['data'] = $this->front_m->get();
		$this->load->view('front_home_v', $data);				
	}		

	public function about()
	{    
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");    
		$data=array();
		$data['title']= 'Front Setting - About';		
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('top_content', 'Top Content', 'required');
			$this->form_validation->set_rules('right_content', 'Right Content', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else {	
				$file = htmlspecialchars($this->input->post("curr_img"));							
				if(($_FILES['file']['name']!='')){					
					$file = $this->_doupload_file('file','assets_front/img/');					
					if($file == '') $cek =0; else if(!empty($this->input->post('curr_img')))unlink('assets_front/img/'.$this->input->post('curr_img'));
				}			    			    	
		    	$input=array(
		    		'about_top_content' => $this->input->post('top_content'),
					'about_right_content' => $this->input->post('right_content'),
					'about_image' => $file
				);
				$respo = $this->front_m->edit($input);
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}						
		    }
		}
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$data['data'] = $this->front_m->get();
		$this->load->view('front_about_v', $data);				
	}	

	public function user_guide()
	{   
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");     
		$data=array();
		$data['title']= 'Front Setting - User Guide';		
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('top_content', 'Top Content', 'required');
			$this->form_validation->set_rules('left_content', 'Left Content', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else {	
				$file = htmlspecialchars($this->input->post("curr_img"));				
				if(($_FILES['file']['name']!='')){					
					$file = $this->_doupload_file('file','assets_front/img/');					
					if($file == '') $cek =0; 
					else if(!empty($this->input->post('curr_img')))unlink('assets_front/img/'.$this->input->post('curr_img'));
				}			    			    	
		    	$input=array(
		    		'userg_top_content' => $this->input->post('top_content'),
					'userg_left_content' => $this->input->post('left_content'),
					'userg_image' => $file
				);
				$respo = $this->front_m->edit($input);
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}						
		    }
		}
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$data['data'] = $this->front_m->get();
		$this->load->view('front_userg_v', $data);				
	}		

	public function contact()
	{   
		if(!$this->session->userdata('smap_admin')) redirect(base_url() . "auth/login");     
		$data=array();
		$data['title']= 'Front Setting - Contact';		
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('top_content', 'Top Content', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else {		    			    	
		    	$input=array(
		    		'contact_top_content' => $this->input->post('top_content'),
					'contact_address' => $this->input->post('address'),
					'contact_phone' => $this->input->post('phone'),
					'contact_email' => $this->input->post('email')
				);
				$respo = $this->front_m->edit($input);
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}						
		    }
		}
		$data['user_now'] = $this->session->userdata('smap_admin');		
		$data['data'] = $this->front_m->get();
		$this->load->view('front_contact_v', $data);				
	}		


	public function _doupload_file($name,$target){
		$img						= $name;
		$config['file_name']  		= date('dmYHis').'_'.preg_replace("/[^0-9a-zA-Z ]/", "", $_FILES[$img]['name']);
		$config['upload_path'] 		= $target;
		$config['overwrite'] 		= FALSE;
		$config['allowed_types'] 	= '*';
		$config['max_size']			= '100000';
		$config['max_width']  		= '10000';
		$config['max_height']  		= '10000';
		$config['remove_spaces']  	= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload($img)){
			$return['error'] 	 = $this->upload->display_errors();
			$return['file_name'] = '';
		}else{
			$data = array('upload_data' => $this->upload->data());
			$return['error'] 	 = '-';
			$return['file_name'] = $data['upload_data']['file_name'];
		}

		$this->upload->file_name = '';
		if($return['file_name']==''){
			return $return['error'];
			//return '-';
		}else{
			return $return['file_name'];
		}
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
