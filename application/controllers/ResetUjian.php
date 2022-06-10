<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetUjian extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('JenjangModel','KelasModel','MapelModel','ProgramModel','ManMapelModel','ResetUjianModel'));
	}

	public function index()
	{
        $data['jenjangs'] = $this->JenjangModel->GetAll()->result();
        $data['kelass'] = $this->KelasModel->GetAll()->result();
        $data['mapels'] = $this->MapelModel->GetAll()->result();
        $data['programs'] = $this->ProgramModel->GetAll()->result();
        $data['manmapels'] = $this->ManMapelModel->GetAll($this->session->userdata('logged_in')['result']->USR_USER_ID)->result();

        $data['dataujians'] = $this->ResetUjianModel->GetDataUjianFromKlien()->result();
        //print_r($data['dataujians']);die();
        //print_r($data);die();
		$this->load->view('web_header_admin');
		$this->load->view('views/resetujian/web_main',$data);
		$this->load->view('web_footer_admin');
	}

	public function detailSiswaUjian()
	{
		//print_r('Sedang Maintenance ....');die();
        //print_r($data['dataujians']);die();
        //print_r($data);die();
		$iddetail = $this->uri->segment(3);
		$data['siswas'] = $this->ResetUjianModel->GetSiswaByUjian($iddetail)->result();
		//print_r($data);die();
		$this->load->view('web_header_admin');
		$this->load->view('views/resetujian/web_detailsiswaujian',$data);
		$this->load->view('web_footer_admin');
	}

	public function resetsiswa()
	{
		$siswa = $this->input->post('id');
		$iddetail = $this->input->post('iddetailpaket');

		try {
			$reset = $this->ResetUjianModel->ResetSiswa($siswa,$iddetail);
			if($reset) {
				echo json_encode(array(
					'status' => 1,
					'pesan' => 'Berhasil Reset'//,
					//'data' => $insert
				));
			}else{
				throw new Exception('Gagal Reset');
			}
		}catch (\Exception $e) {
			$this->query_error($e->getMessage());
		}


	}

	

	public function simpanTambah()
	{
		$mapel = $this->input->post('mapel');
		$kelas = $this->input->post('kelas');
		$program = $this->input->post('program');
		if (!$program) {
			$program = 'NULL';
		}
		$user_id = $this->session->userdata('logged_in')['result']->USR_USER_ID;

		try {
			$insert = $this->ManMapelModel->Insert($kelas, $program, $mapel, $user_id);
			if($insert) {
				echo json_encode(array(
					'status' => 1,
					'pesan' => 'Berhasil Tersimpan'//,
					//'data' => $insert
				));
			}else{
				throw new Exception('Gagal Tersimpan');
			}
		}catch (\Exception $e) {
			$this->query_error($e->getMessage());
		}
	}

	public function hapusData()
	{
		$id = $this->input->post('id');

		try {
			$delete = $this->ManMapelModel->Delete($id);
			if($delete) {
				echo json_encode(array(
					'status' => 1,
					'pesan' => 'Berhasil Terhapus'
				));
			}else{
				throw new Exception('Gagal Terhapus');
			}
		}catch (\Exception $e) {
			$this->query_error($e->getMessage());
		}
	}
}