<?php
$this->load->view('includes/header-apply.php');
?>
<!--===============PAGE CONTENT==============-->
<section class="contact-box-sections custom-background-image">
	<!--===============spacing==============-->
	<div class="pd_top_50"></div>
	<!--===============spacing==============-->
	<div class="auto-container">
		<div class="container py-md-5 d-block d-md-none">
			<!-- /.row -->
			<div class="row gx-0 gx-md-8 gx-xl-12 gy-8 align-items-center">
				<div class="col-12 col-md-12">
					<div class="swiper-container mb-3" data-swiper='{
						"autoplay": {
						"delay": 2000
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
								"slidesPerView": 1 
							},
							"1024": {
								"slidesPerView": 1 
							},
							"768": {
								"slidesPerView": 1 
							},
							"576": {
								"slidesPerView": 1 
							},
							"0": {
								"slidesPerView": 1 
							}
						}
					}'>
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<img src="<?php echo base_url('assets/images/Onecash-icon-1.png'); ?>" alt="customer" />
							</div>
							<div class="swiper-slide">
								<img src="<?php echo base_url('assets/images/Onecash-icon-2.png'); ?>" alt="customer" />
							</div>
							<div class="swiper-slide">
								<img src="<?php echo base_url('assets/images/Onecash-icon-3.png'); ?>" alt="customer" />
							</div>
							<div class="swiper-slide">
								<img src="<?php echo base_url('assets/images/Onecash-icon-4.png'); ?>" alt="customer" />
							</div>
						</div>
					</div>
				</div>
				<!--/column -->
			</div>
			<!--/.row -->
		</div>
		<div class="row align-items-center justify-content-center">
			<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="contact_form_box_all type_four mr_md_top_zero">
					<?php
					if ($processstep == 'step1') {
						?>
						<div class="title_all_box style_one  dark_color">
							<!-- <p class="">Begin Your Loan Process With Few Details</p> -->
							<h6 class="fs-5 lh-base mb-4">Get <div class="range" style="display: inline-block;">
									<div class="range__value">
										<span class="text-success"></span>
									</div>
								</div> Personal Loan in Minutes!</h6>
							<!--===============spacing==============-->
						</div>
						<div class="contact_form_box_inner simple_form">
							<div class="contact_form_shortcode">
								<?php echo form_open('digital/sendotpCode', array('id' => 'submitForm1', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>
								<div class="row gutter_15px">
									<div class="col-lg-12 form-group mb-3">
										<label>Loan Amount</label>
										<div class="range">
											<div class="range__slider">
												<input type="range" name="loanamount" step="10000">
											</div>
											<p class="mb-0"><small>Estimated EMI based on interest rate of 11.5% and tenure of 72 months.</small></p>
											<div class="range__emi">
												<label>EMI Amount : </label>
												<span class="fs-5"></span>
											</div>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label style="display: block !important;"> Phone Number<br>
											<span class="wpcf7-form-control-wrap" data-name="tel-922">
												<input type="text" aria-required="true" name="mobile" id="mobileno"
													class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
													placeholder="Enter Bank Registered Number" inputmode="numeric" required size="40" maxlength="10" minlength="10"
													data-validation-regex-regex="^[6789]\d{9}$"
													oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></span>
											<div class="help-block font-small-3"></div>
											<br>
										</label>
									</div>

									<!--===============spacing==============-->
									<div class="pd_bottom_10"></div>
									<!--===============spacing==============-->

									<div class="form-group mb-0">
										<div class="custom-control custom-checkbox" style="margin-left: 10px;">
											<input type="checkbox" name="terms" id="terms" class="custom-control-input"
												value="1" style="display:inline-flex" checked required>
											<label class="custom-control-label" for="terms" style="display:unset;"><small>By
													submitting the form &amp; proceeding, you agree to the <a
														href="<?php echo site_url('terms-conditions'); ?>"
														target="_blank">Terms of Use</a> and <a
														href="<?php echo site_url('privacy-policy'); ?>"
														target="_blank">Privacy Policy</a> of Indcapital.</small></label>
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
													communications from Indcapital through Emails, calls or SMS
													Services.</small></label>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<button type="submit" id="form-submit1"
											class="wpcf7-form-control has-spinner wpcf7-submit custom-btn">START PROCESS</button>
									</div>
								</div>
								<?php echo form_close(); ?>
							</div>
							<p class="small">Get Your Personal Loan in just 3 Steps from Our NBFC/Lending Partners:</p>
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
												"slidesPerView": 4 
											},
											"1024": {
												"slidesPerView": 4 
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
					<?php } else if ($processstep == 'step2') {
						?>
							<div class="contact_form_box_inner simple_form">
								<div class="contact_form_shortcode">
								<?php echo form_open('digital/checkotpCode', array('id' => 'submitForm2', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>

									<label class="text-dark pd_bottom_20">Mobile No. :
										<strong><?php echo $userdetails['mobile']; ?></strong></label>
										<input type="hidden" name="loanamount" id="loanamount" value="<?php echo $userdetails['loanamount']; ?>">
										
										<input type="hidden" name="otpmobile" id="otpmobile"
										value="<?php echo $userdetails['mobile']; ?>">

									<div class="row gutter_15px">
										<div class="col-lg-12 form-group">
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
											<small>Didn't get OTP? <a href="javascript:resendotp()">Resend OTP</a>
												<code id="resend-message"></code></small>

											<div class="custom-error" id="otpcodeError"></div>
										</div>

										<!--===============spacing==============-->
										<div class="pd_bottom_20"></div>
										<!--===============spacing==============-->

										<div class="col-lg-12">
											<button type="submit" id="form-submit2"
												class="wpcf7-form-control has-spinner wpcf7-submit">VERIFY OTP</button>
										</div>
									</div>
								<?php echo form_close(); ?>
								</div>
							</div>
					<?php } else if ($processstep == 'step3') { ?>
								<div class="contact_form_box_inner simple_form">
									<div class="contact_form_shortcode">
								<?php echo form_open('digital/registeredUser', array('id' => 'submitForm3', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>
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
												<label> Your Name *<br>
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
												<label for="useremail">Email Id *<br>
												<span class="wpcf7-form-control-wrap" data-name="your-email">
													<input type="email" aria-required="true" name="useremail"
														class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
														placeholder="Email id As per your bank records" required size="40"></span>
												<div class="help-block font-small-3"></div><br>
												</label>
											</div>

											<div class="col-lg-12 form-group">
												<button type="submit" id="form-submit3"
													class="wpcf7-form-control has-spinner wpcf7-submit"
													onclick="_tfa.push({notify: 'event', name: 'indc_pl_lead', id: 1719054});">SUBMIT</button>
											</div>
										</div>
								<?php echo form_close(); ?>
									</div>
								</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<!--===============spacing==============-->
	<div class="pd_bottom_150"></div>
	<!--===============spacing==============-->
</section>

<section class="contact-box-sections">
	<div class="pd_top_20"></div>
	<div class="container">
		<div class="row">
			<div class="text-left">
				<!--===============spacing==============-->
				<!--===============spacing==============-->
				<p class="small">Loan tenure ranging up to 72 months with Annual Interest Rates ranging between
					12.5% -
					35%. Processing fee up to 2%. For Example: Considering a personal loan of Rs.1,00,000
					availed at 12.5%* interest rate for a tenure of 6* years with 2%* processing fee, the APR
					will be 13.27%*. *T&C Apply. All these numbers are tentative/indicative, the final loan
					specifics may vary depending upon the customer profile and NBFCs’ criteria, rules &
					regulations, and terms & conditions.Company Address: <?php echo COMPANY_ADDRESS ?> | CIN :
					U67100GJ2022PTC134395 | Time
					: 10AM to 5PM (Monday to Saturday)</p>

			</div>
		</div>
	</div>
</section>
<!----contact end---->

</div>
<!--===============PAGE CONTENT==============-->
<?php
$this->load->view('includes/footer-apply.php');

?>
<script src="<?php echo base_url('assets/js/loanscript.js'); ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script type="text/javascript">
	function resendotp() {
		loanamount = document.getElementById('loanamount').value;
		mobile = document.getElementById('otpmobile').value;

		$.ajax({
			url: '<?php echo base_url("digital/resendotpCode"); ?>',
			type: "POST",
			data: 'mobile=' + mobile + '&fullname=' + loanamount,
			dataType: "JSON",
			cache: false,
			processData: false,
			success: function (response) {
				if (response['success'] == true) {
					$('#resend-message').html(response['message']);
					$.notify({ message: response['message'] }, { type: 'success' });
				}
				else {
					$.notify({ message: response['message'] }, { type: 'danger' });
				}
			},
			error: function (jXHR, textStatus, errorThrown) {
				$.notify({ message: errorThrown }, { type: 'danger' });
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
					$('#form-submit1').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> APPLYING...');
					$('#form-submit1').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						if (response['redirect_url'] != "") {
							window.location.href = response['redirect_url'];
						}
						else {
							window.location = "./personalLoan/s2/" + response['mobile'];
						}
					}
					else {
						$('#mobilenoError').html(response['message']);
						$.notify({ message: response['message'] }, { type: 'danger' });
					}

					$('#form-submit1').html('APPLY NOW');
					$('#form-submit1').attr('disabled', false);
				},
				error: function (jXHR, textStatus, errorThrown) {
					$('#form-submit1').html('APPLY NOW');
					$('#form-submit1').attr('disabled', false);
					$.notify({ message: errorThrown }, { type: 'danger' });
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
					$('#form-submit2').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> VERIFYING...');
					$('#form-submit2').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						window.location = "../../personalLoan/s3/" + response['mobile'];
					}
					else {
						$('#otpcodeError').html(response['message']);
						$.notify({ message: response['message'] }, { type: 'danger' });
					}

					$('#form-submit2').html('VERIFY');
					$('#form-submit2').attr('disabled', false);
				},
				error: function (jXHR, textStatus, errorThrown) {
					$('#form-submit2').html('VERIFY');
					$('#form-submit2').attr('disabled', false);
					$.notify({ message: errorThrown }, { type: 'danger' });
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
					$('#form-submit3').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESSING...');
					$('#form-submit3').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						window.location.href = response['redirect_url'];
					}
					else {
						$('#otpcodeError').html(response['message']);
						$.notify({ message: response['message'] }, { type: 'danger' });
					}

					$('#form-submit3').html('PROCESS');
					$('#form-submit3').attr('disabled', false);
				},
				error: function (jXHR, textStatus, errorThrown) {
					$('#form-submit3').html('PROCESS');
					$('#form-submit3').attr('disabled', false);
					$.notify({ message: errorThrown }, { type: 'danger' });
				}
			});
		});
	});
</script>