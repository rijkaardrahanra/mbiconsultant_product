<?php
//print_r($kliens);die();
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
            <h3 class="title"><i class="icon-edit"></i>Data Klien </h3>
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
              <i class="icon-align-justify"></i>Daftar Klien
              </a>
            </li>
            <li>
              <a href="#add" data-toggle="tab">
              <i class="icon-plus"></i>Tambah Klien
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
                      <th><div>Nama Klien</div></th>
                      <th><div>Telepon / HP</div></th>
                      <th><div>Email</div></th>
                      <!-- <th><div>Klien</div></th> -->
                      <th><div>Kerja Sama</div></th>
                    

                      <!-- <th><div>Pengguna</div></th> -->
                      <th><div>Aksi</div></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                          foreach($kliens as $klien){
                  ?>
                              <tr>
                                <td><a href="#" class="btnEdit" data-id="<?php echo $klien->IDUNIK;?>" style="color: blue;text-decoration: underline"><b><div class="nm"><?php echo $klien->NAMA; ?></div></b></a>
                                <div><i style="font-size: 11px;">Alamat:<br/><?php echo $klien->ADDRESS.',<br/> '.CapitalizeEachWord($klien->LURAH).', '.CapitalizeEachWord($klien->CAMAT).', '.CapitalizeEachWord($klien->KABKOT).', '.CapitalizeEachWord($klien->PROV); ?></i>
                                </div></td>
                                <td class="center"><?php echo $klien->PHONE; ?></td>
                                <td class="center"><?php echo $klien->EMAIL; ?></td>
                                <!-- <td><?php echo $klien->NAMA_GROUP; ?></td> -->
                                <td class="center"><?php echo tanggal_indo2_fromdatetime($klien->TGL_KERJASAMA); ?></td>
                               
                                <!-- <td><?php echo $klien->USERNAME; ?></td> -->
                                <td class="center"><?php if($klien->IS_ACTIVATED==0){echo '<i style="color:red;" class="icon-remove"></i>';}else{echo '<i style="color:green;" class="icon-check"></i>';} ?><br/><br/>
                                  <?php if($klien->IS_ACTIVATED==0){echo '<a href="#" class="btn btn-green btn-small btnStatus" data-id="'.$klien->USR_USER_ID.'" data-aktif="'.$klien->IS_ACTIVATED.'"><i class="icon-refresh"></i> Aktifkan</a><br>';}else{echo '<a href="#" class="btn btn-red btn-small btnStatus" data-id="'.$klien->USR_USER_ID.'"  data-aktif="'.$klien->IS_ACTIVATED.'"><i class="icon-refresh"></i> Nonaktifkan</a><br>';} ?>
                                  <!-- <a href="#" class="btn btn-gray btn-small btnEdit" data-id="<?php //echo $klien->IDUNIK;?>"><i class="icon-list-ul"></i> Detail</a> -->
                                 
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
                  <form id="formKlien" name="formKlien" class="form-horizontal validatable" >
                    <div class="padded">
                      <div class="control-group">
                        <label class="control-label">Tipe Klien</label>
                        <div class="controls">
                          <select name="clienttype_id" id="clienttype_id" class="chzn-select">
                            <option >Pilih Tipe Klien</option>
                            <?php foreach($tipekliens as $tipeklien){ echo '<option value="'.$tipeklien->GRP_GROUP_ID.'">'.$tipeklien->NAMA_GROUP.'</option>'; } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="padded">
                      <div class="control-group">
                        <label class="control-label">Nama Klien</label>
                        <div class="controls">
                          <input type="text" class="validate[required]" name="nmklien" id="nmklien"/>
                        </div>
                      </div>
                    </div>

                    <div class="padded">
                      <div class="control-group">
                        <label class="control-label">Alamat Lengkap</label>
                        <div class="controls">
                          <select name="prov_id" id="prov_id" class="chzn-select">
                            <option>Pilih Provinsi</option>
                            <?php foreach ($provs as $prov) { echo '<option value="'.$prov->ID_PROVINSI.'">'.CapitalizeEachWord($prov->NAMA_LOKASI).'</option>'; } ?>
                          </select>
                        </div>
                        <div class="controls">
                          <select name="kabkot_id" id="kabkot_id" class="chzn-select">
                            <option>Pilih Kabupaten/Kota</option>
                            <?php foreach ($kabkots as $kabkot) { echo '<option class="hide" value="'.$kabkot->ID_KABUPATENKOTA.'" data-prov="'.$kabkot->ID_PROVINSI.'">'.CapitalizeEachWord($kabkot->NAMA_LOKASI).'</option>'; } ?>
                          </select>
                        </div>
                        <div class="controls">
                          <select name="kec_id" id="kec_id" class="chzn-select">
                            <option>Pilih Kecamatan</option>
                          </select>
                        </div>
                        <div class="controls">
                          <select name="kel_id" id="kel_id" class="chzn-select">
                            <option>Pilih Kelurahan</option>
                          </select>
                        </div>
                        <div class="controls">
                          <input type="text" class="validate[required]" name="almt" id="almt"/>
                        </div>
                      </div>
                    </div>

                    <div class="padded">
                      <div class="control-group">
                        <label class="control-label">Telepon / Handphone</label>
                        <div class="controls">
                          <input type="text" class="validate[required]" name="phone" id="phone"/>
                        </div>
                      </div>
                    </div>

                    <div class="padded">
                      <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                          <input type="email" class="validate[required]" name="email" id="email"/>
                        </div>
                      </div>
                    </div>

                    <div class="padded">
                      <div class="control-group">
                        <label class="control-label">Tanggal Kerja Sama</label>
                        <div class="controls">
                          <input type="date" name="start_date" id="start_date"  class="validate[required]"/>
                        </div>
                      </div>
                    </div>

                    <div class="padded">
                      <div class="control-group">
                        <label class="control-label">Nama Pengguna</label>
                        <div class="controls">
                          <input type="text" class="validate[required]" name="user" id="user"/>
                        </div>
                      </div>
                    </div>

                    <div class="padded">
                      <div class="control-group">
                        <label class="control-label">Kata Sandi</label>
                        <div class="controls">
                          <input type="password" class="validate[required]" value="77777777" name="pass" id="pass" readonly /> <i style="font-size: 12px">* konfigurasi standart</i>
                        </div>
                      </div>
                    </div>

                    <div class="form-actions">
                      <button id="addClient" class="btn btn-gray">Tambah Klien</button>
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



$(document).on('click', '#addClient', function(e){
    e.preventDefault();
    $.ajax({
    url: "<?php echo site_url('DataKlien/simpanTambah'); ?>",
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

$(document).on('click', '.btnStatus', function(e){
  e.preventDefault();
  var stat = $(this).data('aktif');
  var idklien = $(this).data('id');
  var nmklien = $(this).closest('tr').find('.nm').html();
  $.ajax({
  url: "<?php echo site_url('DataKlien/reverseStatus'); ?>",
  type: "POST",
  cache: false,
  data: {statNow:stat,id:idklien,nm:nmklien},
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



$(document).on('click', '.btnEdit', function(e){
  e.preventDefault();
  var idklien = $(this).data('id');
  window.location.replace("<?php echo site_url('DataKlien/detailKlien/'); ?>"+idklien);
});



</script>