<!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn" style="padding-right:30px;">
                            <p style="font-size:16px;font-weight:bold;line-height:17px;">Data on<br> no. of centers</p>
                        </div>
                        <h2><span class="counter"><?php echo $result['center_count']; ?></span></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn" style="padding-right:30px;">
                            <p style="font-size:16px;font-weight:bold;line-height:17px;">Data on<br> no. of trades</p>
                        </div>
                        <h2><span class="counter"><?php echo $result['trade_count']; ?></span></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn" style="padding-right:30px;">
                            <p style="font-size:16px;font-weight:bold;line-height:17px;">Data on<br> Mobilizers</p>
                        </div>
                        <h2><span class="counter"><?php echo $result['mobilizer_count']; ?></span></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn" style="padding-right:20px;">
                            <p style="font-size:16px;font-weight:bold;line-height:17px;">Data on<br> registered students</p>
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
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                 <h2>Graph and data on students registered every month.</h2>
                            </div>
                        </div>
                        <div id="chart_div" style="height:325px;"></div>
                    </div>
                </div>
				
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
					<div class="rc-it-ltd mg-tb-30" style="min-height:415px;">
                            <div class="recent-items-ctn">
                                <div class="recent-items-title">
                                    <h2>Recent Mobilizers</h2>
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
                                            <p>View All</p>
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
                                    <h2>Recent Task</h2>
                                </div>
                            </div>
							
                            <div class="recent-items-inn">
                                <table class="table table-inner table-vmiddle">
                                    <tbody>
									 <?php $i=1; foreach($dash_tasks as $rows){ ?>
                                        <tr>
											<td style="width:15px;"><?php echo $i; ?>.</h2></td>
											<td><b><?php echo $rows->task_title; ?></b><br><?php echo $rows->user_type_name; ?> - <?php echo $rows->name; ?></td>
                                        </tr>
										 <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
							<?php if (count($dash_tasks) >5){ ?>
							<div class="recent-post-signle">
                                <a href="#">
                                    <div class="recent-post-flex rc-ps-vw">
                                        <div class="recent-post-line rct-pt-mg">
                                            <p>View All</p>
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
                                    <h2>Recent Trade</h2>
                                </div>
                            </div>
                            <div class="recent-items-inn">
                                <table class="table table-inner table-vmiddle">
                                    <tbody>
									 <?php  
									 $i=1; 
									 foreach($dash_trade as $rows){ ?>
                                        <tr>
											<td style="width:15px;"><?php echo $i; ?>.</h2></td>
											<td><b><?php echo $rows->trade_name; ?></b><p></p></td>
                                        </tr>
										 <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
							<?php if (count($dash_trade) >5){ ?>
							<div class="recent-post-signle">
                                <a href="#">
                                    <div class="recent-post-flex rc-ps-vw">
                                        <div class="recent-post-line rct-pt-mg">
                                            <p>View All</p>
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
                                    <h2>Recent Students</h2>
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
                                            <p>View All</p>
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
          ['Month', 'Students'],
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
          vAxis: {title: 'Students Count'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>