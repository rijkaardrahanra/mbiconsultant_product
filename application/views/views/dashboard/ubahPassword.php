<script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ubah Password<div class="visible-xs-inline"><br/></div></h2>
                    <ul class="nav navbar-right panel_toolbox">
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
                    <form action="#" method="post" data-toggle="validator" role="form" id="form-menu" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                            <label>Password Lama</label>
                            <input type="Password" class="form-control" name="password_lama" />
                          </div>

                          <div class="form-group ">
                            <label>Password Baru</label>
                            <input type="Password" class="form-control" name="password_baru" />
                          </div>

                          <div class="form-group">
                            <label>Password Baru sekali lagi</label>
                            <input type="Password" class="form-control" name="password_verifikasi" />
                          </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->
      </script>