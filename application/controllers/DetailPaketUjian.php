<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailPaketUjian extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('PaketUjianModel', 'DetailPaketUjianModel', 'JenjangModel', 'KelasModel', 'MapelModel', 'ProgramModel', 'BabModel','ManMapelModel'));
	}

	public function index()
	{
		redirect('DetailPaketUjian/tampil','refresh');
	}

	public function tampil()
	{
		$id = $this->uri->segment(3);
        $ujian = $this->PaketUjianModel->GetARowPaketUjian($id)->result();
        if ($ujian) {
        	$data['ujian'] = $ujian[0];
	        $data['detailujians'] = $this->DetailPaketUjianModel->GetAll($id)->result();//print_r($data['detailujians']);die();  
	        $data['jenjangs'] = $this->JenjangModel->GetAll()->result();
	        $data['kelass'] = $this->KelasModel->GetAll()->result();
	        $data['mapels'] = $this->MapelModel->GetAll()->result();
	        $data['programs'] = $this->ProgramModel->GetAll()->result();
	        $data['babs'] = $this->BabModel->GetAll()->result();
	        $data['manmapels'] = $this->ManMapelModel->GetAll($this->session->userdata('logged_in')['result']->USR_USER_ID)->result();
	        //print_r($data);die();
	        
			$this->load->view('web_header_admin');
			$this->load->view('views/detailPaketUjian/web_main',$data);
			$this->load->view('web_footer_admin');
        }else{
        	redirect('Dashboard/index','refresh');
        }
	}

	public function pertanyaan()
	{
		$id = $this->uri->segment(4);
		$data['babs'] = $this->BabModel->ShowByIDForBankSoal($id)->result();
		$data['idmanmapel'] = $this->ManMapelModel->GetIDByForBankSoal($id)->result()[0];
		//print_r($data['idmanmapel']);die();
		$this->load->view('web_header_admin');
		$this->load->view('views/detailPaketUjian/web_insertpertanyaan',$data);
		$this->load->view('web_footer_admin');
	}

	public function simpanTambah()
	{
		$babid = $this->input->post('bab_id');
		$post = array();
		foreach ( $_POST as $key => $value )
		{
		    $post[$key] = $this->input->post($key);
		}

		if($babid!="")
		{
			$post['group_bab_id']= $babid;
			if(is_array($babid))
			{
				$post['group_bab_id'] = join(",",$babid);
			}
		}else{
			$post['group_bab_id']='0';
		}

        //$detailujian = $this->DetailPaketUjianModel->Insert($post['idmanagemapel'], $post['idpktujian'], $post['kuota'], $post['nsoalsulit'], $post['nsoalsedang'], $post['nsoalmudah'], $post['durasiujian'], $post['group_bab_id'], $post['terms_condition']);
        $tglmulaiujian = $post['start_date'].' '.$post['jammulai'];

        $detailujian = $this->DetailPaketUjianModel->Insert($post['idmanagemapel'], $post['idpktujian'], $post['kuota'], $post['durasiujian'], $post['group_bab_id'], $post['terms_condition'], $tglmulaiujian);
        if ($detailujian) {
			echo json_encode(array(
							'status' => 1,
							'pesan' => "Data Berhasil Tersimpan."//,
							//'data' => $post
							));
        }else{
        	$this->query_error('Gagal Ditambahkan');
        }
	}

	public function simpanTambahBackup()
	{
		$babid = $this->input->post('bab_id');
		$post = array();
		foreach ( $_POST as $key => $value )
		{
		    $post[$key] = $this->input->post($key);
		}

		if($babid!="")
		{
			$bab="";
			if(is_array($babid))
			{
				while (list ($key, $val) = each ($babid)) 
				{
					$bab .= $val.',';
				}
			}
			$post['group_bab_id']= substr($bab,0,-1);
		}else{
			$post['group_bab_id']='0';
		}

        //$detailujian = $this->DetailPaketUjianModel->Insert($post['idmanagemapel'], $post['idpktujian'], $post['kuota'], $post['nsoalsulit'], $post['nsoalsedang'], $post['nsoalmudah'], $post['durasiujian'], $post['group_bab_id'], $post['terms_condition']);
        $tglmulaiujian = $post['start_date'].' '.$post['jammulai'];

        $detailujian = $this->DetailPaketUjianModel->Insert($post['idmanagemapel'], $post['idpktujian'], $post['kuota'], $post['durasiujian'], $post['group_bab_id'], $post['terms_condition'], $tglmulaiujian);
        if ($detailujian) {
			echo json_encode(array(
							'status' => 1,
							'pesan' => "Data Berhasil Tersimpan."//,
							//'data' => $post
							));
        }else{
        	$this->query_error('Gagal Ditambahkan');
        }
	}

	public function hapusData()
	{
		$manmapel=$this->input->post('manmapel');
		$paket=$this->input->post('paket');

		$delete = $this->DetailPaketUjianModel->Delete($manmapel,$paket);
		if ($delete) {
			echo json_encode(array(
							'status' => 1,
							'pesan' => "Data Berhasil Dihapus."
							));
		}else{
			$this->query_error('Gagal Melakukan Penghapusan Data');
		}
	}

	public function setJumlahSoal()
	{
		$iddetailpaket=$this->input->post('iddetailpaket');
		$c_d=$this->input->post('valuec_d');
		$nsoalsulit=$this->input->post('nsoalsulit');
		$nsoalsedang=$this->input->post('nsoalsedang');
		$nsoalmudah=$this->input->post('nsoalmudah');
		$userid=$this->session->userdata('logged_in')['result']->USR_USER_ID;
		$bobotb='1';
		$bobots='0';
		$bobottj='0';
		if($c_d==0){
			$bobotsoal=0;
		}else{
			$bobotsoal=$this->input->post('bobotsoal');
			if($bobotsoal==0){
				$bobotb=$this->input->post('bobotbenar');
				$bobots=$this->input->post('bobotsalah');
				$bobottj=$this->input->post('bobotvaluenull');
			}
		}

		$setnsoal = $this->DetailPaketUjianModel->SetJumlahSoal($iddetailpaket, $userid, $nsoalsulit, $nsoalsedang, $nsoalmudah, $c_d, $bobotsoal, $bobotb, $bobots, $bobottj);
		if ($setnsoal) {
			echo json_encode(array(
							'status' => 1,
							'pesan' => "Data Berhasil Tersimpan.",
							'data' => $setnsoal
							));
		}else{
			$this->query_error('Gagal Menyimpan Data');
		}
	}
}
