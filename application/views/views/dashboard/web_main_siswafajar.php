<?php
//print_r($this->session->userdata('logged_in'));die();
//print_r($ujian->result());die();
?>
<script type="text/javascript" src="<?php echo base_url(); ?>student/js/countdown/jquery.plugin.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>student/js/countdown/jquery.countdown.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/detect/detectdevtools.js"></script>
<style type="text/css">
  .hide{
    display: none !important;
  }
  .center{
    text-align: center !important;
  }
  .btn[disabled]{
    background-color: #e6e6e6 !important;
    cursor: not-allowed !important;
  }
  .btn.btn-blue[disabled]{
    border: 1px solid #e6e6e6 !important;
    box-shadow: inset 0 1px 2px #e6e6e6 !important;
  }
  .radiobtn{
    margin-top: -1px !important;
  }
  .radioli{
    margin-left: 13px !important;
  }
  .blur{
    filter: blur(5px);
    -webkit-filter: blur(5px);
  }
</style>
<style type="text/css">

.green{display:block;width:100px;height:100px;border-radius:50px;font-size:18px;color:#fff;line-height:100px;text-align:center;text-decoration:none;background:#336600}.menu:hover{color:#ccc;text-decoration:none;background:#333}
.green div {
    float:left;
    width:100%;
    padding-top:50%;
    line-height:1em;
    margin-top:-0.5em;
    text-align:center;
    color:white;
}
.red{display:block;width:100px;height:100px;border-radius:50px;font-size:18px;color:#fff;line-height:34px;text-align:center;text-decoration:none;background:#ff0000}.menu:hover{color:#ccc;text-decoration:none;background:#333}
.red div {
  color: white;
    float: left;
    line-height: 15px;
    padding-top: 36%;
    text-align: center;
    width: 100%;
}

.orange{display:block;width:100px;height:100px;border-radius:50px;font-size:18px;color:#fff;line-height:100px;text-align:center;text-decoration:none;background:#FF8000}.menu:hover{color:#ccc;text-decoration:none;background:#333}
.orange div {
    float:left;
    width:100%;
    padding-top:50%;
    line-height:1em;
    margin-top:-0.5em;
    text-align:center;
    color:white;
}


.blue{display:block;width:100px;height:100px;border-radius:50px;font-size:18px;color:#fff;line-height:34px;text-align:center;text-decoration:none;background:#4679BD}.menu:hover{color:#ccc;text-decoration:none;background:#333}
.blue div {
    float:left;
    width:100%;
    padding-top:50%;
    line-height:1em;
    margin-top:-0.5em;
    text-align:center;
    color:white;
}
.number-plate {
    float: left;
    height:17vh;
    min-height:17vh;
    overflow: auto;
    width: 100%;
}
.q-answered {
    background-color: #336600 !important;
    color: #fff;
}
.n-answered {
    background-color: #ff0000 !important;
    color: #fff;
}
.m-answered {
    background-color: #FF8000 !important;
    color: #fff;
}
.m-answered:hover {
    opacity: 0.5 !important;
}
.z-answered {
    background-color: #4679BD !important;
    color: #fff;
}

.numbers {
margin: 5px;
float: left;
width:24px;
height:37px;

font-size:15px;
color:#fff;
line-height:34px;
text-align:center;
text-decoration:none;
background:#4679BD;


-webkit-border-radius:24px;
  -moz-border-radius:24px;
  -ms-border-radius:24px;
  -o-border-radius:24px;
  border-radius:24px
}
.numbers:hover {
    background-color: #2b5c9c !important;
}
</style>
<style type="text/css">
    #connectloader
    {
      background: rgba( 255, 255, 255, 0.8 );
      display: none;
      height: 100%;
      position: fixed;
      width: 100%;
      z-index: 9999;
    }

    #connectloader img
    {
        top:0;
        left:0;
        right:0;
        bottom:0;
        margin:auto;
        position: absolute;
        text-align: center;
    }

    #connectloader span
    {
        top:75vh;
        left:0;
        right:0;
        bottom:0;
        margin:auto;
        position: absolute;
        text-align: center;
        font-size: 25px;
    }


@media screen and (max-width: 767px) {
  #sidebar:hover{
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      -moz-transition: all 0.2s ease-in;
      -ms-transition: all 0.2s ease-in;
      -o-transition: all 0.2s ease-in;
      -webkit-transition: all 0.2s ease-in;
      transition: all 0.2s ease-in;
      width: 40vh !important;
      padding: 5px !important;
      height: 100vh;
  }

  #rightside{
      padding: 5px;
      position: fixed;
      margin-left: -4vh;
  }

  #sidebar:hover #rightside{
      padding: 0px!important;
  }

  #aslirightside{
    margin-bottom:0px;background: aliceblue;
  }
}
</style>
  <!-- Start Main Content -->
  <div class="main-content">
    <div class="container-fluid" >
      <div class="row-fluid">
        <div class="area-top clearfix">
          <div class="pull-left header">
            <h3 class="title"><i class="icon-edit"></i>Ujian </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Container Box-->
    <div class="container-fluid padded">
      <!-- Start Box-->
      <div id="element">
      <div class="box">
        <div class="box-header">
          <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
              <a href="#add" data-toggle="tab">
              <i class="icon-align-justify"></i>Daftar Jadwal Ujian
              </a>
            </li>
            <li>
              <a href="#syaratketentuan" data-toggle="tab" id="syaratlink" style="display: none;">
              <i class="icon-plus"></i>Syarat
              </a>
            </li>
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">

            <div class="tab-pane box active" id="add" style="padding: 5px">
            <div class="box-content">
              <table id="tblJadwalUjian" cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                <thead>
                  <tr>
                      <th><div>No</div></th>
                      <th><div>Nama Paket Ujian</div></th>
                      <th><div>Kelas</div></th>
                      <th><div>Tanggal Ujian</div></th>
                      <th><div>Durasi Ujian</div></th>
                      <th><div>Mata Pelajaran</div></th>
                      <th><div>Bab</div></th>
                      <th><div>Aksi</div></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                   foreach ($ujian->result() as $key) {
                    if($key->KLS_KELAS_ID==$this->session->userdata('logged_in')['result']->KLS_KELAS_ID){
                  ?>
                    <tr>
                      <td><?php echo$no; ?></td>
                      <td><div class="nmujian"><?php echo$key->NAMA_UJIAN; ?></div></td>
                      <td><div class="kelas"><?php ($key->NAMA_PROGRAM ? $nmprog = $key->NAMA_PROGRAM : $nmprog = '');echo $key->KELAS.' '.$nmprog.' ('.$key->NAMA_JENJANG.')';
                      ?></div></td>
                      <td><div class="tglpelaksana"><?php echo complete_tanggal_indo($key->TGL_MULAI_UJIAN); ?></div></td>
                      <td><div class="durasi"><?php echo$key->DURASI_UJIAN_MENIT; ?></div></td>
                      <td><div class="mapel"><?php echo$key->NAMA_MAPEL; ?></div></td>
                      <td>
                        <div class="bab">
                          <?php
                            $namabab = '';
                            if($key->MP_MAPEL_ID){
                              foreach ($babs as $bab) {
                                if ($bab->MP_MAPEL_ID==$key->MP_MAPEL_ID) {
                                  if(substr_count($key->BAB, ',')>=1){
                                    $explode_bab=explode(',',$key->BAB);
                                    if(in_array($bab->BB_BAB_ID, $explode_bab)){
                                      $namabab .= $bab->NAMA_BAB.', ';
                                    }
                                  }else{
                                    if ($key->BAB==$bab->BB_BAB_ID) {
                                      $namabab = $bab->NAMA_BAB.', ';
                                    }
                                  }
                                }
                              }
                              echo CapitalizeEachWord(substr($namabab,0,-2));
                            }else{
                              echo '-';
                            }
                          ?>
                        </div>
                      </td>
                      <td>
                        <!-- <a href="" class="btn btn-gray">Mulai Tes</a> -->
                        <button id="masukUjian" data-detilpaketujian="<?php echo $key->ID_DETAIL_PAKETUJIAN; ?>" class="btn btn-green masukUjian">Masuk</button>
                      </td>
                  </tr>
                 <?php } $no++; } ?>
                </tbody>
              </table>
            </div>
            </div>


            <div class="tab-pane box" id="syaratketentuan" style="padding: 5px">
            <div class="box-content">
              <table border="0" width="100%" padding=10 style="padding: 10px !important;">
                <tbody>
                  <tr>
                     <td colspan="2"> 
                      <div class="area-top-ti clearfix">
                        <div class="pull-left header">
                          <h3 class="title" style="color: black !important;"><i class="icon-warning-sign"></i> Perhatian  </h3>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <hr>
                        <div style="font-size: 15px !important;">Syarat Ketentuan :</div>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <div id="isisyaratketentuan" style="margin-top:10px;margin-bottom:10px;">
                          <ul>
                            <li>Mengerjakan dengan Jujur</li>
                          </ul>
                        </div>
                        <hr>
                     </td>
                  </tr>
                  <tr>
                     <td>
                      <a href="#" class="green"><div> Jawab </div></a>
                     </td>
                     <td>
                       <a href="#" class="red"><div> Tidak Dijawab </div></a>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                      &nbsp;
                     </td>
                  </tr>
                  <tr>
                     <td>
                      <a href="#" class="orange"><div> Tandai </div></a>
                     </td>
                     <td>
                       <a href="#" class="blue"><div> Belum Singgah </div> </a>
                     </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="box-content" style="margin-top: 10px;">
              <form id="formSyaratKetentuan" name="formSyaratKetentuan" method="POST" class="form-horizontal validatable" action="<?php echo site_url('DataUjian/ujianOnline'); ?>">
                <table border="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="5%">
                        <input type="hidden" name="iddetail" id="iddetail">
                        <input type="checkbox" name="checkbox" id="exam_chkbox">
                        <label for="checkbox"></label>
                      </td>
                      <td>
                      
                        <label for="exam_chkbox"><b> Komputer yang diberikan kepada saya sesuai dengan kondisi kerja saya. Saya telah membaca dan memahami instruksi yang diberikan di atas. </b></label>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="form-actions" style="text-align: right;">
                  <button id="mulai" type="button" class="btn btn-green mulai">Mulai</button>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Box-->
      </div>

      <div id="element2" style="height: 100%;width: 100%;display: none;" >
      <div id="connectloader">
          <img src="<?= base_url() ?>images/wifi.gif" alt="Reconnecting..." />
          <span>Reconnecting</span>
      </div>
      <div id="sidebar">
        <div id="rightside"><i class="icon-list"></i>
        </div>
      </div>
      <div class="row-fluid">
      <div class="span8">
      <div class="box">
        <div class="box-content padded">
          <div class="tab-content">
            <div class="tab-pane box active" style="padding: 5px">
            <div class="box-content">
              <table border="0" id="headerujian" width="100%" padding=10 style="padding: 10px !important;">
                <tbody>
                  <tr>
                     <td colspan="2"> 
                      <div class="area-top-ti clearfix">
                        <div class="pull-left">
                        </div>
                      </div>
                    </td>
                     <td colspan="2" style="padding-left: 10px;bottom: 0; padding-bottom: 0px;" valign="bottom"> 
                      <div class="area-top-ti clearfix">
                        <div class="pull-right pull-down">
                              <br/>
                          <h5 style="color: blue;">
                            <p>
                              <span class="demoLabel">Sisa Waktu:</span>
                              <br/>
                              <span id="until300s" class="countdown"></span>
                            </p>
                          </h5>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <hr>
              <div id="soalsoal" style="overflow-y: scroll;height:50vh;min-height:50vh;">
              </div>
            </div>
            <div class="box-content" style="margin-top: 10px;">
                <div class="form-actions" style="text-align: right;">
                  <button style="display: none;" class="go-button btn btn-red">Tutup</button>
                  <button class="prev btn btn-blue" disabled>Sebelumnya</button>
                  <button class="next btn btn-blue">Selanjutnya</button>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Box-->
      </div>
      <!-- End SPAN-->
      <div class="span4">
      <div class="box" style="height:100vh;min-height:100vh;overflow: auto;">
        <div class="box-content padded">
          <div class="tab-content">
            <div id="aslirightside" class="tab-pane box active" style="padding: 5px;">

            <div class="box-content">
              <div class="area-top-ti clearfix" style="background-color: #e8e5e5;">
                <div class="pull-left header">
                  <h3 class="title" style="color: black !important;margin-left: 10px;"><i class="icon-warning-sign"></i> Halaman </h3>
                </div>
              </div>
              <hr/>
              <div class="number-plate">
                <li id="number-1" class="btn bg-primary numbers z-answered">1</li>
                <li id="number-2" class="btn bg-primary numbers q-answered">2</li>
                <li id="number-3" class="btn bg-primary numbers z-answered">3</li>
                <li id="number-4" class="btn bg-primary numbers z-answered">4</li>
                <li id="number-5" class="btn bg-primary numbers m-answered">5</li>
                <li id="number-6" class="btn bg-primary numbers z-answered">6</li>
                <li id="number-7" class="btn bg-primary numbers z-answered">7</li>
                <li id="number-8" class="btn bg-primary numbers z-answered">8</li>
                <li id="number-9" class="btn bg-primary numbers n-answered">9</li>
                <li id="number-10" class="btn bg-primary numbers z-answered">10</li>
                <li id="number-11" class="btn bg-primary numbers z-answered">11</li>
              </div>
              <hr/>
              <div>&nbsp;</div>
            </div>
            <div class="box-content" style="margin-top: 10px;">
              <table border="0" id="sideright" width="100%" padding=10 style="padding: 10px !important;">
                <tbody>
                  <tr style="background-color: #e8e5e5;">
                     <td colspan="2"> 
                      <div class="area-top-ti clearfix">
                        <div class="pull-left header">
                          <h3 class="title" style="color: black !important;margin-left: 10px;"><i class="icon-warning-sign"></i> Perhatian  </h3>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <hr>
                        <div style="font-size: 15px !important;">Syarat Dan Ketentuan :</div>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <div id="isisyaratketentuanmax" style="margin-top:10px;margin-bottom:10px;">
                          <ul>
                            <li>Mengerjakan dengan Jujur</li>
                          </ul>
                        </div>
                        <hr>
                     </td>
                  </tr>
                  <tr>
                     <td>
                      <a href="#" class="green"><div>Jawab</div></a>
                     </td>
                     <td>
                       <a href="#" class="red"><div>Tidak Dijawab</div></a>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                      &nbsp;
                     </td>
                  </tr>
                  <tr>
                     <td>
                      <a href="#" class="orange"><div>Tandai </div></a>
                     </td>
                     <td>
                       <a href="#" class="blue"><div>Belum Singgah</div> </a>
                     </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="box-content" style="margin-top: 10px;">
                <div class="form-actions" style="text-align: right;">
                  <button class="go-button btn btn-red">Tutup</button>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Box-->
      </div>
      <!-- End SPAN-->
      </div>
      <!-- End row-fluid-->
      </div>
    </div>
    <!-- End Container Box-->
  </div>
  <!-- End Main Content -->
</div>
<!-- End Div Main Body -->

<script type="text/javascript" src="<?php echo base_url(); ?>student/js/screenfull.js"></script>
<script type="text/javascript">
$(function () {
  //$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);
  $('#until300s').countdown('destroy');
  $("#element2").hide();
  if (!screenfull.enabled) {
    return false;
  }

  function fullscreenchange() {
    var elem = screenfull.element;

    if (!screenfull.isFullscreen) {
      //$('#external-iframe').remove();
      document.body.style.overflow = 'auto';
    }
  }

  screenfull.on('change', fullscreenchange);

  // Set the initial values
  fullscreenchange();
});

$("#until300s").on('change', function() {
  console.log($(this).html());
});
</script>
<script type="text/javascript">
function IsFullScreenCurrently() {
  var full_screen_element = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;
  // If no element is in full-screen
  if(full_screen_element === null)
    return false;
  else
    return true;
}

$(".go-button").on('click', function() {
  if(IsFullScreenCurrently()){
    $('#until300s').countdown('destroy');
    $("#element2").hide();
    //console.log('sukses');
    //screenfull.exit();
    screenfull.toggle($('#element2')[0]);
    var iddetail = $('#iddetail').val();
    window.onbeforeunload = null;
    window.location.replace("<?php echo site_url('DataUjian/hasilujian'); ?>/"+iddetail);
  }
  else{
    $("#element2").show();
    screenfull.request($("#element2")[0]);
  }
});

$( "body" ).mousemove(function( event ) {
  if(!IsFullScreenCurrently()) {
    $('#until300s').countdown('destroy');
    $('#element2').hide();
  }else{
    $('#element2').show();
  }
  // if (!screenfull.isFullscreen) {
  //   console.log('Tidak FULL');
  // }else{
  //   console.log('FULL');
  // }
});

$(document).on('fullscreenchange webkitfullscreenchange mozfullscreenchange MSFullscreenChange', function() {
  if(IsFullScreenCurrently()) {
    window.onbeforeunload = function() { return "Your work will be lost."; };
    var timerId, timerInProgress, ping, ms;

    timerInProgress = false;

    $(function() {
        // AJAX defaults
        $.ajaxSetup({
            cache        : false,
            dataType     : 'text',
            timeout      : '15000',
            type         : 'POST'
        });
        
        ms =  3000;//300000;    // in milliseconds
        
        /**
         * Check session is valid. Will not run if another check 
         * is in progress.
         */
        ping = function() {
            if (timerInProgress === false) {
                timerInProgress = true;
                
                $.ajax({
                    url      : 'testConnect',
                    complete: function() {
                        timerInProgress = false;
                    },
                    success: function() {
                        $('#connectloader').hide();
                        //$('#element2').removeClass('blur');
                        $('#until300s').countdown('resume');
                        timerInProgress = false;
                        <?php
                          $session_data = $this->session->userdata('logged_in');
                          $session_data['StatusConnection'] = '1';
                          $this->session->set_userdata('logged_in', $session_data);
                        ?>
                        console.log('connect'+' <?php echo $this->session->userdata("logged_in")["StatusConnection"]; ?>');
                    },
                    error: function(){
                        $('#connectloader').show();
                        //$('#element2').addClass('blur');
                        $('#until300s').countdown('pause');
                        <?php
                          $session_data = $this->session->userdata('logged_in');
                          $session_data['StatusConnection'] = '0';
                          $this->session->set_userdata('logged_in', $session_data);
                        ?>
                        console.log('no connect'+' <?php echo $this->session->userdata("logged_in")["StatusConnection"]; ?>');
                    }
                });
            }
        };
        
        // Run session check every x milliseconds.
        timerId = setInterval(ping, ms);
    });
    // $("#element span").text('Full Screen Mode Enabled');
    $("#element2").find(".go-button").text('Tutup Ujian');
  }
  else {
      window.onbeforeunload = null;
    // $("#element span").text('Full Screen Mode Disabled');
    $("#element2").find(".go-button").text('Mulai');
  }
});

$(document).on('click', '.radiobtn', function(e){
  var name = $(this).attr('name');
  var value = $('input[name='+name+']:checked').val();
  var iddetail = $('input[name='+name+']:checked').closest('.noujian').data('iddetailsiswa');
  //
  $.ajax({
    url: "<?php echo site_url('DataUjian/updateJawaban'); ?>",
    type: "POST",
    cache: false,
    data: {iddetail:iddetail,value:value},
    dataType:'json',
      success: function(json){
        if (json.status==1) {
          
        }
      },
      error: function(json){
        console.log(json);
      }
    });
});

$(document).on("keydown",function(ev){
  if(!IsFullScreenCurrently()) {
    $('#until300s').countdown('destroy');
    $('#element2').hide();
    //console.log('fullsc');
  }

  if(ev.keyCode===27||ev.keyCode===122){
    return false
  }else if(ev.keyCode===116 || ev.keyCode===123 || ev.keyCode===114 || ev.keyCode===112){
    ev.preventDefault();
  }if(ev.keyCode===91 || ev.keyCode===92){ // start
    alert('Pelanggaran');
    $('#until300s').countdown('destroy');
    $('#element2').hide();
    screenfull.exit();
  }else if(ev.keyCode===27){
    alert('Pelanggaran');
    $('#until300s').countdown('destroy');
    $('#element2').hide();
    screenfull.exit();
  }else if(ev.keyCode===17 || ev.keyCode===18){ //ctrl + alt
    alert('Pelanggaran');
    $('#until300s').countdown('destroy');
    $('#element2').hide();
    screenfull.exit();
  }
});


$(document).ready(function(){
 
  document.oncontextmenu = function() {return false;};

  $(document).mousedown(function(e){ 
    if( e.button == 2 ) {
      return false; //right click disabled
    } 
    return true;
  });
});

$.ctrl = function(key, callback, args) {
      var isCtrl = false;
      $(document).keydown(function(e) {
          if(!args) args=[]; // IE barks when args is null
          
          if(e.ctrlKey) isCtrl = true;
          if(e.keyCode == key.charCodeAt(0) && isCtrl) {
              callback.apply(this, args);
              return false;
          }
      }).keyup(function(e) {
          if(e.ctrlKey) isCtrl = false;
      });        
  };
</script>

<script type="text/javascript">
$(document).on('click', '.masukUjian', function(e){
  $('#exam_chkbox').attr('checked', false);
  e.preventDefault();
  var iddetail = $(this).data('detilpaketujian');
    $.ajax({
    url: "<?php echo site_url('DataUjian/masukUjian'); ?>",
    type: "POST",
    cache: false,
    data: {iddetail:iddetail},
    dataType:'json',
      success: function(json){
        if (json.status==1) {
          $('#iddetail').val(iddetail);
          $('#syaratlink').trigger('click');
          $('#isisyaratketentuan').html(json.data.SYARATKETENTUAN);
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

$(document).on('click', '.mulai', function(e){
  e.preventDefault();
  $('#until300s').countdown('destroy');
  $("#element2").hide();
  $('#headerujian').hide();
  $('#sideright').hide();
  var thisis = $('#exam_chkbox');
  var text = '';


  if(thisis.is(':checked')){
    if(window.devtools.open){
      alert('Tampilan Hanya Terlihat Untuk Ujian. Selebihnya Dianggap Sebagai Pelanggaran');
    }else{
      var iddetail = $('#iddetail').val();

      var torow = $('.masukUjian').filter(function () { return $(this).data('detilpaketujian') == iddetail; }).closest('tr');
      var nmujian = torow.find('.nmujian').html();
      var tglpelaksana = torow.find('.tglpelaksana').html();
      var durasi = torow.find('.durasi').html();
      var mapel = torow.find('.mapel').html();
      var bab = torow.find('.bab').html();
      var ket;

      $.ajax({
      url: "<?php echo site_url('DataUjian/cekHasOnline'); ?>",
      type: "POST",
      cache: false,
      data: {iddetail:iddetail},
      dataType:'json',
        complete: function(){
              $('.noujian').addClass('hide');
              $('.noujian:eq(0)').removeClass('hide');
              $('.next').removeAttr('disabled');
              $('.prev').attr('disabled','disabled');
              $('.prev').prev().hide();
        },
        success: function(json){
          if (json.status==1) {
              (durasi < json.sisadurasi) ? ket=' (Terlambat '+(durasi-json.sisadurasi)+' Menit)' : ket='';
              text = '<h3 class="title" style="color: black !important;">'+nmujian+'</h3>';
              text += '<h3 class="title" style="color: black !important;">'+mapel+'</h3>';
              text += '<div style="color: black !important;">'+tglpelaksana+'</div>';
              text += '<div id="durasiujian" style="color: black !important;">'+json.sisadurasi+' Menit'+ket+'</div>';

              $('.number-plate').html(json.nohalaman);
              $('#headerujian').find('.pull-left').html(text);
              $('#soalsoal').html(json.data);
              $("#headerujian").show();
              $("#element2").show();
              $("#sideright").show();
              $('#isisyaratketentuanmax').html($('#isisyaratketentuan').html());

              if ($( window ).width()<=767) {
                $('#aslirightside').insertAfter('#rightside');
                $('#sidebar').attr('style','-moz-transition: all 0.2s ease-in;-ms-transition: all 0.2s ease-in;-o-transition: all 0.2s ease-in;-webkit-transition: all 0.2s ease-in; transition: all 0.2s ease-in;backface-visibility: hidden;padding: 0px;height: 100vh;width: 0%;top: 0vh;position:  fixed;right: 0px;overflow:  auto;background: aliceblue;z-index:2;');
              }

              $('#until300s').countdown('destroy');
              var toseconds = json.sisadurasi * 60;
              $('#until300s').countdown({until: +toseconds});
          }else{
            $('#headerujian').find('.pull-left').html('');
            $('.noujian').remove();
            $('#until300s').countdown('destroy');
            $("#element2").hide();
            $('#headerujian').hide();
            $('#sideright').hide();
            alert(json.pesan);
          }
        },
        error: function(json){
          console.log(json);
          console.log('Error');
          //alert('Error');
        }
      });
      if(!IsFullScreenCurrently()){
        screenfull.toggle($('#element2')[0]);
        $("#element2").show();
        $('#headerujian').show();
        $('#sideright').show();
      }else{
        $('#until300s').countdown('destroy');
        $("#element2").hide();
        $('#headerujian').hide();
        $('#sideright').hide();
      }
    }
  }else{
    alert('Pastikan Syarat dan Ketentuan Telah di Pahami. Kemudian klik Kotak Untuk Dicentang!!!');
  }
});

$( window ).scroll(function() {
  if(!IsFullScreenCurrently()) {
    $('#until300s').countdown('destroy');
    $('#element2').hide();
    $('#headerujian').hide();
    $('#sideright').hide();
  }else{
    $('#element2').show();
    $('#headerujian').show();
    $('#sideright').show();
  }
});

$(document).on('click', '.next', function(e){
  var isthis = $('.noujian').siblings().not('.hide');
  isthis.addClass('hide');
  isthis.next().removeClass('hide');

  if(isthis.next().next().html()){
    $(this).removeAttr('disabled');
  }else{
    $(this).attr('disabled','disabled');
    $('.prev').prev().show();
  }
  $('.prev').removeAttr('disabled');

  var link = $('.number-plate').find('.m-answered');
  var classli = '';
  if(link.length >= 1){
    
    var radiobtnname = $(link.data('lihref')).find('input').attr('name');
    var value = $(link.data('lihref')).find('input[name='+radiobtnname+']:checked').val();
    
    if(value){
      classli ='q-answered';
    }else{
      classli ='n-answered';
    }
    var numberli = $('.number-plate').find('li').filter(function () { return $(this).data('lihref') == link.data('lihref'); });
    numberli.removeClass('m-answered');
    if(numberli.hasClass('q-answered')){
      numberli.removeClass('q-answered');
    }
    if(numberli.hasClass('n-answered')){
      numberli.removeClass('n-answered');
    }
    numberli.addClass(classli);
  }

  link.next().addClass('m-answered');
  link.next().removeClass('z-answered');



  $('.noujian').parent().animate({
      scrollTop: 0
  }, 250);
});

$(document).on('click', '.prev', function(e){
  var isthis = $('.noujian').siblings().not('.hide');
  isthis.addClass('hide');
  isthis.prev().removeClass('hide');

  if(isthis.prev().prev().html()){
    $(this).removeAttr('disabled');
  }else{
    $(this).attr('disabled','disabled');
  }
  $('.next').removeAttr('disabled');
  $('.prev').prev().hide();

  var link = $('.number-plate').find('.m-answered');
  var classli = '';
  if(link.length >= 1){
    
    var radiobtnname = $(link.data('lihref')).find('input').attr('name');
    var value = $(link.data('lihref')).find('input[name='+radiobtnname+']:checked').val();
    
    if(value){
      classli ='q-answered';
    }else{
      classli ='n-answered';
    }
    var numberli = $('.number-plate').find('li').filter(function () { return $(this).data('lihref') == link.data('lihref'); });
    numberli.removeClass('m-answered');
    if(numberli.hasClass('q-answered')){
      numberli.removeClass('q-answered');
    }
    if(numberli.hasClass('n-answered')){
      numberli.removeClass('n-answered');
    }
    numberli.addClass(classli);
  }

  link.prev().addClass('m-answered');
  link.prev().removeClass('z-answered');

  $('.noujian').parent().animate({
      scrollTop: 0
  }, 250);
});

$(document).on('click', '.numbers', function(e){
  var linknumber = $(this).data('lihref');
  var isthis = $(linknumber).siblings().not('.hide');
  isthis.addClass('hide');
  $(linknumber).removeClass('hide');

  if($(linknumber).prev().html() && $(linknumber).next().html()){
    $('.next').removeAttr('disabled');
    $('.prev').removeAttr('disabled');
    $('.prev').prev().hide();
  }else{
    if($(linknumber).prev().html()){
      $('.prev').removeAttr('disabled');
      $('.prev').prev().show();
      $('.next').attr('disabled','disabled');
    }else{
      $('.next').removeAttr('disabled');
      $('.prev').prev().hide();
      $('.prev').attr('disabled','disabled');
    }
  }

  var link = $(this).closest('.number-plate').find('.m-answered');
  var classli = '';
  if(link.length >= 1){
    
    var radiobtnname = $(link.data('lihref')).find('input').attr('name');
    var value = $(link.data('lihref')).find('input[name='+radiobtnname+']:checked').val();
    
    if(value){
      classli ='q-answered';
    }else{
      classli ='n-answered';
    }
    var numberli = $('.number-plate').find('li').filter(function () { return $(this).data('lihref') == link.data('lihref'); });
    numberli.removeClass('m-answered');
    if(numberli.hasClass('q-answered')){
      numberli.removeClass('q-answered');
    }
    if(numberli.hasClass('n-answered')){
      numberli.removeClass('n-answered');
    }
    numberli.addClass(classli);
  }

  $(this).addClass('m-answered');
  $(this).removeClass('z-answered');

  $('.noujian').parent().animate({
      scrollTop: 0
  }, 250);
});

$(document).on('click', 'a', function(e){
  $(this).closest('li').find('input.radiobtn').trigger('click');
});

$(document).on('click', '.pertanyaan', function(e){
  $(this).closest('tbody').find('input.radiobtn').attr('checked', false);
  var iddetail = $(this).closest('.noujian').data('iddetailsiswa');
  var value = '';
  //console.log(iddetail);
  $.ajax({
    url: "<?php echo site_url('DataUjian/updateJawaban'); ?>",
    type: "POST",
    cache: false,
    data: {iddetail:iddetail,value:value},
    dataType:'json',
      success: function(json){
        if (json.status==1) {
          
        }
      },
      error: function(json){
        console.log(json);
      }
    });
});

$("h5").on('DOMSubtreeModified', "span", function () {
  var jam = $(this).find('.countdown-amount:eq(0)').html();
  var menit = $(this).find('.countdown-amount:eq(1)').html();
  var detik = $(this).find('.countdown-amount:eq(2)').html();
  var iddetail = $('#iddetail').val();
  if (jam){
    //console.log('jam: '+jam+' menit: '+menit+' detik: '+detik);
    if (jam==='0' && menit==='0' && detik==='0'){
      alert('Waktu Ujian Telah Selesai');
      window.onbeforeunload = null;
      window.location.replace("<?php echo site_url('DataUjian/hasilujian'); ?>/"+iddetail);
    }
  }
});

window.addEventListener('devtoolschange', function (e) {
  if(IsFullScreenCurrently()) {
    if(e.detail.open){
      alert('pelanggaran');
    }
  }
  // oriEl.textContent = e.detail.orientation ? e.detail.orientation : '';
});
</script>