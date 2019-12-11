<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
  <link rel="icon" href="./assets/fav_icon.png" type="image/gif" sizes="32x32">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/wave/waves.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/notika-custom-icon.css">
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


    <div class="login-content">
        <!-- Login -->

        <div class="nk-block toggled" id="l-login">
			<div  style="margin-bottom:30px;">
				<img src="<?php echo base_url(); ?>assets/logo_red.png" alt="" class=""/>
			</div>
			
            <div class="nk-form">
              <?php if($this->session->flashdata('msg')): ?>
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                          ×</button>
                      <?php echo $this->session->flashdata('msg'); ?>
                  </div>
                  <?php endif; ?>

              <form action="<?php echo base_url(); ?>login/checklogin" method="post" enctype="multipart/form-data" id="loginform" name="loginform">
			  <div>
					<p style="font-size:18px;font-weight:bold;">Sign in to M3</p>
			 </div>
                <div class="input-group" style="padding:5px;">
                    <span class="input-group-addon nk-ic-st-pro"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <div class="nk-int-st">
                        <input type="text" name="username" class="form-control" placeholder="Username" maxlength="15">
                    </div>
                </div>
                <div class="input-group" style="padding:5px">
                    <span class="input-group-addon nk-ic-st-pro"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                    <div class="nk-int-st">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" maxlength="15"><span toggle="#password" class="fa fa-fw  fa-eye-slash field-icon toggle-password"></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
              </form>
			 <div class="nk-navigation nk-lg-ic" style="padding:10px 0px 10px 0px">
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
            </div>
            </div>

           
        </div>


        <!-- Forgot Password -->
        <div class="nk-block" id="l-forget-password">
			<div  style="margin-bottom:30px;">
				<img src="<?php echo base_url(); ?>assets/logo_red.png" alt="" class=""/>
			</div>
            <div class="nk-form">
                <form method="post" action="#" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
				<div>
					<p style="font-size:15px;font-weight:bold;">Enter the registered Email ID to reset your password.</p>
			 </div>

                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control"  name="forgot_email" placeholder="Email Address" maxlength="30">
                    </div>
                </div>
                <button type="submit" class="btn btn-forgot btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
              </form>
			  
				 <div class="nk-navigation nk-lg-ic rg-ic-stl" style="padding:10px 0px 10px 0px">
					<a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
				</div>
            </div>


        </div>
    </div>
    <!-- Login Register area End-->
    <!-- jquery
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/knob/jquery.knob.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/knob/jquery.appear.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/chat/jquery.chat.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/wave/waves.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/wave/wave-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/icheck/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/icheck/icheck-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/todo/jquery.todo.js"></script>
    <!-- Login JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/login/login-action.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/additional-methods.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script type="text/javascript">

$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye-slash fa-eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

 $('#loginform').validate({ // initialize the plugin
     rules: {
         username:{required:true },
         password:{required:true }
     },
     messages: {
           username: "Enter your username",
           password: "Enter your password"
         }
 });

   
$("#myformsection").validate({
       rules: {
           forgot_email:{required:true }
       },
       messages: {
            forgot_email:"Enter your register email address"
           },
    submitHandler: function(form) {
      $.ajax({
                 url: "<?php echo base_url(); ?>login/forgot_email",
                 type: 'POST',
                 data: $('#myformsection').serialize(),
                 success: function(response) {
                     if (response=="success") {
                       $.toast({
                                 heading: 'Success',
                                 text: 'Password reset and send to your mail. Please check your mail',
                                 position: 'mid-center',
                                 icon:'success',
                                 stack: false
                             })
                             window.setTimeout(function(){location.reload()},3000);
                     }else{
                       $.toast({
                                 heading: 'Error',
                                 text: response,
                                 position: 'mid-center',
                                 icon:'error',
                                 stack: false
                             })
                     }
                 }
             });
           }
   });


</script>
</body>
</html>
