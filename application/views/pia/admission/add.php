<div class="container">
				
			<?php if($this->session->flashdata('msg')): ?>
			<div class="row page_row">
			 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"×</button><?php echo $this->session->flashdata('msg'); ?></div>
			</div>
			</div>
			<?php endif; ?>
			<form method="post" action="<?php echo base_url(); ?>admission/create" class="form-horizontal" enctype="multipart/form-data" id="admissionform">
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
					
					<div class="cmp-tb-hd cmp-int-hd">
						<h2>Personal Details</h2>
					</div>

					<div class="form-example-int">

							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Admission Date <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="admission_date" class="form-control track_date input-sm" placeholder="Admission Date"/>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
									  <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Admission Location <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="text" name="admission_location" class="form-control input-sm" placeholder="Admission Location" maxlength="100"/>
                                    </div>
							</div>
					  
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Aadhaar Card Number <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Aadhaar Card Number" name="aadhar_card_num" maxlength="12" class="form-control input-sm" >
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Attach Aadhaar Card <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="file" class="form-control" name="aadhar_card_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
                                    </div>								
                            </div>
								
							<div class="row page_row">
                                   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Candidate Name <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="text" name="name" class="form-control input-sm" placeholder="Candidate Name" maxlength="100"/>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Gender <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<select name="sex" class="form-control" id="sex">
											<option value="">Select</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
									</select>
								</div>
							</div>
							
							<div class="row page_row">
							   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Father Name <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="fname" class="form-control input-sm" placeholder="Father Name" maxlength="100"/>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother Name <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" name="mname" class="form-control input-sm" placeholder="Mother Name" maxlength="100"/>
								</div>
							</div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Date of Birth <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" name="dob" class="form-control dob input-sm" id="dob" placeholder="Date of Birth"/>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Age <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" name="age" class="form-control input-sm" id="age" placeholder="Age" readonly="true" />
								</div>
							</div>
							
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Candidate Mobile No. <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Candidate Mobile No" name="mobile"  class="form-control input-sm" maxlength="12">
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                     <label class="hrzn-fm">Candidate E-Mail ID <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Candidate E-Mail ID" name="email"  class="form-control input-sm" maxlength="100">
								</div>
                           </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Father Mobile No.</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Father Mobile Number" name="father_mobile" class="form-control input-sm" maxlength="12">
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother Mobile No.</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Mother Mobile Number" name="mother_mobile"  class="form-control input-sm" maxlength="12">
								</div>
                                
                           </div>
						   
						  <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Head of the Family </label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Name of the Head of the Family" name="head_family"  class="form-control input-sm" maxlength="100">
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Highest Education</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Education of the Head of the Family" name="head_education"  class="form-control input-sm" maxlength="100">
                                    </div>
                           </div>
						
						<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Yearly Income</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Yearly Income of the Family" name="yearly_income" class="form-control input-sm" maxlength="20">
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Number of members</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Number of members in the family" name="no_family" class="form-control input-sm" maxlength="30">
								</div>
                           </div>
						
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Languages Known</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Languages Known" name="languages" class="form-control input-sm" maxlength="100">
								</div>
								
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Address <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Address" name="address" class="form-control input-sm" maxlength="200">
								</div>   
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">City Name <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="City Name" name="city" class="form-control input-sm" maxlength="100">
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">State <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									    <select name="state" id="state" class="form-control">
											<option value="">Select</option>
											<option value="Andhra Pradesh">Andhra Pradesh</option>
											<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
											<option value="Arunachal Pradesh">Arunachal Pradesh</option>
											<option value="Assam">Assam</option>
											<option value="Bihar">Bihar</option>
											<option value="Chandigarh">Chandigarh</option>
											<option value="Chhattisgarh">Chhattisgarh</option>
											<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
											<option value="Daman and Diu">Daman and Diu</option>
											<option value="Delhi">Delhi</option>
											<option value="Lakshadweep">Lakshadweep</option>
											<option value="Puducherry">Puducherry</option>
											<option value="Goa">Goa</option>
											<option value="Gujarat">Gujarat</option>
											<option value="Haryana">Haryana</option>
											<option value="Himachal Pradesh">Himachal Pradesh</option>
											<option value="Jammu and Kashmir">Jammu and Kashmir</option>
											<option value="Jharkhand">Jharkhand</option>
											<option value="Karnataka">Karnataka</option>
											<option value="Kerala">Kerala</option>
											<option value="Madhya Pradesh">Madhya Pradesh</option>
											<option value="Maharashtra">Maharashtra</option>
											<option value="Manipur">Manipur</option>
											<option value="Meghalaya">Meghalaya</option>
											<option value="Mizoram">Mizoram</option>
											<option value="Nagaland">Nagaland</option>
											<option value="Odisha">Odisha</option>
											<option value="Punjab">Punjab</option>
											<option value="Rajasthan">Rajasthan</option>
											<option value="Sikkim">Sikkim</option>
											<option value="Tamil Nadu">Tamil Nadu</option>
											<option value="Telangana">Telangana</option>
											<option value="Tripura">Tripura</option>
											<option value="Uttar Pradesh">Uttar Pradesh</option>
											<option value="Uttarakhand">Uttarakhand</option>
											<option value="West Bengal">West Bengal</option>
											</select>
										<!--<input type="text" placeholder="State Name" name="state" class="form-control input-sm" maxlength="30">-->
                                    </div>  
                           </div>
			
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Nationality <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<select name="nationality" id="nationality" class="form-control">
											<option value="">Select</option>
											<option value="Indian">Indian</option>
											<option value="Others">Others</option>
											
											</select>
									<!--<input type="text" placeholder="Nationality" name="nationality" class="form-control input-sm" maxlength="30">-->
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Religion <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Religion" name="religion" class="form-control input-sm" maxlength="50">
								</div>                                  
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother Tongue <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Mother Tongue" name="mother_tongue" class="form-control input-sm" maxlength="20">
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Caste <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Caste" name="community" class="form-control input-sm" maxlength="100">
								</div>
                           </div>
						   
						    <div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Community <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="community_class" class="form-control" id="community_class">
													<option value="">Select</option>
													<option value="SC">SC</option>
													<option value="ST">ST</option>
													<option value="BC">BC</option>
													<option value="MBC">MBC</option>
													<option value="OC">OC</option>
										</select>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div id="com_doc_div" class="com_doc_div">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Document <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									  <input type="file" class="form-control" name="community_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
                                    </div>
								</div>
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Identification Marks (I)</label>
                                    </div>
								 <div class="col-lg-9 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Identification Marks (I)" name="identification_marks1" class="form-control input-sm" maxlength="200">
                                    </div>
                           </div>
							<div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Identification Marks (II)</label>
                                    </div>
									<div class="col-lg-9 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Identification Marks (II)" name="identification_marks2" class="form-control input-sm" maxlength="200">
                                    </div>
                           </div>
						 
						 <div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Blood Group <span class="error">*</span></label>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<select name="blood_group" class="form-control" id="blood_group">
												<option value="">Select</option>
											<?php foreach($blood as $rows){ ?>
												<option value="<?php echo $rows->id;?>"><?php echo $rows->blood_group_name;?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Preferred Trade <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									 <select name="prefer_trade" class="form-control" id="prefer_trade">
											<option value="">Select</option>
											<?php foreach($trade as $rows){ ?>
												<option value="<?php echo $rows->id;?>"><?php echo $rows->trade_name;?></option>
											<?php } ?>
									</select>
                                    </div>
                            </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Disability <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="disability" class="form-control" id="disability">
											<option value="">Select</option>
											<option value="1">Yes</option>
											<option value="0">No</option>
									</select>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div id ="disability_div" class="disability_div">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Differently-abled National ID Card (PWD)  <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									 <input type="file" class="form-control" name="disability_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
                                    </div>
								</div>
                            </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Passport Size Photo <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										  <input type="file" class="form-control" name="student_pic" accept="image/*" data-msg-accept="Please Select Image Files">
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<p style="color:#e3242b;">Also ensure it is in passport size</p>
                                    </div>
							</div>
						</div>	
   
            </div>
		</div>
	</div>
	



	<div class="row page_row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-example-wrap">
			
				<div class="cmp-tb-hd cmp-int-hd">
                    <h2>Educational Details</h2>
                </div>
				<div class="form-example-int">
				<div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Qualification</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="qualification" class="form-control" id="qualification">
											<option value="">Select</option>
											<option value="School">School</option>
											<option value="UG">UG</option>
											<option value="PG">PG</option>
											<option value="Diploma">Diploma</option>
											<option value="Others">Others</option>
									</select>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Qualification Details</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="qualification_details" class="form-control input-sm" placeholder="Qualification Details" maxlength="100" />
									</div>
									
                           </div>
						   <div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Qualified Promotion</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="promotion_status" class="form-control" id="promotion_status">
											<option value="">Select</option>
											<option value="pass">Pass</option>
											<option value="fail">Fail</option>
											<option value="drop">Drop Out</option>
									</select>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Years</label>
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12" style="margin-right:40px;">
										<input type="text" name="year_education" class="form-control date-own input-sm" placeholder="Education Year" style="width:120px;"/>
									</div>
									 <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="year_passing" class="form-control date-own input-sm" placeholder="Passing Year" style="width:120px;"/>
                                    </div>
                           </div>

						   <div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Previous Institute</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Previous Institute" name="institute_name" class="form-control input-sm" maxlength="100">
                                    </div>
                           </div>

							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Type <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="radio" id="edu_doc_type" name="edu_doc_type" value="TC" checked>Transfer Certificate &nbsp;&nbsp;
										<input type="radio" id="edu_doc_type" name="edu_doc_type" value="MS"> Mark Sheet 
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Document <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="file" class="form-control" name="edu_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
                                    </div>
                           </div>
				</div>
				
            </div>
        </div>
	</div>
	
	<div class="row page_row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-example-wrap">
				
			<div class="cmp-tb-hd cmp-int-hd">
				<h2>Documents for Proof</h2>
			</div>
				
				<div class="form-example-int">
						<div class="row page_row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">Ration Card <span class="error">*</span></label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="file" class="form-control" name="rationcard_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
							</div>
							<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Voter ID</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="file" class="form-control" name="voterid_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
								</div>
						</div>
						<div class="row page_row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Select Type <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="radio" id="job_type" name="job_type" value="MG" checked>MGNRGEA Job Card &nbsp;
									<input type="radio" id="job_type" name="job_type" value="BP"> BPL/PIP Card
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Select Document <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										 <input type="file" class="form-control" name="jobcard_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
								</div>
					   </div>
						<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Bank Account Details (Front Page)</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										  <input type="file" class="form-control" name="bankac_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">Status <span class="error">*</span></label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<select name="status" class="form-control" id="status">
										<option value="Pending">Pending</option>
										<option value="Confirmed">Confirmed</option>
										<option value="Rejected">Rejected</option>
								</select>
							</div>
								
					   </div>

						<div class="row page_row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								   <button class="btn btn-success notika-btn-success waves-effect">SUBMIT</button>
							</div>
							<div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
							</div>
						</div>
				</div>
				
            </div>
        </div>
	</div>
	
	
	</form>
</div>

<style>
.page_row{
  margin-bottom: 15px;
}
</style>


<script type="text/javascript">


$('#prospects').addClass('active');
$('#prospectsmenu').addClass('active');
$('#add_prospect').addClass('active');

	$.validator.addMethod('filesize', function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'Check your file size');


jQuery.validator.addMethod(
        "validDOB",
        function(value, element) {              
            var from = value.split("-"); // DD MM YYYY
            // var from = value.split("/"); // DD/MM/YYYY

            var day = from[0];
            var month = from[1];
            var year = from[2];
            var age = 15;

            var mydate = new Date();
            mydate.setFullYear(year, month-1, day);

            var currdate = new Date();
            var setDate = new Date();

            setDate.setFullYear(mydate.getFullYear() + age, month-1, day);

            if ((currdate - setDate) > 0){
                return true;
            }else{
                return false;
            }
        },
        "Sorry, you must be 15 years of age to apply"
    );
	
 $("#dob").change(function () {
        var today = new Date();
        var birthDate = new Date($(this).datepicker('getDate'));
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return $('#age').val(age);
    });


$("#com_doc_div").hide();
$("#disability_div").hide();

var communityClass = jQuery('#community_class');
//var select = this.value;
communityClass.change(function () {
    if ($(this).val() == 'SC' || $(this).val() == 'ST') {
        $('.com_doc_div').show();
    }
    else $('.com_doc_div').hide(); // hide div if value is not "custom"
});

var Disability = jQuery('#disability');
//var select = this.value;
Disability.change(function () {
    if ($(this).val() == '1') {
        $('.disability_div').show();
    }
    else $('.disability_div').hide(); // hide div if value is not "custom"
});


$('#admissionform').validate({ // initialize the plugin
   rules: {
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
	 aadhar_card_doc:{required:true,accept: "pdf",filesize: 2097152},
     admission_location:{required:true },
     admission_date:{required:true },
     name:{required:true },
     fname:{required:true},
	 mname:{required:true},
     sex:{required:true },
     dob:{required:true,validDOB : true },
	 age:{required:true },
     email:{required:true,email:true,   remote: {
               url: "<?php echo base_url(); ?>admission/check_email_exist",
               type: "post"
            }
           },
     disability:{required:true },
     nationality:{required:true },
     religion:{required:true },
     community_class:{required:true },
     community:{required:true },
     blood_group:{required:true },
	 prefer_trade:{required:true },
     address:{required:true },
     city:{required:true },
     state:{required:true },
     course:{required:true },
     mother_tongue:{required:true},
     mobile:{required:true,
		   maxlength: 10,
		   minlength:10,
		   number:true,remote: {
                 url: "<?php echo base_url(); ?>admission/check_mobile",
                 type: "post"
              }
     },
	 father_mobile:{
		  required:false,
		   maxlength: 10,
		   minlength:10,
		   number:true
     },
	  mother_mobile:{
		   required:false,
		   maxlength: 10,
		   minlength:10,
		   number:true
     },
	  yearly_income:{
		   required:false,
		   number:true
     },
	 community_doc : {required:true,accept: "pdf",filesize: 2097152},
	 student_pic:{required:true,accept: "jpg,jpeg,png",filesize: 1048576},
	 rationcard_doc : {required:true,accept: "pdf",filesize: 2097152},
	 edu_doc : {required:true,accept: "pdf",filesize: 2097152},
	 disability_doc : {required:true,accept: "pdf",filesize: 2097152},
	 voterid_doc : {required:false,accept: "pdf",filesize: 2097152},
	 jobcard_doc : {required:true,accept: "pdf",filesize: 2097152},
	 bankac_doc : {required:false,accept: "pdf",filesize: 2097152}
     },
 messages: {
     aadhar_card_num: {
          required: "Enter Aadhar Card Number",
          remote: "Aadhar Card Number Already Exist",
          maxlength:"Maximum 12 digits",
          minlength:"Minimum 12 digits",
          number:"Enter Only Numbers"
      },
	  aadhar_card_doc:{
		  required:"Select Aadhar Card",
		  accept:"Please upload .pdf Files",
		  filesize:"File must be PDF, less than 2MB"
		},
     admission_location: "Enter Admission Location",
     admission_date: "Select Admission Date",
     name: "Enter Full Name",
     fname: "Enter Father Name",
     mname:"Enter Mother Name",
     sex: "Select Gender",
     address:"Enter Address",
     //dob: "Select Date of Birth",
	 email:{
          required: "Enter Email id",
          remote: "Email Already Exist"
      },
     dob:{
          required: "Select Date of Birth",
          validDOB: "Age must be at least 15 years old!"
      },
     disability:"Select Disability",
     age: "Enter Age",
     nationality: "Select Nationality",
     religion: "Enter Religion",
     community:"Enter Caste",
     community_class:"Select Community",
     blood_group:"Select Blood Group",
	 prefer_trade:"Select Preferred Trade",
    /*  prefer_time:"Select Preferred Time", */
     city:"Enter City",
     state:"Select State",
    /*  course:"Select Course", */
     mother_tongue:"Enter Mother Tongue",
     mobile: {
          required: "Enter Mobile number",
          maxlength:"Maximum 10 digits",
          minlength:"Minimum 10 digits",
          remote: "Mobile Number Already Exist",
          number:"Enter Only Numbers"

      },
	father_mobile: {
          required: "",
          maxlength:"Maximum 10 digits",
          minlength:"Minimum 10 digits",
          number:"Enter Only Numbers"
      },
	  mother_mobile: {
          required: "",
          maxlength:"Maximum 10 digits",
          minlength:"Minimum 10 digits",
          number:"Enter Only Numbers"
      },
	  yearly_income: {
          required: "",
          number:"Enter Only Numbers"
      },
	student_pic:{
		  required:"Selectpassport size photo",
		  accept:"Please upload .jpg or .png .",
		  filesize:"File must be JPG or PNG, less than 1MB"
		},
	rationcard_doc:{
		  required:"Select Ration Card",
		  accept:"Please upload .pdf Files",
		  filesize:"File must be PDF, less than 2MB"
		},
	edu_doc:{
		  required:"Select Educational Documents",
		  accept:"Please upload .pdf Files",
		  filesize:"File must be PDF, less than 2MB"
		},
	community_doc:{
		  required:"Select Community Certificate",
		  accept:"Please upload .pdf Files",
		  filesize:"File must be PDF, less than 2MB"
		},
	disability_doc:{
		  required:"Select Differently-abled National ID Card",
		  accept:"Please upload .pdf Files",
		  filesize:"File must be PDF, less than 2MB"
		},
	voterid_doc:{
		  required:"",
		  accept:"Please upload .pdf Files",
		  filesize:"File must be PDF, less than 2MB"
		},
	jobcard_doc:{
		  required:"Select Job Card",
		  accept:"Please upload .pdf Files",
		  filesize:"File must be PDF, less than 2MB"
		},
	bankac_doc:{
		  required:"",
		  accept:"Please upload .pdf Files",
		  filesize:"File must be PDF, less than 2MB"
		}
 }
 });

</script>