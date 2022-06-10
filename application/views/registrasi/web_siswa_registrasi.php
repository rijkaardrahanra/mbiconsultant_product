  <style type="text/css">
  .wrap-login100 {
    width: 460px;
    padding: 30px 10px 25px 87px;
  }  
  </style>
  
  <div class="container-login100">
    <div class="wrap-login100">
      
      <form action="<?php echo base_url(); ?>Registrasi/submitRegistrasi" method="post" class="login100-form validate-form">
        <span class="login100-form-title">
          Registrasi Siswa
        </span>
<input class="input100" type="hidden" name="token" value="<?php echo $token ?>">
        
        <div class="wrap-input100 validate-input" data-validate = "Nama is required">
          <input class="input100" type="text" name="nama" placeholder="Nama" >
          <span class="focus-input100"></span>
          <span class="symbol-input100"><i class="fa fa-user" aria-hidden="true"></i></span>
        </div>

        <!-- <div class="wrap-input100 validate-input">
                  
                    <label class="control-label">Kelas</label>
                    <div class="controls">
                      <select name="kelas" id="kelas" class="chzn-select">
                        <option value="">Pilih Kelas</option>
                        <?php foreach ($kelass as $kelas) { echo '<option class="hide" value="'.$kelas->KLS_KELAS_ID.'" data-jenjang="'.$kelas->JNJG_JENJANG_ID.'">'.$kelas->KELAS.'</option>'; } ?>
                      </select>
                    </div>
                  
                </div> -->


        <div class="wrap-input100 validate-input" data-validate = "Username is required">
          <select class="input100" type="text" name="kelas" placeholder="kelas">
            <option value="">Pilih Kelas</option>
                        <?php foreach ($kelass as $kelas) { echo '<option class="hide" value="'.$kelas->KLS_KELAS_ID.'" data-jenjang="'.$kelas->JNJG_JENJANG_ID.'">'.$kelas->KELAS.'</option>'; } ?>

         
          </select>
        </div>
         <div class="wrap-input100 validate-input" data-validate = "Username is required">
          <input class="input100" type="text" name="username" placeholder="Username">
          <span class="focus-input100"></span>
          <span class="symbol-input100"><i class="fa fa-user" aria-hidden="true"></i></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <input class="input100" type="email" name="email" placeholder="Email">
          <span class="focus-input100"></span>
          <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        </div>

         <div class="wrap-input100 validate-input" data-validate = "Username is required">
          <input class="input100" type="text" name="alamat" placeholder="Alamat">
          <span class="focus-input100"></span>
          <span class="symbol-input100"><i class="fa fa-home" aria-hidden="true"></i></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "telepon is required">
          <input class="input100" type="text" name="telepon" placeholder="Telepon">
          <span class="focus-input100"></span>
          <span class="symbol-input100"><i class="fa fa-phone" aria-hidden="true"></i></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Password is required">
          <input class="input100" type="password" name="password" placeholder="Ulangi Password">
          <span class="focus-input100"></span>
          <span class="symbol-input100"><i class="fa fa-lock" aria-hidden="true"></i></span>
        </div>

        <div class="container-login100-form-btn">
          <input type="hidden" name="login_type" value="student" />
          <input type="button" id="addSiswa" class="login100-form-btn "  value="Registrasi"/>
         <!--  <input type="submit"  class="login100-form-btn "  value="Registrasi"/> -->
        </div>

         
      </form>
    </div>
  </div>



  


