<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Edit Center details Form</h2>
                        </div>
                            <form method="post" action="<?php echo base_url(); ?>center/update_center" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
                              <?php foreach($res_center as $rows){} ?>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Center Name</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input type="text" class="form-control" name="center_name" value="<?php echo $rows->center_name; ?>">
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
                                          <input type="text" class="form-control" name="center_address" value="<?php echo $rows->center_address; ?>">
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
                                          <input type="text" class="form-control" name="center_info" value="<?php echo $rows->center_info; ?>">
                                            <input type="hidden" class="form-control" name="center_id" value="<?php echo base64_encode($rows->id*98765); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">New Banner or logo</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input type="file" class="form-control" name="center_banner" >
                                          <input type="hidden" class="form-control" name="center_banner_old" value="<?php echo $rows->center_banner; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                      <img src="<?php echo base_url(); ?>assets/center/logo/<?php echo $rows->center_banner; ?>" style="width:100px;">
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
                                         <select class="selectpicker" name="status" id="status">
                                           <option value="">--Select Status--</option>
                                           <option value="Active">Active</option>
                                           <option value="Inactive">Inactive</option>

                         										</select>
                                           <script> $('#status').val('<?php echo $rows->status; ?>');</script>
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
                                    <button class="btn btn-success notika-btn-success waves-effect">Update</button>
                                </div>
                            </div>
                        </div>
                      </form>
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
	                url: "<?php echo base_url(); ?>center/check_center_name_exist/<?php echo base64_encode($rows->id*98765); ?>",
	                type: "post"
	             }
              },
           center_info:{required:true },
           center_address:{required:true },
           status:{required:true},
           end_month:{required:true }
       },
       messages: {

             center_name: { required:"Enter  center name",remote:"center name already exist" },

            center_info:"Enter the info",
            center_address:"Enter the address",
            status:"Select Status"

           }
   });

</script>
