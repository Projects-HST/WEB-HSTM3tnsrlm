<div class="container">
<div class="row">
<div class="data-table-area">
<div class="container">
 <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="data-table-list">
             <div class="basic-tb-hd">
                 <h2>Students List</h2>
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
                             <th>Gender</th>
							 <th>Phone</th>
							 <th>Pic</th>
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
                              <td>	<?php if($rows->student_pic==''){
								}else{ ?>
									<img src="<?php echo base_url(); ?>assets/students/<?php echo $rows->student_pic; ?>" style="width:100px;">
						<?php	} ?></td>
                             <td>
                              <button class="btn btn-success notika-btn-success waves-effect"><?php echo $rows->status; ?></button>
                          
                            </td>
                            
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
