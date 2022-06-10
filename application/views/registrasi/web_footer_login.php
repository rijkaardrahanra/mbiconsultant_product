</div>
<!--===============================================================================================-->  
<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assetslogin/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url(); ?>assetslogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assetslogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assetslogin/vendor/tilt/tilt.jquery.min.js"></script>
<script >
  $('.js-tilt').tilt({
    scale: 1.1
  })
</script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>


 <script type="text/javascript">
    var e = jQuery;
    $(document).on('change', '#prov_id', function(e){
    e.preventDefault();
    var valProv = $(this).val();
    $('#kabkot_id').find('option').addClass('hide');
    $('#kabkot_id').find('option:first').removeClass('hide');
    $('#kabkot_id').find('option').filter(function () { return $(this).data('prov') == valProv; }).removeClass('hide');
    $("#kabkot_id").val($("#kabkot_id option:first").val());
    $("#kec_id").val($("#kec_id option:first").val());
    $("#kel_id").val($("#kel_id option:first").val());
    
    $.ajax({
    url: "<?php echo site_url('DataKlien/getKecamatanByProvinsi'); ?>",
    type: "POST",
    cache: false,
    data: {idprov: valProv},
    dataType:'json',
    success: function(json){
      $("#kec_id").append(json.data);
      $('#kec_id').find('option').addClass('hide');
      $('#kec_id').find('option:first').removeClass('hide');
    },
    error: function(){
      /*console.log('Error');
      alert('Error');*/
    }
    });
});

$(document).on('change', '#kabkot_id', function(e){
    e.preventDefault();
    var valKabKot = $(this).val();
    $("#kel_id").find('option').remove();
    $('#kec_id').find('option').addClass('hide');
    $('#kec_id').find('option:first').removeClass('hide');
    $('#kec_id').find('option').filter(function () { return $(this).data('kabkot') == valKabKot; }).removeClass('hide');
    $("#kec_id").val($("#kec_id option:first").val());
    $("#kel_id").val($("#kel_id option:first").val());
    
    $.ajax({
    url: "<?php echo site_url('DataKlien/getKelurahanByKabKot'); ?>",
    type: "POST",
    cache: false,
    data: {idkabkot: valKabKot},
    dataType:'json',
    success: function(json){
      $("#kel_id").append(json.data);
      $('#kel_id').find('option').addClass('hide');
      $('#kel_id').find('option:first').removeClass('hide');
    },
    error: function(){
      console.log('Error');
      alert('Error');
    }
    });
});

$(document).on('change', '#kec_id', function(e){
    e.preventDefault();
    var valKabKot = $(this).val();
    $('#kel_id').find('option').addClass('hide');
    $('#kel_id').find('option:first').removeClass('hide');
    $('#kel_id').find('option').filter(function () { return $(this).data('kec') == valKabKot; }).removeClass('hide');
    $("#kel_id").val($("#kel_id option:first").val());
});




    $(document).on('click', '#addSiswa', function(e){
    e.preventDefault();
    $.ajax({
    url: "<?php echo site_url('Registrasi/submitRegistrasi'); ?>",
    type: "POST",
    cache: false,
    data: $('#formKlien').serialize(),
    dataType:'json',
    success: function(json){
      console.log(json);
      if (json.status==1) {
        alert(json.pesan);
        window.location.replace("<?php echo site_url('Welcome/siswa'); ?>");
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
</body>
</html>