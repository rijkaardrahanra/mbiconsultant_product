<script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <!-- page content -->
 <div class="main-content">
  <div class="container-fluid" >
    <div class="row-fluid">
        <div class="area-top clearfix">
            <div class="pull-left header">
                <h3 class="title">
                <i class="icon-edit"></i>
                 Management Password </h3>
            </div>
        </div>
    </div>
  </div>
                       
  <div class="container-fluid padded">
    <div class="box">
      <div class="box-header">    
        <ul class="nav nav-tabs nav-tabs-left">
          <li class="active">
                  <a href="#list" data-toggle="tab"><i class="icon-lock"></i> 
              Ubah Password</a></li>
        </ul>        
      </div>
      <div class="box-content padded">
    
        <div class="tab-content">
          <div class="tab-pane box active" id="list" style="padding: 5px">
              <div class="box-content padded">
                <form action="<?php echo base_url(); ?>Dashboard/submitUbahPassword" method="post" method="POST" id="formubahpassword" enctype="multipart/form-data" class="form-horizontal validatable" >                  
                  <div class="control-group">
                      <label class="control-label">Password Lama</label>
                      <div class="controls">
                          <input type="password" class="" name="old_pass">
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Password Baru</label>
                      <div class="controls">
                          <input type="password" class="" name="new_pass">
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Ulangi Password Baru</label>
                      <div class="controls">
                          <input type="password" class="" name="con_pass">
                      </div>
                  </div>
                  <div class="form-actions">
                      <button id="btnSumbit" class="btn btn-gray">Ubah Password</button>
                      <input type="hidden" value="Add new user" name="submit">
                  </div>
                </form>
              </div>
          </div>            
        </div>
      </div>
    </div>
  </div>   
</div>
        <!-- /page content -->
     

     <script type="text/javascript">
       $(document).on('click', '#btnSumbit', function(e){
          e.preventDefault();
          $.ajax({
          url: "<?php echo site_url('Dashboard/submitUbahPassword'); ?>",
          type: "POST",
          cache: false,
          data: $('#formubahpassword').serialize(),
          dataType:'json',
          success: function(json){
            console.log(json);
            if (json.status==1) {
              alert(json.pesan);
              window.location.replace("<?php echo site_url('Dashboard'); ?>");
            }else{
              alert(json.pesan);
              window.location.replace("<?php echo site_url('Dashboard/ubahPassword'); ?>");
            }
          },
          error: function(){
            console.log('Error');
            alert('Error');
          }
          });
      });
     </script>