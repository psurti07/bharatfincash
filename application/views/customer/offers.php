<?php
    $this->load->view('customer/includes/header.php');

    $pllink = $bllink = "#";

    if($profiledata->cardtype == 11) {
    	$pllink = site_url('customer/digital/personalLoan');
    	$bllink = site_url('digital/businessLoan');
    }
    else if($profiledata->cardtype == 12) {
    	$pllink = site_url('digital/personalLoan');
    	$bllink = site_url('customer/digital/businessloan');
    }
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
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-4 mb-xl-0">
						<div class="icon_box_all style_three dark_color_one">
							<div class="icon_content ">
							<div class="icon">
								<span class="fa fa-user "></span>
							</div>
							<div class="txt_content">
								<h3>Personal Loan</h3>
								<div class="btn_center pd_top_20">
									<a href="<?php echo $pllink; ?>" rel="nofollow" class="theme-btn one">Re-Apply Now</a>
								</div>
							</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-4 mb-xl-0">
						<div class="icon_box_all style_three dark_color_one">
							<div class="icon_content ">
							<div class="icon">
								<span class="fa fa-bank "></span>
							</div>
							<div class="txt_content">
								<h3>Business Loan</h3>
								<div class="btn_center pd_top_20">
									<a href="<?php echo $bllink; ?>" target="_blank" rel="nofollow" class="theme-btn one">Re-Apply Now</a>
								</div>
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
    $this->load->view('customer/includes/footer.php');
?>