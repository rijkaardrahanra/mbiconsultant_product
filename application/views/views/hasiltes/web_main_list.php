<?php
//print_r($themes);die();
?>
<style type="text/css">
  .hide{
    display: none !important;
  }
  .center{
    text-align: center !important;
  }
</style>
  <!-- Start Main Content -->
 <div class="main-content">
    <div class="container-fluid" >
      <div class="row-fluid">
        <div class="area-top clearfix">
          <div class="pull-left header">
            <h3 class="title"><i class="icon-edit"></i>Data Siswa Ujian <?php echo $paketujian[0]->NAMA_UJIAN;?></h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Container Box-->
    <div class="container-fluid padded">
      <!-- Start Box-->
      <div class="box">

        <div class="padded" style="padding-top: 20px;padding-bottom: 20px;">
          <table border="0" width="100%">
            <tbody>
              <tr class="hide">
                <td>ID</td>
                <td>:</td>
                <td><div class="pktujian"><?php echo $paketujian[0]->PKTU_PAKETUJIAN_ID;?></div></td>
              </tr>
              <tr>
                <td>Mata Pelajaran</td>
                <td>:</td>
                <td><?php echo $paketujian[0]->NAMA_MAPEL;?></td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?php echo $paketujian[0]->KELAS;?></td>
              </tr>

               <tr>
                <td>Program</td>
                <td>:</td>
                <td><?php echo $paketujian[0]->NAMA_PROGRAM;?></td>
              </tr>
              
              <tr>
                <td>Tanggal Ujian</td>
                <td>:</td>
                <td><?php echo complete_tanggal_indo($paketujian[0]->TGL_MULAI_UJIAN); ?></td>
              </tr>
              <tr>
                <td>Durasi Ujian</td>
                <td>:</td>
                <td><?php echo $paketujian[0]->DURASI_UJIAN_MENIT; ?> Menit</td>
              </tr>
              
            </tbody>
          </table>
        </div>
      
        <div class="box-header">
          <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
              <a href="#list" data-toggle="tab">
              <i class="icon-align-justify"></i>Daftar Siswa Ujian <?php echo $paketujian[0]->NAMA_UJIAN; ?>
              </a>
            </li>
            
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">
            <div class="tab-pane box active" id="list">
            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
            <thead>
              <tr>
                <th><div>No</div></th>
                <th><div>Nama Siswa</div></th>
                <th><div>Jenjang</div></th>
                <th><div>Kelas</div></th>
                <th><div>Program</div></th>               
                <th><div>Total Benar</div></th>
                <th><div>Total Salah</div></th>
                <th><div>Tidak Dijawab</div></th>
                <th><div>Total Score</div></th>
                <th><div>Aksi</div></th>
                
              </tr>
            </thead>
            <tbody>
            <?php
              $no=1;
               foreach ($list_siswa as $row) {
                
            ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $row->NAMA;?></td>
                  <td><?php echo $row->NAMA_JENJANG;?></td>
                  <td><?php echo $row->KELAS;?></td>
                  <td><?php echo $row->NAMA_PROGRAM;?></td>                  
                  <td><?php echo $row->TOTAL_BENAR;?></td>
                  <td><?php echo $row->TOTAL_SALAH;?></td>
                  <td><?php echo $row->TOTAL_TIDAKJAWAB;?></td>
                  <td><?php echo $row->TOTAL_SCORE;?></td>
                  <td><a href="<?php echo base_url();?>Hasiltes/detailHasilUjianSiswa/<?php echo $row->HSLU_HASILUJIAN_ID.'/'.$row->USR_USER_ID; ?>" class="btn btn-gray">Detail</a></td>
                </tr>        


           <?php $no++;} ?>
            </tbody>
            </table>
            </div>           
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Box-->
    </div>
        <center>
        <a href="<?php echo base_url('Hasiltes/download/'); ?><?php echo $paketujian[0]->ID_DETAIL_PAKETUJIAN;?>" target='blank' class='btn btn-default'><img src="<?php echo base_url(); ?>images/pdf.png"> Cetak PDF</a>
        <a href="<?php echo base_url('Hasiltes/excel/'); ?><?php echo $paketujian[0]->ID_DETAIL_PAKETUJIAN;?>" target='blank' class='btn btn-default'><img src="<?php echo base_url(); ?>images/xls.png"> Cetak Excel</a>
        </center>
    <!-- End Container Box-->
  </div>
  <!-- End Main Content -->
  
</div>
<!-- End Div Main Body -->



