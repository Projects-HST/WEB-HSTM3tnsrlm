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
                 <h2>Training Centers ( <?php echo $row->pia_name; ?>)</h2>
             </div>
             <div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
                             <th>S.No</th>
                             <th>Center Name</th>
                             <th>Address</th>
                              <th>Status</th>
                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($result as $rows){ ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php echo $rows->center_name; ?></td>
                             <td><?php echo $rows->center_address ; ?></td>
                             <td><?php if($rows->status=='Active'){ ?><span class="green">Active</span><?php }else{ ?><span class="red">Inactive</span><?php } ?></td>
                            </td>
                            
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
		$('#pia').addClass('active');
		$('#piamenu').addClass('active');
		$('#center_list').addClass('active');
</script>
