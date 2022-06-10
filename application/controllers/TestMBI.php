<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestMBI extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('encryption');
        $this->load->model(array('KlienModel'));
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
		$this->load->view('web_header_admin');
		$this->load->view('views/pengaturanUjian/web_main');
		$this->load->view('web_footer_admin');
	}
}
