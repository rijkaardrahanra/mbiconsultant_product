<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSiswaKlien extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('encryption');
        $this->load->model(array('KlienModel', 'TipeKlienModel','SiswaModel'));
        $this->encryption->initialize(
		        array(
		                'cipher' => 'aes-256',
		                'mode' => 'ctr',
		                'key' => '<a 32-character random string>'
		        )
		);
	}

	public function index()
	{
        $data['kliens'] = $this->KlienModel->GetAll()->result();
        $data['tipekliens'] = $this->TipeKlienModel->GetAll()->result();

        $data['provs'] = $this->KlienModel->GetProvinsi()->result();
        $data['kabkots'] = $this->KlienModel->GetKabKot()->result();
		$this->load->view('web_header_admin');
		$this->load->view('views/dataklien/web_main',$data);
		$this->load->view('web_footer_admin');
	}

	public function detailKlien()
	{
		$id = $this->uri->segment(3);
        $data['tipekliens'] = $this->TipeKlienModel->GetAll()->result();
        $data['klien'] = $this->KlienModel->GetEditData($id)->result()[0];
        $data['paketujians'] = $this->PaketUjianModel->GetAll($id)->result();
        $data['provs'] = $this->KlienModel->GetProvinsi()->result();
        $data['kabkots'] = $this->KlienModel->GetKabKot()->result();
		$this->load->view('web_header_admin');
		$this->load->view('views/dataklien/web_detail',$data);
		$this->load->view('web_footer_admin');
	}

	public function getKecamatanByProvinsi()
	{
		$idprov = $this->input->post('idprov');
		$getKecamatan = $this->KlienModel->GetKecamatanByProvinsi($idprov)->result();

		if ($getKecamatan) {
			$data='<option value="">Pilih Kecamatan</option>';
	        foreach($getKecamatan as $datakecamatan)
	        {
	        	$data .= '<option value="'.$datakecamatan->ID_KECAMATAN.'" data-kabkot="'.$datakecamatan->ID_KABUPATENKOTA.'">'.CapitalizeEachWord($datakecamatan->NAMA_LOKASI).'</option><br>';;
	        }
			echo json_encode(array(
							'status' => 1,
							'pesan' => "Data Berhasil Tersimpan.",
							'data' => $data
							));
		}else{
			$this->query_error('Error');
		}
	}

	public function getKelurahanByKabKot()
	{
		$idkabkot = $this->input->post('idkabkot');
		$getKelurahan = $this->KlienModel->GetKelurahanByKabupaten($idkabkot)->result();

		if ($getKelurahan) {
			$data='<option value="">Pilih Kelurahan</option>';
	        foreach($getKelurahan as $datakelurahan)
	        {
	        	$data .= '<option value="'.$datakelurahan->ID_KELURAHAN.'" data-kec="'.$datakelurahan->ID_KECAMATAN.'">'.CapitalizeEachWord($datakelurahan->NAMA_LOKASI).'</option><br>';;
	        }
			echo json_encode(array(
							'status' => 1,
							'pesan' => "Data Berhasil Tersimpan.",
							'data' => $data
							));
		}else{
			$this->query_error('Error');
		}
	}

	public function simpanTambah()
	{
		$clienttype_id = $this->input->post('clienttype_id');
		$nmklien = $this->input->post('nmklien');
		$kel_id = $this->input->post('kel_id');
		$almt = $this->input->post('almt');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$user = $this->input->post('user');
		$start_date = $this->input->post('start_date');

		$pass = '12345678';
		//$ciphertext = $this->encryption->encrypt($pass);
		//echo $this->encryption->decrypt($ciphertext);

		$insert = $this->KlienModel->Insert($clienttype_id, $user, $pass, $kel_id, $nmklien, $almt, $phone, $email, $start_date);
		if ($insert) {
			echo json_encode(array(
				'status' => 1,
				'pesan' => 'Berhasil Tersimpan'
			));
		}else{
			$this->query_error('Gagal Tersimpan');
		}
	}

	public function simpanTambahUjian()
	{
		$user_id = $this->input->post('user_id');
		$nmujian = $this->input->post('nmpktUjian');
		$kouta = $this->input->post('kouta');
		$start = $this->input->post('start_date').' '.$this->input->post('jammulai');
		$end = $this->input->post('end_date').' '.$this->input->post('jamselesai');
		$created_id = $this->session->userdata('logged_in')['result']->USR_USER_ID;

		$insert = $this->PaketUjianModel->Insert($user_id, $nmujian, $kouta, $start, $end, $created_id);
		if ($insert) {
			echo json_encode(array(
				'status' => 1,
				'pesan' => 'Berhasil Tersimpan'
			));
		}else{
			$this->query_error('Gagal Tersimpan');
		}
	}

	public function reverseStatus()
	{
		$id = $this->input->post('id');
		$statNow = $this->input->post('statNow');
		$nm = $this->input->post('nm');
		if ($statNow==1) {
			$is_active=0;
			$word='Nonaktifkan';
		}else if($statNow==0){
			$is_active=1;
			$word='Aktifkan';
		}

		$updateStatus = $this->KlienModel->ReverseStatus($id, $is_active);
		if ($updateStatus) {
			echo json_encode(array(
				'status' => 1,
				'pesan' => "Status ".$nm." Telah Di ".$word
			));
		}else{
			$this->query_error('Gagal Ubah Status');
		}
	}

	public function reverseLangsung()
	{
		$id = $this->input->post('id');
		$langsungNow = $this->input->post('langsungNow');
		$nm = $this->input->post('nm');
		if ($langsungNow==1) {
			$is_langsung=0;
			$word='Tidak Langsung';
		}else if($langsungNow==0){
			$is_langsung=1;
			$word='Langsung';
		}

		$updateStatus = $this->PaketUjianModel->ReverseLangsung($id, $is_langsung);
		if ($updateStatus) {
			echo json_encode(array(
				'status' => 1,
				'pesan' => "Hasil Ujian ".$nm." ".$word." Ditampilkan"
			));
		}else{
			$this->query_error('Gagal Ubah Status');
		}
	}

	public function simpanEdit()
	{
		$groupid = $this->input->post('clienttype_id');
		$klien = $this->input->post('nmklien');
		$almt = $this->input->post('almt');
		$tlp = $this->input->post('phone');
		$mail = $this->input->post('email');
		$unm = $this->input->post('user');
		$lurah = $this->input->post('kel_id');
		$startdate = $this->input->post('start_date');
		$idclient = $this->input->post('idclient');
		$updater = $this->session->userdata('logged_in')['result']->USR_USER_ID;

		$update = $this->KlienModel->Update($idclient, $unm, $startdate, $groupid, $lurah, $klien, $almt, $tlp, $mail, $updater);
		if ($update) {
			echo json_encode(array(
				'status' => 1,
				'pesan' => "Data Berhasil DiUbah"
			));
		}else{
			$this->query_error('Gagal Melakukan Update');
		}
	}

	public function hapusDataKlien()
	{
		$id=$this->input->post('id');

		$delete = $this->KlienModel->Delete($id);
		if ($delete) {
			echo json_encode(array(
							'status' => 1,
							'pesan' => "Data Berhasil Dihapus"
							));
		}else{
			$this->query_error('Gagal Melakukan Penghapusan Data');
		}
	}

	public function hapusDataPaket()
	{
		$id=$this->input->post('id');

		$delete = $this->PaketUjianModel->Delete($id);
		if ($delete) {
			echo json_encode(array(
							'status' => 1,
							'pesan' => "Data Berhasil Dihapus"
							));
		}else{
			$this->query_error('Gagal Melakukan Penghapusan Data');
		}
	}

	
}
