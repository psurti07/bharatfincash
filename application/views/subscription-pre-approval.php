<?php
$this->load->view('includes/header-subscription.php');

$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>

<div id="content" class="site-content ">
    <section class="">
        <div class="auto-container">
            <div class="row default_row">
                <div id="primary" class="kg-content-area content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <main id="main" class="site-main ps-md-4" role="main">
                        <!--===============spacing==============-->
                        <div class="pd_top_25"></div>
                        <!--===============spacing==============-->

                        <section class="creote-icon-box">
                            <?php echo form_open('subscription/getpreApproval', array('id' => 'submitForm2', 'class' => 'checkout woocommerce-checkout', 'novalidate' => 'novalidate')); ?>

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 pd_bottom_25">
                                    <div class="left_content">
                                        <div class="main_content">
                                            <h4>🎉 Congrats! Your <span class="text-success">Rs.
                                                    <?php echo formatePriceIndia($eligibilityamt); ?></span>
                                                Pre-Approved! Proceed now!
                                            </h4>
                                            <p class="pd_top_10">Choose Your Convenient EMI Option:</p>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                                    class="form-control" required>

                                <input type="hidden" name="mobile" value="<?php echo $userdetails['mobile']; ?>"
                                    class="form-control" required>

                                <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                                    class="form-control" required>


                                <!-- Tenure Options -->
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6 p-1 p-lg-2 mb-1 mb-lg-1">
                                    <div class="icon_box_all kg-icon-box-all style_five dark_color_one">
                                        <div class="icon_content kg-icon_content p-0">
                                            <label for="years1" class="w-100 d-block tenure-label">
                                                <span class="custom-radio-icon"><i class="fa fa-check"></i></span>
                                                <div class="text_box text-center pt-3 pb-1">
                                                    <h6>Rs.<?php echo calPMT($userdetails['apr'], 1, $eligibilityamt); ?>
                                                    </h6>
                                                    <p>Monthly EMI</p>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-3 pt-3 border-2 border-top border-success kg-text_box-content">
                                                    <i class="icon-calendar me-2"></i>
                                                    <p class="text-dark mb-0">12 Months</p>
                                                    <input type="radio" name="tenure" id="years1" value="12"
                                                        class="tenure-radio" autocomplete="off" checked>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6 p-1 p-lg-2 mb-1 mb-lg-1">
                                    <div class="icon_box_all kg-icon-box-all style_five dark_color_one">
                                        <div class="icon_content kg-icon_content p-0">
                                            <label for="years2" class="w-100 d-block tenure-label">
                                                <span class="custom-radio-icon"><i class="fa fa-check"></i></span>
                                                <div class="text_box text-center pt-3 pb-1">
                                                    <h6>Rs.<?php echo calPMT($userdetails['apr'], 2, $eligibilityamt); ?>
                                                    </h6>
                                                    <p>Monthly EMI</p>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-3 pt-3 border-2 border-top border-success kg-text_box-content">
                                                    <i class="icon-calendar me-2"></i>
                                                    <p class="text-dark mb-0">24 Months</p>
                                                    <input type="radio" name="tenure" id="years2" value="24"
                                                        class="tenure-radio" autocomplete="off">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6 p-1 p-lg-2 mb-1 mb-lg-1">
                                    <div class="icon_box_all kg-icon-box-all style_five dark_color_one">
                                        <div class="icon_content kg-icon_content p-0">
                                            <label for="years3" class="w-100 d-block tenure-label">
                                                <span class="custom-radio-icon"><i class="fa fa-check"></i></span>
                                                <div class="text_box text-center pt-3 pb-1">
                                                    <h6>Rs.<?php echo calPMT($userdetails['apr'], 3, $eligibilityamt); ?>
                                                    </h6>
                                                    <p>Monthly EMI</p>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-3 pt-3 border-2 border-top border-success kg-text_box-content">
                                                    <i class="icon-calendar me-2"></i>
                                                    <p class="text-dark mb-0">36 Months</p>
                                                    <input type="radio" name="tenure" id="years3" value="36"
                                                        class="tenure-radio" autocomplete="off">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6 p-1 p-lg-2 mb-1 mb-lg-1">
                                    <div class="icon_box_all kg-icon-box-all style_five dark_color_one">
                                        <div class="icon_content kg-icon_content p-0">
                                            <label for="years4" class="w-100 d-block tenure-label">
                                                <span class="custom-radio-icon"><i class="fa fa-check"></i></span>
                                                <div class="text_box text-center pt-3 pb-1">
                                                    <h6>Rs.<?php echo calPMT($userdetails['apr'], 4, $eligibilityamt); ?>
                                                    </h6>
                                                    <p>Monthly EMI</p>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-3 pt-3 border-2 border-top border-success kg-text_box-content">
                                                    <i class="icon-calendar me-2"></i>
                                                    <p class="text-dark mb-0">48 Months</p>
                                                    <input type="radio" name="tenure" id="years4" value="48"
                                                        class="tenure-radio" autocomplete="off">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6 p-1 p-lg-2 mb-1 mb-lg-1">
                                    <div class="icon_box_all kg-icon-box-all style_five dark_color_one">
                                        <div class="icon_content kg-icon_content p-0">
                                            <label for="years5" class="w-100 d-block tenure-label">
                                                <span class="custom-radio-icon mt-2"><i class="fa fa-check"></i></span>
                                                <div class="text_box text-center pt-3 pb-1">
                                                    <h6>Rs.<?php echo calPMT($userdetails['apr'], 5, $eligibilityamt); ?>
                                                    </h6>
                                                    <p>Monthly EMI</p>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-3 pt-3 border-2 border-top border-success kg-text_box-content">
                                                    <i class="icon-calendar me-2"></i>
                                                    <p class="text-dark mb-0">60 Months</p>
                                                    <input type="radio" name="tenure" id="years5" value="60"
                                                        class="tenure-radio" autocomplete="off">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6 p-1 p-lg-2 mb-1 mb-lg-1">
                                    <div class="icon_box_all kg-icon-box-all style_five dark_color_one">
                                        <div class="icon_content kg-icon_content p-0">
                                            <label for="years6" class="w-100 d-block tenure-label">
                                                <span class="custom-radio-icon"><i class="fa fa-check"></i></span>
                                                <div class="text_box text-center pt-3 pb-1">
                                                    <h6>Rs.<?php echo calPMT($userdetails['apr'], 6, $eligibilityamt); ?>
                                                    </h6>
                                                    <p>Monthly EMI</p>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center justify-content-center mb-3 pt-3 border-2 border-top border-success kg-text_box-content">
                                                    <i class="icon-calendar me-2"></i>
                                                    <p class="text-dark mb-0">72 Months</p>
                                                    <input type="radio" name="tenure" id="years6" value="72"
                                                        class="tenure-radio" autocomplete="off">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 pd_top_20 pd_bottom_20 js-confetti">
                                    <button type="submit" id="form-submit2"
                                        class="wpcf7-form-control has-spinner wpcf7-submit custom-btn kg-custom-btn">CHOOSE
                                        OFFER</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>

                            <div class="m-b-0">
                                <hr />
                                <p><small>Note - EMI starting at Rs. 1,982.00 is an indicative amount on Rs.1 lakh loan
                                        at
                                        12.5 interest rate for 6 years tenure. Loan disbursal at sole discretion of
                                        NBFC.</small></p>
                                <p class="m-b-0"><small>How is pre-approved loan offer calculated? <a
                                            class="text-primary" data-target="#modal" data-toggle="modal" href="#">Know
                                            Here</a></small></p>
                            </div>

                        </section>

                        <!--===============spacing==============-->
                        <div class="pd_bottom_25"></div>
                        <!--===============spacing==============-->
                    </main>
                </div>

                <aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12 d-none d-md-block">
                    <div class="service_siderbar side_bar">
                        <div class="widgets_grid_box newsteller kg-newsteller style_one kg-style_one content">
                            <div
                                class="widget creote_widget_service_list newsteller kg-newsteller style_one kg-style_one content">
                                <h4 class="widget-title">Customer Info</h4>
                                <ul class="">
                                    <li><strong>Name : </strong> <span
                                            class="text-end"><?php echo $userdetails['fullname']; ?></span> </li>

                                    <li><strong>Mobile no : </strong> <span
                                            class="text-end"><?php echo $userdetails['mobile']; ?></span> </li>

                                    <li><strong>Loan Amount : </strong> <span class="text-end">₹
                                            <?php echo formatePriceIndia($userdetails['loanamount']); ?></span> </li>
                                </ul>

                            </div>
                        </div>

                        <div class="widgets_grid_box  newsteller kg-newsteller style_one kg-style_one content">
                            <div
                                class="widget creote_widget_service_list newsteller kg-newsteller style_one kg-style_one content">

                                <h4 class="widget-title">Plan Benefits</h4>
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
                                        <i class="fa fa-check"></i> Plan Validity: 9 months
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
    <!--
	<section class="testimonial bg_op_1"
		style="background-image: url(<?php echo base_url() ?>assets/images/testimonialbg.jpg);">
		<div class="container">
			<div class="row align-items-center">

				<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 pd_zero">
					<--===============spacing==============->
					<div class="pd_top_70"></div>
					<--===============spacing==============->
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
								<!-<div class="arrows">
									<div class="prev-single-one"></div>
									<div class="next-single-one"></div>
								</div>->
								<div class="num_pagination" style="width:100%">
									<div class="number-pagination">

									</div>
								</div>

							</div>
						</div>
					</div>
					<!-===============spacing==============->
					<div class="pd_bottom_30"></div>
					<!-===============spacing==============->
				</div>

			</div>
		</div>
	</section>-->

    <section>
        <div class="pd_top_45"></div>
        <div class="container">
            <div class="row default_row">
                <div class="full_width_box">
                    <section class="service-section">
                        <div class="row">
                            <div class="col-12">
                                <div class="pd_bottom_50 text-center">
                                    <h3>Pre-Approved Loan Offers from Our Partnered NBFCs</h3>
                                </div>
                                <?php
								if (count($roipackages)) {
									foreach ($roipackages as $row) {
										?>
                                <div class="job_grid_box border-success">
                                    <div class="inner_bx has_images">
                                        <div class="logo_bx">
                                            <img class="company_logo"
                                                src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>"
                                                alt="Bank">
                                        </div>
                                        <div class="content_bx">
                                            <div class="position">
                                                <h5><?php echo $row->bank_name; ?></h5>
                                            </div>
                                            <ul class="meta">
                                                <li>Loan Amt : Rs. <?php echo formatePriceIndia($eligibilityamt); ?>
                                                </li>
                                                <li class="loan-emi">EMI : Rs.
                                                    <?php echo formatePriceIndia(calPMT($row->roi, $row->termsyears, $eligibilityamt)); ?>
                                                </li>
                                                <li class="loan-percent">ROI : <?php echo $row->roi; ?>%</li>
                                                <li class="loan-tenure">Tenure : <?php echo $row->termsmonths; ?> Months
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
									}
								} ?>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="p-t-10"><small>Disclaimer - The above data is tentative and purely on the
                                    information provided by
                                    you. Final EMI, loan sanction, loan approval, and loan amount depend on customer
                                    profile and NBFCs
                                    criteria and rules & regulations.</small></p>
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <div class="pd_bottom_30"></div>

    </section>

</div>

<div class="modal fade" id="modal" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-label">How is pre-approved loan offer calculated?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-justify">
                        <p>The Pre-Approved Loan Offer and the amount mentioned in it are solely shown based on the
                            software calculation done on Monthly Income and Current Monthly EMI entered by you. This
                            'Pre-Approved Loan Offer' is tentative and not the final loan approval – as the final loan
                            approval is given by the bank only, based on the bank's rules and regulations and the
                            customer profile.</p>

                        <p><strong>Reference Calculation:</strong>
                            <br />Consider a person who has entered the following details –
                            <br />Monthly Income: Rs.1,00,000
                            <br />Current Monthly EMI: Rs.30,000
                        </p>

                        <p>Based on these details, the person is left with Rs.70,000 in hand (deducting current EMI)
                            every month. So, according to the general rules of the banks, the EMI of 50% of the in-hand
                            amount can be approved - in this example, it's 35,000. And based on the EMI and rate of
                            interest (12.5% tentatively), the eligible amount is shown in the Pre-Approved Loan Offer -
                            considering the mentioned calculation.</p>

                        <p>Note: Pre-approved loan offer is tentative. It should not be considered as the final loan
                            approval. The final loan approval is given by the bank only, according to their rules and
                            criteria and the customer profile.</p>

                        <p class="m-b-0">Note: As per the details/information entered by the user, even if the actual
                            pre-approved amount is lesser than 2 Lakhs, the pre-approved amount shown on the website
                            will be Rs.2 Lakhs (minimum). And, even if the actual pre-approved amount is more than 8.5
                            Lakhs, the pre-approved amount shown on the website will be Rs.8.5 Lakhs (maximum). The
                            pre-approved amount/pre-approved loan offers are tentative – the final loan approval, loan
                            sanction, and disbursement depend on the customer profile and the NBFCs’ rules and
                            regulations.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/plugins/celebration/confetti-script.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/celebration/confetti.browser.min.js'); ?>" type="text/javascript">
</script>

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
$(function() {
    $('#submitForm2').on('submit', function(e) {
        $('#form-submit2').attr('disabled', true);
        $('#form-submit2').html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...'
        );
    });
});

document.querySelectorAll('.tenure-radio').forEach(function(radio) {
    radio.addEventListener('change', function() {
        var value = this.value;
        document.querySelectorAll('.tenure-label').forEach(function(label) {
            label.classList.remove('active');
        });
        document.querySelectorAll('.tenure-radio[value="' + value + '"]').forEach(function(r) {
            r.closest('.tenure-label').classList.add('active');
        });
    });
});
document.querySelectorAll('.tenure-radio:checked').forEach(function(r) {
    r.closest('.tenure-label').classList.add('active');
});
</script>