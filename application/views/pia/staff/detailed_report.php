<?php
foreach($mobilizer_details as $mobi){
	$mobi_id = $mobi->user_id;
}

$month_id = trim($detailed_report['month_id']);
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
		<style type="text/css" media="print">
		    /* .page
		    {
		     -webkit-transform: rotate(-90deg);
		     -moz-transform:rotate(-90deg);
		     filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
		    } */
				td{
					width: 80px;
				}
		</style>
</head>

<body>


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page">
			<div class="form-example-wrap">
				<div class="form-example-int">
				<div class="page_row">
					<div class="col-lg-8 col-md-3 col-sm-3 col-xs-12"></div>

						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							<div class="modal-inner-pro" style="background:#848585;padding:5px;">
								<a href="<?php echo base_url(); ?>staff/detailed_generateXls/<?php echo base64_encode($mobi_id*98765);?>/<?php echo $detailed_report['year'];?>/<?php echo $month_id; ?>" style="font-size:14px;font-weight:bold;color:#ffffff;"><img src="<?php echo base_url(); ?>assets/images/excel_icon.png" alt="Export Detailed Report" title="Export Detailed Report">&nbsp; Download EXCEL</a>
							</div>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:20px;">
						<div class="modal-inner-pro" style="background:#848585;padding:5px;">
						<a onclick="printDiv('printableArea')" style="font-size:14px;font-weight:bold;color:#ffffff;cursor:pointer;"><img src="<?php echo base_url(); ?>assets/images/pdf_icon.png" alt="Export Detailed Report" title="Export Detailed Report">&nbsp; Download PDF</a
						</div>
					</div>
				</div>
							<div class="row page_row">

							<div class="col-lg-12 col-md-3 col-sm-3 col-xs-12" id="printableArea">

							<table class="table table-bordered" cellspacing="0" cellpadding="0">
							<tr>
								 <td colspan="2" style="font-weight:bold;">PIA Name</td><td colspan="6"><?php echo $detailed_report['pia_name']; ?></td><td style="width:13%;">

							</div>
							</td>

							</tr>
							<tr>
								 <td colspan="2" style="font-weight:bold;">Mobilizer Name</td><td colspan="7" style=""><?php echo $detailed_report['mob_name']; ?></td>
							</tr>
							<tr>
								 <td colspan="2" style="font-weight:bold;">Reporting Manager</td><td colspan="7" style="">&nbsp;</td>
							</tr>
							<tr style="height:50px;">
								 <td colspan ="9"></td>
							</tr>
							<tr>
								 <td colspan ="9" style="text-align:center;background:#000000;font-size:22px;color:#ffffff;font-weight:bold"><?php echo $detailed_report['month_name']; ?> <?php echo $detailed_report['year']; ?> - Monthly Report</td>
							</tr>
							<tr style="height:50px;">
								 <td colspan ="9"></td>
							</tr>
							<?php if (count($detailed_report_list) >0 ){

							?>
							<tr >
								 <td style="font-weight:bold;">Date</td>
								 <td style="font-weight:bold;">Day</td>
								 <td style="font-weight:bold;">Task Type</td>
								 <td style="font-weight:bold;">Distance <br>Travelled</td>
								 <td style="font-weight:bold;">Task Title</td>
								 <td style="font-weight:bold;width:200px;">Task Details</td>
								 <td style="font-weight:bold;">Mobilizer <br>Comments</td>
								 <td style="font-weight:bold;">Task Added & <br>Edited </td>
								 <td style="font-weight:bold;">Review by <br>Reporting Manager</td>
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
								 <td width="5%" style=""><?php $date=date_create($rows->attendance_date);echo date_format($date,"d-m-Y");  ?></td>
								 <td width="5%" style=""><?php echo $nameOfDay; ?></td>
								 <td width="10%" style=""><?php echo $rows->work_type; ?></td>
								 <td width="8%" style=""><?php if ($km_traveled >0) { echo number_format($km_traveled,3)." Kms"; } else echo "N/A"; ?></td>
								 <td width="10%" style=""><?php echo $rows->title; ?></td>
								 <td width="10%" style=""><?php echo $rows->comments; ?></td>
								 <td width="10%" style=""><?php echo $rows->mobilizer_comments; ?></td>
								 <td width="12%" style=""><?php echo $rows->created_at; ?> <?php $updated_by = $rows->updated_by;  if ($updated_by > 0) { echo $rows->updated_at; }?>  </td>
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
								 <td colspan="5" style="font-weight:bold;">Signature of the Mobilizer</td><td colspan="4" style="font-weight:bold;">Signature of the Reporting Manager</td>
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


<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>
