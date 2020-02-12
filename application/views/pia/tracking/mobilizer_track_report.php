<?php  foreach($mob_details as $mobdetails){} ?>
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

			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="form-example-wrap">
					
					<form method="post" action="<?php echo base_url(); ?>tracking/mobilizer_track_report/<?php echo $mobid; ?>" class="form-horizontal" enctype="multipart/form-data" id="piaform">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Mobilizer Tracking Report - <?php echo $mobdetails->name; ?><span style="float:right;"><a href="<?php echo base_url(); ?>tracking/home">Mobilizer List</a></span></h2>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row page_row" style="padding-left:13px;padding-top:5px;">
									
                                    <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm" >From Date</label>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
										<input type="text" placeholder="Select Date" name="from_date" id="from_date" class="form-control from_date input-sm" value="<?php $from_date=date_create($from_date);echo date_format($from_date,"d-m-Y");  ?>" />
                                        </div>
                                    </div>						
									<div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">To Date</label>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
										<input type="text" placeholder="Select Date" name="to_date" id="to_date" class="form-control to_date input-sm" value="<?php $to_date=date_create($to_date); echo date_format($to_date,"d-m-Y");  ?>" />
                                        </div>
                                    </div>
									 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<input type="hidden" name="mob_id" value="<?php echo $mob_id; ?>">
                                        <button class="btn btn-success notika-btn-success waves-effect">Search</button>
                                    </div>									
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12" style="text-align:right"></div>
                                </div>

                            </div>
                        </div>
					</form>
                    </div>
                </div>
			</div>
							
					<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">	
			<div class="form-example-wrap">				
             <div class="table-responsive">
                 <table id="data-table-export" class="table table-striped" style="width:100%">
                     <thead>
                         <tr>
                             <th>S.no</th>
                             <th>Travel Date</th>
                             <th>KM Traveled</th>
                         </tr>
                     </thead>
                     <tbody>
					 
                       <?php 
					   
					   if (count($kms_travel) >0){
					   $total_km = 0;
					   $i=1; foreach($kms_travel as $rows){ 
					   $travel_km = $rows->km;
					   ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php $tr_date=date_create($rows->created_at);echo date_format($tr_date,"d-m-Y");  ?></td>
                             <td><?php echo number_format($travel_km,3); ?> KM</td>
						</tr>
					<?php  $total_km = $travel_km + $total_km; $i++; } ?>
					 <tr>
                             <td></td>
                             <td><b>Total</b></td>
                             <td><b><?php echo number_format($total_km,3); ?> KM</b></td>
						</tr>
					   <?php } ?>
                     </tbody>

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
  margin-bottom: 20px;
}
div.dt-buttons{
	position:relative;
	float:right;
}
</style>

<script>
    $('#tracking').addClass('active');


</script>
