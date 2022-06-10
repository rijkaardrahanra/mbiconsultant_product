<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('ProgramModel'));
	}

	public function index()
	{
        $data['programs'] = $this->ProgramModel->GetAll()->result();
        
		$this->load->view('web_header_admin');
		$this->load->view('views/master/program/web_main',$data);
		$this->load->view('web_footer_admin');
	}

	public function hapus()
	{
		$id=$this->input->post('id');

		$delete = $this->ProgramModel->Delete($id);
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
		$nama_program = $this->input->post('nama_program');
		

		$insert =  $this->ProgramModel->Insert($nama_program);
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