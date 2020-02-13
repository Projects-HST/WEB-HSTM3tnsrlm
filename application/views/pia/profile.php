<?php foreach($result as $rows){} ?>
<div class="container">
	<div class="row page_row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
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
			
			<form method="post" action="<?php echo base_url(); ?>dashboard/profile_update" class="form-horizontal" enctype="multipart/form-data" id="myformsection">
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Profile Update</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                            <div class="form-group">
           
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Username</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
											<input type="text" placeholder="user name" name="user_name" class="form-control input-sm" value="<?php echo $rows->user_name; ?>" disabled>
                                        </div>
                                    </div>
									
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Name <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
										<input type="text" placeholder="Name" name="pia_name" class="form-control input-sm" value="<?php echo $rows->pia_name; ?>" maxlength="30">
                                        </div>
                                    </div>
								</div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mobile Number <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
										<input type="text" placeholder="Mobile Number" name="pia_phone" class="form-control input-sm" value="<?php echo $rows->pia_phone; ?>" maxlength="10">
                                        </div>
                                    </div>
									
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Email Address <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
										<input type="text" placeholder="Email Address" name="pia_email" class="form-control input-sm" value="<?php echo $rows->pia_email; ?>" maxlength="30">
                                        </div>
                                    </div>
                                </div>
																
								<div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Address <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
                                           <textarea name="pia_address" MaxLength="150" class="form-control" rows="2" cols="80" placeholder="Address"><?php echo $rows->pia_address; ?></textarea>
                                        </div>
                                    </div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">State <span class="error">*</span></label>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="State" name="pia_state" class="form-control input-sm" value="<?php echo $rows->pia_state; ?>">
									</div>
                                </div>
								
								<div class="row page_row">
										<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
											<label class="hrzn-fm">Profile Picture</label>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<div class="nk-int-st">
											   <input type="file" name="staff_new_pic" placeholder="" class="form-control" accept="image/*" data-msg-accept="Please Select Image Files" >
											</div>
										</div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php if($rows->profile_pic!=''){?>
											<img src="<?php echo base_url(); ?>assets/pia/<?php echo $rows->profile_pic; ?>" style="width:100px;">
										<?php } ?>
									</div>
								</div>
								
								<div class="row page_row">
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="hidden" class="form-control input-sm" name="pia_id" value="<?php echo base64_encode($rows->id*98765); ?>">
											<input type="hidden" name="staff_old_pic" value="<?php  echo $rows->profile_pic; ?>">
											<button type="submit" class="btn btn-success notika-btn-success waves-effect ">Update </button>
										</div>
									
									<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"></div>
								</div>
								
					</div>
                </div>	

              </form>
                    
            </div>
		</div>
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

	$.validator.addMethod('filesize', function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'File size must be less than 1 MB');
	
 $("#myformsection").validate({
         rules: {
             pia_name:{required:true },
             pia_email:{
               required: true,
                email: true,
             },
             pia_address:{required:true },
			 pia_state:{required:true },
             pia_phone: {
                 required: true,
                 maxlength: 10,
                 minlength:10,
                 number:true,
             },
			 staff_new_pic:{
					required: false,
					accept: "jpg,jpeg,png",
					filesize: 1048576
			}
         },
         messages: {
               pia_name:"Please enter name",
               pia_email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                    remote: "Email already in use!"
                },
               pia_address:"Please enter address",
			   pia_state:"Please enter state",
               pia_phone: {
                 required: "Enter mobile number",
                 maxlength:"Maximum 10 digits",
                 minlength:"Minimum 10 digits",
                 remote: "Mobile number Already Exist",
                 number:"Only Numbers"
                },
				staff_new_pic:{
				  accept:"Please upload .jpg or .png .",
				  filesize:"File must be JPG or PNG, less than 1MB"
				}
             }
		});
</script>