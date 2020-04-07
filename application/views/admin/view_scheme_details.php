<div class="container">

    <div class="row page_row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-example-wrap">
                
				<div class="cmp-tb-hd cmp-int-hd">
                    <h2>Scheme Details </h2>
                </div>
           
                        <?php   foreach($res_scheme as $res){} ?>
                          
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row page_row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Scheme Name</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <?php echo $res->scheme_name; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Description</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st" style="text-align:justify;"><?php echo $res->scheme_info;  ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Video</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                  <iframe width="700" height="400" src="https://www.youtube.com/embed/<?php echo $res->scheme_video;  ?>">
</iframe>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

			</div>
        </div>
	</div>

       <div class="row page_row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-example-wrap">
                
				<div class="cmp-tb-hd cmp-int-hd">
                    <h2>Gallery</h2>
                </div>
				
				<div class="row page_row" style="margin-top:20px;">
					<?php if(empty($res_img)){
					  echo "No Gallery Found";
				  }else{
					  
					  
					foreach($res_img as $rows){ ?>
					

 
						<div class="col-lg-2" style="margin-bottom:5px;">
							<div id="thumbnail">
							
							<a class="galpop-multiple" data-galpop-group="multiple" href="<?php echo base_url(); ?>assets/scheme/<?php echo $rows->scheme_photo; ?>">
	<img src="<?php echo base_url(); ?>assets/scheme/<?php echo $rows->scheme_photo; ?>" alt="" class="img-responsive" style="width:150px;height:100px;" />
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
<style>
.page_row{
  margin-bottom: 20px;
}
</style>
<script type="text/javascript">
	$('#scheme').addClass('active');
    $('#schememenu').addClass('active');
	$('#view_scheme').addClass('active');
	
	$(document).ready(function() {
	$('.galpop-multiple').galpop();

});


</script>
