<?php
//print_r($kliens);die();
$idclient=$this->uri->segment(3);
?>

<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url();?>/js/timepicker/jquery-ui.css" />
<script type="text/javascript" src="<?php echo base_url();?>/js/timepicker/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/timepicker/jquery-ui-timepicker-addon.js"></script>
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
            <h3 class="title"><i class="icon-edit"></i>Klien <?php echo $klien->NAMA;?></h3>
          </div>&nbsp;<a style="margin-top: 5px;" href="#" class="btn btn-red btn-small btnHapusKlien" data-id="<?php echo $klien->USR_USER_ID;?>"><i class="icon-trash"></i> Hapus</a>
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
              <a href="#pketujian" data-toggle="tab">
              <i class="icon-list"></i>Daftar Paket Ujian
              </a>
            </li>
            <li>
              <a href="#addpketujian" data-toggle="tab">
              <i class="icon-plus"></i>Tambah Paket Ujian
              </a>
            </li>
            <li>
              <a href="#add" data-toggle="tab">
              <i class="icon-pencil"></i>Edit Klien
              </a>
            </li>
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">
            <div class="tab-pane box active" id="pketujian">
            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
            <thead>
              <tr>
                <th><div>Nama Paket Ujian</div></th>
                <th><div>Kouta Akses</div></th>
                <th><div>Tanggal Pelaksanaan</div></th>
                <th><div>Tampil Hasil (Langsung)</div></th>
                <th><div>Aksi</div></th>
              </tr>
            </thead>
            <tbody>
            <?php
                    foreach($paketujians as $paketujian){
            ?>
                        <tr>
                          <td><b><div class="nm"><?php echo $paketujian->NAMA_UJIAN; ?></div></b></td>
                          <td class="center"><?php echo $paketujian->TOTAL_KUOTA; ?></td>
                          <td class="center"><?php echo complete_tanggal_indo($paketujian->TGL_PELAKSANAAN).'<br/><i style="font-size:10px;">Hingga</i><br/>'.complete_tanggal_indo($paketujian->TGL_SELESAI); ?></td>
                          <td class="center"><?php if($paketujian->IS_LANGSUNGRESULT==0){echo '<i style="color:red;" class="icon-eye-close"></i>';}else{echo '<i style="color:green;" class="icon-eye-open"></i>';} ?><br/><br/>
                          <?php if($paketujian->IS_LANGSUNGRESULT==0){echo '<a href="#" class="btn btn-green btn-small btnLangsung" data-id="'.$paketujian->PKTU_PAKETUJIAN_ID.'" data-langsung="'.$paketujian->IS_LANGSUNGRESULT.'"><i class="icon-eye-open"></i> Langsung</a><br>';}else{echo '<a href="#" class="btn btn-red btn-small btnLangsung" data-id="'.$paketujian->PKTU_PAKETUJIAN_ID.'"  data-langsung="'.$paketujian->IS_LANGSUNGRESULT.'"><i class="icon-eye-close"></i> Tidak Langsung</a><br>';} ?>
                          </td>
                          <td class="center">
                            <a href="#" class="btn btn-red btn-small btnHapus" data-id="<?php echo $paketujian->PKTU_PAKETUJIAN_ID;?>"><i class="icon-trash"></i> Hapus</a>
                          </td>
                        </tr>
            <?php
                    }
            ?>
            </tbody>
            </table>
            </div>
            <div class="tab-pane box" id="addpketujian" style="padding: 5px">
            <div class="box-content">
              <form id="formPketUjian" name="formPketUjian" class="form-horizontal validatable" >
                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Nama Paket Ujian</label>
                    <div class="controls">
                      <input type="text" class="validate[required]" name="nmpktUjian" id="nmpktUjian"/>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Pelaksanaan Ujian</label>
                    <div class="controls">
                      <input type="date" name="start_date" id="start_date"  class="validate[required]"/>
                      <input type="text" name="jammulai" id="jammulai" class="validate[required]"/>
                      <script type="text/javascript">
                      $(document).ready(function(){
                        $('#jammulai').timepicker({
                          //hourGrid: 5,
                          //minuteGrid: 10
                        });
                      });
                      </script>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Penutupan Pelaksanaan Ujian</label>
                    <div class="controls">
                      <input type="date" name="end_date" id="end_date"  class="validate[required]"/>
                      <input type="text" name="jamselesai" id="jamselesai" class="validate[required]"/>
                      <script type="text/javascript">
                      $(document).ready(function(){
                        $('#jamselesai').timepicker({
                          //hourGrid: 5,
                          //minuteGrid: 10
                        });
                      });
                      </script>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Kouta Akses</label>
                    <div class="controls">
                      <input type="text" class="validate[required]" name="kouta" id="kouta" />
                    </div>
                  </div>
                </div>

                <!-- <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Hasil (Langsung)</label>
                    <div class="controls">
                      <input type="text" class="validate[required]" value="0" name="islangsung" id="islangsung" readonly />
                    </div>
                  </div>
                </div> -->

                <div class="form-actions">
                  <button id="addMngMapel" class="btn btn-gray">Simpan</button>
                </div>
              </form>
            </div>
            </div>
            <div class="tab-pane box" id="add" style="padding: 5px">
            <div class="box-content">
              <form id="formKlien" name="formKlien" class="form-horizontal validatable" >
                <div class="padded">
                  <input type="hidden" name="idclient" id="idclient" value="<?php echo $idclient;?>">
                  <div class="control-group">
                    <label class="control-label">Tipe Klien</label>
                    <div class="controls">
                      <select name="clienttype_id" id="clienttype_id" class="chzn-select">
                        <option >Pilih Tipe Klien</option>
                        <?php foreach($tipekliens as $tipeklien){
                          $slt = '';
                          if ($tipeklien->GRP_GROUP_ID==$klien->GRP_GROUP_ID) {
                            $slt = 'selected';
                          }
                          echo '<option '.$slt.' value="'.$tipeklien->GRP_GROUP_ID.'">'.$tipeklien->NAMA_GROUP.'</option>';
                          } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Nama Klien</label>
                    <div class="controls">
                      <input type="text" class="validate[required]" name="nmklien" id="nmklien" value="<?php echo $klien->NAMA;?>" />
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Alamat Lengkap</label>
                    <div class="controls">
                      <select name="prov_id" id="prov_id" class="chzn-select">
                        <option>Pilih Provinsi</option>
                        <?php foreach ($provs as $prov) {
                          $slt = '';
                          if ($prov->NAMA_LOKASI==$klien->PROV) {
                            $slt = 'selected';
                            $idprov = $prov->ID_PROVINSI;
                          }
                          echo '<option value="'.$prov->ID_PROVINSI.'" '.$slt.'>'.CapitalizeEachWord($prov->NAMA_LOKASI).'</option>'; 
                          } ?>
                      </select>
                    </div>
                    <div class="controls">
                      <select name="kabkot_id" id="kabkot_id" class="chzn-select">
                        <option>Pilih Kabupaten/Kota</option>
                        <?php foreach ($kabkots as $kabkot) {
                          $cls ='';
                          $slt = '';
                          if ($kabkot->NAMA_LOKASI==$klien->KABKOT) {
                            $slt = 'selected';
                          }else if($kabkot->ID_PROVINSI!=$idprov){
                            $cls = 'class="hide"';
                          }
                          echo '<option '.$cls.' '.$slt.' value="'.$kabkot->ID_KABUPATENKOTA.'" data-prov="'.$kabkot->ID_PROVINSI.'">'.CapitalizeEachWord($kabkot->NAMA_LOKASI).'</option>';
                          } ?>
                      </select>
                    </div>
                    <div class="controls">
                      <select name="kec_id" id="kec_id" class="chzn-select">
                        <option>Pilih Kecamatan</option>
                        <?php echo '<option selected>'.CapitalizeEachWord($klien->CAMAT).'</option>';?>
                      </select>
                    </div>
                    <div class="controls">
                      <select name="kel_id" id="kel_id" class="chzn-select">
                        <option>Pilih Kelurahan</option>
                        <?php echo '<option value="'.$klien->ID_KELURAHAN.'" selected>'.CapitalizeEachWord($klien->LURAH).'</option>';?>
                      </select>
                    </div>
                    <div class="controls">
                      <input type="text" class="validate[required]" name="almt" id="almt" value="<?php echo $klien->ADDRESS;?>" />
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Telepon / Handphone</label>
                    <div class="controls">
                      <input type="text" class="validate[required]" name="phone" id="phone" value="<?php echo $klien->PHONE;?>"/>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                      <input type="email" class="validate[required]" name="email" id="email" value="<?php echo $klien->EMAIL;?>"/>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Tanggal Kerja Sama</label>
                    <div class="controls">
                      <input type="date" name="start_date" id="start_date"  class="validate[required]" value="<?php echo $klien->TGL_KERJASAMA;?>"/>
                    </div>
                  </div>
                </div>

                <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Nama Pengguna</label>
                    <div class="controls">
                      <input type="text" class="validate[required]" name="user" id="user" value="<?php echo $klien->USERNAME;?>"/>
                    </div>
                  </div>
                </div>

                <div class="form-actions">
                  <button id="saveClient" class="btn btn-gray">Simpan</button>
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
      <a href="" id="delete_link" class="btn btn-red hide" >Ya</a>
      <a href="" id="delete_link2" class="btn btn-red hide" >Ya</a>
      <button class="btn btn-default" data-dismiss="modal">Tidak</button>
    </div>
</div>
<script type="text/javascript">
$(document).on('change', '#prov_id', function(e){
    e.preventDefault();
    var valProv = $(this).val();
    $('#kabkot_id').find('option').addClass('hide');
    $('#kabkot_id').find('option:first').removeClass('hide');
    $('#kabkot_id').find('option').filter(function () { return $(this).data('prov') == valProv; }).removeClass('hide');
    $("#kabkot_id").val($("#kabkot_id option:first").val());
    $("#kec_id").val($("#kec_id option:first").val());
    $("#kel_id").val($("#kel_id option:first").val());
    
    $.ajax({
    url: "<?php echo site_url('DataKlien/getKecamatanByProvinsi'); ?>",
    type: "POST",
    cache: false,
    data: {idprov: valProv},
    dataType:'json',
    success: function(json){
      $("#kec_id").append(json.data);
      $('#kec_id').find('option').addClass('hide');
      $('#kec_id').find('option:first').removeClass('hide');
    },
    error: function(){
      console.log('Error');
      alert('Error');
    }
    });
});

$(document).on('change', '#kabkot_id', function(e){
    e.preventDefault();
    var valKabKot = $(this).val();
    $("#kel_id").find('option').remove();
    $('#kec_id').find('option').addClass('hide');
    $('#kec_id').find('option:first').removeClass('hide');
    $('#kec_id').find('option').filter(function () { return $(this).data('kabkot') == valKabKot; }).removeClass('hide');
    $("#kec_id").val($("#kec_id option:first").val());
    $("#kel_id").val($("#kel_id option:first").val());
    
    $.ajax({
    url: "<?php echo site_url('DataKlien/getKelurahanByKabKot'); ?>",
    type: "POST",
    cache: false,
    data: {idkabkot: valKabKot},
    dataType:'json',
    success: function(json){
      $("#kel_id").append(json.data);
      $('#kel_id').find('option').addClass('hide');
      $('#kel_id').find('option:first').removeClass('hide');
    },
    error: function(){
      console.log('Error');
      alert('Error');
    }
    });
});

$(document).on('change', '#kec_id', function(e){
    e.preventDefault();
    var valKabKot = $(this).val();
    $('#kel_id').find('option').addClass('hide');
    $('#kel_id').find('option:first').removeClass('hide');
    $('#kel_id').find('option').filter(function () { return $(this).data('kec') == valKabKot; }).removeClass('hide');
    $("#kel_id").val($("#kel_id option:first").val());
});

$(document).on('change', '#jenjang', function(e){
    e.preventDefault();
    var valJenjang = $(this).val();
    $('#kelas').find('option').addClass('hide');
    $('#kelas').find('option:first').removeClass('hide');
    $('#kelas').find('option').filter(function () { return $(this).data('jenjang') == valJenjang; }).removeClass('hide');
    $("#kelas").val($("#kelas option:first").val());
});


$(document).on('click', '#saveClient', function(e){
    e.preventDefault();
    $.ajax({
    url: "<?php echo site_url('DataKlien/simpanEdit'); ?>",
    type: "POST",
    cache: false,
    data: $('#formKlien').serialize(),
    dataType:'json',
    success: function(json){
      console.log(json);
      if (json.status==1) {
        alert(json.pesan);
        window.location.replace("<?php echo site_url('DataKlien/index'); ?>");
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

$(document).on('click', '.btnHapusKlien', function(e){
  e.preventDefault();
  var idklien = $(this).data('id');
  var nmklien = '<b style="text-decoration: underline"><?php echo $klien->NAMA;?><b/>';
  $('#modal-delete').modal();
  $('#modal-body-delete').html('Yakin Akan Menghapus Klien '+nmklien+' ?');
  $('#delete_link2').addClass('hide');
  $('#delete_link').removeClass('hide');
  $('#delete_link').attr('data-id',idklien);
});

$(document).on('click', '.btnHapus', function(e){
  e.preventDefault();
  var idpaket = $(this).data('id');
  var nmpaket = '<b style="text-decoration: underline">'+$(this).closest('tr').find('.nm').html()+'<b/>';
  $('#modal-delete').modal();
  $('#modal-body-delete').html('Yakin Akan Menghapus Paket Ujian '+nmpaket+' ?');
  $('#delete_link').addClass('hide');
  $('#delete_link2').removeClass('hide');
  $('#delete_link2').attr('data-id',idpaket);
});
//delete klien
$(document).on('click', '#delete_link', function(e){
  e.preventDefault();
  var idklien = $(this).data('id');
  $.ajax({
  url: "<?php echo site_url('DataKlien/hapusDataKlien'); ?>",
  type: "POST",
  cache: false,
  data: {id:idklien},
  dataType:'json',
  success: function(json){
    console.log(json);
    if (json.status==1) {
      alert(json.pesan);
      window.location.replace("<?php echo site_url('DataKlien/index'); ?>");
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
//delete paketujian
$(document).on('click', '#delete_link2', function(e){
  e.preventDefault();
  var idpaket = $(this).data('id');
  $.ajax({
  url: "<?php echo site_url('DataKlien/hapusDataPaket'); ?>",
  type: "POST",
  cache: false,
  data: {id:idpaket},
  dataType:'json',
  success: function(json){
    console.log(json);
    if (json.status==1) {
      alert(json.pesan);
      window.location.replace("<?php echo site_url('DataKlien/detailKlien/'.$idclient); ?>");
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

$(document).on('click', '.btnLangsung', function(e){
  e.preventDefault();
  var langsung = $(this).data('langsung');
  var idpaketujian = $(this).data('id');
  var nmujian = $(this).closest('tr').find('.nm').html();
  $.ajax({
  url: "<?php echo site_url('DataKlien/reverseLangsung'); ?>",
  type: "POST",
  cache: false,
  data: {langsungNow:langsung,id:idpaketujian,nm:nmujian},
  dataType:'json',
  success: function(json){
    console.log(json);
    if (json.status==1) {
      alert(json.pesan);
      window.location.replace("<?php echo site_url('DataKlien/detailKlien/'.$idclient); ?>");
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

$(document).on('click', '#addMngMapel', function(e){
  e.preventDefault();
  var idklien = $('.btnHapusKlien').data('id');
  $.ajax({
  url: "<?php echo site_url('DataKlien/simpanTambahUjian'); ?>",
  type: "POST",
  cache: false,
  data: $('#formPketUjian').serialize()+"&user_id="+idklien,
  dataType:'json',
  success: function(json){
    if (json.status==1) {
      alert(json.pesan);
      window.location.replace("<?php echo site_url('DataKlien/detailKlien/'.$idclient); ?>");
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