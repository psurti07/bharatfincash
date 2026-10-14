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
						Career
					</div>
				</div>
				</div>
				<div class="col-lg-12">
				<div class="breadcrumbs creote">
					<ul class="breadcrumb m-auto">
						<li>Home</li>
						<li>Pages</li>
						<li class="active">Career</li>
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
	<div class="auto-container">
		<div class="row default_row">
			<!--===============spacing==============-->
			<div class="pd_bottom_70"></div>
			<!--===============spacing==============-->
			<?php
			if(count($openinglist) > 0) {
				echo "<h3>We always strive to bring in stellar individuals for our comprehensive growth!</h3>";
				echo "<p class='pd_bottom_30'>Do you have the zeal to reshape your career? Come, join us!</p>";

				foreach ($openinglist as $row) {
			?>
				<div class="card mr_bottom_20">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<h5><?php echo $row->title; ?></h5>
								<?php echo $row->descriptions; ?>
								<a href="<?php echo site_url('apply/career/'.$row->slug); ?>" class="read_more">Apply Now <span class="icon-right-arrow-long"></span></a>
							</div>
						</div>
					</div>
				</div>
			<?php
				}
			} 
			else {
				echo "<p>Mail your updated CV at info@indcapital.in or Call on +91-98730-80345</p>";
			} ?>
			<!--===============spacing==============-->
			<div class="pd_bottom_60"></div>
			<!--===============spacing==============-->
			</div>
		</div>
	</div>
</div>
<!--===============PAGE CONTENT END==============-->

<?php
    $this->load->view('includes/footer.php');
?>