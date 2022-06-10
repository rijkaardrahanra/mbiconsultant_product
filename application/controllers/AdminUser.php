<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUser extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
        $this->load->model('AdminUserModel');
	}
	
	public function index() 
    {
        session_destroy();
        $this->load->helper('form');
		$this->load->view('loginAdmin/loginweb_header_baru');
		$this->load->view('loginAdmin/loginweb_main_baru');
		//$this->load->view('loginAdmin/loginweb_footer');	
	}

    public function login() {
        
        $username = $this->AdminUserModel->check_username($this->input->post('username', TRUE))->row()->username;
        $password = $this->AdminUserModel->check_password(md5($this->input->post('password', TRUE)))->row()->password;

        $data_login = $this->AdminUserModel->ambilProfile($username,$password)->row_array();
       
       /* print_r($data_login);die();*/
        if (!$username) {
            $this->session->set_flashdata('warning', 'Username failed!');
            redirect('AdminUser','refresh');
        }
        else if (!$password) {
            $this->session->set_flashdata('warning', 'Password failed!');
            redirect('AdminUser','refresh');
        } 
        else {
            $this->session->set_userdata('logged_in',$data_login);
            /*$this->session->set_flashdata('success', '<b>Hai '.ucwords($data_login['nama']).'</b>, Selamat datang di CBT. ');*/
             redirect('Dashboard','refresh');
        }
    }

	/*public function login() 
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');

        $cek_user = $this->AdminUserModel->Login($username,$password)->row();
       

        if($cek_user->status == 1)
        {
            //print_r($cek_user->result()[0]->USERNAME);die();
            $hasil['result']= $cek_user;
            $hasil['Statuslogin']=1;
            $this->session->set_userdata('logged_in',$hasil);
            redirect('Dashboard','refresh');

        }else if($cek_user->status == 0) 
        {
            $this->session->set_flashdata('error', 'Silahkan Masukkan Username dan Password dengan benar !!!');
            redirect('AdminUser','refresh');
        }else
        {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat anda login.');
            redirect('AdminUser','refresh');
        }
    }*/

	public function logout() 
    {
        $ID_USER = $this->session->userdata('logged_in')['id'];
        $IP = $this->input->ip_address();
        //$this->AdminUserModel->Logout($ID_USER,$IP);
        redirect('AdminUser/index','refresh');     
    }

    public function forgotPassword() 
    {
        session_destroy();
        $this->load->view('loginAdmin/loginweb_header_baru');
        $this->load->view('loginAdmin/forgotPassword');
        //$this->load->view('loginAdmin/loginweb_footer');   
    }

    public function forgot() 
    {
        
    }
}
