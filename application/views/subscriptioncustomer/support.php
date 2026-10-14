<?php
    $this->load->view('subscriptioncustomer/includes/header.php');
?>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
	<div class="container">
		<div class="row default_row">
			<div class="full_width_box">
				<!--===============spacing==============-->
				<div class="pd_top_80"></div>
				<!--===============spacing==============-->

				<section class="creote-icon-box">
				<div class="row">
					<div class="col-xl-7 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-4 mb-xl-0">
					<section class="contact_form_box_all type_two">
						<div class="contact_form_box_inner">
							<div class="contact_form_shortcode">
								<div class="heading">
									<h2>Raise a request</h2>
								</div>
								<div class="_form">
									<div role="form" class="wpcf7">
									
									<?php echo form_open('subscriptioncustomer/support/submitrequest', array('id' => 'submitForm', 'class' => 'wpcf7-form init', 'novalidate' => 'novalidate')); ?>
										<input type="hidden" name="userid" value="<?php echo $userid; ?>" class="form-control" required>

											<p class="form-row address-field validate-required validate-state form-row-wide" id="#">
												<select name="issuetype" id="issuetype" class="state_select select2-hidden-accessible" data-placeholder="Select an option…" data-input-classes="" data-label="State" tabindex="-1" aria-hidden="true">
													<option selected="">Query Related To</option>
													<option value="Service Problem">Service Problem</option>
													<option value="Payment Issue">Payment Issue</option>
													<option value="Technical Problem">Technical Problem</option>
													<option value="Eligibility or Pre-Approval Query">Eligibility or Pre-Approval Query</option>
													<option value="GST Return Query">GST Return Query</option>
													<option value="Other">Other</option>
												</select>
											</p>

											<div class="form-group">
												<p><span class="wpcf7-form-control-wrap your-message"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-require" aria-required="true" aria-invalid="false" placeholder="Enter Your Message"></textarea></span></p>
											</div>
										
										<button type="submit" id="submit-btn" class="wpcf7-form-control has-spinner wpcf7-submit">Submit</button>
									<?php echo form_close(); ?> 
									</div>
								</div>
							</div>
						</div>
						</section>
					</div>

					<div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-4 mb-xl-0">
						<div class="service_box style_two dark_color">
							<div class="service_content_two ">
								<div class="content_inner">
									<h5><?php echo COMPANY_NAME ?></h5>
									<div class="pd_bottom_20"></div>
									<ul>
										<li>Mo. : <?php echo COMPANY_MOBILE ?></li>
										<li>Email : <?php echo COMPANY_EMAIL ?></li>
										<li>GST No. : <?php echo COMPANY_GST ?></li>
										<li>CIN No. : <?php echo COMPANY_CIN ?></li>
										<li>Address : <?php echo COMPANY_ADDRESS ?></li>
										<li>Timing : <?php echo COMPANY_TIMING ?></li>
									</ul>

									 <hr/><p class="text-warning"><small>Our customer service experts are here for you. Lines are open Mon-Sat from 10:00am - 5:00pm</small></p>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
				</section>

				<!--===============spacing==============-->
				<div class="pd_bottom_50"></div>
				<!--===============spacing==============-->
			</div>
		</div>
	</div>
</div>

<?php
    $this->load->view('subscriptioncustomer/includes/footer.php');
?>

<script type="text/javascript">
	$(function(){
      $('#submitForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url : $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: $(this).serialize(),
                dataType: "JSON",
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#form-submit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> SUBMITTING...');
                    $('#form-submit').attr('disabled', true);
                },
                success: function (response) {
                  if(response['success'] == true) {
                      $.notify({ message: response['message'] },{ type: 'success' });
                      setTimeout(function() {
                         location.reload();
                      }, 2000);
                  }
                   else {
                    $.notify({ message: response['message'] },{ type: 'danger' });
                  }
				  $('#form-submit').html('Submit Request');
				  $('#form-submit').attr('disabled', false);
                },
                error: function (jXHR, textStatus, errorThrown) {
                    $('#form-submit').html('Submit Request');
                    $('#form-submit').attr('disabled', false);
                    $.notify({ message: errorThrown },{ type: 'danger' });
                }
            });
      });
  });
</script>