<?php   
foreach($mobilizer_details as $mobi){
	$mobi_id = $mobi->user_id; 
} 
$month = $consolidate_report['month_name'];
	$sMonth = date("m", strtotime("$month"));
	
?>
<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>M3 - Training Partner Section </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
      <link rel="icon" href="<?php echo base_url(); ?>/assets/fav_icon.png" type="image/gif" sizes="32x32">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->	
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/style.css">
  
</head>

<body>
<div class="container">
<div class="row page_row">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-example-wrap">
			<div class="form-example-int">
					<div class="row page_row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
						<div class="col-lg-8 col-md-3 col-sm-3 col-xs-12">
							<table class="table table-bordered" cellspacing="0" cellpadding="0">
							<tr>
								 <td width="50%" style="font-weight:bold;">PIA Name</td><td  width="50%"><?php echo $consolidate_report['pia_name']; ?></td>
							</tr>
							<tr>
								 <td style="font-weight:bold;">Mobilizer Name</td><td><?php echo $consolidate_report['mob_name']; ?></td>
							</tr>
							<tr>
								 <td style="font-weight:bold;">Reporting Manager</td><td>&nbsp;</td>
							</tr>
							<tr style="height:50px;">
								 <td colspan ="2" ></td>
							</tr>
							<tr>
								 <td colspan ="2" style="text-align:center;background:#000000;font-size:22px;color:#ffffff;font-weight:bold"><?php echo $consolidate_report['month_name']; ?> <?php echo $consolidate_report['year']; ?> - Consolidated Report</td>
							</tr>
							<tr style="height:50px;">
								 <td colspan ="2"></td>
							</tr>
							<tr>
								 <td style="font-weight:bold;"><?php echo $consolidate_report['month_name']; ?> <?php echo $consolidate_report['year']; ?> (in days)</td><td><?php echo $consolidate_report['total_count']; ?></td>
							</tr>
							<tr>
								 <td style="font-weight:bold;">Field work (in days)</td><td><?php echo $consolidate_report['field_count']; ?></td>
							</tr>
							<tr>
								 <td style="font-weight:bold;">Distance Travelled (in kms)</td><td><?php $km_traveled = $consolidate_report['km_travel']; if ($km_traveled >0) { echo number_format($km_traveled,3).' Kms'; } else echo "0"; ?></td>
							</tr>
							<tr>
								 <td style="font-weight:bold;">Office work (in days)</td><td><?php echo $consolidate_report['office_count']; ?></td>
							</tr>
							<tr>
								 <td style="font-weight:bold;">Leave (in days)</td><td><?php echo $consolidate_report['leave_count']; ?></td>
							</tr>
							<tr>
								 <td style="font-weight:bold;">Holiday (in days)</td><td><?php echo $consolidate_report['holiday_count']; ?></td>
							</tr>
							<tr style="height:150px;">
								 <td colspan ="2"></td>
							</tr>
							<tr>
								 <td style="font-weight:bold;">Signature of the Mobilizer</td><td style="font-weight:bold;">Signature of the Reporting Manager</td>
							</tr>
							<tr>
								 <td>Date:</td><td>Date:</td>
							</tr>
							</table>
						</div>
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"><a class="pull-right btn btn-primary btn-xs" href="<?php echo base_url(); ?>staff/consolidate_generateXls/<?php echo base64_encode($mobi_id*98765);?>/<?php echo $consolidate_report['year'];?>/<?php echo $sMonth; ?>"><i class="fa fa-file-excel-o"></i> Export Data</a></div>
						
				   </div>
		</div>
</div>

</div>
</div>
</div>


</body>
</html>