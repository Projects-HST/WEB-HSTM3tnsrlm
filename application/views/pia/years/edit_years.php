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
			
			<?php foreach($res as $rows){
				 $frm_date = $rows->period_from;
				 $to_date = $rows->period_to;
			} ?>
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
			
			<form method="post" action="#" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Update Period Plan</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                            <div class="form-group">
           
		   
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">From</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										 <input type="text"  name="from_month" id="from_year" class="form-control from_date input-sm" value="<?php $date1=date_create($frm_date);echo date_format($date1,"d-m-Y");  ?>" >
                                    </div>
									<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"> </div>
                            </div>
								
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">To</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											 <input type="text" name="end_month" id="to_year"  class="form-control from_date input-sm" value="<?php $date2=date_create($to_date);echo date_format($date2,"d-m-Y");  ?>">
                                    </div>
                                   <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
							</div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Status</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<select name="status" class="form-control" id="status">
												<option value="Active">Active</option>
												<option value="Inactive">Inactive</option>
									</select><script> $('#status').val('<?php echo $rows->status; ?>');</script>
								</div>
                                   <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
							</div>
								
							
							<div class="row page_row">
								 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="hidden"  name="year_id" id="year_id" class="" value="<?php echo base64_encode($rows->id*98765); ?>" >
                                           <button class="btn btn-success notika-btn-success waves-effect">Update</button>
                                    </div>
								<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
								</div>
							</div>
							
								
					</div>
                </div>	
              </form>
                    
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
</style>



<script type="text/javascript">
$('#masters').addClass('active');
$('#mastersmenu').addClass('active');


$("#myformsection").validate({
       rules: {
           from_month:{required:true },
           end_month:{required:true },
		   status:{required:true}
       },
       messages: {
             from_month:"Select from period",
             end_month:"Select end period",
			  status:"Select status"
       },
		submitHandler: function(form) {
		$.ajax({
                 url: "<?php echo base_url(); ?>years/update_year",
                 type: 'POST',
                 data: $('#myformsection').serialize(),
                 success: function(response) {
                     if (response=="Updated") {
                       $.toast({
                                 heading: 'Successfully',
                                 text: response,
                                 position: 'mid-center',
                                 icon:'success',
                                 stack: false
                             })
                              window.setTimeout(function(){location.reload()},3000);
                              window.location = "<?php echo base_url(); ?>years/config";
                     }else{
                       $.toast({
                                 heading: 'Error',
                                 text: response,
                                 position: 'mid-center',
                                 icon:'error',
                                 stack: false
                             })
                     }
                 }
             });
           }
   });



</script>
