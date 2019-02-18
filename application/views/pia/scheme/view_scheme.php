<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-example-wrap mg-t-30">
                <div class="cmp-tb-hd cmp-int-hd">
                    <h2>Scheme Details </h2>
                </div>
                <?php if($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>

                    <?php endif; ?>
                        <?php   foreach($res_scheme as $res){} ?>
                            <!-- <form method="post" action="<?php echo base_url(); ?>scheme/create" class="" enctype="multipart/form-data" id="myformsection" name="myformsection"> -->
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Scheme Name</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" name="scheme_name" id="scheme_name" class="form-control" value="<?php echo $res->scheme_name; ?>">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Scheme Info</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <textarea cols="100" id="editor1" name="scheme_info" rows="10" required><?php echo $res->scheme_info;  ?></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Scheme video link</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                  <iframe width="700" height="400" src="https://www.youtube.com/embed/<?php echo $res->scheme_video;  ?>">
</iframe>
                                                    <!-- <?php echo $res->scheme_video;  ?> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </form>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-example-wrap mg-t-30">
                <div class="cmp-tb-hd cmp-int-hd">
                    <h2>View  Scheme Gallery </h2>
                </div>


                        <div class="row" style="margin-top:15px;">
                            <?php if(empty($res_img)){
                              echo "No Gallery Found";
                          }else{
                            foreach($res_img as $rows){ ?>
                                <div class="col-lg-2" style="margin-bottom:5px;">
                                    <div id="thumbnail">
                                        <img src="<?php echo base_url(); ?>assets/scheme/<?php echo $rows->scheme_photo; ?>" class="img-responsive" style="width:150px;height:100px;">

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
</script>
