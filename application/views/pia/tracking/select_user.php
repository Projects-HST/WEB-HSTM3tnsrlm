<div class="container">
<div class="row">
<?php //foreach($pia_details as $row){} ?>
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
                 <h2>Mobilizer List</h2>
             </div>
             <div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
                             <th>S.no</th>

                             <th>Mobilizer name</th>
                             <th>Mobile</th>
								<th>Email</th>
                              <th>Status</th>
							  <th>Tracking </th>
                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($res as $rows){ ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             
							 <td><?php echo $rows->name; ?></td>
                             <td><?php echo $rows->phone; ?></td>
							 <td><?php echo $rows->email; ?></td>
                             <td><?php if($rows->status=='Active'){ ?>Active <?php }else{ ?>Inactive<?php   } ?>
                            </td>
							<td>
							<a href="<?php echo base_url(); ?>tracking/pia_mobilizer_track/<?php echo base64_encode($rows->user_id*98765); ?>"><img src="<?php echo base_url(); ?>assets/images/tracking.png" alt="Download" height="25" width="25"></a> </td>
                            
<?php  $i++; } ?>

                     </tbody>

                 </table>
             </div>
         </div>
 </div>
</div>
</div>
<script type="text/javascript">
    $('#tracking').addClass('active');

    $('#tracking_form').validate({ // initialize the plugin
   rules: {
       user_id:{required:true },
       selected_date:{required:true }

   },
   messages: {
         user_id: "Select User",
         selected_date: "Pick a Date"

       }
});
    </script>
