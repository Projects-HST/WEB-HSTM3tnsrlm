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
			
			
			<div class="row page_row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-example-wrap">
			
			 <form method="post" action="<?php echo base_url(); ?>mobilization/upload_data" class="form-horizontal" enctype="multipart/form-data" id="staffform" >
				<div class="cmp-tb-hd cmp-int-hd">
					<h2>Upload Plan</h2>
				</div>
						
				 <div class="form-example-int form-horizental">
                            <div class="form-group">
           
								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Upload Date</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
											<input type="text" placeholder="Upload Date" name="doc_month_year" id="doc_month_year" class="form-control track_date input-sm" />
                                    </div>
									
									
									  <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>

								
								<div class="row page_row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Document Title</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<input type="text" placeholder="Document Title" name="doc_name" class="form-control input-sm" maxlength="50">
                                    </div>
								
									<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
								
							
								<div class="row page_row">

								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Document File</label>
                                    </div>
                                    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
                                            <input type="file" class="form-control input-sm" name="doc_file" placeholder="">
                                    </div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
                                </div>
								<div class="row page_row">
								 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                           <button class="btn btn-success notika-btn-success waves-effect">Upload</button>
                                    </div>
								<div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
								</div>
							</div>
							
								
					</div>
                </div>	
              </form>
                    
            </div>
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
<script>
$('#mobilization_plan').addClass('active');
$('#mobilization_planmenu').addClass('active');
$('#upload_plan').addClass('active');


$('#staffform').validate({
      rules: {
          doc_name: {
              required: true
          },
          doc_file: {
              required: true,extension: "xls|doc|docx|xlsx|pdf"
          },
          doc_month_year: {
              required: true
          }
      },
      messages: {
          doc_name: "Enter document title",
          doc_file :{
            required: "Select plan document",extension: "Upload excel or doc or pdf"
          },
          doc_month_year: "Select upload date"
      },
      submitHandler: function(form) {
        if (confirm('Confirm to Submit ')) {
            form.submit();
        }
    }
});


</script>
