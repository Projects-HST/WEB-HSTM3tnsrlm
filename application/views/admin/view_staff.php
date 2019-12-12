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
                 <h2>List Staffs</h2>
             </div>
             <div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
                             <th>S.no</th>
                             <th>Name</th>
                             <th>Email id</th>
                             <th>Mobile</th>
                             <th>Status</th>
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
                             <td><?php if($rows->status=='Active'){ ?><span class="green">Active</span><?php }else{ ?><span class="red">Inactive</span><?php } ?></td>
                             <td><a href="<?php echo base_url(); ?>admin/edit_staff/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Edit Staff"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:22px;"></i></a></td>
                         </tr>
						<?php  $i++; } ?>

                     </tbody>

                 </table>
             </div>
         </div>

	</div>
	</div>
</div>
<style>
.page_row{
  margin-bottom: 20px;
}
</style>

<script type="text/javascript">
    $('#staff').addClass('active');
    $('#staffmenu').addClass('active');
	$('#view_staff').addClass('active');
</script>
