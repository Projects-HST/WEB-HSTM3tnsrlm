<div class="container">
	<div class="row" style="margin-bottom:100px;">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-element-list">
				<div class="cmp-tb-hd bcs-hd">
					<h2>Create PIA</h2>
				</div>
        <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <?php endif; ?>
			<div class="row">
			<form id="piaform">
		<div class="col-md-8">

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group ic-cmp-int">
							<div class="form-ic-cmp">
								<i class="notika-icon notika-edit"></i>
							</div>
							<div class="nk-int-st">
							  <input type="text" placeholder="PRN Number" name="unique_number" id="unique_number" class="form-control" value="">
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp">
									<i class="notika-icon notika-edit"></i>
								</div>
								<div class="nk-int-st">
									<input type="text" placeholder="Name" name="name" id="name" class="form-control" value="">
									</div>
								</div>
						</div>
			</div>
			<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group ic-cmp-int">
								<div class="form-ic-cmp">
									<i class="notika-icon notika-edit"></i>
								</div>
								<div class="nk-int-st">
										<input type="text" placeholder="Mobile Number" name="mobile" id="mobile" class="form-control">
								</div>
							</div>
						</div>


					
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
										<i class="notika-icon notika-edit"></i>
									</div>
									<div class="nk-int-st">
							  		<input type="text" name="email" id="email" class="form-control" placeholder="Email Address" />
									</div>
								</div>
						</div>
			</div>
			
			<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group ic-cmp-int">
									<div class="form-ic-cmp">
										<i class="notika-icon notika-edit"></i>
									</div>
									<div class="nk-int-st">
							  		<input type="text" name="state" id="state" class="form-control" placeholder="State" />
									</div>
								</div>
						</div>
						
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-group ic-cmp-int">
										<div class="form-ic-cmp">
											<i class="notika-icon notika-edit"></i>
										</div>
										<div class="nk-int-st">
											<textarea name="address" id="address" MaxLength="150" class="form-control" rows="3" cols="80" placeholder="Address"></textarea>

										</div>
									</div>
								</div>
			</div>

			<div class="row">
								
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<select name="status" class="selectpicker" id="status">
										<option value="">Status</option>
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
									</select>
								</div>
			</div>
	  

			<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group  form-elet-mg text-center">
											<button class="btn btn-success notika-btn-success waves-effect btn-upload-image">Submit</button>
										</div>
									</div>
			</div>

	</div>

	<div class = "col-md-4">

			<div class="row">

									
								<div class="col-md-12 text-center">
								<strong>Select image to crop:</strong>
									<div id="upload-demo"></div>
								</div>
			</div>
			<div class="row">
								<div class="col-md-12 text-center">
										<input type="file" id="image">
								</div>

			</div>

	</div>
            </form>
	</div>
					</div>
				</div>
			</div>
		</div>
<style>
.row{
  margin-bottom: 10px;
}
.nk-int-mk h2 {
    font-size: 13px;
    color: #c13b3b;
    margin-left: 22px;
    font-weight: 400;
}
</style>
<script type="text/javascript">
    $('#pia').addClass('active');
    $('#piamenu').addClass('active');

	$('#piaform').validate({
			rules: {
				unique_number: {
						required: true,
						maxlength: 13,
						minlength:13,
						number:true,
						remote: {
									 url: "<?php echo base_url(); ?>admin/check_unique_number",
									 type: "post"
								}
				},
				name: {
						required: true
				},
				mobile: {
						required: true,
						maxlength: 10,
						minlength:10,
						number:true,
				},
				email: {
						required: true,
						email: true,
				},
				state: {
						required: true
				},
				address: {
						required: true
				},
				status: {
						required: true
				}
		},
		messages: {
				unique_number: {
					required: "Enter PRN Number",
					maxlength:"Maximum 13 digits",
					minlength:"Minimum 13 digits",
					remote: "PRN Number Already Exist.",
					number:"Only Numbers"
				 },
				name: "Enter Name",
				mobile: {
						required: "Enter mobile number",
						maxlength:"Maximum 10 digits",
						minlength:"Minimum 10 digits",
						number:"Only Numbers"
				 },
				email: {
						 required: "Please enter your email address.",
						 email: "Please enter a valid email address."
				 },
				state: "Enter State",
				address: "Enter Address",
				status: "Select Status"
			}
		});


var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        width: 200,
        height: 200,
        type: 'circle' //square
    },
    boundary: {
        width: 250,
        height: 250
    }
});

$('#image').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});


 $('.btn-upload-image').on('click', function (ev) {

	var unique_number = document.getElementById("unique_number").value; 
	var name = document.getElementById("name").value;
	var mobile = document.getElementById("mobile").value;
	var email = document.getElementById("email").value;
	var state = document.getElementById("state").value;
	var address = document.getElementById("address").value;
	var status = document.getElementById("status").value;
	
	if (unique_number!='' && status !=''){
		
		resize.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function (image) {
			$.ajax({
			  url: "<?php echo base_url(); ?>admin/createpia",
			  type: "POST",
			  data: {"image":image,"unique_number":unique_number,"name":name,"mobile":mobile,"email":email,"state":state,"address":address,"status":status},
			  success:function(data)
				{
					alert(data);
				  if(data=="success"){
					  alert("Picture Updated");
					  //location.href = '<?php echo base_url(); ?>view_pia';
				  }else{
					  alert("Something Went Wrong");
				  }
				}
			});
  });
	}
	
	  
  
});

</script>
