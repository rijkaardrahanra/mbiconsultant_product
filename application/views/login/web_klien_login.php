  <div class="container-login100">
    <div class="wrap-login100">
      <div class="login100-pic js-tilt" data-tilt>
        <img src="<?php echo base_url(); ?>assetslogin/images/img-01.png" alt="IMG">
      </div>
      <form action="<?php echo base_url(); ?>Welcome/loginKlien" method="post" class="login100-form validate-form">
        <span class="login100-form-title">
          Login Klien
        </span>
        <!-- <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <input class="input100" type="email" name="email" placeholder="Email"> -->
        <div class="wrap-input100 validate-input">
          <input class="input100" type="text" name="username" placeholder="Username">
          <span class="focus-input100"></span>
          <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate = "Password is required">
          <input class="input100" type="password" name="password" placeholder="Password">
          <span class="focus-input100"></span>
          <span class="symbol-input100"><i class="fa fa-lock" aria-hidden="true"></i></span>
        </div>
        <div class="container-login100-form-btn">
          <input type="hidden" name="login_type" value="student" />
          <input type="submit" class="login100-form-btn "  value="login"/>
        </div>
        <div class="text-center p-t-12">
          <!-- <a  data-toggle="modal" href="#modal-simple"  class="txt2 btn btn-blue btn-block" >Lupa Password?</a> -->
          <!-- Modal -->
          <div class="modal fade" id="modal-simple" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lupa Password</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="forgetpassword_mail.php" method="post" accept-charset="utf-8">               
                    <div class="wrap-input100 " >
                      <input class="input100" type="text" name="emailforgot" placeholder="Email">
                      <span class="focus-input100"></span>
                      <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                      </span>
                    </div>
                    <input type="submit" value="Send Mail"  class="btn btn-blue btn-medium"/>
                  </form>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
