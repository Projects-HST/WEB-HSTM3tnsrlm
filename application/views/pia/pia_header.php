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
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
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
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <div class="header-top-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="logo-area">
                      <a href="#"><img src="<?php echo base_url(); ?>assets/admin/img/logo/logo.png" alt="" /></a>
                  </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <div class="header-top-menu">
                      <ul class="nav navbar-nav notika-top-nav">



                          <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-support"></i></span></a>
                              <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">


                                  <div class="hd-mg-va">
                                      <a href="#">Logout</a>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Header Top Area -->
  <!-- Mobile Menu start -->
  <!-- <div class="mobile-menu-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="mobile-menu">
                      <nav id="dropdown">
                          <ul class="mobile-menu-nav">
                              <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                  <ul class="collapse dropdown-header-top">
                                      <li><a href="index.html">Dashboard One</a></li>
                                      <li><a href="index-2.html">Dashboard Two</a></li>
                                      <li><a href="index-3.html">Dashboard Three</a></li>
                                      <li><a href="index-4.html">Dashboard Four</a></li>
                                      <li><a href="analytics.html">Analytics</a></li>
                                      <li><a href="widgets.html">Widgets</a></li>
                                  </ul>
                              </li>
                              <li><a data-toggle="collapse" data-target="#demoevent" href="#">Email</a>
                                  <ul id="demoevent" class="collapse dropdown-header-top">
                                      <li><a href="inbox.html">Inbox</a></li>
                                      <li><a href="view-email.html">View Email</a></li>
                                      <li><a href="compose-email.html">Compose Email</a></li>
                                  </ul>
                              </li>
                              <li><a data-toggle="collapse" data-target="#democrou" href="#">Interface</a>
                                  <ul id="democrou" class="collapse dropdown-header-top">
                                      <li><a href="animations.html">Animations</a></li>
                                      <li><a href="google-map.html">Google Map</a></li>
                                      <li><a href="data-map.html">Data Maps</a></li>
                                      <li><a href="code-editor.html">Code Editor</a></li>
                                      <li><a href="image-cropper.html">Images Cropper</a></li>
                                      <li><a href="wizard.html">Wizard</a></li>
                                  </ul>
                              </li>
                              <li><a data-toggle="collapse" data-target="#demolibra" href="#">Charts</a>
                                  <ul id="demolibra" class="collapse dropdown-header-top">
                                      <li><a href="flot-charts.html">Flot Charts</a></li>
                                      <li><a href="bar-charts.html">Bar Charts</a></li>
                                      <li><a href="line-charts.html">Line Charts</a></li>
                                      <li><a href="area-charts.html">Area Charts</a></li>
                                  </ul>
                              </li>
                              <li><a data-toggle="collapse" data-target="#demodepart" href="#">Tables</a>
                                  <ul id="demodepart" class="collapse dropdown-header-top">
                                      <li><a href="normal-table.html">Normal Table</a></li>
                                      <li><a href="data-table.html">Data Table</a></li>
                                  </ul>
                              </li>
                              <li><a data-toggle="collapse" data-target="#demo" href="#">Forms</a>
                                  <ul id="demo" class="collapse dropdown-header-top">
                                      <li><a href="form-elements.html">Form Elements</a></li>
                                      <li><a href="form-components.html">Form Components</a></li>
                                      <li><a href="form-examples.html">Form Examples</a></li>
                                  </ul>
                              </li>
                              <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App views</a>
                                  <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                      <li><a href="notification.html">Notifications</a>
                                      </li>
                                      <li><a href="alert.html">Alerts</a>
                                      </li>
                                      <li><a href="modals.html">Modals</a>
                                      </li>
                                      <li><a href="buttons.html">Buttons</a>
                                      </li>
                                      <li><a href="tabs.html">Tabs</a>
                                      </li>
                                      <li><a href="accordion.html">Accordion</a>
                                      </li>
                                      <li><a href="dialog.html">Dialogs</a>
                                      </li>
                                      <li><a href="popovers.html">Popovers</a>
                                      </li>
                                      <li><a href="tooltips.html">Tooltips</a>
                                      </li>
                                      <li><a href="dropdown.html">Dropdowns</a>
                                      </li>
                                  </ul>
                              </li>
                              <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                  <ul id="Pagemob" class="collapse dropdown-header-top">
                                      <li><a href="contact.html">Contact</a>
                                      </li>
                                      <li><a href="invoice.html">Invoice</a>
                                      </li>
                                      <li><a href="typography.html">Typography</a>
                                      </li>
                                      <li><a href="color.html">Color</a>
                                      </li>
                                      <li><a href="login-register.html">Login Register</a>
                                      </li>
                                      <li><a href="404.html">404 Page</a>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </div> -->



  <!-- Mobile Menu end -->
  <!-- Main Menu area start-->
  <!-- <div class="main-menu-area mg-tb-40"> -->
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                      <li class="active"><a  href="<?php echo base_url(); ?>dashboard/home"><i class="notika-icon notika-house"></i> Dashboard</a>
                      </li>
                      <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-mail"></i> Masters</a>
                      </li>
                      <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i>Prospects</a>
                      </li>
                      <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Staff</a>
                      </li>
                      <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Task</a>
                      </li>
                      <li><a data-toggle="tab" href="#Forms"><i class="notika-icon notika-form"></i> Tracking</a>
                      </li>
                      <li><a data-toggle="tab" href="#Appviews"><i class="notika-icon notika-app"></i> Mobilization Plan</a>
                      </li>
                      <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Graph</a>
                      </li>
                      <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Profile</a>
                      </li>
                  </ul>
                  <div class="tab-content custom-menu-content">
                      <!-- <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="index.html">Dashboard One</a>
                              </li>
                              <li><a href="index-2.html">Dashboard Two</a>
                              </li>
                              <li><a href="index-3.html">Dashboard Three</a>
                              </li>
                              <li><a href="index-4.html">Dashboard Four</a>
                              </li>
                              <li><a href="analytics.html">Analytics</a>
                              </li>
                              <li><a href="widgets.html">Widgets</a>
                              </li>
                          </ul>
                      </div> -->
                      <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="">Period Plan</a>
                              </li>
                              <li><a href="">Centers</a>
                              </li>
                              <li><a href="">Schemes</a>
                              </li>
                              <li><a href="">Sessions</a>
                              </li>
                              <li><a href="">Trade and Batch</a>
                              </li>
                          </ul>
                      </div>
                      <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="animations.html">Animations</a>
                              </li>
                              <li><a href="google-map.html">Google Map</a>
                              </li>
                              <li><a href="data-map.html">Data Maps</a>
                              </li>
                              <li><a href="code-editor.html">Code Editor</a>
                              </li>
                              <li><a href="image-cropper.html">Images Cropper</a>
                              </li>
                              <li><a href="wizard.html">Wizard</a>
                              </li>
                          </ul>
                      </div>
                      <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="flot-charts.html">Flot Charts</a>
                              </li>
                              <li><a href="bar-charts.html">Bar Charts</a>
                              </li>
                              <li><a href="line-charts.html">Line Charts</a>
                              </li>
                              <li><a href="area-charts.html">Area Charts</a>
                              </li>
                          </ul>
                      </div>
                      <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="normal-table.html">Normal Table</a>
                              </li>
                              <li><a href="data-table.html">Data Table</a>
                              </li>
                          </ul>
                      </div>
                      <div id="Forms" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="form-elements.html">Form Elements</a>
                              </li>
                              <li><a href="form-components.html">Form Components</a>
                              </li>
                              <li><a href="form-examples.html">Form Examples</a>
                              </li>
                          </ul>
                      </div>
                      <div id="Appviews" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="notification.html">Notifications</a>
                              </li>
                              <li><a href="alert.html">Alerts</a>
                              </li>
                              <li><a href="modals.html">Modals</a>
                              </li>
                              <li><a href="buttons.html">Buttons</a>
                              </li>
                              <li><a href="tabs.html">Tabs</a>
                              </li>
                              <li><a href="accordion.html">Accordion</a>
                              </li>
                              <li><a href="dialog.html">Dialogs</a>
                              </li>
                              <li><a href="popovers.html">Popovers</a>
                              </li>
                              <li><a href="tooltips.html">Tooltips</a>
                              </li>
                              <li><a href="dropdown.html">Dropdowns</a>
                              </li>
                          </ul>
                      </div>
                      <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="contact.html">Contact</a>
                              </li>
                              <li><a href="invoice.html">Invoice</a>
                              </li>
                              <li><a href="typography.html">Typography</a>
                              </li>
                              <li><a href="color.html">Color</a>
                              </li>
                              <li><a href="login-register.html">Login Register</a>
                              </li>
                              <li><a href="404.html">404 Page</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Main Menu area End-->
