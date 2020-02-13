 <?php foreach($res as $rows){} ?>
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
			
			<form method="post" action="<?php echo base_url(); ?>admission/save_ad" class="form-horizontal" enctype="multipart/form-data" id="admissionform">
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Update Prospects</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                      <div class="form-group">
						<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Old Aadhaar Number</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Aadhaar Card Number" name="old_aadhar_card_num" maxlength="12"  class="form-control input-sm" value="<?php $saathar = $rows->aadhaar_card_number;  echo $var = substr_replace($saathar, str_repeat("X", 8), 0, 8); ?>"  disabled>
                                    </div>
									<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                            </div>
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Aadhaar Number</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Aadhaar Card Number" name="aadhar_card_num" maxlength="12"  class="form-control input-sm" value="">
                                    </div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Admission Date <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="admission_date" class="form-control track_date input-sm" placeholder="Admission Date" value="<?php $adate=date_create($rows->admission_date);echo date_format($adate,"d-m-Y");  ?>"/>
                                    </div>
                            </div>
								
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Admission Location <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="text" name="admission_location" class="form-control input-sm" placeholder="Admission Location" value="<?php echo $rows->admission_location; ?>" maxlength="30"/>
                                    </div>
                                   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Name <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="text" name="name" class="form-control input-sm" placeholder="Enter Name" value="<?php echo $rows->name; ?>" maxlength="30"/>
                                    </div>
							</div>
							
							<div class="row page_row">
                                   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Gender <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<select name="sex" class="form-control" id="sex">
											<option value="">Select</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
									</select><script> $('#sex').val('<?php echo $rows->sex; ?>');</script>
								</div>
							   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Father Name <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="fname" class="form-control input-sm" placeholder="Father Name" value="<?php echo $rows->father_name; ?>" maxlength="30"/>
								</div>
							</div>
							
							<div class="row page_row">
                                   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother Name</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" name="mname" class="form-control input-sm" placeholder="Mother Name" value="<?php echo $rows->mother_name; ?>" maxlength="30"/>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Date of Birth <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">									
										<input type="text" name="dob" class="form-control dob input-sm" placeholder="Date of Birth" value="<?php $date=date_create($rows->dob);echo date_format($date,"d-m-Y");  ?>"/>
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
									</select><script> $('#disability').val('<?php echo $rows->disability; ?>');</script>
								</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Email Address <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Email Address" name="email"  class="form-control input-sm" value="<?php echo $rows->email; ?>" maxlength="30">
                                    </div>
									
                            </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mobile Number <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Mobile Number" name="mobile"  class="form-control input-sm" value="<?php echo $rows->mobile; ?>" maxlength="10">
								</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Secondary Mobile</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Secondary Mobile Number" name="sec_mobile" class="form-control input-sm" value="<?php echo $rows->sec_mobile; ?>" maxlength="10">
                                    </div>
                           </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Address <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<textarea name="address" rows="2" cols="40" placeholder="Address" maxlength="100" class="form-control input-sm"><?php echo $rows->address; ?></textarea>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">City Name <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="City Name" name="city" class="form-control input-sm" value="<?php echo $rows->city; ?>" maxlength="30">
								</div>
                                    
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">State <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="State Name" name="state" class="form-control input-sm" value="<?php echo $rows->state; ?>" maxlength="30">
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Nationality <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Nationality" name="nationality" class="form-control input-sm" value="<?php echo $rows->nationality; ?>" maxlength="30">
                                    </div>
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Religion <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Religion" name="religion" class="form-control input-sm" value="<?php echo $rows->religion; ?>" maxlength="30">
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Caste <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Caste" name="community" class="form-control input-sm" value="<?php echo $rows->community ; ?>" maxlength="30">
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
										</select><script> $('#community_class').val('<?php echo $rows->community_class; ?>');</script>
										
										<!--<input type="text" placeholder="Community Class" name="community_class" class="form-control input-sm" value="<?php echo $rows->community_class ; ?>" maxlength="30">-->
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mother Tongue <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Mother Tongue" name="mother_tongue" class="form-control input-sm" value="<?php echo $rows->mother_tongue ; ?>" maxlength="30">
                                    </div>
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Previous Institute</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Previous Institute" name="institute_name" class="form-control input-sm" value="<?php echo $rows->last_institute; ?>" maxlength="30">
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Class Or Degree</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Class Or Degree" name="last_studied" class="form-control input-sm" value="<?php echo $rows->last_studied; ?>" maxlength="30">
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
									</select><script> $('#qual').val('<?php echo $rows->qualified_promotion; ?>');</script>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Status <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<select name="status" class="form-control" id="status">
											<option value="Pending">Pending</option>
											<option value="Confirmed">Confirmed</option>
											<option value="Rejected">Rejected</option>
									</select><script> $('#status').val('<?php echo $rows->status; ?>');</script>
								</div>
                           </div>
							
							
							<div class="row page_row">
							
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Profile Picture</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										  <input type="file" class="form-control" name="student_pic" accept="image/*" data-msg-accept="Please Select Image Files">
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="hidden" name="aadhar_old" class="form-control " placeholder=" " value="<?php echo $rows->aadhaar_card_number; ?>"/>
									<input type="hidden" name="user_pic_old" class="form-control " placeholder=" " value="<?php echo $rows->student_pic; ?>"/>
									 <input type="hidden" name="admission_id" class="form-control" placeholder="" value="<?php echo base64_encode($rows->id*98765); ?>"/>
									 <button class="btn btn-success notika-btn-success waves-effect">Update</button>
								</div>
							</div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><img src="<?php echo base_url(); ?>assets/students/<?php echo $rows->student_pic; ?>" style="width:100px;"></div>
								<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
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
  margin-bottom: 15px;
}
</style>


<script type="text/javascript">
    $('#prospects').addClass('active');
    $('#prospectsmenu').addClass('active');

	$.validator.addMethod('filesize', function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'File size must be less than 1 MB');

    $('#admissionform').validate({ // initialize the plugin
   rules: {
     // had_aadhar_card:{required:true },
     aadhar_card_num:{
       required:false,
       maxlength: 12,
       minlength:12,
       number:true,
       remote: {
              url: "<?php echo base_url(); ?>admission/check_aadhar_exist_already/<?php echo base64_encode($rows->id*98765); ?>",
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
               url: "<?php echo base_url(); ?>admission/check_email_exist_already/<?php echo base64_encode($rows->id*98765); ?>",
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
     mobile:{
		required:true,
		maxlength: 10,
		minlength:10,
		number:true,
		remote: {
                 url: "<?php echo base_url(); ?>admission/check_mobile_already/<?php echo base64_encode($rows->id*98765); ?>",
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
          number:"Only Numbers"
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