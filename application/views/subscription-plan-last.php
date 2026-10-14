<?php
$this->load->view('includes/header-subscription.php');

$amtpay = $productdata['payamount'];
$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>
<div id="content" class="site-content ">
	<section class="">
		<div class="container">
			<div class="row default_row">
				<div id="primary" class="content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
					<main id="main" class="site-main" role="main">
						<!--===============spacing==============-->
						<div class="pd_top_25"></div>
						<!--===============spacing==============-->

						<!-- subscription/checkoutSubscription -->
						<?php echo form_open('subscription/checkoutSubscription', array('id' => 'submitForm3', 'class' => 'checkout woocommerce-checkout', 'novalidate' => 'novalidate')); ?>

						<div class="row gutter_30px">
							<div class="col-xl-12 col-lg-12 col-md-12 pd_bottom_10">
								<div class="left_content">
									<div class="main_content">
										<h3 class="text-success pd_bottom_20 d-none"><i class="icon-user-check"> </i>
											Congrats,
											<span
												class="text-capitalize"><?php echo $userdetails['fullname']; ?>!</span>
										</h3>

										<h5><span class="badge text-bg-success p-2">Purchase Plan </span> To Start Your Loan Process
											Now To Get
											<strong
												class="text-success">Rs.<?php echo formatePriceIndia($eligibilityamt); ?></strong>
										</h5>
									</div>
								</div>
							</div>

							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 mb-lg-4 p-0">
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


								<div
									class="row kg-price_plan_box price_plan_box style_one border border-success shadow-none bg-transparent">
									<div class="col-lg-6 col-md-12 col-12 p-0">
										<h5 class="pd_bottom_10 text-start ps-3">Subscription
											Plan Benefits:</h5>
										<div class="bottom">
											<ul class="mb-0">
												<li class="ps-5 text-success fw-bold mb-0">
													<span class="icon_bx">
														<i class="fa fa-check text-success fs-5"></i>
													</span>Fully 100% Digital Process
												</li>
												<li class="ps-5 text-success fw-bold mb-0">
													<span class="icon_bx">
														<i class="fa fa-check text-success fs-5"></i>
													</span>Excellent On-Call Support
												</li>
												<li class="ps-5 text-success fw-bold mb-0">
													<span class="icon_bx">
														<i class="fa fa-check text-success fs-5"></i>
													</span>Apply for Loan in Our NBFC Partners
												</li>

												<li class="ps-5 text-success fw-bold mb-0">
													<span class="icon_bx">
														<i class="fa fa-check text-success fs-5"></i>
													</span>Plan Validity: 9 months
												</li>

											</ul>
										</div>

									</div>
									<div class="col-lg-6 col-md-12 col-12 p-2">
										<div class="bottom">
											<ul class="mb-0">
												<?php
											if ($productdata['offeramount'] != 0) {
												/* echo '<p><del class="text-danger">₹ ' . formatePriceIndia($productdata['amount']) . '</del></p>';
												echo '<h4 class="text-success">₹ ' . formatePriceIndia($productdata['offeramount']) . '</h4>'; */

												$subtotal = $productdata['offeramount'];
											} else {
												/* echo '<h4 class="text-success">₹ ' . formatePriceIndia($productdata['amount']) . '</h4>'; */
												$subtotal = $productdata['amount'];
											}
											?>
												<li class="ps-0 text-orange"><span style="font-size: 28px;">
														Amount:<strong>
															<?php echo formatePriceIndia($subtotal); ?>
														</strong>
													</span>

												</li>

												<li
													class="border-1 border-top border-secondary rounded-0 ps-0 text-success fw-bold">
													<span style="font-size: 18px;">
														<img src="<?php echo base_url('/assets/images/arrow.png') ?>"
															alt="" class="me-2">GST (18%):<strong>
															<?php $gst = $subtotal * 0.18;
													echo formatePriceIndia($gst); ?>
														</strong>
													</span>

												</li>

												<li
													class="border-1 border-top border-secondary rounded-0 ps-0 text-success fw-bold">
													<span style="font-size: 18px;">
														<img src="<?php echo base_url('/assets/images/arrow.png') ?>"
															alt="" class="me-2">Grand Total:<strong>
															<?php $grandtotal = $subtotal + $gst;
													echo formatePriceIndia($grandtotal); ?>
														</strong>
													</span>

												</li>

											</ul>


										</div>
									</div>
									<button type="submit" id="form-submit3"
										class="wpcf7-form-control has-spinner wpcf7-submit custom-btn kg-custom-btn">BUY
										NOW</button>
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

				<aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12 d-none d-md-block">
					<div class="service_siderbar side_bar">
						<div class="widgets_grid_box newsteller kg-newsteller style_one kg-style_one content mb-0">
							<div
								class="widget creote_widget_service_list newsteller kg-newsteller style_one kg-style_one content">
								<h4 class="widget-title">Customer Info</h4>
								<ul class="">
									<li class="fs-6"><strong>Name : </strong> <span class="text-end">
											<?php echo $userdetails['fullname']; ?>
										</span> </li>

									<li class="fs-6"><strong>Mobile no : </strong> <span class="text-end">
											<?php echo $userdetails['mobile']; ?>
										</span> </li>

									<li class="fs-6"><strong>Loan Amount : </strong> <span class="text-end">₹
											<?php echo formatePriceIndia($userdetails['loanamount']); ?>
										</span> </li>
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
			<div class="row icon_box_all style_three align-items-center border border-success">
				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
					<div class="icon_box_all">
						<div class="icon_content">
							<div class="icon pt-0">
								<img src="<?php echo base_url('assets/images/bank/043.jpeg'); ?>"
									alt="Lending kart Logo" class="img-fluid">
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
									1000 to 10 lakh
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
								<h6 class="mb-0">12% to 28.5%
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
			<p class="text-center">Disclaimer: The interest rate charges are subject to constant change as they
				are affected by several factors. Please check the prevailing interest rate with your lender
				before applying.
			</p>
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


<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
	let stopSpawning = false;

	const balloonColors = ["red", "green", "yellow", "orange"];

	/* document.addEventListener("DOMContentLoaded", () => {
		spawnBalloon();
		setTimeout(() => {
			stopSpawning = true;
		}, 5000);
	}); */

	function spawnBalloon() {
		if (stopSpawning) return;

		const balloon = document.createElement("div");

		const emojiOptions = ["🎈", "⭐", "🌟", "🎉", "✨", "💫", "🎊", "💥"];
		balloon.textContent = emojiOptions[Math.floor(Math.random() * emojiOptions.length)];

		// Make balloon size 2x
		balloon.style.fontSize = "12vw";

		balloon.style.position = "absolute";
		balloon.style.left = `${Math.random() * (window.innerWidth - 100)}px`;
		balloon.style.bottom = "-300px";
		balloon.style.cursor = "pointer";
		balloon.style.zIndex = "1000";

		// Add random color from list
		const color = balloonColors[Math.floor(Math.random() * balloonColors.length)];
		balloon.style.color = color;

		// Add visual mix-up effects
		balloon.style.filter = `hue-rotate(${Math.random() * 360}deg)`;
		balloon.style.opacity = (0.7 + Math.random() * 0.3).toFixed(2);
		balloon.style.transform = `rotate(${Math.random() * 30 - 15}deg)`;
		balloon.style.textShadow = `2px 2px 6px ${color}`;

		document.body.appendChild(balloon);

		let moveInterval = moveBalloon(balloon);

		balloon.addEventListener("click", () => {
			popBalloon(balloon, moveInterval);
		});
		balloon.addEventListener("touchstart", (event) => {
			event.preventDefault();
			popBalloon(balloon, moveInterval);
		});

		// Spawn next balloon
		if (!stopSpawning) {
			setTimeout(spawnBalloon, Math.random() * 800 + 800);
		}
	}


	function moveBalloon(balloon) {
		let moveInterval = setInterval(() => {
			let currentBottom = parseInt(balloon.style.bottom, 10);
			currentBottom += 5; // Slightly faster due to larger size
			balloon.style.bottom = `${currentBottom}px`;

			if (currentBottom > window.innerHeight + 100) {
				clearInterval(moveInterval);
				balloon.remove();
			}
		}, 20);
		return moveInterval;
	}
</script>