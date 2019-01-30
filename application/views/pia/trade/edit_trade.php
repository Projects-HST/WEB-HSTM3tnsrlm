<div class="container">
  <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-example-wrap mg-t-30">
                          <div class="cmp-tb-hd cmp-int-hd">
                              <h2>Edit Trade name</h2>
                          </div>
                          <?php  foreach ($res as $rows){} ?>
                            <form method="post" action="#" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
                          <div class="row">

                              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                   <label>Trade name</label>
                                   <div class="input-group  nk-int-st">
                                       <span class="input-group-addon"></span>
                                       <input type="text"  name="trade_name" id="trade_name" class="form-control " value="<?php echo $rows->trade_name; ?>" >
                                   </div>
                               </div>
                              </div>
                              <input type="hidden" name="trade_id" value="<?php echo base64_encode($rows->id*98765); ?>">
                              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">

                                <div class="" id="">
                                   <label>Status</label>
                                   <div class="input-group  nk-int-st">
                                     <select name="status" id="status">
                                       <option value="">--Select Status--</option>
                                       <option value="Active">Active</option>
                                       <option value="Inactive">Inactive</option>
                                     </select>
                                     <script> $('#status').val('<?php echo $rows->status; ?>');</script>
                                   </div>
                               </div>



                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                   <label></label>
                                  <div class="form-example-int">
                                     <!-- <input type="submit" id="save" class="btn btn-info btn-fill center"  value="Save"> -->
                                     <button type="submit" class="btn btn-info notika-btn-info waves-effect">Update</button>
                                  </div>
                              </div>

                          </div>
                            </form>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Data Table area Start-->
   <div class="data-table-area">
       <div class="container">
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="data-table-list">
                       <div class="basic-tb-hd">
                           <h2>List Trade</h2>
                       </div>
                       <div class="table-responsive">
                           <table id="data-table-basic" class="table table-striped">
                               <thead>
                                   <tr>
                                       <th>S.no</th>
                                       <th>Trade name</th>
                                       <!-- <th>Period To</th> -->
                                       <th>Status</th>
                                        <th>Action</th>


                                   </tr>
                               </thead>
                               <tbody>
                                 <?php $i=1; foreach($result as $rows){ ?>


                                   <tr>
                                       <td><?php echo $i; ?></td>
                                       <td><?php echo $rows->trade_name; ?></td>

                                       <td><?php if($rows->status=='Active'){ ?>
                                          <button class="btn btn-success notika-btn-success waves-effect">Active</button>
                                    <?php   }else{ ?>
                                        <button class="btn btn-warning notika-btn-warning waves-effect">Inactive</button>
                                        <?php   } ?>
                                      </td>
                                       <td><a href="<?php echo base_url(); ?>trade/edit_trade/<?php echo base64_encode($rows->id*98765); ?>"><i class="notika-icon notika-edit"></i></a></td>


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
   <!-- Data Table area End-->


<script type="text/javascript">
$('#masters').addClass('active');
$('#mastersmenu').addClass('active');
$("#myformsection").validate({
       rules: {
           trade_name:{required:true },
           status:{required:true}
       },
       messages: {
              status:"Select Status",
             trade_name:"Please Enter trade name"

           },
    submitHandler: function(form) {
      $.ajax({
                 url: "<?php echo base_url(); ?>trade/update_trade",
                 type: 'POST',
                 data: $('#myformsection').serialize(),
                 success: function(response) {
                     if (response=="success") {
                       $.toast({
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
