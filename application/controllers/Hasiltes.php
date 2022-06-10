<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasiltes extends MY_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->helper(array('mpdf'));
        $this->load->model(array('ThemeModel','HasilUjianModel'));
        $this->load->library('session');
        $sessions = $this->session->userdata('logged_in')['result'];
	}

	

	public function index()
	{			
			
		$id_detailpaketujian      = $this->input->post('paketujian');			
		$sessions                 = $this->session->userdata('logged_in')['result'];
		$id                       = md5($sessions->USR_USER_ID);
		$ujian                    = $this->HasilUjianModel->GetAllUjian($id)->result();
		$data['ujian']            = $ujian;			
		$detailujian              = $this->HasilUjianModel->GetDetailPaketUjian($id,$id_detailpaketujian);
		$data['detailpaketujian'] = $detailujian->result();
       

		$this->load->view('web_header_admin');
		$this->load->view('views/hasiltes/web_main',$data);
		$this->load->view('web_footer_admin');
			
		
	}

	public function ListSiswaUjian($id_detailpaketujian)
	{			
			
					
		$sessions                 = $this->session->userdata('logged_in')['result'];
		$id                       = md5($sessions->USR_USER_ID);
		
		
		//print_r($id_detailpaketujian);die();
		$paketujian              = $this->HasilUjianModel->GetDetailPaketUjianById($id_detailpaketujian);
		$data['paketujian'] = $paketujian->result();
		

		$list_siswa_ujian              = $this->HasilUjianModel->GetListSiswaUjian($id_detailpaketujian);
		$data['list_siswa'] = $list_siswa_ujian->result();

		//print_r($data['list_siswa']);die();
       

		$this->load->view('web_header_admin');
		$this->load->view('views/hasiltes/web_main_list',$data);
		$this->load->view('web_footer_admin');
			
		
	}


	public function download($id_detailpaketujian){ 

		
		ini_set("memory_limit","20000M");
		$mpdf=new mPDF('c','A4','','',15,15,10,5,5,5); 
        //$mpdf=new mPDF('c','A4-L','','',12,12,10,5,5,5); 
        $mpdf->mirrorMargins = 10;  // Use different Odd/Even headers and footers and mirror margins
        
		$user               = $this->session->userdata('logged_in')['result']->USR_USER_ID;
		$sessions           = $this->session->userdata('logged_in')['result'];
		$id                 = md5($sessions->USR_USER_ID);		
		
		$paketujian         = $this->HasilUjianModel->GetDetailPaketUjianById($id_detailpaketujian);
		$data['paketujian'] = $paketujian->result();			
		$list_siswa_ujian   = $this->HasilUjianModel->GetListSiswaUjian($id_detailpaketujian);
		$data['list_siswa'] = $list_siswa_ujian->result();		
		
		$data['idnya']      = $id_detailpaketujian;
		
		$html               = $this->load->view('views/hasiltes/list_hasil_ujian_siswa_pdf',$data, true);

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

    public function excel($id_detailpaketujian){ 

		
		
		$user               = $this->session->userdata('logged_in')['result']->USR_USER_ID;
		$sessions           = $this->session->userdata('logged_in')['result'];
		$id                 = md5($sessions->USR_USER_ID);		
		
		$paketujian         = $this->HasilUjianModel->GetDetailPaketUjianById($id_detailpaketujian);
		$data['paketujian'] = $paketujian->result();			
		$list_siswa_ujian   = $this->HasilUjianModel->GetListSiswaUjian($id_detailpaketujian);
		$data['list_siswa'] = $list_siswa_ujian->result();		
		
		$data['idnya']      = $id_detailpaketujian;
		
		
		header("Content-type: application/octet-stream"); 
		header("Content-Disposition: attachment; filename=List_siswa.xls");
		$this->load->view('views/hasiltes/list_hasil_ujian_siswa_excel',$data);


    }


	public function detailHasilUjianSiswa($id,$id_hasil)
	{			
			
		$detail_siswa = $this->HasilUjianModel->GetDetailSiswaUjian($id,$id_hasil);
		$data['detailsiswa'] = $detail_siswa->result()[0];

		$detail_jawaban = $this->HasilUjianModel->GetDetailJawabanHasilUjian($id);
		$data['detail_jawaban'] = $detail_jawaban->result();
		//print_r($detail_siswa);die();
		//print_r($data['detail_jawaban']);die();

		$this->load->view('web_header_admin');
		$this->load->view('views/hasiltes/detail_hasil_ujian_siswa',$data);
		$this->load->view('web_footer_admin');			
		
	}


	public function getUjian()
	{
		$sessions = $this->session->userdata('logged_in')['result'];
		$id = md5($sessions->USR_USER_ID);
        $paketujian = $this->HasilUjianModel->GetPaketUjian($id)->result();		
        $data['paketujian'] = $paketujian;     
		
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