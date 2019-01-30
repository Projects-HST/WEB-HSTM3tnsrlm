<div class="container">
<div class="row">
<div class="data-table-area">
<div class="container">
 <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="data-table-list">
             <div class="basic-tb-hd">
                 <h2>View PIAs</h2>
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
                             <th>PIA Number</th>
                             <th>Name</th>
                             <th>Mobile</th>
							 <th>Profile</th>
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
                              <td>	<?php if($rows->profile_pic==''){
								}else{ ?>
									<img src="<?php echo base_url(); ?>assets/pia/<?php echo $rows->profile_pic; ?>" style="width:100px;">
						<?php	} ?></td>
                             <td><?php if($rows->status=='Active'){ ?>
                              <button class="btn btn-success notika-btn-success waves-effect">Active</button>
                          <?php }else{ ?>
                                  <button class="btn btn-danger notika-btn-danger waves-effect">Inactive</button>
                              <?php   } ?>
                            </td>
                             <td>
                               <a href="<?php echo base_url(); ?>admin/edit_pia/<?php echo base64_encode($rows->id*98765); ?>"><i class="notika-icon notika-edit"></i></a> &nbsp;  <a href="<?php echo base_url(); ?>admin/pia_dashboard/<?php echo base64_encode($rows->user_id*98765); ?>"><i class="notika-icon notika-house"></i></a></td>
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
    $('#pia').addClass('active');
    $('#piamenu').addClass('active');
</script>
