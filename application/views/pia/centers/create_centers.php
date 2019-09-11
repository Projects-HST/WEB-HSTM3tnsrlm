<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Create Center </h2>
                        </div>
                            <form method="post" action="<?php echo base_url(); ?>center/create_center" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Center Name</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input type="text" class="form-control" name="center_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Center Address</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input type="text" class="form-control" name="center_address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Center Info</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input type="text" class="form-control" name="center_info">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Center Banner or logo</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input type="file" class="form-control" name="center_banner">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Status</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <div class="bootstrap-select fm-cmp-mg">
                                         <select class="selectpicker" name="status">
                                           <option value="">--Select Status--</option>
                                           <option value="Active">Active</option>
                                           <option value="Inactive">Inactive</option>

                         										</select>
                                     </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="fm-checkbox">

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



              </div>
  </div>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Center List</h2>

                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Center Name</th>
                                          <th>Center Banner</th>
                                        <th>Center Address</th>
                                        <th>Info</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; foreach($res_center as $rows){ ?>


                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rows->center_name; ?></td>
                                        <td><img src="<?php echo base_url(); ?>assets/center/logo/<?php echo $rows->center_banner; ?>" style="width:100px;"></td>
                                        <td><?php echo $rows->center_address; ?></td>
                                        <td><?php echo $rows->center_info; ?></td>
                                        <td><?php if($rows->status=='Active'){ ?>
                                           <button class="btn btn-success notika-btn-success waves-effect">Active</button>
                                     <?php   }else{ ?>
                                         <button class="btn btn-warning notika-btn-warning waves-effect">Inactive</button>
                                         <?php   } ?>
                                       </td>
                                        <td>
                                          <a href="<?php echo base_url(); ?>center/get_center_id_details/<?php echo base64_encode($rows->id*98765); ?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                          <a href="<?php echo base_url(); ?>center/create_gallery/<?php echo base64_encode($rows->id*98765); ?>" title="Add Photos"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                                          <a href="<?php echo base_url(); ?>center/create_videos/<?php echo base64_encode($rows->id*98765); ?>" title="Add videos"><i class="fa fa-file-video-o" aria-hidden="true"></i></a>
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

</div>
<script type="text/javascript">
$('#masters').addClass('active');
$('#mastersmenu').addClass('active');
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
           center_banner:{required:true},
           status:{required:true},
           end_month:{required:true }
       },
       messages: {

             center_name: { required:"Enter  center name",remote:"center name already exist" },
            center_banner:"Select logo or Banner",
            center_info:"Enter the info",
            center_address:"Enter the address",
            status:"Select Status"

           }
   });

</script>
