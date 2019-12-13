 <?php foreach($result as $rows){ } ?>
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
			
			 <form method="post" action="<?php echo base_url(); ?>task/update_task" class="form-horizontal" enctype="multipart/form-data" id="staffform" >
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Update Task</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                            <div class="form-group">
           
		   
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Mobilizer <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="select_user" class="form-control" id="select_user">
													<option value="">Select</option>
													<?php foreach($res as $row){ ?>
															<option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
													<?php  } ?>
										</select><script> $('#select_user').val('<?php echo $rows->user_id; ?>');</script>
                                    </div>
									 <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
								
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Date <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="text" placeholder="Task date" name="task_date" id="task_date" class="form-control track_date input-sm" value="<?php $date=date_create($rows->task_date);echo date_format($date,"d-m-Y");  ?>" />
                                    </div>

									  <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>

								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Title <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Task Title" name="task_title" class="form-control input-sm" maxlength="50" value="<?php echo $rows->task_title; ?>">
                                    </div>
								
									<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
								
							
								<div class="row page_row">

								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Description <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
                                           <textarea name="task_desc" MaxLength="150" class="form-control" rows="2" cols="80" placeholder="Task Description"><?php echo $rows->task_description; ?></textarea>
                                    </div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
								
								<div class="row page_row">

								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Comments </label>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
                                           <textarea name="task_comments" MaxLength="150" class="form-control" rows="2" cols="80" placeholder="Task Comments"><?php echo $rows->task_comments; ?></textarea>
                                    </div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
								
								<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Status <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<select name="status" class="form-control" id="status">
										<option value="Assigned">Assigned</option>
										<option value="Ongoing">Ongoing</option>
										<option value="Completed">Completed</option>
									</select><script> $('#status').val('<?php echo $rows->status; ?>');</script>
								</div>
								<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
							</div>
							<div class="row page_row">
								 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="hidden" name="task_id" class="form-control" placeholder="" value="<?php echo base64_encode($rows->id*98765); ?>"/>
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
	$('#task').addClass('active');
	$('#taskmenu').addClass('active');
	$('#task_by_you').addClass('active');

	$('#staffform').validate({
      rules: {
			select_user: {
				required: true
			},
			task_date: {
              required: true
          },
          task_title: {
              required: true
          },
          task_desc: {
              required: true
          },
          task_status: {
              required: true
          }
      },
      messages: {
          select_user: "Select mobilizer",
          task_title: "Enter title",
          task_desc: "Enter description",
          task_date: "Select date",
          task_status: "Select status"
      }
	});
</script>
