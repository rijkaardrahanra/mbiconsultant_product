<?php
//print_r($login['menuprogramkerja']);die();
defined('BASEPATH') OR exit('No direct script access allowed');

$sessions = $this->session->userdata('logged_in')['result'];

if(strtolower($sessions->PERAN)=='siswa'){
  $session_has_siswa = $this->session->userdata('logged_in')['has_siswa'];
  $sessions_hasklien = $this->session->userdata('logged_in')['has_klien'];
}
$theme_client_id=$sessions->USR_USER_ID;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="description" content="CBT Online" />
  <meta name="keywords" content="Computer Based Test (CBT)" />

  <title>Computer Based Test (CBT)</title>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/css/adminfont.css" />
  <link href="<?php echo base_url(); ?>admin/css/admin.css" media="screen" rel="stylesheet" type="text/css" />

  <script src="<?php echo base_url(); ?>js/textusintentio.js" type="text/javascript"></script>
  <?php if(strtolower($sessions->PERAN)=='klien'){ 
    $theme_client_id=$sessions->USR_USER_ID;
    $theme_data=$this->db->query("SELECT * from usr_theme ut 
                               inner join theme t on t.id=ut.theme_id
                               where ut.client_id='".$theme_client_id."'
                    ")->row();
    echo $theme_data->value;
    }else if(strtolower($sessions->PERAN)=='siswa'){ 
    $theme_client_id=$sessions_hasklien->USR_USER_ID;
    $theme_data=$this->db->query("SELECT * from usr_theme ut 
                               inner join theme t on t.id=ut.theme_id
                               where ut.client_id='".$theme_client_id."'
                    ")->row();
    echo $theme_data->value;
    }
    ?>



</head>
<body>
<!-- Start Div Main Body -->
<div id="main_body">
  <!-- Start Navbar -->
  <div class="navbar navbar-top navbar-inverse">
    <div class="navbar-inner">
      <div class="container-fluid">
        <a class="brand" href="#">Computer Based Test (CBT)</a>
        <!-- the new toggle buttons -->
        <ul class="nav pull-right">
          <li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>
          <li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>
        </ul>
        <div class="nav-collapse nav-collapse-top collapse">
          <ul class="nav pull-right">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user "></i>&nbsp;<?php  echo $sessions->NAMA;?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="with-image">
                  <div class="avatar">
                    
                    <div class="it_circle">
                     <i class="icon-user icon-5x" style="color:#34495E;"></i>
                     </div>
                  </div>
                  <span>&nbsp;<?php echo $sessions->NAMA;?></span>
                   <?php if(strtolower($sessions->PERAN)=='siswa'){
          ?>
                  <span>&nbsp;Kelas <?php echo $session_has_siswa->KELAS;?></span>
                  <?php } ?>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?php echo base_url(); ?>dashboard/profile">
                    <i class="icon-user"></i>
                    <span>Profil</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>dashboard/ubahPassword">
                    <i class="icon-lock"></i>
                    <span>Ganti Password</span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>Welcome/Logout">
                    <i class="icon-off"></i>
                    <span>Logout</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <!-- Start Panel Bagi Siswa -->
          <?php if(strtolower($sessions->PERAN)=='siswa'){
          ?>
          <ul class="nav pull-right">
            <li class="dropdown"><a href="#" ><i class="icon-building"></i> Penyelenggara : <?php echo strtoupper($sessions_hasklien->NAMA);?> </a></li>
          </ul>
          <?php } ?>
          <!-- End Panel Bagi Siswa -->
          <ul class="nav pull-right">
            <li class="dropdown">
            <a href="#" ><i class="icon-desktop "></i> Halaman <?php echo CapitalizeEachWord($sessions->PERAN);?> </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Navbar -->
  <!-- Start Sidebar Background -->
  <div class="sidebar-background">
    <div class="primary-sidebar-background">
    </div>
  </div>
  <!-- End Sidebar Background -->
  <!-- Start Primary Sidebar -->
  <div class="primary-sidebar">
    <br />
    <div style="text-align:center;">
      <a href="#"><img src="<?php echo base_url(); ?>images/logo/your school.png"  style="max-height:100px; max-width:100px;"/></a>
    </div>
    <br />
    <ul class="nav nav-collapse collapse nav-collapse-primary">
      <li class="dark-nav <?php if($this->uri->segment(1)=='Dashboard'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a href="<?php echo base_url('Dashboard/index');?>" rel="tooltip" data-placement="right" data-original-title="Dashboard">
          <i class="icon-desktop icon-1x"></i>
          <span>Dashboard </span>
        </a>
      </li>

      <?php
      if(strtolower($sessions->PERAN)=='siswa'){ ?>
       <!-- <li class="dark-nav <?php if($this->uri->segment(1)=='DataUjian'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a href="<?php echo base_url('DataUjian/siswa_history_ujian');?>" rel="tooltip" data-placement="right" data-original-title="Ujian">
          <i class="icon-trophy icon-1x"></i>
          <span>History Ujian </span>
        </a>
      </li>  -->
      <?php
      }
      if(strtolower($sessions->PERAN)=='admin' || strtolower($sessions->PERAN)=='klien'){ ?>
      <li class="dark-nav <?php if($this->uri->segment(1)=='master'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a class="accordion-toggle  " data-toggle="collapse" href="#submenu_datamaster" rel="tooltip" data-placement="right" data-original-title="Data Master">
          <i class="icon-folder-close icon-1x"></i>
          <span>Manage Master <i class="icon-caret-down"></i></span>
        </a>
        <ul id="submenu_datamaster" class="collapse <?php if($this->uri->segment(1)=='master'){ echo 'in';} ?>">
        
          <li class="<?php if($this->uri->segment(2) == "jenjang"){ echo 'active';} ?>">
            <a href="<?php echo base_url('master/jenjang/index');?>"><i class="icon-tasks"></i>&nbsp;Jenjang</a>
          </li>
          <li class="<?php if($this->uri->segment(2)=='kelas'){ echo 'active';} ?>">
            <a href="<?php echo base_url('master/kelas/index');?>"><i class="icon-tasks"></i>&nbsp;Kelas</a>
          </li>
          <li class="<?php if($this->uri->segment(2)=='program'){ echo 'active';} ?>">
            <a href="<?php echo base_url('master/program/index');?>"><i class="icon-tasks"></i>&nbsp;Program</a>
          </li>
          <li class="<?php if($this->uri->segment(2)=='mapel'){ echo 'active';} ?>">
            <a href="<?php echo base_url('master/mapel/index');?>"><i class="icon-tasks"></i>&nbsp;Mapel</a>
          </li>
          <li class="<?php if($this->uri->segment(2)=='bab'){ echo 'active';} ?>">
            <a href="<?php echo base_url('master/bab/index');?>"><i class="icon-tasks"></i>&nbsp;Bab</a>
          </li>
          <?php if(strtolower($sessions->PERAN)=='klien'){ ?>
          <li class="<?php if($this->uri->segment(2)=='siswa'){ echo 'active';} ?>">
            <a href="<?php echo base_url('master/siswa/index');?>"><i class="icon-tasks"></i>&nbsp;Siswa</a>
          </li>
          <?php } ?>
        </ul>
      </li>
      <?php
      }
      if(strtolower($sessions->PERAN)=='admin' || strtolower($sessions->PERAN)=='klien'){ ?>
      <li class="dark-nav <?php if($this->uri->segment(1)=='DataManMapel'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a href="<?php echo base_url('DataManMapel/index');?>" rel="tooltip" data-placement="right" data-original-title="Mata Pelajaran">
          <i class="icon-tag icon-1x"></i>
          <span>Manage Mata Pelajaran </span>
        </a>
      </li>
      <?php
      }
      if(strtolower($sessions->PERAN)=='admin'){ ?>
      <li class="dark-nav <?php if($this->uri->segment(1)=='DataKlien'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a href="<?php echo base_url('DataKlien/index');?>" rel="tooltip" data-placement="right" data-original-title="Klien">
          <i class="icon-building icon-1x"></i>
          <span>Klien </span>
        </a>
      </li>
      <?php
      }
      if(strtolower($sessions->PERAN)=='admin'){ ?>
      <li class="dark-nav <?php if($this->uri->segment(1)=='DataBankSoal'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a href="<?php echo base_url('DataBankSoal/index');?>" rel="tooltip" data-placement="right" data-original-title="Bank Soal">
          <i class="icon-building icon-1x"></i>
          <span>Data Bank Soal </span>
        </a>
      </li>
      <?php
      }
      if(strtolower($sessions->PERAN)=='klien' && count($this->session->userdata('logged_in')['menu_ujian'])>0){ ?>
      <li class="dark-nav <?php if($this->uri->segment(1)=='DetailPaketUjian'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a class="accordion-toggle  " data-toggle="collapse" href="#submenu_paketujian" rel="tooltip" data-placement="right" data-original-title="Detail Ujian">
          <i class="icon-pencil icon-1x"></i>
          <span>Paket Ujian <i class="icon-caret-down"></i></span>
        </a>
        <ul id="submenu_paketujian" class="collapse <?php if($this->uri->segment(1)=='DetailPaketUjian'){ echo 'in';} ?>">
        <?php foreach($this->session->userdata('logged_in')['menu_ujian'] as $ujian){ ?>
          <li class="<?php if($this->uri->segment(3)==md5($ujian->PKTU_PAKETUJIAN_ID)){ echo 'active';} ?>">
            <a href="<?php echo base_url('DetailPaketUjian/tampil').'/'.md5($ujian->PKTU_PAKETUJIAN_ID);?>"><i class="icon-tasks"></i>&nbsp;<?php echo $ujian->NAMA_UJIAN;?></a>
          </li>
        <?php
          }
        ?>
        </ul>
      </li>

      <!-- <li class="dark-nav <?php if($this->uri->segment(1)=='DetailHasilUjian'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a class="accordion-toggle  " data-toggle="collapse" href="#submenu_hasilujian" rel="tooltip" data-placement="right" data-original-title="Hasil Ujian">
          <i class="icon-pencil icon-1x"></i>
          <span>Hasil Ujian <i class="icon-caret-down"></i></span>
        </a>
        <ul id="submenu_hasilujian" class="collapse <?php if($this->uri->segment(1)=='DetailHasilUjian'){ echo 'in';} ?>">
        <?php foreach($this->session->userdata('logged_in')['menu_ujian'] as $ujian){ ?>
          <li class="<?php if($this->uri->segment(3)==md5($ujian->PKTU_PAKETUJIAN_ID)){ echo 'active';} ?>">
            <a href="<?php echo base_url('DetailPaketUjian/tampil').'/'.md5($ujian->PKTU_PAKETUJIAN_ID);?>"><i class="icon-tasks"></i>&nbsp;<?php echo $ujian->NAMA_UJIAN;?></a>
          </li>
        <?php
          }
        ?>
        </ul>
      </li> -->

     

      
      <?php
      }
      ?>
       <?php
      if(strtolower($sessions->PERAN)=='klien'){
        ?>
       <li class="dark-nav <?php if($this->uri->segment(1)=='Hasiltes'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a href="<?php echo base_url('Hasiltes/index');?>" rel="tooltip" data-placement="right" data-original-title="Hasil Ujian">
          <i class="icon-list icon-1x"></i>
          <span>Hasil Ujian </span>
        </a>
      </li>
      <?php
      }
      ?>

      <?php
      if(strtolower($sessions->PERAN)=='klien'){
        ?>
      <li class="dark-nav <?php if($this->uri->segment(1)=='Theme'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a href="<?php echo base_url('Theme/index');?>" rel="tooltip" data-placement="right" data-original-title="Theme">
          <i class="icon-cogs icon-1x"></i>
          <span>Pengaturan Theme </span>
        </a>
      </li>
      <li class="dark-nav <?php if($this->uri->segment(1)=='ResetUjian'){ echo 'active';} ?>">
        <span class="glow"></span>
        <a href="<?php echo base_url('ResetUjian/index');?>" rel="tooltip" data-placement="right" data-original-title="Reset Ujian">
          <i class="icon-refresh icon-1x"></i>
          <span>Reset Ujian Siswa </span>
        </a>
      </li>
      <?php
      }
      ?>
    </ul>
  </div>
  <!-- End Primary Sidebar -->


 