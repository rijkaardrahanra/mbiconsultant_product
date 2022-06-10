<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('UserModel' , 'KlienModel', 'TipeKlienModel', 'PaketUjianModel','SiswaModel','KelasModel'));
	}

	public function index($token=''){
		$this->formRegistrasi($token);
	}
	public function formRegistrasi($token='')
	{	
		$data['token'] = $token;
		$data['kelass'] = $this->KelasModel->GetAll()->result();
		$data['provs'] = $this->KlienModel->GetProvinsi()->result();
		$data['kabkots'] = $this->KlienModel->GetKabKot()->result();

		$this->load->view('registrasi/web_header_login');
        $this->load->view('registrasi/web_siswa_registrasi',$data);
        $this->load->view('registrasi/web_footer_login');
	}

	public function submitRegistrasi()
	{	

		$token          = $this->input->post('token');
		$clienttype_id = '';
		$user          = $this->input->post('username');
		$pass          = $this->input->post('password');
		$kel_id        = 1;
		$nmklien       = $this->input->post('nama');
		$almt          = $this->input->post('alamat');
		$phone         = $this->input->post('telepon');
		$email         = $this->input->post('email');
		$kelas         = $this->input->post('kelas');
		$start_date    = date('Y m d');
		
		$insert        =  $this->SiswaModel->Insert($token,$clienttype_id, $user, $pass, $kel_id, $nmklien, $almt, $phone, $email, $start_date,$kelas);
		
		if ($insert) {
			echo json_encode(array(
				'status' => 1,
				'pesan' => 'Anda Berhasil Registrasi'//,
				//'data' => $insert
			));
		}else{
			$this->query_error('Registrasi Gagal');
		}
		
	}


	

}
