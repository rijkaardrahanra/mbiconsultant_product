<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('UserModel' , 'BabModel','DetailPaketUjianModel','UjianModel'));
	}
	public function index()
	{
		$session = $this->session->userdata('logged_in')['result'];
		$userid = $session->USR_USER_ID;

		//$data['ujian'] = $this->DetailPaketUjianModel->getUjianSiswa($userid);
		//print_r($data['ujian']->row());die();

		$jenislogin = strtolower($this->session->userdata('logged_in')['result']->PERAN);
		$this->load->view('web_header_admin');
		if($jenislogin=='admin'){
			$data['ujian'] = $this->DetailPaketUjianModel->getUjianSemuaKlien($userid);
			//print_r($data['ujian']->result());die();
			$this->load->view('views/dashboard/web_main_admin',$data);
		}else if($jenislogin=='klien'){
			$data['ujian'] = $this->DetailPaketUjianModel->getUjianKlien($userid);
			//print_r($data['ujian']->result());die();
			$this->load->view('views/dashboard/web_main_klien',$data);
		}else if($jenislogin=='siswa'){
			$data['ujian'] = $this->DetailPaketUjianModel->getUjianSiswa($userid);
			$data['babs'] = $this->BabModel->GetAll()->result();
			// $this->load->view('views/dashboard/web_main_siswa',$data);
			$this->load->view('views/dashboard/web_main_siswa_newversion',$data);
		}else{
			redirect('Welcome/logout','refresh');
		}
		$this->load->view('web_footer_admin');
	}
	
	// public function hasil()
	// {
	// 	// $iddetail = $this->uri->segment(3);
	// 	// $user = $this->session->userdata('logged_in')['result']->USR_USER_ID;
	// 	$iddetail = 28;
	// 	$user = 45;
	// 	$hasil = $this->UjianModel->CekHasilUjian($iddetail,$user);

	// 	if ($hasil['status']==1) {
	// 		$hasil['result']->result()[0]->status='1';
	// 		$data['hasilujian'] = $hasil['result']->result()[0];
	// 	}else{
	// 		$data['hasilujian'] = (object) $hasil;
	// 	}

	// 	$this->load->view('web_header_admin');
	// 	$this->load->view('views/dashboard/testhasil',$data);
	// 	$this->load->view('web_footer_admin');
	// }

	// public function ujianonline()
	// {
	// 	$session = $this->session->userdata('logged_in')['result'];
	// 	$userid = $session->USR_USER_ID;

	// 	$jenislogin = strtolower($this->session->userdata('logged_in')['result']->PERAN);
	// 	$this->load->view('web_header_admin');
	// 	if($jenislogin=='siswa'){
	// 		$data['ujian'] = $this->DetailPaketUjianModel->getUjianSiswa($userid);
	// 		$data['babs'] = $this->BabModel->GetAll()->result();
	// 		//print_r($data['ujian']->result());die();
	// 		$this->load->view('views/dashboard/web_main_siswa_backup_newSeptember18',$data);
	// 	}else{
	// 		redirect('Welcome/logout','refresh');
	// 	}
	// 	$this->load->view('web_footer_admin');
	// }

	// public function masukujianonline()
	// {
	// 	$iddetail = $this->uri->segment(3);
	// 	$data['result'] = $this->DetailPaketUjianModel->GetDetailForSiswa($iddetail)->result()[0];
	// 	$this->load->view('web_header_admin');
	// 	$this->load->view('views/dashboard/web_main_siswa_old',$data);
	// 	$this->load->view('web_footer_admin');
	// }

	public function profile()
	{
		$id = $this->session->userdata('logged_in')['result']->USR_USER_ID;
		$data['tampilProfile'] = $this->UserModel->GetDetail($id);
		$this->load->view('web_header_admin');
		$this->load->view('views/dashboard/profile2', $data);
		$this->load->view('web_footer_admin');
	}

	public function editProfile()
	{
		date_default_timezone_set("Asia/Bangkok");
	

		$id        = $this->session->userdata('logged_in')['result']->USR_USER_ID;
		$username  = $this->input->post('username');		
		$startdate = date('Y m d');		
		$password  = $this->input->post('password');
		$lurah     = $this->session->userdata('logged_in')['result']->ID_KELURAHAN;
		$namauser  = $this->input->post('centername');
		$alamat    = $this->input->post('centeraddress');		
		$no_tlp    = $this->input->post('phoneno');
		$email     = $this->input->post('email');
		$updater   = $id;

		
		$update = $this->UserModel->UpdateProfile($id, $username, $startdate, $lurah, $namauser, $alamat, $no_tlp, $email, $updater);
		//print_r($update);die();

		redirect('/Dashboard/profile');

	}

	public function editProfile2()
	{
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './asset_admin/images/profile/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

		$this->load->library('upload', $config);

		$id         = $this->session->userdata('logged_in')['result']->USR_USER_ID;
		$namauser   = $this->input->post('centername');
		$alamat     = $this->input->post('centeraddress');
		$username   = $this->input->post('username');
		$no_tlp     = $this->input->post('phoneno');
		$email      = $this->input->post('email');
		$password   = $this->input->post('password');

		

		if ( ! $this->upload->do_upload('filefoto')){
			$error = array('error' => $this->upload->display_errors());
			$this->UserModel-> UpdateProfile($id, $username, $startdate, $password, $lurah, $namauser, $alamat, $no_tlp, $email, $updater);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->UserModel->UpdateProfile($id, $nama, $no_tlp, $email);
			$var = explode(".", $_FILES['filefoto']['name']);
			$tipe = $var[count($var)-1];
			$namafile = $nmfile.".".$tipe;
			$this->UserModel->UpdatePropict($id, $namafile);
		}

		redirect('/Dashboard/profile');

	}

	public function ubahPassword()
	{
		
		$this->load->view('web_header_admin');
		$this->load->view('views/dashboard/ubahPassword2');
		$this->load->view('web_footer_admin');
	}

	public function ubahPassword2()
	{
		$this->load->view('web_header');
		$this->load->view('views/dashboard/ubahPassword');
		$this->load->view('web_footer');
	}

	public function submitUbahPassword(){

		$id = $this->session->userdata('logged_in')['result']->USR_USER_ID;


		$password_lama       = $this->UserModel->getPassword($id)->row()->PASSWORD;
		
		$password_lama_input = $this->input->post('old_pass');
		$password_baru       = $this->input->post('new_pass');


		if ($password_lama == md5($password_lama_input)) {
			$update = $this->UserModel->ubahPassword($id,md5($password_baru));
			if ($update) {
				echo json_encode(array(
					'status' => 1,
					'pesan' => 'Berhasil Diubah'
				));
			}else{
				$this->query_error('Gagal Diubah.');
			}
			
		}else{
			$this->query_error('Gagal Diubah. Password lama yang anda masukkan salah.');
		}

		
	}

	public function testConnect()
	{
		echo "Connect";
	}
}