<?php
//print_r($manmapels);die();
// print_r('Sedang Maintenance ....');die();

//print_r();die();
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
            <h3 class="title"><i class="icon-edit"></i>Manage Mata Pelajaran </h3>
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
              <a href="#list" data-toggle="tab">
              <i class="icon-align-justify"></i>Daftar Mata Pelajaran
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
                <th><div>Nama Ujian</div></th>
                <th><div>Mata Pelajaran</div></th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($this->session->userdata('logged_in')['menu_ujian'] as $ujian) {
              ?>
                <tr>
                  <td>
                  <!-- <a href="#" class="btnopensiswaujian" data-id="<?php echo md5($ujian->PKTU_PAKETUJIAN_ID);?>" style="color: blue;text-decoration: underline"> -->
                  <?php echo $ujian->NAMA_UJIAN;?>
                  <!-- </a> -->
                  </td>
                  <td>
                  <?php
                    $nm_mapel = '';
                    foreach ($dataujians as $dataujian) {
                      if($dataujian->PKTU_PAKETUJIAN_ID==$ujian->PKTU_PAKETUJIAN_ID){
                        $nm_mapel .= '<a href="#" class="btn btn-dafault btn-small btnopensiswaujian" data-iddetail="'. md5($dataujian->ID_DETAIL_PAKETUJIAN).'" style="color: blue;text-decoration: underline">'.$dataujian->NAMA_MAPEL.'('.$dataujian->KELAS.')<a/>';
                      }
                    }
                    echo $nm_mapel;
                  ?>
                  </td>
                </tr>
              <?php
                }
              ?>
            </tbody>
            </table>
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
$(document).on('click', '.btnopensiswaujian', function(e){
  e.preventDefault();
  //alert('masuk');
  var idpaketujian = $(this).data('iddetail');
  window.location.replace("<?php echo site_url('ResetUjian/detailSiswaUjian/'); ?>"+idpaketujian);
});
</script>