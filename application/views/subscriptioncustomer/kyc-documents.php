<?php
    $this->load->view('subscriptioncustomer/includes/header.php');

   	$isall = 0;
    if($profiledata->cardtype == 22) {
    	$loantype = "bl";
	}
	else {
		$loantype = "pl";
	}
?>
<!----page-CONTENT----->
<div id="content" class="site-content ">
	<div class="auto-container">
		<div class="row default_row">


			<div id="primary" class="content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
				<main id="main" class="site-main" role="main">
					<!--===============spacing==============-->
					<div class="pd_top_25"></div>
					<!--===============spacing==============-->

					<section class="contact_form_box_all type_two">
						<div class="contact_form_box_inner">
							<div class="contact_form_shortcode">
								<div class="reset-page-wrapper">

										<div class="col-md-12">
											<?php if($docflags['profilephoto'] == 0) { ?>
											<?php echo form_open('subscriptioncustomer/profile/uploaddocument', array('id'=>'submitForm1', 'class'=>'', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
											<input type="hidden" name="doc" value="profilephoto" required>
											<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
												<div class="cust-border">
													<h6 class="text-start">Profile Photo *</h6>
													<div class="form-group input-group">
														<input type="file" name="userfile" id="user_photo"
															class="form-control file" aria-required="true" required
															accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
														<div class="input-group-append">
															<span class="input-group-btn">
																<button type="submit"
																	class="theme-btn one">Upload
																</button>
															</span>
														</div>
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>
												</div>
											<?php echo form_close(); ?> 
											<?php $isall += 1; } ?>


											<?php if($docflags['aadharcard'] == 0) { ?>
											<?php echo form_open('subscriptioncustomer/profile/uploaddocument', array('id'=>'submitForm2', 'class'=>'p-cb process border-top-dark', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
											<input type="hidden" name="doc" value="aadharcard" required>
											<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
												<div class="mt-30 cust-border">
													<div class="form-group">
														<h6 class="text-start">Aadhaar Card *</h6>
														<input type="text" name="userfile_number" id="user_aadharcard_number" aria-required="true" class="form-control name cust-height" placeholder="Aadhaar Card Number" inputmode="numeric" data-validation-regex-regex="[0-9]+" value="<?php echo ($docflags['aadharcard_number'] != 0) ? $docflags['aadharcard_number'] : ''; ?>">
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>

													<div class="form-group input-group">
														<input type="file" name="userfile" id="user_aadharcard"
															class="form-control file" aria-required="true" required 
															accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
														<div class="input-group-append">
															<span class="input-group-btn">
																<button type="submit"
																	class="theme-btn one">Upload
																</button>
															</span>
														</div>
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>
												</div>
											<?php echo form_close(); ?>
											<?php $isall += 1; } ?>


											<?php if($docflags['pancard'] == 0) { ?>
											<?php echo form_open('subscriptioncustomer/profile/uploaddocument', array('id'=>'submitForm3', 'class'=>'p-cb process border-top-dark', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
											<input type="hidden" name="doc" value="pancard" required>
											<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
												<div class="mt-30 cust-border">
													<div class="form-group">
														<h6 class="text-start">Pan Card *</h6>
														<input type="text" name="userfile_number" id="user_pancard_number" aria-required="true" class="form-control name cust-height" placeholder="Pan Card Number" value="<?php echo ($docflags['pancard_number'] != 0) ? $docflags['pancard_number'] : ''; ?>">
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>

													<div class="form-group input-group">
														<input type="file" name="userfile" id="user_pancard"
															class="form-control file" aria-required="true" required 
															accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
														<div class="input-group-append">
															<span class="input-group-btn">
																<button type="submit"
																	class="theme-btn one">Upload
																</button>
															</span>
														</div>
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>
												</div>
											<?php echo form_close(); ?>
											<?php $isall += 1; } ?>


											<?php if($docflags['lightbill'] == 0) { ?>
											<?php echo form_open('subscriptioncustomer/profile/uploaddocument', array('id'=>'submitForm4', 'class'=>'', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
											<input type="hidden" name="doc" value="lightbill" required>
											<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
												<div class="cust-border">
													<h6 class="text-start">Address Proof - Light Bill *</h6>
													<div class="form-group input-group">
														<input type="file" name="userfile" id="user_lightbill"
															class="form-control file" aria-required="true" required
															accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
														<div class="input-group-append">
															<span class="input-group-btn">
																<button type="submit"
																	class="theme-btn one">Upload
																</button>
															</span>
														</div>
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>
												</div>
											<?php echo form_close(); ?> 
											<?php $isall += 1; } ?>


											<?php if($docflags['cancelcheque'] == 0) { ?>
											<?php echo form_open('subscriptioncustomer/profile/uploaddocument', array('id'=>'submitForm5', 'class'=>'', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
											<input type="hidden" name="doc" value="cancelcheque" required>
											<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
												<div class="cust-border">
													<h6 class="text-start">Cancel Cheque *</h6>
													<div class="form-group input-group">
														<input type="file" name="userfile" id="user_cheque"
															class="form-control file" aria-required="true" required
															accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
														<div class="input-group-append">
															<span class="input-group-btn">
																<button type="submit"
																	class="theme-btn one">Upload
																</button>
															</span>
														</div>
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>
												</div>
											<?php echo form_close(); ?> 
											<?php $isall += 1; } ?>


											<?php if($docflags['bankstatement'] == 0) { ?>
											<?php echo form_open('subscriptioncustomer/profile/uploaddocument', array('id'=>'submitForm6', 'class'=>'', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
											<input type="hidden" name="doc" value="bankstatement" required>
											<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
												<div class="cust-border">
													<h6 class="text-start">Bank Statement - Last 6 months *</h6>
													<div class="form-group input-group">
														<input type="file" name="userfile" id="user_bankstatement"
															class="form-control file" aria-required="true" required
															accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
														<div class="input-group-append">
															<span class="input-group-btn">
																<button type="submit"
																	class="theme-btn one">Upload
																</button>
															</span>
														</div>
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>
												</div>
											<?php echo form_close(); ?> 
											<?php $isall += 1; } ?>


											<?php if($profiledata->cardtype == 21) { ?>
											<?php if($docflags['formsixteen'] == 0) { ?>
											<?php echo form_open('subscriptioncustomer/profile/uploaddocument', array('id'=>'submitForm7', 'class'=>'', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
											<input type="hidden" name="doc" value="formsixteen" required>
											<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
												<div class="cust-border">
													<h6 class="text-start">Form 16 *</h6>
													<div class="form-group input-group">
														<input type="file" name="userfile" id="user_formsixteen"
															class="form-control file" aria-required="true" required
															accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
														<div class="input-group-append">
															<span class="input-group-btn">
																<button type="submit"
																	class="theme-btn one">Upload
																</button>
															</span>
														</div>
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>
												</div>
											<?php echo form_close(); ?> 
											<?php $isall += 1; } ?>


											<?php if($docflags['salaryslip'] == 0) { ?>
											<?php echo form_open('subscriptioncustomer/profile/uploaddocument', array('id'=>'submitForm8', 'class'=>'', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
											<input type="hidden" name="doc" value="salaryslip" required>
											<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
												<div class="cust-border">
													<h6 class="text-start">Salary Slip *</h6>
													<div class="form-group input-group">
														<input type="file" name="userfile" id="user_salaryslip"
															class="form-control file" aria-required="true" required
															accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
														<div class="input-group-append">
															<span class="input-group-btn">
																<button type="submit"
																	class="theme-btn one">Upload
																</button>
															</span>
														</div>
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>
												</div>
											<?php echo form_close(); ?> 
											<?php $isall += 1; } ?>
											<?php } ?>


											<?php if($profiledata->cardtype == 22) { ?>
											<?php if($docflags['businessproof'] == 0) { ?>
											<?php echo form_open('subscriptioncustomer/profile/uploaddocument', array('id'=>'submitForm9', 'class'=>'', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
											<input type="hidden" name="doc" value="businessproof" required>
											<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
												<div class="cust-border">
													<h6 class="text-start">Business Proof *</h6>
													<div class="form-group input-group">
														<input type="file" name="userfile" id="user_businessproof"
															class="form-control file" aria-required="true" required
															accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
														<div class="input-group-append">
															<span class="input-group-btn">
																<button type="submit"
																	class="theme-btn one">Upload
																</button>
															</span>
														</div>
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>
												</div>
											<?php echo form_close(); ?> 
											<?php $isall += 1; } ?>


											<?php if($docflags['itreturn'] == 0) { ?>
											<?php echo form_open('subscriptioncustomer/profile/uploaddocument', array('id'=>'submitForm10', 'class'=>'', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
											<input type="hidden" name="doc" value="itreturn" required>
											<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
												<div class="cust-border">
													<h6 class="text-start">IT Return *</h6>
													<div class="form-group input-group">
														<input type="file" name="userfile" id="user_itreturn"
															class="form-control file" aria-required="true" required
															accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
														<div class="input-group-append">
															<span class="input-group-btn">
																<button type="submit"
																	class="theme-btn one">Upload
																</button>
															</span>
														</div>
														<div class="w-100 mb-2 help-block text-danger font-small-3"></div>
													</div>
												</div>
											<?php echo form_close(); ?> 
											<?php $isall += 1; } ?>
											<?php } ?>

										</div>


										<?php if ($isall == 0 && $docflags['isVerified'] == 0) { ?>
											<div class="col-md-12 col-12">
												<h3>Upload Successful</h3>
												<p>Your documents are successfully submitted. Our Company Executive will verify the documents and contact you
													shortly.</p>
											</div>
										<?php } else if ($isall == 0 && $docflags['isVerified'] == 1) { ?>
												<div class="col-md-12 col-12">
													<h3>Verification Successful</h3>
													<p>Dear Customer, your documents are successfully verified. Our Company Executive will contact you soon for your
														loan process. </p>
												</div>
										<?php } ?>

										<?php if ($docflags['aadharcard_number'] != '' || $docflags['pancard_number'] != '') { ?>
											<div class="col-md-12 col-12">
												<div class="p-cb process border-top-green p-b-0">
													<?php
													if ($docflags['aadharcard_number'] != '') {
														echo "<p>Aadhar Card Number - " . $docflags['aadharcard_number'] . "</p>";
													}

													if ($docflags['pancard_number'] != '') {
														echo "<p>PAN Card Number - " . $docflags['pancard_number'] . "</p>";
													}
													?>
												</div>
											</div>
										<?php } ?>

										<?php if ($isall == 0) { ?>
											<div class="col-md-12 col-12">
												<?php echo form_open('subscriptioncustomer/profile/documentmsg', array('id'=>'submitForm20', 'class'=>'', 'novalidate'=>'novalidate')); ?>
												<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
													<div class="mt-30 cust-border">
														<div class="form-group input-group">
															<textarea class="form-control name" name="remarks" rows="3" placeholder="Remarks"><?php echo $docflags['remarks']; ?></textarea>
														</div>
														<div class="col-md-4">
															<button type="submit" id="submit-submit1" class="theme-btn one">Submit</button>
														</div>
													</div>
												<?php echo form_close(); ?>
											</div>
										<?php } ?>


								</div>
							</div>
						</div>
					</section>


					<!--===============spacing==============-->
					<div class="pd_bottom_65"></div>
					<!--===============spacing==============-->
				</main>
			</div>

			<aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12">

				<div class="service_siderbar side_bar">
					<!--===============spacing==============-->
					<div class="pd_top_85"></div>
					<!--===============spacing==============-->

					<div class="widgets_grid_box">
						<div class="widget creote_widget_service_list">
							<h4 class="widget-title">Document List</h4>
							<div class="list_item_box style_two style_list">
								<ul class="list-inline">

									<li class="list_items pd_bottom_10">
										<small class="d-flex align-items-center">
											<span class="icon_bx">
												<?php
												echo ($docflags['profilephoto'] == 1) ? '<i class=" icon-checked text-success"></i>' : '<i class=" fa fa-times text-danger"></i>';
												?>
											</span>
											<a class="nav_link"> Profile Photo </a>
										</small>
									</li>

									<li class="list_items pd_bottom_10">
										<small class="d-flex align-items-center">
											<span class="icon_bx">
												<?php
												echo ($docflags['aadharcard'] == 1) ? '<i class=" icon-checked text-success"></i>' : '<i class=" fa fa-times text-danger"></i>';
												?>
											</span>
											<a class="nav_link"> Aadhar Card </a>
										</small>
									</li>

									<li class="list_items pd_bottom_10">
										<small class="d-flex align-items-center">
											<span class="icon_bx">
												<?php
												echo ($docflags['pancard'] == 1) ? '<i class=" icon-checked text-success"></i>' : '<i class=" fa fa-times text-danger"></i>';
												?>
											</span>
											<a class="nav_link"> Pan Card </a>
										</small>
									</li>

									<li class="list_items pd_bottom_10">
										<small class="d-flex align-items-center">
											<span class="icon_bx">
												<?php
												echo ($docflags['lightbill'] == 1) ? '<i class=" icon-checked text-success"></i>' : '<i class=" fa fa-times text-danger"></i>';
												?>
											</span>
											<a class="nav_link"> Address Proof - Light bill </a>
										</small>
									</li>

									<li class="list_items pd_bottom_10">
										<small class="d-flex align-items-center">
											<span class="icon_bx">
												<?php
												echo ($docflags['cancelcheque'] == 1) ? '<i class=" icon-checked text-success"></i>' : '<i class=" fa fa-times text-danger"></i>';
												?>
											</span>
											<a class="nav_link"> Cancel Cheque </a>
										</small>
									</li>

									<li class="list_items pd_bottom_10">
										<small class="d-flex align-items-center">
											<span class="icon_bx">
												<?php
												echo ($docflags['bankstatement'] == 1) ? '<i class=" icon-checked text-success"></i>' : '<i class=" fa fa-times text-danger"></i>';
												?>
											</span>
											<a class="nav_link"> Bank Statement - Last 6 months </a>
										</small>
									</li>

									<?php if($profiledata->cardtype == 21) { ?>
									<li class="list_items pd_bottom_10">
										<small class="d-flex align-items-center">
											<span class="icon_bx">
												<?php
												echo ($docflags['formsixteen'] == 1) ? '<i class=" icon-checked text-success"></i>' : '<i class=" fa fa-times text-danger"></i>';
												?>
											</span>
											<a class="nav_link"> Form 16 </a>
										</small>
									</li>

									<li class="list_items pd_bottom_10">
										<small class="d-flex align-items-center">
											<span class="icon_bx">
												<?php
												echo ($docflags['salaryslip'] == 1) ? '<i class=" icon-checked text-success"></i>' : '<i class=" fa fa-times text-danger"></i>';
												?>
											</span>
											<a class="nav_link"> Salary Slip </a>
										</small>
									</li>
									<?php } ?>

									<?php if($profiledata->cardtype == 22) { ?>
									<li class="list_items pd_bottom_10">
										<small class="d-flex align-items-center">
											<span class="icon_bx">
												<?php
												echo ($docflags['businessproof'] == 1) ? '<i class=" icon-checked text-success"></i>' : '<i class=" fa fa-times text-danger"></i>';
												?>
											</span>
											<a class="nav_link"> Business Proof </a>
										</small>
									</li>

									<li class="list_items pd_bottom_10">
										<small class="d-flex align-items-center">
											<span class="icon_bx">
												<?php
												echo ($docflags['itreturn'] == 1) ? '<i class=" icon-checked text-success"></i>' : '<i class=" fa fa-times text-danger"></i>';
												?>
											</span>
											<a class="nav_link"> IT Return </a>
										</small>
									</li>
									<?php } ?>

								</ul>
							</div>
							<P class="text-danger">Note : All of the above documents are mandatory.</P>
						</div>
					</div>

					<!--===============spacing==============-->
					<div class="pd_bottom_65"></div>
					<!--===============spacing==============-->
				</div>
			</aside>
		</div>
	</div>

</div>
<?php
$this->load->view('subscriptioncustomer/includes/footer.php');
?>
<script>
	$('#user_photo, #user_aadharcard, #user_pancard, #user_lightbill, #user_cheque, #user_bankstatement, #user_formsixteen, #user_salaryslip, #user_businessproof, #user_itreturn').bind('change', function() {
		if (this.files[0].size > 4096000) {
			$(this).val('');
			$.notify({
				message: 'Please upload file less then 4 MB'
			}, {
				type: 'danger'
			});
		}
	});
</script>