<!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn" style="padding-right:30px;">
                            <p style="font-size:16px;font-weight:bold;line-height:17px;">No of <br> training centers</p>
                        </div>
                        <h2><span class="counter"><?php echo $result['center_count']; ?></span></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn" style="padding-right:30px;">
                            <p style="font-size:16px;font-weight:bold;line-height:17px;">No of <br> courses offered</p>
                        </div>
                        <h2><span class="counter"><?php echo $result['trade_count']; ?></span></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn" style="padding-right:30px;">
                            <p style="font-size:16px;font-weight:bold;line-height:17px;">No of <br> mobilizers deployed</p>
                        </div>
                        <h2><span class="counter"><?php echo $result['mobilizer_count']; ?></span></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn" style="padding-right:20px;">
                            <p style="font-size:16px;font-weight:bold;line-height:17px;">No of <br> registered candidates</p>
                        </div>
                        <h2><span class="counter"><?php echo $result['student_count']; ?></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->
	
	 <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
			 <div class="col-lg-12 col-md-8 col-sm-7 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Statistics</h2>
                            </div>
                        </div>
						<?php if (count($pia_graph_details) >0) { ?>
							<div id="chart_div" style="height:400px;"></div>
						<?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Sale Statistic area-->
	
	
    
	

 <!-- Start Email Statistic area-->
    <div class="notika-email-post-area">
        <div class="container">
            <div class="row">
			
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd" style="min-height:400px;">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2>Recently added mobilizers</h2>
                                </div>
                            </div>
							
                            <div class="recent-items-inn">
                                <table class="table table-inner table-vmiddle">
                                    <tbody>
									 <?php  
									 $i=1; 
									 foreach($dash_mobilizer as $rows){ ?>
                                        <tr>
											<td style="width:10px;"><?php echo $i; ?>.</h2></td>
											<td><b><?php echo $rows->name; ?></b><br>Students : <?php echo $rows->stud_count; ?></td>
                                        </tr>
										 <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
						<?php if (count($dash_mobilizer) >5){ ?>
							<div class="recent-post-signle">
                                <a href="#">
                                    <div class="recent-post-flex rc-ps-vw">
                                        <div class="recent-post-line rct-pt-mg">
                                            <p><a href="<?php echo base_url(); ?>admin/pia_mobilizer_list/<?php echo $piaid; ?>">View All</a></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
				
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd" style="min-height:400px;">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2>Recently added training centers</h2>
                                </div>
                            </div>
                            <div class="recent-items-inn">
                                <table class="table table-inner table-vmiddle">
                                    <tbody>
									 <?php  
									 $i=1; 
									 foreach($dash_centers as $rows){ ?>
                                        <tr>
											<td style="width:15px;"><?php echo $i; ?>.</h2></td>
											<td><b><?php echo $rows->center_name; ?></b><p></p></td>
                                        </tr>
										 <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
							<?php if (count($dash_centers) >5){ ?>
							<div class="recent-post-signle">
                                <a href="#">
                                    <div class="recent-post-flex rc-ps-vw">
                                        <div class="recent-post-line rct-pt-mg">
                                            <p><a href="<?php echo base_url(); ?>admin/pia_center_list/<?php echo $piaid; ?>">View All</a></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
			
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                        <div class="rc-it-ltd" style="min-height:400px;">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2>Recently registered candidates</h2>
                                </div>
                            </div>
                            <div class="recent-items-inn">
                                <table class="table table-inner table-vmiddle">
                                    <tbody>
									 <?php $i=1; foreach($dash_students as $rows){ ?>
                                        <tr>
											<td style="width:15px;"><?php echo $i; ?></h2></td>
											<td><b><?php echo $rows->name; ?></b><br><?php echo $rows->city ; ?></td>
                                        </tr>
										 <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
							<?php if (count($dash_students) >5){ ?>
							<div class="recent-post-signle">
                                <a href="#">
                                    <div class="recent-post-flex rc-ps-vw">
                                        <div class="recent-post-line rct-pt-mg">
                                             <p><a href="<?php echo base_url(); ?>admin/pia_student_list/<?php echo $piaid; ?>">View All</a></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
				
               
            </div>
        </div>
    </div>
    <!-- End Email Statistic area-->
<script type="text/javascript">
    $('#pia').addClass('active');
    $('#piamenu').addClass('active');
	$('#pia_dash').addClass('active');
</script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Candidates'],
          <?php if (count($pia_graph_details) >0) { 
			$i=1;
			$rec_count = count($pia_graph_details);
			foreach($pia_graph_details as $rows){
				echo "['$rows->month',  $rows->stu_count]"; if ($i<$rec_count) { echo ",\n";} else {echo "\n"; } 
			$i++;
			}
		}
		?>]);

        var options = {
          title : '',
          vAxis: {title: 'Candidates',format: '0'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>