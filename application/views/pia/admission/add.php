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
									  <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Admission Location <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="text" name="admission_location" class="form-control input-sm" placeholder="Admission Location" maxlength="30"/>
                                    </div>
							</div>
					  
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Aadhaar Card Number <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Aadhaar Card Number" name="aadhar_card_num" maxlength="12" class="form-control input-sm" >
                                    </div>
									
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Attach Aadhaar Card</label>
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
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Age <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="age" class="form-control input-sm" id="age" placeholder="Age" disabled />
                                    </div>
							</div>
							
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Candidate Mobile No. <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Candidate Mobile No" name="mobile"  class="form-control input-sm" maxlength="12">
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                     <label class="hrzn-fm">Candidate E-Mail ID <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Candidate E-Mail ID" name="email"  class="form-control input-sm" maxlength="30">
								</div>
                           </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Father Mobile No.</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Father Mobile Number" name="fater_mobile" class="form-control input-sm" maxlength="12">
								</div>
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
										<input type="text" placeholder="Name of the Head of the Family" name="head_family"  class="form-control input-sm" maxlength="12">
								</div>
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Highest Education of the Head of the Family</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Education of the Head of the Family" name="head_education"  class="form-control input-sm" maxlength="30">
                                    </div>
                           </div>
						
						<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Yearly Income of the Family</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Yearly Income of the Family" name="yearly_income" class="form-control input-sm" maxlength="30">
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Languages Known</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Languages Known" name="languages" class="form-control input-sm" maxlength="30">
								</div>
                           </div>
						
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Number of members in the family <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Number of members in the family" name="no_family" class="form-control input-sm" maxlength="30">
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Address <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Address" name="address" class="form-control input-sm" maxlength="30">
								</div>   
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">City Name <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="City Name" name="city" class="form-control input-sm" maxlength="30">
								</div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">State <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="State Name" name="state" class="form-control input-sm" maxlength="30">
                                    </div>  
                           </div>
			
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Nationality <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Nationality" name="nationality" class="form-control input-sm" maxlength="30">
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Religion <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Religion" name="religion" class="form-control input-sm" maxlength="30">
								</div>                                  
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother Tongue <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Mother Tongue" name="mother_tongue" class="form-control input-sm" maxlength="30">
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Caste <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" placeholder="Caste" name="community" class="form-control input-sm" maxlength="30">
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
								<div id="com_doc_div" class="com_doc_div">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Document</label>
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
								 <div class="col-lg-8 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Identification Marks (I)" name="last_studied" class="form-control input-sm" maxlength="30">
                                    </div>
                           </div>
							<div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Identification Marks (II)</label>
                                    </div>
									<div class="col-lg-8 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Identification Marks (II)" name="last_studied" class="form-control input-sm" maxlength="30">
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
								<div id ="disability_div" class="disability_div">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Differently-abled National ID Card (PWD)</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									 <input type="file" class="form-control" name="disability_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
                                    </div>
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
				<div class="form-example-int form-horizental">
				<div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Qualification</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="qualification" class="form-control" id="qualification">
											<option value="">Select</option>
											<option value="1">Yes</option>
											<option value="0">No</option>
									</select>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Years</label>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="year_education" class="form-control track_date input-sm" placeholder="Year of Education" style="width:140px;"/>
									</div>
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="year_passing" class="form-control track_date input-sm" placeholder="Year of Passing" style="width:120px;"/>
                                    </div>
                           </div>

						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Previous Institute</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Previous Institute" name="institute_name" class="form-control input-sm" maxlength="30">
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Class Or Degree</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Class Or Degree" name="last_studied" class="form-control input-sm" maxlength="30">
                                    </div>
                           </div>
						   
						     <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Qualified Promotion</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="qual" class="form-control" id="qual">
											<option value="">Select</option>
											<option value="pass">Pass</option>
											<option value="fail">Fail</option>
											<option value="drop">Drop Out</option>
									</select>
                                    </div>

                           </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Type</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="radio" id="edu_doc_type" name="edu_doc_type" value="TC" checked>Transfer Certificate &nbsp;&nbsp;
										<input type="radio" id="edu_doc_type" name="edu_doc_type" value="MS"> Mark Sheet 
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Document</label>
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
				
				<div class="form-example-int form-horizental">
						<div class="row page_row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">Ration Card <span class="error">*</span></label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="file" class="form-control" name="rationcard_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
							</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Voter ID</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="file" class="form-control" name="voterid_doc" accept="application/pdf" data-msg-accept="Please Select PDF Files">
								</div>
						</div>
						<div class="row page_row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Select Type</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="radio" id="job_type" name="job_type" value="MG" checked>MGNRGEA Job Card &nbsp;
									<input type="radio" id="job_type" name="job_type" value="BP"> BPL/PIP Card
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Select Document</label>
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
					   </div>
						
						<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Profile Picture</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										  <input type="file" class="form-control" name="student_pic" accept="image/*" data-msg-accept="Please Select Image Files">
								</div>
					   </div>
						<div class="row page_row">
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
							   <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
						</div>
						<div class="row page_row">
							 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									   <button class="btn btn-success notika-btn-success waves-effect">Submit</button>
								</div>
							<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
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
	}, 'File size must be less than 1 MB');

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
	 aadhar_card_doc:{required:true,accept: "pdf",filesize: 1048576},
     admission_location:{required:true },
     admission_date:{required:true },
     name:{required:true },
     fname:{required:true},
     sex:{required:true },
     dob:{required:true },
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
	 student_pic:{required:false,accept: "jpg,jpeg,png",filesize: 1048576}
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
		  accept:"Please upload .pdf.",
		  filesize:"File must be PDF, less than 1MB"
		},
     admission_location: "Enter Admission Location",
     admission_date: "Select Admission Date",
     name: "Enter Full Name",
     fname: "Enter Father Name",
     mname:"Enter Mother Name",
     sex: "Select Gender",
     address:"Enter Address",
     dob: "Select Date of Birth",
     email:{
          required: "Enter Email id",
          remote: "Email Already Exist"
      },
     disability:"Select Disability",
     age: "Enter Age",
     nationality: "Enter Nationality",
     religion: "Enter Religion",
     community:"Enter Caste",
     community_class:"Select Community",
     blood_group:"Select Blood Group",
     prefer_time:"Select Preferred Time",
     city:"Enter City Name",
     state:"Enter State Name",
     course:"Select Course",
     mother_tongue:"Enter Mother Tongue",
     mobile: {
          required: "Enter Mobile number",
          maxlength:"Maximum 10 digits",
          minlength:"Minimum 10 digits",
          remote: "Mobile number Already Exist",
          number:"Enter Only Numbers"

      },
	  student_pic:{
		  required:"",
		  accept:"Please upload .jpg or .png .",
		  filesize:"File must be JPG or PNG, less than 1MB"
		}
 }
 });

</script>