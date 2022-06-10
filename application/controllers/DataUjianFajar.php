<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataUjian extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('mpdf'));
        $this->load->model(array('JenjangModel','MapelModel','KelasModel','BabModel','UjianModel','DetailPaketUjianModel'));
	}

	public function index()
	{
		//print_r($this->session->userdata('logged_in'));die();
		// $groupklien = $this->session->userdata('logged_in')['has_klien']->USR_USER_ID;

		// $this->load->view('web_header_admin');
		//$this->load->view('views/dataujian/test');
		// $this->load->view('web_footer_admin');
		redirect('DataUjian/hasilUjian','refresh');
	}

	public function siswa_history_ujian()
	{
		$session = $this->session->userdata('logged_in')['result'];
		$userid = $session->USR_USER_ID;

		//$data['ujian'] = $this->DetailPaketUjianModel->getUjianSiswa($userid);
		//print_r($data['ujian']->row());die();

		$jenislogin = strtolower($this->session->userdata('logged_in')['result']->PERAN);
		$this->load->view('web_header_admin');
		if($jenislogin=='siswa'){
			$data['ujian'] = $this->DetailPaketUjianModel->getHistoryUjianSiswa($userid);
			$data['babs'] = $this->BabModel->GetAll()->result();
			//print_r($data['ujian']->result());die();
			$this->load->view('views/dataujian/siswa_history_ujian',$data);
		}else{
			redirect('Welcome/logout','refresh');
		}
		$this->load->view('web_footer_admin');
	}

	public function hasilUjian()
	{
		$iddetail = $this->uri->segment(3);
		$user = $this->session->userdata('logged_in')['result']->USR_USER_ID;
		$hasil = $this->UjianModel->CekHasilUjian($iddetail,$user);

		if ($hasil['status']==1) {
			$hasil['result']->result()[0]->status='1';
			$data['hasilujian'] = $hasil['result']->result()[0];
		}else{
			$data['hasilujian'] = (object) $hasil;
		}
		$data['idnya']=$iddetail;

		//print_r($data['hasilujian']);die();

        $this->load->view('web_header_admin');
		$this->load->view('views/dataujian/web_result',$data);
		$this->load->view('web_footer_admin');
	}

	public function download($id){ 

		
		ini_set("memory_limit","20000M");
		$mpdf=new mPDF('c','A4','','',15,15,10,5,5,5); 
        //$mpdf=new mPDF('c','A4-L','','',12,12,10,5,5,5); 
        $mpdf->mirrorMargins = 10;  // Use different Odd/Even headers and footers and mirror margins
        $iddetail = $this->uri->segment(3);
		$user = $this->session->userdata('logged_in')['result']->USR_USER_ID;
		$hasil = $this->UjianModel->CekHasilUjian($iddetail,$user);

		if ($hasil['status']==1) {
			$hasil['result']->result()[0]->status='1';
			$data['hasilujian'] = $hasil['result']->result()[0];
		}else{
			$data['hasilujian'] = (object) $hasil;
		}
		$data['idnya']=$iddetail;

        $html = $this->load->view('views/dataujian/pdf',$data, true);

        $footer = '
        <table width="100%" border="0" class="gridtable2" style="color:#000">
        	<tr>
        		<td colspan="2"><hr size="9px"></td>
        	</tr>
        	<tr>
        		<td>'.date('F d, Y H:i:s').' </td>
        		<td align="right">{PAGENO}</td>
        		<tr>
        			<br>
        			<br>
        		</table>';

        		$mpdf->WriteHTML($html);
        		$mpdf->SetHTMLFooter($footer);
        		$mpdf->SetHTMLFooter($footer,'E');

        		ob_clean(); 
        		$mpdf->Output();
        		exit;

    }







	public function masukUjian()
	{
		$iddetail = md5($this->input->post('iddetail'));
		try {
			$result = $this->DetailPaketUjianModel->GetDetailForSiswa($iddetail)->result()[0];
			if($result) {
				echo json_encode(array(
					'status' => 1,
					'pesan' => 'Berhasil',
					'data' => $result
				));
			}else{
				throw new Exception('Gagal Tersimpan');
			}
		}catch (\Exception $e) {
			$this->query_error($e->getMessage());
		}
	}

	public function updateJawaban()
	{
		$iddetail = $this->input->post('iddetail');
		$value = $this->input->post('value');
		try {
			$result = $this->UjianModel->UpdateJawaban($iddetail,$value);
			if($result) {
				echo json_encode(array(
					'status' => 1,
					'pesan' => 'Berhasil'
				));
			}else{
				throw new Exception('Gagal Tersimpan');
			}
		}catch (\Exception $e) {
			$this->query_error($e->getMessage());
		}
	}

	public function cekHasOnline()
	{
		$user = $this->session->userdata('logged_in')['result']->USR_USER_ID;
		$iddetail = $this->input->post('iddetail');
		try {
			$result = $this->UjianModel->CekHasUjian($iddetail,$user);
			if($result) {
				if (isset($result->result()[0]->Pesan)) {
					echo json_encode(array(
						'status' => $result->row()->Result,
						'pesan' => $result->row()->Pesan
					));
				}else{
					$durasi = $this->UjianModel->GetDurasiSiswa($iddetail)->row();
					$page = '';
					$html = '';
					foreach ($result->result() as $ujian) {
						$page .= '<li data-lihref="#number-'.$ujian->NOSOAL.'" class="btn bg-primary numbers '.($ujian->NOSOAL=='1' ? 'm-answered' : 'z-answered').'">'.$ujian->NOSOAL.'</li>';
						$html .= '<table class="noujian hide" id="number-'.$ujian->NOSOAL.'" data-iddetailsiswa="'.$ujian->ID_DETAILHASILUJIAN.'" border="0" width="100%" style="padding: 10px !important;">';
						$html .= '<tbody>';

						$html .= '<tr>';
						$html .= '<td colspan="2">';
						$html .= '<div style="font-size: 15px !important;">';
						$html .= '<ol start="'.$ujian->NOSOAL.'">';
						$html .= '<li class="pertanyaan">'.$ujian->SOAL.'</li>';
						$html .= '</ol>';
						$html .= '</div>';
						$html .= '</td>';
						$html .= '</tr>';

						$html .= '<tr>';
						$html .= '<td>';
						$html .= '<ol type="a" start="1">';
						$html .= '<li class="radioli"><input class="radiobtn" type="radio" value="A" name="option_'.$ujian->NOSOAL.'" id="option_'.$ujian->NOSOAL.'a" /><div class="stylepilihan">'.$ujian->PILIHAN_A.'</div></li>';
						$html .= '</ol>';
						$html .= '</td>';
						$html .= '</tr>';

						$html .= '<tr>';
						$html .= '<td>';
						$html .= '<ol type="a" start="2">';
						$html .= '<li class="radioli"><input class="radiobtn" type="radio" value="B" name="option_'.$ujian->NOSOAL.'" id="option_'.$ujian->NOSOAL.'b" /><div class="stylepilihan" >'.$ujian->PILIHAN_B.'</div></li>';
						$html .= '</ol>';
						$html .= '</td>';
						$html .= '</tr>';

						$html .= '<tr>';
						$html .= '<td>';
						$html .= '<ol type="a" start="3">';
						$html .= '<li class="radioli"><input class="radiobtn" type="radio" value="C" name="option_'.$ujian->NOSOAL.'" id="option_'.$ujian->NOSOAL.'c" /><div class="stylepilihan" >'.$ujian->PILIHAN_C.'</div></li>';
						$html .= '</ol>';
						$html .= '</td>';
						$html .= '</tr>';

						if($ujian->PILIHAN_D){
							$html .= '<tr>';
							$html .= '<td>';
							$html .= '<ol type="a" start="4">';
							$html .= '<li class="radioli"><input class="radiobtn" type="radio" value="D" name="option_'.$ujian->NOSOAL.'" id="option_'.$ujian->NOSOAL.'d" /><div class="stylepilihan" >'.$ujian->PILIHAN_D.'</div></li>';
							$html .= '</ol>';
							$html .= '</td>';
							$html .= '</tr>';
						}

						if($ujian->PILIHAN_E){
							$html .= '<tr>';
							$html .= '<td>';
							$html .= '<ol type="a" start="5">';
							$html .= '<li class="radioli"><input class="radiobtn" type="radio" value="E" name="option_'.$ujian->NOSOAL.'" id="option_'.$ujian->NOSOAL.'e" /><div class="stylepilihan" >'.$ujian->PILIHAN_E.'</div></li>';
							$html .= '</ol>';
							$html .= '</td>';
							$html .= '</tr>';
						}

						$html .= '</tbody>';
						$html .= '</table>';
					}
					echo json_encode(array(
						'status' => 1,
						'pesan' => 'Berhasil',
						'data' => $html,
						'nohalaman' => $page,
						'sisadurasi' => $durasi->MENIT
					));
				}
			}else{
				throw new Exception('Gagal');
			}
		}catch (\Exception $e) {
			$this->query_error($e->getMessage());
		}
	}
}