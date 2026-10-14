<?php
$this->load->view('includes/header-apply.php');
?>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">

	<!----contact---->
	<section class="contact-section">
		<!--===============spacing==============-->
		<div class="pd_top_20"></div>
		<!--===============spacing==============-->
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="title_all_box style_one dark_color">
						<div class="title_sections">
							<h6 class="fs-2 lh-base">Get Rs. <span class="apl-text">5,00,000/-</span>  Personal Loan in Minutes!</h6>
						</div>
					</div>

					<div class="list_item_box style_two style_list">
						<ul class="list-inline">
							<li class="list_items pd_bottom_10">
								<small class="d-flex align-items-center">
									<span class="icon_bx">
										<i class=" icon-checked"></i>
									</span>
									<p><strong>No Cibil Required</strong></p>
								</small>
							</li>
							<li class="list_items pd_bottom_10">
								<small class="d-flex align-items-center">
									<span class="icon_bx">
										<i class=" icon-checked"></i>
									</span>
									<p><strong>Interest Rate – Starting 11% p.a</strong></p>
								</small>
							</li>
							<li class="list_items pd_bottom_10">
								<small class="d-flex align-items-center">
									<span class="icon_bx">
										<i class=" icon-checked"></i>
									</span>
									<p><strong>Quick Loan Disbursement</strong></p>
								</small>
							</li>
						</ul>
					</div>

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

				<div class="col-lg-6 hidden-lg">
				</div>
			</div>
		</div>
		<!--===============spacing==============-->
		<div class="pd_bottom_20"></div>
		<!--===============spacing==============-->
		<!--===============spacing==============-->
		<div class="pd_top_20"></div>
		<!--===============spacing==============-->
	</section>

	<section class="contact-box-sections">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="funfacts d-xl-block d-lg-block d-md-block d-none">

						<div class="row gutter_25px">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="counter-block style_three count-box counted">
									<div class="content_box">
										<h6>
											<div class="coun_ter">
												<span class="count-text" data-speed="1500" data-stop="10">10</span>
												<small>+</small>
											</div>
											NBFC Partners
										</h6>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="counter-block style_three count-box counted">

									<div class="content_box">
										<h6>
											<div class="coun_ter">
												<span class="count-text" data-speed="1500" data-stop="1500">15K</span>
												<small>+</small>
											</div>
											Satisfied Customers
										</h6>
									</div>
								</div>
							</div>
						</div>
						<!--===============spacing==============-->
						<div class="pd_bottom_25"></div>
						<!--===============spacing==============-->
						<div class="description_box">
							<p>Our digital services are all for providing you with a seamless loan process and enriching
								your loan journey.</p>
						</div>
						<!--===============spacing==============-->
						<div class="pd_bottom_20"></div>
						<!--===============spacing==============-->

					</div>
				</div>

				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="contact_form_box_all type_four mr_top_minus_320 mr_md_top_zero">
						<?php
						if ($processstep == 'step1') {
							?>
							<div class="title_all_box style_one  dark_color">
								<!-- <p class="">Begin Your Loan Process With Few Details</p> -->
								<p><strong>Your Loan Process With The Best 10+ NBFCs</strong></p>
								<!--===============spacing==============-->
							</div>
							<div class="contact_form_box_inner simple_form">
								<div class="contact_form_shortcode">
									<?php echo form_open('digital/sendotpCode', array('id' => 'submitForm1', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>
									<div class="row gutter_15px">
										<div class="col-lg-12 form-group">
											<label> Your name<br>
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
											<label> Phone Number<br>
												<span class="wpcf7-form-control-wrap" data-name="tel-922">
													<input type="text" aria-required="true" name="mobile" id="mobileno"
														class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
														placeholder="Enter Bank Registered Number" inputmode="numeric"
														required size="40" maxlength="10" minlength="10"
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
											<div class="custom-control custom-checkbox">
												<input type="checkbox" name="terms" id="terms" class="custom-control-input" value="1" style="display:inline-flex" checked required>
												<label class="custom-control-label" for="terms" style="display:unset;"><small>By submitting the form &amp; proceeding, you agree to the <a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of Use</a> and <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy Policy</a> of Indcapital.</small></label>
												<div class="help-block font-small-3"></div>
											</div>
										</div>

										<div class="form-group">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" name="promotion" id="promotion" class="custom-control-input" style="display:inline-flex" value="1" checked required>
												<label class="custom-control-label" for="promotion" style="display:unset;"><small>I agree to receive promotional & informational communications from Indcapital through Emails, calls or SMS Services.</small></label>
												<div class="help-block font-small-3"></div>
											</div>
										</div>

										<div class="col-lg-12 form-group">
											<button type="submit" id="form-submit1"
												class="wpcf7-form-control has-spinner wpcf7-submit">APPLY NOW</button>
										</div>

									</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						<?php } else if ($processstep == 'step2') {
							?>
								<div class="contact_form_box_inner simple_form">
									<div class="contact_form_shortcode">
									<?php echo form_open('digital/checkotpCode', array('id' => 'submitForm2', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>

										<label class="text-dark pd_bottom_20">Mobile No. :
											<strong><?php echo $userdetails['mobile']; ?></strong></label>
										<input type="hidden" name="usernm" id="usernm"
											value="<?php echo $userdetails['fullname']; ?>">
										<input type="hidden" name="otpmobile" id="otpmobile"
											value="<?php echo $userdetails['mobile']; ?>">

										<div class="row gutter_15px">
											<div class="col-lg-12 form-group">
												<label> Please enter the OTP you get on this number:<br>
													<span class="wpcf7-form-control-wrap" data-name="tel-922">
														<input type="text" name="otpcode" id="otpcode"
															class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required optnumber"
															required inputmode="numeric" maxlength="4"
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
													class="wpcf7-form-control has-spinner wpcf7-submit">VERIFY</button>
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
													<div> <label class="text-dark pd_bottom_20">Full name :
															<strong><?php echo $userdetails['fullname']; ?></strong></label> </div>
													<input type="hidden" name="username" id="username"
														value="<?php echo $userdetails['fullname']; ?>">

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

													<input class="btn-check" type="radio" value="1" name="usertype"
														id="selfemployed" autocomplete="off">
													<label class="btn btn-outline-success btn-xs mb-1" for="selfemployed">
														Self-Employed </label>
												</div>

												<div class="form-group form-floating mb-4">
													<div class="range">
														<div class="range__slider">
															<input type="range" name="loanamount" step="10000">
														</div>
														<div class="range__value">
															<label>Loan Amount</label>
															<span></span>
														</div>
													</div>
												</div>

												<!-- <div class="col-lg-12 form-group">
									<label> Required loan amount<br>
										<span class="wpcf7-form-control-wrap" data-name="your-amount">
										<input type="text" aria-required="true" id="loanamount" name="loanamount"
										class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Required loan amount" required min="10000"
										max="5000000" inputmode="numeric" data-validation-regex-regex="[0-9]+"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" size="40"></span>
										<div class="help-block font-small-3"></div><br>
									</label>
								</div> -->

												<div class="col-lg-12 form-group">
													<label> Email Id<br>
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
														class="wpcf7-form-control has-spinner wpcf7-submit" onclick="_tfa.push({notify: 'event', name: 'indc_pl_lead', id: 1719054});">PROCESS</button>
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
		<div class="pd_bottom_30"></div>
		<!--===============spacing==============-->
	</section>

	<section class="testimonial bg_dark_1 d-none d-md-block">
		<div class="row align-items-center">
			<div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 pd_zero">
				<div class="image">
					<img src="<?php echo base_url() ?>assets/images/lending-banner-personal.png"
						class="object-fit-cover img-fluid" alt="image">
				</div>
			</div>

			<div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 pd_zero">
				<div class="testimonial_sec_wrapper pd_left_20">
					<div class="title_all_box style_one light_color">
						<div class="light_color">
							<h5 class="pd_top_50"><span style="color: var(--primary-color-six);"><i class="fa fa-th-large"></i></span> 10K+ Customers Served Satisfactorily</h5>
							<h5 class="pd_top_20"><span style="color: var(--primary-color-six);"><i class="fa fa-th-large"></i></span> 8+ Renowned NBFC Partners</h5>
							<h5 class="pd_top_20"><span style="color: var(--primary-color-six);"><i class="fa fa-th-large"></i></span> 100% Digital Loan Process</h5>
							<h5 class="pd_top_20"><span style="color: var(--primary-color-six);"><i class="fa fa-th-large"></i></span> 5+ Million Loan Amount Disbursed</h5>
							<h5 class="pd_top_20 pd_bottom_50"><span style="color: var(--primary-color-six);"><i class="fa fa-th-large"></i></span> Easy Pre-Approval Eligibility Check</h5>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="price-plan-tab-section bg_op_1" style="background-image: url(<?php echo base_url() ?>assets/images/testi-home-9.jpg);">
		<!--===============spacing==============-->
		<div class="pd_top_40"></div>
		<!--===============spacing==============-->
		<div class="container">
			<div class="row gutter_30px">
				<div class="col-lg-12">
					<div class="price_plan_with_tab price_tb_style_one">
						<div class="tab-content price_tab_content" id="myTabContent">
							<div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<div class="price_plan_box style_one ">
											<div class="inner_box">
												<div class="top">
													<h5>NBFC Personal Loan Criteria for Salaried Person</h>
												</div>
												<div class="bottom">
													<ul>
														<li>
															<span> Minimum Salary : Rs. 15,000 Monthly</span>
															<i class="fa fa-check"></i>
														</li>
														<li>
															<span> Minimum 1 Year Job Stability</span>
															<i class="fa fa-check"></i>
														</li>
														<li>
															<span> Min. Age : 21 Years</span>
															<i class="fa fa-check"></i>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<div class="price_plan_box style_one">
											<div class="inner_box">
												<div class="top">
													<h5>NBFC Personal Loan Criteria for Self-Employed Person</h5>
												</div>
												<div class="bottom">
													<ul>
														<li>
															<span> Minimum 1 Year Business Stability</span>
															<i class="fa fa-check"></i>
														</li>
														<li>
															<span> Minimum 1 Year IT Return</span>
															<i class="fa fa-check"></i>
														</li>
														<li>
															<span> Min. Age : 21 Years</span>
															<i class="fa fa-check"></i>
														</li>

													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===============spacing==============-->
		<div class="pd_bottom_40"></div>
		<!--===============spacing==============-->
	</section>

	<section class="process-section d-none d-md-block">
		<!--===============spacing==============-->
		<div class="pd_top_80"></div>
		<!--===============spacing==============-->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title_all_box style_one text-center dark_color">
						<div class="title_sections">
							<h2>Steps To Apply For Instant Personal Loan</h2>
						</div>
						<!--===============spacing==============-->
						<div class="mr_bottom_25"></div>
						<!--===============spacing==============-->
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xl-4 col-lg-12 col-md-12 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-0">
					<div class="image_boxes style_seven">
						<div class="image_box">
							<img src="<?php echo base_url() ?>assets/images/lending-mobile.png"
								class="img-fluid object-fit-cover" alt="about">
						</div>
						<div class="pattern_imag">
							<img src="<?php echo base_url() ?>assets/images/pattern-n1.png" alt="img">
						</div>
					</div>
				</div>

				<div class="col-xl-8 col-lg-12 col-md-12">
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-6">
							<div class="process_box style_four dark_color pd_bottom_30">
								<div class="process_box_outer_four ">
									<div class="icon">
										<img src="<?php echo base_url() ?>assets/images/process-icon-im-1.png"
											class="img-fluid svg_image" alt="icon png">
										<h6> 01</h6>
									</div>
									<div class="content_box">
										<h2><a href="#" target="_blank" rel="nofollow">Quick Registration</a>
										</h2>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-6">
							<div class="process_box style_four dark_color pd_bottom_30">
								<div class="process_box_outer_four ">
									<div class="icon">
										<img src="<?php echo base_url() ?>assets/images/service-ico-3.png"
											class="img-fluid svg_image" alt="icon png">
										<h6>02</h6>
									</div>
									<div class="content_box">
										<h2><a href="#" target="_blank" rel="nofollow">Check Eligibility</a></h2>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-6">
							<div class="process_box style_four dark_color pd_bottom_30">
								<div class="process_box_outer_four ">
									<div class="icon">
										<img src="<?php echo base_url() ?>assets/images/service-ico-2.png"
											class="img-fluid svg_image" alt="icon png">
										<h6> 03</h6>
									</div>
									<div class="content_box">
										<h2><a href="#" target="_blank" rel="nofollow">Get Membership
											</a>
										</h2>
									</div>
								</div>
							</div>
						</div>
			
						<div class="col-xl-4 col-lg-4 col-md-4 col-6">
							<div class="process_box style_four dark_color pd_bottom_30">
								<div class="process_box_outer_four ">
									<div class="icon">
										<img src="<?php echo base_url() ?>assets/images/process-icon-im-1.png"
											class="img-fluid svg_image" alt="icon png">
										<h6> 04</h6>
									</div>
									<div class="content_box">
										<h2><a href="#" target="_blank" rel="nofollow">Document Submission
											</a></h2>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-6">
							<div class="process_box style_four dark_color pd_bottom_30">
								<div class="process_box_outer_four ">
									<div class="icon">
										<img src="<?php echo base_url() ?>assets/images/service-ico-3.png"
											class="img-fluid svg_image" alt="icon png">
										<h6> 05</h6>
									</div>
									<div class="content_box">
										<h2><a href="#" target="_blank" rel="nofollow">Bank Verification</a>
										</h2>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-6">
							<div class="process_box style_four dark_color pd_bottom_30">
								<div class="process_box_outer_four ">
									<div class="icon">
										<img src="<?php echo base_url() ?>assets/images/process-icon-im-2.png"
											class="img-fluid svg_image" alt="icon png">
										<h6> 06</h6>
									</div>
									<div class="content_box">
										<h2><a href="#" target="_blank" rel="nofollow">Bank Sanction</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===============spacing==============-->
		<div class="pd_bottom_60"></div>
		<!--===============spacing==============-->
	</section>

	<section class="testimonial bg_op_1"
		style="background-image: url(<?php echo base_url() ?>assets/images/testimonialbg.jpg);">
		<div class="container">
			<div class="row align-items-center">

				<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 pd_zero">
					<!--===============spacing==============-->
					<div class="pd_top_70"></div>
					<!--===============spacing==============-->
					<div class="testimonial_sec_wrapper pd_left_20 pd_right_20">

						<div class="testimonial_sec light_color style_one">

							<div class="swiper-container" data-swiper='{
							  "loop": true,
							  "autoplay": {
								"delay": 7000
							  },
							  "speed": 1000,
							  "centeredSlides": false,
							  "slidesPerView": 3,
							  "spaceBetween": 30,
							  "navigation": {
								"nextEl": ".next-single-one",
								"prevEl": ".prev-single-one"
							  },
							  "pagination": {
								"el": ".number-pagination",
								"clickable": "true"
							  },
							  "breakpoints": {
								"1200": {
								  "slidesPerView": 3 
								},
								"1024": {
								  "slidesPerView": 3 
								},
								"768": {
								  "slidesPerView": 2 
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
										<div class="testimonial_box">
											<div class="comment">
												<img src="<?php echo base_url() ?>assets/images/offerimg/Frame_5371.png"
													alt="image" />
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="testimonial_box">
											<div class="comment">
												<img src="<?php echo base_url() ?>assets/images/offerimg/Frame_5372.png"
													alt="image" />
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="testimonial_box">
											<div class="comment">
												<img src="<?php echo base_url() ?>assets/images/offerimg/Frame_5373.png"
													alt="image" />
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="testimonial_box">
											<div class="comment">
												<img src="<?php echo base_url() ?>assets/images/offerimg/Frame_5374.png"
													alt="image" />
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="testimonial_box">
											<div class="comment">
												<img src="<?php echo base_url() ?>assets/images/offerimg/Frame_5375.png"
													alt="image" />
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="testimonial_box">
											<div class="comment">
												<img src="<?php echo base_url() ?>assets/images/offerimg/Frame_5376.png"
													alt="image" />
											</div>
										</div>
									</div>

									<div class="swiper-slide">
										<div class="testimonial_box">
											<div class="comment">
												<img src="<?php echo base_url() ?>assets/images/offerimg/Frame_5377.png"
													alt="image" />
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="testimonial_box">
											<div class="comment">
												<img src="<?php echo base_url() ?>assets/images/offerimg/Frame_5378.png"
													alt="image" />
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="testimonial_box">
											<div class="comment">
												<img src="<?php echo base_url() ?>assets/images/offerimg/Frame_5379.png"
													alt="image" />
											</div>
										</div>
									</div>
									<div class="swiper-slide">
										<div class="testimonial_box">
											<div class="comment">
												<img src="<?php echo base_url() ?>assets/images/offerimg/Frame_5380.png"
													alt="image" />
											</div>
										</div>
									</div>

								</div>
								<!--<div class="arrows">
									<div class="prev-single-one"></div>
									<div class="next-single-one"></div>
								</div>-->
								<div class="num_pagination" style="width:100%">
									<div class="number-pagination">

									</div>
								</div>

							</div>
						</div>
					</div>
					<!--===============spacing==============-->
					<div class="pd_bottom_30"></div>
					<!--===============spacing==============-->
				</div>

			</div>
		</div>
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
						regulations, and terms & conditions.</p>
					<p class="small">Company Address: <?php echo COMPANY_ADDRESS ?> | CIN : U67100GJ2022PTC134395 | Time
						: 10AM to 5PM (Monday to Saturday)</small></p>
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
		fullname = document.getElementById('usernm').value;
		mobile = document.getElementById('otpmobile').value;

		$.ajax({
			url: '<?php echo base_url("digital/resendotpCode"); ?>',
			type: "POST",
			data: 'mobile=' + mobile + '&fullname=' + fullname,
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