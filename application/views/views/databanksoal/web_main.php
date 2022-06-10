<?php
//print_r($manmapels);die();
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
            <h3 class="title"><i class="icon-edit"></i>Bank Soal </h3>
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
        </div>
        <div class="box-content padded">
          <div class="tab-content">
            <div class="tab-pane box active" id="list">
            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
            <thead>
              <tr>
                <th><div>Jenjang</div></th>
                <th><div>Kelas</div></th>
                <th><div>Program</div></th>
                <th><div>Mata Pelajaran</div></th>
                <th><div>Aksi</div></th>
              </tr>
            </thead>
            <tbody>

              <?php //print_r($manmapels);die();
                foreach ($manmapels as $manmapel) {
              ?>
                <tr>
                  <td class="center"><?php echo $manmapel->NAMA_JENJANG; ?></td>
                  <td class="center"><?php echo $manmapel->KELAS; ?></td>
                  <td class="center"><?php echo $manmapel->NAMA_PROGRAM; ?></td>
                  <td class="center"><?php echo $manmapel->NAMA_MAPEL; ?></td>
                  <td class="center">
                      <a href="#" class="btn btn-blue btn-small inputpertanyaan" data-key="<?php echo $manmapel->token;?>"><i class="icon-list-ul"></i> Input Pertanyaan</a>
                      <a href="<?php echo base_url();?>Question/index/<?php echo $manmapel->MM_MANAGE_MAPEL_ID; ?>" class="btn btn-green btn-small lihatpertanyaan" data-key="<?php echo $manmapel->token;?>"><i class="icon-list-ul"></i> Lihat Pertanyaan</a>
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
<div id="modal-delete" class="modal fade" style="height:140px;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; Konfirmasi Hapus</h6>
  </div>
    <div class="modal-delete-body" id="modal-body-delete"></div>
    <div class="modal-footer">
      <a href="" id="delete_link" class="btn btn-red" >Ya</a>
      <button class="btn btn-default" data-dismiss="modal">Tidak</button>
    </div>
</div>
<script type="text/javascript">
$(document).on('click', '.inputpertanyaan', function(e){
  e.preventDefault();
  var keymapel = $(this).data('key');
  window.location.replace("<?php echo site_url('DataBankSoal/pertanyaan'); ?>/"+keymapel);
});
$(document).on('click', '#saveManageMapel', function(e){
    e.preventDefault();
    $.ajax({
    url: "<?php echo site_url('DataManMapel/simpanTambah'); ?>",
    type: "POST",
    cache: false,
    data: $('#formManageMapel').serialize(),
    dataType:'json',
    success: function(json){
      //console.log(json);
      if (json.status==1) {
        alert(json.pesan);
        window.location.replace("<?php echo site_url('DataManMapel/index'); ?>");
      }else{
        alert(json.pesan);
      }
    },
    error: function(json){
      console.log(json.responseText);
      alert('Error');
    }
    });
});
$(document).on('click', '#delete_link', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
    url: "<?php echo site_url('DataManMapel/hapusData'); ?>",
    type: "POST",
    cache: false,
    data: {id:id},
    dataType:'json',
    success: function(json){
      console.log(json);
      if (json.status==1) {
        alert(json.pesan);
        window.location.replace("<?php echo site_url('DataManMapel/index'); ?>");
      }else{
        alert(json.pesan);
      }
    },
    error: function(json){
      console.log(json.responseText);
      alert('Error');
    }
    });
});
</script>