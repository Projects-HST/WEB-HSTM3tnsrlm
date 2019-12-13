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
			
					<form method="post" action="<?php echo base_url(); ?>center/gallery" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
					<div class="cmp-tb-hd cmp-int-hd">
						<h2>Center Photos</h2>
					</div>
						
					<div class="form-example-int form-horizental">
                       <div class="form-group">
							<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Upload Multiple Photos <span class="error">*</span></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="file" class="form-control" name="center_photos[]" multiple="multiple">
                                    </div>
									<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"> </div>
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
			<div class="form-example-wrap">

				<div class="cmp-tb-hd cmp-int-hd">
					<h2>List Photos</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                            <div class="form-group">
								<div class="row page_row">
							 <?php if(empty($res_img)){
                                echo "No Gallery Found";
                            }else{
                              foreach($res_img as $rows){ ?>
                                  <div class="col-lg-2" style="margin-bottom:25px;">
                                      <div id="thumbnail">
									  <img src="<?php echo base_url(); ?>assets/center/gallery/<?php echo $rows->center_photos; ?>" class="img-responsive" style="width:150px;height:100px;">
                                        <a id="close" onclick="delgal(<?php echo $rows->id; ?>)" data-toggle="tooltip" title="Delete" style="cursor:pointer"></a>
										
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
</div>



<style>
.page_row{
  margin-bottom: 20px;
}
.thumbnail {
        position: relative;
        width: 300px;
        height: 300px;
    }

    .thumbnail img {
        width: 100%;
        height: 100%;
    }

    #close {
        display: block;
        position: absolute;
        width: 31px;
        height: 31px;
        top: -10px;
        right: 2px;
        background: url(<?php echo base_url(); ?>assets/images/delete_icon.png);
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
}
</style>
<script type="text/javascript">
	$('#masters').addClass('active');
	$('#mastersmenu').addClass('active');
	$('#centers').addClass('active');

	$('#myformsection').validate({
		rules: {
		  'center_photos[]': {
		  required: true,
		  accept: "jpg,jpeg,png",
		}
		},
		messages:{
			'center_photos[]':{
			   required : "Please upload atleast 1 photo",
			    accept:"Please upload .jpg or .png",
			}

		}
	})
	
   
	function delgal(gal_id) {
      $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>center/delete_gal",
          data: {
              gal_id: gal_id
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
