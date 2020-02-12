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
			
			
			<?php if($this->session->flashdata('gallery')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <?php echo $this->session->flashdata('gallery'); ?>
                    </div>
            <?php endif; ?>
			
			
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>List Scheme</h2>
                        </div>
                        <div class="table-responsive">
							
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                   <tr>
									 <th width="5%">S.no</th>
									 <th width="75%">Scheme Name</th>
									 <th width="10%">Status</th>
									 <th width="10%">Action</th>
								</tr>
                                </thead>
                                <tbody>
						<?php $i=1; foreach($result as $rows){ ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php echo $rows->scheme_name; ?></td>
                             <td><?php if($rows->status=='Active'){ ?><span class="green">Active</span><?php }else{ ?><span class="red">Inactive</span><?php } ?></td>
                             <td>
                               <a href="<?php echo base_url(); ?>scheme/edit_scheme/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Edit Scheme"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a> &nbsp;  <a href="<?php echo base_url(); ?>scheme/scheme_gallery/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Gallery"><i class="fa fa-picture-o" aria-hidden="true" style="font-size:20px;"></i></a></td>
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
	$('#scheme').addClass('active');
    $('#schememenu').addClass('active');
	$('#view_scheme').addClass('active');
	
	
</script>
