<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->model(array('LoginModel'));
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
        $this->load->helper('form');
        $this->load->view('login/web_login');
    }

    public function admin()
    {
        $this->load->helper('form');
        $this->load->view('login/web_header_login');
        $this->load->view('login/web_admin_login');
        $this->load->view('login/web_footer_login');
    }

    public function klien()
    {
        $this->load->helper('form');
        $this->load->view('login/web_header_login');
        $this->load->view('login/web_klien_login');
        $this->load->view('login/web_footer_login');
    }

    public function siswa()
    {
        $this->load->helper('form');
        $this->load->view('login/web_header_login');
        $this->load->view('login/web_siswa_login');
        $this->load->view('login/web_footer_login');
    }

    public function loginAdmin() 
    {
        $USERNAME = $this->input->post('username');
        $PASSWORD = $this->input->post('password');
        $JENISLOGIN = 'admin';

        try {
            $cek_user = $this->LoginModel->Login($USERNAME, $PASSWORD, $JENISLOGIN);
            if($cek_user['user']->num_rows()==1)
            {
                $hasil['result']= $cek_user['user']->row();
                $hasil['Statuslogin']=1;
                $this->session->set_userdata('logged_in',$hasil);
                $this->session->set_flashdata('jenislogin', 'admin');
                redirect('Dashboard/index','refresh');
            }else
            {
                throw new Exception('Silahkan Masukkan Username dan Password dengan Benar');
            }
        }catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('Welcome/admin','refresh');
        }
    }

    public function loginKlien() 
    {
        $USERNAME = $this->input->post('username');
        $PASSWORD = $this->input->post('password');
        $JENISLOGIN = 'klien';

        try {
            $cek_user = $this->LoginModel->Login($USERNAME, $PASSWORD, $JENISLOGIN);
           // print_r($cek_user);die();
            if($cek_user['user']->num_rows()==1)
            {
                //$hasil['menu_ujian']=array();
                $hasil['result']= $cek_user['user']->row();
                //$hasil['menu_ujian']= $cek_user['paket']->result_array();
                $hasil['menu_ujian']= $cek_user['paket']->result();
                $hasil['Statuslogin']=1;
                $this->session->set_userdata('logged_in',$hasil);
                $this->session->set_flashdata('jenislogin', 'klien');
                redirect('Dashboard/index','refresh');
            }else
            {
                throw new Exception('Silahkan Masukkan Username dan Password dengan Benar');
            }
        }catch (Exception $e) {
            //alert the user.
            //var_dump($e->getMessage());
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('Welcome/klien','refresh');
        }
    }

    public function loginSiswa() 
    {
        $USERNAME = $this->input->post('username');
        $PASSWORD = $this->input->post('password');
        $JENISLOGIN = 'siswa';

        $cek_user = $this->LoginModel->loginsiswa($USERNAME, $PASSWORD, $JENISLOGIN);
       
        try {
            $cek_user = $this->LoginModel->Loginsiswa($USERNAME, $PASSWORD, $JENISLOGIN);
            if($cek_user['user']->num_rows()==1)
            {
                $hasil['result']= $cek_user['user']->row();
                $hasil['has_klien']= $cek_user['hasuser']->row();
                $hasil['has_siswa']= $cek_user['has_siswa']->row();
                $hasil['Statuslogin']=1;
                $hasil['StatusConnection']=1;
                $this->session->set_userdata('logged_in',$hasil);
                $this->session->set_flashdata('jenislogin', 'siswa');
                redirect('Dashboard/index','refresh');
            }else
            {
                throw new Exception('Silahkan Masukkan Username dan Password dengan Benar');
            }
        }catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('Welcome/siswa','refresh');
        }
    }

    public function logout() 
    {
        //$ID_USER = $this->session->userdata('logged_in')['result']->client_id;
        //$IP = $this->input->ip_address();
        //$this->LoginModel->Logout($ID_USER,$IP);
        $data = $this->session->userdata('logged_in');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('Welcome/index','refresh');     
    }
}
