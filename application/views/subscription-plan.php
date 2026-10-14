<?php
$this->load->view('includes/header-subscription.php');

$amtpay = $productdata['payamount'];
$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>
<div id="content" class="site-content ">
	<section class="">
		<div class="auto-container">
			<div class="row default_row">
				<div id="primary" class="content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
					<main id="main" class="site-main ps-md-4" role="main">
						
						<!-- subscription/checkoutSubscription -->
						<?php echo form_open('subscription/checkoutSubscription', array('id' => 'submitForm3', 'class' => 'checkout woocommerce-checkout', 'novalidate' => 'novalidate')); ?>

						<div class="row gutter_30px">
							<div class="col-xl-12 col-lg-12 col-md-12 pd_bottom_10">
								<div class="left_content">
									<div class="main_content">
										<h3 class="text-success pd_bottom_10"><i class="icon-user-check"> </i> Congrats,
											<span
												class="text-capitalize"><?php echo $userdetails['fullname']; ?>!</span>
										</h3>
										
									</div>
								</div>
							</div>

							<div class="col-xl-12 col-lg-12 col-md-12 pd_bottom_10">
								<div class="left_content">
									<div class="main_content">
										<div class="loan-banner">
											<div class="banner-left">
												<div class="icon_x">
													💰
												</div>
												<div class="text">
													<div class="title">Great News! You're eligible for up to <strong
												class="text-success" style="color:#f06d24 !important">Rs.<?php echo formatePriceIndia($eligibilityamt); ?></strong> 
												</div>
													
												</div>
											</div>

										</div>
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
									
									<div class="form-group col-md-12 text-center ps-0">
										<div class="credit">
											<div
												class="credit__front credit__part <?php echo strtolower($userdetails['cardname']) . '-card'; ?>">
												<div class="credit__head"></div>
												<p class="credit_numer text-left">**** **** ****
													<?php echo random_code(4); ?>
												</p>
												<div class="credit__space-full text-left">
													<span class="credit__label">VALID FROM
														<?php echo date('d/m/Y'); ?> VALID TO
														<?php echo date('d/m/Y', strtotime('+3 months')); ?>
													</span>
													<p class="credit__info">
														<?php echo $userdetails['fullname']; ?>
													</p>
												</div>
											</div>
										</div>
									</div>
									<div class="inner_box">
										<div class="mid">
											<?php
											if ($productdata['offeramount'] != 0) {
												echo '<p><del class="text-danger">₹ ' . formatePriceIndia($productdata['amount']) . '</del></p>';
												echo '<h4 class="text-success">₹ ' . formatePriceIndia($productdata['offeramount']) . '</h4>';

												$subtotal = $productdata['offeramount'];
											} else {
												echo '<h4 class="text-success">₹ ' . formatePriceIndia($productdata['amount']) . '</h4>';
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
													<i class="fa fa-percent text-success"></i>
												</li>

												<li><span>Amount:
														<?php echo formatePriceIndia($subtotal); ?></span>
													<i class="fa fa-plus text-success"></i>
												</li>

												<li><span>GST (18%):
														<?php $gst = $subtotal * 0.18;
													echo formatePriceIndia($gst); ?></span>
													<i class="fa fa-plus text-success"></i>
												</li>

												<li><span>Grand Total:
														<?php $grandtotal = $subtotal + $gst;
													echo formatePriceIndia($grandtotal); ?></span>
													<i class="fa fa-rupee text-success"></i>
												</li>

											</ul>

											<button type="submit" id="form-submit3"
												class="wpcf7-form-control has-spinner wpcf7-submit custom-btn kg-custom-btn">BUY
												NOW</button>
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

				<aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12">
					<div class="service_siderbar side_bar">
						<div class="widgets_grid_box newsteller kg-newsteller style_one kg-style_one content mb-0">
							<div
								class="widget creote_widget_service_list newsteller kg-newsteller style_one kg-style_one content">
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
							</div>
						</div>

						<!--===============spacing==============-->
						<div class="pd_bottom_45"></div>
						<!--===============spacing==============-->
						
							<div class="widgets_grid_box newsteller kg-newsteller style_one kg-style_one content mb-0">
								<div class="widgets_grid_box newsteller kg-newsteller style_one kg-style_one content mb-0">
									<div class="inner_box">
										<h4 class="widget-title mb-2">Subscription Benefits:</h4>
										<div class="bottom">
											<ul>
												<li>
													<i class="fa fa-check-circle"></i> Loan Process in Multiple NBFCs
												</li>
												<li>
													<i class="fa fa-check-circle"></i> 100% Online Financial Consultation
												</li>
												<li>
													<i class="fa fa-check-circle"></i> Access Personalized Tracking Portal
												</li>
												<li>
													<i class="fa fa-check-circle"></i> Dedicated Loan Expert Assigned
												</li>
												<li>
													<i class="fa fa-check-circle"></i> Subscription Validity: 6 Months
												</li>
												<li>
													<i class="fa fa-check-circle"></i> Loan Processing Time: 48 Hours
												</li>

											</ul>
										</div>
										<div class="section__counter two_column">
											<div class="grid_show_case grid_layout clearfix"
											>

												<div class="grid_box _card">
													<div class="counter-block style_one count-box counted">
														<div class="icon_box  ">
															<div class="icon">
																<img src="<?php echo base_url('assets/images/fun-4.png'); ?>"
																	class="img-fluid svg_image" alt="icon png">
															</div>
															<div class="coun_ter">
																<span class="count-text">82K</span>
															</div>
														</div>
														<div class="content_box">
															<p class="text-dark">Satisfied Customers</p>
														</div>
													</div>
												</div>
												<div class="grid_box _card">
													<div class="counter-block style_one count-box counted">
														<div class="icon_box  ">
															<div class="icon">
																<img src="<?php echo base_url('assets/images/fun-1.png'); ?>"
																	class="img-fluid svg_image" alt="icon png">
															</div>
															<div class="coun_ter">
																<span class="count-text">100M</span>
															</div>
														</div>
														<div class="content_box">
															<p class="text-dark">Loan Amt. Disbursed</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

					</div>
				</aside>
			</div>
		</div>
	</section>

	<section class="service-section-one bg_light_1 pt-3">
		<div class="pd_top_10"></div>
		<div class="default-container">
			<div class="row ">
				<div class="col-lg-12">
					<div class="title_all_box style_one  text-center dark_color">
						<div class="title_sections left">
							<h2>Best Personal Loan Offers <span class="text-success">from Top Banks</span>
							</h2>
						</div>

					</div>
				</div>
			</div>
			<div class="pd_top_10"></div>
			<div class="row icon_box_all style_three align-items-center border border-success">
				
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="icon pt-0">
								<img src="<?php echo base_url('assets/images/bank/039.png'); ?>" alt="IIFL Logo"
									class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Amount*
								</p>
								<h6 class="mb-0">
									Up to 5 lakh
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Rate of Interest*
								</p>
								<h6 class="mb-0">12.75% to 44%
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Tenure
								</p>
								<h6 class="mb-0"> Up to 42 Months
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd_bottom_20"></div>
			<div class="row icon_box_all style_three align-items-center border border-success">
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="icon pt-0">
								<img src="<?php echo base_url('assets/images/bank/015.png'); ?>" alt="Faircent Logo"
									class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Amount*
								</p>
								<h6 class="mb-0">Rs. 20L
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Rate of Interest*
								</p>
								<h6 class="mb-0">12% to 28%</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Tenure
								</p>
								<h6 class="mb-0">6 to 36 Months</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd_bottom_20"></div>
			<div class="row icon_box_all style_three align-items-center border border-success">
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="icon pt-0">
								<img src="<?php echo base_url('assets/images/bank/WhatsApp_Image_2024-04-15_at_17_16_25.jpeg'); ?>"
									alt="L&T Logo" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Amount*
								</p>
								<h6 class="mb-0">Up to 30 Lakh
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Rate of Interest*
								</p>
								<h6 class="mb-0">11%</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Tenure
								</p>
								<h6 class="mb-0">Up to 72 months</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd_bottom_20"></div>
			<div class="row icon_box_all style_three align-items-center border border-success">
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="icon pt-0">
								<img src="<?php echo base_url('assets/images/bank/006.png'); ?>" alt="Tata Capital Logo"
									class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Amount*
								</p>
								<h6 class="mb-0">
									Up to 35 Lakh
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Rate of Interest*
								</p>
								<h6 class="mb-0">11.50%
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Tenure
								</p>
								<h6 class="mb-0"> Up to 72 months
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd_bottom_20"></div>
			<div class="row icon_box_all style_three align-items-center border border-success">
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="icon pt-0">
								<img src="<?php echo base_url('assets/images/bank/piramal_1-rect.png'); ?>"
									alt="Piramal Logo" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Amount*
								</p>
								<h6 class="mb-0">
									50,000 to 25 Lakh
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Rate of Interest*
								</p>
								<h6 class="mb-0">12.9%
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Tenure
								</p>
								<h6 class="mb-0"> 9 to 60 months
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd_bottom_20"></div>
			<div class="row icon_box_all style_three align-items-center border border-success">
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="icon pt-0">
								<img src="<?php echo base_url('assets/images/bank/038.png'); ?>" alt="Finnable Logo"
									class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Amount*
								</p>
								<h6 class="mb-0">
									10 lakh
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Rate of Interest*
								</p>
								<h6 class="mb-0">16% to 35.99%
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Tenure
								</p>
								<h6 class="mb-0"> 6 to 60 Months
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd_bottom_20"></div>
			<div class="row icon_box_all style_three align-items-center border border-success">
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="icon pt-0">
								<img src="<?php echo base_url('assets/images/bank/023.png'); ?>" alt="Lending kart Logo"
									class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Amount*
								</p>
								<h6 class="mb-0">
									50,000 to 2CR
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Rate of Interest*
								</p>
								<h6 class="mb-0">12% to 27%
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="text_box">
								<p>
									Loan Tenure
								</p>
								<h6 class="mb-0"> 12 to 36 Months
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd_bottom_20"></div>
			<div class="text-center">
			<p class="p-t-10"><small>Disclaimer - The above data is tentative and purely on the information provided by
					you. Final EMI, loan sanction, loan approval, and loan amount depend on customer profile and NBFCs
					criteria and rules & regulations.</small></p>
		</div>
		</div>
		<div class="pd_bottom_60"></div>
	</section>

</div>

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
	$(function () {
		$('#submitForm1').on('submit', function (e) {
			$('#form-submit3').attr('disabled', true);
			$('#form-submit3').html(
				'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...'
			);
		});
	});
</script>