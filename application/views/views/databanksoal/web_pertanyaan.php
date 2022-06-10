<?php
//print_r($idmanmapel->MM_MANAGE_MAPEL_ID);die();
?>
<script src="<?php echo base_url(); ?>admin/ckeditor/ckeditor.js"></script>
<link rel="<?php echo base_url(); ?>admin/ckeditor/samples/stylesheet" href="sample.css">
<script>
// Remove advanced tabs for all editors.
CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
</script>
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
            <h3 class="title"><i class="icon-edit"></i>Management Pertanyaan </h3>
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
              <i class="icon-plus"></i>Tambah Pertanyaan
              </a>
            </li>
          </ul>
        </div>
        <!-- mulai -->
        <div class="box-content padded">
          <div class="tab-content">
            <div class="tab-pane active" id="add" style="padding: 5px">
            <form id="formPertanyaan" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top" enctype="multipart/form-data">
            <input type="hidden" name="idmanmapel" id="idmanmapel" value="<?php echo $idmanmapel->MM_MANAGE_MAPEL_ID;?>">
              <div class="padded">
                <div class="control-group">
                  <label class="control-label">Bab</label>
                  <div class="controls">
                    <select name="bab_id" id="bab_id">
                      <option value="">Pilih Bab</option>
                      <?php foreach ($babs as $bab) { echo '<option value="'.$bab->BB_BAB_ID.'" data-mapel="'.$bab->MP_MAPEL_ID.'">'.$bab->NAMA_BAB.'</option>'; } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="padded">
                <div class="control-group">
                  <label class="control-label">Tingkat Kesulitan</label>
                  <div class="controls">
                    <select name="tingkatsulit" id="tingkatsulit" class="validate[required]">
                      <option value="">Pilih Tingkat Kesulitan</option>
                      <option value="Sulit">Sulit</option>
                      <option value="Sedang">Sedang</option>
                      <option value="Mudah">Mudah</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="padded">
                <div class="control-group">
                  <label class="control-label">Pertanyaan</label>
                  <div class="controls">
                    <div class="box closable-chat-box">
                      <div class="box-content">
                        <div class="chat-message-box">
                          <textarea name="question" id="question" class="validate[required]" rows="5" placeholder="Add Question"></textarea>
                          <script>
                          CKEDITOR.replace( 'question' );
                          </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="padded">
                <div class="control-group">
                <label class="control-label">Jenis Pertanyaan</label>
                <div class="controls">
                  <select name="typeofquestion" class="validate[required]"  onchange="showDiv(this)" id="pr_bookingtype">
                    <option value="">Pilih Jenis Jawaban</option>
                    <option value="Single">Hanya Satu</option>
                    <option value="Multiple">Lebih dari Satu</option>
                  </select>
                </div>
                </div>
              </div> -->
              <div id="hidden_div_single">
                <div class="padded">
                  <div class="control-group">
                    <div>Masukkan Pilihan</div>
                    <div class="CSSTableGenerator">
                      <table>
                        <tr>
                          <td>No.</td>
                          <td>Benar</td>
                          <td>Pilih</td>
                        </tr>
                        <tr>
                          <td><div>A</div></td>
                          <td><div><input type="radio" class="correct_ans" name="correct_ans" value="A"></div></td>
                          <td>
                            <div class="box closable-chat-box">
                              <div class="box-content">
                                <div class="chat-message-box">
                                  <textarea name="option_a" id="option_a" class="validate[required]" rows="5" placeholder="Add Choices A"></textarea>
                                  <script>
                                  CKEDITOR.replace( 'option_a' );
                                  </script>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><div>B</div></td>
                          <td><div><input type="radio" class="correct_ans" name="correct_ans" value="B"></div></td>
                          <td>
                            <div class="box closable-chat-box">
                              <div class="box-content">
                                <div class="chat-message-box">
                                  <textarea name="option_b" id="option_b" class="validate[required]" rows="5" placeholder="Add Choices B"></textarea>
                                  <script>
                                  CKEDITOR.replace( 'option_b' );
                                  </script>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><div>C</div></td>
                          <td><div><input type="radio" class="correct_ans" name="correct_ans" value="C"></div></td>
                          <td>
                            <div class="box closable-chat-box">
                              <div class="box-content">
                                <div class="chat-message-box">
                                  <textarea name="option_c" id="option_c" class="validate[required]" rows="5" placeholder="Add Choices C"></textarea>
                                  <script>
                                  CKEDITOR.replace( 'option_c' );
                                  </script>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><div>D</div></td>
                          <td><div><input type="radio" class="correct_ans" name="correct_ans" value="D"></div></td>
                          <td>
                            <div class="box closable-chat-box">
                              <div class="box-content">
                                <div class="chat-message-box">
                                  <textarea name="option_d" id="option_d" class="validate[required]" rows="5" placeholder="Add Choices D"></textarea>
                                  <script>
                                  CKEDITOR.replace( 'option_d' );
                                  </script>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><div>E</div></td>
                          <td><div><input type="radio" class="correct_ans" name="correct_ans" value="E"></div></td>
                          <td>
                            <div class="box closable-chat-box">
                              <div class="box-content">
                                <div class="chat-message-box">
                                  <textarea name="option_e" id="option_e" class="validate[required]" rows="5" placeholder="Add Choices E"></textarea>
                                  <script>
                                  CKEDITOR.replace( 'option_e' );
                                  </script>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div id="hidden_div_multiple" style="display: none;">
                <div class="padded">
                  <div class="control-group">
                    <div>Masukkan Pilihan</div>
                    <div class="CSSTableGenerator">
                      <table>
                        <tr>
                          <td>No.</td>
                          <td>Benar</td>
                          <td>Pilih</td>
                        </tr>
                        <tr>
                          <td><div>A</div></td>
                          <td><div><input type="checkbox" name="correct_ans_A" value="A"></div></td>
                          <td>
                            <div class="box closable-chat-box">
                              <div class="box-content">
                                <div class="chat-message-box">
                                  <textarea name="check_option_a" class="validate[required]" rows="5" placeholder="Add Choices A"></textarea>
                                  <script>
                                  CKEDITOR.replace( 'check_option_a' );
                                  </script>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><div>B</div></td>
                          <td><div><input type="checkbox" name="correct_ans_B" value="B"></div></td>
                          <td>
                            <div class="box closable-chat-box">
                              <div class="box-content">
                                <div class="chat-message-box">
                                  <textarea name="check_option_b" class="validate[required]" rows="5" placeholder="Add Choices B"></textarea>
                                  <script>
                                  CKEDITOR.replace( 'check_option_b' );
                                  </script>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><div>C</div></td>
                          <td><div><input type="checkbox" name="correct_ans_C" value="C"></div></td>
                          <td>
                            <div class="box closable-chat-box">
                              <div class="box-content">
                                <div class="chat-message-box">
                                  <textarea name="check_option_c" class="validate[required]" rows="5" placeholder="Add Choices C"></textarea>
                                  <script>
                                  CKEDITOR.replace( 'check_option_c' );
                                  </script>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><div>D</div></td>
                          <td><div><input type="checkbox" name="correct_ans_D" value="D"></div></td>
                          <td>
                            <div class="box closable-chat-box">
                              <div class="box-content">
                                <div class="chat-message-box">
                                  <textarea name="check_option_d" class="validate[required]" rows="5" placeholder="Add Choices D"></textarea>
                                  <script>
                                  CKEDITOR.replace( 'check_option_d' );
                                  </script>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><div>E</div></td>
                          <td><div><input type="checkbox" name="correct_ans_E" value="E"></div></td>
                          <td>
                            <div class="box closable-chat-box">
                              <div class="box-content">
                                <div class="chat-message-box">
                                  <textarea name="check_option_e" class="validate[required]" rows="5" placeholder="Add Choices E"></textarea>
                                  <script>
                                  CKEDITOR.replace( 'check_option_e' );
                                  </script>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="padded">
                <div class="control-group">
                  <label class="control-label">Bobot Jawaban Benar</label>
                  <div class="controls">
                    <input type="text" placeholder="Masukkan Bobot Jawaban Benar" class="validate[required,custom[integer]]" id="bobotbenar" name="bobotbenar" maxlength="2" value="1"/>
                  </div>
                </div>
              </div>
              <div class="padded">
                <div class="control-group">
                  <label class="control-label">Bobot Jawaban Salah</label>
                  <div class="controls">
                    <input type="text" placeholder="Masukkan Bobot Jawaban Salah" class="validate[custom[integer]]" id="bobotsalah" name="bobotsalah" value="0"/>
                  </div>
                </div>
              </div>
              <div class="padded">
                <div class="control-group">
                  <label class="control-label">Bobot Tidak Jawab</label>
                  <div class="controls">
                    <input type="text" placeholder="Masukkan Bobot Tidak Jawab" class="validate[custom[integer]]" id="bobottidakjawab" name="bobottidakjawab" value="0"/>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button id="addPertanyaan" type="submit" class="btn btn-gray">Tambah Pertanyaan</button>
              </div>
            </form>
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
// function showDiv(elem){

//   $('#hidden_div_single').hide();
//   $('#hidden_div_multiple').hide();
//   $('#hidden_div_descriptive').hide();
  
//   if(elem.value == 'Single')
//   {
//     $('#hidden_div_single').show();
//     // $('#hidden_div_multiple').hide();
//     // $('#hidden_div_descriptive').hide();
//     // document.getElementById('hidden_div_single').style.display = "block";
//     // document.getElementById('hidden_div_multiple').style.display = "none";
//     // document.getElementById('hidden_div_descriptive').style.display = "none";
//   }else if(elem.value=='Multiple'){
//     $('#hidden_div_multiple').show();
//     // $('#hidden_div_single').hide();
//     // $('#hidden_div_descriptive').hide();
//     // document.getElementById('hidden_div_multiple').style.display = "block";
//     // document.getElementById('hidden_div_single').style.display = "none";
//     // document.getElementById('hidden_div_descriptive').style.display = "none";

//   }else if(elem.value=='Descriptive'){
//     $('#hidden_div_descriptive').show();
//     // contoh code tidak efektif 
//     // $('#hidden_div_single').hide();
//     // $('#hidden_div_multiple').hide();
//     // document.getElementById('hidden_div_descriptive').style.display = "block";
//     // document.getElementById('hidden_div_single').style.display = "none";
//     // document.getElementById('hidden_div_multiple').style.display = "none";
//   }
// }

$(document).on('click', '#addPertanyaan', function(e){
    e.preventDefault();
    var question = CKEDITOR.instances['question'].getData();
    var option_a = CKEDITOR.instances['option_a'].getData();
    var option_b = CKEDITOR.instances['option_b'].getData();
    var option_c = CKEDITOR.instances['option_c'].getData();
    var option_d = CKEDITOR.instances['option_d'].getData();
    var option_e = CKEDITOR.instances['option_e'].getData();

    var correct_ans = $('.correct_ans:checked').val();
    var idmanmapel = $('#idmanmapel').val();
    var bab_id = $('#bab_id').val();
    var tingkatsulit = $('#tingkatsulit').val();
    var bobotbenar = $('#bobotbenar').val();
    var bobotsalah = $('#bobotsalah').val();
    var bobottidakjawab = $('#bobottidakjawab').val();
    
    $.ajax({
    url: "<?php echo site_url('DataBankSoal/simpanTambah'); ?>",
    type: "POST",
    cache: false,
    data: {question:question,option_a:option_a,option_b:option_b,option_c:option_c,option_d:option_d,option_e:option_e,correct_ans:correct_ans,idmanmapel:idmanmapel,bab_id:bab_id,tingkatsulit:tingkatsulit,bobotbenar:bobotbenar,bobotsalah:bobotsalah,bobottidakjawab:bobottidakjawab},
    //$('#formPertanyaan').serialize()+"&question="+question+"&option_a="+option_a+"&option_b="+option_b+"&option_c="+option_c+"&option_d="+option_d+"&option_e="+option_e
    dataType:'json',
    success: function(json){
      console.log(json);
      if (json.status==1) {
        alert(json.pesan);
        window.location.replace("<?php echo site_url('DataBankSoal/index'); ?>");
      }else{
        alert(json.pesan);
      }
    },
    error: function(json){
      console.log(json);
      alert('Error');
    }
    });
});
</script>