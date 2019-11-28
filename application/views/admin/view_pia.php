    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
									 <!--<th>Profile</th>-->
									 <th>status</th>
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
                             <!--<td><?php if($rows->profile_pic !=''){ ?><img src="<?php echo base_url(); ?>assets/pia/<?php echo $rows->profile_pic; ?>" style="width:100px;"><?php	} ?></td>-->
                             <td><?php if($rows->status=='Active'){ ?>
								  <p class="green">Active</p>
							<?php }else{ ?>
                                  <p class="red">Inactive</p>
                              <?php   } ?>
                            </td>
                             <td>
                               <a href="<?php echo base_url(); ?>admin/edit_pia/<?php echo base64_encode($rows->id*98765); ?>" data-toggle="tooltip" title="Edit PIA"><i class="notika-icon notika-edit" style="font-size:20px;"></i></a> &nbsp;  <a href="<?php echo base_url(); ?>admin/pia_dashboard/<?php echo base64_encode($rows->user_id*98765); ?>" data-toggle="tooltip" title="PIA Dashboard"><i class="notika-icon notika-support" style="font-size:20px;"></i></a></td>
                         </tr>
			<?php  $i++; } ?>
                                    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="row" style="margin-bottom:15px;">
			</div>
			
        </div>
    </div>
    <!-- Data Table area End-->

	

<style>
.row{
  margin-bottom: 15px;
}
</style>

<script type="text/javascript">
    $('#pia').addClass('active');
    $('#piamenu').addClass('active');
	
	
</script>
