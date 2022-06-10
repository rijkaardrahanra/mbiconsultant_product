<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>MBI Consultant</title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="MBI Consultant" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- Meta tag Keywords -->
    
  <!-- css files -->
  <link href="<?php echo base_url(); ?>assetsportal/css/style.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo base_url(); ?>assetsportal/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo base_url(); ?>assetsportal/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
  <!-- //css files -->
  <!-- online-fonts -->
  <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&subset=latin-ext,vietnamese" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900iSource+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
  <!-- js -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assetsportal/js/jquery-2.1.4.min.js"></script>
  <!-- //js -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assetsportal/js/bootstrap-3.1.1.min.js"></script>

  <script src="<?php echo base_url(); ?>assetsportal/js/jquery.chocolat.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetsportal/css/chocolat.css" type="text/css" media="screen">
  <!--light-box-files -->
  <script>
    $(function() {
      $('.gallery-grid a').Chocolat();
    });
  </script>
  <!-- //js -->
  <script src="<?php echo base_url(); ?>assetsportal/js/responsiveslides.min.js"></script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: true,
        pager:false,
        nav: true,
        speed: 1000,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });
    });
  </script>
  <!-- start-smoth-scrolling -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assetsportal/js/move-top.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assetsportal/js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event){   
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
      });
    });
  </script>
  <!-- start-smoth-scrolling -->

  <style type="text/css">
    .container24 {
      display: flex;
      flex-wrap: wrap;
      flex-direction: row;
      justify-content: center;
      padding: 0 30px;
    }
    .container24 .thumbex {
      margin: 10px 20px 30px;
      width: 100%;
      min-width: 250px;
      max-width: 435px;
      height: 200px;
      -webkit-flex: 1;
      -ms-flex: 1;
      flex: 1;
      overflow: hidden;
      /*outline: 2px solid white;*/
      outline-offset: -15px;
      background-color: blue;
      box-shadow: 5px 10px 40px 5px rgba(0, 0, 0, 0.5);
    }
    .container24 .thumbex .thumbnail {
      overflow: hidden;
      min-width: 250px;
      height: 200px;
      position: relative;
      opacity: 0.88;
      backface-visibility: hidden;
      transition: all 0.4s ease-out;
    }
    .container24 .thumbex .thumbnail img {
      position: absolute;
      z-index: 1;
      left: 50%;
      top: 30%;
      height: 150%;
      width: auto;
      transform: translate(-50%, -50%);
      backface-visibility: hidden;
    }
    .container24 .thumbex .thumbnail span {
      position: absolute;
      z-index: 2;
      top: calc(150px - 20px);
      left: 0;
      right: 0;
      background: rgba(0, 0, 0, 0.7);
      padding: 10px 50px;
      margin: 0 45px;
      text-align: center;
      font-size: 24px;
      color: white;
      font-weight: 300;
      font-family: "Raleway", sans-serif;
      letter-spacing: 0.2px;
      transition: all 0.3s ease-out;
    }
    .container24 .thumbex .thumbnail:hover {
      backface-visibility: hidden;
      transform: scale(1.15, 1.15);
      opacity: 1;
    }
    .container24 .thumbex .thumbnail:hover span {
      opacity: 0;
    }
  </style>
</head>
<body>
<!--main-content-->
<div class="agile-main" id="about">
  <!-- opening -->
  <div class="agile-open">
    <div class="open-head">
      <!--  <h6>MBI CONSULTANT</h6>
      <p>“Computer Base Test  By MBI Consutltant.” </p> -->
      <h6>COMPUTER BASE TEST</h6>
      <p>“Test in a new way.” </p>
    </div>
    <!-- Countdown-timer -->
    <div class="examples">
      <div class="">
        <div class="container">
          <h2 class="animation-box wow bounceIn animated"></h2>
          <div class="virticle-line"></div>
          <div class="container24">
            <div class="thumbex">
              <div class="thumbnail"><a href="<?php echo base_url(); ?>Welcome/siswa"> <img src="<?php echo base_url(); ?>assetsportal/images/student.jpg"/><span>Siswa</span></a></div>
            </div>
            <div class="thumbex">    
              <div class="thumbnail"><a href="<?php echo base_url(); ?>Welcome/klien"><img src="<?php echo base_url(); ?>assetsportal/images/institute.jpg"/><span>Klien</span></a></div>
            </div>
            <div class="thumbex">
              <div class="thumbnail"><a href="<?php echo base_url(); ?>Welcome/admin"><img src="<?php echo base_url(); ?>assetsportal/images/admin.jpg" /><span>Administrator</span></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <script src="<?php echo base_url(); ?>js/simplyCountdown.js"></script>
    <script>
      var d = new Date(new Date().getTime() + 48 * 120 * 120 * 2000);
      // default example
      simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
      });
      // inline example
      simplyCountdown('.simply-countdown-inline', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        inline: true
      });
      //jQuery example
      $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
      });
    </script>
    <!-- //Countdown-Timer-JavaScript -->
    <!-- //Custom-JavaScript-File-Links -->
  </div>
  <!--footer-->
  <div class="w3l-footer">
    <div class="container">
      <div class="left-w3">
        <!-- <a href="#">mbi consultant</a> -->
        <a href="#">COMPUTER BASE TEST</a>
      </div>
      <div class="right-social">
        <i class="fa fa-facebook-square" aria-hidden="true"></i>
        <i class="fa fa-twitter-square" aria-hidden="true"></i>
        <i class="fa fa-google-plus-square" aria-hidden="true"></i>
      </div>
      <div class="clearfix"></div>
      <div class="copyright-agile">
        <p>&copy; 2018 Computer Based Test (CBT)
        <a href="http://mbiconsultant.com">www.mbiconsultant.com</a></p>
      </div>
    </div>
  </div>
  <!--//footer-->

  <!-- smooth scrolling -->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#bstudent").click(function(){
        $("#bstudent").attr("href", "https://www.w3schools.com/jquery");
      });
    });
    $(document).ready(function() {
  /*
  var defaults = {
  containerID: 'toTop', // fading element id
  containerHoverID: 'toTopHover', // fading element hover id
  scrollSpeed: 1200,
  easingType: 'linear' 
  };
  */                
  $().UItoTop({ easingType: 'easeOutQuart' });
  });
  </script>
  <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
  <!-- //smooth scrolling -->
  </div>
</body>
</html>