<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TesReport extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		//$this->load->model(array('UserModel' , 'KlienModel', 'TipeKlienModel', 'PaketUjianModel','DetailPaketUjianModel'));
	}
	public function index()
	{	
		// print_r($this->session->userdata('logged_in'));
		$this->load->view('web_header_admin');
		$this->load->view('views/TesReport/web_main');
		$this->load->view('web_footer_admin');
	}

	

}
