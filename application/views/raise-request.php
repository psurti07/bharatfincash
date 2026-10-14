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
						Raise a Request
					</div>
				</div>
				</div>
				<div class="col-lg-12">
				<div class="breadcrumbs creote">
					<ul class="breadcrumb m-auto">
						<li>Home</li>
						<li>Pages</li>
						<li class="active">Raise a Request</li>
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
						<?php echo form_open('support/raiserequest', array('id'=>'submitForm', 'class'=>'form-transparent-grey', 'novalidate'=>'novalidate')); ?>

							<div class="controls">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="">I am a,</label>
											<select name="usertype" id="usertype" class="" class="state_select select2-hidden-accessible" data-placeholder="Select User Type" aria-hidden="true" required>
												<option value="">Select User Type</option>
												<option value="1">Customer</option>
												<option value="2">Guest User</option>
											</select>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="fullname">Full Name *</label>
											<input type="text" aria-required="true" name="fullname" id="fullname" class="form-control" placeholder="John Doe" required>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="mobile">Mobile no *</label>
											<input type="text" aria-required="true" name="mobile" id="mobileno"
											class="form-control" placeholder="Mobile Numer"
											inputmode="numeric" required size="40" maxlength="10" minlength="10"
											data-validation-regex-regex="^[6789]\d{9}$"
											oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></span>
										<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="email">Email id *</label>
											<input type="email" aria-required="true" name="email" id="email" class="form-control" placeholder="john@domain.com" required>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="cno">Card Number</label>
											<input type="text" name="cardnumber" id="cardnumber" class="form-control" placeholder="9876 5432 1012 3456" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="">Query Related To</label>
											<select name="requestreason" id="requestreason" class="state_select select2-hidden-accessible" data-placeholder="Select Issue" aria-hidden="true" required>
												<option value="">Select Issue</option>
												<option value="Service Problem">Service Problem</option>
												<option value="Payment Issue">Payment Issue</option>
												<option value="Technical Problem">Technical Problem</option>
												<option value="Eligibility or Pre-Approval Query">Eligibility or Pre-Approval Query</option>
												<option value="Other">Other</option>
											</select>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<label for="message">Request Message</label>
											<textarea aria-required="true" name="message" id="message" class="form-control" placeholder="Request message in minimum 60 characters" required="" minlength="60" required></textarea>
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
											<button type="submit" name="submit-btn" id="submit-btn" class="theme_btn">APPLY NOW</button>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group" id="submitedmessage"></div>
									</div>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
			</div>
			<div class="col-xl-5 col-lg-5 pd_left_30">
				<h4>Common FAQs</h4>
				<!--===============spacing==============-->
				<div class="pd_bottom_30"></div>
				<!--===============spacing==============-->
				<section class="faq_section type_one">
					<div class="block_faq">
						<div class="accordion">
							<dl>
								<dt class="faq_header active">
									<span class="icon-help"></span> I did the payment by mistake and I do not wish to take company services. Can I request a refund?
								</dt>
								<dd class="accordion-content hide" style="display:block;">
									<p>In this case, we request you to call the company on +91-98730-80345 between 10 AM to 5 PM – Monday to Saturday (business days only) – and discuss the matter.</p>
								</dd>

								<dt class="faq_header ">
									<span class="icon-help"></span> Who is eligible to get a GST Return?
								</dt>
								<dd class="accordion-content hide">
									<p>Some of the likely purposes for which a personal loan can be used are Shopping, Home Renovation, Higher Education, Debt Consolidation, Tour Travel, Wedding, Medical emergency, etc.</p>
								</dd>

								<dt class="faq_header ">
									<span class="icon-help"></span> What should I do if I am not satisfied with the company's services?
								</dt>
								<dd class="accordion-content hide">
									<p>In this case, we request you to call the company on +91-98730-80345 between 10 AM to 5 PM – Monday to Saturday (business days only) – and discuss the matter.</p>
								</dd>

								<dt class="faq_header ">
									<span class="icon-help"></span> What should I do if my account is not created even after the payment is done?
								</dt>
								<dd class="accordion-content hide">
									<p>It might happen that your amount is on hold with the payment gateway and is still not credited to the company's account. Kindly do not worry, your account will be created once the amount is credited to the company's account – and you will be timely informed. Or, the payment gateway will refund the amount to your account according to their rules and regulations.</p>
								</dd>

								<dt class="faq_header ">
									<span class="icon-help"></span> I'm not willing to take the company's services. Can I request a refund?
								</dt>
								<dd class="accordion-content hide">
									<p>In this case, we request you to call the company on +91-98730-80345 between 10 AM to 5 PM – Monday to Saturday (business days only) – and discuss the matter.</p>
								</dd>
							</dl>
						</div>
					</div>
				</section>
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
  $(function(){
      $('#submitForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url : $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#submit-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...');
					$('#submit-btn').attr('disabled', true);
                },
               	success: function (response) {
              		if(response['success'] == true) {
				  		$.notify({ message: response['message'] },{ type: 'success' });
					}
			  		else {
				  		$.notify({ message: response['message'] },{ type: 'danger' });
			  		}

			  		$('#submitedmessage').html(response['message']);

			  		setTimeout(function() {
		               location.reload();
		            }, 10000);
            	},
            	error: function (jXHR, textStatus, errorThrown) {
                	$.notify({ message: errorThrown },{ type: 'danger' });
            	}
            });
        });
  });
</script>
