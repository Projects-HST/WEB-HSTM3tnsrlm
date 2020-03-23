<?php   foreach($mobilizer_details as $mobi){} ?>
	<div class="container">
			<?php if($this->session->flashdata('msg')): ?>
			<div class="row page_row">
			 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"×</button><?php echo $this->session->flashdata('msg'); ?></div>
			</div>
			</div>
			<?php endif; ?>
			<form method="post" action="<?php echo base_url(); ?>staff/view_mobilizer_job/<?php echo base64_encode($mobi->id*98765); ?>" class="form-horizontal" enctype="multipart/form-data" id="admissionform">
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
					
					<div class="cmp-tb-hd cmp-int-hd">
						<h2>Mobilizer - <?php echo $mobi->name;; ?></h2>
					</div>

					<div class="form-example-int">

							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <select name="qualification" class="form-control" id="qualification">
											<option value="">Select Year</option>
											<option value="School">School</option>
											<option value="UG">UG</option>
											<option value="PG">PG</option>
											<option value="Diploma">Diploma</option>
											<option value="Others">Others</option>
									</select>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<select name="qualification" class="form-control" id="qualification">
											<option value="">Select Month</option>
											<option value="School">School</option>
											<option value="UG">UG</option>
											<option value="PG">PG</option>
											<option value="Diploma">Diploma</option>
											<option value="Others">Others</option>
									</select>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12"><button class="btn btn-success notika-btn-success waves-effect">SEARCH</button></div>
									 <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
                                    
							</div>
					  
							
						</div>	
   
            </div>
		</div>
	</div>
	



	<div class="row page_row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-example-wrap">
		
				<div class="form-example-int">
							<div class="row page_row">
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                      	<div class="cmp-tb-hd cmp-int-hd"><h2>Consolidated Report</h2></div>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12"></div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12" style="text-align:center;">
                                       <div class="modal-inner-pro" style="background:#848585;padding:5px;">
											<a href="<?php echo base_url(); ?>staff/add_mobilizer_job/<?php echo base64_encode($mobi->id*98765); ?>" style="font-weight:bold;color:#ffffff;"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Add Work" title="Download">&nbsp; Add Work</a>
										</div>
                                    </div>
                           </div>
							<div class="row page_row">
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">March 2020 <span style="float:right;color:#e3242b;">30 Days</span></p>
										</div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">Field work <span style="float:right;color:#e3242b;">30 Days</span></p>
										</div>
                                    </div>
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">Distance Travelled <span style="float:right;color:#e3242b;">30 Days</span></p>
										</div>
                                    </div>
                           </div>
						  <div class="row page_row" style="padding-bottom:10px;">
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">Office work <span style="float:right;color:#e3242b;">30 Days</span></p>
										</div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">Leave <span style="float:right;color:#e3242b;">30 Days</span></p>
										</div>
                                    </div>
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">Holiday <span style="float:right;color:#e3242b;">30 Days</span></p>
										</div>
                                    </div>
                           </div>
						   <hr>
						   <div class="row page_row" style="padding-top:10px;">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="text-align:center;">
                                        <div class="modal-inner-pro" style="background:#e0e1e2;">
											<a href="#" style="font-weight:bold;"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Download" title="Download">&nbsp;Consolidated Report</a>
										</div>
                                    </div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="text-align:center;">
                                        <div class="modal-inner-pro" style="background:#e0e1e2;">
											<a href="#" style="font-weight:bold;"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Download" title="Download">&nbsp; Detailed Report</a>
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
				<h2>Work Details</h2>
			</div>
				
			<div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
                             <th>S.no</th>
                             <th>Date</th>
                             <th>Day</th>
                             <th>Task Type</th>
                             <th>Task Title</th>
                              <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($result as $rows){ ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php echo $rows->name; ?></td>
                             <td><?php echo $rows->email; ?></td>
                             <td><?php echo $rows->phone; ?></td>
                             <td><?php if($rows->status=='Active'){ ?><span class="green">Active</span><?php }else{ ?><span class="red">Inactive</span><?php } ?></td>
                              <td>
							  <a href="<?php echo base_url(); ?>admission/view_mob_work/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="View Prospects"><i class="fa fa-eye" aria-hidden="true" style="font-size:20px;"></i> &nbsp;&nbsp; <a href="<?php echo base_url(); ?>admission/edit_mob_work/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Edit Prospects"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
                         </tr>
<?php  $i++; } ?>
                     </tbody>

                 </table>
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
    $('#staff').addClass('active');
    $('#staffmenu').addClass('active');
	$('#view_mobilizer_list').addClass('active');
</script>

