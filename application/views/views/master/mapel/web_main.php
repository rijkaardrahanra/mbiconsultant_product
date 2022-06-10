<?php
//print_r($mapels);die();
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
            <h3 class="title"><i class="icon-edit"></i>Manage Mapel </h3>
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
              <i class="icon-align-justify"></i>Daftar Mapel
              </a>
            </li>
            <li>
              <a href="#add" data-toggle="tab">
              <i class="icon-plus"></i>Tambah Data Mapel
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
                <th><div>Mapel</div></th>
                <th><div>Aksi</div></th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($mapels as $mapel) {
              ?>
                <tr>
                  <td class="center">
                    <?php
                    echo $mapel->NAMA_MAPEL;  
                    ?>
                  </td>
                  <td class="center">
                  <!-- <a data-toggle="modal" href="batch_edit.php?b_id=7" class="btn btn-gray btn-small"><i class="icon-wrench"></i> Edit</a> -->
                  <a href="#" class="btn btn-red btn-small btnHapusmapel" data-id="<?php echo $mapel->MP_MAPEL_ID;?>"><i class="icon-list-ul"></i> Hapus</a>

                  </td>
                </tr>
              <?php
                }
              ?>
            </tbody>
            </table>
            </div>

            <div class="tab-pane box" id="add" style="padding: 5px">
            <div class="box-content">
              <form id="FormMapel" name="FormMapel" class="form-horizontal validatable" >
               <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Nama Mapel</label>
                    <div class="controls">
                      <input type="text" class="validate[required]" required name="nama_mapel" id="nama_mapel"/>
                    </div>
                  </div>
                </div>

                
                <div class="form-actions">
                  <button id="saveMapel" class="btn btn-gray">Simpan</button>
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
    <div class="modal-delete-body" id="modal-body-delete">
      <input type="text" name="idmapelnya" id="idmapelnya">
    </div>
    <div class="modal-footer">
      <a href="<?php echo base_url('master/mapel/hapus');?>" id="delete_link" class="btn btn-red" >Ya</a>
      <button class="btn btn-default" data-dismiss="modal">Tidak</button>
    </div>
</div>
<script type="text/javascript">
$(document).on('change', '#mapel', function(e){
    e.preventDefault();
    var valMapel = $(this).val();
    $('#kelas').find('option').addClass('hide');
    $('#kelas').find('option:first').removeClass('hide');
    $('#kelas').find('option').filter(function () { return $(this).data('mapel') == valMapel; }).removeClass('hide');
    $("#kelas").val($("#kelas option:first").val());
});
$(document).on('click', '.btnHapusmapel', function(e){
  e.preventDefault();
  var idmapel = $(this).data('id');
  var mapel = $(this).closest('tr').find('td:nth-child(1)').html();
  
  $('#modal-delete').modal();
  $('#modal-body-delete').html('Yakin Akan Menghapus Mapel   '+mapel+'  ?');
  $('#delete_link').attr('data-id',idmapel);
});

//delete mapel
$(document).on('click', '#delete_link', function(e){
  e.preventDefault();
  var idmapel = $(this).data('id');
  $.ajax({
  url: "<?php echo site_url('master/mapel/hapus'); ?>",
  type: "POST",
  cache: false,
  data: {id:idmapel},
  dataType:'json',
  success: function(json){
    console.log(json);
    if (json.status==1) {
      alert(json.pesan);
      window.location.replace("<?php echo site_url('master/mapel/index'); ?>");
    }else{
      alert(json.pesan);
    }
  },
  error: function(){
    console.log('Error');
    alert('Error');
  }
  });
});

$(document).on('click', '#saveMapel', function(e){
    e.preventDefault();
    $.ajax({
    url: "<?php echo site_url('master/mapel/simpanTambah'); ?>",
    type: "POST",
    cache: false,
    data: $('#FormMapel').serialize(),
    dataType:'json',
    success: function(json){
      console.log(json);
      if (json.status==1) {
        alert(json.pesan);
        window.location.replace("<?php echo site_url('master/mapel/index'); ?>");
      }else{
        alert(json.pesan);
      }
    },
    error: function(){
      console.log('Error');
      alert('Error');
    }
    });
});
</script>