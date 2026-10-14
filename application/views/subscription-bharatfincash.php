<?php
$this->load->view('includes/header-apply.php');
?>
<!--===============PAGE CONTENT==============-->
<section class="contact-box-sections" style="background:#f0f2f5">
	<!--===============spacing==============-->
	<div class="auto-container px-0">
		<div class="align-items-center justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
				<div class="row" stylr="width: 100%;">
					<div class="red-section">
      
						<div class="top-badge">Personal Loan</div>

						<div class="contents">
							<h1>Apply for an Instant Personal Loan Up to <span>₹15 Lakh</span>, in Minutes!</h1>
						</div>

						<div class="benefits-header">
							<div class="benefits-line"></div>
							<span>Benefits and Features</span>
							<div class="benefits-line"></div>
						</div>

						<div class="features-row">
							<div class="feature-card">
							<img src="<?php echo base_url() ?>assets/images/step1.webp" alt="Instant Disbursal">
							<p>Instant Disbursal</p>
							</div>

							<div class="feature-card">
							<img src="<?php echo base_url() ?>assets/images/step2.webp" alt="No Paperwork">
							<p>No Paperwork Required</p>
							</div>

							<div class="feature-card">
							<img src="<?php echo base_url() ?>assets/images/step3.webp" alt="ROI">
							<p>ROI Starting at 10.5%</p>
							</div>
						</div>

						<div class="social-proof">
							<img src="<?php echo base_url() ?>assets/images/star.webp" alt="star">
							<span>1 Lakh+ people got a personal loan in just a few clicks</span>
							<img src="<?php echo base_url() ?>assets/images/star.webp" alt="star">
						</div>

						</div>
				</div>
				<div class="contact_form_box_all type_four mr_md_top_zero">
					<?php
					if ($processstep == 'step1') {
						?>
					<div class="title_all_box style_one  dark_color">
						<!-- <p class="">Begin Your Loan Process With Few Details</p> -->
						<h6 class="fs-5 lh-base mb-2"></h6>
						<!--===============spacing==============-->
					</div>
					<div class="contact_form_box_inner simple_form">
						<div class="contact_form_shortcode">
							<?php echo form_open('subscription/sendotpCode', array('id' => 'submitForm1', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>
							<div class="row gutter_15px">
								<div class="pd_top_10"></div>
								<div class="col-lg-12 form-group">

								<div class="range">
									<div class="range" style="display: inline-block;">
											<div class="range__value">
												<strong>Loan Amount : </strong> <span class="text-success"></span>
											</div>
									</div>
									<div class="pd_top_20"></div>
									<div class="range__slider">
										<input type="range" name="loanamount" step="10000">
									</div>
										
									
								</div>
								<div class="pd_top_10"></div>
								<div class="col-lg-12 form-group">
									<label style="display:block !important;">Phone Number</label>

									<div class="pd_top_10"></div>

									<div class="input-group">
										<!-- Country Code -->
										<div class="input-group-prepend">
											<span class="input-group-text" style="background:#f8f9fa; height:56px">
												+91
											</span>
										</div>

										<!-- Mobile Input -->
										<input type="text"
											aria-required="true"
											name="mobile"
											id="mobileno"
											class="form-control"
											placeholder="Enter Bank Registered Number"
											inputmode="numeric"
											required
											maxlength="10"
											minlength="10"
											pattern="^[6789]\d{9}$"
											oninput="this.value = this.value.replace(/[^0-9]/g, '')">
									</div>

									<div class="help-block font-small-3"></div>
								</div>
								<div class="col-lg-12 form-group">
									<button type="submit" id="form-submit1"
										class="wpcf7-form-control has-spinner wpcf7-submit custom-btn">START
										PROCESS</button>
								</div>
								<!--===============spacing==============-->
								<div class="pd_bottom_10"></div>
								<!--===============spacing==============-->

								<div class="form-group mb-0">
									<div class="custom-control custom-checkbox" style="margin-left: 10px;">
										<input type="checkbox" name="terms" id="terms" class="custom-control-input"
											value="1" style="display:inline-flex;margin-bottom: 0px !important;" checked required>
										<label class="custom-control-label" for="terms" style="display:unset;"><small>I &amp; agree with <a
													href="<?php echo site_url('terms-conditions'); ?>"
													target="_blank">Terms of Use</a> and <a
													href="<?php echo site_url('privacy-policy'); ?>"
													target="_blank">Privacy Policy</a> of Bharatfincash.</small></label>
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group mb-2">
									<div class="custom-control custom-checkbox" style="margin-left: 10px;">
										<input type="checkbox" name="promotion" id="promotion"
											class="custom-control-input" style="display:inline-flex" value="1" checked
											required>
										<label class="custom-control-label" for="promotion"
											style="display:unset;"><small>I agree to receive promotional & informational
												communications from Bharatfincash through Emails, calls or SMS, RCS
												Services.</small></label>
										<div class="help-block font-small-3"></div>
									</div>
								</div>

							</div>
							<?php echo form_close(); ?>
						</div>
					</div>
					<?php } else if ($processstep == 'step2') {
						?>
					<div class="contact_form_box_inner simple_form">
						<div class="contact_form_shortcode">
							<?php echo form_open('subscription/checkotpCode', array('id' => 'submitForm2', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>

							<label class="text-dark pd_bottom_20">Mobile No. :
								<strong><?php echo $userdetails['mobile']; ?></strong></label>
							<input type="hidden" name="loanamount" id="loanamount"
								value="<?php echo $userdetails['loanamount']; ?>">

							<input type="hidden" name="otpmobile" id="otpmobile"
								value="<?php echo $userdetails['mobile']; ?>">

							<div class="row gutter_15px">
								<div class="col-lg-12 form-group">
									<div class="text-center" style="font-size: 70px !important;">
									</div>
									<label> Please enter the OTP you get on this number:<br>
										<span class="wpcf7-form-control-wrap" data-name="tel-922">
											<input type="text" name="otpcode" id="otpcode"
												class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required optnumber"
												required inputmode="numeric" placeholder="Enter OTP Code" maxlength="4"
												data-validation-regex-regex="[0-9]+"
												oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></span>
										<div class="help-block font-small-3"></div>
										<br>
									</label>
								</div>

								<div class="col-lg-12 form-group">
									<div class="p-countdown">
										<div class="p-countdown-count" id="counttime">
											<code>New OTP code will generate in <span id="timer">15</span> Sec</code>
										</div>
										<div id="resendBtn" class="d-none">
											<code>Didn’t receive OTP? <a href="javascript:resendotp()">Resend OTP</a></code>
										</div>
										<code id="resend-message"></code>
										<div class="custom-error" id="otpcodeError"></div>
									</div>
								</div>

								<!--===============spacing==============-->
								<div class="pd_bottom_20"></div>
								<!--===============spacing==============-->

								<div class="col-lg-12">
									<button type="submit" id="form-submit2"
										class="wpcf7-form-control has-spinner wpcf7-submit custom-btn">VERIFY
										OTP</button>
								</div>
							</div>
							<?php echo form_close(); ?>
						</div>
					</div>
					<?php } else if ($processstep == 'step3') { ?>
					<div class="contact_form_box_inner simple_form">
						<div class="contact_form_shortcode">
							<?php echo form_open('subscription/registeredUser', array('id' => 'submitForm3', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>
							<div class="row gutter_15px">

								<div class="col-lg-12 form-group">
									<input type="hidden" name="loanamount" id="loanamount"
										value="<?php echo $userdetails['loanamount']; ?>">

									<div> <label class="text-dark pd_bottom_20">Mobile No. :
											<strong><?php echo $userdetails['mobile']; ?> </strong></label></div>
									<input type="hidden" name="usermobile" id="usermobile"
										value="<?php echo $userdetails['mobile']; ?>">

									<input type="hidden" name="referralcode" id="referralcode"
										value="<?php echo $userdetails['referralcode']; ?>">
									<input type="hidden" name="loantype" id="loantype" value="11">
								</div>

								<div class="col-lg-12 form-check pd_bottom_20">
									<input class="btn-check" type="radio" value="0" name="usertype" id="salaried"
										autocomplete="off" checked>
									<label class="btn btn-outline-success btn-xs mb-1" for="salaried"> Salaried
									</label>

									<input class="btn-check" type="radio" value="1" name="usertype" id="selfemployed"
										autocomplete="off">
									<label class="btn btn-outline-success btn-xs mb-1" for="selfemployed">
										Self-Employed </label>
								</div>

								<div class="col-lg-12 form-group">
									<label class="w-100"> Your Name *<br>
									<div class="pd_bottom_10"></div>
										<span class="wpcf7-form-control-wrap" data-name="your-name">
											<input type="text" aria-required="true" name="username" id="username"
												class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
												placeholder="Enter Bank Registered Name" required
												data-validation-regex-regex="^[a-zA-z]+([\s][a-zA-Z]+)*$"
												size="40"></span>
										<div class="help-block font-small-3"></div><br>
									</label>
								</div>

								<div class="col-lg-12 form-group">
									<label class="w-100">Email Id *<br>
									<div class="pd_bottom_10"></div>
										<span class="wpcf7-form-control-wrap" data-name="your-email">
											<input type="email" aria-required="true" name="useremail"
												class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
												placeholder="Email id As per your bank records" required
												size="40"></span>
										<div class="help-block font-small-3"></div><br>
									</label>
								</div>

								<div class="col-lg-12 form-group">
									<button type="submit" id="form-submit3"
										class="wpcf7-form-control has-spinner wpcf7-submit custom-btn"
										onclick="_tfa.push({notify: 'event', name: 'indc_pl_lead', id: 1719054});">SUBMIT</button>
								</div>
							</div>
							<?php echo form_close(); ?>
						</div>
					</div>
					<?php } ?>
					<div class="">
						<!--===============spacing==============-->
						<div class="pd_top_20"></div>
						
						<!--===============spacing==============-->
						<div class="loan-eligibility">
							<span class="vertical-divider-rtl"></span>
							<span> Personal Loan Eligibility</span>
							<span class="vertical-divider-ltr"></span>
							</div>
					</div>
					<div class="">
						<div class="eligibility-section">
							<div class="eligibility-list">
								<ul>
									<li>
										<img src="assets/images/tick1111.webp" alt="">
										<span class="eligibility-label">Age:</span>
										<span class="eligibility-value">19 to 60 years</span>
									</li>
									<li>
										<img src="assets/images/tick1111.webp" alt="">
										<span class="eligibility-label">Income:</span>
										<span class="eligibility-value">Min. ₹10,000/m</span>
									</li>
									<li>
										<img src="assets/images/tick1111.webp" alt="">
										<span class="eligibility-label">Residency:</span>
										<span class="eligibility-value">Resident of India</span>
									</li>
								</ul>
								</div>
								<div class="eligibility-icon">
									<img src="<?php echo base_url() ?>assets/images/image1794.webp" alt="Eligibility Checkmark">
								</div>
						</div>
					</div>
					<div class="">
						<div class="steps-section">
							<div class="inline-header-row">
								<h2>Only <span style="color:#f06d24">3 steps </span>, and you get the money!</h2>
							</div>
							<div class="steps-grid">
							<div class="step-item">
								<img src="<?php echo base_url() ?>assets/images/image1793.webp" alt="Provide Basic Details">
								<span>Provide Basic Details</span>
							</div>
							<div class="step-item">
								<img src="<?php echo base_url() ?>assets/images/image1793copy.webp" alt="Choose &amp; Apply Loan Offers">
								<span>Choose &amp; Apply Loan Offers</span>
							</div>
							<div class="step-item">
								<img src="<?php echo base_url() ?>assets/images/image1793copy2.webp" alt="Get Instant Cash">
								<span>Get Instant Cash in Bank</span>
							</div>
							</div>
						</div>
					</div>
					<div class="">
						<div class="loan-eligibility">
							<span class="vertical-divider-rtl"></span>
							<span>Rates and Charges</span>
							<span class="vertical-divider-ltr"></span>
						</div>
					</div>
					<div class="">
						<div class="rates-section">
							<div class="rates-list">
								<div class="rate-item">
									<img src="<?php echo base_url() ?>assets/images/tick11.webp" alt="Loan Amount">
									<div class="rate-info">
									<strong>Loan Amount</strong>
									<p class="rate-details">
										Min. <span class="val">₹5,000</span> and Max. <span class="val">15 Lakhs</span>
									</p>
									</div>
								</div>

								<div class="rate-item">
									<img src="<?php echo base_url() ?>assets/images/tick11copy.webp" alt="Repayment Tenure">
									<div class="rate-info">
									<strong>Repayment Tenure</strong>
									<p class="rate-details">
										<span class="val">6</span> to <span class="val">60</span> months
									</p>
									</div>
								</div>

								<div class="rate-item">
									<img src="<?php echo base_url() ?>assets/images/tick11copy2.webp" alt="Rate of Interest">
									<div class="rate-info">
									<strong>Rate of Interest</strong>
									<p class="rate-details">
										<span class="val">10.99%</span> to <span class="val">36%</span> per annum
									</p>
									</div>
								</div>

								<div class="rate-item">
									<img src="<?php echo base_url() ?>assets/images/tick11copy3.webp" alt="Processing Fees">
									<div class="rate-info">
									<strong>Processing Fees</strong>
									<p class="rate-details">
										<span class="val">1.18%</span> - <span class="val"> 8%</span> of Loan amount incl. GST.
									</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="">
						<!--===============spacing==============-->
						<div class="pd_top_50"></div>
						
						<!--===============spacing==============-->
						<div class="patners-text">
							
							<span class="tralingImage"> <img src="<?php echo base_url() ?>assets/images/lending_patners_tick_image.webp" alt="Tick Image"></span>
							<span>Our Trusted Lending Partners</span>
							<span class="tralingImage"> <img src="<?php echo base_url() ?>assets/images/lending_patners_tick_image.webp" alt="Tick Image"></span>
							
						</div>
						<div class="pd_bottom_10"></div>
						<div class="client_logo_carousel type_one">
							<div class="swiper-container" data-swiper='{
										"autoplay": {
										"delay": 6000
										},
										"freeMode": true,
										"loop": true,
										"speed": 1000,
										"centeredSlides": false,
										"slidesPerView": 5,
										"spaceBetween": 10,
										"pagination": {
										"el": ".swiper-pagination",
										"clickable": true
										},
										"navigation": {
										"nextEl": ".swiper-button-next",
										"prevEl": ".swiper-button-prev"
										},
										"breakpoints": {
											"1200": {
												"slidesPerView": 6 
											},
											"1024": {
												"slidesPerView": 6 
											},
											"768": {
												"slidesPerView": 3 
											},
											"576": {
												"slidesPerView": 3 
											},
											"0": {
												"slidesPerView": 3 
											}
										}
									}'>
								<div class="swiper-wrapper">
									<?php
										foreach ($banklist as $row) { ?>
									<div class="swiper-slide">
										<div class="image p-0">
											<img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>"
												alt="<?php echo $row->bank_name; ?>">
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="">
						<!--===============spacing==============-->
						<div class="pd_bottom_50"></div>
						<!--===============spacing==============-->
						<div class="accordion" id="accordionExample">
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingOne">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<strong>Disclaimer:</strong>
								</button>
								</h2>
								<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<p class="small">Loan Tenure ranges from minimum 6 months to maximum of 60 months, with annual interest rates starting at 11% and going up to 34%. A processing fee up to 2% may be applicable. Representative Example: If a personal loan of ₹1,00,000 is availed at an interest rate of 12.5% per annum for a tenure of 12 months, and a processing fee of 2% is applied: Interest Payable: ₹6,720 approx. Processing Fee: ₹2,000. Total Loan Cost (including interest + fee): ₹1,08,720. APR (Annual Percentage Rate): 14.27% approx. *T&C Apply. All figures are indicative and may vary based on customer profile and final approval by NBFCs or financial partners. Growquik Services Private Limited is a financial consultancy and does not provide loans directly. Company Address: <?php echo COMPANY_ADDRESS ?> | CIN : U67100GJ2022PTC134395 | Time : 10AM to 5PM (Monday to Saturday)</p>
									</div>
								</div>
							</div>
							</div>
						</div>

					</div>
				
			</div>

		</div>
	</div>
	
</section>


</div>


</div>
<!--===============PAGE CONTENT==============-->
<?php
$this->load->view('includes/footer-apply.php');

?>
<script src="<?php echo base_url('assets/js/loanscript.js'); ?>" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script type="text/javascript">
	function resendotp() {
		fullname = document.getElementById('usernm').value;
		mobile = document.getElementById('otpmobile').value;

		$.ajax({
			url: '<?php echo base_url("subscription/resendotpCode"); ?>',
			type: "POST",
			data: 'mobile=' + mobile + '&fullname=' + fullname,
			dataType: "JSON",
			cache: false,
			processData: false,
			success: function (response) {
				if (response['success'] == true) {
					$('#resend-message').html(response['message']);
					$.notify({
						message: response['message']
					}, {
						type: 'success'
					});
				} else {
					$.notify({
						message: response['message']
					}, {
						type: 'danger'
					});
				}
			},
			error: function (jXHR, textStatus, errorThrown) {
				$.notify({
					message: errorThrown
				}, {
					type: 'danger'
				});
			}
		});
	}

	$(function () {
		$('#submitForm1').on('submit', function (e) {
			e.preventDefault();

			$.ajax({
				url: $(this).attr('action') || window.location.pathname,
				type: "POST",
				data: $(this).serialize(),
				dataType: "JSON",
				cache: false,
				processData: false,
				beforeSend: function () {
					$('#form-submit1').html(
						'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> APPLYING...'
					);
					$('#form-submit1').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						if (response['redirect_url'] != "") {
							window.location.href = response['redirect_url'];
						} else {
							window.location = "./bharatfincash/s2/" + response['mobile'];
						}
					} else {
						$('#mobilenoError').html(response['message']);
						$.notify({
							message: response['message']
						}, {
							type: 'danger'
						});
					}

					$('#form-submit1').html('APPLY NOW');
					$('#form-submit1').attr('disabled', false);
				},
				error: function (jXHR, textStatus, errorThrown) {
					$('#form-submit1').html('APPLY NOW');
					$('#form-submit1').attr('disabled', false);
					$.notify({
						message: errorThrown
					}, {
						type: 'danger'
					});
				}
			});
		});

		$('#submitForm2').on('submit', function (e) {
			e.preventDefault();
			$('#resend-message').html('');
			$('#otpcodeError').html('');

			$.ajax({
				url: $(this).attr('action') || window.location.pathname,
				type: "POST",
				data: $(this).serialize(),
				dataType: "JSON",
				cache: false,
				processData: false,
				beforeSend: function () {
					$('#form-submit2').html(
						'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> VERIFYING...'
					);
					$('#form-submit2').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						window.location = "../../bharatfincash/s3/" + response['mobile'];
					} else {
						$('#otpcodeError').html(response['message']);
						$.notify({
							message: response['message']
						}, {
							type: 'danger'
						});
					}

					$('#form-submit2').html('VERIFY');
					$('#form-submit2').attr('disabled', false);
				},
				error: function (jXHR, textStatus, errorThrown) {
					$('#form-submit2').html('VERIFY');
					$('#form-submit2').attr('disabled', false);
					$.notify({
						message: errorThrown
					}, {
						type: 'danger'
					});
				}
			});
		});


		$('#submitForm3').on('submit', function (e) {
			e.preventDefault();
			$('#resend-message').html('');
			$('#otpcodeError').html('');

			$.ajax({
				url: $(this).attr('action') || window.location.pathname,
				type: "POST",
				data: $(this).serialize(),
				dataType: "JSON",
				cache: false,
				processData: false,
				beforeSend: function () {
					$('#form-submit3').html(
						'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESSING...'
					);
					$('#form-submit3').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						window.location.href = response['redirect_url'];
					} else {
						$('#otpcodeError').html(response['message']);
						$.notify({
							message: response['message']
						}, {
							type: 'danger'
						});
					}

					$('#form-submit3').html('PROCESS');
					$('#form-submit3').attr('disabled', false);
				},
				error: function (jXHR, textStatus, errorThrown) {
					$('#form-submit3').html('PROCESS');
					$('#form-submit3').attr('disabled', false);
					$.notify({
						message: errorThrown
					}, {
						type: 'danger'
					});
				}
			});
		});
	});
</script>

<script>
	let resendBtn = document.getElementById('resendBtn');
	let counttime = document.getElementById('counttime');
	let timerDisplay = document.getElementById('timer');
	let countdown = 15;

	let interval = setInterval(() => {
		countdown--;
		timerDisplay.textContent = countdown;

		if (countdown <= 0) {
			clearInterval(interval);
			resendBtn.classList.remove('d-none');
			counttime.classList.add('d-none');
			timerDisplay.textContent = '';
		}
	}, 1000);

	resendBtn.addEventListener('click', function () {
		resendBtn.classList.add('d-none');
		counttime.classList.remove('d-none');
		countdown = 15;
		timerDisplay.textContent = countdown;

		interval = setInterval(() => {
			countdown--;
			timerDisplay.textContent = countdown;

			if (countdown <= 0) {
				clearInterval(interval);
				resendBtn.classList.remove('d-none');
				counttime.classList.add('d-none');
				timerDisplay.textContent = '';
			}
		}, 1000);


	});
</script>