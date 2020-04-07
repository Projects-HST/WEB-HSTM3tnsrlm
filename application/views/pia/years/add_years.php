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
			
			<form method="post" action="<?php echo base_url(); ?>years/create" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Create Project Timeline</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                            <div class="form-group">
           
		   
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">From Date <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										 <input type="text"  name="from_month" id="from_year" class="form-control from_date input-sm" maxlength="15" >
                                    </div>
									<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"> </div>
                            </div>
								
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">To Date <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											 <input type="text" name="end_month" id="to_year"  class="form-control from_date input-sm" maxlength="15">
                                    </div>
                                   <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
							</div>
							
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Status <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<select name="status" class="form-control" id="status">
												<option value="Active">Active</option>
												<option value="Inactive">Inactive</option>
									</select>
								</div>
                                   <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
							</div>
								
							
							<div class="row page_row">
								 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                           <button class="btn btn-success notika-btn-success waves-effect">Create</button>
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

<div class="container">
	<div class="row page_row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	  <div class="data-table-list">
             <div class="basic-tb-hd">
                 <h2>Project Timelines</h2>
             </div>
             <div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
							<th>S.No</th>
							<th>From</th>
							<th>To</th>
							<th>Status</th>
							<th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($result as $rows){ 
					   $frm_date = $rows->period_from;
					   $to_date = $rows->period_to;
					  
					   ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td> <?php $date1=date_create($frm_date);echo date_format($date1,"d-m-Y");  ?></td>
                             <td> <?php $date2=date_create($to_date);echo date_format($date2,"d-m-Y");  ?></td>
                             <td><?php if($rows->status=='Active'){ ?><span class="green">Active</span><?php }else{ ?><span class="red">Inactive</span><?php } ?></td>
                             <td><a href="<?php echo base_url(); ?>years/edit_years/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Edit project timeline"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:22px;"></i></a></td>
                         </tr>
						<?php  $i++; } ?>

                     </tbody>

                 </table>
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
$('#period_plan').addClass('active');

$("#myformsection").validate({
       rules: {
           from_month:{required:true },
           end_month:{required:true },
		   status:{required:true}
       },
       messages: {
             from_month:"Select 'From' date",
             end_month:"Select 'To' date",
			  status:"Set a status"
       },
	
		submitHandler: function(form) {
		$.ajax({
                 url: "<?php echo base_url(); ?>years/create",
                 type: 'POST',
                 data: $('#myformsection').serialize(),
                 success: function(response) {
                     if (response=="success") {
                       $.toast({
                                 heading: 'Success',
                                 text: 'You have just created a project timeline!',
                                 position: 'mid-center',
                                 icon:'success',
                                 stack: false
                             })
                             window.setTimeout(function(){location.reload()},2000);
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
