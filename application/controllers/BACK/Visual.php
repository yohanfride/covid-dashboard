<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class visual extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		//$this->load->model('user_m');
		//$this->load->model('aes_m');
		$this->load->model('visual_m');		
		$this->load->model('sensor_m');		
    }

	public function publics($id){
		$src=array(
			'kode' => $id
		);
		$data['visual'] = $this->visual_m->search($src)->data;	
		if($data['visual']){										
			$data['sensor'] = $this->sensor_m->get_detail_sensor($data['visual']->project_id)->data;	               
			$data['title'] = $data['visual']->title;
			$data['list_field'] = (array) json_decode(str_replace("'",'"',$data['sensor']->list_field[0]));              
			$data['mqtt_host'] = 'localhost';
			$data['mqtt_port'] = '3000';
			$data['influx_host'] = '202.182.58.10';
			$this->load->view('visualisasi_v', $data);			
		} else {

		}	

	}

	public function udara(){
		$data = array();
		$data['title']='Visualisasi Kualitas Udara';		
		$this->load->view('visualisasi', $data);					
	}

	public function jalan(){
		$data = array();
		$data['title']='Visualisasi Kondisi Jalan';		
		$this->load->view('visualisasi_jalan', $data);					
	}

	public function setting($id)
	{        
		if(!$this->session->userdata('semar_admin')) redirect(base_url() . "auth/login");
		$data=array();		
		$data['title']='Visualization Setting';		
        $data['visual'] = $this->visual_m->get_detail($id)->data;                
        $data['sensor'] = $this->sensor_m->get_detail_sensor($id)->data;
        $data['list_field'] = (array) json_decode(str_replace("'",'"',$data['sensor']->list_field[0]));              
        $data['user_now'] = $this->session->userdata('semar_admin');		
		$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('semar_admin')->_id)->data;	
		$data['id'] = $id;
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Visualization Title', 'required');
			if(isset($this->input->post('maps')['status'])){
				if($this->input->post('maps')['status']){
					$this->form_validation->set_rules('maps[latitude]', 'Maps latitude', 'required');
					$this->form_validation->set_rules('maps[longitude]', 'Maps longitude', 'required');
					$this->form_validation->set_rules('maps[zoom]', 'Maps Zoom', 'required');
				}
			}
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else {
				$file = htmlspecialchars($this->input->post("curr_img"));			
				if(isset($this->input->post('maps')['status'])){
					if($this->input->post('maps')['status']){
						if(($_FILES['file']['name']!='')){					
							$file = $this->_doupload_file('file','assets/images/marker/');
							if($file == '') $cek =0; else if(!empty($this->input->post('curr_img')))unlink('assets/images/marker/'.$this->input->post('curr_img'));
						}
					}	
				} 
				$input  = $this->input->post();
				$input['maps']['icon_marker'] = $file;				
				$inputs = array(
					'project_id' => $id,
					'title' => $this->input->post('title'),
					'maps' => json_encode($input['maps']),
					'graph' => json_encode($input['graph']),
					'table' => json_encode($input['table'])
				);						
				if(isset($data['visual']->_id))
					$respo = $this->visual_m->edit($data['visual']->_id,$inputs);
				else 
					$respo = $this->visual_m->add($inputs);				
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}									
			}									
		}		
		$data['visual'] = $this->visual_m->get_detail($id)->data;    			
		// echo"<pre>";
		// 		print_r($data['visual']);
		// 		echo"</pre>";
		// 		exit();		
		$this->load->view('visualisasi_setting_v', $data);
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
