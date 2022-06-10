<?php
//print_r($this->session->userdata('logged_in'));die();
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
                      <th><div>Tanggal Ujian</div></th>
                      <th><div>Durasi Ujian</div></th>
                      <th><div>Mata Pelajaran</div></th>
                      <th><div>Kelas</div></th>
                      <th><div>Option</div></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;  
                  $sessions = $this->session->userdata('logged_in')['result'];
                 
                   $sessions->KLS_KELAS_ID;
                  $this->session->userdata('logged_in')['result']->KLS_KELAS_ID;
                   foreach ($ujian->result() as $key) {
                    if($key->KLS_KELAS_ID ==$this->session->userdata('logged_in')['result']->KLS_KELAS_ID && $key->PROG_PROGRAM_ID == $sessions->PROG_PROGRAM_ID){
                  ?>
                    <tr>
                      <td><?php echo$no; ?></td>
                      <td><div class="nmujian"><?php echo$key->NAMA_UJIAN; ?></div></td>
                      <td><div class="tglpelaksana"><?php echo complete_tanggal_indo($key->TGL_MULAI_UJIAN); ?></div></td>
                      <td><div class="durasi"><?php echo$key->DURASI_UJIAN_MENIT; ?></div></td>
                      <td><div class="mapel"><?php echo$key->NAMA_MAPEL; ?></div></td>
                      <td><div class="bab"><?php echo$key->nama_kelas; ?> <?php echo$key->nama_program; ?></div></td>
                      
                      <td>
                       <center>
                        <a href="<?php base_url('') ?>hasilujian/<?php echo $key->ID_DETAIL_PAKETUJIAN; ?>"><button  class="btn btn-green masukUjian">Lihat Hasil</button></a>
                       </center>
                      </td>
                  </tr>
                 <?php } $no++; } ?>
                </tbody>
              </table>
            </div>
            </div>


          </div>
        </div>
      </div>
      <!-- End Box-->
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

