<div class="container">
	<div class="row page_row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php foreach($result as $rows){} ?>
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
					<form method="post" action="<?php echo base_url(); ?>admin/update_pia_details" class="form-horizontal" enctype="multipart/form-data" id="piaform" name="piaform">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Edit Training Provider</h2>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PRN Number <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="PRN Number" name="unique_number" class="form-control input-sm" value="<?php echo $rows->pia_unique_number; ?>" maxlength="20">
                                    </div>
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Name <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="Name" name="name" class="form-control input-sm" value="<?php echo $rows->pia_name; ?>" maxlength="100">
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mobile Number <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="Mobile Number" name="mobile" class="form-control input-sm" value="<?php echo $rows->pia_phone; ?>" maxlength="10">
                                    </div>
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Email ID <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="Email ID" name="email" class="form-control input-sm" value="<?php echo $rows->pia_email; ?>" maxlength="100">
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">State <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="State" name="state" class="form-control input-sm" value="<?php echo $rows->pia_state; ?>" maxlength="50">
                                    </div>
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Address <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                           <textarea name="address" MaxLength="150" class="form-control" rows="2" cols="80" placeholder="Address"><?php echo $rows->pia_address; ?></textarea>
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Profile Picture</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                           <input type="file" name="staff_new_pic" placeholder="" class="form-control" accept="image/*" data-msg-accept="Please Select Image Files" >
                                    </div>
									  <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Scheme <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                          <select name="scheme" class="form-control input-sm" id="scheme" style="width:360px;">
											 <?php foreach ($schemes as $row) {  ?>
												<option value="<?php echo $row->id; ?>"><?php echo $row->scheme_name; ?></option>
											<?php } ?>
										</select><script>document.piaform.scheme.value="<?php echo $rows->scheme_id; ?>";</script>
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                       <?php if($rows->profile_pic==''){
										}else{ ?>
											<img src="<?php echo base_url(); ?>assets/pia/<?php echo $rows->profile_pic; ?>" style="width:100px;">
									<?php	} ?>
                                    </div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Status <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="status" class="form-control input-sm" id="status">
													<option value="Active">Active</option>
													<option value="Inactive">Inactive</option>
										</select><script> $('#status').val('<?php echo $rows->status; ?>');</script>
                                    </div>
									 
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="hidden" name="pia_id" value="<?php  echo base64_encode($rows->id); ?>">
										<input type="hidden" name="staff_old_pic" value="<?php  echo $rows->profile_pic; ?>">
										<button class="btn btn-success notika-btn-success waves-effect">Save</button>
                                    </div>
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

    $('#pia').addClass('active');
    $('#piamenu').addClass('active');
	$('#view_pia').addClass('active');

	jQuery.validator.addMethod("alphanumeric", function(value, element) {
			return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
	}); 
	
	$.validator.addMethod('filesize', function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'File size must be less than 1 MB');
	
		$('#piaform').validate({
			rules: {
				unique_number: {
						required: true,
						minlength:12,
						maxlength: 20,
						alphanumeric:true,
						remote: {
									 url: "<?php echo base_url(); ?>admin/check_unique_number_edit/<?php echo base64_encode($rows->id*98765); ?>",
									 type: "post"
								}
				},
				name: {
						required: true
				},
				mobile: {
						required: true,
						maxlength: 10,
						minlength:10,
						number:true,
				},
				email: {
						required: true,
						email: true,
				},
				address: {
						required: true
				},
				state: {
						required: true
				},
				staff_new_pic:{required:false,accept: "jpg,jpeg,png", filesize: 1048576},
				status: {
						required: true
				}
		},
		messages: {
				unique_number: {
					required: "Enter PRN number",
					maxlength:"Maximum 12 digits",
					minlength:"Minimum 20 digits",
					remote: "PRN number already exist!",
					alphanumeric:"Enter alphanumeric values"
				 },
				//unique_number: "Enter Unique Number",
				name: "Enter name",
				mobile: {
						required: "Enter mobile number",
						maxlength:"Invalid mobile number",
						minlength:"Invalid mobile number",
						number:"Invalid mobile number"
				 },
				email: {
						 required: "Enter email ID",
						 email: "Enter valid email address"
				 },
				state: "Enter state",
				address: "Enter address",
				 staff_new_pic:{
								  required:"",
								  accept:"Please upload .jpg or .png .",
								  filesize:"File must be JPG or PNG, less than 1MB"
								},
				status: "Select status"
			}
		});
</script>
