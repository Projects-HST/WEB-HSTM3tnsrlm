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
			
			 <form method="post" action="<?php echo base_url(); ?>task/create" class="form-horizontal" enctype="multipart/form-data" id="staffform" >
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Create Task</h2>
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
													<?php foreach($res as $rows){ ?>
                                            <option value="<?php echo $rows->user_id; ?>"><?php echo $rows->name; ?></option>
                                      <?php  } ?>
										</select>
                                    </div>
									 <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
								
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Date <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="text" placeholder="Task date" name="task_date" id="task_date" class="form-control track_date input-sm" />
                                    </div>

									  <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>

								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Title <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Task Title" name="task_title" class="form-control input-sm" maxlength="50">
                                    </div>
								
									<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
								
							
								<div class="row page_row">

								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Description <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
                                           <textarea name="task_desc" MaxLength="150" class="form-control" rows="2" cols="80" placeholder="Task Description"></textarea>
                                    </div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
								<!--
								<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Status</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<select name="status" class="form-control" id="status">
												<option value="Assigned">Assigned</option>
												<option value="Assigned">Completed</option>
									</select>
								</div>
								<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
							</div>
							-->
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
<style>
.page_row{
  margin-bottom: 20px;
}
</style>
<script type="text/javascript">
	$('#task').addClass('active');
	$('#taskmenu').addClass('active');
	$('#create_task').addClass('active');

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
