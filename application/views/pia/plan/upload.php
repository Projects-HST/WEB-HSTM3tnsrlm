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
                      <form method="post" action="<?php echo base_url(); ?>mobilization/upload_data" class="form-horizontal" enctype="multipart/form-data" id="staffform" >

                    <div class="form-example-wrap" style="margin-bottom:150px;">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Upload Mobilization Plan</h2>
                        </div>


                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Docment name</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="doc_name" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">File</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="file" class="form-control input-sm" name="doc_file" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Date</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm datepicker" name="doc_month_year" placeholder="">
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
                                    <button class="btn btn-success notika-btn-success waves-effect">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
</div>
<script>
$('#mobilization_plan').addClass('active');
$('#mobilization_planmenu').addClass('active');
$('#staffform').validate({
      rules: {
          doc_name: {
              required: true
          },
          doc_file: {
              required: true,extension: "xls|doc|docx|xlsx"
          },
          doc_month_year: {
              required: true
          }
      },
      messages: {
          doc_name: "enter document name",
          doc_file :{
            required: "upload file",extension: "Upload excel or doc"
          },
          doc_month_year: "select date"
      },
      submitHandler: function(form) {
        if (confirm('Confirm to Submit ')) {
            form.submit();
        }
    }
});

</script>
