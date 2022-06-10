<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('MapelModel'));
	}

	public function index()
	{
        $data['mapels'] = $this->MapelModel->GetAll()->result();
        
		$this->load->view('web_header_admin');
		$this->load->view('views/master/mapel/web_main',$data);
		$this->load->view('web_footer_admin');
	}

	public function hapus()
	{
		$id=$this->input->post('id');

		$delete = $this->MapelModel->Delete($id);
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
		$nama_mapel = $this->input->post('nama_mapel');
		

		$insert =  $this->MapelModel->Insert($nama_mapel);
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