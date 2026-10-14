<?php
    $this->load->view('subscriptioncustomer/includes/header.php');

	if($profiledata->cardtype == 22) {
    	$loantype = "bl";
	}
	else {
		$loantype = "pl";
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

				<?php if ($kycstatus == 0) { ?>
					<div class="alert alert-danger" role="alert">
						<p class="mr_bottom_5">Your documents need to upload for KYC and verify your account.
						<a href="<?php echo site_url('subscriptioncustomer/profile/documents'); ?>" class="alert-link hover">Upload Now</a></p>
					</div>
				<?php } ?>

				<?php 
				if($accountmsg->option_value != "" && strlen($accountmsg->option_value)>0) {  ?>
					<div class="alert alert-danger" role="alert">
						<p class="badge text-dark">Important Update</p><br/>
						<?php echo $accountmsg->option_value; ?>
					</div>
				<?php } ?>

				<!--===============spacing==============-->
				<div class="pd_top_40"></div>
				<!--===============spacing==============-->

				<section class="creote-icon-box">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="counter-block style_two count-box">
								<div class="coun_ter">
									<span class="count-text" data-speed="1000" data-stop="<?php echo $statestics['personalloan']; ?>"></span>
								</div>
								<div class="content_box">
									<h6>Personal Loan Applications</h6>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="counter-block style_two count-box">
								<div class="coun_ter">
									<span class="count-text" data-speed="1000" data-stop="<?php echo $statestics['businessloan']; ?>"></span>
								</div>
								<div class="content_box">
									<h6>Business Loan Applications</h6>
								</div>
							</div>
						</div>
						<!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<div class="counter-block style_two count-box">
								<div class="coun_ter">
									<span class="count-text" data-speed="1500" data-stop="<?php echo $statestics['referalusers']; ?>"></span>
								</div>
								<div class="content_box">
								<h6>Total Referral Customers</h6>
								</div>
							</div>
						</div> -->
					</div>
				</section>

				<section class="default_single_product">
					<div class="container">
						<div class="row default_row">
							<div class="full_width_box">
								<!--===============spacing==============-->
								<div class="pd_top_40"></div>
								<!--===============spacing==============-->
								<!-- <div class="title_all_box style_one text-center dark_color">
									<div class="title_sections pd_bottom_20">
									<h2>Refer and Earn up to Rs 1 Lac per month</h2>
									</div>
								</div>

								<input type="text" name="referrallink" class="form-control pt-1 " value="<?php echo base_url('subscription/'.$loantype.'/'.$profiledata->refcode); ?>" readonly=""> -->

								<div class="woocommerce-tabs wc-tabs-wrapper">
									<h4 class="pd_bottom_10">Submit Documents</h4>
									<p>Dear Sir / Madam,<br/>
										Kindly submit a list of the following documents as per your profile. Send all documents by email to <a href="mailto:support@indcapital.in" target="_blank"><strong>support@indcapital.in</strong></a></p>
									<p><strong>If you are a salaried person</strong> - Aadhar Card, Pan Card, Bank Statement of 6 months, Photo, Cancelled Cheque, Salary Slip of 3 months, Form16 - 1 years / 2 years.</p>
									<p><strong>If you are a self-employed person</strong> - Aadhar Card, Pan Card, Bank Statement of 6 months, Photo, Cancelled Cheque, Business Proof, IT Return - 1 years / 2 years.</p>
									<p><em>Note: Additional documents required as per customer profile.</em></p>
								</div>
							</div>
						</div>
					</div>
				</section>

				<!--===============spacing==============-->
				<div class="pd_bottom_40"></div>
				<!--===============spacing==============-->
			</div>
		</div>
	</div>
</div>

<?php
    $this->load->view('subscriptioncustomer/includes/footer.php');
?>
