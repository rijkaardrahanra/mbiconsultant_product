<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
if( ! isset($CI))
{
    $CI = new CI_Controller();
}
$CI->load->helper('url');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">

        <!-- App title -->
        <title>Uplon - Responsive Admin Dashboard Template</title>

        <!-- Bootstrap CSS -->
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?= base_url('assets/js/modernizr.min.js') ?>"></script>

    </head>


    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">

        	<div class="ex-page-content text-center">
                <div class="text-error">4<span class="ion-sad"></span>4</div>
                <h3 class="text-uppercase text-white font-600">Page not Found</h3>
                <p class="text-white m-t-30">
                    It's looking like you may have taken a wrong turn. Don't worry... it happens to
                    the best of us. You might want to check your internet connection. Here's a little tip that might
                    help you get back on track.
                </p>
                <br>
                <a class="btn btn-pink waves-effect waves-light" href="<?= base_url('Dashboard')?>"> Return Home</a>

            </div>


        </div>
        <!-- end wrapper page -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/tether.min.js') ?>"></script><!-- Tether for Bootstrap -->
        <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/detect.js') ?>"></script>
        <script src="<?= base_url('assets/js/waves.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.nicescroll.js') ?>"></script>
        <script src="<?= base_url('assets/plugins/switchery/switchery.min.js') ?>"></script>

        <!-- App js -->
        <script src="<?= base_url('assets/js/jquery.core.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.app.js') ?>"></script>

    </body>
</html>