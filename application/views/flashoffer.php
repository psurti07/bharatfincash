<?php
$this->load->view('includes/header-apply.php');

$amtpay = $productdata['payamount'];
?>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
	<!---price-tab--->
	<section class="price-plan-tab-section">
		<!--===============spacing==============-->
		<div class="pd_top_30"></div>
		<!--===============spacing==============-->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title_all_box style_one text-center dark_color">
						<div class="title_sections">
							<div class="before_title">Buy plan & get instant personal loan offer multiple banks*</div>
							<h3>EXCLUSIVE PLAN OFFER FOR YOU !!!</h3>
						</div>
					</div>
				</div>
			</div>

			<div class="row gutter_30px">
				<!--===============spacing==============-->
				<div class="pd_top_40"></div>
				<!--===============spacing==============-->
				<div class="col-lg-12">
					<div class="price_plan_with_tab price_tb_style_one">

						<div class="tab-content price_tab_content" id="myTabContent">
							<div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">

									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<div class="price_plan_box style_one tag_enables">
											<?php
											if ($productdata['offeramount'] != 0) {
												$discount = calPercentage($productdata['amount'], $productdata['offeramount']);
												echo '<div class="tag">&nbsp; ' . $discount . ' off</div>';
											}
											?>

											<div class="inner_box">
												<div class="top">
													<h2>Standard Plan</h2>
													<p>Get Personal Financial Consultation from Top Experts</p>
												</div>

												<div class="mid">
													<?php
													if ($productdata['offeramount'] != 0) {
														echo '<h5 class="text-danger"><del>₹ ' . $productdata['amount'] . '</del></h5>';
														echo '<h4>₹ ' . $productdata['offeramount'] . '</h4>';
													} else {
														echo '<h4>₹ ' . $productdata['amount'] . '</h4>';
													}
													?>
												</div>
												<!-- loan/getcardoffer -->
												<?php echo form_open('loan/getflashoffer', array('id' => 'submitForm1', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>
												<input type="hidden" name="amount" id="amount"
													value="<?php echo $amtpay; ?>" class="form-control" required>
												<input type="hidden" name="paymentid" id="paymentid" value=""
													class="form-control">

												<div class="form-group">
													<span class="wpcf7-form-control-wrap" data-name="your-name">
														<input type="text" aria-required="true" name="fullname"
															id="fullname"
															class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
															placeholder="Enter Full Name" required
															data-validation-regex-regex="^[a-zA-z]+([\s][a-zA-Z]+)*$"
															size="40"></span>
													<div class="help-block font-small-3"></div><br>
												</div>

												<div class="form-group">
													<span class="wpcf7-form-control-wrap" data-name="your-mobile">
														<input type="text" aria-required="true" name="mobileno"
															id="mobileno"
															class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
															placeholder="Enter Mobile No." inputmode="numeric" required
															size="40" maxlength="10" minlength="10"
															data-validation-regex-regex="^[6789]\d{9}$"
															oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></span>
														<div class="help-block font-small-3"></div><br>
												</div>

												<div class="form-group">
													<span class="wpcf7-form-control-wrap" data-name="your-email">
														<input type="text" name="emailid" id="emailid"
															class="wpcf7-form-control wpcf7-text"
															placeholder="Enter Email Id" required size="40"></span>
														<div class="help-block font-small-3"></div><br>
												</div>

												<div class="form-group">
													<p class="pd_bottom_20 small">By submitting the form & proceeding,
														you agree to the Terms of Use and Privacy Policy of
														Indcapital.in</p>
												</div>

												<div class="form-group">
													<button type="submit" id="form-submit1"
														class="wpcf7-form-control has-spinner wpcf7-submit">PROCEED TO
														PAY</button>
												</div>

												<?php echo form_close(); ?>
											</div>
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<div class="price_plan_box style_one ">
											<div class="inner_box">
												<div class="top">
													<h2>Plan Benefits</h2>
												</div>

												<div class="bottom">
													<ul>
														<li>
															<span> Consultation Process in Multiple NBFCs</span>
															<i class="fa fa-check"></i>
														</li>
														<li>
															<span> 100% Online Financial Consultation</span>
															<i class="fa fa-check"></i>
														</li>
														<li>
															<span> Access Personalized Tracking Portal</span>
															<i class="fa fa-check"></i>
														</li>
														<li>
															<span> Dedicated Expert Assigned</span>
															<i class="fa fa-check"></i>
														</li>
														
														<li>
															<span> Plan Validity: 3 months</span>
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
		<div class="pd_bottom_20"></div>
		<!--===============spacing==============-->
	</section>
	<!---price-tab-end--->
</div>
<!--===============PAGE CONTENT END==============-->

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
	$(function () {
		$('#submitForm1').on('submit', function (e) {
			$('#form-submit1').attr('disabled', true);
			$('#form-submit1').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...');
		});
	});
</script>