<?php
//print_r($themes);die();
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
            <h3 class="title"><i class="icon-edit"></i>Daftar Hasil Ujian </h3>
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
              <i class="icon-align-justify"></i>Hasil Ujian
              </a>
            </li>
            
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">
            

            <div class="tab-pane box active" id="list" style="padding: 5px">
            <div class="box-content">
           
              <form id="FormTheme" name="FormTheme" class="form-horizontal validatable" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>Hasiltes/index">
              <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Pilih Paket Ujian</label>
                    <div class="controls">
                      <select name="paketujian" id="paketujian" class="chzn-select">
                        <option value="">Pilih Paket Ujian</option>

                        <?php 
                        //print_r($ujian);
                        foreach ($ujian as $ujian) { 
                         ?>
                          <option value="<?php echo $ujian->PKTU_PAKETUJIAN_ID; ?>" <?php //if($theme_data->theme_id==$theme->id){ echo 'selected="selected"'; } ?> ><?php echo $ujian->NAMA_UJIAN;?></option>; 
                        
                        <?php } ?>
                      </select>
                       <!-- <button id="btn-tampilkan" class="btn btn-gray">Tampilkan</button> -->
                       <input type="submit" class="btn btn-gray"  value="Tampilkan">
                    </div>
                  </div>
                </div>                
              </form>
            </div>
            </div>
          </div>
        </div>

         <div class="box-content padded">
          <div class="tab-content">

            <div class="tab-pane box active" id="add" style="padding: 5px">
            <div class="box-content">
              <table  cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                <thead>
                  <tr>
                      <th><div>No</div></th>
                      <th><div>Nama Paket Ujian</div></th>
                      <th><div>Mata Pelajaran</div></th>
                      <th><div>Kelas</div></th>
                      <th><div>Program</div></th>
                      <th><div>Tanggal Mulai Ujian</div></th>
                      <th><div>Durasi Ujian (Menit)</div></th>
                      <th><div>Soal Sulit</div></th>
                      <th><div>Soal Sedang</div></th>
                      <th><div>Soal Mudah</div></th>                    
                      <th><div>Aksi</div></th>                    
                   
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    if($detailpaketujian){
                  foreach ($detailpaketujian as $row) {
                    
                   ?>
                  <tr>
                      <td><div><?php echo $no;?></div></td>
                      <td><div><?php echo $row->NAMA_UJIAN;?></div></td>
                      <td><div><?php echo $row->NAMA_MAPEL;?></div></td>
                      <td><div><?php echo $row->KELAS;?></div></td>
                      <td><div><?php echo $row->NAMA_PROGRAM;?></div></td>
                      <td><div><?php echo $row->TGL_MULAI_UJIAN;?></div></td>
                      <td><div><?php echo $row->DURASI_UJIAN_MENIT;?></div></td>
                      <td><div><?php echo $row->NSOAL_SULIT;?></div></td>
                      <td><div><?php echo $row->NSOAL_SEDANG;?></div></td>
                      <td><div><?php echo $row->NSOAL_MUDAH;?></div></td>                                  
                      <td><div><a href="<?php echo base_url();?>Hasiltes/ListSiswaUjian/<?php echo $row->ID_DETAIL_PAKETUJIAN; ?>" class="btn btn-gray">Lihat Hasil</a></div></td>                    
                   
                  </tr>

                <?php  $no++;  }}?>
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

<script type="text/javascript">

$(document).ready(function() {
  reload()
}

/*$(document).on('click', '#saveTheme', function(e){
    e.preventDefault();
    $.ajax({
    url: "<?php echo site_url('theme/update'); ?>",
    type: "POST",
    cache: false,
    data: $('#FormTheme').serialize(),
    dataType:'json',
    success: function(json){
      console.log(json);
      if (json.status==1) {
        alert(json.pesan);
        window.location.replace("<?php echo site_url('theme/index'); ?>");
      }else{
        alert(json.pesan);
      }
    },
    error: function(){
      console.log('Error');
      alert('Error');
    }
    });
});*/


 

</script>

