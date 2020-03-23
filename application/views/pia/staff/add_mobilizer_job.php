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
			
			 <form method="post" action="<?php echo base_url(); ?>staff/add_job" class="form-horizontal" enctype="multipart/form-data" id="staffform" >
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Create Mobilizers Work</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                            <div class="form-group">
           
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
                                        <label class="hrzn-fm">Select type <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="select_type" class="form-control" id="select_type">
													<option value="">Select</option>
													<?php foreach($work_types as $rows){ ?>
                                            <option value="<?php echo $rows->id; ?>"><?php echo $rows->work_type; ?></option>
                                      <?php  } ?>
										</select>
                                    </div>
									 <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
								
                                </div>
								<div id="field_work" class="field_work">
                                    <div class="row page_row">
										<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
											<label class="hrzn-fm">Task Title <span class="error">*</span></label>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<select name="task_title" class="form-control" id="task_title">
													<option value="">Select</option>
											</select>
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
								</div>
								<div id="other_work" class="other_work">
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
								</div>

							<div class="row page_row">
								 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                           <button class="btn btn-success notika-btn-success waves-effect">Assign</button>
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
    $('#staff').addClass('active');
    $('#staffmenu').addClass('active');
	$('#view_mobilizer_list').addClass('active');
	
	$("#field_work").hide();
	$("#other_work").hide();
	$('#select_type').prop('disabled', 'disabled');

	var task_date = jQuery('#task_date');
	//var select = this.value;
	task_date.change(function () {
		if ($(this).val() != '') {
			$('#select_type').prop('disabled', false);
		}
		else {	
			$('#select_type').prop('disabled', 'disabled');
		}
	});


	var select_type = jQuery('#select_type');
	//var select = this.value;
	select_type.change(function () {
		if ($(this).val() == '2') {
			$('.field_work').show();
			$('.other_work').hide();
		}
		else {
			$('.field_work').hide();
			$('.other_work').show();
		}
	});

/* 	var Disability = jQuery('#disability');
	//var select = this.value;
	Disability.change(function () {
		if ($(this).val() == '1') {
			$('.disability_div').show();
		}
		else $('.disability_div').hide(); // hide div if value is not "custom"
	}); */
	
	
	$('#staffform').validate({
      rules: {
			select_type: {
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
		  task_date: "Select date",
          select_type: "Select Type",
          task_title: "Enter title",
          task_desc: "Enter description",
          task_status: "Select status"
      }
	});
</script>
