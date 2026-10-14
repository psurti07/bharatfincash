<?php
    $this->load->view('customer/includes/header.php');

	if($profiledata->cardtype == 12) {
    	$loantype = "bl";
	}
	else {
		$loantype = "pl";
	}
?>
<div id="content" class="site-content ">
	<section class="default_single_product">
		<!--===============spacing==============-->
		<div class="pd_top_65"></div>
		<!--===============spacing==============-->
		<div class="auto-container">
			<div class="row default_row">
				<div class="col-lg-12">
                	<div class="woocommerce-tabs wc-tabs-wrapper">
						<?php echo form_open('customer/dashboard/acceptlicence', array('id'=>'submitForm1', 'class'=>'form-transparent-grey', 'novalidate'=>'novalidate')); ?>

							<input type="hidden" name="customerid" id="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>

							<h2>License Agreement</h2>
							<p><small>Kindly review the licence terms before using the portal.</small></p>
							<hr/>

							<?php echo $contentdetails->option_value; ?>

							<hr/>
							<p><small>If you accept the terms of the ageement, click "I Agree" to continue.</small></p>

							<div class="form-group pd_top_15 pd_bottom_15">
								<input type="checkbox" aria-required="true" name="agree" id="agree" value="1" required>
								<label for="agree">I accept the terms in the License Agreement.</label>
								<div class="help-block font-small-3"></div>
							</div>

							<div class="form-group">
								<button type="submit" name="submit-btn" id="submit-btn" class="theme_btn">I AGREE</button>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
		<!--===============spacing==============-->
		<div class="pd_bottom_95"></div>
		<!--===============spacing==============-->
	</section>

</div>

<?php
    $this->load->view('customer/includes/footer.php');
?>
