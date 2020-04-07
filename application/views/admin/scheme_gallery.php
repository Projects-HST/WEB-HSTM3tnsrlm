<?php   foreach($res_scheme as $res){} ?>
<div class="container">
	<div class="row page_row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
					<form method="post" action="<?php echo base_url(); ?>scheme/add_update_gallery" class="form-horizontal" enctype="multipart/form-data">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Gallery</h2>
                        </div>
						
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
							
                                <div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Upload Images</label>
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
									<button class="btn btn-success notika-btn-success waves-effect" id='scheme_gallery'>Upload</button>
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
                        heading: 'Image deleted',
                        text: '',
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
