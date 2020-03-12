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
			
			<form method="post" action="<?php echo base_url(); ?>center/create_center" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Create Center</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                            <div class="form-group">
           
		   
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Center Name <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control input-sm" name="center_name" maxlength="100">
										 
                                    </div>
									<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"> </div>
                            </div>
								
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Center Address <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											 <input type="text" class="form-control  input-sm" name="center_address" maxlength="100">
                                    </div>
                                   <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
							</div>
							
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Center Info <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											 <input type="text" class="form-control  input-sm" name="center_info" maxlength="100">
                                    </div>
                                   <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
							</div>
							
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Center Logo <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											  <input type="file" class="form-control" name="center_banner">
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
                 <h2>List Centers</h2>
             </div>
             <div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
							<th>S.No</th>
							<th>Center Name</th>
							<th>Status</th>
							<th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($res_center as $rows){ ?>
                         <tr>
                            <td><?php echo $i; ?></td>
							<td><?php echo $rows->center_name; ?></td>
                            <td><?php if($rows->status=='Active'){ ?><span class="green">Active</span><?php }else{ ?><span class="red">Inactive</span><?php } ?></td>
                             <td>
								<a href="<?php echo base_url(); ?>center/get_center_id_details/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Edit Center"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:22px;"></i></a>&nbsp;
								<a href="<?php echo base_url(); ?>center/create_gallery/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Add Photos"><i class="fa fa-file-image-o" aria-hidden="true" style="font-size:22px;"></i></a>&nbsp;
								<a href="<?php echo base_url(); ?>center/create_videos/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Add Videos"><i class="fa fa-file-video-o" aria-hidden="true" style="font-size:22px;"></i></a>
							 </td>
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
$('#centers').addClass('active');

$("#myformsection").validate({
       rules: {
           center_name:{required:true,
             remote: {
	                url: "<?php echo base_url(); ?>center/check_center_name",
	                type: "post"
	             }
              },
           center_info:{required:true },
           center_address:{required:true },
		   center_banner:{required:true,accept: "jpg,jpeg,png"},
           status:{required:true}
       },
       messages: {
            center_name: { required:"Enter center name",remote:"Center name already exist" },
			center_banner:{
				  required:"Select logo or banner",
				  accept:"Please upload .jpg or .png",
				  fileSize:"File must be JPG or PNG, less than 1MB"
			},
            center_info:"Enter center info",
            center_address:"Enter center address",
            status:"Select status"

           }
   });

</script>
