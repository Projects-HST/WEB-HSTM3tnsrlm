<div class="container">
<div class="row page_row">
        
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-example-wrap">
				<div class="form-example-int">
							<div class="row page_row">
								
								<div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
								
								
							<table class="table table-bordered">
							<tr>
								 <td colspan="2">PIA Name</td><td colspan="7"><?php echo $detailed_report['pia_name']; ?></td>
							</tr>
							<tr>
								 <td colspan="2">Mobilizer Name</td><td colspan="7"><?php echo $detailed_report['mob_name']; ?></td>
							</tr>
							<tr>
								 <td colspan="2">Reporting Manager</td><td colspan="7">&nbsp;</td>
							</tr>
							<tr style="height:50px;">
								 <td colspan ="9" ></td>
							</tr>
							<tr>
								 <td colspan ="9" style="text-align:center;background:#000000;font-size:22px;color:#ffffff;"><?php echo $detailed_report['month_name']; ?> <?php echo $detailed_report['year']; ?> - Monthly Report</td>
							</tr>
							<tr style="height:50px;">
								 <td colspan ="9"></td>
							</tr>
							<?php if (count($detailed_report_list) >0 ){ 
							
							?>
							<tr >
								 <td>Date</td>
								 <td>Day</td>
								 <td>Task Type</td>
								 <td>Distance Travelled in kms</td>
								 <td>Task Title</td>
								 <td>Task in detail</td>
								 <td>Mobilizer Comments</td>
								 <td>Task was added & edited on</td>
								 <td>Review Comments by Reporting Manager</td>
							</tr>
								<?php 
									$i=1;
									$km_traveled = 0;
									foreach($detailed_report_list as $rows){  
										$mob_id = $rows->mobilizer_id;
										$sdate = $rows->attendance_date;
										$km_traveled = $rows->km;
										$nameOfDay = date('l', strtotime($sdate));
										
										/* $km_cal = $this->staffmodel->calc_distance($mob_id,$sdate);
										foreach($km_cal as $km){  
											$km_traveled = $km->km;
										} */
								?>
							<tr>
								 <td width="5%"><?php $date=date_create($rows->attendance_date);echo date_format($date,"d-m-Y");  ?></td>
								 <td width="5%"><?php echo $nameOfDay; ?></td>
								 <td width="10%"><?php echo $rows->work_type; ?></td>
								 <td width="10%"><?php if ($km_traveled >0) { echo number_format($km_traveled,3); } else echo "N/A"; ?></td>
								 <td width="10%"><?php echo $rows->title; ?></td>
								 <td width="10%"><?php echo $rows->comments; ?></td>
								 <td width="10%"><?php echo $rows->mobilizer_comments; ?></td>
								 <td width="10%"><?php echo $rows->created_at; ?> <?php $updated_by = $rows->updated_by;  if ($updated_by != 0) { echo $rows->updated_at; }?>  </td>
								 <td width="10%"></td>
								<?php  $i++; } ?>
							</tr>
							<?php } else { ?>
							<tr>
								 <td colspan = "9" style="text-align:center;"><p> No Recods Found!..</p></td>
							</tr>
							<?php } ?>
							<tr style="height:150px;">
								 <td colspan ="9"></td>
							</tr>
							<tr>
								 <td colspan="5">Signature of the Mobilizer</td><td colspan="4">Signature of the Reporting Manager</td>
							</tr>
							<tr>
								 <td colspan="5">Date:</td><td colspan="4">Date:</td>
							</tr>
                           </table>

								</div>
								
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
    $('#staff').addClass('active');
    $('#staffmenu').addClass('active');
	$('#view_mobilizer_list').addClass('active');
</script>

