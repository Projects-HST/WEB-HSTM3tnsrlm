<div class="container">
<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form method="post" action="#" class="form-horizontal" enctype="multipart/form-data" id="myformsection" >
                  <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Update Profile</h2>
                        </div>
                        <?php  foreach ($result as $row) { }  ?>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Username</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" readonly placeholder="Enter Email" value="<?php echo $row->pia_unique_number; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Name</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="pia_name" placeholder="Enter Email" value="<?php echo $row->pia_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="pia_email" placeholder="Enter Email" value="<?php echo $row->pia_email; ?>">
                                    <input type="hidden" class="form-control input-sm" name="pia_id" placeholder="Enter Email" value="<?php echo base64_encode($row->id*98765); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Phone </label>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control input-sm" name="pia_phone" placeholder="Enter Email" value="<?php echo $row->pia_phone; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Address</label>
                                <div class="nk-int-st">
                                    <textarea class="form-control" rows="5" name="pia_address" placeholder=""><?php echo $row->pia_address; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int mg-t-15">
                            <button class="btn btn-success notika-btn-success waves-effect">Update</button>
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
             pia_name:{required:true },
             pia_email:{
               required: true,
                email: true,
                remote: {
                       url: "<?php echo base_url(); ?>dashboard/checkemail_edit/<?php echo base64_encode($row->id*98765); ?>",
                       type: "post"
                    }
             },
             pia_address:{required:true },
             pia_phone: {
                 required: true,
                 maxlength: 10,
                 minlength:10,
                 number:true,
                 remote: {
                        url: "<?php echo base_url(); ?>dashboard/checkmobile_edit/<?php echo base64_encode($row->id*98765); ?>",
                        type: "post"
                     }
             }
         },
         messages: {
               pia_name:"Please enter name",
               pia_email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address.",
                    remote: "Email already in use!"
                },
               pia_address:"Please enter address",
               pia_phone: {
                 required: "Enter mobile number",
                 maxlength:"Maximum 10 digits",
                 minlength:"Minimum 10 digits",
                 remote: "Mobile number Already Exist",
                 number:"Only Numbers"

                }
             },
      submitHandler: function(form) {
        $.ajax({
                   url: "<?php echo base_url(); ?>dashboard/profile_update",
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
