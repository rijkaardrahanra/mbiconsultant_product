<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bab extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('BabModel','MapelModel'));
	}

	public function index()
	{
        $data['babs'] = $this->BabModel->GetAll()->result();
        $data['mapels'] = $this->MapelModel->GetAll()->result();
        
		$this->load->view('web_header_admin');
		$this->load->view('views/master/bab/web_main',$data);
		$this->load->view('web_footer_admin');
	}

	public function hapus()
	{
		$id=$this->input->post('id');

		$delete = $this->BabModel->Delete($id);
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