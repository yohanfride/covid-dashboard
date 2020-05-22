<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('daily_m');
		if(!$this->session->userdata('covid-admin')) redirect(base_url() . "auth/login");
	}	
	
    public function add(){ 
    	$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Tambah User';
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Nama User', 'required');
			$this->form_validation->set_rules('level', 'Level', 'required');
			$this->form_validation->set_rules('level_status', 'Level Status', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = validation_errors();
			} else{
				print_r($this->input->post());

				$input=array(
					'level' => $this->input->post('level'),
					'level_status' => $this->input->post('level_status'),
					'nama' => $this->input->post('name'),
					'jenis_kelamin' =>  $this->input->post('jenis_kelamin'),
					'kecamatan' => $this->input->post('kecamatan'),
					'kelurahan' =>  $this->input->post('kelurahan'),
					'alamat' =>  $this->input->post('alamat'),
					'tgl_lahir' =>  $this->input->post('tgl_lahir'),
					'phone' => $this->input->post('phone'),
					'riwayat_perjalanan' =>  $this->input->post('riwayat_perjalanan'),
					'keluhan' =>  $this->input->post('keluhan')
				);
				$respo = $this->user_m->add($input);
				if($respo->is_success){	
					$data['success']='Data berhasil ditambahkan';
				} else {				
					$data['error']='Data gagal ditambahkan';
				}
		    }
		}	
		$data['level_status'] = array(
			"confirm" => ['Dirawat', 'Pengawasan' ,'Sembuh', 'Meninggal'],
			"pdp" => ['Dirawat','Sembuh','Meninggal'],
			"odp" => ['Dipantau','Selesai dipantau','Meninggal'],
			"odr" => ['Dipantau','Selesai dipantau']
		);
		$json = file_get_contents('data-sampang.json');
		$data['kecamatan'] = json_decode($json,true);
		$data['user_now'] = $this->session->userdata('covid-admin');							
		if($data['user_now']->level != 'admin' && $data['user_now']->level != 'master-admin' && $data['user_now']->level != 'pusat'){
			$data['kec'] = $data['user_now']->level;
		} else {
			$data['kec'] = $data['kecamatan']['Kecamatan'][0];
		}
		$this->load->view('user_add_v', $data);		
	}

	public function edit($id){  
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Ubah User';
		if($this->input->post('save')){
			$input=array(
				'level' => $this->input->post('level'),
				'level_status' => $this->input->post('level_status'),
				'nama' => $this->input->post('nama'),
				'tgl_lahir' =>  $this->input->post('tgl_lahir'),
				'jenis_kelamin' =>  $this->input->post('jenis_kelamin'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kelurahan' =>  $this->input->post('kelurahan'),
				'alamat' =>  $this->input->post('alamat'),
				'phone' => $this->input->post('phone'),
				'riwayat_perjalanan' =>  $this->input->post('riwayat_perjalanan'),
				'keluhan' =>  $this->input->post('keluhan')
			);
			$respo = $this->user_m->edit($id,$input);
			if($respo->is_success){				
				$data['success']='Data berhasil diubah';
			} else {				
				$data['error']='Data gagal diubah';
			}								
		}
		$data['data'] = $this->user_m->get_detail($id)->data;
		if(!$data['data']){
			$data['error']='Tidak ada data';
		}	
		$data['level_status'] = array(
			"confirm" => ['Dirawat', 'Pengawasan' ,'Sembuh', 'Meninggal'],
			"pdp" => ['Dirawat','Sembuh','Meninggal'],
			"odp" => ['Dipantau','Selesai dipantau','Meninggal'],
			"odr" => ['Dipantau','Selesai dipantau']
		);
		$json = file_get_contents('data-sampang.json');
		$data['kecamatan'] = json_decode($json,true);
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('user_edit_v', $data);		
	}

    public function index(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Data berhasil dihapus';	
		if($this->input->get('alert')=='failed') $data['error']="Data gagal dihapus";
		$data['title']='Tampilan tabel - Pasien Covid-19';

		$hal = $this->input->get('hal');
		if( $this->input->get('hal') == '' ) $hal = 1;
		$data['kec'] = '';
		$data['kel'] = '';
		$data['nama'] = '';
		$data['lvl'] = '';
		$data['lvlstat'] = '';
		$limit = 20;
		$query = array(
			'limit' => $limit,
			'skip' => ($hal-1) * $limit
		);
		$query2 = array();

		if($this->input->get('kec')){
			$data['kec'] = $this->input->get('kec');
			$query['kecamatan'] = $data['kec'];
			$query2['kecamatan'] = $data['kec'];
		}
		if($this->input->get('kel')){
			$data['kel'] = $this->input->get('kel');
			$query['kelurahan'] = $data['kel'];
			$query2['kelurahan'] = $data['kel'];
		}
		if($this->input->get('nama')){
			$data['nama'] = $this->input->get('nama');
			$query['nama'] = $data['nama'];
			$query2['nama'] = $data['nama'];
		}
		if($this->input->get('lvl')){
			$data['lvl'] = $this->input->get('lvl');
			$query['level'] = $data['lvl'];
			$query2['level'] = $data['lvl'];
		}
		if($this->input->get('lvlstat')){
			$data['lvlstat'] = $this->input->get('lvlstat');
			$query['level_status'] = $data['lvlstat'];
			$query2['level_status'] = $data['lvlstat'];
		}
		
		$data['level_status'] = array(
			"confirm" => ['Dirawat', 'Pengawasan' ,'Sembuh', 'Meninggal'],
			"pdp" => ['Dirawat','Sembuh','Meninggal'],
			"odp" => ['Dipantau','Selesai dipantau','Meninggal'],
			"odr" => ['Dipantau','Selesai dipantau']
		);
		
		$json = file_get_contents('./data-sampang.json');
		$data['kecamatan'] = json_decode($json,true);
		$data['user_now'] = $this->session->userdata('covid-admin');
		if($data['user_now']->level != 'admin' && $data['user_now']->level != 'master-admin' && $data['user_now']->level != 'pusat'){
			$query['kecamatan'] = $data['user_now']->level;
			$query2['kecamatan'] = $data['user_now']->level;
			$data['kec'] =  $data['user_now']->level;
		} else {
			$data['pusat'] = true;
		}
		$data['data'] = $this->user_m->search($query)->data;
		$data['total'] = $this->user_m->search_count($query2)->data;
		$data['pagination'] = $this->user_m->page($data['total'],$limit,$hal);
		$this->load->view('user_v', $data);
	}

	public function detaillog($id){  
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Ubah User';
		$data['log'] = $this->user_m->get_detail_log($id)->data;
		if($data['log']){
			$data['data'] = $this->user_m->get_detail($data['log']->iduser)->data;
			if(!$data['data']){
				$data['error']='Tidak ada data';
			}
		} else {
			$data['error']='Tidak ada data';
		}

		$data['level_status'] = array(
			"confirm" => ['Dirawat', 'Pengawasan' ,'Sembuh', 'Meninggal'],
			"pdp" => ['Dirawat','Sembuh','Meninggal'],
			"odp" => ['Dipantau','Selesai dipantau','Meninggal'],
			"odr" => ['Dipantau','Selesai dipantau']
		);
		$json = file_get_contents('data-sampang.json');
		$data['kecamatan'] = json_decode($json,true);
		$data['user_now'] = $this->session->userdata('covid-admin');					
		$this->load->view('user_log_detail_v', $data);		
	}

	public function log(){        
		$data=array();
		$data['success']='';
		$data['error']='';

		$data['title']='Manajemen Log - Pasien Covid-19';

		$hal = $this->input->get('hal');
		if( $this->input->get('hal') == '' ) $hal = 1;
		
		$data['str_date'] = date("Y-m-d");
		$data['end_date'] = date("Y-m-d");
		$data['kec'] = '';
		$data['kel'] = '';
		$data['nama'] = '';
		$data['lvl'] = '';
		$data['lvlstat'] = '';
		if($this->input->get('str')){
			$data['str_date'] = $this->input->get('str');
		}
		if($this->input->get('end')){
			$data['end_date'] = $this->input->get('end');
		}
		$limit = 20;
		$query = array(
			"str_date" => $data['str_date'],
			"end_date" => $data['end_date'],
			'limit' => $limit,
			'skip' => ($hal-1) * $limit
		);
		$query2 = array(
			"str_date" => $data['str_date'],
			"end_date" => $data['end_date']
		);

		if($this->input->get('kec')){
			$data['kec'] = $this->input->get('kec');
			$query['kecamatan'] = $data['kec'];
			$query2['kecamatan'] = $data['kec'];
		}
		if($this->input->get('kel')){
			$data['kel'] = $this->input->get('kel');
			$query['kelurahan'] = $data['kel'];
			$query2['kelurahan'] = $data['kel'];
		}
		if($this->input->get('nama')){
			$data['nama'] = $this->input->get('nama');
			$query['nama'] = $data['nama'];
			$query2['nama'] = $data['nama'];
		}
		if($this->input->get('lvl')){
			$data['lvl'] = $this->input->get('lvl');
			$query['level'] = $data['lvl'];
			$query2['level'] = $data['lvl'];
		}
		if($this->input->get('lvlstat')){
			$data['lvlstat'] = $this->input->get('lvlstat');
			$query['level_status'] = $data['lvlstat'];
			$query2['level_status'] = $data['lvlstat'];
		}

		$data['level_status'] = array(
			"confirm" => ['Dirawat', 'Pengawasan' ,'Sembuh', 'Meninggal'],
			"pdp" => ['Dirawat','Sembuh','Meninggal'],
			"odp" => ['Dipantau','Selesai dipantau','Meninggal'],
			"odr" => ['Dipantau','Selesai dipantau']
		);
		
		$json = file_get_contents('./data-sampang.json');
		$data['kecamatan'] = json_decode($json,true);

		$data['user_now'] = $this->session->userdata('covid-admin');
		if($data['user_now']->level != 'admin' && $data['user_now']->level != 'master-admin' && $data['user_now']->level != 'pusat'){
			$query['kecamatan'] = $data['user_now']->level;
			$query2['kecamatan'] = $data['user_now']->level;
			$data['kec'] =  $data['user_now']->level;
		} else {
			$data['pusat'] = true;
		}

		$data['data'] = $this->user_m->search_log($query)->data;
		$data['total'] = $this->user_m->search_count_log($query2)->data;
		$data['pagination'] = $this->user_m->page($data['total'],$limit,$hal);
		$this->load->view('user_log_v', $data);
	}

	 public function maps(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Data berhasil dihapus';	
		if($this->input->get('alert')=='failed') $data['error']="Data gagal dihapus";
		$data['title']='Tampilan tabel - Pasien Covid-19';

		$hal = $this->input->get('hal');
		if( $this->input->get('hal') == '' ) $hal = 1;
		$data['kec'] = '';
		$data['kel'] = '';
		$data['lvl'] = '';
		$data['lvlstat'] = '';
		$limit = 200;
		$query = array(
			'limit' => $limit,
			'skip' => ($hal-1) * $limit
		);
		$query2 = array();

		if($this->input->get('kec')){
			$data['kec'] = $this->input->get('kec');
			$query['kecamatan'] = $data['kec'];
			$query2['kecamatan'] = $data['kec'];
		}
		if($this->input->get('kel')){
			$data['kel'] = $this->input->get('kel');
			$query['kelurahan'] = $data['kel'];
			$query2['kelurahan'] = $data['kel'];
		}
		if($this->input->get('lvl')){
			$data['lvl'] = $this->input->get('lvl');
			$query['level'] = $data['lvl'];
			$query2['level'] = $data['lvl'];
		}
		if($this->input->get('lvlstat')){
			$data['lvlstat'] = $this->input->get('lvlstat');
			$query['level_status'] = $data['lvlstat'];
			$query2['level_status'] = $data['lvlstat'];
		}
		
		$data['level_status'] = array(
			"confirm" => ['Dirawat', 'Pengawasan' ,'Sembuh', 'Meninggal'],
			"pdp" => ['Dirawat','Sembuh','Meninggal'],
			"odp" => ['Dipantau','Selesai dipantau','Meninggal'],
			"odr" => ['Dipantau','Selesai dipantau']
		);
		
		$json = file_get_contents('./data-sampang.json');
		$data['kecamatan'] = json_decode($json,true);
		$data['user_now'] = $this->session->userdata('covid-admin');
		if($data['user_now']->level != 'admin' && $data['user_now']->level != 'master-admin' && $data['user_now']->level != 'pusat'){
			$query['kecamatan'] = $data['user_now']->level;
			$query2['kecamatan'] = $data['user_now']->level;
			$data['kec'] =  $data['user_now']->level;
		} else {
			$data['pusat'] = true;
		}
		$data['total'] = $this->user_m->search_count($query2)->data;
		$data['total'] = ($data['total'])?$data['total']:0;

		$data['limit'] = $limit;
		$data['current'] = $this->daily_m->today()->data;
		// echo '<pre>';
		// 	print_r($data);
		// 	echo '</pre>';
		// 	exit();
		$this->load->view('user_maps_v', $data);
	}

	public function get_data_user(){
		$data=array();
		$hal = $this->input->get('hal');
		if( $this->input->get('hal') == '' ) $hal = 1;
		$limit = 200;
		$query = array(
			'limit' => $limit,
			'skip' => ($hal-1) * $limit
		);
		if($this->input->get('kec')){
			$query['kecamatan'] = $this->input->get('kec');
		}
		if($this->input->get('kel')){
			$query['kelurahan'] = $this->input->get('kel');
		}
		if($this->input->get('lvl')){
			$query['level'] = $this->input->get('lvl');
		}
		if($this->input->get('lvlstat')){
			$query['level_status'] = $this->input->get('lvlstat');
		}

		$data['user_now'] = $this->session->userdata('covid-admin');
		if($data['user_now']->level != 'admin' && $data['user_now']->level != 'master-admin' && $data['user_now']->level != 'pusat'){
			$query['kecamatan'] = $data['user_now']->level;
		} 
		$data['data'] = $this->user_m->search($query)->data;
		$res = array();
		foreach ($data['data'] as $key => $value) {
			if(!empty($value->lokasi)){
				$lvlstat = $value->level_status;
				if($value->level_status == "Dipantau")
					$lvlstat = "Dalam Pemantauan";
				if($value->level_status == "Dirawat")
					$lvlstat = "Dalam Perawatan";
				if($value->level_status == "Pengawasan")
					$lvlstat = "Dalam Pengawasan";
				if($value->level_status == "Selesai dipantau")
					$lvlstat = "Selesai Pemantauan";

				$res[] = array(
					'nama' => $value->nama,
					'umur' => date_diff(date_create(date( "Y-m-d", strtotime( $value->tgl_lahir))), date_create('today'))->y,
					'phone' => $value->phone,
					'alamat' => $value->alamat,
					'level' => $value->level,
					'levelstat' => $lvlstat,
					'jenis_kelamin' => $value->jenis_kelamin,
					'kelurahan' => $value->kelurahan,
					'kecamatan' => $value->kecamatan,
					'last_update' => date( "Y-m-d H:i:s", strtotime( $value->date_updated)) ,
					'latitude' => $value->lokasi->coordinates[1],
					'longitude' => $value->lokasi->coordinates[0],
				);
			}
		}
		header('Content-Type: application/json');
    	echo json_encode( $res );
	}

	public function grafik(){
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['user_now'] = $this->session->userdata('covid-admin');

		$data['title']='Manajemen Log - Pasien Covid-19';
		$data['str_date'] = '';
		$data['end_date'] = '';
		$data['kec'] = '';
		if($this->input->get('str')){
			$data['str_date'] = $this->input->get('str');
		}
		if($this->input->get('end')){
			$data['end_date'] = $this->input->get('end');
		}

		if(!empty($data['str_date']) && !empty($data['str_date']) ){
			$query2 = array(
				"str_date" => $data['str_date'],
				"end_date" => $data['end_date'],
				'sort'=>'date_add'
			);
			$data['dailes'] = $this->daily_m->search($query2)->data;	
		} else {
			$data['str_date'] = date("Y-m-d");
			$data['end_date'] = date("Y-m-d");
		}
		if($this->input->get('kec')){
			$data['kec'] = $this->input->get('kec');
		}	
		if($data['user_now']->level != 'admin' && $data['user_now']->level != 'master-admin' && $data['user_now']->level != 'pusat'){
			$data['kec'] =  $data['user_now']->level;
		} else {
			$data['pusat'] = true;
		}
		$json = file_get_contents('./data-sampang.json');
		$data['kecamatan'] = json_decode($json,true);	

		$this->load->view('user_graph_v', $data);
	}

	// public function delete($id=''){					
	// 	//if(!$this->antrian_m->cek_hapus_g($data->NIP)){
	// 		$del=$this->user_m->del($id);
	// 		if($del->is_success){
	// 			redirect(base_url().'user/?alert=success') ; 			
	// 		} 
	// 	//}
	// 	redirect(base_url().'user/?alert=failed') ; 			
	// }

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

/* End of file  */
/* Location: ./application/controllers/ */
