<div class="container">
  <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-example-wrap mg-t-30">
                          <div class="cmp-tb-hd cmp-int-hd">
                              <h2>Years Configuration Form</h2>
                          </div>
                            <form method="post" action="#" class="" enctype="multipart/form-data" id="myformsection" name="myformsection">
                          <div class="row">

                              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                   <label>From Date</label>
                                   <div class="input-group date nk-int-st">
                                       <span class="input-group-addon"></span>
                                       <input type="text"  name="from_month" id="from_year" class="form-control datepicker" >
                                   </div>
                               </div>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                   <label>To Date</label>
                                   <div class="input-group date nk-int-st">
                                       <span class="input-group-addon"></span>
                                       <input type="text" name="end_month" id="to_year"  class="form-control datepicker" >
                                   </div>
                               </div>
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">

                                <div class="" id="">
                                   <label>Status</label>
                                   <div class="input-group  nk-int-st">
                                     <select name="status">
                                       <option value="">--Select Status--</option>
                                       <option value="Active">Active</option>
                                       <option value="Inactive">Inactive</option>
                                     </select>
                                   </div>
                               </div>



                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                   <label></label>
                                  <div class="form-example-int">
                                     <!-- <input type="submit" id="save" class="btn btn-info btn-fill center"  value="Save"> -->
                                     <button type="submit" class="btn btn-info notika-btn-info waves-effect">Create</button>
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
                           <h2>List Years</h2>
                       </div>
                       <div class="table-responsive">
                           <table id="data-table-basic" class="table table-striped">
                               <thead>
                                   <tr>
                                       <th>S.no</th>
                                       <th>Period From</th>
                                       <th>Period To</th>
                                       <th>Status</th>
                                        <th>Action</th>


                                   </tr>
                               </thead>
                               <tbody>
                                 <?php $i=1; foreach($result as $rows){ ?>


                                   <tr>
                                       <td><?php echo $i; ?></td>
                                       <td><?php echo $rows->period_from; ?></td>
                                       <td><?php echo $rows->period_to; ?></td>
                                       <td><?php if($rows->status=='Active'){ ?>
                                          <button class="btn btn-success notika-btn-success waves-effect">Active</button>
                                    <?php   }else{ ?>
                                        <button class="btn btn-warning notika-btn-warning waves-effect">Inactive</button>
                                        <?php   } ?>
                                      </td>
                                       <td><a href="<?php echo base_url(); ?>years/edit_years/<?php echo base64_encode($rows->id*98765); ?>"><i class="notika-icon notika-edit"></i></a></td>


                                   </tr>
<?php  $i++; } ?>

                               </tbody>
                               <tfoot>
                                   <tr>
                                     <th>S.no</th>
                                     <th>Period From</th>
                                     <th>Period To</th>
                                     <th>Status</th>
                                       <th>Action</th>
                                   </tr>
                               </tfoot>
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
           from_month:{required:true },
           status:{required:true},
           end_month:{required:true }
       },
       messages: {
              status:"Select Status",
             from_month:"Please Enter From Year",
             end_month:"Please Enter To Year"
           },
    submitHandler: function(form) {
      $.ajax({
                 url: "<?php echo base_url(); ?>years/create",
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
