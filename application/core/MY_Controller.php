<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
        $this->load->model(array('LoginModel'));

		if(empty($this->session->userdata('logged_in')))
		{
			$this->session->set_flashdata('error', 'Silahkan Login Dahulu');
			redirect('Welcome','refresh');
		}

		$StatusLogin = $this->cek_session();

		if(!$StatusLogin){
			$this->session->set_flashdata('error', 'Waktu Login Sudah Habis, Silahkan Login Dahulu');
			redirect('Welcome','refresh');
		}else{
			$refresh = $this->LoginModel->Refresh($StatusLogin['result']->USR_USER_ID, $StatusLogin['result']->PERAN);
			if($refresh['user']->num_rows()==1)
            {
                $hasil['result']= $refresh['user']->row();
                if (strtolower($StatusLogin['result']->PERAN)=='klien') {
                	$hasil['menu_ujian']= $refresh['paket']->result();
                }else if (strtolower($StatusLogin['result']->PERAN)=='siswa') {
                	$hasil['has_klien']= $refresh['hasuser']->row();
                }
                $hasil['Statuslogin']=1;
                if($StatusLogin!=$hasil){
                	$this->session->set_userdata('logged_in',$hasil);
                }
            }
		}
	}

	

	public function cek_session()
	{
		$session_cek = $this->session->userdata('logged_in');
        return $session_cek;
	}

	public function query_error($pesan = "Terjadi kesalahan, coba lagi !")
	{
		$json['status'] = 0;
		$json['pesan'] 	= $pesan;
		echo json_encode($json);
	}
}
?>