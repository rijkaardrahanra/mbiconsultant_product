<?php

$manmapelid = '';
foreach($detailujians as $detail){
  $manmapelid .= $detail->MM_MANAGE_MAPEL_ID.',';
}
$checkbox = explode(',', substr($manmapelid,0,-1));

?>
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
                        <h3 class="title">
                        <i class="icon-edit"></i>
                       <?php echo constant('TI_MANAGE_QUESTION');?>
            </h3>
                    </div>

                </div>
            </div>
        </div>
        
     
        
    <div class="container-fluid padded">
      <div class="box">
      <?php include("message.php");?>
        <div class="box-header">    
          <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
              <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
                <?php echo constant('TI_QUESTION_LIST');?>                  </a></li>
            
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">
            <div class="tab-pane box active" id="list">
              <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                  <thead>
                    <tr>
                        <th><div><?php echo constant('TI_TABLE_HASH');?></div></th>
              <th><div><?php echo constant('TI_TABLE_QUESTION_NAME');?></div></th>  
              <th><div><?php echo constant('TI_TABLE_STATUS');?></div></th> 
                        <th><div><?php echo constant('TI_TABLE_OPTIONS');?></div></th>
            </tr>
          </thead>
                    <tbody>
              <?php               
                $query=mysqli_query($con,"SELECT * FROM question where status_aktif='1' and s_id='".$_GET['s_id']."' order by q_id DESC");
                $i=0;
                while($row=mysqli_fetch_array($query))
                { 
                  
                  $i++;
                    
              ?>
                <tr>
                <td><?php echo $i;?></td>
                <td>
                <table border="0">
                  <tr>
                    <td><?php echo constant('TI_TABLE_QUESTION_QUESTION');?></td>
                    <td><?php echo nl2br($row['question']);?></td>
                  </tr>
                  <tr>
                    <td><?php echo constant('TI_TABLE_QUESTION_OPTION');?></td>
                    <td>  
                      <div class="Table">                 
                        <div class="Heading">
                          <div class="Cell">
                            <p> <?php echo constant('TI_TABLE_QUESTION_CHOICES_NO');?>  </p>
                          </div>
                          <div class="Cell">
                            <p> <?php echo constant('TI_TABLE_QUESTION_CHOICES_CORRECT');?> </p>
                          </div>
                          <div class="Cell">
                            <p> <?php echo constant('TI_TABLE_QUESTION_CHOICES_CHOICES');?></p>
                          </div>                    
                        </div>
                        <?php if($row['typeofquestion']=="Single"){

                        if($row['option_a']!='' || $row['option_a']!=NULL){
                          ?>
                        <div class="Row">
                          <div class="Cell">
                            <?php echo constant('TI_LABEL_QUESTION_CHOICES_A');?>
                          </div>
                          <div class="Cell">
                            <input type="radio" name="correct_ans_<?php echo $row['q_id'];?>" value="A" <?php if($row['correct_ans']=='A'){echo 'checked="checked"';}?>>
                          </div>
                          <div class="Cell">
                            <p><?php echo $row['option_a'];?></p>
                          </div>                    
                        </div>
                        <?php
                        }
                        if($row['option_b']!='' || $row['option_b']!=NULL){ ?>
                        <div class="Row">
                          <div class="Cell">
                            <?php echo constant('TI_LABEL_QUESTION_CHOICES_B');?>
                          </div>
                          <div class="Cell">
                            <input type="radio" name="correct_ans_<?php echo $row['q_id'];?>" value="B" <?php if($row['correct_ans']=='B'){echo 'checked="checked"';}?>>
                          </div>
                          <div class="Cell">
                            <p><?php echo $row['option_b'];?></p>
                          </div>                          
                        </div>
                        <?php
                        }
                        if($row['option_c']!='' || $row['option_c']!=NULL){ ?>
                        <div class="Row">
                          <div class="Cell">
                            <?php echo constant('TI_LABEL_QUESTION_CHOICES_C');?>
                          </div>
                          <div class="Cell">
                            <input type="radio" name="correct_ans_<?php echo $row['q_id'];?>" value="C" <?php if($row['correct_ans']=='C'){echo 'checked="checked"';}?>>
                          </div>
                          <div class="Cell">
                            <p><?php echo $row['option_c'];?></p>
                          </div>                    
                        </div>
                        <?php
                        }
                        if($row['option_d']!='' || $row['option_d']!=NULL){ ?>
                        <div class="Row">
                          <div class="Cell">
                            <?php echo constant('TI_LABEL_QUESTION_CHOICES_D');?>
                          </div>
                          <div class="Cell">
                            <input type="radio" name="correct_ans_<?php echo $row['q_id'];?>" value="D" <?php if($row['correct_ans']=='D'){echo 'checked="checked"';}?>>
                          </div>
                          <div class="Cell">
                            <p><?php echo $row['option_d'];?></p>
                          </div>
                        </div>
                        <?php
                        }
                        if($row['option_e']!='' || $row['option_e']!=NULL){ ?>
                        <div class="Row">
                          <div class="Cell">
                            <?php echo constant('TI_LABEL_QUESTION_CHOICES_E');?>
                          </div>
                          <div class="Cell">
                            <input type="radio" name="correct_ans_<?php echo $row['q_id'];?>" value="E" <?php if($row['correct_ans']=='E'){echo 'checked="checked"';}?>>
                          </div>
                          <div class="Cell">
                            <p><?php echo $row['option_e'];?></p>
                          </div>
                        </div>
                        <?php } ?>



                  <?php } if($row['typeofquestion']=="Multiple"){     
                  

                    if($row['correct_ans']!="")
                    {
                      $explode_correct_ans=explode("-",$row['correct_ans']);
                    }
                    
                    if($row['option_a']!='' || $row['option_a']!=NULL){
                    ?>
                    <div class="Row">
                    <div class="Cell">
                      <?php echo constant('TI_LABEL_QUESTION_CHOICES_A');?>
                    </div>
                    <div class="Cell">
                    <input type="checkbox" name="correct_ans_A" value="A" <?php if($explode_correct_ans[0]=='A'){echo 'checked="checked"';}?>>
                    </div>
                    <div class="Cell">
                      <p><?php echo $row['option_a'];?></p>
                    </div>
                    <?php
                    }
                    if($row['option_b']!='' || $row['option_b']!=NULL){ ?>
                    </div>
                    <div class="Row">
                      <div class="Cell">
                        <?php echo constant('TI_LABEL_QUESTION_CHOICES_B');?>
                      </div>
                      <div class="Cell">
                      
                      <input type="checkbox" name="correct_ans_B" value="B" <?php if($explode_correct_ans[1]=='B'){echo 'checked="checked"';}?>>
                      </div>
                      <div class="Cell">
                        <p><?php echo $row['option_b'];?></p>
                      </div>
                    </div>
                    <?php
                    }
                    if($row['option_c']!='' || $row['option_c']!=NULL){ ?>
                    <div class="Row">
                      <div class="Cell">
                        <?php echo constant('TI_LABEL_QUESTION_CHOICES_C');?>
                      </div>
                      <div class="Cell">                      
                        <input type="checkbox" name="correct_ans_C" value="C" <?php if($explode_correct_ans[2]=='C'){echo 'checked="checked"';}?>>
                      </div>
                      <div class="Cell">
                        <p><?php echo $row['option_c'];?></p>
                      </div>
                    </div>
                    <?php
                    }
                    if($row['option_d']!='' || $row['option_d']!=NULL){ ?>
                    <div class="Row">
                      <div class="Cell">
                        <?php echo constant('TI_LABEL_QUESTION_CHOICES_D');?>
                      </div>
                      <div class="Cell">
                        <input type="checkbox" name="correct_ans_D" value="D" <?php if($explode_correct_ans[3]=='D'){echo 'checked="checked"';}?>>
                      </div>
                      <div class="Cell">
                        <p><?php echo $row['option_d'];?></p>
                      </div>
                    </div>
                    <?php
                    }
                    if($row['option_e']!='' || $row['option_e']!=NULL){ ?>
                    <div class="Row">
                      <div class="Cell">
                        <?php echo constant('TI_LABEL_QUESTION_CHOICES_E');?>
                      </div>
                      <div class="Cell">
                        <input type="checkbox" name="correct_ans_E" value="E" <?php if($explode_correct_ans[4]=='E'){echo 'checked="checked"';}?>>
                      </div>
                      <div class="Cell">
                        <p><?php echo $row['option_e'];?></p>
                      </div>
                    </div>

                  <?php } }?>




                </div>        
                </td>
                </tr>
                <tr><td><?php echo constant('TI_LABEL_QUESTION_MARKS');?></td><td><?php echo $row['marks'];?></td></tr>               
                </table>        
                </td>
                <td>
                <?php
                  if($row['question_status']==1)
                  {?>                           

                  <a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=<?php echo $row['q_id'];?>&s_id=<?php echo $_GET['s_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <?php echo constant('TI_DEACTIVATE_BUTTON');?></a>
                  <?php }
                  else
                  {?>                           

                  <a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('question_status.php?q_id=<?php echo $row['q_id'];?>&s_id=<?php echo $_GET['s_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php echo constant('TI_ACTIVATE_BUTTON');?></a>
                  <?php }?> 
                </td>






                <td align="center">
                <a data-toggle="modal" href="question_edit.php?q_id=<?php echo $row['q_id'];?>&s_id=<?php echo $row['s_id'];?>"  class="btn btn-gray btn-small"><i class="icon-wrench"></i> <?php echo constant('TI_EDIT');?></a>

                <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=<?php echo $row['q_id'];?>&s_id=<?php echo $_GET['s_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <?php echo constant('TI_DELETE_BUTTON');?> </a>



                </td>
                </tr>
            <?php } ?>
                                
              </tbody>
                </table>





            </div>
            
          </div>
        </div>
      </div>           
    </div>       
     <?php include("copyright.php");?>     
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
            <input type="text" name="valuec_d" id="valuec_d" readonly />
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
      <div class="padded">
        <div class="control-group">
          <label class="control-label">Bobot Soal</label>
          <div class="controls">
            <input type="radio" class="validate[required]" name="bobotsoal" value="0" /><i class="warning" style="">*Custom</i>
            <input type="radio" class="validate[required]" name="bobotsoal" value="1" /><i class="warning" style="">*Default</i>
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

        $('.select2-search-choice-close').trigger('click');
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
        thisis.closest('.controls').append('<div class="kuotaformError parentFormformManageMapel formError" style="opacity: 0.87; position: absolute; top: 122px; left: 205px; margin-top: -23px;"><div class="formErrorContent">* Diantara 0 hingga '+kuotanow+'<br></div></div>');
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
  $('#jumlahsoal-modal-form').removeAttr('style');
  $('#jumlahsoal-modal-form').modal();
  $('.formError').trigger('click');
  $('#iddetailpaket').val(id);

  $('#nsoalsulit').val('');
  $('#nsoalsedang').val('');
  $('#nsoalmudah').val('');

  if($(this).hasClass('default')){
    $('#valuec_d').val('default');
  }else{
    $('#valuec_d').val('custom');
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

</script>