
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
                            <h2>List PIA</h2>
                        </div>
                        <div class="table-responsive">
							
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                   <tr>
									 <th>S.no</th>
									 <th>PRN Number</th>
									 <th>Name</th>
									 <th>Mobile</th>
									 <th>Status</th>
									  <th>Action</th>
								</tr>
                                </thead>
                                <tbody>
						<?php $i=1; foreach($result as $rows){ ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php echo $rows->pia_unique_number; ?></td>
                             <td><?php echo $rows->pia_name ; ?></td>
                             <td><?php echo $rows->pia_phone ; ?></td>
                             <td><?php if($rows->status=='Active'){ ?><span class="green">Active</span><?php }else{ ?><span class="red">Inactive</span><?php } ?></td>
                             <td>
                               <a href="<?php echo base_url(); ?>admin/edit_pia/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Edit PIA"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a> &nbsp;  <a href="<?php echo base_url(); ?>admin/pia_dashboard/<?php echo base64_encode($rows->user_id*98765); ?>" data-toggle="tooltip" title="PIA Dashboard"><i class="fa fa-sitemap" aria-hidden="true" style="font-size:20px;"></i></a></td>
                         </tr>
						<?php  $i++; } ?>
                                    
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
	$('#view_pia').addClass('active');
	
	
</script>
