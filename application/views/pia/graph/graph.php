<div class="container">
<div class="row">
<?php //foreach($pia_details as $row){} ?>
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


 <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
			 <div class="col-lg-12 col-md-8 col-sm-7 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Yearly Students</h2>
                            </div>
                        </div>
						<div id="chart_div" style="height:400px;"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Sale Statistic area-->
	
 </div>
</div>
</div>

<script type="text/javascript">
		$('#graph').addClass('active');
</script>

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Years', 'Confirmed', 'Rejected', 'Pending','Average'],
          <?php if (count($yearly_graph) >0) { 
			$i=1;
			$rec_count = count($yearly_graph);
			foreach($yearly_graph as $rows){
				echo "['$rows->create_year',  $rows->confirmed, $rows->rejected, $rows->pending, $rows->average_total]"; if ($i<$rec_count) { echo ",\n";} else {echo "\n"; } 
			$i++;
			}
		}
		?>]);

        var options = {
          title : '',
          vAxis: {title: 'Students',format: '0'},
          hAxis: {title: 'Years'},
          seriesType: 'bars',
          series: {3: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>



