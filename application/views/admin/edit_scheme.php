<?php   foreach($res_scheme as $res){} ?>
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
			
			<?php if($this->session->flashdata('gallery')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <?php echo $this->session->flashdata('gallery'); ?>
                    </div>
            <?php endif; ?>
			
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
					<form method="post" action="<?php echo base_url(); ?>scheme/update" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Scheme Details</h2>
                        </div>
						
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
							
                                <div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Scheme Name</label>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Scheme Name" name="scheme_name" id="scheme_name" class="form-control input-sm" value="<?php echo $res->scheme_name; ?>">
                                    </div>
									 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                                 </div>
                             
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                          <label class="hrzn-fm">Scheme Details</label>
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-3 col-xs-12">
                                                <textarea name="scheme_info" class="form-control" rows="10" cols="80" id="editor1" placeholder="Scheme Info"><?php echo $res->scheme_info;  ?></textarea>
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                          <label class="hrzn-fm">Scheme Video</label>
                                    </div>
                                    <div class="col-lg-8 col-md-3 col-sm-3 col-xs-12">
                                               <iframe width="720" height="400" src="https://www.youtube.com/embed/<?php echo $res->scheme_video;  ?>"></iframe>
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Scheme Video Link</label>
                                    </div>
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Scheme Video Link" name="scheme_video_link" id="scheme_video_link" class="form-control input-sm" value="<?php echo $res->scheme_video; ?>"><br>Ex : https://www.youtube.com/watch?v=<span style="font-weight:bold;color:#e02329;;">SjYesmO0bBE</span>
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Status</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<select name="status" class="form-control" id="status">
											<option value="Active">Active</option>
											<option value="Inactive">Inactive</option>
										</select><script> $('#status').val('<?php echo $res->status; ?>');</script>
                                    </div>
                                </div>
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
										<input type="hidden" name="scheme_id" value=<?php echo $res->id;  ?>>
										<button class="btn btn-success notika-btn-success waves-effect">Update</button>
                                    </div>
								
                                </div>

                            </div>
                        </div>
                    
						</form>
                    </div>
					
                </div>
            </div>
			
			
			
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
					<form method="post" action="<?php echo base_url(); ?>scheme/add_update_gallery" class="form-horizontal" enctype="multipart/form-data">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Scheme Gallery</h2>
                        </div>
						
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
							
                                <div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Scheme Picture</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="nk-int-st">
										<input type="file" name="scheme_photos[]" id="scheme_photos" class="form-control" multiple required>
                                        </div>
                                    </div>
									 <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
                             
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<input type="hidden" name="scheme_id" value=<?php echo $res->id;  ?>>
									<button class="btn btn-success notika-btn-success waves-effect" id='scheme_gallery'>Add Gallery</button>
                                    </div>
									 <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                </div>
								
								<div class="row page_row" style="padding:20px;">
                                   <?php if(empty($res_img)){
										echo "No Gallery Found";
									}else{
									foreach($res_img as $rows){ ?>
									<div class="col-lg-2" style="margin-bottom:5px;">
                                    <div id="thumbnail">
                                        <img src="<?php echo base_url(); ?>assets/scheme/<?php echo $rows->scheme_photo; ?>" class="img-responsive" style="width:150px;height:100px;">
                                        <a id="close" onclick="delgal(<?php echo $rows->id; ?>)" data-toggle="tooltip" title="Delete" style="cursor:pointer"></a>
                                        </a>
                                    </div>
                                   
                                </div>

                                <?php
                          }
                          } ?>
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
	$('#scheme').addClass('active');
    $('#schememenu').addClass('active');
	$('#view_scheme').addClass('active');

	$('#myformsection').validate({
					rules: {
						scheme_name: { required: true },
						scheme_info: { required: true },
						scheme_video_link: { required: true}
					},
					messages: {
							scheme_name: "Enter Scheme name",
							scheme_info: "Enter Scheme details",
							scheme_video_link: "Enter Scheme video link",
					}
		});
		
    function delgal(gal_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>scheme/delete_gal",
            data: {
                gal_id: gal_id
            },
            success: function(response) {
                if (response == 'success') {
                    $.toast({
                        heading: 'Deleted successfully',
                        text: response,
                        position: 'mid-center',
                        icon: 'success',
                        stack: false
                    })
                    window.setTimeout(function() {
                        location.reload()
                    }, 2000);
                } else {
                    $.toast({
                        heading: 'Error',
                        text: response,
                        position: 'mid-center',
                        icon: 'error',
                        stack: false
                    })
                }
            }
        });

    }

    $("#scheme_gallery").click(function() {
        for (var i = 0; i < $("#scheme_photos").get(0).files.length; ++i) {
            var file1 = $("#scheme_photos").get(0).files[i].name;

            if (file1) {
                var file_size = $("#scheme_photos").get(0).files[i].size;
                if (file_size < 1000000) {
                    var ext = file1.split('.').pop().toLowerCase();
                    if ($.inArray(ext, ['jpg', 'jpeg', 'png']) === -1) {
                        alert("Invalid file extension");
                        return false;
                    }

                } else {
                    alert("Images size should be less than 1 MB.");
                    return false;
                }
            } else {
                alert("fill all fields..");
                return false;
            }
        }
    });
</script>
