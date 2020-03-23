<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
					<form method="post" action="<?php echo base_url(); ?>scheme/create" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Create Scheme</h2>
                        </div>
						
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
							
                                <div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Scheme Name <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Scheme Name" name="scheme_name" id="scheme_name" class="form-control input-sm">
                                    </div>
									 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                                 </div>
                             
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                          <label class="hrzn-fm">Scheme Details <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-3 col-xs-12">
                                                <textarea name="scheme_info" class="form-control" rows="10" cols="80" id="scheme_info" placeholder="Scheme Info"></textarea><script>CKEDITOR.replace( 'scheme_info' );</script>
                                    </div>
                                </div>
								
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Scheme Video Link <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Scheme Video Link" name="scheme_video_link" id="scheme_video_link" class="form-control input-sm" value="<?php //echo $res->scheme_video; ?>"><br>Ex : https://www.youtube.com/watch?v=<span style="font-weight:bold;color:#e02329;;">SjYesmO0bBE</span>
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Status <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="status" class="form-control input-sm" id="status">
											<option value="Active">Active</option>
											<option value="Inactive">Inactive</option>
										</select>
                                    </div>
									 <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12"><button class="btn btn-success notika-btn-success waves-effect">Create</button>
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
    $('#scheme').addClass('active');
    $('#schememenu').addClass('active');
	$('#create_scheme').addClass('active');

	$('#myformsection').validate({
		ignore: [],
        debug: false,
			rules: {
				scheme_name: { required: true },
				  scheme_info:{
					 required: function() 
						{
							CKEDITOR.instances.scheme_info.updateElement();
						}
                    },
				scheme_video_link: { required: true},
				status:{ required: true}
			},
			messages: {
					scheme_name: "Enter Scheme name",
					 scheme_info:{
                        required:"Enter Scheme info"
					 },
					scheme_video_link: "Enter Scheme video link",
					status:"Select Status"
			}
		});
		
</script>
