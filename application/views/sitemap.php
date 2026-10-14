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
						Sitemap
					</div>
				</div>
				</div>
				<div class="col-lg-12">
				<div class="breadcrumbs creote">
					<ul class="breadcrumb m-auto">
						<li>Home</li>
						<li>Pages</li>
						<li class="active">Sitemap</li>
					</ul>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!----page header----->

<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
	<!---about--->
	<section class="about-section">
		<!--===============spacing==============-->
		<div class="pd_top_90"></div>
		<!--===============spacing==============-->
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 ">
					<div class="about_content position-relative z_99">
						<h6 class="pd_bottom_10">Company Pages</h6>
						<ol class="unordered-list bullet-primary">
							<li><a href="<?php echo site_url(); ?>" class="hover link-body">Home</a></li>
							<li><a href="<?php echo site_url('company'); ?>" class="hover link-body">Company</a></li>
							<li><a href="<?php echo site_url('contact'); ?>" class="hover link-body">Contact Us</a></li>
							<li><a href="<?php echo site_url('career'); ?>" class="hover link-body">Career</a></li>
							<li><a href="<?php echo site_url('faqs'); ?>" class="hover link-body">FAQs</a></li>
							<li><a href="<?php echo site_url('loan/calculator'); ?>" class="hover link-body">Loan EMI Calculator</a></li>
							<li><a href="<?php echo site_url('important-update'); ?>" class="hover link-body">Important Update</a></li>
							<li><a href="<?php echo site_url('privacy-policy'); ?>" class="hover link-body">Privacy Policy</a></li>
							<li><a href="<?php echo site_url('refund-policy'); ?>" class="hover link-body">Cancellation & Refund Policy</a></li>
							<li><a href="<?php echo site_url('disclaimer'); ?>" class="hover link-body">Disclaimer</a></li>
							<li><a href="<?php echo site_url('terms-conditions'); ?>" class="hover link-body">Terms & Conditions</a></li>
							<li><a href="<?php echo site_url('raise-request'); ?>" class="hover link-body">Raise a request</a></li>
						</ol>
					</div>
				</div>

        		<div class="col-xl-6 col-lg-6 ">
					<div class="about_content position-relative z_99">
						<h6 class="pd_bottom_10">Product</h6>
						<ol class="unordered-list bullet-primary">
							<li><a href="<?php echo site_url('personal-loan-plan'); ?>" class="hover link-body">Personal Loan Plan</a></li>
							<li><a href="<?php echo site_url('business-loan-plan'); ?>" class="hover link-body">Business Loan Plan</a></li>
						</ol>


						<h6 class="pd_bottom_10">Apply Now</h6>
						<ol class="unordered-list bullet-primary">
							<li><a href="<?php echo site_url('digital/personalLoan'); ?>" class="hover link-body">Personal Loan</a></li>
							<li><a href="<?php echo site_url('digital/businessLoan'); ?>" class="hover link-body">Business Loan</a></li>
						</ol>
            
						<h6 class="pd_bottom_10">Login</h6>
						<ol class="unordered-list bullet-primary">
							<li><a href="<?php echo site_url('customer'); ?>" class="hover link-body">Customer Login</a></li>
						</ol>  
					</div>
				</div>
			</div>
		</div>
		<!--===============spacing==============-->
		<div class="pd_bottom_70"></div>
		<!--===============spacing==============-->
	</section>
	<!---about end--->
</div>
<!--===============PAGE CONTENT END==============-->

<?php
    $this->load->view('includes/footer.php');
?>