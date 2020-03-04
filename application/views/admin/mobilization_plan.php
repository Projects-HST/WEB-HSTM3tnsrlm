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
                 <h2>Mobilization Plans</h2>
             </div>
             <div class="table-responsive">
                 <table id="data-table-basic" class="table table-striped">
                     <thead>
                         <tr>
                             <th>S.no</th>
							 <th>Partner's Name</th>
                             <th>Document Name</th>
                             <th>Uploaded Date</th>
							 <th>Download</th>
                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($result as $rows){
						$originalDate = $rows->doc_month_year;
						$dispDate = date("d-m-Y", strtotime($originalDate));
					   ?>
                         <tr>
                             <td><?php echo $i; ?></td>
							  <td><?php echo $rows->name; ?></td>
                             <td><?php echo $rows->doc_name; ?></td>
                             <td><?php echo $dispDate;?></td>
							  <td><a href="<?php echo base_url(); ?>assets/mobilization_plan/<?php echo $rows->doc_file; ?>" data-toggle="tooltip" title="Download"><i class="fa fa-download" aria-hidden="true" style="font-size:22px;"></i></a></td>
							  

                         </tr>
<?php  $i++; } ?>

                     </tbody>

                 </table>
             </div>
     </div>
 </div>
</div>
</div>

<script type="text/javascript">
$('#mobilization_plan').addClass('active');
$('#mobilization_planmenu').addClass('active');
</script>
