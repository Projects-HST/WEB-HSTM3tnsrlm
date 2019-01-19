<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Add Video Link </h2>
                        </div>
                        <?php if($this->session->flashdata('msg')): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×</button>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <?php endif; ?>
                            <form method="post" action="<?php echo base_url(); ?>center/videos" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">


                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Add  video Title</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input type="text" name="video_title" id="video_title" class="form-control" multiple required>
                                            <input type="hidden" class="form-control" name="center_id" value="<?php echo $this->uri->segment(3); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">video Link</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                        <input type="text" name="video_link" id="video_link" class="form-control" multiple required placeholder="Youtube Token E.g=d3OZVsHG9TM">
                                        <small>https://www.youtube.com/watch?v=</small>

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
                                        <h2>View  Videos </h2>
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
                                                    <td>
                                                      <a onclick="delete_videos('<?php echo $rows->id; ?>')"><i class="fa fa-times" aria-hidden="true"></i></a>

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
