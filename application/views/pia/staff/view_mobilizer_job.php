<?php   foreach($mobilizer_details as $mobi){} ?>
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
		</div>
		</div>
			<form method="post" action="<?php echo base_url(); ?>staff/view_mobilizer_job/<?php echo base64_encode($mobi->user_id*98765); ?>" class="form-horizontal" enctype="multipart/form-data" id="search_form">
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
					
					<div class="cmp-tb-hd cmp-int-hd">
						<h2>Mobilizer - <?php echo $mobi->name;; ?></h2>
					</div>
					<div class="form-example-int">

							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <select name="year" class="form-control" id="year" onchange="chkmonth();">
											<option value="">Select Year</option>
											<?php if (count($job_years) >0){
											 foreach($job_years as $rows){  ?>
												<option value="<?php echo $rows->years; ?>"><?php echo $rows->years; ?></option>
											<?php }
											} else {
												$year = date("Y");  
												?>
											<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
											<?php } ?>
									</select><script>$('#year').val('<?php echo $year; ?>');</script>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<select name="month" class="form-control" id="month">
											<option value="">Select Month</option>
											<option selected value="01">January</option>
											<option value="02">February</option>
											<option value="03">March</option>
											<option value="04">April</option>
											<option value="05">May</option>
											<option value="06">June</option>
											<option value="07">July</option>
											<option value="08">August</option>
											<option value="09">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
											</select>
									</select><script>$('#month').val('<?php echo $month; ?>');</script>
                                    </div>
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
											<button class="btn btn-success notika-btn-success waves-effect">SEARCH</button>
									</div>
									 <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
							</div>
						</div>	

            </div>
		</div>
	</div>
	</form>



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
											<a href="<?php echo base_url(); ?>staff/add_mobilizer_job/<?php echo base64_encode($mobi->user_id*98765); ?>" style="font-weight:bold;color:#ffffff;"><img src="<?php echo base_url(); ?>assets/images/download.png" alt="Add Work" title="Download">&nbsp; Add Work</a>
										</div>
                                    </div>
                           </div>
							<div class="row page_row">
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;"><?php echo $consolidate_report['month_name']; ?> 2020 <span style="float:right;color:#e3242b;"><?php echo $consolidate_report['total_count']; ?> Days</span></p>
										</div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">Field work <span style="float:right;color:#e3242b;"><?php echo $consolidate_report['field_count']; ?> Days</span></p>
										</div>
                                    </div>
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">Distance Travelled <span style="float:right;color:#e3242b;"><?php 
											$km_traveled = $consolidate_report['km_travel'];
											if ($km_traveled >0) { echo number_format($km_traveled,3); } else echo "0"; ?> KM</span></p>
										</div>
                                    </div>
                           </div>
						  <div class="row page_row" style="padding-bottom:10px;">
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">Office work <span style="float:right;color:#e3242b;"><?php echo $consolidate_report['office_count']; ?> Days</span></p>
										</div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">Leave <span style="float:right;color:#e3242b;"><?php echo $consolidate_report['leave_count']; ?> Days</span></p>
										</div>
                                    </div>
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <div class="modal-inner-pro" style="border:1px solid #d1d2d4;">
											<p style="margin:10px;font-weight:bold;">Holiday <span style="float:right;color:#e3242b;"><?php echo $consolidate_report['holiday_count']; ?> Days</span></p>
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
			<div class="normal-table-list">
                        <div class="basic-tb-hd">
                            <h2>Work Details</h2>
                        </div>
                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
							
							<?php if (count($mob_jobs) >0 ){ ?>
                                <thead>
                                    <tr>
										<th width="5%">S.no</th>
										<th width="10%">Date</th>
										<th width="10%">Day</th>
										<th width="15%">Task Type</th>
										<th width="35%">Task Title</th>
										<th width="15%">Status</th>
										<th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php $i=1; foreach($mob_jobs as $rows){  
									$sdate = $rows->attendance_date;
									//$date = '2020-03-24';
									$nameOfDay = date('l', strtotime($sdate));
								?>
							<tr>
								 <td><?php echo $i; ?></td>
								 <td><?php $date=date_create($rows->attendance_date);echo date_format($date,"d-m-Y");  ?></td>
								 <td><?php echo $nameOfDay; ?></td>
								 <td><?php echo $rows->work_type; ?></td>
								 <td><?php echo $rows->title; ?></td>
								  <td><?php echo $rows->status; ?></td>
								  <td>
								  <a href="<?php echo base_url(); ?>staff/view_job_details/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="View Work"><i class="fa fa-eye" aria-hidden="true" style="font-size:20px;"></i> &nbsp;&nbsp; <a href="<?php echo base_url(); ?>staff/edit_mobilizer_job/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Edit Work"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
							</tr>
							<?php  $i++; } ?>
							<?php } else { ?>
							<tr>
								 <td colspan = "6" style="text-align:center;"><p> No Recods Found!..</p></td>
							</tr>
							<?php } ?>
                                </tbody>
                            </table>
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
    $('#staff').addClass('active');
    $('#staffmenu').addClass('active');
	$('#view_mobilizer_list').addClass('active');
	
	$('#search_form').validate({
      rules: {
			year: {
				required: true
			},
			month: {
			  required: true
			}
      },
      messages: {
		  year: "Select Year",
          month: "Select Month"
      }
	});
	
	function chkmonth()
	{ 
	var year = document.getElementById('year');
	var syear = year.value;
	var staff_id = '<?php echo base64_encode($mobi->user_id*98765); ?>';
		
		$.ajax({
		   type:'post',
		   url:'<?php echo base_url(); ?>staff/chk_month',
		   data:'staff_id=' + staff_id + '&syear=' + syear,
		   dataType: 'json',
		   success:function(data)
		   {
			   if (data.status=='Success') {
				   var month_id = data.month_id;
				   var months = data.months;
				   var leng = months.length;
					var i;
					var job_month = '<option value="">Select</option>';
					for (i = 0; i < leng; i++) {
						job_month  += '<option value="' + month_id[i] + '">' + months[i] + '</option>'
					}
					$("#month").html(job_month);
				} else {
					var job_month = '<option value="">Select</option><option selected value="01">January</option><option value="02">February</option><option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>';
					$("#month").html(job_month);
				}
		   }
		});
   }
</script>

