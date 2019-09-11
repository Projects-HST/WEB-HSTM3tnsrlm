<div class="container">
  <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <?php if($this->session->flashdata('msg')): ?>
                      <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                              ×</button>
                          <?php echo $this->session->flashdata('msg'); ?>
                      </div>
                      <?php endif; ?>
                      <form method="post" action="<?php echo base_url(); ?>task/create" class="form-horizontal" enctype="multipart/form-data" id="staffform" >

                    <div class="form-example-wrap" style="margin-bottom:60px;">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Create task for Mobilizer</h2>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Select Mobilizer</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                      <select name="select_user" class="selectpicker " id="select_role">
                                        <option value="">--Select Mobilizer--</option>
                                        <?php foreach($res as $rows){ ?>
                                            <option value="<?php echo $rows->user_id; ?>"><?php echo $rows->name; ?></option>
                                      <?php  } ?>


                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Status</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                      <select name="task_status" class="selectpicker " id="task_status">
                                        <option value="">--Select Status--</option>
                                        <option value="Assigned">Assigned</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Title</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="task_title" placeholder="Task Title">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Description</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <textarea name="task_desc" rows="4" cols="100" name="task_desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Task Date</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm datepicker" name="task_date" placeholder="Task Title">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button class="btn btn-success notika-btn-success waves-effect">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
</div>
<script>
$('#task').addClass('active');
$('#taskmenu').addClass('active');
$('#staffform').validate({
      rules: {
        select_user: {
            required: true
        },
          task_title: {
              required: true
          },
          task_desc: {
              required: true
          },
          task_date: {
              required: true
          },

          task_status: {
              required: true
          }
      },
      messages: {
          select_user: "select user",
          task_title: "enter title",
          task_desc: "enter the task description",
          task_date: "select date",
          task_status: "select task status"
      }
});

</script>
