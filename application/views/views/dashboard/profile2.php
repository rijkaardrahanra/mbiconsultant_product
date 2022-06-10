<script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
      <div class="main-content">
        <div class="container-fluid" >
          <div class="row-fluid">
            <div class="area-top clearfix">
              <div class="pull-left header">
                <h3 class="title"><i class="icon-edit"></i>Management Profil </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid padded">
          <div class="box">
            <div class="box-header">      
              <ul class="nav nav-tabs nav-tabs-left">
                <li class="active">
                  <a href="#add" data-toggle="tab"><i class="icon-wrench"></i>Ubah Profil</a>
                </li>
              </ul> 
            </div>
            <div class="box-content padded">
              <div class="tab-content">               
                <div class="tab-pane active" id="add" style="padding: 5px">
                  <form method="post" action="<?php echo base_url();?>Dashboard/editProfile" class="form-horizontal validatable" enctype="multipart/form-data">                              
                    <div class="padded"> 
                         <!--  <div class="control-group">
                              <label class="control-label">Kode Pos</label>
                              <div class="controls">
                                  <input type="text" class="validate[required]" readonly name="centercode" value="<?php //echo $result['centercode'];?>"/>
                              </div>
                          </div>   -->
                          <div class="control-group">
                              <label class="control-label">Nama </label>
                              <div class="controls">
                                  <input type="text" class="validate[required]" name="centername" value="<?php echo $tampilProfile->NAMA;?>"/>
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label">Username </label>
                              <div class="controls">
                                  <input type="text" class="validate[required]" name="username" value="<?php echo $tampilProfile->USERNAME;?>"/>
                              </div>
                          </div>
                          <!-- <div class="control-group">
                            <label class="control-label">Tentang</label>
                            <div class="controls">                                    
                              <div class="box closable-chat-box">                        
                                <div class="chat-message-box">
                                  <textarea name="about_center" id="text_for_signature" rows="5" placeholder="About Center"></textarea>                          
                                </div>
                              </div>
                            </div>
                          </div> -->
                          <div class="control-group">
                              <label class="control-label">Alamat</label>
                              <div class="controls">                                    
                                <div class="box closable-chat-box">                                        
                                  <div class="chat-message-box">
                                    <textarea name="centeraddress" id="text_for_signature" rows="5" placeholder="Add Center"><?php echo $tampilProfile->ADDRESS;?></textarea>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label">phone</label>
                            <div class="controls">
                                <input type="text"  name="phoneno" value="<?php echo $tampilProfile->PHONE;?>"/>
                            </div>
                          </div>


                       <!--  <div class="control-group">
                            <label class="control-label">Sertifikat</label>
                            <div class="controls">
                                 <input type="file" class="" name="centerlogo"  /><br><b><?php //echo constant('TI_GENERALSETTING_LOGO_SIZE');?></b>
                            </div>
                        </div> -->
                     <!--  
                        <div class="control-group">
                            <label class="control-label"></label>
                            <div class="controls" style="width:210px;">
                                <img id="blah" src="../images/logo/centerlogo/<?php //echo $result['centerlogo'];?>" alt="your Logo" height="100" />
                            </div>
                        </div> -->
                        <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="validate[required,custom[email]]" name="email" value="<?php echo $tampilProfile->EMAIL;?>"/>
                                </div>
                        </div>              
                       <!--  <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" class="validate[required]" name="password" value="<?php echo $tampilProfile->PASSWORD;?>"/>
                            </div>
                        </div> -->
                       
                        <div class="control-group">
                          <label class="control-label"></label>
                          <div class="controls" style="width:210px;">                                   
                           <i class="icon-user icon-5x" style="color:#34495E;"></i>                 
                          </div>
                        </div>                    
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Ubah Profil </button>
                            <input type="hidden" value="Update_setting" name="submit">
                            <input type="hidden" value="<?php //echo $_SESSION['center_id'];?>" name="c_id">
                        </div>
                    </form>                
                </div>                
              </div>                  
              </div>
            </div>
      </div>
</div>       


        <script>
         
         $("#editProfile").on("show.bs.modal", function(e) {
          var button = $(e.relatedTarget); // Button that triggered the modal
          var id = button.data('id');
          var nama = button.data('nama');         
          var no_tlp = button.data('no_tlp');
          var email = button.data('email');
          var image = button.data('image');
          $('input[name="id"]').val(id);
          $('input[name="nama"]').val(nama);
         
          $('input[name="no_tlp"]').val(no_tlp);
          $('input[name="email"]').val(email);
          $('img#imageProfile').attr('src', image);
        });

       </script>
