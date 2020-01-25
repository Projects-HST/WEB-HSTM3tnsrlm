<?php foreach($result as $rows){ } ?>
<div class="container">
<div class="row">
<div class="data-table-area">
<div class="container">
	
 <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="data-table-list">
             <div class="basic-tb-hd">
                 <h2>Tasks Photos for <?php echo $rows->task_title; ?></h2>
             </div>
  				<div class="row page_row" style="margin-top:20px;min-height:250px;">
					<?php if(empty($gallery)){
					  echo "No Gallery Found";
				  }else{
					foreach($gallery as $rows){ ?>
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
     </div>
 </div>
</div>
</div>
<!-- Data Table area End-->
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
$('#task_by_mob').addClass('active');

	$(document).ready(function() {
	$('.galpop-multiple').galpop();

});
</script>
