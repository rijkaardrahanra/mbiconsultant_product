<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('KelasModel','JenjangModel'));
	}

	public function index()
	{
        $data['kelass'] = $this->KelasModel->GetAll()->result();
        $data['jenjangs'] = $this->JenjangModel->GetAll()->result();
        
		$this->load->view('web_header_admin');
		$this->load->view('views/master/kelas/web_main',$data);
		$this->load->view('web_footer_admin');
	}

	public function hapus()
	{
		$id=$this->input->post('id');

		$delete = $this->KelasModel->Delete($id);
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
		$jenjang = $this->input->post('jenjang');
		$nama_kelas = $this->input->post('nama_kelas');
		

		$insert =  $this->KelasModel->Insert($jenjang,$nama_kelas);
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