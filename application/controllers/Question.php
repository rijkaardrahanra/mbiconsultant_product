<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('UserModel' , 'KlienModel', 'TipeKlienModel', 'PaketUjianModel','DetailPaketUjianModel'));
	}
	public function index($idmanagemapel='')
	{
		$data['pertanyaan']=$this->DetailPaketUjianModel->getPertanyaan($idmanagemapel);
		$this->load->view('web_header_admin');
		$this->load->view('views/Question/web_main2',$data);
		$this->load->view('web_footer_admin');
	}

	public function viewPaketSoalUjian($iddetailpaketujian='')
	{
		$c_d=$this->uri->segment(4);
		if ($c_d=='custom' || $c_d=='default') {
			$data['isdefault']=$c_d;
			$data['pertanyaan']=$this->DetailPaketUjianModel->getPertanyaanSoalUjian($iddetailpaketujian);
			$this->load->view('web_header_admin');
			$this->load->view('views/Question/web_main2',$data);
			$this->load->view('web_footer_admin');
		}
	}

	public function viewQuestion()
	{	
		$this->load->view('web_header_admin');
		$this->load->view('views/Question/viewquestion');
		$this->load->view('web_footer_admin');
	}

	

}
