<div class="container">
<div class="row page_row">
        
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-example-wrap">
				<div class="form-example-int">
							<div class="row page_row">
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
								<div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
								
								
							<table class="table table-bordered">
							<tr>
								 <td width="50%">PIA Name</td><td  width="50%"><?php echo $consolidate_report['pia_name']; ?></td>
							</tr>
							<tr>
								 <td>Mobilizer Name</td><td><?php echo $consolidate_report['mob_name']; ?></td>
							</tr>
							<tr>
								 <td>Reporting Manager</td><td>&nbsp;</td>
							</tr>
							<tr style="height:50px;">
								 <td colspan ="2" ></td>
							</tr>
							<tr>
								 <td colspan ="2" style="text-align:center;background:#000000;font-size:22px;color:#ffffff;"><?php echo $consolidate_report['month_name']; ?> <?php echo $consolidate_report['year']; ?> - Consolidated Report</td>
							</tr>
							<tr style="height:50px;">
								 <td colspan ="2"></td>
							</tr>
							<tr>
								 <td><?php echo $consolidate_report['month_name']; ?> <?php echo $consolidate_report['year']; ?> (in days)</td><td><?php echo $consolidate_report['total_count']; ?></td>
							</tr>
							<tr>
								 <td>Field work (in days)</td><td><?php echo $consolidate_report['field_count']; ?></td>
							</tr>
							<tr>
								 <td>Distance Travelled (in kms)</td><td><?php $km_traveled = $consolidate_report['km_travel']; if ($km_traveled >0) { echo number_format($km_traveled,3); } else echo "0"; ?></td>
							</tr>
							<tr>
								 <td>Office work (in days)</td><td><?php echo $consolidate_report['office_count']; ?></td>
							</tr>
							<tr>
								 <td>Leave (in days)</td><td><?php echo $consolidate_report['leave_count']; ?></td>
							</tr>
							<tr>
								 <td>Holiday (in days)</td><td><?php echo $consolidate_report['holiday_count']; ?></td>
							</tr>
							<tr style="height:150px;">
								 <td colspan ="2"></td>
							</tr>
							<tr>
								 <td>Signature of the Mobilizer</td><td>Signature of the Reporting Manager</td>
							</tr>
							<tr>
								 <td>Date:</td><td>Date:</td>
							</tr>
                           </table>
								
								
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
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

