    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">

			 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $result['center_count']; ?> </h2>
                            <p><span><i class="fa fa-building" aria-hidden="true"></i></span> <a href="<?php echo base_url(); ?>admin/pia_center_list/<?php echo base64_encode($result['pia_id']*98765); ?>"> Center Count</a></p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $result['mobilizer_count']; ?></span></h2>
                            <p><span><i class="fa fa-user " aria-hidden="true"></i></span> <a href="<?php echo base_url(); ?>admin/pia_mobilizer_list/<?php echo base64_encode($result['pia_id']*98765); ?>">Mobilizer Count</a></p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $result['student_count']; ?></span></h2>
                            <p><span><i class="fa fa-user " aria-hidden="true"></i></span> <a href="<?php echo base_url(); ?>admin/pia_student_list/<?php echo base64_encode($result['pia_id']*98765); ?>">Students Count</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->

    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Mobilization Statistics</h2>
                                <p>Vestibulum purus quam scelerisque, mollis nonummy metus</p>
                            </div>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">

                </div>
            </div>
        </div>
    </div>
    <!-- End Sale Statistic area-->




	<script type="text/javascript">
    $('#pia').addClass('active');
    $('#piamenu').addClass('active');
	</script>
