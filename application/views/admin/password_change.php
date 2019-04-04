<style>
.nk-int-st:not(.form-group){

  display: block;
  width: 20%;
}
</style>
<div class="container">
<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form method="post" action="" class="form-horizontal" enctype="multipart/form-data" id="myformsection" >
                  <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Update Password</h2>
                        </div>
                        <?php  foreach ($result as $row) { }  ?>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Current Password</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm"  name="old_password" placeholder="Enter Current Password" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>New Password</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" id="new_password" name="new_password" placeholder="Enter New Password" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Retype Password</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" id="retype_password" name="retype_password" placeholder="Enter Retype Password" value="">
                                    <input type="hidden" class="form-control input-sm" name="user_id" value="<?php echo base64_encode($row->id*98765); ?>">

                                </div>
                            </div>
                        </div>
                        <div class="form-example-int mg-t-15">
                            <button class="btn btn-success notika-btn-success waves-effect">Update Password</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
</div>
<script type="text/javascript">
  $('#profile').addClass('active');
  $('#profilemenu').addClass('active');
  $("#myformsection").validate({
         rules: {
             old_password:{
               required: true,
                remote: {
                       url: "<?php echo base_url(); ?>admin/check_password_match/<?php echo base64_encode($row->user_id*98765); ?>",
                       type: "post"
                    }
             },
             new_password: {
                 required: true,
                 maxlength: 10,
                 minlength:6
             },
             retype_password: {
                 required: true,
                 maxlength: 10,
                 minlength:6,equalTo: '[name="new_password"]'
             }
         },
         messages: {
               old_password: {
                    required: "Please enter your old password.",
                    remote: "Old Password Doesn't Match!"
                },
                new_password: {
                  required: "New  password",
                  maxlength:"Maximum 10 digits",
                  minlength:"Minimum 6 digits"

                },
               retype_password: {
                 required: "New  password does not match",
                 maxlength:"Maximum 10 digits",
                 minlength:"Minimum 6 digits",
                 equalTo:"Password Must Match"

                }
             },
      submitHandler: function(form) {
        $.ajax({
                   url: "<?php echo base_url(); ?>admin/password_update",
                   type: 'POST',
                   data: $('#myformsection').serialize(),
                   success: function(response) {
                       if (response=="success") {
                         $.toast({
                                   heading: 'Successfully',
                                   text: response,
                                   position: 'mid-center',
                                   icon:'success',
                                   stack: false
                               })
                               window.setTimeout(function(){location.reload()},3000);
                       }else{
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
     });



</script>
