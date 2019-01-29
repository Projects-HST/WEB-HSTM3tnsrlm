<div class="container">
	<div class="row" style="margin-bottom:100px;">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-element-list">
				<div class="cmp-tb-hd bcs-hd">
					<h2>Create staff</h2>

				</div>
        <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <?php endif; ?>
						<form method="post" action="<?php echo base_url(); ?>admin/createstaff" class="form-horizontal" enctype="multipart/form-data" id="staffform">

				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           
						<div class="form-group ic-cmp-int">
							<div class="form-ic-cmp">
								<i class="notika-icon notika-edit"></i>
							</div>
							<div class="nk-int-st">
							  <input type="text" placeholder="Name" name="name" class="form-control" value="">
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp">
									<i class="notika-icon notika-edit"></i>
								</div>
								<div class="nk-int-st">
									<select name="select_role" class="selectpicker">
											<option value="">Role</option>
											<option value="2">TNSRLM Staff</option>
									</select>
									</div>
								</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp">
									<i class="notika-icon notika-edit"></i>
								</div>
								<div class="nk-int-st">
										<input type="text" placeholder="Mobile Number" name="mobile" class="form-control">
								</div>
							</div>
						</div>
						


					</div>

					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
									</div>
									<div class="nk-int-st">
											<input type="text" name="sec_phone" class="form-control" placeholder="Secondary Mobile" />
									</div>
								</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
										<i class="notika-icon notika-edit"></i>
									</div>
									<div class="nk-int-st">
							  		<input type="text" name="email" class="form-control" placeholder="Email Address" />
									</div>
								</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp">
									<i class="notika-icon notika-edit"></i>
								</div>
								<div class="nk-int-st">
								  <input type="text" name="dob" id="dob" class="form-control datepicker" placeholder="Date of Birth " />
									</div>
								</div>
						</div>

						</div>

					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              
							<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp">
									<i class="notika-icon notika-edit"></i>
								</div>
								<div class="nk-int-st">
									<select name="sex" class="selectpicker ">
										<option value="">Gender</option>
										  <option value="Male">Male</option>
										  <option value="Female">Female</option>
									</select>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
									</div>
									<div class="nk-int-st">
										<select name="nationality" class="selectpicker" >
												<option value="">Nationality</option>
												<option value="Indian">Indian</option>
												<option value="Others">Others</option>
										</select>

									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
										<i class="notika-icon notika-edit"></i>
									</div>
									<div class="nk-int-st">
									  <input type="text" placeholder="Religion" name="religion" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

									<div class="form-group ic-cmp-int">
										<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
										</div>
										<div class="nk-int-st">
										  <input type="text" placeholder="Community Class" name="community_class" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

									<div class="form-group ic-cmp-int">
										<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
										</div>
										<div class="nk-int-st">
										    <input type="text" placeholder="Community" name="community" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

									<div class="form-group ic-cmp-int">
										<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
										</div>
										<div class="nk-int-st">
											<textarea name="address" MaxLength="150" class="form-control" rows="4" cols="80" placeholder="Max Characters 150"></textarea>

										</div>
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

									<div class="form-group ic-cmp-int form-elet-mg">
										<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
										</div>
										<div class="nk-int-st">
											<input type="file" name="staff_pic" placeholder="" class="form-control" >
											 <small>Profile Picture</small>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

										<div class="form-group ic-cmp-int form-elet-mg res-mg-fcs">
											<div class="form-ic-cmp">
												<i class="notika-icon notika-edit"></i>
											</div>
											<div class="nk-int-st">
													<input type="text" placeholder="Qualification" name="qualification" class="form-control">

											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<div class="form-group ic-cmp-int form-elet-mg">
											<div class="form-ic-cmp">
												</div>
												<div class="nk-int-st">
													<select name="status" class="selectpicker" id="status">
														<option value="">Status</option>
														<option value="Active">Active</option>
														<option value="Inactive">Inactive</option>
													</select>

												</div>
											</div>
										</div>

								</div>

								<div class="row">
									<div class="col-lg-12 " style="margin-top:10px;">
										<div class="form-group  form-elet-mg text-center">
											<button  type="submit" class="btn btn-success notika-btn-success waves-effect ">Submit </button>
										</div>
									</div>
								</div>
              </form>
						</div>
					</div>
				</div>
			</div>
<style>
.row{
  margin-bottom: 10px;
}
.nk-int-mk h2 {
    font-size: 13px;
    color: #c13b3b;
    margin-left: 22px;
    font-weight: 400;
}
</style>
<script type="text/javascript">
    $('#staff').addClass('active');
    $('#staffmenu').addClass('active');
		$('#staffform').validate({
					rules: {
						select_role: {
								required: true
						},
							name: {
									required: true
							},
							address: {
									required: true
							},
							email: {
									required: true,
									email: true,
									remote: {
												 url: "<?php echo base_url(); ?>admin/checkemail",
												 type: "post"
											}
							},
							sex: {
									required: true
							},
							dob: {
									required: true
							},
							nationality:{required:true},
							mobile: {
									required: true,
									maxlength: 10,
									minlength:10,
									number:true,
									remote: {
												 url: "<?php echo base_url(); ?>admin/checkmobile",
												 type: "post"
											}
							},
							//subject:{required:true },
							qualification: {
									required: true
							},

							status: {
									required: true
							}
					},
					messages: {
							select_role: "Select role",
							address: "Enter Address",
							admission_date: "Select Admission Date",
							name: "Enter Name",
							email: {
									 required: "Please enter your email address.",
									 email: "Please enter a valid email address.",
									 remote: "Email already in use!"
							 },
							sex: "Select Gender",
							dob: "Select Date of Birth",
							//age: "Enter AGE",
							nationality: "Select Nationality",
							religion: "Enter the Religion",
							mother_tongue: "Enter The Mother tongue",
							qualification: "Enter the Qualification ",
							mobile: {
								required: "Enter mobile number",
								maxlength:"Maximum 10 digits",
								minlength:"Minimum 10 digits",
								remote: "Mobile number Already Exist",
								number:"Only Numbers"

							 },
							status: "Select Status"
					}
		});
</script>
