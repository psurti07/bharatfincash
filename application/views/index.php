<?php
    $this->load->view('includes/header.php');
?>

<!--===============PAGE CONTENT ==============-->
<div id="content" class="site-content ">
<!---slider---->
<section class="banner-section bg_op_1" style="background-image:url(<?php echo base_url() ?>assets/images/home_bg.jpeg)">
	<!--===============spacing==============-->
	<div class="pd_top_100"></div>
	<!--===============spacing==============-->
	<div class="auto-container">
		<div class="row align-items-center">
			<div class="col-xl-7 col-lg-6 col-md-12">
			<div class="title_all_box style_one">
				<div class="title_sections">
					
					<h2 class="title_big text-light">Sabse Best Financial Consultation & Service</h2>
					<p class="text-light">Optimise & Streamline Your Finances with Beneficial Subscription Plans</p>
				</div>
			</div>

			<div class="theme_btn_all color_one">
				<a href="<?php echo site_url('digital/personalLoan'); ?>" target="_blank" rel="nofollow" class="theme-btn one">Apply Now</a>
			</div>
				<!--===============spacing==============-->
				<div class="pd_bottom_30"></div>
				<!--===============spacing==============-->
			</div>
			<div class="col-xl-1 hidden-lg"></div>
			<div class="col-xl-4 col-lg-6 col-md-12">
			<img src="<?php echo base_url('assets/images/home_2.jpg'); ?>" class="img-fluid" alt="slider image">
			</div>
		</div>
	</div>
	<!--===============spacing==============-->
	<div class="pd_bottom_100"></div>
	<!--===============spacing==============-->
</section>

<!---client---->
<section class="client-brand-section">
	<!--===============spacing==============-->
	<div class="pd_top_60"></div>
	<!--===============spacing==============-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title_all_box style_six text-center dark_color">
					<div class="title_sections">
						<h2>Partnered With Leading <span class="text-success">NBFCs</span></h2>
					</div>
				</div>
				<div class="client_logo_carousel type_one pd_top_20">
					<div class="swiper-container" data-swiper='{
						"autoplay": {
							"delay": 20000
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
								"slidesPerView": 2 
							},
							"0": {
								"slidesPerView": 2 
							}
						}
						}'>
						<div class="swiper-wrapper">
						<?php
						foreach ($banklist as $row) { ?>
							<div class="swiper-slide">
								<div class="image_sl">
									<img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>"
										alt="<?php echo $row->bank_name; ?>">
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
	<div class="pd_bottom_60"></div>
	<!--===============spacing==============-->
</section>
<!---client-end---->

<!---Apply-redirect-section-start--->
<section class="blog-section">
<!--===============spacing==============-->
<div class="pd_top_70"></div>
<!--===============spacing==============-->
	<div class="large-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title_all_box style_one text-center dark_color">
					<div class="title_sections">
						<h2>Expert Financial Consultation For Your Future Betterment</h2>
						<p>Be it for personal pursuits or business endeavours, financial planning is the most imperative ingredient to curate a future full of financial stability. Take a smart decision and avail consultation from our market-leading financial experts!</p>
					</div>
				</div>
				<!--===============spacing==============-->
					<div class="pd_bottom_30"></div>
				<!--===============spacing==============-->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12"> 
				<div class="blog_post_section  two_column news_wrapper_grid style_two ">
					<div class="grid_show_case grid_layout clearfix">
						<div class="grid_box _card">
						<div class="news_box default_style list_view has_images">
							<div class="image img_hover-1">
								<img loading="lazy" width="750" height="420" src="<?php echo base_url('assets/images/slider/digital-personal-loan.jpg'); ?>"
									class="img-fluid" alt="img">
								<a href="<?php echo site_url('digital/personalLoan'); ?>" class="categories">
									<i class="icon-folder"></i>Personal
								</a>
							</div>
							<div class="content_box">
								<div class="">
									<h2 class="title"><a href="<?php echo site_url('digital/personalLoan'); ?>" rel="bookmark">Personal Subscription Plan</a></h2>
									<p>Best for Salaried People</p>
									<p class="short_desc">Smart Step Towards Fulfilling Your Aspirations through Personal Financial Consultation & Services with a Completely Paperless & Easy Process.</p>
									<a href="<?php echo site_url('digital/personalLoan'); ?>" class="theme-btn one">Apply Now</a>
								</div>
							</div>
						</div>
						</div>
						<div class="grid_box _card">
						<div class="news_box default_style list_view has_images">
							<div class="image img_hover-1">
								<img loading="lazy" width="750" height="420" src="<?php echo base_url('assets/images/slider/digital-business-loan.jpg'); ?>"
									class="img-fluid" alt="img">
								<a href="<?php echo site_url('digital/businessloan'); ?>" class="categories">
									<i class="icon-folder"></i>Business
								</a>
							</div>
							<div class="content_box">
								<div class="">
									<h2 class="title"><a href="<?php echo site_url('digital/businessloan'); ?>" rel="bookmark">Business Subscription Plan</a></h2>
									<p>Best for Self-Employed People</p>
									<p class="short_desc">Instant Guidance To Elevate Your Business! Get Best Business Financial Consultation with 100% Online Process – Extremely Convenient Procedure.

									</p>
									<a href="<?php echo site_url('digital/businessloan'); ?>" class="theme-btn one">Apply Now</a>
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
	<div class="pd_bottom_60"></div>
<!--===============spacing==============-->
</section>
<!---Apply-redirect-section-end--->

<!----about---->
<section class="about-section ">
	<!--===============spacing==============-->
	<div class="pd_top_85"></div>
	<!--===============spacing==============-->
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-12 col-md-12 mb-sm-5 mb-md-5 mb-lg-5 mb-xl-0">
			<div class="image_boxes style_seven">
				<div class="image_box">
					<img src="<?php echo base_url('assets/images/slider/offer-page-bg.png'); ?>" class="img-fluid" alt="about">
				</div>
				<div class="pattern_imag">
					<img src="<?php echo base_url('assets/images/pattern-n1.png'); ?>" alt="img">
				</div>
			</div>
			</div>
			<div class="col-xl-6 col-lg-10 col-md-12">
			<div class="title_all_box style_one  dark_color">
				<div class="title_sections left">
					<h2>Why <span class="text-success">Bharatfincash</span> Emerges as The Best?</h2>
					<div class="description_box">
						<p>We, at Bharatfincash, are all about aiding our customers with authentic and strategic financial consultation and services for them to stride ahead in their life with confidence. Our experts, being highly experienced, always live up to their high standards and provide our customers with tailored solutions as per the customers’ requirements.</p>
					</div>
					<!--===============spacing==============-->
					<div class="pd_top_20"></div>
					<!--===============spacing==============-->
				</div>
			</div>
			<div class="progress_bar style_two">
				<div class="progress_new">
					<div class="ProgressBar ProgressBar--animateText" data-progress="70">
						<svg class="ProgressBar-contentCircle" height="170" width="170">
						<circle class="ProgressBar-background" cx="85" cy="85" r="75"></circle>
						<circle transform="rotate(-90, 85, 85)" class="ProgressBar-circle" cx="85" cy="85"
							r="75" style="stroke-dasharray: 471px; stroke-dashoffset: 141.3px;"></circle>
						</svg>
					</div>
					<div class="progress-value">
						<div>
						<h6 style="font-size: 15px;">Customers Served Satisfactorily</h6>
						</div>
					</div>
				</div>
				<div class="content_box">
					<h2>15k+</h2>
					<h3>Going Stronger Than Before!</h3>
					<p>Our unique services and customer-centric attitude remain the backdrop to our ever-expanding customer base!</p>
				</div>
			</div>
			<!--===============spacing==============-->
			<div class="pd_top_20"></div>
			<!--===============spacing==============-->
			<div class="tabs_all_box  tabs_all_box_start type_three">
				<div class="tab_over_all_box">
					<div class="tabs_header clearfix">
						<ul class="showcase_tabs_btns nav-pills nav   clearfix">
						<li class="nav-item">
							<a class="s_tab_btn nav-link active" data-tab="#tabtabone">
								Mission </a>
						</li>
						<li class="nav-item">
							<a class="s_tab_btn nav-link " data-tab="#tabtabtwo">
								Vision </a>
						</li>
						<li class="nav-item">
							<a class="s_tab_btn nav-link " data-tab="#tabtabthree">
								Values </a>
						</li>
						</ul>
					</div>
					<div class="s_tab_wrapper">
						<div class="s_tabs_content">
						<div class="s_tab fade active-tab show" id="tabtabone">
							<div class="tab_content one">
								<div class="content_bx">
									<p>Strengthen Financial Inclusiveness & Awareness
									</p>
								</div>
							</div>
						</div>
						<div class="s_tab fade " id="tabtabtwo">
							<div class="tab_content one">
								<div class="content_bx">
									<p>Empower People With Expert Financial Guidance.
									</p>
								</div>
							</div>
						</div>
						<div class="s_tab fade " id="tabtabthree">
							<div class="tab_content one">
								<div class="content_bx">
									<p>We’re Synonymous with Trust, Satisfaction & Positive Changes!
									</p>
								</div>
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
	<div class="pd_bottom_60"></div>
	<!--===============spacing==============-->
</section>
<!----about end---->

<!---price-tab--->
<section class="price-plan-tab-section pd_bottom_60">
	<!--===============spacing==============-->
	<div class="pd_top_60"></div>
	<!--===============spacing==============-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title_all_box style_one text-center dark_color">
					<div class="title_sections">
						<h2>Our Plans – Heaps of Awesome Benefits!</h2>
						<p>We love it when our customers rejoice in all the facilitations provided by us and get their financial aspects accelerated; but that's only possible through our plans – the route to avail our highly beneficial financial consultation and services.</p>
					</div>
				</div>
			</div>
			<!--===============spacing==============-->
			<div class="pd_bottom_30"></div>
			<!--===============spacing==============-->
		</div>
		<div class="row gutter_30px">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="price_plan_box style_one ">
							<div class="inner_box">
								<div class="top">
								<h2>Personal Subscription</h2>
								<p>Personal Financial Consultation</p>
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
										<span> Plan Validity: 3 months</span>
										<i class="fa fa-check"></i>
									</li>
									
								</ul>
								<a href="<?php echo site_url('digital/personalLoan'); ?>" target="_blank" rel="nofollow" class="theme-btn two">Get Now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="price_plan_box style_one">
							<div class="inner_box">
								<div class="top">
								<h2>Business Subscription</h2>
								<p>Business Financial Consultation</p>
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
										<span> Plan Validity: 3 months</span>
										<i class="fa fa-check"></i>
									</li>
									
								</ul>
								<a href="<?php echo site_url('digital/businessLoan'); ?>" target="_blank" rel="nofollow" class="theme-btn two">Get Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!---price-tab-end--->
	
<!---testimonial-->
<section class="testimonial-section bg_light_1 ">
	<!--===============spacing==============-->
	<div class="pd_top_70"></div>
	<!--===============spacing==============-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title_all_box style_six text-center dark_color">
					<div class="title_sections">
						<h2>Our Customer Satisfaction Goes High Volume!</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="testimonial_all owl_new_one ">
					<div class="owl-carousel owl_nav_block owl_dots_none owl_type_two theme_carousel owl-theme"
						data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "3" } , "1000":{ "items" : "2" }}}'>

						<?php foreach ($testimoniallist as $row) { ?>
							<div class="testimonial_box type_two">
								<div class="upper_content">
									<div class="image_box">
										<img src="<?php echo base_url('assets/images/customers/' . $row->photo); ?>" class="img-fluid" alt="customer image">
										<span class="icon-quote"></span>
									</div>
									<div class="description">
										<p><?php echo $row->reviews; ?></p>
									</div>
								</div>
								<div class="lower_content clearfix">
									<div class="authour_name">
										<h6><?php echo $row->fullname; ?></h6>
								</div>
								<p>
									<i class="fa fa-star fill"></i>
									<i class="fa fa-star fill"></i>
									<i class="fa fa-star fill"></i>
									<i class="fa fa-star fill"></i>
									<i class="fa fa-star empty"></i>
								</p>
							</div>
						</div>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--===============spacing==============-->
	<div class="pd_bottom_90"></div>
	<!--===============spacing==============-->
</section>
<!--testimonial end-->

</div>
<!--===============PAGE CONTENT END==============-->

<?php if ($msg[0]->option_value == 1 && $msg[1]->option_value != '') { ?>
	<div class="modal fade" id="welcomemsg" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
			<div class="modal-content" id="loginmodal">
				<span class="mod-close p-2" data-bs-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></span>

				<div class="modal-body">
					<?php echo $msg[1]->option_value; ?>

				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php
    $this->load->view('includes/footer.php');
?>

<script type="text/javascript">
	$(window).on('load', function () {
		$('#welcomemsg').modal('show');
	});
</script>