<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenjang extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('JenjangModel'));
	}

	public function index()
	{
        $data['jenjangs'] = $this->JenjangModel->GetAll()->result();
        
		$this->load->view('web_header_admin');
		$this->load->view('views/master/jenjang/web_main',$data);
		$this->load->view('web_footer_admin');
	}

	public function hapus()
	{
		$id=$this->input->post('id');

		$delete = $this->JenjangModel->Delete($id);
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
		$nama_jenjang = $this->input->post('nama_jenjang');
		

		$insert =  $this->JenjangModel->Insert($nama_jenjang);
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