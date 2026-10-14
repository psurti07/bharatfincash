<?php
$this->load->view('includes/header-apply.php');
?>
<div id="content" class="site-content bg-white">
	<section class="">
		<div class="auto-container" style="min-height: 100vh;">
			<div class="row default_row">
				<div id="primary" class="content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
				<main id="main" class="site-main" role="main">
					<!--===============spacing==============-->
					<div class="pd_top_25"></div>
					<!--===============spacing==============-->
					
					<?php echo form_open('digital/userApply', array('id' => 'submitForm1', 'class' => 'checkout woocommerce-checkout', 'novalidate' => 'novalidate')); ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="woocommerce-billing-fields">
								<h3><?php echo $userdetails['loanname']; ?></h3>
								<p class="pd_bottom_20"> Fill Your Details To Get Pre-Approved Loan Offer From Our NBFC Partners</p>
								
								<input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>" class="form-control" required>

                        <?php echo form_open('digital/userApply', array('id' => 'submitForm1', 'class' => 'checkout woocommerce-checkout', 'novalidate' => 'novalidate')); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="woocommerce-billing-fields">
                                    
                                    <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                                        class="form-control" required>

                                    <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                                        class="form-control" required>

                                    <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                                        class="form-control" required>

                                    <div class="woocommerce-billing-fields__field-wrapper">
									<div class="">
										<div class="form-group">
											<label for="">Cibil Score <abbr class="required" title="required">*</abbr></label>
											<select name="cibilscore" id="cibilscore" class="state_select select2-hidden-accessible" data-placeholder="Select Score" aria-hidden="true" required>
												<option value="">Select Score</option>
												<option value="650 - 700">650 - 700</option>
												<option value="700 - 750">700 - 750</option>
												<option value="750 - 800">750 - 800</option>
												<option value="800 - 850">800 - 850</option>
												<option value="850 - 900">850 - 900</option>
											</select>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="">
										<div class="form-group">
											<label>Monthly Income <abbr class="required" title="required">*</abbr></label>
											<input type="text" aria-required="true" name="monincome" id="monincome" class="form-control" required inputmode="numeric" data-validation-regex-regex="[0-9]+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="">
										<div class="form-group">
											<label>Monthly EMI You are Already Paying <abbr class="required" title="required">*</abbr></label>
											<input type="text" aria-required="true" name="monemi" id="monemi" class="form-control" required inputmode="numeric" data-validation-regex-regex="[0-9]+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="">
										<div class="form-group">
											<label for="">Loan Purpose <abbr class="required" title="required">*</abbr></label>
											<select name="loanpurpose" id="loanpurpose" class="state_select select2-hidden-accessible" data-placeholder="Select Loan Purpose" aria-hidden="true" required>
											<?php if($userdetails['loantype'] == 11){ ?>
												<option value="">Select Loan Purpose</option>
												<option value="Personal Use">Personal Use</option>
												<option value="Property Renovation">Property Renovation</option>
												<option value="Marriage Purpose">Marriage Purpose</option>
												<option value="Education Purpose">Education Purpose</option>
												<option value="Medical Emergency">Medical Emergency</option>
												<option value="Other">Other</option>
												<?php } else {?>
													<option value="Business Expansion">Business Bxpansion</option>
													<option value="Property Renovation">Property Renovation</option>
													<option value="Marriage Purpose">Marriage Purpose</option>
													<option value="Education Purpose">Education Purpose</option>
													<option value="Medical Emergency">Medical Emergency</option>
													<option value="Other">Other</option>
												<?php } ?>
											</select>
											<div class="help-block font-small-3"></div>
										</div>
									</div>
									<!--<div class="">
										<div class="form-group">
											<label>Preferred Date & Time <abbr class="required"
													title="required">*</abbr></label>
											<input type="datetime-local" aria-required="true"
												name="preferred_datetime" id="myDateTime" class="form-control"
												required>
											<div class="help-block font-small-3"></div>
										</div>
									</div>-->

									
                                        <div class="">
                                            <div class="form-group">
                                                <label>Pincode <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" aria-required="true" name="pincode" id="pincode"
                                                    class="form-control" required inputmode="numeric" minlength="6"
                                                    maxlength="6">
                                                <div class="help-block font-small-3"></div>
                                                <p class="pincode error text-danger text-start"></p>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="form-group">
                                                <label>City <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" aria-required="true" name="city" id="city"
                                                    class="form-control" required readonly>
                                                <div class="help-block font-small-3"></div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="form-group">
                                                <label>State <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" aria-required="true" name="state" id="state"
                                                    class="form-control" required readonly>
                                                <div class="help-block font-small-3"></div>
                                            </div>
                                        </div>
										
                                        <p><button type="submit" id="form-submit1"
                                                class="wpcf7-form-control has-spinner wpcf7-submit custom-btn">CHECK
                                                YOUR ELIGIBILITY</button></p>
				
												<?php echo form_close(); ?>

                        <!--===============spacing==============-->
                        <div class="pd_bottom_45"></div>
                        <!--===============spacing==============-->
                    </main>
                </div>
				<aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12 pt-5 pe-0 ps-0">
                    <div class="service_siderbar side_bar pe-0 me-0">
                        <div class="widgets_grid_box">
                            <div class="widget creote_widget_service_list">
                                <h4 class="widget-title">Customer Info</h4>
                                <ul class="">
                                    <li><strong>Name : </strong> <span
                                            class="text-end"><?php echo $userdetails['fullname']; ?></span> </li>

                                    <li><strong>Mobile no : </strong> <span
                                            class="text-end"><?php echo $userdetails['mobile']; ?></span> </li>

                                    <li><strong>Loan Amount : </strong> <span class="text-end">₹
                                            <?php echo formatePriceIndia($userdetails['loanamount']); ?></span> </li>
                                </ul>

                                <!--===============spacing==============-->
                                <div class="pd_bottom_25"></div>
                                <!--===============spacing==============-->

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
                                        <i class="fa fa-check"></i> Plan Validity: 3 months
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
</div>
<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
$(function() {
    $('#submitForm1').on('submit', function(e) {
        $('#form-submit1').attr('disabled', true);
        $('#form-submit1').html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...'
            );
    });
});
</script>

<script>
document.getElementById('myDateTime').addEventListener('click', function() {
    this.showPicker();
});
</script>
<script>
$('#pincode').on('input', function() {

    var pincode = $(this).val();

    if (pincode.length === 6) {

        $.ajax({
            url: "<?= base_url('digital/geoLocation') ?>",
            type: "POST",
            data: {
                pincode: pincode
            },
            dataType: "json",

            success: function(response) {

                if (response.status === 'success') {
                    $('#city').val(response.city);
                    $('#state').val(response.state);
                    $('.pincode').text('');
                } else {
                    $('#city').val('');
                    $('#state').val('');
                    $('.pincode').text('Enter valid pincode.');
                }
            },

            error: function() {
                $('.pincode').text('Enter valid pincode.');
            }
        });

    } else {
        $('#city').val('');
        $('#state').val('');
    }
});
</script>