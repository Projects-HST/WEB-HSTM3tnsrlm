 <?php  foreach ($res as $rows){} ?>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
			
					 <form method="post" action="<?php echo base_url(); ?>trade/update_trade" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
					<div class="cmp-tb-hd cmp-int-hd">
						<h2>Update Trade</h2>
					</div>
						
					<div class="form-example-int form-horizental">
                       <div class="form-group">
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Trade Name <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text"  name="trade_name" id="trade_name" class="form-control " value="<?php echo $rows->trade_name; ?>" maxlength="30">
                                    </div>
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"> </div>
                            </div>
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Status <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<select name="status" class="form-control valid" id="status">
												<option value="Active">Active</option>
												<option value="Inactive">Inactive</option>
									</select><script> $('#status').val('<?php echo $rows->status; ?>');</script>
                                    </div>
									<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"> </div>
                            </div>									
							<div class="row page_row">
								 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="hidden" name="trade_id" value="<?php echo base64_encode($rows->id*98765); ?>">
										<button type="submit" class="btn btn-success notika-btn-success waves-effect">Update</button>
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
	$('#trade').addClass('active');
	
$("#myformsection").validate({
       rules: {
           trade_name:{required:true },
           status:{required:true}
       },
       messages: {
		    trade_name:"Enter trade name",
            status:"Select status"
           }
   });
</script>
