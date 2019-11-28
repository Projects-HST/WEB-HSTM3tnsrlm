<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
			<?php if($this->session->flashdata('msg')): ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
						×</button>
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
            <?php endif; ?>

			
			<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
					<form method="post" action="<?php echo base_url(); ?>admin/createpia" class="form-horizontal" enctype="multipart/form-data" id="piaform">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Create PIA</h2>
                        </div>
						
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PRN Number</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
										<input type="text" placeholder="PRN Number" name="unique_number" class="form-control input-sm">
                                        </div>
                                    </div>
									
									
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Name</label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" placeholder="Name" name="name" class="form-control input-sm">
                                        </div>
                                    </div>
                                </div>
								
								<div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mobile</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" placeholder="Mobile Number" name="mobile" class="form-control input-sm">
                                        </div>
                                    </div>
									
									
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Email</label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" placeholder="Email Address" name="email" class="form-control input-sm"  />
                                        </div>
                                    </div>
                                </div>
								
								<div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">State</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" placeholder="State" name="state" class="form-control input-sm"  />
                                        </div>
                                    </div>
									
									
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Address</label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
                                           <textarea name="address" MaxLength="150" class="form-control" rows="2" cols="80" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Profile Picture</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
                                           <input type="file" name="staff_pic" placeholder="" class="form-control" accept="image/*" data-msg-accept="Please Select Image Files" >
                                        </div>
                                    </div>
									
									
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                   
                                </div>
								
								<div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Status</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
										<select name="status" class="form-control input-sm" id="status">
													
													<option value="Active">Active</option>
													<option value="Inactive">Inactive</option>
										</select>
										
                                        </div>
                                    </div>
									
									
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                      
                                    </div>
                                   
                                </div>
								

								
                            </div>

                        </div>

                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button class="btn btn-success notika-btn-success waves-effect">Submit</button>
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
.row{
  margin-bottom: 15px;
}
/* .nk-int-mk h2 {
    font-size: 13px;
    color: #c13b3b;
    margin-left: 22px;
    font-weight: 400;
} */
</style>
<script type="text/javascript">
    $('#pia').addClass('active');
    $('#piamenu').addClass('active');
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
				
				status: {
						required: true
				}
		},
		messages: {
				unique_number: {
					required: "Enter PRN Number",
					maxlength:"Maximum 13 digits",
					minlength:"Minimum 13 digits",
					remote: "PRN Number Already Exist.",
					number:"Only Numbers"
				 },
				name: "Enter Name",
				mobile: {
						required: "Enter mobile number",
						maxlength:"Maximum 10 digits",
						minlength:"Minimum 10 digits",
						number:"Only Numbers"
				 },
				email: {
						 required: "Please enter your email address.",
						 email: "Please enter a valid email address."
				 },
				state: "Enter State",
				address: "Enter Address",
				status: "Select Status"
			}
		});
</script>
