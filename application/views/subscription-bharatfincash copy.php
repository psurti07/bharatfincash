<?php
$this->load->view('includes/header-subscription.php');
?>
<!--===============PAGE CONTENT==============-->
<section class="contact-box-sections bg_light_1">
	<div class="pd_top_50"></div>
	<div class="auto-container px-2">
		<div class="row align-items-center justify-content-center">
			<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12 d-none d-md-block">
				<img src="https://www.quid.money/assets_new/images/loan-journey/personalLoan-hero2x.png" alt="customer"
					class="img-fluid ">
			</div>
			<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h6 class="form-header text-center bg-dark-blue mb-0 d-lg-none p-3">
					Apply for a Loan in a Minute!
				</h6>
				<div
					class="contact_form_box_all type_four mr_md_top_zero responsive-border p-4 border border-success rounded-4">
					<?php
					if ($processstep == 'step1') {
					?>
					<div class="title_all_box style_one  dark_color">
						<!-- <p class="">Begin Your Loan Process With Few Details</p> -->
						<h6 class="fs-5 lh-base mb-3 text-center">Get <div class="range" style="display: inline-block;">
								<div class="range__value">
									<span class="text-success"></span>
								</div>
							</div> Personal Loan in Minutes!</h6>
						<!--===============spacing==============-->
					</div>
					<div class="contact_form_box_inner simple_form">
						<div class="contact_form_shortcode">
							<?php echo form_open('subscription/sendotpCode', array('id' => 'submitForm1', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>
							<div class="row gutter_15px">
								<div class="col-lg-12 form-group mb-2">
									<div class="range mt-5">
										<div class="range__slider digi_range__slider">
											<input type="range" name="loanamount" step="10000" id="loanSlider">
											<div class="range__tooltip" id="rangeTooltip">₹0</div>
										</div>
										<!-- <div class="range__value mt-2">
											<label>Loan Amount : </label>
											<span></span>
										</div> -->
										<!-- <div class="range__slider">
											<input type="range" name="loanamount" step="10000">
										</div> -->
										<div class="range__emi mb-2 text-start">
											<label>EMI Amount : </label>
											<span class="fs-5"></span>
										</div>
									</div>
								</div>

								<div class="col-lg-12  form-group">
									<label class="text-dark mb-2"> Phone Number</label>
									<div class="input-group">

										<span class="input-group-text" id="inputGroupPrepend2"><img
												src="<?php echo base_url('assets/images/slider/flag.svg'); ?>"
												class="flag me-2">+91</span>
										<input type="text" class="form-control" name="mobile" id="mobileno"
											placeholder="Enter Bank Registered Number" inputmode="numeric" required
											size="40" maxlength="10" minlength="10"
											data-validation-regex-regex="^[6789]\d{9}$"
											oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
											<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<!-- <button type="submit" id="form-submit1"
										class="wpcf7-form-control has-spinner wpcf7-submit custom-btn">START
										PROCESS</button> -->
										<button type="submit" id="form-submit1" class="wpcf7-form-control has-spinner wpcf7-submit custom-btn">START
                                                        PROCESS</button>
								</div>


								<div class="form-group mb-0">
									<div class="custom-control custom-checkbox d-flex align-items-center"
										style="margin-left: 10px;">
										<input type="checkbox" name="terms" id="terms" class="custom-control-input"
											value="1" style="display:inline-flex" checked required>
										<label class="custom-control-label ms-2 text-start" for="terms"
											style="display:unset;"><small>By
												submitting the form &amp; proceeding, you agree to the <a
													href="<?php echo site_url('terms-conditions'); ?>"
													target="_blank">Terms of Use</a> and <a
													href="<?php echo site_url('privacy-policy'); ?>"
													target="_blank">Privacy Policy</a> of Indcapital.</small></label>
										<div class="help-block font-small-3"></div>
									</div>
								</div>

								<div class="form-group mb-2">
									<div class="custom-control custom-checkbox d-flex align-items-center"
										style="margin-left: 10px;">
										<input type="checkbox" name="promotion" id="promotion"
											class="custom-control-input" style="display:inline-flex" value="1" checked
											required>
										<label class="custom-control-label ms-2 text-start" for="promotion"
											style="display:unset;"><small>I agree to receive promotional & informational
												communications from Indcapital through Emails, calls or SMS
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

							<label class="text-dark">Mobile No. :
								<strong><?php echo $userdetails['mobile']; ?></strong></label>
							<input type="hidden" name="loanamount" id="loanamount"
								value="<?php echo $userdetails['loanamount']; ?>">

							<input type="hidden" name="otpmobile" id="otpmobile"
								value="<?php echo $userdetails['mobile']; ?>">

							<div class="row gutter_15px">
								<div class="col-lg-12 form-group">
									<div class="text-center" style="font-size: 70px !important;">
										<img src="<?php echo base_url('assets/images/phone.png'); ?>" alt="">
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
									<small>Didn't get OTP? <a href="javascript:resendotp()">Resend OTP</a>
										<code id="resend-message"></code></small>

									<div class="custom-error" id="otpcodeError"></div>
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
							<div class="row gutter_15px text-start">

								<div class="col-lg-12 form-group">
									<input type="hidden" name="loanamount" id="loanamount"
										value="<?php echo $userdetails['loanamount']; ?>">

									<div> <label class="text-dark pd_bottom_20">Mobile No. :
											<strong><?php echo $userdetails['mobile']; ?> </strong></label></div>
									<input type="hidden" name="usermobile" id="usermobile"
										value="<?php echo $userdetails['mobile']; ?>">

									<input type="hidden" name="referralcode" id="referralcode"
										value="<?php echo $userdetails['referralcode']; ?>">
									<input type="hidden" name="loantype" id="loantype" value="21">
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
				</div>
			</div>

		</div>
	</div>
	<div class="pd_bottom_60"></div>

</section>

<section class="contact-box-sections">
	<div class="pd_top_60"></div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!--===============spacing==============-->
				<div class="pd_bottom_50"></div>
				<!--===============spacing==============-->
				<p class="small text-center"><strong>Get Your Personal Loan in just 3 Steps from Our NBFC/Lending
						Partners:</strong></p>
				<div
					class="client_logo_carousel contact_form_box_all type_four type_one responsive-border p-4 border border-success rounded-4 bg-white ">
					<div class="swiper-container swiper-initialized swiper-horizontal swiper-free-mode swiper-backface-hidden"
						data-swiper='{
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
										"slidesPerView": 2 
									},
									"0": {
										"slidesPerView": 2 
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
		</div>

	</div>
	<div class="pd_bottom_60"></div>

</section>
<!----contact end---->

<section class="service-section-one bg_light_1">
	<div class="pd_top_60"></div>
	<div class="default-container">
		<div class="row ">
			<div class="col-lg-12">
				<div class="title_all_box style_one  text-center dark_color">
					<div class="title_sections left">
						<div class="title"> <span class="text-success">Best Personal Loan Offers </span>
							from Top Banks</div>
						<p> Find more details on the personal offers from
							leading banks.</p>
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
							<img src="https://www.quid.money/assets_new/images/top-banks/hdfc.png">
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
								Rs. 40L
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
								Int. Rate*
							</p>
							<h6 class="mb-0">10.50 onwards
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
							<h6 class="mb-0"> 12 - 60 months
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
							<img src="https://www.quid.money/assets_new/images/top-banks/ICICI.png">
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
								Int. Rate*
							</p>
							<h6 class="mb-0">10.55% onwards</h6>
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
							<h6 class="mb-0">6 - 72 months</h6>
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
							<img src="https://www.quid.money/assets_new/images/top-banks/Axis.png">
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
								Int. Rate*
							</p>
							<h6 class="mb-0">10.55% onwards</h6>
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
							<h6 class="mb-0">6 - 72 months</h6>
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
							<img src="   https://www.quid.money/assets_new/images/top-banks/hdfc.png">
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
								Rs. 40L
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
								Int. Rate*
							</p>
							<h6 class="mb-0">10.50 onwards
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
							<h6 class="mb-0"> 12 - 60 months
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
							<img src="https://www.quid.money/assets_new/images/top-banks/Kotak.png">
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
								Rs. 40L
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
								Int. Rate*
							</p>
							<h6 class="mb-0">10.50 onwards
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
							<h6 class="mb-0"> 12 - 60 months
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
<section class="service-section">
	<div class="pd_top_60"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title_all_box style_two text-center dark_color">
					<div class="title_sections two">
						<h2>Get a Personal Loan with <span class="text-success">Multitude of Benefits</span>
						</h2>
						<p class="">Quid makes applying for a personal loan easier than ever,
							with a range of benefits on your side.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row  align-items-center">
			<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12  d-md-block  mb-5">
				<img src="https://www.quid.money/assets_new/images/personal-loan/features-hero-2x.png" alt="customer"
					class="img-fluid ">
			</div>
			<div class="col-xl-6 col-lg-6 mb-5 mb-lg-0 mb-xl-0">
				<div class="icon_box_all style_one    border border-success rounded-4">
					<div class="icon_content icon_centers">
						<div class="icon">
							<span class=" icon-line-chart"></span>
						</div>
						<div class="txt_content">
							<h5>
								High Loan Amount
							</h5>
							<p>Fuel your bigger aspirations
							</p>
						</div>
					</div>
				</div>
				<div class="mr_bottom_20"></div>
				<div class="icon_box_all style_one   border border-success rounded-4">
					<div class="icon_content icon_centers ">
						<div class="icon">
							<span class="icon-bow-and-arrow"></span>
						</div>
						<div class="txt_content">
							<h5> Quick Disbursals
							</h5>
							<p>Get your loan amount quickly in your account
							</p>
						</div>
					</div>
				</div>
				<div class="mr_bottom_20"></div>
				<div class="icon_box_all style_one   border border-success rounded-4">
					<div class="icon_content icon_centers">
						<div class="icon">
							<span class=" icon-line-chart"></span>
						</div>
						<div class="txt_content">
							<h5>
								Collateral Free Loan
							</h5>
							<p>Eliminate risk with an unsecured credit facility
							</p>
						</div>
					</div>
				</div>
				<div class="mr_bottom_20"></div>
				<div class="icon_box_all style_one   border border-success rounded-4">
					<div class="icon_content icon_centers ">
						<div class="icon">
							<span class="icon-bow-and-arrow"></span>
						</div>
						<div class="txt_content">
							<h5>Flexible Repayment
							</h5>
							<p>Choose to repay in your capacity with a long-tenure
							</p>
						</div>
					</div>
				</div>
				<div class="mr_bottom_20"></div>
				<div class="icon_box_all style_one   border border-success rounded-4">
					<div class="icon_content icon_centers">
						<div class="icon">
							<span class=" icon-line-chart"></span>
						</div>
						<div class="txt_content">
							<h5>
								100% Paperless
							</h5>
							<p>Enjoy a paperless digital process from start to finish
							</p>
						</div>
					</div>
				</div>
				<div class="mr_bottom_20"></div>
			</div>
		</div>
	</div>
</section>

<section class="service-section-two pd_left_100 pd_right_100 md_pd_left_15 md_pd_right_15">
	<div class="inner_section">
		<div class="default-container">
			<div class="row">
				<div class="col-lg-6 m-auto">
					<div class="title_all_box style_one text-center">
						<div class="title_sections">
							<h2>Personal <span class="text-success">Loan Details</span>
								<p>
									Find the required details you need to know before applying
									for a personal loan.
								</p>
						</div>
						<div class="pd_bottom_20"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
						<table class="table table-striped">
							<tbody>
								<tr class="bg_light_1">
									<th>Interest Rate:</th>
									<td>10.50% p.a. onwards</td>
								</tr>
								<tr>
									<th>Loan Amount:</th>
									<td>Up to Rs 7 lakh</td>
								</tr>
								<tr class="bg_light_1">
									<th>Tenure:</th>
									<td>Up to 60 months</td>
								</tr>
								<tr>
									<th>Minimum Salary:</th>
									<td>Rs 20,000 per month</td>
								</tr>
								<tr class="bg_light_1">
									<th>Age:</th>
									<td>18-55 years</td>
								</tr>
								<tr>
									<th>Processing Fee:</th>
									<td>As applicable by Partner</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="pd_bottom_60"></div>
	</div>
</section>
<section class="process-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title_all_box style_two text-center dark_color">
					<div class="title_sections two">
						<h2>Eligibility Criteria <span class="text-success">for Personal Loan</span>
						</h2>
						<p>We aim to make credit accessible for all. Our basic eligibility criteria allow
							you to obtain
							a personal loan hassle-free. Refer to the criteria below before proceeding.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row align-items-center justify-content-center">
			<div class="col-xl-4 col-lg-6 col-md-6 col-12">
				<div class="process_box style_three dark_color project_post style_one mr_top_20  ">
					<div class="process_box_outer_three left text-center d-md-block d-flex">
						<div class="icon">
							<span class="icon-photo"></span>
						</div>
						<div class="content_box text-md-center text-start ms-md-block ms-4 ms-lg-0">
							<h5>Age </h5>
							<p>18 - 55 years
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-6 col-12">
				<div class="process_box style_three dark_color project_post style_one mr_top_20 mb-0 mt-0">
					<div class="process_box_outer_three left text-center d-md-block d-flex">
						<div class="icon">
							<span class="icon-folder"></span>
						</div>
						<div class="content_box text-md-center text-start ms-md-block ms-4 ms-lg-0">
							<h5>Nationality
								<p>Indian</p>
							</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-6 col-12">
				<div class="process_box style_three dark_color project_post style_one mr_top_20">
					<div class="process_box_outer_three left text-center d-md-block d-flex">
						<div class="icon">
							<span class="icon-music1"></span>
						</div>
						<div class="content_box text-md-center text-start ms-md-block ms-4 ms-lg-0">
							<h5>Bank Account
							</h5>
							<p class="mb-0">You must receive an income in your bank account
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="pd_bottom_60"></div>
</section>
<section class="about-section">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-12 order-2 order-lg-1">
				<div class="about_content position-relative z_99">
					<div class="title_all_box style_one text-left  dark_color">
						<div class="title_sections">
							<h2> <span class="text-success">Get Your </span>
								Personal Loan in a
								Few Steps
							</h2>
							<p>Applying for a personal loan couldn’t be simpler! Follow these easy steps to
								get closer to your personal loan.
							</p>
						</div>
					</div>
					<div class="pd_bottom_15"></div>
					<div class="row justify-content-center justify-content-lg-start flex-wrap">
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-6 mb-4 mb-lg-4 mb-xl-0">
							<div class="icon_box_all style_four icon_box_all style_three">
								<div class="icon_content icon_imgs">
									<div class="icon">
										<img src="assets/images/icon-img-n-3.png" class="img-fluid svg_image"
											alt="icon png">
									</div>
									<div class="txt_content">
										<h6>
											Verify your identity
										</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-6 mb-4 mb-lg-4 mb-xl-0">
							<div class="icon_box_all style_four icon_box_all style_three">
								<div class="icon_content icon_imgs ">
									<div class="icon">
										<img src="assets/images/icon-img-n-4.png" class="img-fluid svg_image"
											alt="icon png">
									</div>
									<div class="txt_content">
										<h6>Declare your information
										</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-6 mb-4 mb-lg-4 mb-xl-0">
							<div class="icon_box_all style_four icon_box_all style_three">
								<div class="icon_content icon_imgs ">
									<div class="icon">
										<img src="assets/images/icon-img-n-5.png" class="img-fluid svg_image"
											alt="icon png">
									</div>
									<div class="txt_content">
										<h6>
											Submit your application
										</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-6">
							<div class="icon_box_all style_four icon_box_all style_three mt-3">
								<div class="icon_content icon_imgs">
									<div class="icon">
										<img src="assets/images/fun-2.png" class="img-fluid svg_image" alt="icon png">
										<img src="assets/images/shape-1-small.png" class="shape" alt="img">
									</div>
									<div class="txt_content">
										<h6>
											Match and apply
										</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-6">
							<div class="icon_box_all style_four icon_box_all style_three mt-3">
								<div class="icon_content icon_imgs">
									<div class="icon">
										<img src="assets/images/fun-2.png" class="img-fluid svg_image" alt="icon png">
										<img src="assets/images/shape-1-small.png" class="shape" alt="img">
									</div>
									<div class="txt_content">
										<h6>
											Get instant approval
										</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-5 col-lg-12 order-lg-2 order-1 mb-5">
				<img src="https://www.quid.money/assets_new/images/personal-loan/easy-steps-2x.png" alt="customer"
					class="img-fluid ">
			</div>
		</div>
	</div>
	<div class="pd_bottom_60"></div>
</section>

<section class="contact-box-sections bg_light_1">
	<div class="pd_top_50"></div>
	<div class="container">
		<div class="row">
			<div class="text-left">

				<p class="small">Loan Tenure ranges from minimum 6 months to maximum of 72 months with Annual Interest
					Rates ranging between
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
	<div class="pd_top_50"></div>
</section>


</div>
<!--===============PAGE CONTENT==============-->
<?php
$this->load->view('includes/footer-apply.php');

?>
<script src="<?php echo base_url('assets/js/loanscript_tooltip.js'); ?>" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script type="text/javascript">
	function resendotp() {
		loanamount = document.getElementById('loanamount').value;
		mobile = document.getElementById('otpmobile').value;

		$.ajax({
			url: '<?php echo base_url("subscription/resendotpCode"); ?>',
			type: "POST",
			data: 'mobile=' + mobile + '&loanamount=' + loanamount,
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