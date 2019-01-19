<div class="container">
<div class="row">
<div class="data-table-area">
<div class="container">
 <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="data-table-list">
             <div class="basic-tb-hd">
                 <h2>View All Task</h2>
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
                             <th>Mobilizer Name</th>
                             <th>Task title</th>
                             <th>Description</th>
                             <th>Task Date</th>
                             <th>status</th>
                             <th>Action</th>


                         </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach($result as $rows){ ?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php echo $rows->name; ?></td>
                             <td><?php echo $rows->task_title; ?></td>
                             <td><?php echo $rows->task_description; ?></td>
                              <td><?php echo $rows->task_date; ?></td>
                             <td>  <button class="btn btn-success notika-btn-success waves-effect"><?php echo $rows->status; ?></button>
                              </td>
                             <td>
                               <a href="<?php echo base_url(); ?>task/edit/<?php echo base64_encode($rows->id*98765); ?>"><i class="notika-icon notika-edit"></i></a></td>


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
$('#task').addClass('active');
$('#taskmenu').addClass('active');
</script>
