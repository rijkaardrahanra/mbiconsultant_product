<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataBankSoal extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('encryption');
        $this->load->model(array('KlienModel', 'TipeKlienModel', 'PaketUjianModel','ManMapelModel','BabModel','BankSoalModel'));
	}

	public function index()
	{
        $data['manmapels'] = $this->ManMapelModel->ShowManMapelForBankSoal()->result();
        //print_r($data['manmapels']);die();
		$this->load->view('web_header_admin');
		$this->load->view('views/databanksoal/web_main',$data);
		$this->load->view('web_footer_admin');
	}

	public function pertanyaan()
	{
		$id = $this->uri->segment(3);
		$data['babs'] = $this->BabModel->ShowByIDForBankSoal($id)->result();
		$data['idmanmapel'] = $this->ManMapelModel->GetIDByForBankSoal($id)->result()[0];
		//print_r($data['idmanmapel']);die();
		$this->load->view('web_header_admin');
		$this->load->view('views/databanksoal/web_pertanyaan',$data);
		$this->load->view('web_footer_admin');
	}

	public function editPertanyaan()
	{
		//print_r($this->uri->segment(4));die();
		$id = $this->uri->segment(3);
		$idbanksoal = $this->uri->segment(4);
		$data['babs'] = $this->BabModel->ShowByIDForBankSoal($id)->result();
		$data['idmanmapel'] = $this->ManMapelModel->GetIDByForBankSoal($id)->result()[0];
		$data['soal'] = $this->BankSoalModel->GetDataEdit($idbanksoal)->result();

		$this->load->view('web_header_admin');
		$this->load->view('views/databanksoal/web_editpertanyaan',$data);
		$this->load->view('web_footer_admin');
	}

	public function simpanTambah()
	{
		$question = $this->input->post('question');
		$option_a = $this->input->post('option_a');
		$option_b = $this->input->post('option_b');
		$option_c = $this->input->post('option_c');
		$option_d = $this->input->post('option_d');
		$option_e = $this->input->post('option_e');
		$correct_ans = $this->input->post('correct_ans');
		$idmanmapel = $this->input->post('idmanmapel');
		$bab_id = $this->input->post('bab_id');
		$tingkatsulit = $this->input->post('tingkatsulit');
		$bobotbenar = $this->input->post('bobotbenar');
		$bobotsalah = $this->input->post('bobotsalah');
		$bobottidakjawab = $this->input->post('bobottidakjawab');

		$insert = $this->BankSoalModel->Insert($question,$option_a,$option_b,$option_c,$option_d,$option_e,$correct_ans,$idmanmapel,$bab_id,$tingkatsulit,$bobotbenar,$bobotsalah,$bobottidakjawab);
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

	public function simpanTambahFromDetail()
	{
		$question = $this->input->post('question');
		$option_a = $this->input->post('option_a');
		$option_b = $this->input->post('option_b');
		$option_c = $this->input->post('option_c');
		$option_d = $this->input->post('option_d');
		$option_e = $this->input->post('option_e');
		$correct_ans = $this->input->post('correct_ans');
		$idmanmapel = $this->input->post('idmanmapel');
		$bab_id = $this->input->post('bab_id');
		$tingkatsulit = $this->input->post('tingkatsulit');
		$bobotbenar = $this->input->post('bobotbenar');
		$bobotsalah = $this->input->post('bobotsalah');
		$bobottidakjawab = $this->input->post('bobottidakjawab');
		$idpaket_ujianmd5 = $this->input->post('url');

		$insert = $this->BankSoalModel->InsertFromDetail($question,$option_a,$option_b,$option_c,$option_d,$option_e,$correct_ans,$idmanmapel,$bab_id,$tingkatsulit,$bobotbenar,$bobotsalah,$bobottidakjawab,$idpaket_ujianmd5);
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

	public function updateQuestion()
	{
		$idbanksoal = $this->input->post('idbanksoal');
		$idsoal = $this->input->post('idsoal');
		$question = $this->input->post('question');
		$option_a = $this->input->post('option_a');
		$option_b = $this->input->post('option_b');
		$option_c = $this->input->post('option_c');
		$option_d = $this->input->post('option_d');
		$option_e = $this->input->post('option_e');
		$correct_ans = $this->input->post('correct_ans');
		$idmanmapel = $this->input->post('idmanmapel');
		$bab_id = $this->input->post('bab_id');
		$tingkatsulit = $this->input->post('tingkatsulit');
		$bobotbenar = $this->input->post('bobotbenar');
		$bobotsalah = $this->input->post('bobotsalah');
		$bobottidakjawab = $this->input->post('bobottidakjawab');

		$update = $this->BankSoalModel->Update($idbanksoal,$idsoal,$question,$option_a,$option_b,$option_c,$option_d,$option_e,$correct_ans,$idmanmapel,$bab_id,$tingkatsulit,$bobotbenar,$bobotsalah,$bobottidakjawab);
		if ($update) {
			echo json_encode(array(
				'status' => 1,
				'pesan' => 'Berhasil Tersimpan'
			));
		}else{
			$this->query_error('Gagal Tersimpan');
		}
	}

	public function deleteQuestion()
	{
		$idbanksoal = $this->input->post('idbanksoal');

		$delete = $this->BankSoalModel->Delete($idbanksoal);
		if ($delete) {
			echo json_encode(array(
				'status' => 1,
				'pesan' => 'Berhasil Terhapus'
			));
		}else{
			$this->query_error('Gagal Terhapus');
		}
	}
}
