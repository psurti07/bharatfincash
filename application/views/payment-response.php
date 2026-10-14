<?php
$this->load->view('includes/header-apply.php');

if($responsedata['loantype'] == 11) {
	$loantype = "Personal Loan";
}
else if($responsedata['loantype'] == 12) {
	$loantype = "Business Loan";
}
else {
	$loantype = "Loan";
}
?>
<div id="content" class="site-content ">
	<section class="default_single_product">
		<!--===============spacing==============-->
		<div class="pd_top_65"></div>
		<!--===============spacing==============-->
		<div class="auto-container">
			<div class="row default_row">
				<div class="col-lg-12">
                	<div class="woocommerce-tabs wc-tabs-wrapper">
						<!-- START : SUCCESS -->
						
						<?php if($responsedata['status'] == "true") { ?>
							<div class="text-center">
								<h1 class="icon pulse infinite text-success" data-animate="pulse infinite"><i class="icon-check-circle "></i></h1>
								<h2 class="text-success pd_bottom_20">Congratulations!</h2>
								<p>Your <?php echo $loantype; ?> application has been successfully summited.</p>
								<p>Please check your email and submit required documents and company executive call you back soon!</p>
								<div class="pd_bottom_20"></div>

								<a href="<?php echo site_url('customer/login'); ?>" class="theme-btn one">Login Now</a>
								<a href="<?php echo site_url(); ?>" class="theme-btn one">Go to Home Page</a>
							</div>
						<?php } ?>
						<!-- END : SUCCESS -->

						<!-- START : FAIL -->
						<?php if($responsedata['status'] == "false") { ?>
							<div class="text-center">
								<h1 class="icon pulse infinite text-danger m-0" data-animate="pulse infinite"><i class="icon-x-circle "></i></h1>
								<h2 class="text-danger pd_bottom_20">Payment Unsuccessful</h2>
								<p>Your loan application payment process has failed. Please try again.</p>
								<p>If you have any questions you can contact on our customer care number.</p>
								<div class="pd_bottom_20"></div>
								<?php if($responsedata['loantype'] == '11'){?>
								<a href="<?php echo site_url('specialoffer'); ?>" class="theme-btn one">Try another payment method</a>
								<?php } else if($responsedata['loantype'] == '12') {?>
									<a href="<?php echo site_url('specialoffer'); ?>" class="theme-btn one">Try another payment method</a>
								<?php } ?>
							</div>
						<?php } ?>
						<!-- END : FAIL -->
					</div>
				</div>
			</div>
		</div>
		<!--===============spacing==============-->
		<div class="pd_bottom_65"></div>
		<!--===============spacing==============-->
	</section>

	<?php
	if($responsedata['status'] == "true") {
		if(isset($banklinks)){
		 if (count($banklinks)) { ?>
	<section class="bg_light_1">
		<!--===============spacing==============-->
		<div class="pd_top_60"></div>
		<!--===============spacing==============-->
		<div class="container bg_light_1">
			<div class="row">
				<div class="col-lg-12">
					<div class="title_all_box style_one text-center dark_color">
						<div class="title_sections">
							<h2>Our Pre-approved Loan Offers for You!</h2>
						</div>
					</div>
				</div>
				<!--===============spacing==============-->
				<div class="pd_bottom_30"></div>
				<!--===============spacing==============-->
			</div>
			<div class="row default_row">
				<div class="full_width_box">
					<section class="service-section">
						<div class="row">
							<?php
							foreach ($banklinks as $row) {
								?>
								<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
									<div class="choose_box  type_one">
										<div class="image_box">
											<img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>" class="img-fluid svg_image" alt="bank apply">
										</div>
										<div class="content_box">
											<div class="text_box">
												<h2> <a href="<?php echo $applyurl; ?>" target="_blank">
													<?php echo $row->bank_name; ?> </a></h2>
												<p><?php echo $loantype; ?></p>
												<a href="<?php echo $applyurl; ?>" class="read_more type_one" target="_blank">
													Apply Now <span class="icon-arrow-right"></span>
												</a>
											</div>
										</div>
									</div>
								</div>
							<?php
							} ?>
						</div>
					</section>
					<!--===============spacing==============-->
					<div class="pd_bottom_30"></div>
					<!--===============spacing==============-->
				</div>
			</div>
		</div>
		<!--===============spacing==============-->
		<div class="pd_bottom_30"></div>
		<!--===============spacing==============-->
	</section>
	<?php } }
	} ?>

</div>

<?php if($responsedata['status'] == "true") { ?>

<script>
	window.uetq = window.uetq || [];
	uetq.push({
		'ec': 'Purchase',
		'name': '<?= $ms_hashed_data['name']; ?>'
			'phone': '<?= $ms_hashed_data['phone']; ?>',
		'email': '<?= $ms_hashed_data['email']; ?>',
	});
</script>

<?php } ?>
<?php
$this->load->view('includes/footer-apply.php');
?>
