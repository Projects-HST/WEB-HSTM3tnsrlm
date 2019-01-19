<div class="container">
	<div class="row" style="margin-bottom:100px;">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-element-list">
				<div class="cmp-tb-hd bcs-hd">
					<h2>Add Prospects</h2>

				</div>
        <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <?php endif; ?>
        <form method="post" action="<?php echo base_url(); ?>admission/create" class="form-horizontal" enctype="multipart/form-data" id="admissionform">

				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="form-group ic-cmp-int">
							<div class="form-ic-cmp">
								<i class="notika-icon notika-edit"></i>
							</div>
							<div class="nk-int-st">
								<input type="text" placeholder="Enter Aadhaar Card Number" name="aadhar_card_num" maxlength="12"  class="form-control" >
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp">
									<i class="notika-icon notika-edit"></i>
								</div>
								<div class="nk-int-st">
									<input type="text" name="admission_date" class="form-control datepicker" placeholder="Admission Date "/>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp">
										<i class="notika-icon notika-edit"></i>
								</div>
								<div class="nk-int-st">
									<input type="text" name="admission_location" class="form-control" placeholder="Enter Admission Location"/>
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
									<input type="text" name="name" class="form-control" placeholder="Enter Name">
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
									</div>
									<div class="nk-int-st">
										<select class="selectpicker" name="sex">
											<option value="">--Select Gender--</option>
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
										<input type="text" name="fname" class="form-control" placeholder="Enter Father Name">
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
											<input type="text" name="mname" class="form-control "  placeholder="Enter  Mother Name" />
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group ic-cmp-int">
										<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
										</div>
										<div class="nk-int-st">
											<select name="disability" class="selectpicker">
                        	<option value="">--Disability--</option>
												<option value="1">Yes</option>
												<option value="0">No</option>
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
											<input type="text" name="email"  class="form-control"  id="email" placeholder="Email Address" />
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group ic-cmp-int form-elet-mg res-mg-fcs">
										<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
										</div>
										<div class="nk-int-st">
											<input type="text" name="dob" class="form-control datepicker" placeholder="Date of Birth "/>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group ic-cmp-int form-elet-mg res-mg-fcs">
										<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
										</div>
										<div class="nk-int-st">
											<textarea name="address" rows="3" cols="40" placeholder="Address"></textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group ic-cmp-int form-elet-mg">
										<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
										</div>
										<div class="nk-int-st">
											<input type="text" placeholder="Mobile Number" name="mobile" class="form-control" >
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
												<input type="text" placeholder="Secondary Mobile Number" name="sec_mobile" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="form-group ic-cmp-int form-elet-mg">
												<div class="form-ic-cmp">
													<i class="notika-icon notika-edit"></i>
												</div>
												<div class="nk-int-st">
													<input type="text" placeholder="Enter City Name" name="city" class="form-control" >
													</div>
												</div>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
												<div class="form-group ic-cmp-int form-elet-mg">
													<div class="form-ic-cmp">
														<i class="notika-icon notika-edit"></i>
													</div>
													<div class="nk-int-st">
														<input type="text" placeholder="Enter State Name" name="state" class="form-control">
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
                              <select name="nationality" class="selectpicker" >
                                <option value="">-Select Nationality-</option>
                               <option value="Indian">Indian</option>
                               <option value="Others">Others</option>
                           </select>
                         </div>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
													<div class="form-group ic-cmp-int form-elet-mg">
														<div class="form-ic-cmp">
															<!-- <i class="notika-icon notika-edit"></i> -->
														</div>
														<div class="nk-int-st">
															<!-- <input type="text" placeholder="Religion" name="religion" class="form-control"> -->
														</div>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
													<div class="form-group ic-cmp-int form-elet-mg">
														<div class="form-ic-cmp">
															<!-- <i class="notika-icon notika-edit"></i> -->
														</div>
														<div class="nk-int-st">

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
															<select name="community_class" class="selectpicker">
																<option value="">Select Caste</option>
																<option value="SC">Scheduled Castes-SC</option>
																<option value="ST">Scheduled Tribes-ST</option>
																<option value="MBC">Most Backward Classes-MBC</option>
																<option value="BC">Backward Classes-BC</option>
																<option value="BCM">Backward Classes Muslims-BCM</option>
																<option value="DC">Denotified Communities-DC</option>
																<option value="FC">Forward Class-FC</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
													<div class="form-group ic-cmp-int form-elet-mg">
														<div class="form-ic-cmp">
															<i class="notika-icon notika-edit"></i>
														</div>
														<div class="nk-int-st">
															<input type="text" placeholder="Religion" name="religion" class="form-control">
															</div>
														</div>
													</div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
														<div class="form-group ic-cmp-int form-elet-mg">
															<div class="form-ic-cmp">
																<i class="notika-icon notika-edit"></i>
															</div>
															<div class="nk-int-st">
																<input type="text" placeholder="Community" name="community" class="form-control">
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
																	<select name="mother_tongue" class="selectpicker">
                                    <option value="">Select Mother Tongue</option>
																		<option value="Tamil">Tamil</option>
																		<option value="English">Telegu</option>
																		<option value="Hindi">Hindi</option>
																		<option value="Kannada">Kannada</option>
																		<option value="English">English</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
															<div class="form-group ic-cmp-int form-elet-mg">
																<div class="form-ic-cmp">
																	<i class="notika-icon notika-edit"></i>
																</div>
																<div class="nk-int-st">
																	<input type="text" name="institute_name" placeholder="Previous Institute Or School Name" class="form-control">
																	</div>
																</div>
															</div>
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
																<div class="form-group ic-cmp-int form-elet-mg">
																	<div class="form-ic-cmp">
																		<i class="notika-icon notika-edit"></i>
																	</div>
																	<div class="nk-int-st">
																		<input type="text" name="last_studied" placeholder="Class  Or Degree" class="form-control">
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
																			<select name="qual" class="selectpicker">
                                        <option value="">Qualified for promotion</option>
																				<option value="pass">Pass</option>
																				<option value="fail">Fail</option>
																				<option value="drop">Drop Out</option>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
																	<div class="form-group ic-cmp-int form-elet-mg">
																		<div class="form-ic-cmp">
																			<i class="notika-icon notika-edit"></i>
																			</div>
																			<div class="nk-int-st">
                                        	<input type="checkbox" data-toggle="checkbox" name="trn_cert" value="1">
                                         <small>Transfer Certificate</small>
                                      </div>
																		</div>
																	</div>
																	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
																		<div class="form-group ic-cmp-int form-elet-mg">
																			<div class="form-ic-cmp">

																				</div>
																				<div class="nk-int-st">
																					<select name="status" class="selectpicker">
                                            <option value="">--Select status--</option>
																						<option value="Pending">Pending</option>
																						<option value="Confirmed">Confirmed</option>
																						<option value="Rejected">Rejected</option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</div>
                                  <div class="row" style="">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      																<div class="form-group ic-cmp-int form-elet-mg">
      																	<div class="form-ic-cmp">
      																		<!-- <i class="notika-icon notika-edit"></i> -->
      																	</div>
      																	<div class="nk-int-st">
      																		<input type="file" name="student_pic" placeholder="" class="form-control">
                                           <small>Profile Picture</small>
      																		</div>
      																	</div>
      																</div>
                                  </div>
																	<div class="row">
																		<div class="col-lg-12 " style="margin-top:10px;">
																			<div class="form-group  form-elet-mg text-center">
																				<button class="btn btn-success notika-btn-success waves-effect ">Submit</button>
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
</style>
<script type="text/javascript">
    $('#prospects').addClass('active');
    $('#prospectsmenu').addClass('active');
    $('#admissionform').validate({ // initialize the plugin
   rules: {
     // had_aadhar_card:{required:true },
     aadhar_card_num:{
       required:true,
       maxlength: 12,
       minlength:12,
       number:true,
       remote: {
              url: "<?php echo base_url(); ?>admission/check_aadhar_exist",
              type: "post"
           }
          },
     admission_location:{required:true },
     admission_date:{required:true },
     name:{required:true },
     fname:{required:true},
     // mname:{required:true},
     sex:{required:true },
     dob:{required:true },
     email:{required:true,email:true,   remote: {
               url: "<?php echo base_url(); ?>admission/check_email_exist",
               type: "post"
            }
           },
     disability:{required:true },
     // age:{required:true,number:true,maxlength:2 },
     nationality:{required:true },
     religion:{required:true },
     community_class:{required:true },
     community:{required:true },
     blood_group:{required:true },
     address:{required:true },
     city:{required:true },
     state:{required:true },
     course:{required:true },
     mother_tongue:{required:true},
     // prefer_time:{required:true},
     mobile:{required:true,
       maxlength: 10,
       minlength:10,
       number:true,remote: {
                 url: "<?php echo base_url(); ?>admission/check_mobile",
                 type: "post"
              }
     }
     },
 messages: {

     aadhar_card_num: {
          required: "Enter The Aadhar Card Number",
          remote: "Aadhar Card Number Already Exist",
          maxlength:"Maximum 12 digits",
          minlength:"Minimum 12 digits",
          number:"Only Numbers"
      },
     admission_location: "Enter Admission Location",
     admission_date: "Select Admission Date",
     name: "Enter Full Name",
     fname: "Enter Father Name",
     mname:"Enter Mother Name",
     sex: "Select Gender",
     address:"Enter The Address",
     dob: "Select Date of Birth",
     email:{
          required: "Enter email id",
          remote: "Email Already Exist"
      },
     disability:"Select Disability",
     age: "Enter AGE",
     nationality: "Nationality",
     religion: "Enter the Religion",
     community:"Enter the Community",
     community_class:"Enter the Community Class",
     blood_group:"Select Blood Group",
     prefer_time:"Select Preferred Time",
     city:"Enter City Name",
     state:"Enter State Name",
     course:"Select Course",
     mother_tongue:"Enter Mother Tongue",
     mobile: {
          required: "Enter mobile number",
          maxlength:"Maximum 10 digits",
          minlength:"Minimum 10 digits",
          remote: "Mobile number Already Exist",
          number:"Only Numbers"

      }
 }
 });

</script>
