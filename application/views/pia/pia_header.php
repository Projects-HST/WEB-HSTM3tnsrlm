<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>M3 - Training Partner Section </title>
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
			
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.css">
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
	
	<!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/notika-custom-icon.css">
	
	 <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/datapicker/datepicker3.css">
	
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
		  
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/notification/notification.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/dialog/sweetalert2.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/dialog/dialog.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-select/bootstrap-select.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/jquery.galpop.css">


	<script src="<?php echo base_url(); ?>assets/admin/js/vendor/modernizr-2.8.3.min.js"></script>	
	<script src="<?php echo base_url(); ?>assets/admin/js/vendor/jquery-1.12.4.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/additional-methods.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-select/bootstrap-select.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
	
</head>

<body>

<!-- Start Header Top Area -->
    <div class="header-top-area">
	
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="<?php echo base_url(); ?>dashboard/home"><img src="<?php echo base_url(); ?>assets/logo_red.png" alt="" class="logo_admin" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
							<li class="nav-item"><a style="padding-top:40px;"><span>Welcome <?php echo $this->session->userdata('name'); ?></span></a></li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><div class="recent-post-img"><img src="<?php echo base_url(); ?>assets/profile/<?php echo $this->session->userdata('user_pic'); ?>" alt="" width="45px" height="45px"></div></a>
                                <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                    <div class="hd-message-info">
										<a href="<?php echo base_url(); ?>dashboard/profile/"><div class="hd-message-sn"><div class="hd-mg-ctn"><p>Profile </p></div></div></a>
										<a href="<?php echo base_url(); ?>dashboard/password_change/"><div class="hd-message-sn"><div class="hd-mg-ctn"><p>Change Password</p></div></div></a>
										<a href="<?php echo base_url(); ?>logout"><div class="hd-message-sn"><div class="hd-mg-ctn"><p>Logout</p></div></div></a>
									</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Header Top Area -->

  <!-- Start Main Menu area -->
   <div class="main-menu-area mg-tb-30">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                      <li id="dashboard"><a href="<?php echo base_url(); ?>dashboard/home"><i class="fa fa-th-large" aria-hidden="true"></i> Dashboard</a></li>
                      <li id="masters"><a data-toggle="tab" href="#mastersmenu"><i class="fa fa-sitemap" aria-hidden="true"></i> Masters</a></li>
					  <li id="staff"><a data-toggle="tab" href="#staffmenu"><i class="fa fa-users" aria-hidden="true"></i> Staff</a></li>
                      <li id="prospects"><a data-toggle="tab" href="#prospectsmenu"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Candidates</a></li>
                      <!--<li id="task"><a data-toggle="tab" href="#taskmenu"><i class="fa fa-file-text-o" aria-hidden="true"></i> Task</a></li>
					  <li id="mobilization_plan"><a data-toggle="tab" href="#mobilization_planmenu"><i class="fa fa-file" aria-hidden="true"></i> Mobilization Plan</a></li>-->
					  <li id="tracking"><a href="<?php echo base_url();?>tracking/home"><i class="fa fa-map" aria-hidden="true"></i> Tracking</a></li>
					  <li id="graph"><a href="<?php echo base_url();?>graph/home"><i class="fa fa fa-bar-chart" aria-hidden="true"></i> Graph</a></li>
                  </ul>
				  
				<div class="tab-content custom-menu-content">
                      <div id="mastersmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?php echo base_url(); ?>years/config" id="period_plan">Project Timeline</a></li>
                              <li><a href="<?php echo base_url(); ?>centers" id="centers">Training Centers</a></li>
                              <li><a href="<?php echo base_url(); ?>scheme" id="schemes">Schemes</a></li>
                              <li><a href="<?php echo base_url(); ?>trade/home" id="trade">Courses</a>
                              </li>
                          </ul>
                      </div>
                      <div id="prospectsmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?php echo base_url(); ?>admission/home" id="add_prospect">Create Profile</a></li>
                              <li><a href="<?php echo base_url(); ?>admission/view" id="all_prospect">View Candidates</a></li>
                              <li><a href="<?php echo base_url(); ?>admission/pending" id="pend_prospect">Unverified Profiles</a></li>
                              <li><a href="<?php echo base_url(); ?>admission/confirmed" id="confirm_prospect">Qualified Profiles</a></li>
                              <li><a href="<?php echo base_url(); ?>admission/rejected" id="reject_prospect">Unqualified Profiles</a></li>
                          </ul>
                      </div>
                      <div id="staffmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?php echo base_url(); ?>staff/home" id="create_staff">Create Staff Profile</a></li>
                              <li><a href="<?php echo base_url(); ?>staff/view" id="view_staff">View Staff</a></li>
                              <li><a href="<?php echo base_url(); ?>staff/view_trainer" id="view_trainer">Trainers</a></li>
                              <li><a href="<?php echo base_url(); ?>staff/view_mobilizer" id="view_mobilizer">Mobilizers</a></li>
							  <li><a href="<?php echo base_url(); ?>staff/view_mobilizer_list" id="view_mobilizer_list">Mobilizers Work</a></li>
                          </ul>
                      </div>
                      <div id="taskmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo base_url(); ?>task/home" id="create_task">Create Task</a></li>
                            <li><a href="<?php echo base_url(); ?>task/view" id="task_by_you">Tasks by You</a></li>
                            <li><a href="<?php echo base_url(); ?>task/view_mobilizer" id="task_by_mob">Tasks by Mobilizers</a></li>
                          </ul>
                      </div>
					   <div id="mobilization_planmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?php echo base_url(); ?>mobilization/home" id="upload_plan">Upload Plan</a></li>
                              <li><a href="<?php echo base_url(); ?>mobilization/view" id="view_plan">List Plans</a></li>

                          </ul>
                      </div>
                      <div id="trackingmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?php echo base_url();  ?>tracking/home">Track Mobilizer</a></li>
                          </ul>
                      </div>
                     
                      <div id="graphmenu" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                            <li><a href="#">Graph</a></li>
                          </ul>
                      </div>
                  </div>
					
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Main Menu area End-->