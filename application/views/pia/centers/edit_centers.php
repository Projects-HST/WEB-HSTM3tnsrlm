 <?php foreach($res_center as $rows){} ?>
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
			
			<form method="post" action="<?php echo base_url(); ?>center/update_center" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Edit Training Center Profile</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                            <div class="form-group">
           
		   
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Center Name <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control input-sm" name="center_name" value="<?php echo $rows->center_name; ?>" maxlength="100">
										 
                                    </div>
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Address <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											 <input type="text" class="form-control  input-sm" name="center_address" value="<?php echo $rows->center_address; ?>" maxlength="100">
                                    </div>
                            </div>
								
							
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Introduction <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											 <input type="text" class="form-control  input-sm" name="center_info" value="<?php echo $rows->center_info; ?>" maxlength="100">
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Profile Picture</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											  <input type="file" class="form-control" name="center_banner">
                                    </div>
							</div>

							<div class="row page_row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Status <span class="error">*</span></label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<select name="status" class="form-control" id="status">
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
									</select><script> $('#status').val('<?php echo $rows->status; ?>');</script>
								</div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"></label>
                                    </div>
                                   <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"><img src="<?php echo base_url(); ?>assets/center/logo/<?php echo $rows->center_banner; ?>" style="width:100px;"></div>
							</div>
								
							
							<div class="row page_row">
								 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="hidden" class="form-control" name="center_banner_old" value="<?php echo $rows->center_banner; ?>" >
										<input type="hidden" class="form-control" name="center_id" value="<?php echo base64_encode($rows->id*98765); ?>">
										<button class="btn btn-success notika-btn-success waves-effect">Save</button>
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
$('#centers').addClass('active');

$("#myformsection").validate({
       rules: {
           center_name:{required:true,
             remote: {
	                 url: "<?php echo base_url(); ?>center/check_center_name_exist/<?php echo base64_encode($rows->id*98765); ?>",
	                type: "post"
	             }
              },
           center_info:{required:true },
           center_address:{required:true },
		   center_banner:{required:false,accept: "jpg,jpeg,png"},
           status:{required:true}
       },
       messages: {
            center_name: { required:"Enter name of your training center",remote:"Center name already exist" },
            center_info:"Give a brief introduction about your center",
            center_address:"Enter the address",
			center_banner:{
				  required:"",
				  accept:"Please upload .jpg or .png .",
				  fileSize:"File must be JPG or PNG, less than 1MB"
			},
            status:"Set a status"

           }
   });

</script>
