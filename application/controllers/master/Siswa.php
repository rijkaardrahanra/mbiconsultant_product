<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('SiswaModel','KelasModel','ProgramModel'));
	}

	
	public function index()
	{
       	$session = $this->session->userdata('logged_in')['result'];
		$klien_id = md5($session->USR_USER_ID);

		$data['siswa'] = $this->SiswaModel->getSiswaKlien($klien_id)->result();
		//print_r($data['siswa']);die();
		
		// mysqli_next_result( $this->db->conn_id );
		$data['kelas'] = $this->KelasModel->GetAll()->result();
		$data['program'] = $this->ProgramModel->GetAll()->result();
		//print_r($data['siswa']);die();
		$this->load->view('web_header_admin');
		$this->load->view('views/master/siswa/web_main',$data);
		$this->load->view('web_footer_admin');
	}

	public function excel()
	{
       	$session = $this->session->userdata('logged_in')['result'];
		$klien_id = md5($session->USR_USER_ID);

		$data['siswa'] = $this->SiswaModel->getSiswaKlien($klien_id)->result();
		
		$data['kelas'] = $this->KelasModel->GetAll()->result();
		$data['program'] = $this->ProgramModel->GetAll()->result();
		$this->load->view('views/master/siswa/excel',$data);
		
	}

	public function tambah()
	{	

		$token          = $this->input->post('token');		
		$user          = $this->input->post('username');
		$pass          = $this->input->post('password');		
		$namasiswa       = $this->input->post('nama');
		$almt          = $this->input->post('alamat');
		$phone         = $this->input->post('telepon');
		$email         = $this->input->post('email');
		$kelas         = $this->input->post('kelas');
		$program         = $this->input->post('program');
		
		
		$insert        =  $this->SiswaModel->Insert($token, $user, $pass, $namasiswa, $almt, $phone, $email,$kelas, $program);
		//print_r($insert);die();
		
		if ($insert) {
			echo json_encode(array(
				'status' => 1,
				'pesan' => 'Siswa Berhasil Registrasi'//,
				//'data' => $insert
			));
		}else{
			$this->query_error('Registrasi Gagal');
		}
		
	}
	

	public function hapus()
	{
		$id=$this->input->post('id');

		$delete = $this->SiswaModel->Delete($id);
		if ($delete) {
			echo json_encode(array(
							'status' => 1,
							'pesan' => "Data Berhasil Dihapus"
							));
		}else{
			$this->query_error('Gagal Melakukan Penghapusan Data');
		}
	}

	public function simpanTambah()
	{
		$mapel = $this->input->post('mapel');
		$nama_bab = $this->input->post('nama_bab');
		

		$insert =  $this->BabModel->Insert($mapel, $nama_bab);
		if ($insert) {
			echo json_encode(array(
				'status' => 1,
				'pesan' => 'Berhasil Tersimpan'//,
				//'data' => $insert
			));
		}else{
			$this->query_error('Gagal Tersimpan');
		}
	}
}