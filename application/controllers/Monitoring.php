<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitoring extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('qrcode_m');
		$this->load->model('gugustugas_m');

		//if(!$this->session->userdata('covid-admin')) redirect(base_url() . "auth/login");
	}	

	public function code($qrcode){
		$data=array();
		$data['success']='';
		$data['error']='';
		$query = array(
			'qrcode' => $qrcode,
			'limit' => 1
		);
		$data['qrcode']=$qrcode;
		$code = $this->qrcode_m->search(array('qrcode'=>$qrcode))->data;
		if($code){
			$data['data'] = $this->user_m->search($query)->data;
			if($data['data']){
				$this->session->set_userdata('covid-absen',$data['data'][0]->_id);
				redirect(base_url('monitoring/absen'));
			}
			if(!$this->session->userdata('covid-gugustugas')){
				$this->load->library('form_validation');
		        $data['error'] = FALSE;
		         $this->form_validation->set_rules('username', 'Username', 'xss_clean|required|trim');
		        $this->form_validation->set_rules('password', 'Password', 'xss_clean|required|trim');				        
		        if ($this->form_validation->run($this) == FALSE) {
		           $data['error'] = validation_errors();
		        } else {
		            $user = $this->input->post("username");
		            $pass = $this->input->post('password');
		            $respo = $this->gugustugas_m->login($user, $pass);
		            if($respo->is_success){
						if($respo->data->active){
							$this->session->sess_expiration = '1';										
						    $this->session->set_userdata('covid-gugustugas',$respo->data);
		                    redirect(base_url('monitoring/code/'.$qrcode));
		                } else {
							$data['error'] = "Akun anda tidak aktif, silahkan hubungi Administrator";
						}				
		            } else {
		                if( $respo->data == 'your account is not active')
		                    $data['error'] = "Akun anda tidak aktif, silahkan hubungi Administrator"; 
		                else 
		                    $data['error'] = "Username dan Password anda salah"; 
		            }
		        }
		        $this->load->view('scan_login_v', $data);
			} else {
				$json = file_get_contents('./data-sampang.json');
				$data['kecamatan'] = json_decode($json,true);
				$data['user_now'] = $this->session->userdata('covid-gugustugas');
				if($data['user_now']->level == 'pusat'){
					$data['kec'] = $data['kecamatan'][1];
				} else {
					$data['kec'] = $data['user_now']->level;
				}

				$data['title']='Monitoring User - Proses Registrasi QRCode';
				$this->load->view('scan_v', $data);
			}	
		} else {
			$data['error'] = 'QR Code Tidak Terdaftar, Silahkan hubungi pihak Administrator';
			$this->load->view('scan_error_v', $data);
		}
	}

	public function index(){
		$data['error'] = 'QR Code Tidak Terdaftar, Silahkan hubungi pihak Administrator';
		$this->load->view('scan_error_v', $data);
	}

	public function edit($id){  
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Ubah User';
		if($this->input->post('loc_lat') && $this->input->post('loc_long')){
			$input=array(
				'qrcode' => $this->input->post('qrcode'),
				'loc_lat' => $this->input->post('loc_lat'),
				'loc_long' => $this->input->post('loc_long'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kelurahan' => $this->input->post('kelurahan')
			);
			$respo = $this->user_m->scan($id,$input);
			if($respo->is_success){				
				echo 'Success';
			} else {				
				echo 'Error';
			}								
		} else {				
			echo 'Error-2';
		}			
	}

	public function detail($id,$qrcode){  
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['title']='Ubah User';
		$data['data'] = $this->user_m->get_detail($id)->data;
		if(!$data['data']){
			$data['error']='Tidak ada data';
		}
		$data['qrcode'] = $qrcode;	
		$this->load->view('scan_detail_v', $data);		
	}

	public function absen(){
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['error2']='';
		$data['title']='Absen - Pasien Covid-19';
		if($this->session->userdata('covid-absen')){
			$id = $this->session->userdata('covid-absen');
			$data['data'] = $this->user_m->get_detail($id)->data;
			if($this->input->post('save')){
				$input=array(
					'loc_lat' => $this->input->post('loc_lat'),
					'loc_long' => $this->input->post('loc_long'),
					'kecamatan' => $data['data']->kecamatan,
					'kelurahan' => $data['data']->kelurahan,
					'qrcode' => $data['data']->qrcode,
					'level' =>  $data['data']->level,
					'level_status' =>  $data['data']->level_status,
					'kondisi' => $this->input->post('kondisi')
				);
				$respo = $this->user_m->scan($id,$input);
				if($respo->is_success){				
					$data['success']='Proses Absen Berhasil, <b>Sistem akan menutup dalam waktu 10 detik</b>';
				} else {				
					$data['error']='Proses Absen Gagal, Silahkan Ulangi Lagi, Pastikan GPS Anda Aktif';
				}								
			}
		} else {
			$data['error2']='Silahkan Scan Barcode Anda Terlebih Dahulu';
		}
		$this->load->view('scan_absen_v', $data);
	}

    public function search(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Data berhasil dihapus';	
		if($this->input->get('alert')=='failed') $data['error']="Data gagal dihapus";
		$data['title']='Tampilan tabel - Pasien Covid-19';

		// $hal = $this->input->get('hal');
		// if( $this->input->get('hal') == '' ) $hal = 1;

		// $query = array(
		// 	'limit' => $limit,
		// 	'skip' => ($hal-1) * $limit
		// );
		// $query2 = array();
		
		$query = array( "noqr"=>true );
		if($this->input->post('phone'))
			$query['phone'] = $this->input->post('phone');
		if($this->input->post('name'))
			$query['nama'] = $this->input->post('name');
		if($this->input->post('kecamatan'))
			$query['kecamatan'] = $this->input->post('kecamatan');
		if($this->input->post('kelurahan'))
			$query['kelurahan'] = $this->input->post('kelurahan');

		$json = file_get_contents('./data-sampang.json');
		$data['kecamatan'] = json_decode($json,true);
		$data['user_now'] = $this->session->userdata('covid-gugustugas');
		if( $data['user_now']->level != 'pusat'){
			$query['kecamatan'] = $data['user_now']->level;
			//$query2['kecamatan'] = $data['user_now']->level;
		}
		$data['data'] = $this->user_m->search($query)->data;
		// $data['total'] = $this->user_m->search_count($query2)->data;
		// $data['pagination'] = $this->user_m->page($data['total'],$limit,$hal);
		$this->load->view('scan_user_v', $data);
	}

	public function logout($qrcode=""){		
    	 $this->session->set_userdata('covid-gugustugas');
    	 if($qrcode)
		 	redirect(base_url('monitoring/code/'.$qrcode));
		 else 
		 	redirect(base_url('monitoring'));
    }

    public function userlogout($qrcode=""){		
    	$this->session->set_userdata('covid-gugustugas');
    	redirect(base_url('monitoring'));
    }


    public function success($qrcode=""){		
    	 $this->session->set_userdata('covid-gugustugas');
    	 if($qrcode){
		 	$data['success'] = 'Proses Registrasi QR Code Berhasil';
			$this->load->view('scan_success_v', $data);
		 } else {
		 	redirect(base_url('monitoring'));
		 }
    }

    public function successabsen($qrcode=""){		
    	 $this->session->set_userdata('covid-absen');
    	 if($qrcode){
		 	$data['success'] = 'Proses Absen Berhasil';
			$this->load->view('scan_success_v', $data);
		 } else {
		 	redirect(base_url('monitoring'));
		 }
    }
}

/* End of file  */
/* Location: ./application/controllers/ */
