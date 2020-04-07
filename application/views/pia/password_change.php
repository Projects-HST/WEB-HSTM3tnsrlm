 <?php  foreach ($result as $row) { }  ?>
 <div class="container">

	<?php if($this->session->flashdata('msg')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			×</button>
		<?php echo $this->session->flashdata('msg'); ?>
	</div>
	<?php endif; ?>
 
	<div class="row page_row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
			<div class="form-example-wrap">
			
			<form method="post" action="<?php echo base_url(); ?>dashboard/password_update" class="form-horizontal" enctype="multipart/form-data" id="frmPassword">
			
			<div class="cmp-tb-hd cmp-int-hd">
				<h2>Change Password</h2>
			</div>

			<div class="form-example-int form-horizental">
					<div class="form-group">
   
   
					<div class="row page_row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">Current Password <span class="error">*</span></label>
							</div>
							<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
									<input type="password" placeholder="Enter Current Password" name="old_password" id="old_password" class="form-control input-sm" value="" maxlength="10"><span toggle="#old_password" class="fa fa-fw  fa-eye-slash field-icon toggle-password"></span>
							</div>
							<div class="col-lg-4 col-md-5 col-sm-5 col-xs-12"></div>
						</div>
						
						<div class="row page_row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">New Password <span class="error">*</span></label>
							</div>
							<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
								<input type="password" placeholder="Enter New Password" id="new_password" name="new_password" class="form-control input-sm" value="" maxlength="10"><span toggle="#new_password" class="fa fa-fw  fa-eye-slash field-icon toggle-password"></span>
							</div>
							<div class="col-lg-4 col-md-5 col-sm-5 col-xs-12"></div>
						</div>
						
						<div class="row page_row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">Confirm New Password <span class="error">*</span></label>
							</div>
							<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
								<input type="password" placeholder="Confirm New Password" id="retype_password" name="retype_password" class="form-control input-sm" value="" maxlength="10"><span toggle="#retype_password" class="fa fa-fw  fa-eye-slash field-icon toggle-password"></span>
							</div>
							 <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12"></div>
						</div>
						
						<div class="row page_row" style="margin-bottom:100px;">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							</div>
							<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
								<input type="hidden" class="form-control input-sm" name="user_id" value="<?php echo base64_encode($row->id*98765); ?>">
								<button type="submit" class="btn btn-success notika-btn-success waves-effect">Save </button>
							</div>
							 <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12"></div>
						</div>
						

						
			</div>
		</div>

			</form>
			</div>
		</div>
	</div>

</div>

<style>
.page_row{
  margin-bottom: 20px;
}
</style>

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
 
  $("#frmPassword").validate({
         rules: {
             old_password:{
               required: true,
                remote: {
                       url: "<?php echo base_url(); ?>dashboard/check_password_match/<?php echo base64_encode($row->user_id*98765); ?>",
                       type: "post"
                    }
             },
             new_password: {
                 required: true,
                 maxlength: 10,
                 minlength:6
             },
             retype_password: {
                 required: true,
                 maxlength: 10,
                 minlength:6,equalTo: '[name="new_password"]'
             }
         },
         messages: {
               old_password: {
                    required: "Enter your current password",
                    remote: "Current password doesn't match!"
                },
                new_password: {
                  required: "Enter a new password",
                  maxlength:"Maximum 10 digits",
                  minlength:"Minimum 6 digits"

                },
               retype_password: {
                 required: "Please confirm the new password by re-typing it.",
                 maxlength:"Maximum 10 digits",
                 minlength:"Minimum 6 digits",
                 equalTo:"This doesn't match with your new password!"

                }
             }
     });

</script>
