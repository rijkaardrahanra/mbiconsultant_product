<?php
//print_r($babs);die();
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
            <h3 class="title"><i class="icon-edit"></i>Manage Siswa </h3>
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
              <i class="icon-align-justify"></i>Daftar Siswa
              </a>
            </li>
            <li>
              <a href="#add" data-toggle="tab">
              
              <i class="icon-plus"></i>Tambah Data Siswa 
              </a>
            </li>
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">
            <div class="tab-pane box  active" id="list">
            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
            <thead>
              <tr>
                <th><div>No</div></th>
                <th><div>Nama</div></th>
                <th><div>Kelas</div></th>
                <th><div>Alamat</div></th>
                <th><div>Telepon</div></th>
                <th><div>Email</div></th>
                <th><div>Aksi</div></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
                foreach ($siswa as $siswa) {
              ?>
                <tr>
                
                  <td class="center"><?php echo $no;  ?></td>
                  <td class="center"><?php echo $siswa->NAMA;  ?></td>
                  <td class="center"><?php echo $siswa->KELAS;  ?> <?php echo $siswa->NAMA_PROGRAM;  ?></td>
                  <td class="center"><?php echo $siswa->ADDRESS;  ?></td>
                  <td class="center"><?php echo $siswa->PHONE;  ?></td>
                  <td class="center"><?php echo $siswa->EMAIL;  ?></td>
                  <td class="center">
                  <!-- <a data-toggle="modal" href="batch_edit.php?b_id=7" class="btn btn-gray btn-small"><i class="icon-wrench"></i> Edit</a> -->
                  <a href="#" class="btn btn-red btn-small btnHapusSiswa" data-id="<?php echo $siswa->USR_USER_ID;?>"><i class="icon-list-ul"></i> Hapus</a>

                  </td>
                </tr>
              <?php
                $no++;}
              ?>
            </tbody>
            </table>
             <div class="form-actions">
    <center>
    <!-- <a href="<?php echo base_url('master/siswa/pdf'); ?>" target='blank' class='btn btn-default'><img src="<?php echo base_url(); ?>images/pdf.png"> Cetak PDF</a> -->
    <a href="<?php echo base_url('master/siswa/excel'); ?>" target='blank' class='btn btn-default'><img src="<?php echo base_url(); ?>images/xls.png"> Cetak Excel</a>
    </center>
    </div>
            </div>

            <div class="tab-pane box" id="add" style="padding: 5px">
            <div class="box-content">
              <form id="formsiswa"  name="formsiswa" class="form-horizontal validatable"   enctype="multipart/form-data">
                

                
              <?php 
                  $sessions = $this->session->userdata('logged_in')['result'];
                  $token_data=$this->db->query("SELECT * from usr_user uu
                               where uu.USR_USER_ID='".$sessions->USR_USER_ID."'")->row();
                  $token= $token_data->TOKEN;
               ?>
              <input  type="hidden" name="token" value="<?php echo $token; ?>">

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Kelas</label>
                    <div class="controls">
                      <select name="kelas" id="kelas" required class="chzn-select ">
                        <option value="">Pilih Kelas</option>
                        <?php foreach ($kelas as $kelas) { echo '<option  value="'.$kelas->KLS_KELAS_ID.'" >'.$kelas->KELAS.'</option>'; } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Program / Jurusan</label>
                    <div class="controls">
                      <select name="program" id="program" required class="chzn-select ">
                        <option value="">Pilih Program / Jurusan</option>
                        <?php foreach ($program as $program) { echo '<option value="'.$program->PROG_PROGRAM_ID.'">'.$program->NAMA_PROGRAM.'</option>'; } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Nama</label>
                    <div class="controls">
                      <input type="text" class="" required name="nama" id="nama">
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Username</label>
                    <div class="controls">
                      <input type="text" class="" required name="username" id="username">
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                      <input type="text" class="" required name="email" id="email">
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Alamat</label>
                    <div class="controls">
                      <input type="text" class="" required name="alamat" value="jawa timur" id="alamat">
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Telepon</label>
                    <div class="controls">
                      <input type="text" class="" value="+628" required name="telepon" id="telepon">
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                      <input type="password" class="" value="12345678" required name="password" id="password">
                      <br><span>*password default "12345678" </span>
                    </div>
                  </div>
                </div>


                <div class="form-actions">
                  <button id="savesiswa" class="btn btn-gray">Simpan</button>
                  <!-- <input type="submit"  class="login100-form-btn "  value="Simpan"> -->
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
      <input type="text" name="idsiswanya" id="idsiswanya">
    </div>
    <div class="modal-footer">
      <a href="<?php echo base_url('master/bab/hapus');?>" id="delete_link" class="btn btn-red" >Ya</a>
      <button class="btn btn-default" data-dismiss="modal">Tidak</button>
    </div>
</div>

<script type="text/javascript">
jQuery(function($){
  // username
  $('#nama').keyup(function(){
    var nama = $(this).val();
    var slug  = nama.toLowerCase().replace(/[^a-zA-Z0-9]+/g,'-');
    var emaile = slug+'@mbiconsultant.com';
    $('#username').val(slug);
    $('#email').val(emaile);
  });

 
});
</script>

<script type="text/javascript">


$(document).on('click', '.btnHapusSiswa', function(e){
  e.preventDefault();
  var idsiswa = $(this).data('id');
  var siswa = $(this).closest('tr').find('td:nth-child(1)').html();
  
  $('#modal-delete').modal();
  $('#modal-body-delete').html('Yakin Akan Menghapus Siswa    '+siswa+'  ?');
  $('#delete_link').attr('data-id',idsiswa);
});

//delete bab
$(document).on('click', '#delete_link', function(e){
  e.preventDefault();
  var idsiswa = $(this).data('id');
  $.ajax({
  url: "<?php echo site_url('master/siswa/hapus'); ?>",
  type: "POST",
  cache: false,
  data: {id:idsiswa},
  dataType:'json',
  success: function(json){
    console.log(json);
    if (json.status==1) {
      alert(json.pesan);
      window.location.replace("<?php echo site_url('master/siswa/index'); ?>");
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


$(document).on('click', '#savesiswa', function(e){
    e.preventDefault();
    $.ajax({
    url: "<?php echo site_url('master/siswa/tambah'); ?>",
    type: "POST",
    cache: false,
    data: $('#formsiswa').serialize(),
    dataType:'json',
    success: function(json){
      //console.log(json);
      if (json.status==1) {
        alert(json.pesan);
        window.location.replace("<?php echo site_url('master/siswa'); ?>");
      }else{
        alert(json.pesan);
      }
    },
    error: function(json){
      console.log(json.responseText);
      alert(json.pesan);
    }
    });
});
</script>