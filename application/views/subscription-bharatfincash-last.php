<?php
$this->load->view('includes/header-subscription.php');
?>
<!--===============PAGE CONTENT==============-->
<section class="contact-box-sections bg_light_1">
	<div class="pd_top_50"></div>
	<div class="auto-container px-2">
		<div class="row align-items-center justify-content-center">
			<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12 d-none d-md-block">
				<img src="<?php echo base_url('assets/images/slider/bharatfincash1.png'); ?>" alt="customer"
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
					<div class="contact_form_box_inner simple_form">
						<div class="contact_form_shortcode">
							<?php echo form_open('subscription/sendotpCode', array('id' => 'submitForm1', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>
							<div class="row gutter_15px">

								<div class="col-lg-12 form-group">
									<label class="w-100"> Your Full Name *
										<span class="wpcf7-form-control-wrap" data-name="your-name">
											<input type="text" aria-required="true" name="fullname" id="fullname"
												class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
												placeholder="Enter Bank Registered Name" required
												data-validation-regex-regex="^[a-zA-z]+([\s][a-zA-Z]+)*$"
												size="40"></span>
										<div class="help-block font-small-3"></div><br>
									</label>
								</div>

								<div class="col-lg-12 form-group">
									<label class="w-100"> Phone Number *<br>
										<div class="input-group mb-1">

											<span class="input-group-text" id="inputGroupPrepend2"><img
													src="<?php echo base_url('assets/images/slider/flag.svg'); ?>"
													class="flag me-2">+91</span>
											<input type="text" class="form-control" name="mobile" id="mobileno"
												placeholder="Enter Bank Registered Number" inputmode="numeric" required
												size="40" maxlength="10" minlength="10"
												data-validation-regex-regex="^[6789]\d{9}$"
												oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										<div class="help-block font-small-3"></div>
									</label>
								</div>

								<div class="form-group mb-2">
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
								<div class="col-lg-12 form-group">
									<button type="submit" id="form-submit1"
										class="wpcf7-form-control has-spinner wpcf7-submit custom-btn kg-custom-btn">Send OTP</button>
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
							<input type="hidden" name="usernm" id="usernm"
								value="<?php echo $userdetails['fullname']; ?>">

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
									<div class="p-countdown">
										<div class="p-countdown-count" id="counttime">
											<code>New OTP code will generate in <span id="timer">7</span> Sec</code>
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
										class="wpcf7-form-control has-spinner wpcf7-submit custom-btn kg-custom-btn">VERIFY
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
									<label class="text-dark">Full name : <strong>
											<?php echo $userdetails['fullname']; ?>
										</strong></label>
									<input type="hidden" name="username" id="username"
										value="<?php echo $userdetails['fullname']; ?>">
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
									<label class="w-100"> Required loan amount<br>
										<span class="wpcf7-form-control-wrap" data-name="your-amount">
											<input type="text" aria-required="true" id="loanamount" name="loanamount"
												class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
												placeholder="Required loan amount" required min="10000" max="5000000"
												inputmode="numeric" data-validation-regex-regex="[0-9]+"
												oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
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
										class="wpcf7-form-control has-spinner wpcf7-submit custom-btn kg-custom-btn"
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

<section class="service-section-one bg_light_1">
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
							<img src="<?php echo base_url('assets/images/bank/043.jpeg'); ?>" alt="Lending kart Logo"
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

<section class="service-section">
	<div class="pd_top_60"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title_all_box style_two text-center dark_color">
					<div class="title_sections two">
						<h2>Get a Personal Loan with <span class="text-success">Multitude of Benefits</span>
						</h2>
						<p class="mb-0">Bharatfincash makes applying for a personal loan easier than ever,
							with a range of benefits on your side.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row  align-items-center">
			<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12  d-md-block  mb-5">
				<img src="<?php echo base_url('assets/images/slider/bharatfincash2.png'); ?>" alt="customer"
					class="img-fluid ">
			</div>
			<div class="col-xl-6 col-lg-6 mb-5 mb-lg-0 mb-xl-0">
				<div class="icon_box_all style_one    border border-success rounded-4">
					<div class="icon_content icon_centers">
						<div class="icon">
							<img src="<?php echo base_url('assets/images/icons/1-1.svg'); ?>" alt="customer"
								class="img-fluid card_icon">
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
							<img src="<?php echo base_url('assets/images/icons/1-2.svg'); ?>" alt="customer"
								class="img-fluid card_icon">
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
							<img src="<?php echo base_url('assets/images/icons/1-3.svg'); ?>" alt="customer"
								class="img-fluid card_icon">
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
							<img src="<?php echo base_url('assets/images/icons/1-4.svg'); ?>" alt="customer"
								class="img-fluid card_icon">
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
							<img src="<?php echo base_url('assets/images/icons/1-5.svg'); ?>" alt="customer"
								class="img-fluid card_icon">
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
									<td>Up to Rs 15 lakh</td>
								</tr>
								<tr class="bg_light_1">
									<th>Tenure:</th>
									<td>Up to 72 months</td>
								</tr>
								<tr>
									<th>Minimum Salary:</th>
									<td>Rs 15,000 per month</td>
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
							<img src="<?php echo base_url('assets/images/icons/2-1.svg'); ?>" alt="customer"
								class="img-fluid card_icon_1 ">
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
							<img src="<?php echo base_url('assets/images/icons/2-2.svg'); ?>" alt="customer"
								class="img-fluid card_icon_1 ">
						</div>
						<div class="content_box text-md-center text-start ms-md-block ms-4 ms-lg-0">
							<h5>Job Stability
								<p>Minimum 1 Year</p>
							</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-6 col-12">
				<div class="process_box style_three dark_color project_post style_one mr_top_20">
					<div class="process_box_outer_three left text-center d-md-block d-flex">
						<div class="icon">
							<img src="<?php echo base_url('assets/images/icons/2-3.svg'); ?>" alt="customer"
								class="img-fluid card_icon_1 ">
						</div>
						<div class="content_box text-md-center text-start ms-md-block ms-4 ms-lg-0">
							<h5>ITR Return
								<p>Minimum 1 Year</p>
							</h5>
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
			<div class="col-xl-8 col-lg-12 order-2 order-lg-1">
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
					<div class="d-flex flex-wrap text-center mt-5 justify-content-center justify-content-lg-start">
						<div class="step_card border-0 box-shadow-grey">
							<img src="<?php echo base_url('assets/images/icons/3-1.svg'); ?>" alt="customer"
											class="img-fluid mb-2 card_icon mx-auto ">
							<h6>Enter Basic Details</h6>
						</div>
						<div class="step_card border-0 box-shadow-grey">
							<img src="<?php echo base_url('assets/images/icons/3-2.svg'); ?>" alt="customer"
											class="img-fluid mb-2 card_icon mx-auto ">
							<h6>Check Eligibility</h6>
						</div>
						<div class="step_card border-0 box-shadow-grey">
							<img src="<?php echo base_url('assets/images/icons/3-3.svg'); ?>" alt="customer"
											class="img-fluid mb-2 card_icon mx-auto ">
							<h6>Get Subscription</h6>
						</div>
						<div class="step_card border-0 box-shadow-grey">
							<img src="<?php echo base_url('assets/images/icons/3-4.svg'); ?>" alt="customer"
											class="img-fluid mb-2 card_icon mx-auto ">
							<h6>Submit Documents</h6>
						</div>
						<div class="step_card border-0 box-shadow-grey">
							<img src="<?php echo base_url('assets/images/icons/3-5.svg'); ?>" alt="customer"
											class="img-fluid mb-2 card_icon mx-auto ">
							<h6>Bank Verification & Sanction</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-12 order-lg-2 order-1 mb-5">
				<img src="<?php echo base_url('assets/images/slider/bharatfincash3.png'); ?>" alt="customer"
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

				<p class="small">Loan Tenure ranges from minimum 6 months to maximum of 60 months, with annual interest rates starting at 11% and going up to 34%. A processing fee up to 2% may be applicable. Representative Example: If a personal loan of ₹1,00,000 is availed at an interest rate of 12.5% per annum for a tenure of 12 months, and a processing fee of 2% is applied: Interest Payable: ₹6,720 approx. Processing Fee: ₹2,000. Total Loan Cost (including interest + fee): ₹1,08,720. APR (Annual Percentage Rate): 14.27% approx. *T&C Apply. All figures are indicative and may vary based on customer profile and final approval by NBFCs or financial partners. Growquik Services Private Limited is a financial consultancy and does not provide loans directly. Company Address: <?php echo COMPANY_ADDRESS ?> | CIN :
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
    let countdown = 7;

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
      countdown = 7;
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