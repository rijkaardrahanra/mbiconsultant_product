<?php
/*($hasilujian->NAMA_PROGRAM ? $prog = $hasilujian->NAMA_PROGRAM : $prog = '');
($hasilujian->EMAIL ? $mail = $hasilujian->EMAIL : $mail = '-');*/

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
                <table border='0' cellpadding='0' cellspacing='0' width='100%' class='table table-normal'>
                  <tr>
                    <td class='news-title'>Nama Siswa</td>
                    <td class="center">:</td><td class='news-title'><?php echo $detailsiswa->NAMA;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Email</td>
                    <td class="center">:</td><td class='news-title'><?php echo $detailsiswa->EMAIL;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Nama Ujian</td>
                    <td class="center">:</td><td class='news-title'><?php echo $detailsiswa->NAMA_UJIAN;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Kelas</td>
                    <td class="center">:</td><td class='news-title'><?php echo $detailsiswa->KELAS.' '.$detailsiswa->NAMA_JENJANG.' '.$detailsiswa->NAMA_PROGRAM;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Mata Pelajaran</td>
                    <td class="center">:</td><td class='news-title'><?php echo $detailsiswa->NAMA_MAPEL;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Tanggal Ujian</td>
                    <td class="center">:</td><td class='news-title'><?php echo complete_tanggal_indo($detailsiswa->TGL_MULAI_UJIAN);?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Durasi Ujian</td>
                    <td class="center">:</td><td class='news-title'><?php echo $detailsiswa->DURASI_UJIAN_MENIT.' Menit';?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Total Soal</td>
                    <td class="center">:</td><td class='news-title'><?php echo ($detailsiswa->TOTAL_BENAR+$detailsiswa->TOTAL_SALAH+$detailsiswa->TOTAL_TIDAKJAWAB);?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Jawaban Benar</td>
                    <td class="center">:</td><td class='news-title'><?php echo $detailsiswa->TOTAL_BENAR;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Jawaban Salah</td>
                    <td class="center">:</td><td class='news-title'><?php echo $detailsiswa->TOTAL_SALAH;?></td>
                  </tr>
                  <tr>
                    <td class='news-title'>Jawaban Kosong</td>
                    <td class="center">:</td><td class='news-title'><?php echo $detailsiswa->TOTAL_TIDAKJAWAB;?></td>
                  </tr>
                  <tr>
                    <td class='news-title' style="font-size: 25px!important;">Nilai</td>
                    <td class="center" style="font-size: 25px!important;">:</td><td class='news-title' style="font-size: 25px!important;"><?php echo $detailsiswa->TOTAL_SCORE;?></td>
                  </tr>
                   <!-- <tr>
                    <td class='news-title'>Negative marks:</td>
                    <td class='news-title'>
                      <div style="float:left"><i class="icon-ok-sign icon-2x"></i>&nbsp;&nbsp;1</div>
                    </td>
                  </tr> -->
                </table>
              </td>
            </tr>
            <tr><td style='line-height:30px; color:#7087A3;font-size:20px;padding-left:5px'>Detail Information</td></tr>
            <tr>
              <td>
                  <table border='0' cellpadding='0' cellspacing='0' width='100%'class='table table-normal'>
                    <thead>
                      <tr>
                        <th class='news-title'>SNo.</th>
                        <th class='news-title'>Pertanyaan</th>
                        <th class='news-title'>Points</th>
                        <th class='news-title'>Jawaban Siswa</th>
                        <th class='news-title'>Jawaban Benar</th>
                        <th class='news-title'>Hasil</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php foreach ($detail_jawaban as $row) {
                      ?>
                      <tr>
                        <td><?php echo $row->NOSOAL ?></td>
                        <td><?php echo $row->SOAL ?></td>
                        <td><?php echo $row->SUB_SCORE ?></td>
                        <td><?php echo $row->JAWAB ?></td>
                        <td><?php echo $row->JAWABAN_BENAR ?></td>
                        <td><?php if ( $row->T_OR_F == 1) { echo '<i class="icon-ok-sign icon-2x"></i>';} else{echo '<i class="icon-remove-sign icon-2x"></i';} ?></td>
                      </tr>

                    <?php } ?>
                    </tbody>
                      
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>