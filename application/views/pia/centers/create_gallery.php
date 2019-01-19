<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Create Gallery </h2>
                        </div>
                        <?php if($this->session->flashdata('msg')): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×</button>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php endif; ?>
                            <form method="post" action="<?php echo base_url(); ?>center/gallery" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">


                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Add Multiple Photos</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input type="file" class="form-control" name="center_photos[]" multiple required>
                                            <input type="hidden" class="form-control" name="center_id" value="<?php echo $this->uri->segment(3); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button class="btn btn-success notika-btn-success waves-effect">Submit</button>
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-example-wrap mg-t-30">
                                    <div class="cmp-tb-hd cmp-int-hd">
                                        <h2>View  Gallery </h2>
                                    </div>

                                    <div class="row">
                              <?php if(empty($res_img)){
                                echo "No Gallery Found";
                            }else{
                              foreach($res_img as $rows){ ?>
                                  <div class="col-lg-2" style="margin-bottom:5px;">
                                      <div id="thumbnail">
                                          <img src="<?php echo base_url(); ?>assets/center/gallery/<?php echo $rows->center_photos; ?>" class="img-responsive" style="width:150px;height:100px;">
                                          <a id="close" onclick="delgal(<?php echo $rows->id; ?>)"></a>
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
<style>
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
        width: 30px;
        height: 30px;
        top: 2px;
        right: 2px;
        background: url(http://icons.iconarchive.com/icons/kyo-tux/delikate/512/Close-icon.png);
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
}
</style>
<script type="text/javascript">
$('#masters').addClass('active');
$('#mastersmenu').addClass('active');
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
