<div class="container">
<div class="row">
<div class="data-table-area">
<div class="container">
 <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="data-table-list">
             <div class="basic-tb-hd">
                 <h2>Mobilizers</h2>
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
                             <th>S.No</th>
                             <th>Mobilizer</th>
                             <th>Email ID</th>
                             <th>Mobile Number</th>
                             <th>Status</th>
                              <th>Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($result as $rows){ ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php echo $rows->name; ?></td>
                             <td><?php echo $rows->email; ?></td>
                             <td><?php echo $rows->phone; ?></td>
                             <td><?php if($rows->status=='Active'){ ?><span class="green">Active</span><?php }else{ ?><span class="red">Inactive</span><?php } ?></td>
                              <td><a href="<?php echo base_url(); ?>staff/edit/<?php echo base64_encode($rows->user_id*98765); ?>" data-toggle="tooltip" title="Edit Mobilizer Profile"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a><!-- &nbsp;&nbsp; <a href="<?php echo base_url(); ?>staff/view_mobilizer_job/<?php echo base64_encode($rows->user_id*98765); ?>" data-toggle="tooltip" title="View Mobilizer Job"><i class="fa fa-calendar-check-o" style="font-size:20px;"></i></a>--></td>
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
