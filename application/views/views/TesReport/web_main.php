
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
            <h3 class="title"><i class="icon-edit"></i>Data Hasil Ujian</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Container Box-->
    <div class="container-fluid padded">
      <!-- Start Box-->
      <div class="box">

        <div class="padded" style="padding-top: 2em;padding-bottom: 20px;">
        </div>
      
        <div class="box-header">
          <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
              <a href="#datahasil" data-toggle="tab">
              <i class="icon-folder"></i>Data Hasil Ujian
              </a>
            </li>
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">
            <div class="tab-pane box active" id="datahasil">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                <div style="margin-top: 0.3em">
                <a href="" data-toggle="tab" id="pdf"><button class="btn btn-green pull-right"><img src="../images/pdf.png"> Cetak PDF </button></a>
                <a href="" data-toggle="tab" id="exel"><button class="btn btn-blue pull-right"><img src="../images/xls.png"> Cetak Exel</button></a>
                <div>
                  <thead>
                    <tr>          
                      <th><div>No </div></th>
                      <th><div>Nama Peserta</div></th>
                      <th><div>Mata Pelajaran</div></th> 
                      <th><div>Nama Paket Soal</div></th>         
                      <th><div>Nilai Peserta</div></th>              
                      <th><div>Hasil Ujian</div></th>             
                      
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td align="center">1</td>
                        <td>Andri Gunawan</td>
                        <td>Bahasa Belgia</td>
                        <td>Perhimpunan Kakek</td>
                        <td>95</td>
                        <td align="center" >LULUS</td>
                      </tr>               
                  </tbody>
               </table>
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

<!-- Start Modal Report PDF -->
<div id="pop-pdf" class="modal fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <div id="modal-tablesLabel_question" style="color:#fff; font-size:16px;">Cetak Bentuk PDF</div>
  </div>
  <div class="modal-body" id="modal-body-detail" >
    <div id="frame" style="padding: 10px;">
   <div style="min-height: 600px;min-width: 600px;background-color: #333"></div>
    </div>
  </div>
  <div class="modal-footer center">
    <a href="#fgaksdfh" id="cetak" class="btn btn-success" >Cetak</a>
    <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
  </div>
</div>
<!-- End Modal Report PDF -->

<!-- Start Modal Report exel -->
<div id="pop-exel" class="modal fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <div id="modal-tablesLabel_question" style="color:#fff; font-size:16px;">Cetak Bentuk Exel</div>
  </div>
  <div class="modal-body" id="modal-body-detail" >
    <div id="frame" style="padding: 10px;">
   <div style="min-height: 30em;min-width: 30em;background-color: #333"></div>
    </div>
  </div>
  <div class="modal-footer center">
    <a href="#fgaksdfh" id="cetak" class="btn btn-success" >Cetak</a>
    <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
  </div>
</div>
<!-- End Modal Report exel -->

<script type="text/javascript">
  $(document).on('click', '#pdf', function(e){
    e.preventDefault();
    $('#pop-pdf').modal();
  });

  $(document).on('click', '#exel', function(e){
    e.preventDefault();
    $('#pop-exel').modal();
  });
</script>
