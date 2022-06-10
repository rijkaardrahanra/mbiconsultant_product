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
            <li>
              <a href="#add" data-toggle="tab">
              <i class="icon-plus"></i>Manage Mata Pelajaran
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
                <th><div>Jenjang</div></th>
                <th><div>Kelas</div></th>
                <th><div>Program</div></th>
                <th><div>Mata Pelajaran</div></th>
                <th><div>Aksi</div></th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($manmapels as $manmapel) {
              ?>
                <tr>
                <?php
                  foreach ($kelass as $kelas) {
                  if($manmapel->KLS_KELAS_ID==$kelas->KLS_KELAS_ID){
                ?>
                  <td class="center">
                    <?php
                    foreach ($jenjangs as $jenjang) {
                      if($kelas->JNJG_JENJANG_ID==$jenjang->JNJG_JENJANG_ID){
                        echo $jenjang->NAMA_JENJANG;
                      }
                    }
                    ?>
                  </td>
                  <td class="center">
                <?php
                    echo $kelas->KELAS;
                ?>
                  </td>
                <?php
                  }
                  }
                ?>
                  <td class="center">
                    <?php
                      if($manmapel->PROG_PROGRAM_ID){
                        foreach ($programs as $program) {
                          if($manmapel->PROG_PROGRAM_ID==$program->PROG_PROGRAM_ID){
                            echo $program->NAMA_PROGRAM;
                          }
                        }
                      }else{
                        echo '-';
                      }
                    ?>
                  </td>
                  <td class="center">
                    <?php
                      foreach ($mapels as $mapel){
                        if($manmapel->MP_MAPEL_ID==$mapel->MP_MAPEL_ID){
                          echo $mapel->NAMA_MAPEL;
                        }
                      }
                    ?>
                  </td>
                  <td class="center"><a href="#" class="btn btn-red btn-small btnHapusManMapel" data-id="<?php echo $manmapel->MM_MANAGE_MAPEL_ID;?>"><i class="icon-list-ul"></i> Hapus</a></td>
                </tr>
              <?php
                }
              ?>
            </tbody>
            </table>
            </div>

            <div class="tab-pane box" id="add" style="padding: 5px">
            <div class="box-content">
              <form id="formManageMapel" name="formManageMapel" class="form-horizontal validatable" >
                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Mata Pelajaran</label>
                    <div class="controls">
                      <select name="mapel" id="mapel" class="chzn-select">
                        <option value="">Pilih Mata Pelajaran</option>
                        <?php foreach ($mapels as $mapel) { echo '<option value="'.$mapel->MP_MAPEL_ID.'">'.$mapel->NAMA_MAPEL.'</option>'; } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Jenjang</label>
                    <div class="controls">
                      <select name="jenjang" id="jenjang" class="chzn-select">
                        <option value="">Pilih Jenjang</option>
                        <?php foreach ($jenjangs as $jenjang) { echo '<option value="'.$jenjang->JNJG_JENJANG_ID.'">'.$jenjang->NAMA_JENJANG.'</option>'; } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Kelas</label>
                    <div class="controls">
                      <select name="kelas" id="kelas" class="chzn-select">
                        <option value="">Pilih Kelas</option>
                        <?php foreach ($kelass as $kelas) { echo '<option class="hide" value="'.$kelas->KLS_KELAS_ID.'" data-jenjang="'.$kelas->JNJG_JENJANG_ID.'">'.$kelas->KELAS.'</option>'; } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Program / Jurusan</label>
                    <div class="controls">
                      <select name="program" id="program" class="chzn-select">
                        <option value="">Pilih Program / Jurusan</option>
                        <?php foreach ($programs as $program) { echo '<option value="'.$program->PROG_PROGRAM_ID.'">'.$program->NAMA_PROGRAM.'</option>'; } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-actions">
                  <button id="saveManageMapel" class="btn btn-gray">Simpan</button>
                </div>
              </form>
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
$(document).on('change', '#jenjang', function(e){
    e.preventDefault();
    var valJenjang = $(this).val();
    $('#kelas').find('option').addClass('hide');
    $('#kelas').find('option:first').removeClass('hide');
    $('#kelas').find('option').filter(function () { return $(this).data('jenjang') == valJenjang; }).removeClass('hide');
    $("#kelas").val($("#kelas option:first").val());
});
$(document).on('click', '.btnHapusManMapel', function(e){
  e.preventDefault();
  var idmanmapel = $(this).data('id');
  var jenjang = $(this).closest('tr').find('td:nth-child(1)').html();
  var kelas = $(this).closest('tr').find('td:nth-child(2)').html();
  var program = $(this).closest('tr').find('td:nth-child(3)').html();
  if (program.indexOf('-') != -1) {
    program = '';
  }
  var mapel = $(this).closest('tr').find('td:nth-child(4)').html();
  $('#modal-delete').modal();
  $('#modal-body-delete').html('Yakin Akan Menghapus Mata Pelajaran '+mapel+' '+jenjang+' Kelas '+kelas+' '+program+' ?');
  $('#delete_link').attr('data-id',idmanmapel);
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