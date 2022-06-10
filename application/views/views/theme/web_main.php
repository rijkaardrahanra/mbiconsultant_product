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
            <h3 class="title"><i class="icon-edit"></i>Manage Theme </h3>
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
              <i class="icon-align-justify"></i>Pengaturan Theme
              </a>
            </li>
            
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">
            

            <div class="tab-pane box active" id="list" style="padding: 5px">
            <div class="box-content">
           
              <form id="FormTheme" name="FormTheme" class="form-horizontal validatable" >
              <div class="padded">
                  <div class="control-group">
                    <label class="control-label">Pilih Warna</label>
                    <div class="controls">
                      <select name="theme" id="theme" class="chzn-select">
                        <option value="">Pilih Warna</option>
                        <?php foreach ($themes as $theme) { 
                         ?>
                          <option value="<?php echo $theme->id; ?>" <?php if($theme_data->theme_id==$theme->id){ echo 'selected="selected"'; } ?> ><?php echo $theme->warna;?></option>; 
                        
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>

               

                
                <div class="form-actions">
                  <button id="saveTheme" class="btn btn-gray">Simpan</button>
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



$(document).on('click', '#saveTheme', function(e){
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
});
</script>