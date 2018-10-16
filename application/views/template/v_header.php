<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
  <title>
    TA
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="<?php echo base_url(); ?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet" />

  <!-- table -->

  <!-- end table -->

</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini"  style="color: #000000;">
            @
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal" style="color: #000000;">
            <?php echo $this->session->userdata('nama_lengkap');?>
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="<?php echo base_url(); ?>dashboard">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url();?>nogl">
              <i class="tim-icons icon-pencil"></i>
              <p>Input GL</p>
            </a>
          </li>

            <li>
            <a href="<?php echo base_url();?>kas">
              <i class="tim-icons icon-pencil"></i>
              <p>KAS</p>
            </a>
          </li>

    <!--      <li>
            <a href="#kas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="tim-icons icon-money-coins"></i>
            <p>Kas</p></a>
            <ul class="collapse list-unstyled" id="kas">
              <li>
                  <a href="<?php echo base_url();?>kas"><p>Add Kas</p></a>
              </li>
              <li>
                  <a href="<?php echo base_url();?>laba"><p>Laba Rugi</p></a>
              </li>
              <li>
                  <a href="#"><p>Laba Neraca</p></a>
              </li>
                 <li>
                  <a href="#"><p>SHU</p></a>
              </li>
                 <li>
                  <a href="#"><p>SHU By Member</p></a>
              </li>
            </ul>
          </li> -->

          <li>
            <a href="#member" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="tim-icons icon-badge"></i>
            <p>Member</p></a>
            <ul class="collapse list-unstyled" id="member">
              <li>
                  <a href="<?php echo base_url();?>member">Member</a>
              </li>
                <li>
                  <a href="<?php echo base_url();?>membersewa">Member Sewa</a>
              </li>
              <li>
                  <a href="<?php echo base_url();?>simpanan">Simpanan Perdana</a>
              </li>
            
            </ul>
          </li>

           <li>
            <a href="#transaksi" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="tim-icons icon-credit-card"></i>
            <p>Transaksi</p></a>
            <ul class="collapse list-unstyled" id="transaksi">
              <li>
                  <a href="<?php echo base_url();?>pinjaman">Input Pinjaman</a>
              </li>
              <li>
                  <a href="<?php echo base_url();?>simpananperdana">Input Simpanan</a>
              </li>
               <li>
                  <a href="<?php echo base_url();?>angsuran">Bayar Angsuran</a>
              </li>
               <li>
                  <a href="<?php echo base_url();?>pinjaman">Input Invoice</a>
              </li>
               <li>
                  <a href="<?php echo base_url();?>pinjaman">Input Pendapatan</a>
              </li>
               <li>
                  <a href="<?php echo base_url();?>Pengeluaran">Input Pengeluaran</a>
              </li>
               <li>
                  <a href="<?php echo base_url();?>pinjaman">Input Pinjaman</a>
              </li>
               <li>
                  <a href="<?php echo base_url();?>pinjaman">Pengeluaran Simpanan</a>
              </li>
               <li>
                  <a href="<?php echo base_url();?>pembelian">Pembelian Aset</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="<?php echo base_url(); ?>tagihan">
              <i class="tim-icons icon-bullet-list-67"></i>
              <p>Tagihan</p>
            </a>
          </li>

           <li>
            <a href="./dashboard.html">
              <i class="tim-icons icon-bullet-list-67"></i>
              <p>Outstanding</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)"><!-- Koperasi Taman Anggrek --></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="notification d-none d-lg-block d-xl-block"></div>
                  <i class="tim-icons icon-sound-wave"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <li class="nav-link">
                    <a href="#" class="nav-item dropdown-item">Mike John responded to your email</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more tasks</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is in town</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="../assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link">
                    <a href="Signin/logout" class="nav-item dropdown-item">Log out</a>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>