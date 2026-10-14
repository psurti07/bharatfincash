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
						Career Apply
					</div>
				</div>
				</div>
				<div class="col-lg-12">
				<div class="breadcrumbs creote">
					<ul class="breadcrumb m-auto">
						<li>Home</li>
						<li>Pages</li>
						<li class="active">Career Apply</li>
					</ul>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!----page header----->


<!--===============PAGE CONTENT==============-->
<section class="contact-section">
	<!--===============spacing==============-->
	<div class="pd_top_90"></div>
	<!--===============spacing==============-->
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-7 mb-5 mb-lg-5 mb-xl-0">
			<div class="contact_form_box_all type_one">
				<div class="contact_form_box_inner">
					<div class="contact_form_shortcode">
						<h4><?php echo $jobdetails->title; ?></h4>
						<div class="pd_bottom_15"></div>

						<?php echo form_open_multipart('apply/careerSubmission', array('id' => 'submitForm2', 'class' => 'p-cb background-light', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
						<input type="hidden" name="id" value="<?php echo $jobdetails->id; ?>" class="form-control" required>
						<input type="hidden" name="slug" value="<?php echo $jobdetails->slug; ?>" class="form-control" required>

							<div class="controls">
								<div class="row">
									<div class="col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="firstname">First Name</label>
											<input type="text" aria-required="true" name="firstname" id="firstname" class="form-control"
												required>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="lastname">Last Name</label>
											<input type="text" name="lastname" id="lastname" class="form-control">
										</div>
									</div>

									<div class="col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="mobile">Mobile</label>
											<input type="text" aria-required="true" name="mobile" id="mobile" class="form-control" required
												inputmode="numeric" maxlength="10" data-validation-regex-regex="[0-9]+"
												oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="emailid">Email Id</label>
											<input type="text" aria-required="true" name="emailid" id="emailid" class="form-control"
												required>
										</div>
									</div>

									<div class="col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="city">City</label>
											<input type="text" aria-required="true" name="city" id="city" class="form-control" required>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label for="qualifications">Qualifications</label>
											<input type="text" aria-required="true" name="qualifications" id="qualifications"
												class="form-control" required>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="experience">Experience</label>
											<textarea aria-required="true" name="experience" id="experience" class="form-control"
												required></textarea>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="keyskills">Key Skills</label>
											<textarea aria-required="true" name="keyskills" id="keyskills" class="form-control"
												required></textarea>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="resume">Upload Resume</label>
											<input type="file" aria-required="true" name="resume" id="resume" class="form-control" required
												accept=".doc,.docx,.txt,.pdf">
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group pd_bottom_15">
											<p><small>By submitting the form &amp; proceeding, you agree to the <a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of Use</a> and <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy Policy</a> of Indcapital.in</small></p>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group mg_top apbtn">
											<button type="submit" id="submit-btn2" class="theme_btn">APPLY NOW</button>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group" id="applymessage"></div>
									</div>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
			</div>
			<div class="col-xl-5 col-lg-5 pd_left_30">
				<div class="title_all_box style_one dark_color">
					<div class="title_sections">
						<?php echo $jobdetails->descriptions; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--===============spacing==============-->
	<div class="pd_bottom_90"></div>
	<!--===============spacing==============-->
</section>
<!--===============PAGE CONTENT END==============-->

<?php
$this->load->view('includes/footer.php');
?>

<script type="text/javascript">
	$(function () {
		$('#submitForm2').on('submit', function (e) {
			e.preventDefault();
			var formData = new FormData($(this)[0]);

			$.ajax({
				url: $(this).attr('action'),
				type: "POST",
				data: formData,
				async: true,
				dataType: "JSON",
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function () {
					$('#submit-btn2').html('Document uploading... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
					$('#submit-btn2').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						document.getElementById("submitForm2").reset();
					}

					document.getElementById("applymessage").innerHTML = response['message'];
					$.notify({ message: response['message'] }, { type: 'success' });
					$('#submit-btn2').html('APPLY NOW');
					$('#submit-btn2').attr('disabled', false);
				},
				error: function (jXHR, textStatus, errorThrown) {
					$('#submit-btn2').html('APPLY NOW');
					$('#submit-btn2').attr('disabled', false);
					$.notify({ message: errorThrown }, { type: 'danger' });
				}
			});
		});
	});
</script>
