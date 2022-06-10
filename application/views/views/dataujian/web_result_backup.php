<?php
//print_r($hasilujians->TOTAL_SCORE);die();
?>
<link href="<?php echo base_url(); ?>student/css/question.css" media="screen" rel="stylesheet" type="text/css" />
<style type="text/css">
  .hide{
    display: none !important;
  }
  .center{
    text-align: center !important;
  }
  body {
  margin: 0;
}

</style>
  <!-- Start Main Content -->
  <div class="main-content">
    <div class="container-fluid" >
      <div class="row-fluid">
        <div class="area-top clearfix">
          <div class="pull-left header">
            <h3 class="title"><i class="icon-edit"></i>Ujian </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Container Box-->
    <div class="container-fluid padded">
      <!-- Start Box-->
      <div class="box">
        <div class="box-header">
          <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
              <a href="#add" data-toggle="tab">
              <i class="icon-align-justify"></i>Pengumuman Hasil
              </a>
            </li>
            <li>
              <a href="#syaratketentuan" data-toggle="tab" id="syaratlink" style="display: none;">
              <i class="icon-plus"></i>Syarat
              </a>
            </li>
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">

            <div class="tab-pane box active" id="add" style="padding: 5px">
            <div class="box-content">
              <div style="padding-top: 60px; padding-bottom: 60px;">
                <div style="text-align: center; font-size: 30px; font-weight: bold;">TERIMAKASIH ANDA TELAH MENGERJAKAN TEST INI</div>
                <?php if($hasilujian->status==1){ ?>
                <div style="text-align: center; font-size: 20px; font-weight: bold; padding-top: 60px;">NILAI ANDA ADALAH</div>
                <div style="text-align: center; font-size: 40px; font-weight: bold;"><?php echo number_format((float)$hasilujian->TOTAL_SCORE, 2, '.', ''); ?></div>
                <div style="text-align: center; margin: auto;">
                  <table border="0" style="margin: auto;">
                    <tr>
                      <td style="text-align: left;">Total Jawaban Benar</td>
                      <td>&nbsp;:&nbsp;</td>
                      <td><?php echo $hasilujian->TOTAL_BENAR; ?></td>
                    </tr>
                    <tr>
                      <td style="text-align: left;">Total Jawaban Salah</td>
                      <td>&nbsp;:&nbsp;</td>
                      <td><?php echo $hasilujian->TOTAL_SALAH; ?></td>
                    </tr>
                    <tr>
                      <td style="text-align: left;">Total Tidak Jawab</td>
                      <td>&nbsp;:&nbsp;</td>
                      <td><?php echo $hasilujian->TOTAL_TIDAKJAWAB; ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3" style="margin: auto;" ><a href="#">Lihat Detail</a></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Box-->

    </div>
    <!-- End Container Box-->
  </div>
  <!-- End Main Content -->
</div>
<!-- End Div Main Body -->
<script type="text/javascript">
/* Get into full screen */

</script>


<!-- <div class="box">
      
<script>
$(document).ready(function() {
function ask()
{
Growl.info({title:"&nbsp; Ujian ini telah dilaksanakan! ",text:" "});
}
setTimeout(ask, 500);
});
</script>
        <div class="box-header">    
          <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
              <a href="#list" data-toggle="tab"><i class="icon-info-sign"></i>Informasi </a></li>
            
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">
            <div class="tab-pane box active" id="list" valign="top">
              


<div style="padding-top: 60px; padding-bottom: 60px;"><div class="thanks" style="text-align: center; font-size: 30px; font-weight: bold;"></div><div class="thanks" style="text-align: center; font-size: 30px; font-weight: bold;">TERIMAKASIH ANDA TELAH MENGERJAKAN TEST INI</div><div class="thanks" style="text-align: center; font-size: 20px; font-weight: bold; padding-top: 60px;">NILAI ANDA ADALAH</div><div class="thanks" style="text-align: center; font-size: 40px; font-weight: bold;">100</div></div>

            </div>
            
          </div>
        </div>
      </div> -->