<?php
($hasilujian->NAMA_PROGRAM ? $prog = $hasilujian->NAMA_PROGRAM : $prog = '');
($hasilujian->EMAIL ? $mail = $hasilujian->EMAIL : $mail = '-');

?>
<style type="text/css">
  .center{
    text-align: center !important;
  }
</style>
<div class="main-content">
  <div class="container-fluid" >
      <div class="row-fluid">
          <div class="area-top clearfix">
              <div class="pull-left header">
                  <h3 class="title"><i class="icon-edit"></i>Result</h3>
              </div>

          </div>
      </div>
  </div>

  <div class="container-fluid padded">
    <div class="box">
      <div class="box-header">
        <ul class="nav nav-tabs nav-tabs-left">
          <li class="active">
            <a href="#list" data-toggle="tab"><i class="icon-info-sign"></i>Information</a></li>
        </ul>
      </div>
      <div class="box-content padded">
        <div class="tab-content">
          <div class="tab-pane box active" id="list" valign="top">
          <table border='0' cellpadding='0' cellspacing='0' width='100%'>
            <tr>
              <td style='line-height:30px; font-size:20px;color:#7087A3'>&nbsp;</td>
            </tr>
            <tr>
              <td>
                <?php if(isset($hasilujian->NAMA)){ ?>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='table table-normal'>
                  <tr>
                    <td class='news-title'>Nama Siswa</td>
                    <td class="center">:</td><td class='news-title'><?php echo $hasilujian->NAMA;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Email</td>
                    <td class="center">:</td><td class='news-title'><?php echo $mail;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Nama Ujian</td>
                    <td class="center">:</td><td class='news-title'><?php echo $hasilujian->NAMA_UJIAN;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Kelas</td>
                    <td class="center">:</td><td class='news-title'><?php echo $hasilujian->KELAS.' '.$hasilujian->NAMA_JENJANG.' '.$prog;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Mata Pelajaran</td>
                    <td class="center">:</td><td class='news-title'><?php echo $hasilujian->NAMA_MAPEL;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Tanggal Ujian</td>
                    <td class="center">:</td><td class='news-title'><?php echo complete_tanggal_indo($hasilujian->TGL_MULAI_UJIAN);?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Durasi Ujian</td>
                    <td class="center">:</td><td class='news-title'><?php echo $hasilujian->DURASI_UJIAN_MENIT.' Menit';?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Total Soal</td>
                    <td class="center">:</td><td class='news-title'><?php echo ($hasilujian->TOTAL_BENAR+$hasilujian->TOTAL_SALAH+$hasilujian->TOTAL_TIDAKJAWAB);?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Jawaban Benar</td>
                    <td class="center">:</td><td class='news-title'><?php echo $hasilujian->TOTAL_BENAR;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Jawaban Salah</td>
                    <td class="center">:</td><td class='news-title'><?php echo $hasilujian->TOTAL_SALAH;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Jawaban Kosong</td>
                    <td class="center">:</td><td class='news-title'><?php echo $hasilujian->TOTAL_TIDAKJAWAB;?></td>
                  </tr>
                  <tr>
                    <td class='news-title' style="font-size: 25px!important;">Nilai</td>
                    <td class="center" style="font-size: 25px!important;">:</td><td class='news-title' style="font-size: 25px!important;"><?php echo $hasilujian->TOTAL_SCORE;?></td>
                  </tr>
                   <!-- <tr>
                    <td class='news-title'>Negative marks:</td>
                    <td class='news-title'>
                      <div style="float:left"><i class="icon-ok-sign icon-2x"></i>&nbsp;&nbsp;1</div>
                    </td>
                  </tr> -->
                </table>
                <?php }else{?>
                  <div style="text-align: center; font-size: 30px; font-weight: bold;">TERIMAKASIH ANDA TELAH MENGERJAKAN TEST INI</div>
                  <div style="text-align: center; font-size: 30px; font-weight: bold;">Hasil Akan Di Umumkan Diwaktu Yang Akan Ditentukan</div>
                <?php }?>
              </td>
            </tr>
          </table>
          </div>
        </div>
      </div>
    </div>
    <?php if(isset($hasilujian->NAMA)){ ?>
    <center>
    <a href="<?php echo base_url('DataUjian/download/'); ?><?php echo $idnya;?>" target='blank' class='btn btn-default'><img src="<?php echo base_url(); ?>images/pdf.png"> Cetak PDF</a>
    <!-- <a href="<?php echo base_url('master/siswa/excel'); ?>" target='blank' class='btn btn-default'><img src="<?php echo base_url(); ?>images/xls.png"> Cetak Excel</a> -->
    </center>
    <?php }?>
  </div>
</div>