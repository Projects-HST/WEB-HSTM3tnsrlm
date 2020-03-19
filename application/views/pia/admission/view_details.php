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
						<h2>Personal Details</h2>
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
                                        <label class="hrzn-fm">Attach Aadhaar Card</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php if ($old_aadhar_doc !="") { ?>
										<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_aadhar_doc; ?>" target="_blank"><?php echo $old_aadhar_doc;?></a> 
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
                                        <label class="hrzn-fm">Candidate Name</label>
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
									<label class="hrzn-fm">Father Name</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->father_name; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother Name</label>
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
									<label class="hrzn-fm">Candidate Mobile No.</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->mobile; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                     <label class="hrzn-fm">Candidate E-Mail ID</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->email; ?>
								</div>
                           </div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Father Mobile No.</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<?php echo $rows->father_mobile; ?>
								</div>
								<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Mother Mobile No.</label>
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
                                        <label class="hrzn-fm">Highest Education</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->head_family_edu; ?>
                                    </div>
                           </div>
						
						<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Yearly Income</label>
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
									<label class="hrzn-fm">City Name</label>
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
								 <a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_community_doc; ?>" target="_blank"><?php echo $old_community_doc;?></a> 
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
                                        <label class="hrzn-fm">Preferred Trade</label>
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
									<label class="hrzn-fm">Disability</label>
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
								 <a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_disability_doc; ?>" target="_blank"><?php echo $old_disability_doc;?></a> 
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
                    <h2>Educational Details</h2>
                </div>
				<div class="form-example-int">
							<div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Qualification</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->qualification; ?>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Qualification Details</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->qualification_details ; ?>
									</div>
									
                           </div>
						   <div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Qualified Promotion</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->qualified_promotion; ?>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Year of education: <?php echo $rows->year_of_edu ; ?></label>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										 <label class="hrzn-fm">Year of passing: <?php echo $rows->year_of_pass ; ?></label>
									</div>
									 
                           </div>
						   <div class="row page_row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Previous Institute</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $rows->last_institute ; ?>
                                    </div>
									
                           </div>
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Type</label>
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
										<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_edu_doc; ?>" target="_blank"><?php echo $old_edu_doc;?></a>
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
				<h2>Documents for Proof</h2>
			</div>
				
				<div class="form-example-int">
						<div class="row page_row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								<label class="hrzn-fm">Ration Card</label>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<?php if ($old_ration_doc !="") { ?>
									<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_ration_doc; ?>" target="_blank"><?php echo $old_ration_doc;?></a>
							<?php } ?>
							</div>
							<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">&nbsp;</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Voter ID</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<?php if ($old_voter_doc !="") { ?>
										<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_voter_doc; ?>" target="_blank"><?php echo $old_voter_doc;?></a>
								<?php } ?>
								</div>
						</div>
						<div class="row page_row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Select Type</label>
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
										<a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_job_doc; ?>" target="_blank"><?php echo $old_job_doc;?></a>
										<?php } ?>
								</div>
								
					   </div>
						<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Bank Account Details (Front Page)</label>
								</div>

								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php if ($old_bank_doc !="") { ?>
										 <a href="<?php echo base_url(); ?>assets/documents/<?php echo $old_bank_doc; ?>" target="_blank"><?php echo $old_bank_doc;?></a> 
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

	$.validator.addMethod('filesize', function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'Check your file size');

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

<?php if ($old_disability == '1'){ ?>
	$("#disability_div").show();
<?php } else { ?>
	$("#disability_div").hide();
<?php } ?>

<?php if ($old_community_class == 'SC' || $old_community_class == 'ST'){ ?>
	$("#com_doc_div").show();
<?php } else { ?>
	$("#com_doc_div").hide();
<?php } ?>

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
       required:false,
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
     dob:{required:true },
     email:{required:true,email:true, remote: {
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
	 pref_trader:{required:true },
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
          required: "",
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
	 pref_trader:"Select Preferred Trade",
    /*  prefer_time:"Select Preferred Time", */
     city:"Enter City Name",
     state:"Enter State Name",
    /*  course:"Select Course", */
     mother_tongue:"Enter Mother Tongue",
     mobile: {
          required: "Enter Mobile number",
          maxlength:"Maximum 10 digits",
          minlength:"Minimum 10 digits",
          remote: "Mobile number Already Exist",
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
		  required:"Select Student's Picture",
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