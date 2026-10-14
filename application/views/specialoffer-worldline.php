<?php
$this->load->view('includes/header-apply.php');

$amtpay = $productdata['payamount'];
?>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
	<!---price-tab--->
	<section class="price-plan-tab-section">
		<!--===============spacing==============-->
		<div class="pd_top_50"></div>
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

											<?php echo form_open('loan/getspecialoffer', array('id' => 'submitForm1', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>
												<input type="hidden" name="amount" id="amount" value="<?php echo $amtpay; ?>" class="form-control" required>
												<input type="hidden" name="paymentid" id="paymentid" value="" class="form-control">
												
												<div class="form-group">
													<span class="wpcf7-form-control-wrap" data-name="your-name">
													<input type="text" aria-required="true" name="fullname" id="fullname"
														class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Enter Full Name" required
														data-validation-regex-regex="^[a-zA-z]+([\s][a-zA-Z]+)*$" size="40"></span>
													<div class="help-block font-small-3"></div><br>
												</div>

												<div class="form-group">
													<span class="wpcf7-form-control-wrap" data-name="your-mobile">
													<input type="text" aria-required="true" name="mobileno" id="mobileno"
														class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Enter Mobile No."
														inputmode="numeric" required size="40" maxlength="10" minlength="10"
														data-validation-regex-regex="^[6789]\d{9}$"
														oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></span>
													<div class="help-block font-small-3"></div><br>
												</div>

												<div class="form-group">
													<span class="wpcf7-form-control-wrap" data-name="your-email">
													<input type="text"name="emailid" id="emailid"
														class="wpcf7-form-control wpcf7-text" placeholder="Enter Email Id"
														required size="40" maxlength="10" minlength="10"></span>
													<div class="help-block font-small-3"></div><br>
												</div>

												<div class="form-group">
													<p class="pd_bottom_20 small">By submitting the form & proceeding, you agree to the Terms of Use and Privacy Policy of Indcapital.in</p>
												</div>

												<div class="form-group">
													<button type="submit" id="form-submit1" class="wpcf7-form-control has-spinner wpcf7-submit">PROCEED TO PAY</button>
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
		<div class="pd_bottom_100"></div>
		<!--===============spacing==============-->
	</section>
	<!---price-tab-end--->
</div>
<!--===============PAGE CONTENT END==============-->

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript" src="https://www.paynimo.com/Paynimocheckout/server/lib/checkout.js"></script>
<script type="text/javascript">
	$(document).ready(function () {

		$('#submitForm1').on('submit', function (e) {
			e.preventDefault();

			$('#form-submit1').attr('disabled', true);
			$('#form-submit1').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESSING...');

			$.ajax({
				url: $(this).attr('action') || window.location.pathname,
				type: 'POST',
				data: $(this).serialize(),
				cache: false,
				success: function (response) {
					var obj = JSON.parse(response);

					function handleResponse(res) {
						if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0300') {
							// success block
						} else if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0398') {
							// initiated block
						} else {
							// error block
						}
					};

					var configJson = {
						'tarCall': false,
						'features': {
							'showPGResponseMsg': true,
							'enableNewWindowFlow': true,
							'enableAbortResponse': true,
							'enableExpressPay': true,
							'enableInstrumentDeRegistration': false,
							'enableMerTxnDetails': true,
							'siDetailsAtMerchantEnd': false,
							'enableSI': false,
							'hideSIDetails': false,
							'enableDebitDay': false,
							'expandSIDetails': false,
							'enableTxnForNonSICards': false,
							'showSIConfirmation': false,
							'showSIResponseMsg': false,
						},
						'consumerData': {
							'deviceId': 'WEBSH2',
							//possible values 'WEBSH1', 'WEBSH2' and 'WEBMD5'
							//'debitDay':'10',
							'token': obj['hash'],
							'returnUrl': obj['data'][12],
							/*'redirectOnClose': 'https://www.tekprocess.co.in/MerchantIntegrationClient/MerchantResponsePage.jsp',*/
							'responseHandler': handleResponse,
							'paymentMode': 'all',
							'checkoutElement': '',
							'merchantLogoUrl': 'https://indcapital.in/assets/images/logo-large.png',
							'merchantId': obj['data'][0],
							'currency': obj['data'][15],
							'consumerId': obj['data'][8], //Your unique consumer identifier to register a eMandate/eNACH
							'consumerMobileNo': obj['data'][9],
							'consumerEmailId': obj['data'][10],
							'txnId': obj['data'][1], //Unique merchant transaction ID
							'items': [{
								'itemId': obj['data'][14],
								'amount': obj['data'][2],
								'comAmt': '0'
							}],
							'cartDescription': '}{custname:' + obj['data'][13],
							'merRefDetails': [{
								"name": "Txn. Ref. ID",
								"value": obj['data'][1]
							}],
							'customStyle': {
								'PRIMARY_COLOR_CODE': '#a8d6ff', //merchant primary color code
								'SECONDARY_COLOR_CODE': '#3f3962', //provide merchant's suitable color code
								'BUTTON_COLOR_CODE_1': '#51da00', //merchant's button background color code
								'BUTTON_COLOR_CODE_2': '#000' //provide merchant's suitable color code for button text
							},
							'accountNo': obj['data'][11], //Pass this if accountNo is captured at merchant side for eMandate/eNACH
							'accountHolderName': obj['data'][16], //Pass this if accountHolderName is captured at merchant side for ICICI eMandate & eNACH registration this is mandatory field, if not passed from merchant Customer need to enter in Checkout UI.
							'ifscCode': obj['data'][17], //Pass this if ifscCode is captured at merchant side.
							'accountType': obj['data'][18], //Required for eNACH registration this is mandatory field
							'debitStartDate': obj['data'][3],
							'debitEndDate': obj['data'][4],
							'maxAmount': obj['data'][5],
							'amountType': obj['data'][6],
							'frequency': obj['data'][7] //  Available options DAIL, WEEK, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
						}
					};

					//console.log(configJson);       

					$.pnCheckout(configJson);
					if (configJson.features.enableNewWindowFlow) {
						pnCheckoutShared.openNewWindow();
					}
				}
			});
		});

	});
</script>
