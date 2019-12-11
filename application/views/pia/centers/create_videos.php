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
			
					<form method="post" action="<?php echo base_url(); ?>center/videos" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
					<div class="cmp-tb-hd cmp-int-hd">
						<h2>Center Videos</h2>
					</div>
						
					<div class="form-example-int form-horizental">
                       <div class="form-group">
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Video Title</label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="video_title" id="video_title" class="form-control" required>
                                    </div>
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"> </div>
                            </div>
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">video URL Link</label>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
										<input type="text" name="video_link" id="video_link" class="form-control" required placeholder="Youtube Token E.g=d3OZVsHG9TM">
                                        <small>https://www.youtube.com/watch?v=</small>
                                    </div>
									<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"> </div>
                            </div>									
							<div class="row page_row">
								 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										 <input type="hidden" class="form-control" name="center_id" value="<?php echo $this->uri->segment(3); ?>">
										<button class="btn btn-success notika-btn-success waves-effect">Upload</button>
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
                   
		<div class="row page_row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<div class="form-example-wrap">
									
									<div class="cmp-tb-hd cmp-int-hd">
                                        <h2>List  Videos </h2>
                                    </div>
									
                                    <div class="table-responsive">
                                        <table id="data-table-basic" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Video title</th>

                                                    <th>vidoe link</th>

                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php $i=1; foreach($result as $rows){ ?>


                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $rows->video_title; ?></td>

                                                    <td><a target="_blank" href="https://www.youtube.com/watch?v=<?php echo $rows->center_videos; ?>">Click to view</a></td>

                                                    <td><?php if($rows->status=='Active'){ ?>
                                                       <button class="btn btn-success notika-btn-success waves-effect">Active</button>
                                                 <?php   }else{ ?>
                                                     <button class="btn btn-warning notika-btn-warning waves-effect">Inactive</button>
                                                     <?php   } ?>
                                                   </td>
                                                    <td><a onclick="delete_videos('<?php echo $rows->id; ?>')"><i class="fa fa-times" aria-hidden="true" data-toggle="tooltip" title="Delete" style="cursor:pointer;font-size:20px;"></i></a></td>
                                                </tr>
                                              <?php  $i++; } ?>
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

</style>
<script type="text/javascript">
	$('#masters').addClass('active');
	$('#mastersmenu').addClass('active');
	$('#centers').addClass('active');

	$("#myformsection").validate({
       rules: {
           video_title:{required:true },
           video_link:{required:true },
       },
       messages: {
            video_title:"Enter video title",
            video_link:"Enter video URL link"
           }
   });
   
function delete_videos(id) {
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>center/delete_videos",
		data: {
			id: id
		},
		success: function(response) {

			if (response == 'success') {
			  $.toast({
						heading: 'Deleted successfully',
						text: response,
						position: 'mid-center',
						icon:'success',
						stack: false
					})
					window.setTimeout(function(){location.reload()},2000);
			} else {
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
</script>
