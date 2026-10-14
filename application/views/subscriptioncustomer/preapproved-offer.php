<?php
$this->load->view('subscriptioncustomer/includes/header.php');

$pllink = $bllink = "#";

if ($profiledata->cardtype == 21) {
	$pllink = site_url('subscriptioncustomer/subscription/personalLoan');
	$bllink = site_url('subscription/businessLoan');
} else if ($profiledata->cardtype == 22) {
	$pllink = site_url('subscription/personalLoan');
	$bllink = site_url('subscriptioncustomer/subscription/businessloan');
}
?>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
    <div class="container">
        <div class="row default_row">
            <div class="full_width_box">
                <!--===============spacing==============-->
                <div class="pd_top_80"></div>
                <!--===============spacing==============-->

                <div class="text-center">
                    <h4>Pre-approved Offers</h4>
                    <div class="pd_bottom_40"></div>
                </div>

                <section class="service-section">
                    <div class="row">
                        <?php
						if (count($directlinks)) {
							foreach ($directlinks as $row) {
								?>
                        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="service_box style_one dark_color">
                                <div class="service_content">
                                    <div class="image ">
                                        <img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>"
                                            class="img-fluid" alt="Bank Image" width="200">
                                    </div>
                                    <div class="btn_center text-center">
                                        <a href="<?php echo $row->applyurl; ?>" target="_blank"
                                            class="theme-btn one">Apply
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
							}
						} ?>
                    </div>
                </section>
                <!--===============spacing==============-->
                <div class="pd_bottom_50"></div>
                <!--===============spacing==============-->
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('subscriptioncustomer/includes/footer.php');
?>