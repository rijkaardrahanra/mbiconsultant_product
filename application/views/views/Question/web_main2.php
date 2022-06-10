<!-- <style type="text/css">
  .hide{
    display: none !important;
  }
  .center{
    text-align: center !important;
  }
  .warning{
    font-size: 12px;
  }
</style> -->
<style type="text/css">
    .Table
    {
        display: table;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: 600;
        text-align: center;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border:#EAEBEF solid;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
       
    }
</style>
  <!-- Start Main Content -->
  <div class="main-content">
    <div class="container-fluid" >
      <div class="row-fluid">
        <div class="area-top clearfix">
          <div class="pull-left header">
            <h3 class="title"><i class="icon-edit"></i>Bank Pertanyaan</h3>
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
              <a href="#banktanya" data-toggle="tab">
              <i class="icon-list"></i>Bank Pertanyaan
              </a>
            </li>
            <!-- <li>
              <a href="#addtanya" data-toggle="tab">
              <i class="icon-plus"></i>Tambah Pertanyaan
              </a>
            </li> -->
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">
          <!-- start bank tanya -->
            <div class="tab-pane box active" id="banktanya">
           <!-- end bank tanya -->
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                  <thead>
                    <tr>
                      <th><div>No</th>
                      <th><div>Pertanyaan</div></th>
                      <?php
                      if (isset($isdefault)) {if ($isdefault=='custom') {
                      ?>
                      <th><div>Status</div></th>
                      <th><div>Pilihan</div></th>
                      <?php }}else if($this->session->userdata('logged_in')['result']->PERAN=='Admin'){ ?>
                      <th><div>Status</div></th>
                      <th><div>Pilihan</div></th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
              <?php               
                //$query=mysqli_query($con,"SELECT * FROM question where status_aktif='1' and s_id='".$_GET['s_id']."' order by q_id DESC");
                $i=0;
                foreach ($pertanyaan->result() as $row) 
                { 
                  
                  $i++;
                    
              ?>
                <tr>
                <td><?php echo $i;?></td>
                <td>
                      <table border="0">
                  <tr>
                    <td>Pertanyaan</td>
                    <td><?php echo nl2br($row->SOAL);?></td>
                    
                  </tr>
                  <tr>
                    <td>Pilihan</td>
                    <td>  
                      <div class="Table">                 
                        <div class="Heading">
                          <div class="Cell">
                            <p>Nomor</p>
                          </div>
                          <div class="Cell">
                            <p>Benar</p>
                          </div>
                          <div class="Cell">
                            <p>Pilih</p>
                          </div>                    
                        </div>
                       <?php              
                              $jawaban = $this->db->query("SELECT * FROM sl_pilihan WHERE SL_SOAL_ID =".$row->SL_SOAL_ID);
                              //print_r($jawaban->result());
                              $no ="A";
                              foreach ($jawaban->result() as $key) {                    
                        ?>
                        <div class="Row">
                          <div class="Cell">
                           <?php echo $no;?>
                          </div>
                          <div class="Cell">
                          	 <p><?php if ($key->JAWABAN_BENAR == 1){echo 'Benar';}?></p>
                           <!--  <input type="radio" name="correct_ans_<?php echo $key->SL_PILIHAN_ID;?>" value="<?php echo $key->SL_PILIHAN_ID;?>" <?php if ($key->JAWABAN_BENAR == 1){echo 'checked';}?> > -->
                          </div>
                          <div class="Cell">
                            <p><?php echo nl2br($key->PILIHAN);?></p>
                          </div>                    
                        </div>
                        <?php $no++; } ?>
                       
                        <!-- <div class="Row">
                          <div class="Cell">
                            B
                          </div>
                          <div class="Cell">
                            <input type="radio" name="correct_ans_B" value="B">
                          </div>
                          <div class="Cell">
                            <p><?php //echo $row['option_b'];?></p>
                          </div>                          
                        </div>                        
                      
                        <div class="Row">
                          <div class="Cell">
                            C
                          </div>
                          <div class="Cell">
                            <input type="radio" name="correct_ans_C" value="C">
                          </div>
                          <div class="Cell">
                            <p><?php //echo $row['option_c'];?></p>
                          </div>                    
                        </div>
                       
                        <div class="Row">
                          <div class="Cell">
                            D
                          </div>
                          <div class="Cell">
                            <input type="radio" name="correct_ans_D" value="D">
                          </div>
                          <div class="Cell">
                            <p><?php //echo $row['option_d'];?></p>
                          </div>
                        </div>
                       
                        <div class="Row">
                          <div class="Cell">
                            E
                          </div>
                          <div class="Cell">
                            <input type="radio" name="correct_ans_E" value="E">
                          </div>
                          <div class="Cell">
                            <p><?php //echo $row['option_e'];?></p>
                          </div>
                        </div> -->
                    </div>                 
                </td>
              </tr>
              <tr>
                <td>Poin</td>
                <td>1</td>
              </tr>
            </table>
                  <?php
                  if (isset($isdefault)) {if ($isdefault=='custom') {
                  ?>
                  <td>
                    <a data-toggle="modal" href="#modal-status-deactive"  class="btn btn-red btn-small"><i class="icon-eye-close"></i> Non Aktifkan</a>
                    <!-- <a data-toggle="modal" href="#modal-status-active"  class="btn btn-green btn-small"><i class="icon-eye-open"></i> <?php //echo constant('TI_ACTIVATE_BUTTON');?></a> -->
                  </td>

                  <td align="center" data-id="<?php echo md5($row->SL_BANKSOAL_ID);?>" data-idmapel="<?php echo md5($row->MM_MANAGE_MAPEL_ID);?>">
                    <a  href=""  class="btn btn-gray btn-small edit"><i class="icon-wrench"></i> Ubah</a>
                    <a  href=""  class="btn btn-red btn-small delete"><i class="icon-trash"></i> Hapus</a>
                  </td>
                  <?php }}else if($this->session->userdata('logged_in')['result']->PERAN=='Admin'){?>

                  <td>
                    <a data-toggle="modal" href="#modal-status-deactive"  class="btn btn-red btn-small"><i class="icon-eye-close"></i> Non Aktifkan</a>
                  </td>

                  <td align="center" data-id="<?php echo md5($row->SL_BANKSOAL_ID);?>" data-idmapel="<?php echo md5($row->MM_MANAGE_MAPEL_ID);?>">
                    <a  href=""  class="btn btn-gray btn-small edit"><i class="icon-wrench"></i> Ubah</a>
                    <a  href=""  class="btn btn-red btn-small delete"><i class="icon-trash"></i> Hapus</a>
                  </td>
                    <?php } ?>
                </tr>
                <?php }?>
            
                                
              </tbody>
                </table>
            <!-- start add tanya -->
            </div>

            <div class="tab-pane box active" id="addtanya">
            <!-- end add tanya -->   
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
      <a href="" id="delete_link" class="btn btn-red" >Ya</a>
      <button class="btn btn-default" data-dismiss="modal">Tidak</button>
    </div>
</div>

<script type="text/javascript">
$(document).on('click', '.edit', function(e){
  e.preventDefault();
  var idbanksoal = $(this).closest('td').data('id');
  var mapel = $(this).closest('td').data('idmapel');
  window.location.replace("<?php echo site_url('DataBankSoal/editPertanyaan'); ?>/"+mapel+"/"+idbanksoal);
});

$(document).on('click', '.delete', function(e){
  e.preventDefault();
  var idbanksoal = $(this).closest('td').data('id');
  $('#modal-delete').modal();
  $('#modal-body-delete').html('Yakin Akan Menghapus Soal Ini ?');
  $('#delete_link').removeAttr('data-id').removeAttr('data-nilaiconvert');
  $('#delete_link').removeData('id').removeData('nilaiconvert');
  $('#delete_link').attr('data-id',idbanksoal);
});

$(document).on('click', '#delete_link', function(e){
  e.preventDefault();
  var idbanksoal = $(this).data('id');
  //alert(idbanksoal);

  $.ajax({
    url: "<?php echo site_url('DataBankSoal/deleteQuestion'); ?>",
    type: "POST",
    cache: false,
    data: {idbanksoal:idbanksoal},
    dataType:'json',
    success: function(json){
      if (json.status==1) {
        alert(json.pesan);
        location.reload();
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