<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sensor extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		$this->load->model('sensor_m');
		//$this->load->model('aes_m');
		if(!$this->session->userdata('semar_admin')) redirect(base_url() . "auth/login");
    }

	public function index()
	{        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Sensor has been deleted';	
		if($this->input->get('alert')=='failed') $data['error']="Sensor can't been deleted";	
		$data['title']='Sensor';
		$data['sensor'] = $this->sensor_m->get_detail($this->session->userdata('semar_admin')->_id)->data;		
		$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('semar_admin')->_id)->data;			
		$data['user_now'] = $this->session->userdata('semar_admin');		        
		$this->load->view('sensor_v', $data);
	}

	public function add(){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Add New Sensor';
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('db_name', 'Database Name', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else if(empty($this->input->post('sensor'))){
				$data['error'] = "No Field Sensor";
		    }else{		    	
		    	if($this->input->post('use_mqtt')){
		    		$mqtt = 1;
		    	} else {
		    		$mqtt = 0;
		    	}
		    	$list_field = json_encode($this->input->post('sensor'));
		    	//$list_field = str_replace('"', "'",$list_field );
		    	$input=array(
		    		'created_by' => $this->session->userdata('semar_admin')->_id,
					'project_name' => $this->input->post('db_name'),
					'use_mqtt' => $mqtt,					
					'mqtt_topic' => $this->input->post('mqtt_topic'),
					'mqtt_file' => '',//$this->input->post('mqtt_file'),
					'list_field' => $list_field,
					'link_v_graph' => $this->input->post('link_v_graph'),
					'link_v_maps' => $this->input->post('link_v_maps'),
					'link_v_table' => $this->input->post('link_v_table')
				);
				$respo = $this->sensor_m->add($input);
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}						
		    }
		}
		$data['user_now'] = $this->session->userdata('semar_admin');		
		$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('semar_admin')->_id)->data;	
		$this->load->view('sensor_add_v', $data);
	}		

	public function setting($id){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']= 'Setting Sensor';
		if($this->input->get('alert')=='dbs') $data['success']='Database successfully created';	
		if($this->input->get('alert')=='dbf') $data['error']="Failed to build database";	
		if($this->input->get('alert')=='ids') $data['success']='InfluxDB successfully created';	
		if($this->input->get('alert')=='idf') $data['error']="Failed to build influxDB";	
		if($this->input->get('alert')=='mqtts') $data['success']='MQTT Communication successfully created';	
		if($this->input->get('alert')=='mqttus') $data['success']='MQTT Communication successfully updated';	
		if($this->input->get('alert')=='mqttf') $data['error']="Failed to build MQTT";	
		if($this->input->get('alert')=='mqttf2') $data['error']="MQTT Communication Topic is exist, please change your mqtt topic name";	
		if($this->input->get('alert')=='mqttf3') $data['error']="MQTT Communication Topic not change"; 

		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('db_name', 'Database Name', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else if(empty($this->input->post('sensor'))){
				$data['error'] = "No Field Sensor";
		    }else{		    	
		    	if($this->input->post('use_mqtt')){
		    		$mqtt = 1;
		    	} else {
		    		$mqtt = 0;
		    	}
		    	$list_field = json_encode($this->input->post('sensor'));
		    	$list_field = str_replace('"', "'",$list_field );
		    	$input=array(		    	
					'project_name' => $this->input->post('db_name'),
					'use_mqtt' => $mqtt,					
					'mqtt_topic' => $this->input->post('mqtt_topic'),
					'mqtt_file' => '',//$this->input->post('mqtt_file'),
					'list_field' => $list_field,
					'link_v_graph' => $this->input->post('link_v_graph'),
					'link_v_maps' => $this->input->post('link_v_maps'),
					'link_v_table' => $this->input->post('link_v_table')
				);
				$respo = $this->sensor_m->edit($this->session->userdata('semar_admin')->_id,$id,$input);
				if($respo->is_success){				
					$data['success']=$respo->data;					
				} else {				
					$data['error']=$respo->data;
				}						
		    }
		}		
		$data['sensor'] = $this->sensor_m->get_detail_sensor($id)->data;
		if(!$data['sensor']){
			redirect(base_url('dashboard'));
		}
		$data['user_now'] = $this->session->userdata('semar_admin');	
		$data['list_field'] = json_encode($data['sensor']->list_field);	
		$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('semar_admin')->_id)->data;	
		$this->load->view('sensor_setting_v', $data);
	}		

	

	public function table($id){       
		$data=array();
		$data['title']= 'Table Sensor';		
		$data['sensor'] = $this->sensor_m->get_detail_sensor($id)->data;
		$data['user_now'] = $this->session->userdata('semar_admin');			
		$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('semar_admin')->_id)->data;	
		$this->load->view('sensor_table_v', $data);
	}		

	public function graph($id){       
		$data=array();
		$data['title']= 'Table Sensor';		
		$data['sensor'] = $this->sensor_m->get_detail_sensor($id)->data;
		$data['user_now'] = $this->session->userdata('semar_admin');			
		$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('semar_admin')->_id)->data;	
		$this->load->view('sensor_graph_v', $data);
	}	

	public function maps($id){       
		$data=array();
		$data['title']= 'Table Sensor';		
		$data['sensor'] = $this->sensor_m->get_detail_sensor($id)->data;
		$data['user_now'] = $this->session->userdata('semar_admin');			
		$data['menu_sensor'] = $this->sensor_m->get_detail($this->session->userdata('semar_admin')->_id)->data;	
		$this->load->view('sensor_maps_v', $data);
	}	

	public function delete($id=''){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->sensor_m->del($this->session->userdata('semar_admin')->_id,$id);
			if($del->is_success){
				redirect(base_url().'sensor/?alert=success') ; 			
			} 
		//}
		redirect(base_url().'sensor/?alert=failed') ; 			
	}	

	public function makedb($id=''){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->sensor_m->makedb($id);
			if($del->is_success){
				redirect(base_url().'sensor/setting/'.$id.'/?alert=dbs') ; 			
			} 
		//}
		redirect(base_url().'sensor/setting/'.$id.'/?alert=dbf') ; 			
	}	

	public function makeinflux($id=''){					
		//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
			$del=$this->sensor_m->makeinflux($id);
			if($del->is_success){
				redirect(base_url().'sensor/setting/'.$id.'/?alert=ids') ; 			
			} 
		//}
		redirect(base_url().'sensor/setting/'.$id.'/?alert=idf') ; 			
	}	

	public function makemqtt($id=''){					
		$sensor = $this->sensor_m->get_detail_sensor($id)->data;
		if($sensor){
			$data = array(				
				'created_by' => $this->session->userdata('semar_admin')->_id,
				'database_name' => "sensor_".$sensor->created_by."_".$sensor->database_name,
				'mqtt_topic' =>  $sensor->mqtt_topic,
				'sensor_id' => $id
			);			
			$del=$this->sensor_m->makemqtt($data);
			if($del->is_success){
				$input = array(
					'build_mqtt' => true
				);
				$respo = $this->sensor_m->edit($this->session->userdata('semar_admin')->_id,$id,$input);				
				redirect(base_url().'sensor/setting/'.$id.'/?alert=mqtts') ; 			
			} 
			redirect(base_url().'sensor/setting/'.$id.'/?alert=mqttf2') ; 			
		}
		redirect(base_url().'sensor/setting/'.$id.'/?alert=mqttf') ; 			
	}	

	public function remakemqtt($id=''){									
		$sensor = $this->sensor_m->get_detail_sensor($id)->data;
		$src = array(
			'sensor_id' => $id		
		);
		$old = $this->sensor_m->search_mqtt($src)->data;
		if($sensor && $old){			
			if($old->mqtt_topic != $sensor->mqtt_topic){					
				$new = array(				
					'created_by' => $this->session->userdata('semar_admin')->_id,
					'database_name' => "sensor_".$sensor->created_by."_".$sensor->database_name,
					'mqtt_topic' =>  $sensor->mqtt_topic,
					'sensor_id' => $id
				);	
				$data = array(
					'old_data' => json_encode($old) ,
					'new_data' => json_encode($new)
				);
				$del=$this->sensor_m->updatemqtt($old->_id,$data);						
				if($del->is_success){				
					redirect(base_url().'sensor/setting/'.$id.'/?alert=mqttus') ; 			
				} 
				redirect(base_url().'sensor/setting/'.$id.'/?alert=mqttf2') ; 			
			} 
			redirect(base_url().'sensor/setting/'.$id.'/?alert=mqttf3') ; 			
		}
		redirect(base_url().'sensor/setting/'.$id.'/?alert=mqttf') ; 			
	}	

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
