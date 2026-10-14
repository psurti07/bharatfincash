<?php
$this->load->view('includes/header.php');
?>

<!----page header----->
<div class="page_header_default style_one">
	<div class="parallax_cover">
		<img src="<?php echo base_url('assets/images/slider/aboutus1.png'); ?>"  alt="bg_image" class="cover-parallax">
	</div>
	<div class="page_header_content">
		<div class="auto-container">
			<div class="row">
				<div class="col-md-12">
				<div class="banner_title_inner">
					<div class="title_page">
						Contact Us
					</div>
				</div>
				</div>
				<div class="col-lg-12">
				<div class="breadcrumbs creote">
					<ul class="breadcrumb m-auto">
						<li>Home</li>
						<li>Pages</li>
						<li class="active">Contact Us</li>
					</ul>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!----page header----->

<section class="contact-section">
	<!--===============spacing==============-->
	<div class="pd_top_90"></div>
	<!--===============spacing==============-->
	<div class="container">
		<div class="row">
			
			<div class="col-xl-6 col-lg-6 pd_left_30">
				<div class="title_all_box style_one dark_color">
					<div class="title_sections left">
						<h4>Get in touch</h4>
					</div>
				</div>
				<!--===============spacing==============-->
				<div class="pd_bottom_15"></div>
				<!--===============spacing==============-->

				<div class="contact_box_content style_one">
					<div class="contact_box_inner icon_yes">
						<div class="icon_bx">
							<span class=" icon-placeholder"></span>
						</div>
						<div class="contnet">
							<h3> Registered Office </h3>
							<p><?php echo COMPANY_ADDRESS; ?></p>
						</div>
					</div>
				</div>
				<!--===============spacing==============-->
				<div class="pd_bottom_15"></div>
				<!--===============spacing==============-->

				<div class="contact_box_content style_one">
					<div class="contact_box_inner icon_yes">
						<div class="icon_bx">
							<span class=" icon-user"></span>
						</div>
						<div class="contnet">
							<h3> Legal Name </h3>
							<p>GROWQUIK SERVICES PRIVATE LIMITED</p>
						</div>
					</div>
				</div>
				<!--===============spacing==============-->
				<div class="pd_bottom_15"></div>
				<!--===============spacing==============-->
				<div class="contact_box_content style_one">
					<div class="contact_box_inner icon_yes">
						<div class="icon_bx">
							<span class="icon-phone-call"></span>
						</div>
						<div class="contnet">
							<h3> Customer Support </h3>
							<p><?php echo COMPANY_MOBILE; ?></p>
						</div>
					</div>
				</div>
				<!--===============spacing==============-->
				<div class="pd_bottom_15"></div>
				<!--===============spacing==============-->
				<div class="contact_box_content style_one">
					<div class="contact_box_inner icon_yes">
						<div class="icon_bx">
							<span class="fa fa-envelope"></span>
						</div>
						<div class="contnet">
							<h3> Reach Us </h3>
							<p><?php echo COMPANY_EMAIL; ?></p>
						</div>
					</div>
				</div>
				<!--===============spacing==============-->
				<div class="pd_bottom_40"></div>
				<!--===============spacing==============-->
				<div class="social_media_v_one style_two">
					<ul>
						<li>
							<a href="<?php echo SM_FACEBOOK; ?>"> <span class="fa fa-facebook"></span>
							<small>Facebook</small>
							</a>
						</li>
						<li>
							<a href="<?php echo SM_INSTAGRAM; ?>"> <span class="fa fa-instagram"></span>
							<small>Instagram</small>
							</a>
						</li>
						<li>
							<a href="<?php echo SM_PINTEREST; ?>"> <span class="fa fa-pinterest"></span>
							<small>Pinterest</small>
							</a>
						</li>
						<li>
							<a href="<?php echo SM_TWITTER; ?>"> <span class="fa fa-twitter"></span>
							<small>Twitter</small>
							</a>
						</li>
						<li>
							<a href="<?php echo SM_LINKEDIN; ?>"> <span class="fa fa-linkedin"></span>
							<small>Linkedin</small>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-xl-6 col-lg-6 mb-5 mb-lg-5 mb-xl-0">
				<div class="contact_form_box_all type_one">
					<div class="contact_form_box_inner">
						<div class="contact_form_shortcode">
							<?php echo form_open('infopage/contactsubmission', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="do" value="contactsubmission" class="form-control" required>

							<div class="controls">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="fullname">Full Name *</label>
											<input type="text" aria-required="true" name="fullname" class="form-control" required>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="email">Mobile no *</label>
											<input type="text" aria-required="true" name="mobile" class="form-control" required
												oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="email">Email id *</label>
											<input type="email" aria-required="true" name="email" class="form-control" required>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="subject">Subject</label>
											<input type="text" name="subject" class="form-control">
										</div>
									</div>
								
									<div class="col-sm-12">
										<div class="form-group">
											<label for="message">Message *</label>
											<textarea name="message" rows="5" aria-required="true" class="form-control" required></textarea>
											<div class="help-block font-small-3"></div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group mb-0">
											<div class="custom-control custom-checkbox" style="margin-left: 10px;">
												<input type="checkbox" name="terms" id="terms" class="custom-control-input"
													value="1" style="display:inline-flex;margin: 0px !important; width:unset" checked required>
												<label class="custom-control-label" for="terms" style="display:unset;"><small>I &amp; agree with <a
															href="<?php echo site_url('terms-conditions'); ?>"
															target="_blank">Terms of Use</a> and <a
															href="<?php echo site_url('privacy-policy'); ?>"
															target="_blank">Privacy Policy</a> of Indcapital.</small></label>
												<div class="help-block font-small-3"></div>
											</div>
										</div>
									</div>
									<div class="col-sm-12">

										<div class="form-group mb-2">
											<div class="custom-control custom-checkbox" style="margin-left: 10px;">
												<input type="checkbox" name="promotion" id="promotion"
													class="custom-control-input" style="display:inline-flex;width:unset;margin: 0px !important" value="1" checked
													required>
												<label class="custom-control-label" for="promotion"
													style="display:unset;"><small>I agree to receive promotional & informational
														communications from Indcapital through Emails, calls or SMS, RCS
														Services.</small></label>
												<div class="help-block font-small-3"></div>
											</div>
										</div>
									</div>
									
									<div class="col-sm-12">
										<div class="form-group mg_top apbtn">
											<button class="btn btn-primary" type="submit">Send Message</button>
										</div>
									</div>

									<div id="response"></div>
								</div>
							</div>
						<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--===============spacing==============-->
	<div class="pd_top_70"></div>
	<!--===============spacing==============-->
</section>


<section class="no-padding">
	<iframe
		src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.053545485711!2d72.82473351493601!3d21.22972518588993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf23eacf0493827e4!2zMjHCsDEzJzQ3LjAiTiA3MsKwNDknMzYuOSJF!5e0!3m2!1sen!2sin!4v1663218408001!5m2!1sen!2sin"
		width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>

<?php
$this->load->view('includes/footer.php');
?>


<script type="text/javascript">
	$(function () {
		$('#submitForm').on('submit', function (e) {
			e.preventDefault();

			$.ajax({
				url: $(this).attr('action') || window.location.pathname,
				type: "POST",
				data: new FormData(this),
				dataType: "JSON",
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function () {
					$('#submit-btn').html("submiting...");
					$('#submit-btn').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						$.notify({ message: response['message'] }, { type: 'success' });
						$('#submitedmessage').html(response['message']);
						location.reload(2000);
					}
					else {
						$.notify({ message: response['message'] }, { type: 'danger' });
					}
				},
				error: function (jXHR, textStatus, errorThrown) {
					$.notify({ message: errorThrown }, { type: 'danger' });
				}
			});
		});
	});
</script>
