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
						Privacy Policy
					</div>
				</div>
				</div>
				<div class="col-lg-12">
				<div class="breadcrumbs creote">
					<ul class="breadcrumb m-auto">
						<li>Home</li>
						<li>Pages</li>
						<li class="active">Privacy Policy</li>
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
				<div class="col-xl-12 col-lg-12 ">
					<div class="about_content position-relative z_99">
						<!--===============spacing==============-->
						<div class="pd_bottom_10"></div>
						<!--===============spacing==============-->
						<?php
							echo $contentdetails->option_value;
						?>
						<!--===============spacing==============-->
						<div class="pd_bottom_25"></div>
						<!--===============spacing==============-->
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