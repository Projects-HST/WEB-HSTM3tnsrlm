<?php foreach($res as $rows){
	$old_disability = $rows->disability;
	$old_community_class = $rows->community_class ;
	$old_edu_certificate = $rows->edu_certificate ;
	$old_jobcard_type = $rows->jobcard_type ;
	
	$old_aadhar_doc = "";
	$old_edu_doc = "";
	$old_community_doc = "";
	$old_ration_doc = "";
	$old_voter_doc = "";
	$old_job_doc = "";
	$old_disability_doc = "";
	$old_bank_doc = "";

foreach($doc as $row){
	$doc_master_id = $row->doc_master_id;
	
	if ($doc_master_id == '1'){
		$old_aadhar_doc = $row->file_name ;
	}
	if ($doc_master_id == '2'){
		$old_edu_doc = $row->file_name ;
	}
	if ($doc_master_id == '3'){
		$old_community_doc = $row->file_name ;
	}
	if ($doc_master_id == '4'){
		$old_ration_doc = $row->file_name ;
	}
	if ($doc_master_id == '5'){
		$old_voter_doc = $row->file_name ;
	}
	if ($doc_master_id == '6'){
		$old_job_doc = $row->file_name ;
	}
	if ($doc_master_id == '7'){
		$old_disability_doc = $row->file_name ;
	}
	if ($doc_master_id == '8'){
		$old_bank_doc = $row->file_name ;
	}
}
} ?>
	<div class="container">
			<?php if($this->session->flashdata('msg')): ?>
			<div class="row page_row">
			 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"×</button><?php echo $this->session->flashdata('msg'); ?></div>
			</div>
			</div>
			<?php endif; ?>
			
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
					
					<div class="cmp-tb-hd cmp-int-hd">
						<h2>Candidate Profile</h2>
					</div>
					<hr>
					<div class="cmp-tb-hd cmp-int-hd">
						<h2 style="font-size:18px;">Personal Details</h2>
					</div>
					<div class="form-example-int">
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Aadhaar Number</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php $saathar = $rows->aadhaar_card_number;  echo $var = substr_replace($saathar, str_repeat("X", 8), 0, 8); ?>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Aadhaar Card</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php if ($old_aadhar_doc !="") { ?>
										<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_aadhar_doc; ?>" target="_blank"><?php echo $old_aadhar_doc;?></a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_aadhar_doc; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Download" title="Download"></a>
									<?php } ?>
                                    </div>								
                            </div>
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Admission Date</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php $adate=date_create($rows->admission_date);echo date_format($adate,"d-m-Y");  ?>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
									  <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Admission Location</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->admission_location; ?>
                                    </div>
							</div>

							<div class="row page_row">
                                   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Candidate's Name</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<?php echo $rows->name; ?>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Gender </label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<?php echo $rows->sex; ?>
								</div>
							</div>
							
							<div class="row page_row">
							   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Father's Name</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->father_name; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother's Name</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->mother_name ; ?>
								</div>
							</div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Date of Birth</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php $date=date_create($rows->dob);echo date_format($date,"d-m-Y");  ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Age</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->age ; ?>
								</div>
							</div>
							
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mobile Number</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->mobile; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                     <label class="hrzn-fm">Email ID</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->email; ?>
								</div>
                           </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Father's Mobile No</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->father_mobile; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother's Mobile No</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->mother_mobile; ?>
								</div>
                                
                           </div>
						   
						  <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Head of the Family </label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->head_family_name; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Highest Graduation</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->head_family_edu; ?>
                                    </div>
                           </div>
						
						<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Annual Income</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->yearly_income ; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Number of members</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->no_family; ?>
								</div>
                           </div>
						
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Languages Known</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->lang_known; ?>
								</div>
								
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Address</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->address; ?>
								</div>   
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">City</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->city; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">State</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									    <?php echo $rows->state; ?>
                                    </div>  
                           </div>
			
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Nationality</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<?php echo $rows->nationality; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Religion</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->religion; ?>
								</div>                                  
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother Tongue</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->mother_tongue ; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Caste</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->community ; ?>
								</div>
                           </div>
						   
						    <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Community</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->community_class; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
							
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Document Proof</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<?php if ($old_community_doc !="") { ?>
								 <a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_community_doc; ?>" target="_blank"><?php echo $old_community_doc;?></a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_community_doc; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Download" title="Download"></a>
								<?php } ?>
								</div>
								
                           </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Identification Marks (I)</label>
                                    </div>
								 <div class="col-lg-9 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->identification_mark_1 ; ?>
                                    </div>
                           </div>
							<div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Identification Marks (II)</label>
                                    </div>
									<div class="col-lg-9 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->identification_mark_2 ; ?>
                                    </div>
                           </div>
						 
						 <div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Blood Group</label>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php 
											$sblood_group = $rows->blood_group;
											foreach($blood as $rsets){ 
												if ( $rsets->id == $sblood_group){
													echo $rsets->blood_group_name;
												}
											} 
										?>
									</div>
								
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
							
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Preferred Course</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php 
											$spreferred_trade = $rows->preferred_trade;
											foreach($trade as $recset){ 
												if ( $recset->id == $spreferred_trade){
													echo $recset->trade_name;
												}
											} 
										?>
										
									 
                                    </div>
                            </div>
						   
						   <div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Are you a person with disability?</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										
										<?php 
											$sdisability = $rows->disability;
										if ($sdisability == 1){
											echo "Yes";
										}else {
											echo "No";
										}
										?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								
								
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Document Proof</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<?php if ($old_disability_doc !="") { ?>
								 <a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_disability_doc; ?>" target="_blank"><?php echo $old_disability_doc;?></a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_disability_doc; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Download" title="Download"></a> 
								<?php } ?>
								</div>
							
                            </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Profile Picture</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										  <img src="<?php echo base_url(); ?>assets/students/<?php echo $rows->student_pic; ?>" style="width:100px;">
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
                    <h2 style="font-size:18px;">Educational Details</h2>
                </div>
				<div class="form-example-int">
							<div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Education Level</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->qualification; ?>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Qualification</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->qualification_details ; ?>
									</div>
									
                           </div>
						   <div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Education Status</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->qualified_promotion; ?>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Year of admission: <?php echo $rows->year_of_edu ; ?></label>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										 <label class="hrzn-fm">Year of graduation: <?php echo $rows->year_of_pass ; ?></label>
									</div>
									 
                           </div>
						   <div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">School/College</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->last_institute ; ?>
                                    </div>
									
                           </div>
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Document for proof</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php if ($old_edu_certificate == 'TC'){
										echo "Transfer Certificate";
									} else {
										echo "Mark Sheet";
									}
									?>
									
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Document Proof</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php if ($old_edu_doc !="") { ?>
										<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_edu_doc; ?>" target="_blank"><?php echo $old_edu_doc;?></a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_edu_doc; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Download" title="Download"></a> 
									<?php } ?>
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
				<h2 style="font-size:18px;">Documents for Proof</h2>
			</div>
				
				<div class="form-example-int">
						<div class="row page_row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">Ration Card</label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<?php if ($old_ration_doc !="") { ?>
									<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_ration_doc; ?>" target="_blank"><?php echo $old_ration_doc;?></a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_ration_doc; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Download" title="Download"></a>
							<?php } ?>
							</div>
							<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Voter ID</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<?php if ($old_voter_doc !="") { ?>
										<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_voter_doc; ?>" target="_blank"><?php echo $old_voter_doc;?></a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_voter_doc; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Download" title="Download"></a>
								<?php } ?>
								</div>
						</div>
						<div class="row page_row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Employment ID</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<?php if ($old_jobcard_type == 'MG'){
										echo "MGNRGEA Job Card";
									} else {
										echo "BPL/PIP Card";
									}
									?>									
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Document Proof</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php if ($old_job_doc !="") { ?>
										<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_job_doc; ?>" target="_blank"><?php echo $old_job_doc;?></a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_job_doc; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Download" title="Download"></a>
										<?php } ?>
								</div>
								
					   </div>
						<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Bank Passbook (Front page)</label>
								</div>

								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php if ($old_bank_doc !="") { ?>
										 <a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_bank_doc; ?>" target="_blank"><?php echo $old_bank_doc;?></a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_bank_doc; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Download" title="Download"></a>
										 <?php } ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">Status</label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<?php echo $rows->status; ?>
							</div>
					   </div>
						<div class="row page_row">
								<button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right">Go Back</button>
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
	$('#all_prospect').addClass('active');
</script>