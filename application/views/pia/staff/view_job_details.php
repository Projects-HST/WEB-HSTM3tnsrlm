<?php   
foreach($job_details as $job){
	$work_type_id = $job->work_type_id; 
} ?>
<div class="container">
	<div class="row page_row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
			
			
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Mobilizer's Schedule</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                            <div class="form-group">
           
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Date : </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<?php $date=date_create($job->attendance_date);echo date_format($date,"d-m-Y");  ?>
                                    </div>
									  <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Work/Break : </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<?php echo $job->work_type; ?>
                                    </div>
									 <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
								
                                </div>
								<div id="other_work" class="other_work">
									<div class="row page_row">
										<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
											<label class="hrzn-fm">Title : </label>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<?php echo $job->title; ?>
										</div>
										<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
									</div>
								</div>
								
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Brief : </label>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
                                           <?php echo $job->comments; ?>
                                    </div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                            </div>
							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mobilizer Comments : </label>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
                                           <?php echo $job->mobilizer_comments; ?>
                                    </div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                            </div>
							
	
					</div>
                </div>	
           
                    
            </div>
		</div>
	</div>
	
	<div class="row page_row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-example-wrap">
		
				<div class="form-example-int">
							<div class="row page_row">
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                      	<div class="cmp-tb-hd cmp-int-hd"><h2>Gallery</h2></div>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12"></div>
                           </div>
						   
						   <div class="row page_row" style="margin-top:20px;min-height:100px;">
							<?php if(empty($job_gallery)){ ?>
								<div class="clearfix" style="text-align:center;">No Gallery Found</div>
							<?php }else{
								foreach($job_gallery as $rows){ ?>
								<div class="col-lg-2" style="margin-bottom:5px;">
									<div id="thumbnail">
									<a class="galpop-multiple" data-galpop-group="multiple" href="<?php echo base_url(); ?>assets/task/<?php echo $rows->task_image; ?>">
			<img src="<?php echo base_url(); ?>assets/task/<?php echo $rows->task_image; ?>" alt="" class="img-responsive" style="width:150px;height:100px;" />
		</a>
									</div>
									<div class="clearfix"></div>
								</div>

				<?php
					}
				  } ?>

				</div>
				</div>

				<div class="row page_row">
					<button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right waves-effect">Go Back</button>
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
</style>

<script type="text/javascript">
    $('#staff').addClass('active');
    $('#staffmenu').addClass('active');
	$('#view_mobilizer_list').addClass('active');

	$(document).ready(function() {
		$('.galpop-multiple').galpop();
	});
	
	/* <?php if($work_type_id == '1' ||  $work_type_id == '2') { ?>
		$('.other_work').show();
	<?php } else { ?>
		$('.other_work').hide();
	<?php } ?>
	
	var select_type = jQuery('#select_type');
	select_type.change(function () {
		if ($(this).val() == '1' || $(this).val() == '2') {
			$('.other_work').show();
		} else {
			$('.other_work').hide();
		}
	});
	
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
			t_title: {
			  required: true
			},
			t_desc: {
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
	}); */
	
	/* $("#field_work").hide();
	$("#other_work").hide();
	$('#select_type').prop('disabled', 'disabled');
	$("#task_btn").hide();
	
	var task_date = jQuery('#task_date');
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
			$('#task_btn').hide();
		}
	});
	
	function chktype()
	{ 
			var task_date = document.getElementById('task_date');
			var select_type = document.getElementById('select_type');
			var mob_id = document.getElementById('mob_id');
			
			var task_date = task_date.value;
			var select_type = select_type.value;
			var mob_id = mob_id.value;
		   
			if (select_type=='2')
			{
				$.ajax({
				   type:'post',
				   url:'<?php echo base_url(); ?>staff/chk_jobtype',
				   data:'task_date=' + task_date + '&mob_id=' + mob_id,
				   dataType: 'json',
				   success:function(data)
				   {
					   if (data.status=='Success') {
						   var task_title = data.task_title;
						   var task_id = data.task_id;
						   var leng = task_title.length;
							var i;
							var task_tit = '<option value="">Select</option>';
							
							for (i = 0; i < leng; i++) {
								task_tit  += '<option value="' + task_id[i] + '">' + task_title[i] + '</option>'
							}
							$("#task_title").html(task_tit);
							$('#task_btn').hide();
						} else {
							var task_tit = '<option value="">Select</option>';
							$("#task_title").html(task_tit);
							var task_desc = "";
							$("#task_desc").html(task_desc);
							$('#task_btn').show();
						}
				   }
				});
		   } 
   }
   
   function chktask()
	{ 
			var task_title = document.getElementById('task_title');
			var task_title_id = task_title.value;
			var task_details = "";
		   //alert (task_title_id);
		  // exit;
			if (task_title_id != '')
			{
				$.ajax({
				   type:'post',
				   url:'<?php echo base_url(); ?>staff/chk_task_title',
				   data:'task_title_id=' + task_title_id,
				   dataType: 'json',
				   success:function(data)
				   {
					   if (data.status=='Success') {
						   var task_desc = data.task_desc;
							$("#task_desc").html(task_desc);
						} 
				   }
				});
		   } 
   } */
   
	
	
</script>
