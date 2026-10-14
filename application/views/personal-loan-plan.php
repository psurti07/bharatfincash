<?php
    $this->load->view('includes/header.php');
?>
<!----page header----->
<div class="page_header_default style_one ">
	<div class="parallax_cover">
		<img src="<?php echo base_url('assets/images/slider/aboutus1.png'); ?>"  alt="bg_image" class="cover-parallax">
	</div>
	<div class="page_header_content">
		<div class="auto-container">
			<div class="row">
				<div class="col-md-12">
				<div class="banner_title_inner">
					<div class="title_page">
						Personal Subscription
					</div>
				</div>
				</div>
				<div class="col-lg-12">
				<div class="breadcrumbs creote">
					<ul class="breadcrumb m-auto">
						<li>Home</li>
						<li>Product</li>
						<li class="active">Personal Subscription</li>
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
	<main id="main" class="site-main" role="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
				<section class="product_shop_section two_column product_wrapper_grid style_one">
					<!--===============default spacing==============-->
					<div class="pd_top_40"></div>
					<!--===============default spacing==============-->
					<div class="grid_show_case grid_layout clearfix">
						<div class="project-wrapper grid_box">
							<div class="title_all_box style_one text-left dark_color">
								<div class="pd_top_50 pd_bottom_15">
									<h2>Super-Key To Unlock Expert Financial Consultation For Your Future Enhancement</h2>
								</div>
							</div>
							<div class="description_box">
								<p>Gear up to experience some top-notch financial guidance for your tomorrow to get much better, stable, and secure – Let’s Go! </p>
							</div>
							<!--===============default spacing==============-->
							<div class="pd_bottom_20"></div>
							<!--===============default spacing==============-->
						</div>
						
						<div class="project-wrapper grid_box">
							<div class="price_plan_box style_one ">
								<div class="inner_box">
									<div class="top">
									<h2>Personal Subscription</h2>
									<p>Personal Financial Consultation</p>
									</div>

									<div class="mid">
									<?php
									if ($productdata->offeramount != 0) {
										echo '<p><del class="text-danger">₹ ' . formatePriceIndia($productdata->amount) . '</del></p>';
										echo '<h4>₹ ' . formatePriceIndia($productdata->offeramount) . '</h4>';
									} else {
										echo '<h4>₹ ' . formatePriceIndia($productdata->amount) . '</h4>';
									}
									?>
									</div>
									
									<div class="bottom">
									<ul>
										<li>
											<span> Consultation Process in Multiple NBFCs</span>
											<i class="fa fa-check"></i>
										</li>
										<li>
											<span> 100% Online Financial Consultation</span>
											<i class="fa fa-check"></i>
										</li>
										<li>
											<span> Access Personalized Tracking Portal</span>
											<i class="fa fa-check"></i>
										</li>
										<li>
											<span> Dedicated Expert Assigned</span>
											<i class="fa fa-check"></i>
										</li>
										
										<li>
											<span>Plan Validity: 9 months</span>
											<i class="fa fa-check"></i>
										</li>
										
									</ul>
									<a href="<?php echo site_url('digital/personalLoan'); ?>" target="_blank" rel="nofollow" class="theme-btn two">Get Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--===============default spacing==============-->
					<div class="pd_bottom_50"></div>
					<!--===============default spacing==============-->
				</section>
				
				</div>
			</div>
		</div>
	</main>


	<!---card-benifits-start---->
	<section class="tab-section bg_light_1" >
	<!--===============spacing==============-->
		<div class="pd_top_80"></div>
	<!--===============spacing==============-->
		<div class="container">
			<div class="title_all_box style_one text-center dark_color">
				<div class="title_sections">
					<h2 class="title ">Quick Route To Your Personal Loan – How It Works?</h2>
				</div>
				<!--===============spacing==============-->
				<div class="pd_bottom_50"></div>
				<!--===============spacing==============-->
			</div>

			<div class="row">
			<div class="tabs_all_box  tabs_all_box_start type_one">
				<div class="tab_over_all_box">
					<div class="tabs_header clearfix">
						<ul class="showcase_tabs_btns nav-pills nav   clearfix">
						<li class="nav-item">
							<a class="s_tab_btn nav-link active" data-tab="#tabtabone">100% Paperless Loan Process</a>
						</li>
						<li class="nav-item">
							<a class="s_tab_btn nav-link" data-tab="#tabtabtwo">Personal Financial Consultation</a>
						</li>
						<li class="nav-item">
							<a class="s_tab_btn nav-link" data-tab="#tabtabthree">Loan Self-Apply Feature</a>
						</li>
						<li class="nav-item">
							<a class="s_tab_btn nav-link" data-tab="#tabtabtfour">Instant Personal Loan Process</a>
						</li>
						<li class="nav-item">
							<a class="s_tab_btn nav-link" data-tab="#tabtabfive">Personalised Updates Portal</a>
						</li>
						<li class="nav-item">
							<a class="s_tab_btn nav-link" data-tab="#tabtabsix">On-Call Expert Support</a>
						</li>
						</ul>
					
					</div>
					<div class="s_tab_wrapper">
						<div class="s_tabs_content">
						<div class="s_tab fade active-tab show" id="tabtabone">
							<div class="tab_content one" style="background-image:url(<?php echo base_url('assets/images/slider/how-works.png'); ?>)">
								<div class="content_image">
									<h2>100% Paperless Loan Process</h2>

									<p>Skip the loaded bank queues smartly and embrace our service that enables you with an entirely digital loan process.</p>
								</div>
							</div>
						</div>
						<div class="s_tab fade" id="tabtabtwo">
							<div class="tab_content one" style="background-image:url(<?php echo base_url('assets/images/slider/how-works.png'); ?>)">
								<div class="content_image">
									<h2>Personal Financial Consultation</h2>

									<p>Let our financial experts guide you so that you anticipate the best outcomes for your future financial decisions!</p>
								</div>
							</div>
						</div>
						<div class="s_tab fade" id="tabtabthree">
							<div class="tab_content one" style="background-image:url(<?php echo base_url('assets/images/slider/how-works.png'); ?>)">
								<div class="content_image">
									<h2>Loan Self-Apply Feature</h2>

									<p>Here’s the highlight! This feature empowers you to apply for an instant personal loan all by yourself, easily!</p>
								</div>
							</div>
						</div>
						<div class="s_tab fade" id="tabtabtfour">
							<div class="tab_content one" style="background-image:url(<?php echo base_url('assets/images/slider/how-works.png'); ?>)">
								<div class="content_image">
									<h2>Instant Personal Loan Process</h2>

									<p>No obstructions, no hassles! Start your loan process with just some taps on your smartphone.</p>
								</div>
							</div>
						</div>
						<div class="s_tab fade" id="tabtabfive">
							<div class="tab_content one" style="background-image:url(<?php echo base_url('assets/images/slider/how-works.png'); ?>)">
								<div class="content_image">
									<h2>Personalised Updates Portal</h2>

									<p>Once you purchase our plan, we’ll curate your personalised portal wherein you can access important updates and service essentials.</p>
								</div>
							</div>
						</div>
						<div class="s_tab fade" id="tabtabsix">
							<div class="tab_content one" style="background-image:url(<?php echo base_url('assets/images/slider/how-works.png'); ?>)">
								<div class="content_image">
									<h2>On-Call Expert Support</h2>

									<p>Our customer support team always ascertain your satisfaction by providing resolving solutions to you!</p>
								</div>
							</div>
						</div>
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
	<!---tab-end--->   

	<!---Process-section-start---->
	<section class="service-section-two ">
		<!--===============spacing==============-->
			<div class="pd_top_80"></div>
		<!--===============spacing==============-->
		<div class="container pd_zero">
			<div class="row">
				<div class="col-lg-12">
				<div class="title_all_box style_one text-center  dark_color">
					<div class="title_sections">
						<h2>The Magnificent Plan Privileges – Maximising Your Satisfaction!</h2>
					</div>
				</div>
				</div>
				<!--===============spacing==============-->
				<div class="mr_bottom_70"></div>
				<!--===============spacing==============-->
			</div>

			<div class="row gutter_15px">
				<div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<div class="service_box style_three dark_color">
						<div class="service_content">
							<div class="content_inner">
								<span class="icon-file-text"><i></i></span>
								<small class="nom">01</small>
								<h2><a href="#">Easy Registration </a></h2>
								<p>The first and foremost step is to fill in your bank registered name and mobile number–and complete the registration process. If you are already registered, then simply log in with your credentials.</p>
							</div>
						</div>
					</div>
					<!--===============spacing==============-->
					<div class="mr_bottom_30"></div>
					<!--===============spacing==============-->
				</div>
				<div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<div class="service_box style_three dark_color">
						<div class="service_content">
							<div class="content_inner">
								<span class="icon-line-chart"><i></i></span>
								<small class="nom">02</small>
								<h2><a href="#">Check Eligibility</a></h2>
								<p>Here, you will be filling in certain loan-related important details like loan purpose, income, monthly EMI (if any), etc. Depending upon your eligibility, you will get a system-generated pre-approved loan offer. The final eligibility and loan approval depends on the concerned bank(s) and your profile.</p>
							</div>
						</div>
					</div>
					<!--===============spacing==============-->
					<div class="mr_bottom_30"></div>
					<!--===============spacing==============-->
				</div>
				<div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<div class="service_box style_three dark_color">
						<div class="service_content">
							<div class="content_inner">
								<span class="icon-shopping-cart"><i></i></span>
								<small class="nom">03</small>
								<h2><a href="#">Bank Verification</a></h2>
								<p>We will prepare a loan file and submit it to Our Partnered NBFCs for verification. They will match your profile with their loan parameters and eligibility criteria.</p>
							</div>
						</div>
					</div>
					<!--===============spacing==============-->
					<div class="mr_bottom_30"></div>
					<!--===============spacing==============-->
				</div>
				<div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<div class="service_box style_three dark_color">
						<div class="service_content">
							<div class="content_inner">
								<span class="icon-external-link"><i></i></span>
								<small class="nom">04</small>
								<h2><a href="#">Loan Sanction</a></h2>
								<p>The final loan sanction depends on the NBFCs only. They will perform all the required checks, analyse your profile, and then decide on the proceedings.</p>
							</div>
						</div>
					</div>
					<!--===============spacing==============-->
						<div class="mr_bottom_30"></div>
					<!--===============spacing==============-->
				</div>
			</div>
		</div>
		<!--===============spacing==============-->
		<div class="pd_bottom_50"></div>
		<!--===============spacing==============-->
	</section>
	<!---Process-section-end---->

	<!---client---->
	<section class="client-brand-section bg_light_1">
	<!--===============spacing==============-->
	<div class="pd_top_80"></div>
	<!--===============spacing==============-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title_all_box style_six text-center dark_color">
					<div class="title_sections">
						<h2>Partnered With Leading NBFCs</h2>
					</div>
				</div>
				<div class="client_logo_carousel type_one pd_top_20">
					<div class="swiper-container" data-swiper='{
						"autoplay": {
							"delay": 6000
						},
						"freeMode": true,
						"loop": true,
						"speed": 1000,
						"centeredSlides": false,
						"slidesPerView": 5,
						"spaceBetween": 10,
						"pagination": {
							"el": ".swiper-pagination",
							"clickable": true
						},
						"navigation": {
							"nextEl": ".swiper-button-next",
							"prevEl": ".swiper-button-prev"
						},
						"breakpoints": {
							"1200": {
								"slidesPerView": 5 
							},
							"1024": {
								"slidesPerView": 4 
							},
							"768": {
								"slidesPerView": 3 
							},
							"576": {
								"slidesPerView": 3 
							},
							"0": {
								"slidesPerView": 3 
							}
						}
						}'>
						<div class="swiper-wrapper">
							<?php
							foreach ($banklist as $row) { ?>
							<div class="swiper-slide">
								<div class="image_sl">
									<img src="<?php echo base_url('assets/images/bank/'.$row->bank_image); ?>" alt="<?php echo $row->bank_name; ?>">
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--===============spacing==============-->
	<div class="pd_bottom_80"></div>
	<!--===============spacing==============-->
	</section>
	<!---client-end---->

</div>
<!--===============PAGE CONTENT END==============-->

<?php
    $this->load->view('includes/footer.php');
?>
