<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
      <link rel="icon" href="<?php echo base_url(); ?>/assets/fav_icon.png" type="image/gif" sizes="32x32">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/wave/waves.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/notification/notification.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/dialog/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/dialog/dialog.css">

    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/responsive.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/datapicker/datepicker3.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-select/bootstrap-select.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/additional-methods.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-select/bootstrap-select.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
</head>

<body>
  <div class="header-top-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="logo-area">
                      <a href="#"><img src="<?php echo base_url(); ?>assets/admin/img/logo/logo.png" alt="" class="logo_admin"/></a>
                  </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <div class="header-top-menu">
                      <ul class="nav navbar-nav notika-top-nav">



                          <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span></a>
                              <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">


                                  <div class="hd-mg-va">
                                      <a href="<?php echo base_url(); ?>logout">Logout</a>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>

      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                      <li id="dashboard" ><a  href="<?php echo base_url(); ?>dashboard/home"><i class="fa fa-th-large" aria-hidden="true"></i> Dashboard</a></li>
                      <li id="masters"><a data-toggle="tab" href="#mastersmenu"><i class="fa fa-sitemap" aria-hidden="true"></i> Masters</a>
                      </li>
                      <li id="prospects"><a data-toggle="tab" href="#prospectsmenu"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
Prospects</a>
                      </li>
                      <li id="staff"><a data-toggle="tab" href="#staffmenu"><i class="fa fa-users" aria-hidden="true"></i> Staff</a>
                      </li>
                      <li id="task"><a data-toggle="tab" href="#taskmenu"><i class="fa fa-file-text-o" aria-hidden="true"></i> Task</a>
                      </li>
                      <li id="tracking"><a data-toggle="tab" href="#trackingmenu"><i class="fa fa-map" aria-hidden="true"></i> Tracking</a>
                      </li>
                      <li id="mobilization_plan"><a data-toggle="tab" href="#mobilization_planmenu"><i class="fa fa-file" aria-hidden="true"></i> Mobilization Plan</a>
                      </li>
                      <li  id="graph"><a data-toggle="tab" href="#graphmenu"><i class="fa fa-bar-chart" aria-hidden="true"></i> Graph</a>
                      </li>
                      <li id="profile"><a  data-toggle="tab" href="#profilemenu"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                      </li>
                  </ul>
                  <div class="tab-content custom-menu-content">
                      <div id="mastersmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?php echo base_url(); ?>years/config">Period Plan</a>
                              </li>
                              <li><a href="<?php echo base_url(); ?>centers">Centers</a>
                              </li>
                              <li><a href="<?php echo base_url(); ?>scheme">Schemes</a>
                              </li>
                              <!-- <li><a href="">Sessions</a>
                              </li> -->
                              <li><a href="<?php echo base_url(); ?>trade/home">Trade </a>
                              </li>
                          </ul>
                      </div>
                      <div id="prospectsmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?php echo base_url(); ?>admission/home">Add Prospects</a>
                              </li>
                              <li><a href="<?php echo base_url(); ?>admission/view">View All Prospects</a>
                              </li>
                              <li><a href="<?php echo base_url(); ?>admission/pending">Pending Prospects</a>
                              </li>
                              <li><a href="<?php echo base_url(); ?>admission/confirmed">Confirmed Prospects</a>
                              </li>
                              <li><a href="<?php echo base_url(); ?>admission/rejected">Rejected Prospects</a>
                              </li>

                          </ul>
                      </div>
                      <div id="staffmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?php echo base_url(); ?>staff/home">Create Staff</a>
                              </li>
                              <li><a href="<?php echo base_url(); ?>staff/view">View  All Staff</a>
                              </li>
                              <li><a href="<?php echo base_url(); ?>staff/view_trainer">View  Trainer</a>
                              </li>
                              <li><a href="<?php echo base_url(); ?>staff/view_mobilizer">View  Mobilizer</a>
                              </li>
                          </ul>
                      </div>
                      <div id="taskmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo base_url(); ?>task/home">Create Task</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>task/view">View PIA Task</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>task/view_mobilizer">View Mobilizer Task</a>
                            </li>
                          </ul>
                      </div>
                      <div id="trackingmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?php echo base_url();  ?>tracking/home">Track Mobilizer</a>
                              </li>

                          </ul>
                      </div>
                      <div id="mobilization_planmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?php echo base_url(); ?>mobilization/home">Upload</a>
                              </li>
                              <li><a href="<?php echo base_url(); ?>mobilization/view">View</a>
                              </li>

                          </ul>
                      </div>
                      <div id="graphmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                            <li><a href="#">Graph</a>
                            </li>
                          </ul>
                      </div>
                      <div id="profilemenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo base_url(); ?>dashboard/profile">View Profile</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>dashboard/password_change">Password Change</a>
                            </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Main Menu area End-->
