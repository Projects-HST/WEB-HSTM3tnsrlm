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
			
			<form method="post" action="<?php echo base_url(); ?>admission/create" class="form-horizontal" enctype="multipart/form-data" id="admissionform">
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Add Prospects</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                      <div class="form-group">
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Aadhaar Card Number</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Aadhaar Card Number" name="aadhar_card_num" maxlength="12"  class="form-control input-sm" >
                                    </div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Admission Date </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="admission_date" class="form-control track_date input-sm" placeholder="Admission Date"/>
                                    </div>
                            </div>
								
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Admission Location</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="text" name="admission_location" class="form-control input-sm" placeholder="Admission Location"/>
                                    </div>
                                   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Name</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="text" name="name" class="form-control input-sm" placeholder="Enter Name"/>
                                    </div>
							</div>
							
							<div class="row page_row">
                                   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Gender</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<select name="sex" class="form-control" id="sex">
											<option value="">Select</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
									</select>
								</div>
							   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Father Name</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="fname" class="form-control input-sm" placeholder="Father Name"/>
								</div>
							</div>
							
							<div class="row page_row">
                                   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother Name</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="text" name="mname" class="form-control input-sm" placeholder="Mother Name"/>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Date of Birth</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="dob" class="form-control dob input-sm" placeholder="Date of Birth"/>
                                    </div>
							</div>
							
							<div class="row page_row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Disability</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="disability" class="form-control" id="disability">
											<option value="">Select</option>
											<option value="1">Yes</option>
											<option value="0">No</option>
									</select>
								</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Email Address</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Email Address" name="email"  class="form-control input-sm" >
                                    </div>
									
                            </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mobile Number</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Mobile Number" name="mobile"  class="form-control input-sm" >
								</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Secondary Mobile</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Secondary Mobile Number" name="sec_mobile" class="form-control input-sm" >
                                    </div>
                           </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Address</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<textarea name="address" rows="2" cols="40" placeholder="Address" class="form-control input-sm"></textarea>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">City Name</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="City Name" name="city" class="form-control input-sm" >
								</div>
                                    
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">State</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="State Name" name="state" class="form-control input-sm" >
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Nationality</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Nationality" name="nationality" class="form-control input-sm" >
                                    </div>
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Religion</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Religion" name="religion" class="form-control input-sm" >
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Community</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Community" name="community" class="form-control input-sm" >
                                    </div>
                           </div>
						   
						    <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Community Class</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Community Class" name="community_class" class="form-control input-sm" >
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mother Tongue</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Mother Tongue" name="mother_tongue" class="form-control input-sm" >
                                    </div>
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Previous Institute</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Previous Institute" name="institute_name" class="form-control input-sm" >
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Class Or Degree</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Class Or Degree" name="last_studied" class="form-control input-sm" >
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
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Profile Picture</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											  <input type="file" class="form-control" name="student_pic">
                                    </div>
                           </div>
							
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Status</label>
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
$('#add_prospect').addClass('active');

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
	 student_pic:{required:false,accept: "jpg,jpeg,png"}
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

      },
	  student_pic:{
		  required:"",
		  accept:"Please upload .jpg or .png .",
		  fileSize:"File must be JPG or PNG, less than 1MB"
		}
 }
 });

</script>