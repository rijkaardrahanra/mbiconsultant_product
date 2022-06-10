<?php
//print_r($programs);die();
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
            <h3 class="title"><i class="icon-edit"></i>Manage Program </h3>
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
              <i class="icon-align-justify"></i>Daftar Program
              </a>
            </li>
            <li>
              <a href="#add" data-toggle="tab">
              <i class="icon-plus"></i>Tambah Data Program
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
                <th><div>Program</div></th>
                <th><div>Aksi</div></th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($programs as $program) {
              ?>
                <tr>
                  <td class="center">
                    <?php
                    echo $program->NAMA_PROGRAM;  
                    ?>
                  </td>
                  <td class="center">
                  <!-- <a data-toggle="modal" href="batch_edit.php?b_id=7" class="btn btn-gray btn-small"><i class="icon-wrench"></i> Edit</a> -->
                  <a href="#" class="btn btn-red btn-small btnHapusprogram" data-id="<?php echo $program->PROG_PROGRAM_ID;?>"><i class="icon-list-ul"></i> Hapus</a>

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
              <form id="FormProgram" name="FormProgram" class="form-horizontal validatable" >
               <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Nama Program</label>
                    <div class="controls">
                      <input type="text" class="validate[required]" required name="nama_program" id="nama_program"/>
                    </div>
                  </div>
                </div>

                
                <div class="form-actions">
                  <button id="saveProgram" class="btn btn-gray">Simpan</button>
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
      <input type="text" name="idprogramnya" id="idprogramnya">
    </div>
    <div class="modal-footer">
      <a href="<?php echo base_url('master/program/hapus');?>" id="delete_link" class="btn btn-red" >Ya</a>
      <button class="btn btn-default" data-dismiss="modal">Tidak</button>
    </div>
</div>
<script type="text/javascript">

$(document).on('click', '.btnHapusprogram', function(e){
  e.preventDefault();
  var idprogram = $(this).data('id');
  var program = $(this).closest('tr').find('td:nth-child(1)').html();
  
  $('#modal-delete').modal();
  $('#modal-body-delete').html('Yakin Akan Menghapus Program   '+program+'  ?');
  $('#delete_link').attr('data-id',idprogram);
});

//delete program
$(document).on('click', '#delete_link', function(e){
  e.preventDefault();
  var idprogram = $(this).data('id');
  $.ajax({
  url: "<?php echo site_url('master/program/hapus'); ?>",
  type: "POST",
  cache: false,
  data: {id:idprogram},
  dataType:'json',
  success: function(json){
    console.log(json);
    if (json.status==1) {
      alert(json.pesan);
      window.location.replace("<?php echo site_url('master/program/index'); ?>");
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

$(document).on('click', '#saveProgram', function(e){
    e.preventDefault();
    $.ajax({
    url: "<?php echo site_url('master/program/simpanTambah'); ?>",
    type: "POST",
    cache: false,
    data: $('#FormProgram').serialize(),
    dataType:'json',
    success: function(json){
      console.log(json);
      if (json.status==1) {
        alert(json.pesan);
        window.location.replace("<?php echo site_url('master/program/index'); ?>");
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