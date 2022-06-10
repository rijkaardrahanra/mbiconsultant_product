<script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile<div class="visible-xs-inline"><br/></div></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="button" class="btn btn-primary" 
                        data-toggle="modal" 
                        data-target="#editProfile"
                        data-id="<?php echo $tampilProfile->USR_USER_ID; ?>" 
                        data-nama="<?php echo $tampilProfile->NAMA; ?>"                        
                        data-no_tlp="<?php echo $tampilProfile->PHONE; ?>" 
                        data-email="<?php echo $tampilProfile->EMAIL; ?>" 
                        
                        >Edit Profile</button>
                      </li>

                      <!--  data-image="<?php// echo base_url('asset_admin/images/profile/'.$tampilProfile->image) ?>" -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div>
                    <?php if($this->session->flashdata('message')){?>
                    <div class="alert bg-success" role="alert">'
                    '<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
                    <?php echo $this->session->flashdata('message')?>
                    </div><?php } ?>

                    <?php if($this->session->flashdata('warning')){?>
                    <div class="alert bg-warning" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-checkmark"></use></svg>
                    <?php echo $this->session->flashdata('warning')?>
                    </div><?php } ?>

                    <?php if($this->session->flashdata('error')){?>
                    <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                    <?php echo $this->session->flashdata('error')?>
                    </div><?php } ?>
                  </div>
                  <div class="x_content">
                    
                    <div class="container">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                
                          <div class="panel panel-info">
                            <div class="panel-heading">
                              <h3 class="panel-title"><?php echo $tampilProfile->NAMA; ?></h3>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md-3 col-lg-3 " align="center"> <img alt="Profile Pictures" src="<?php //echo base_url('asset_admin/images/profile/'.$tampilProfile->image) ?>" class="img-circle img-responsive"> </div>
                                
                                <div class=" col-md-9 col-lg-9 "> 
                                  <table class="table table-user-information">
                                    <tbody>
                                     
                                      <tr>
                                        <td>No. Telepon:</td>
                                        <td><?php echo $tampilProfile->PHONE; ?></td>
                                      </tr>
                                      <tr>
                                        <td>email:</td>
                                        <td><?php echo $tampilProfile->EMAIL; ?></td>
                                      </tr>                                         
                                      <tr>
                                        <td></td>
                                        <td></td>
                                      </tr>
                                        <tr>
                                        <td>Username</td>
                                        <td><?php echo $tampilProfile->USERNAME; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Password</td>
                                        <td>********** <?php echo $this->session->userdata('id'); ?></td>
                                      </tr>
                                        
                                        </td>
                                           
                                      </tr>
                                     
                                    </tbody>
                                  </table>
                                  
                                </div>
                              </div>
                            </div>
                    
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="editProfile" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" styles="overflow:hidden">
          <div class="modal-dialog modal-lg">
          <form action="<?php echo base_url('Dashboard/editProfile') ?>" method="post" data-toggle="validator" role="form" id="form-menu" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            </div>
            <div class="modal-body">
              <div class="row">

                <div class="form-group">
                  <label>Nama </label>
                  <input type="text" class="form-control" name="nama" />
                </div>               

                <div class="form-group col-md-6">
                  <label>No. Telepon Instansi</label>
                  <input type="text" class="form-control" name="no_tlp" />
                </div>

                <div class="form-group col-md-6">
                  <label>Email Instansi</label>
                  <input type="text" class="form-control" name="email" />
                </div>

                <div class="form-group">
                    <label>Upload Image</label>
                     <input type="file" name="filefoto" />
                      <p>gambar lama :</p>
                      <img src="" id="imageProfile" alt="Profile Pictures">
                    </div>

              </div>
            </div>
              <div class="modal-footer">
                <input type="hidden" name="id">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div> 
          </form>
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
