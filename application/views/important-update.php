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
						Important Update
					</div>
				</div>
				</div>
				<div class="col-lg-12">
				<div class="breadcrumbs creote">
					<ul class="breadcrumb m-auto">
						<li>Home</li>
						<li>Pages</li>
						<li class="active">Important Update</li>
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
			if(count($noteslist) > 0) {
				foreach ($noteslist as $row) {
			?>
				<div class="card mr_bottom_20">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<div class="title_all_box style_three dark_color">
									<div class="title_sections three">
										<div class="before_title fw-light"><?php echo $row->tags; ?> 
										<small class="text-warning">(<?php echo displayDate($row->rec_date); ?>)</small></div>
										<div class="pd_bottom_10"></div>
										<?php echo $row->descriptions; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
				}
			} 
			else {
				echo "<p class='text-center'><strong>No update as of now!</strong></p>";
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