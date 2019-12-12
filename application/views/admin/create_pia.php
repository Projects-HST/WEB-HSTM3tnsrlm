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
					<form method="post" action="<?php echo base_url(); ?>admin/createpia" class="form-horizontal" enctype="multipart/form-data" id="piaform">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Create PIA</h2>
                        </div>
						
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PRN Number <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="PRN Number" name="unique_number" class="form-control input-sm" maxlength="13">
                                    </div>
									
									
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Name <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="Name" name="name" class="form-control input-sm" maxlength="30">
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mobile <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="Mobile Number" name="mobile" class="form-control input-sm" maxlength="10">
                                    </div>
									
									
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Email <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="Email Address" name="email" class="form-control input-sm" maxlength="30">
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">State <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" placeholder="State" name="state" class="form-control input-sm" maxlength="30">
                                    </div>
									
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Address <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                           <textarea name="address" MaxLength="150" class="form-control" rows="2" cols="80" placeholder="Address"></textarea>
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Profile Picture <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                           <input type="file" name="staff_pic" placeholder="" class="form-control" accept="image/*" data-msg-accept="Please Select Image Files" >
                                    </div>
									 <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Status <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="status" class="form-control input-sm" id="status">
											<option value="Active">Active</option>
											<option value="Inactive">Inactive</option>
										</select>
                                    </div>
									 <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										 <button class="btn btn-success notika-btn-success waves-effect">Create</button>
                                    </div>
									 <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12"></div>
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
	$('#create_pia').addClass('active');

		$('#piaform').validate({
			rules: {
				unique_number: {
						required: true,
						maxlength: 13,
						minlength:13,
						number:true,
						remote: {
							 url: "<?php echo base_url(); ?>admin/check_unique_number",
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
				state: {
						required: true
				},
				address: {
						required: true
				},
				staff_pic:{required:true,accept: "jpg,jpeg,png", filesize: 1048576  },
				status: {
						required: true
				}
		},
		messages: {
				unique_number: {
					required: "Enter PRN number",
					maxlength:"Maximum 13 digits",
					minlength:"Minimum 13 digits",
					remote: "PRN number already exist!",
					number:"Enter only numbers"
				 },
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
				staff_pic:{
								  required:"Select PIA picture",
								  accept:"Please upload .jpg or .png .",
								  fileSize:"File must be JPG or PNG, less than 1MB"
								},
				status: "Select status"
			}
		});
</script>
