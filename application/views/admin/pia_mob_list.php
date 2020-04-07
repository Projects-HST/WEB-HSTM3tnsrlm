<?php foreach($pia_details as $row){} ?>
<div class="container">
	<div class="row page_row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      
		<?php if($this->session->flashdata('msg')): ?>
			 <div class="alert alert-success">
				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					 ×</button>
				 <?php echo $this->session->flashdata('msg'); ?>
			 </div>
		<?php endif; ?>

		<div class="data-table-list">
             <div class="basic-tb-hd">
                 <h2>Mobilizers ( <?php echo $row->pia_name; ?> )</h2>
             </div>
             <div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
                             <th>S.No</th>
                             <th>Mobilizer</th>
                             <th>Mobile Number</th>
							  <th>Email ID</th>
                              <th>Status</th>
							  <th>Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($result as $rows){ ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             
							 <td><?php echo $rows->name; ?></td>
                             <td><?php echo $rows->phone; ?></td>
							 <td><?php echo $rows->email; ?></td>
                             <td><?php if($rows->status=='Active'){ ?><span class="green">Active</span><?php }else{ ?><span class="red">Inactive</span><?php } ?></td>
                            </td>
							<td>
							<a href="<?php echo base_url(); ?>admin/pia_mobilizer_track/<?php echo base64_encode($rows->pia_id*98765); ?>/<?php echo base64_encode($rows->user_id*98765); ?>" data-toggle="tooltip" title="Track mobilizer"><img src="<?php echo base_url(); ?>assets/images/tracking.png" alt="Download" height="25" width="25"></a> </td>
                            
<?php  $i++; } ?>

                     </tbody>

                 </table>
             </div>
         </div>
 </div>
</div>
</div>

<script type="text/javascript">
    $('#pia').addClass('active');
    $('#piamenu').addClass('active');
	$('#mobilizer_list').addClass('active');
</script>
