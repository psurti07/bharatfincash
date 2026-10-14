<?php
$this->load->view('includes/header-apply.php');
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
						<?php if($status == "true") { ?>
							<div class="text-center">
								<h1 class="icon pulse infinite text-success" data-animate="pulse infinite"><i class="icon-check-circle "></i></h1>
								<h2 class="text-success pd_bottom_20">Congratulations!</h2>
								<p>Your application has been successfully submitted. Our company executive call you back soon!</p>
								<div class="pd_bottom_20"></div>
								<a href="<?php echo site_url(); ?>" class="theme-btn one">Go to Homepage</a>
							</div>
						<?php } ?>
						<!-- END : SUCCESS -->

						<!-- START : FAIL -->
						<?php if($status == "false") { ?>
							<div class="text-center">
								<h1 class="icon pulse infinite text-danger m-0" data-animate="pulse infinite"><i class="icon-x-circle "></i></h1>
								<h2 class="text-danger pd_bottom_20">Payment Unsuccessful</h2>
								<p>Your plan offer payment process has failed. Please try again. If you have any questions you can contact on our customer care number.</p>
								<div class="pd_bottom_20"></div>

								<a href="<?php echo site_url(); ?>" class="theme-btn one">Go to Homepage</a>
							</div>
						<?php } ?>
						<!-- END : FAIL -->
					</div>
				</div>
			</div>
		</div>
		<!--===============spacing==============-->
		<div class="pd_bottom_95"></div>
		<!--===============spacing==============-->
	</section>

</div>

<?php
$this->load->view('includes/footer-apply.php');
?>
