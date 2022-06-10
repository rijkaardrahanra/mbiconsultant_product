<?php
//print_r($jenjangs);die();
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
            <h3 class="title"><i class="icon-edit"></i>Manage Jenjang </h3>
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
              <i class="icon-align-justify"></i>Daftar Jenjang
              </a>
            </li>
            <li>
              <a href="#add" data-toggle="tab">
              <i class="icon-plus"></i>Tambah Data Jenjang
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
                <th><div>Aksi</div></th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($jenjangs as $jenjang) {
              ?>
                <tr>
                  <td class="center">
                    <?php
                    echo $jenjang->NAMA_JENJANG;  
                    ?>
                  </td>
                  <td class="center">
                  <!-- <a data-toggle="modal" href="batch_edit.php?b_id=7" class="btn btn-gray btn-small"><i class="icon-wrench"></i> Edit</a> -->
                  <a href="#" class="btn btn-red btn-small btnHapusjenjang" data-id="<?php echo $jenjang->JNJG_JENJANG_ID;?>"><i class="icon-list-ul"></i> Hapus</a>

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
              <form id="FormJenjang" name="FormJenjang" class="form-horizontal validatable" >
               <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Nama Jenjang</label>
                    <div class="controls">
                      <input type="text" class="validate[required]" required name="nama_jenjang" id="nama_jenjang"/>
                    </div>
                  </div>
                </div>

                
                <div class="form-actions">
                  <button id="saveJenjang" class="btn btn-gray">Simpan</button>
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
      <input type="text" name="idjenjangnya" id="idjenjangnya">
    </div>
    <div class="modal-footer">
      <a href="<?php echo base_url('master/jenjang/hapus');?>" id="delete_link" class="btn btn-red" >Ya</a>
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
$(document).on('click', '.btnHapusjenjang', function(e){
  e.preventDefault();
  var idjenjang = $(this).data('id');
  var jenjang = $(this).closest('tr').find('td:nth-child(1)').html();
  
  $('#modal-delete').modal();
  $('#modal-body-delete').html('Yakin Akan Menghapus Jenjang   '+jenjang+'  ?');
  $('#delete_link').attr('data-id',idjenjang);
});

//delete jenjang
$(document).on('click', '#delete_link', function(e){
  e.preventDefault();
  var idjenjang = $(this).data('id');
  $.ajax({
  url: "<?php echo site_url('master/jenjang/hapus'); ?>",
  type: "POST",
  cache: false,
  data: {id:idjenjang},
  dataType:'json',
  success: function(json){
    console.log(json);
    if (json.status==1) {
      alert(json.pesan);
      window.location.replace("<?php echo site_url('master/jenjang/index'); ?>");
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

$(document).on('click', '#saveJenjang', function(e){
    e.preventDefault();
    $.ajax({
    url: "<?php echo site_url('master/jenjang/simpanTambah'); ?>",
    type: "POST",
    cache: false,
    data: $('#FormJenjang').serialize(),
    dataType:'json',
    success: function(json){
      console.log(json);
      if (json.status==1) {
        alert(json.pesan);
        window.location.replace("<?php echo site_url('master/jenjang/index'); ?>");
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