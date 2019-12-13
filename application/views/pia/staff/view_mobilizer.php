<div class="container">
<div class="row">
<div class="data-table-area">
<div class="container">
 <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="data-table-list">
             <div class="basic-tb-hd">
                 <h2>List Mobilizers</h2>
             </div>
             <?php if($this->session->flashdata('msg')): ?>
     <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
             ×</button>
         <?php echo $this->session->flashdata('msg'); ?>
     </div>
     <?php endif; ?>
             <div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
                             <th>S.no</th>
                             <th>Name</th>
                             <th>Email id</th>
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
                             <td><?php echo $rows->email; ?></td>
                             <td><?php echo $rows->phone; ?></td>
                             <td><?php if($rows->status=='Active'){ ?>
                              Active
                          <?php }else{ ?>
                             Inactive
                              <?php   } ?>
                            </td>
                              <td><a href="<?php echo base_url(); ?>staff/edit/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Edit Staff"><i class="notika-icon notika-edit" style="font-size:22px;"></i></a></td>
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
    $('#staff').addClass('active');
    $('#staffmenu').addClass('active');
	$('#view_mobilizer').addClass('active');
	
</script>
