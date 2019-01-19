<div class="container">
<div class="row">
<div class="data-table-area">
<div class="container">
 <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="data-table-list">
             <div class="basic-tb-hd">
                 <h2>Confirmed Prospects</h2>
             </div>
             <div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
                             <th>S.no</th>
                             <th>Name</th>
                             <th>Aadhar Card Number</th>
                              <th>Mobile</th>
                             <th>status</th>
                              <th>Action</th>


                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($result as $rows){ ?>


                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php echo $rows->name; ?></td>
                             <td><?php echo $rows->aadhaar_card_number; ?></td>
                             <td><?php echo $rows->mobile; ?></td>
                             <td><?php if($rows->status=='Pending'){ ?>
                                <button class="btn btn-warning notika-btn-warning waves-effect">Pending</button>
                          <?php   }else if($rows->status=='Confirmed'){ ?>
                              <button class="btn btn-success notika-btn-success waves-effect">Confirmed</button>
                              <?php   }else{ ?>
                              <button class="btn btn-danger notika-btn-danger waves-effect">Rejected</button>
                              <?php   } ?>
                            </td>
                             <td><a href="<?php echo base_url(); ?>admission/edit_stu_details/<?php echo base64_encode($rows->id*98765); ?>"><i class="notika-icon notika-edit"></i></a></td>


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
</div>
</div>
<script type="text/javascript">
    $('#prospects').addClass('active');
    $('#prospectsmenu').addClass('active');
    </script>
