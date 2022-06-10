<?php

$manmapelid = '';
foreach($detailujians as $detail){
  $manmapelid .= $detail->MM_MANAGE_MAPEL_ID.',';
}
$checkbox = explode(',', substr($manmapelid,0,-1));

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
  .warning{
    font-size: 12px;
  }
</style>
  <!-- Start Main Content -->
  <div class="main-content">
    <div class="container-fluid" >
      <div class="row-fluid">
        <div class="area-top clearfix">
          <div class="pull-left header">
            <h3 class="title"><i class="icon-edit"></i>Data Detail Ujian <?php echo $ujian->NAMA_UJIAN;?></h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Container Box-->
    <div class="container-fluid padded">
      <!-- Start Box-->
      <div class="box">

        <div class="padded" style="padding-top: 20px;padding-bottom: 20px;">
          <table border="0" width="100%">
            <tbody>
              <tr class="hide">
                <td>ID</td>
                <td>:</td>
                <td><div class="pktujian"><?php echo $ujian->PKTU_PAKETUJIAN_ID;?></div></td>
              </tr>
              <tr>
                <td>Total Kuota Akses</td>
                <td>:</td>
                <td><?php echo $ujian->TOTAL_KUOTA;?></td>
              </tr>
              <tr>
                <td>Sisa Total Kuota Akses</td>
                <td>:</td>
                <td><div class="nkuota"><?php if($ujian->SISA_KUOTA==''){echo $ujian->TOTAL_KUOTA;}else if($ujian->SISA_KUOTA>=0){ echo $ujian->SISA_KUOTA;}else{echo $ujian->TOTAL_KUOTA;}?></div></td>
              </tr>
              <tr>
                <td>Waktu Pelaksanaan</td>
                <td>:</td>
                <td><?php echo complete_tanggal_indo($ujian->TGL_PELAKSANAAN); ?></td>
              </tr>
              <tr>
                <td>Waktu Selesai</td>
                <td>:</td>
                <td><?php echo complete_tanggal_indo($ujian->TGL_SELESAI); ?></td>
              </tr>
              <tr>
                <td>Tampil Hasil Ujian</td>
                <td>:</td>
                <td><?php if($ujian->IS_LANGSUNGRESULT==1){ echo 'Ya';}else{echo 'Tidak';} ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      
        <div class="box-header">
          <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
              <a href="#list" data-toggle="tab">
              <i class="icon-align-justify"></i>Daftar Mata Pelajaran Ujian <?php echo $ujian->NAMA_UJIAN; ?>
              </a>
            </li>
            <li>
              <a href="#add" data-toggle="tab">
              <i class="icon-plus"></i>Tambah Mata Pelajaran Ujian
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
                <th><div>Kelas</div></th>
                <th><div>Mata Pelajaran</div></th>
                <th><div>Waktu Ujian</div></th>
                <th><div>Kuota Akses</div></th>
                <th><div>Bobot Soal</div></th>
                <th><div>Jenis Soal</div></th>
                <th><div>Aksi</div></th>
              </tr>
            </thead>
            <tbody>
            <?php
            		$program ='';
                    foreach($detailujians as $detailujian){
                    	if ($detailujian->NAMA_PROGRAM) {
                    		$program = '('.$detailujian->NAMA_PROGRAM.')';
                    	}
            ?>
                        <tr>
                        	<td data-managemapel="<?php echo $detailujian->MM_MANAGE_MAPEL_ID; ?>"><?php echo $detailujian->NAMA_JENJANG.' : '.$detailujian->KELAS.' '.$program; ?></td>
                        	<td><?php echo $detailujian->NAMA_MAPEL; ?></td>
                        	<td class="center"><?php echo complete_tanggal_indo($detailujian->TGL_MULAI_UJIAN).'<br/>('.$detailujian->DURASI_UJIAN_MENIT.' Menit)'; ?></td>
                        	<td class="center"><?php echo $detailujian->NAKSES_PERGROUP; ?></td>
                          <td><?php echo 'MUDAH : '.$detailujian->NSOAL_MUDAH.'<br/>SEDANG : '.$detailujian->NSOAL_SEDANG.'<br/>SULIT : '.$detailujian->NSOAL_SULIT; ?></td>
                          <td class="center"><a href="#" data-id="<?php echo $detailujian->ID_DETAIL_PAKETUJIAN; ?>" class="btn <?php echo (strtolower($detailujian->DEFAULT_OR_CUSTOM) == '1' ? 'btn-blue' : 'btn-default'); ?> btn-small default"><i class="icon-list-ul"></i> Default</a><?php echo (strtolower($detailujian->DEFAULT_OR_CUSTOM) == '1' ? ' <i class="icon-check"></i>' : ''); ?><br/><b>OR</b><br/>
                          <a href="#" data-id="<?php echo $detailujian->ID_DETAIL_PAKETUJIAN; ?>" class="btn <?php echo (strtolower($detailujian->DEFAULT_OR_CUSTOM) == '0' ? 'btn-blue' : 'btn-default'); ?> btn-small custom"><i class="icon-list-ul"></i> Custom</a><?php echo (strtolower($detailujian->DEFAULT_OR_CUSTOM) == '0' ? ' <i class="icon-check"></i>' : ''); ?>
                          </td>
                        	<td class="center">
                          <?php echo ($detailujian->DEFAULT_OR_CUSTOM=='0' ? '<a href="#" class="btn btn-blue btn-small inputpertanyaan" data-key="'.$detailujian->token.'"><i class="icon-list-ul"></i> Input Pertanyaan</a><br/><br/>' : ''); ?>
                          <?php echo ($detailujian->DEFAULT_OR_CUSTOM==NULL ? '' : '<a href="'.base_url().'Question/viewPaketSoalUjian/'.$detailujian->ID_DETAIL_PAKETUJIAN.'/'.($detailujian->DEFAULT_OR_CUSTOM=="0" ? "custom" : "default").'" class="btn btn-blue btn-small"><i class="icon-list-ul"></i> Lihat Pertanyaan</a><br/><br/>'); ?>
                          <a href="#" data-id="<?php echo $detailujian->ID_DETAIL_PAKETUJIAN; ?>" <?php echo (($detailujian->DEFAULT_OR_CUSTOM)==NULL ? 'class="btn btn-default btn-small" disabled' : 'class="btn btn-green btn-small"'); ?>><i class="icon-list-ul"></i> Aktifkan</a>

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
                            echo '<div class="idmapel" data-mapel="'.$mapel->MP_MAPEL_ID.'">'.$mapel->NAMA_MAPEL.'</div>';
                          }
                        }
                      ?>
                    </td>
                    <?php
                      if(in_array($manmapel->MM_MANAGE_MAPEL_ID, $checkbox)){
                        $c = 'checked';
                        $nc = '1';
                      }else{
                        $c = '';
                        $nc = '0';
                      }
                    ?>
                    <td class="center"><input type="checkbox" name="addMapeltoUjian" id="addMapeltoUjian" class="addMapeltoUjian" data-check="<?php echo $nc;?>" data-id="<?php echo $manmapel->MM_MANAGE_MAPEL_ID;?>" value="ya" <?php echo $c;?> ></td>
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
      </div>
      <!-- End Box-->
    </div>
    <!-- End Container Box-->
  </div>
  <!-- End Main Content -->
</div>
<!-- End Div Main Body -->

<!-- Start Modal Detail -->
<div id="detail-modal-form" class="modal fade" style="z-index: -1;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <div id="modal-tablesLabel_question" style="color:#fff; font-size:16px;">Detail</div>
  </div>
  <div class="modal-body" id="modal-body-detail" >
    <div id="frame" style="padding: 10px;">
    <form id="formManageMapel" name="formManageMapel" class="form-horizontal validatable" >
      <input type="hidden" name="idpktujian" id="idpktujian"/>
      <input type="hidden" name="idmanagemapel" id="idmanagemapel"/>
      <div class="padded">
        <div class="control-group">
          <label class="control-label">Bab</label>
          <div class="controls">
            <select name="bab_id[]" id="bab_id" class="bab_id chzn-select" multiple>
              <option >Pilih Bab</option>
              <?php foreach ($babs as $bab) { echo '<option class="hide" value="'.$bab->BB_BAB_ID.'" data-mapel="'.$bab->MP_MAPEL_ID.'">'.$bab->NAMA_BAB.'</option>'; } ?>
            </select>
          </div>
        </div>
      </div>
      <!-- <div class="padded" style="display:none;" >
        <div class="control-group">
          <label class="control-label">Jumlah Soal</label>
          <div class="controls">
            <input type="text" class="validate[required,custom[integer]]" name="nsoalsulit" id="nsoalsulit" placeholder="Jumlah Soal Sulit" /><i class="warning" style="">*sulit</i><br>
            <input type="text" class="validate[required,custom[integer]]" name="nsoalsedang" id="nsoalsedang" placeholder="Jumlah Soal Sedang" /><i class="warning" style="">*sedang</i><br>
            <input type="text" class="validate[required,custom[integer]]" name="nsoalmudah" id="nsoalmudah" placeholder="Jumlah Soal Mudah" /><i class="warning" style="">*mudah</i>
          </div>
        </div>
      </div> -->
      <div class="padded">
        <div class="control-group">
          <label class="control-label">Durasi Ujian (Menit)</label>
          <div class="controls">
            <input type="text" class="validate[required,custom[integer]]" name="durasiujian" id="durasiujian"/>
          </div>
        </div>
      </div>
      <div class="padded">
        <div class="control-group">
          <label class="control-label">Tanggal Ujian Mata Pelajaran</label>
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
          <label class="control-label">Kuota Peserta Mata Pelajaran</label>
          <div class="controls">
            <input type="text" class="validate[required,custom[integer]]" name="kuota" id="kuota"/>
          </div>
        </div>
      </div>
      <div class="padded">
        <div class="control-group">
          <label class="control-label">Syarat & Ketentuan</label>
          <div class="controls">
            <div class="box closable-chat-box">
              <div class="box-content">
                <div class="chat-message-box">
                  <textarea name="terms_condition" id="terms_condition" rows="5" placeholder="Terms & Condition"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
  <div class="modal-footer">
    <a id="detail_link" class="btn btn-red detail_link" >Simpan</a>
    <button class="btn btn-default" data-dismiss="modal">Batal</button>
  </div>
</div>
<!-- End Modal Detail -->



<!-- Start Modal Detail -->
<div id="jumlahsoal-modal-form" class="modal fade" style="z-index: -1;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <div id="modal-tablesLabel_question" style="color:#fff; font-size:16px;">Jumlah Soal</div>
  </div>
  <div class="modal-body" id="modal-body-detail" >
    <div id="frame" style="padding: 10px;">
    <form id="formJumlahSoal" name="formJumlahSoal" class="form-horizontal validatable" >
      <div class="padded">
        <div class="control-group">
          <label class="control-label">Pilihan Jumlah Soal</label>
          <div class="controls">
            <input type="text" name="nmc_d" id="nmc_d" readonly />
            <input type="text" style="display: none;" name="valuec_d" id="valuec_d" readonly />
            <input type="hidden" name="iddetailpaket" id="iddetailpaket" />
          </div>
        </div>
      </div>
      <div class="padded">
        <div class="control-group">
          <label class="control-label">Jumlah Soal</label>
          <div class="controls">
            <input type="text" class="validate[required,custom[integer]]" name="nsoalsulit" id="nsoalsulit" placeholder="Jumlah Soal Sulit" /><i class="warning" style="">*sulit</i><br>
            <input type="text" class="validate[required,custom[integer]]" name="nsoalsedang" id="nsoalsedang" placeholder="Jumlah Soal Sedang" /><i class="warning" style="">*sedang</i><br>
            <input type="text" class="validate[required,custom[integer]]" name="nsoalmudah" id="nsoalmudah" placeholder="Jumlah Soal Mudah" /><i class="warning" style="">*mudah</i>
          </div>
        </div>
      </div>
      <div class="padded fordefault">
        <div class="control-group">
          <label class="control-label">Bobot Soal</label>
          <div class="controls">
            <input type="radio" class="validate[required]" name="bobotsoal" value="0" /><i class="warning">*Custom</i>
            <input type="radio" class="validate[required]" name="bobotsoal" value="1" /><i class="warning">*Default</i>
          </div>
        </div>
      </div>
      <div class="padded fordefaultbobot">
        <div class="control-group">
          <label class="control-label">Bobot</label>
          <div class="controls">
            <input type="text" class="validate[required,custom[integer]]" placeholder="Bobot Benar" id="bobotbenar" name="bobotbenar" /><i class="warning" style="">*Jawaban Benar</i><br>
            <input type="text" class="validate[required,custom[integer]]" placeholder="Bobot Salah" id="bobotsalah" name="bobotsalah" /><i class="warning" style="">*Jawaban Salah</i><br>
            <input type="text" class="validate[required,custom[integer]]" placeholder="Bobot Tidak Jawab" id="bobotvaluenull" name="bobotvaluenull" /><i class="warning" style="">*Tidak Menjawab</i>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
  <div class="modal-footer">
    <a id="jumlahsoal_link" class="btn btn-red jumlahsoal_link" >Simpan</a>
    <button class="btn btn-default" data-dismiss="modal">Batal</button>
  </div>
</div>
<!-- End Modal Detail -->

<!-- Start Modal Batal -->
<div id="modal-delete" class="modal fade" style="height:140px;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h6 id="modal-tablesLabel"> <i class="icon-info-sign"></i>&nbsp; Konfirmasi Batal</h6>
  </div>
    <div class="modal-delete-body" id="modal-body-delete"></div>
    <div class="modal-footer">
      <a href="#" id="delete" class="btn btn-red" >Ya</a>
      <button class="btn btn-default" data-dismiss="modal">Tidak</button>
    </div>
</div>
<!-- End Modal Batal -->

<script type="text/javascript">
function dateAdd(date, interval, units) {
  var ret = new Date(date); //don't change original date
  var checkRollover = function() { if(ret.getDate() != date.getDate()) ret.setDate(0);};
  switch(interval.toLowerCase()) {
    case 'year'   :  ret.setFullYear(ret.getFullYear() + units); checkRollover();  break;
    case 'quarter':  ret.setMonth(ret.getMonth() + 3*units); checkRollover();  break;
    case 'month'  :  ret.setMonth(ret.getMonth() + units); checkRollover();  break;
    case 'week'   :  ret.setDate(ret.getDate() + 7*units);  break;
    case 'day'    :  ret.setDate(ret.getDate() + units);  break;
    case 'hour'   :  ret.setTime(ret.getTime() + units*3600000);  break;
    case 'minute' :  ret.setTime(ret.getTime() + units*60000);  break;
    case 'second' :  ret.setTime(ret.getTime() + units*1000);  break;
    default       :  ret = undefined;  break;
  }
  return ret;
}

$(document).on('keyup', '#start_date', function(e){
  var thisis=$(this);
  var awalujian = new Date('<?php echo $ujian->TGL_PELAKSANAAN; ?>');
  var akhirujian = new Date('<?php echo $ujian->TGL_SELESAI; ?>');
  var tglmulaiujian = new Date($('#start_date').val()+' '+$('#jammulai').val());
  var now = new Date();
  
  var durasi = $('#durasiujian').val();
  if (!durasi){
    durasi = 0;
  }

  var result_closeujian = dateAdd(tglmulaiujian, 'minute', durasi);
  if(tglmulaiujian>=awalujian && result_closeujian<=akhirujian && tglmulaiujian>=now)
  {
    $('.start_dateformError').hide();
    $('.jammulaiformError').hide();
    $('.formError').remove();
  }else{
    setTimeout(function(){
      if(thisis.closest('.controls').find('.formErrorContent').html()=='* Silahkan Masukkan Bilangan<br>'){
        $('.jammulaiformError').trigger('click');
        $('.start_dateformError').trigger('click');
        $('.formError').remove();
        $('.start_dateformError').show();
        $('.jammulaiformError').show();
      }else{
        thisis.closest('.controls').append('<div class="start_dateformError parentFormformManageMapel formError" style="opacity: 0.87; position: absolute; top: 122px; left: 205px; margin-top: -23px;"><div class="formErrorContent">* Silahkan Masukkan Waktu Yang Benar<br></div></div>');
        $('#jammulai').closest('.controls').append('<div class="jammulaiformError parentFormformManageMapel formError" style="opacity: 0.87; position: absolute; top: 122px; left: 421.109px; margin-top: -23px;"><div class="formErrorContent">* Silahkan Masukkan Waktu Yang Benar<br></div></div>');
      }
    }, 250);
  }
});

$(document).on('change', '#jammulai', function(e){
  var thisis=$(this);
  var awalujian = new Date('<?php echo $ujian->TGL_PELAKSANAAN; ?>');
  var akhirujian = new Date('<?php echo $ujian->TGL_SELESAI; ?>');
  var tglmulaiujian = new Date($('#start_date').val()+' '+$('#jammulai').val());
  var now = new Date();
  
  var durasi = $('#durasiujian').val();
  if (!durasi){
    durasi = 0;
  }

  var result_closeujian = dateAdd(tglmulaiujian, 'minute', durasi);
  if(tglmulaiujian>=awalujian && result_closeujian<=akhirujian && tglmulaiujian>=now)
  {
    $('.start_dateformError').hide();
    $('.jammulaiformError').hide();
    $('.formError').remove();
  }else{
    setTimeout(function(){
      if(thisis.closest('.controls').find('.formErrorContent').html()=='* Silahkan Masukkan Bilangan<br>'){
        $('.jammulaiformError').trigger('click');
        $('.start_dateformError').trigger('click');
        $('.formError').remove();
        $('.start_dateformError').show();
        $('.jammulaiformError').show();
      }else{
        thisis.closest('.controls').append('<div class="jammulaiformError parentFormformManageMapel formError" style="opacity: 0.87; position: absolute; top: 122px; left: 421.109px; margin-top: -23px;"><div class="formErrorContent">* Silahkan Masukkan Waktu Yang Benar<br></div></div>');
        $('#start_date').closest('.controls').append('<div class="start_dateformError parentFormformManageMapel formError" style="opacity: 0.87; position: absolute; top: 122px; left: 205px; margin-top: -23px;"><div class="formErrorContent">* Silahkan Masukkan Waktu Yang Benar<br></div></div>');
      }
    }, 250);
  }
});

$(document).on('change', 'input[name=bobotsoal]', function(e){
  var dorc = $('#valuec_d').val();
  var bobotdorc = $(this).val();
  //alert('masuk'+$('#valuec_d').val());
  //alert($(this).val());
  if(dorc === '1' && bobotdorc === '0'){
    $('.fordefaultbobot').show();
  }else{
    $('.fordefaultbobot').hide();
  }

});

$(document).on('change', '.addMapeltoUjian', function(e){
    e.preventDefault();
    var thisis = $(this);
    var thiscolumn = thisis.closest('tr');
    var jenjang = thiscolumn.find('td:nth-child(1)').html();
    var kelas = thiscolumn.find('td:nth-child(2)').html();
    var program = thiscolumn.find('td:nth-child(3)').html();
    var matapelajaran = thiscolumn.find('td:nth-child(4)').html();
    var id = $(this).data('id');
    var idpaket = $('.pktujian').html();
    var cek = $(this).data('check');

    // var check = this.checked;
    // if(check) {
    //   $('#DataTables_Table_0').dataTable().fnAddData( [ kelas+' '+jenjang, matapelajaran, 'tdTambah3', 'tdTambah4', 'tdTambah5', 'tdTambah6', 'tdTambah7', 'tdTambah8' ] );
    //   alert('masuk');
    // }else{
    //   alert('ubah '+check);
    // }
    if(thisis.is(':checked') && cek=='0'){
      var kuotanow = $('.nkuota').html();
      //alert(kuotanow);
      if (kuotanow>0) {
        var mapel = thisis.closest('tr').find('.idmapel').data('mapel');
        $('#bab_id').find('option').addClass('hide');
        $('#bab_id').find('option:first').removeClass('hide');
        $('#bab_id').find('option').filter(function () { return $(this).data('mapel') == mapel; }).removeClass('hide');
        $("#bab_id").val($("#bab_id option:first").val());
        $('#detail-modal-form').removeAttr('style');
        $('#bab_id').val('');
        $('#durasiujian').val('');
        $('#kuota').val('');
        $('#nsoalsulit').val('');
        $('#nsoalsedang').val('');
        $('#nsoalmudah').val('');
        $('#idpktujian').val(idpaket);
        $('#jammulai').val('');
        $('#start_date').val('');

        $('.select2-search-choice-close').trigger('click');
        $('.parentFormformManageMapel').trigger('click');
        $('#idmanagemapel').val(id);
        $('#detail-modal-form').modal();
      }else{
        alert('Kouta Tidak Tersedia');
        console.log('Kouta Tidak Tersedia');
      }
      setTimeout(function(){
        thisis.trigger('click');
      }, 100);
    }else if(thisis.is(':checked')==false && cek=='1'){
      $('#modal-delete').modal();
      $('#modal-body-delete').html('Yakin Akan Membatalkan Ujian '+matapelajaran+' Kelas '+kelas+' '+jenjang+'?');
      $('#delete').attr('data-manmapel',id).attr('data-paket',idpaket);
      setTimeout(function(){
        thisis.trigger('click');
      }, 100);
    }
    //var index_delete = $('#datatable-responsive tbody tr:eq('+index+') td:nth-child(1)').find('#btnHapus').closest("tr").get(0);
    //$('#datatable-responsive').dataTable().fnDeleteRow($('#datatable-responsive').dataTable().fnGetPosition(index_delete));
});
$(document).on('change', '#kuota', function(e){
  var thisis=$(this);
  var kuotanow = $('.nkuota').html();
  //console.log(kuotanow);
  setTimeout(function(){
    if($('.formErrorContent').html()=='* Silahkan Masukkan Bilangan<br>'){
      console.log('masuk');
    }else{
      var val = parseInt(thisis.val(), 10);
      if (val > parseInt(kuotanow, 10) || val <= parseInt('0', 10)) {
        thisis.closest('.controls').append('<div class="kuotaformError parentFormformManageMapel formError" style="opacity: 0.87; position: absolute; top: 193px; left: 205px; margin-top: -23px;"><div class="formErrorContent">* Diantara 0 hingga '+kuotanow+'<br></div></div>');
      }
    }
  }, 250);
});

// $(document).on('change', '#durasiujian', function(e){
//   var d = new Date();
//   var month = d.getMonth()+1;
//   var day = d.getDate();
//   var output = d.getFullYear() + '-' +
//               (month<10 ? '0' : '') + month + '-' +
//               (day<10 ? '0' : '') + day;

//   var hour = d.getHours();
//   var minute = d.getMinutes();
//   var second = d.getSeconds();
//   var time = (hour<10 ? '0' : '') + hour+ ':' +
//               (minute<10 ? '0' : '') + minute+ ':' +
//               (second<10 ? '0' : '') + second;
//   console.log(output+' '+time);
// });

$(document).on('click', '.detail_link', function(e){
  setTimeout(function(){
    var nerror = $('#formManageMapel').find('.formError').length;
    if (nerror == parseInt('0', 10)){
      $.ajax({
        url: "<?php echo site_url('DetailPaketUjian/simpanTambah'); ?>",
        type: "POST",
        cache: false,
        data: $('#formManageMapel').serialize(),
        dataType:'json',
        success: function(json){
          //console.log(json);
          if (json.status==1) {
            alert(json.pesan);
            setTimeout(function(){
                location.reload();
            }, 500);
          }else{
            alert(json.pesan);
          }
        },
        error: function(json){
          console.log(json);
          alert('Error');
        }
      });
    }else{
      console.log('error');
      alert('error');
    }
  }, 500);
});

$(document).on('click', '#delete', function(e){
  var idmanmapel = $(this).data('manmapel');
  var idpaket = $(this).data('paket');
  $.ajax({
    url: "<?php echo site_url('DetailPaketUjian/hapusData'); ?>",
    type: "POST",
    cache: false,
    data: {manmapel:idmanmapel,paket:idpaket},
    dataType:'json',
    success: function(json){
      if (json.status==1) {
        alert(json.pesan);
        setTimeout(function(){
            location.reload();
        }, 500);
      }else{
        alert(json.pesan);
      }
    },
    error: function(json){
      console.log('error');
      alert('Error');
    }
  });
});

$(document).on('click', '.default,.custom', function(e){
  var id = $(this).data('id');

  $('input[name=bobotsoal]').attr('checked',false);
  $('.fordefaultbobot').hide();
  $('#jumlahsoal-modal-form').removeAttr('style');
  $('#jumlahsoal-modal-form').modal();
  $('.formError').trigger('click');
  $('#iddetailpaket').val(id);

  $('#nsoalsulit').val('');
  $('#nsoalsedang').val('');
  $('#nsoalmudah').val('');
  $('#bobotbenar').val('');
  $('#bobotsalah').val('');
  $('#bobotvaluenull').val('');

  if($(this).hasClass('default')){
    $('#valuec_d').val('1');
    $('#nmc_d').val('Default');
    $('.fordefault').show();
  }else{
    $('#valuec_d').val('0');
    $('#nmc_d').val('Custom');
    $('.fordefault').hide();
  }
});

$(document).on('click', '#jumlahsoal_link', function(e){
  setTimeout(function(){
    var nerror = $('#formJumlahSoal').find('.formError').length;
    if (nerror == parseInt('0', 10)){
      $.ajax({
        url: "<?php echo site_url('DetailPaketUjian/setJumlahSoal'); ?>",
        type: "POST",
        cache: false,
        data: $('#formJumlahSoal').serialize(),
        dataType:'json',
        success: function(json){
          if (json.status==1) {
            alert(json.pesan);
            setTimeout(function(){
                location.reload();
            }, 500);
          }else{
            alert(json.pesan);
          }
        },
        error: function(json){
          console.log(json);
          alert('Error');
        }
      });
    }else{
      console.log('error');
      alert('error');
    }
  }, 500);
});

$(document).on('click', '.inputpertanyaan', function(e){
  e.preventDefault();
  var keymapel = $(this).data('key');
  window.location.replace("<?php echo site_url('DetailPaketUjian/pertanyaan'); ?>/"+'<?php echo $this->uri->segment(3); ?>/'+keymapel);
});
</script>