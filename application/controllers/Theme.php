<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme extends MY_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model(array('ThemeModel'));
        $this->load->library('session');
        $sessions = $this->session->userdata('logged_in')['result'];
	}

	public function index()
	{
		$sessions = $this->session->userdata('logged_in')['result'];
		if(strtolower($sessions->PERAN)=='klien'){ 
    		$theme_client_id=$sessions->USR_USER_ID;
    		$theme_data=$this->db->query("SELECT * from usr_theme ut 
                               inner join theme t on t.id=ut.theme_id
                               where ut.client_id='".$theme_client_id."'
                    ")->row();
    		
    	}
        $data['themes'] = $this->ThemeModel->GetAll()->result();
        $data['theme_data'] = $theme_data;
        
        
        
		$this->load->view('web_header_admin');
		$this->load->view('views/theme/web_main',$data);
		$this->load->view('web_footer_admin');
	}

	

	public function update()
	{
		$sessions = $this->session->userdata('logged_in')['result'];
		$theme = $this->input->post('theme');
		$client_id=$sessions->USR_USER_ID;
		

		$update =  $this->ThemeModel->Update($theme, $client_id);
		if ($update) {
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