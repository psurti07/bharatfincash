<?php
$this->load->view('includes/header-apply.php');

$amtpay = $productdata['payamount'];
$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>
<div id="content" class="site-content bg-white">
	<section class="">
		<div class="auto-container" style="min-height: 100vh;">
			<div class="row default_row">
				<div id="primary" class="content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
					<main id="main" class="site-main" role="main">
						<!--===============spacing==============-->
						<div class="pd_top_25"></div>
						<!--===============spacing==============-->

						<!-- digital/checkoutDigital -->
						<?php echo form_open('digital/checkoutDigital', array('id' => 'submitForm3', 'class' => 'checkout woocommerce-checkout', 'novalidate' => 'novalidate')); ?>

						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 pd_bottom_30">
								<div class="left_content">
									<div class="main_content">
										<h3 class="text-success pd_bottom_20"><i class="icon-user-check"> </i> Congrats, <span class="text-capitalize"><?php echo $userdetails['fullname']; ?>!</span></h3>
										<h6>Buy Subscription To Instantly Process Your <strong class="text-success">Rs.<?php echo formatePriceIndia($eligibilityamt); ?> </strong> Pre-Approved Loan Offer. <span class="text-danger font-italic small" style="font-weight:500">- Valid Till 12 AM</span></h6>
									</div>
								</div>
							</div>

							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 mb-lg-4">
								<input type="hidden" name="loantype" id="loantype"
									value="<?php echo $userdetails['loantype']; ?>" class="form-control" required>

								<input type="hidden" name="applyid" id="applyid"
									value="<?php echo $userdetails['applyid']; ?>" class="form-control" required>

								<input type="hidden" name="fullname" id="fullname"
									value="<?php echo $userdetails['fullname']; ?>" class="form-control" required>

								<input type="hidden" name="mobile" id="mobile"
									value="<?php echo $userdetails['mobile']; ?>" class="form-control" required>

								<input type="hidden" name="email" id="email"
									value="<?php echo $userdetails['email']; ?>" class="form-control" required>

								<input type="hidden" name="orderAmount" id="orderAmount" value="<?php echo $amtpay; ?>"
									class="form-control" required>

								<div class="price_plan_box style_one">
									
									<div class="inner_box">
										<div class="mid">
											<?php
											if ($productdata['offeramount'] != 0) {
												echo '<p><del class="text-danger">₹ ' . formatePriceIndia($productdata['amount']) . '</del></p>';
												echo '<h4>₹ ' . formatePriceIndia($productdata['offeramount']) . '</h4>';

												$subtotal = $productdata['offeramount'];
											} else {
												echo '<h4>₹ ' . formatePriceIndia($productdata['amount']) . '</h4>';
												$subtotal = $productdata['amount'];
											}
											?>
										</div>
										<div class="bottom">
											<ul>
												<li>
													<span class="text-success"> <strong>
															<?php echo calPercentage($productdata['amount'], $productdata['offeramount']); ?>
															Off
														</strong></span>
													<i class="fa fa-percent"></i>
												</li>

												<li><span>Amount:
													<?php echo formatePriceIndia($subtotal); ?></span>
													<i class="fa fa-plus"></i>
												</li>

												<li><span>GST (18%):
													<?php $gst = $subtotal * 0.18;
													echo formatePriceIndia($gst); ?></span>
													<i class="fa fa-plus"></i>
												</li>

												<li><span>Grand Total:
													<?php $grandtotal = $subtotal + $gst;
													echo formatePriceIndia($grandtotal); ?></span>
													<i class="fa fa-rupee"></i>
												</li>

											</ul>

											<button type="submit" id="form-submit3" class="wpcf7-form-control has-spinner wpcf7-submit custom-btn">BUY NOW</button>
										</div>
									</div>
								</div>

								<div id="resmessage"></div>
							</div>
						</div>
						<?php echo form_close(); ?>

						<!--===============spacing==============-->
						<div class="pd_bottom_25"></div>
						<!--===============spacing==============-->
					</main>
				</div>

				<aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12 pt-5 pe-0 ps-0">
					<div class="service_siderbar side_bar pe-0 me-0">
						<div class="widgets_grid_box">
							<div class="widget creote_widget_service_list">
								<h4 class="widget-title">Customer Info</h4>
								<ul class="">
									<li><strong>Name : </strong> <span class="text-end">
											<?php echo $userdetails['fullname']; ?>
										</span> </li>

									<li><strong>Mobile no : </strong> <span class="text-end">
											<?php echo $userdetails['mobile']; ?>
										</span> </li>

									<li><strong>Loan Amount : </strong> <span class="text-end">₹
											<?php echo formatePriceIndia($userdetails['loanamount']); ?>
										</span> </li>
								</ul>
								<!--===============spacing==============-->
                                <div class="pd_bottom_25"></div>
                                <!--===============spacing==============-->

                                <h4 class="widget-title">Subscription Benefits:</h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-check"></i> Consultation Process in Multiple NBFCs
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> 100% Online Financial Consultation
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> Access Personalized Tracking Portal
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i> Dedicated Expert Assigned
                                    </li>

                                    <li>
                                        <i class="fa fa-check"></i> Plan Validity: 3 months
                                    </li>

                                </ul>
							</div>
						</div>

						<!--===============spacing==============-->
						<div class="pd_bottom_45"></div>
						<!--===============spacing==============-->
					</div>
				</aside>
			</div>
		</div>
	</section>

</div>

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
	$(function () {
		$('#submitForm1').on('submit', function (e) {
			$('#form-submit3').attr('disabled', true);
			$('#form-submit3').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...');
		});
	});
</script>