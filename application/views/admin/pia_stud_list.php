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
                 <h2>Students List ( <?php echo $row->pia_name; ?> - <?php echo $row->pia_unique_number; ?> )</h2>
             </div>
             <div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
                             <th>S.no</th>
                             <th>Name</th>
                             <th>Gender</th>
							 <th>Phone</th>
                              <th>Status</th>
                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($result as $rows){ ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php echo $rows->name; ?></td>
                             <td><?php echo $rows->sex ; ?></td>
							 <td><?php echo $rows->mobile ; ?></td>
                             <td><?php echo $rows->status; ?></td>
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
	$('#student_list').addClass('active');
</script>
