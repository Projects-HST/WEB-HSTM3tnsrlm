<div class="container">
	<div class="row page_row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php foreach($result as $rows){} ?>
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
					<form method="post" action="<?php echo base_url(); ?>admin/update_pia_details" class="form-horizontal" enctype="multipart/form-data" id="piaform" name="piaform">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Update PIA</h2>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PRN Number <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="PRN Number" name="unique_number" class="form-control input-sm" value="<?php echo $rows->pia_unique_number; ?>" maxlength="13">
                                    </div>
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Name <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="Name" name="name" class="form-control input-sm" value="<?php echo $rows->pia_name; ?>" maxlength="30">
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mobile <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="Mobile Number" name="mobile" class="form-control input-sm" value="<?php echo $rows->pia_phone; ?>" maxlength="10">
                                    </div>
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Email <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="Email Address" name="email" class="form-control input-sm" value="<?php echo $rows->pia_email; ?>" maxlength="30">
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">State <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="State" name="state" class="form-control input-sm" value="<?php echo $rows->pia_state; ?>" maxlength="30">
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
										<button class="btn btn-success notika-btn-success waves-effect">Update</button>
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

		$('#piaform').validate({
			rules: {
				unique_number: {
						required: true,
						maxlength: 13,
						minlength:13,
						number:true,
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
				staff_new_pic:{required:false,accept: "jpg,jpeg,png"},
				status: {
						required: true
				}
		},
		messages: {
				unique_number: {
					required: "Enter PRN Number",
					maxlength:"Maximum 13 digits",
					minlength:"Minimum 13 digits",
					remote: "PRN number already exist!",
					number:"Enter only numbers"
				 },
				//unique_number: "Enter Unique Number",
				name: "Enter Name",
				mobile: {
						required: "Enter mobile number",
						maxlength:"Maximum 10 digits",
						minlength:"Minimum 10 digits",
						number:"Enter only numbers"
				 },
				email: {
						 required: "Enter email address",
						 email: "Enter valid email address"
				 },
				state: "Enter state",
				address: "Enter address",
				 staff_new_pic:{
								  required:"",
								  accept:"Please upload .jpg or .png .",
								  fileSize:"File must be JPG or PNG, less than 1MB"
								},
				status: "Select status"
			}
		});
</script>
