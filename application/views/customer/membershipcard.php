<?php
    $this->load->view('customer/includes/header.php');

    if($carddata->cardtype == 12) {
    	$cardname = 'Business Loan Plan';
    }
    else {
    	$cardname = 'Personal Loan Plan';
    }
?>

<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">

<section class="service-section">
	<!--===============spacing==============-->
	<div class="pd_top_90"></div>
	<!--===============spacing==============-->
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="service_box style_two dark_color">
				<div class="service_content_two ">
					<div class="content_inner">
						<h2>Plans Details</h2>
						<div class="pd_bottom_20"></div>
						<p class="text-dark "><strong>Ful name : </strong> <?php echo $carddata->fullname; ?></p> 
						<p class="text-dark "><strong>Plan : </strong> <?php echo $cardname ?> </p> 
						<p class="text-dark "><strong>Registration Date :</strong> <?php echo date('d/m/Y', strtotime($carddata->registration_date)); ?></p>
						<p class="text-dark "><strong>Expiry Date :</strong> <?php echo date('d/m/Y', strtotime($carddata->expiry_date)); ?></p> 
						<p class="text-dark "><strong>Plan Id : </strong> <?php echo chunk_split($carddata->card_number, 4, ' '); ?> </p>

						<a href="<?php echo site_url('customer/profile/invoice/' . stringCrypt($carddata->id, 'encrypt')); ?>" target="_blank" class="theme-btn one">Download Invoice</a>
					</div>
				</div>
				</div>
				
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="service_box style_two dark_color">
				<div class="service_content_two ">
					<div class="content_inner">
						<h5>Plan Benefits</h5>
						<div class="pd_bottom_20"></div>
						<ul>
							<li>Consultation Process in Multiple NBFCs</li>
							<li>100% Online Financial Consultation</li>
							<li>Access Personalized Tracking Portal</li>
							<li>Dedicated Expert Assigned</li>
							<li>Subscription Plans Validity: 3 months</li>
						</ul>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!--===============spacing==============-->
	<div class="pd_bottom_90"></div>
	<!--===============spacing==============-->
</section>



	

</div>
<!--===============PAGE CONTENT END==============-->
<?php
    $this->load->view('customer/includes/footer.php');
?>
