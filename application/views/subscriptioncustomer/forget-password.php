<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title><?php if(isset($meta->title)) { echo $meta->title; } else { echo "Indcapital – Personal Loan and Business Loan"; } ?></title>
  <meta name="description" content="<?php if(isset($meta->descriptions)) { echo $meta->descriptions; } ?>" />
  <meta name="keywords" content="<?php if(isset($meta->keywords)) { echo $meta->keywords; } ?>" />
  <meta name="author" content="vw-team">
  <link rel="canonical" href="<?php echo base_url(uri_string()); ?>" />
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">

   <!-- Google Fonts -->
   <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Spartan%3A400%2C500%2C600%2C700%2C800%2C900%7CInter%3A300%2C400%2C500%2C600%2C700%2C800%2C900&subset=latin%2Clatin-ext' type='text/css' media='all' />
   <!-- Google Fonts -->

   <!-- Style -->
   <link rel='stylesheet' href='<?php echo base_url("assets/css/bootstrap.min.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/owl.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/swiper.min.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/jquery.fancybox.min.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/icomoon.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/flexslider.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/font-awesome.min.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/style.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/scss/elements/theme-css.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/validation/form-validation.css"); ?>' type='text/css' media='all' />
   <!-- Style-->
   <!----woocommerce---->
   <link rel='stylesheet' href='assets/css/woocommerce-layout.css' type='text/css' media='all' />
   <link rel='stylesheet' href='assets/css/woocommerce.css' type='text/css' media='all' />
   <!----woocommerce---->
</head>
<body class="theme-creote">
   <div id="page" class="page_wapper hfeed site">
      <!---============== wrapper_full =================-->
      <div id="wrapper_full" class="content_all_warpper">
         
         <!----page-CONTENT----->
         <div id="content" class="site-content ">
            <div class="no-container">
               <div class="no-row">
                  <div class="full_width_box">
                 
                        <div class="whole_login_content">
                           <div class="register_login">
                              <div class="simpleParallax"><img decoding="async" src="<?php echo base_url('assets/images/login-min.jpg'); ?>" class="cover-parallax" alt="image" style="transform: translate3d(0px, 37px, 0px) scale(1.3); will-change: transform; transition: transform 0.6s cubic-bezier(0, 0, 0, 1) 0s;"></div>
                              <div class="login_left_side">
                                 <div class="login_content_box">
                                    <a href="#" class="login_logo"><img decoding="async" src="<?php echo base_url('assets/images/logo-2x.png'); ?>" class="login_logo" alt="image"></a>
                                    <div class="login_forms_box">
                                       <h2>Forget Password</h2>
                                       
                                       <div class="tab-content" id="pills-tabContent">
                                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

										  	 <?php echo form_open('subscriptioncustomer/login/sendForgetmessage', array('id' => 'submitForm1', 'class' => 'login-register-form login', 'novalidate' => 'novalidate')); ?>

											 	<div class="form-group">
													<label for="username">Please enter your Mobile number you have created at registration:</label>
													<input type="text" aria-required="true" name="mobile" id="mobile"
														class="frminbox" placeholder="Enter Mobile No."
														inputmode="numeric" required
														data-validation-regex-regex="^[6789]\d{9}$"
														oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
													<div class="help-block font-small-3"></div>
												</div>

												<div class="form-group">
													<button type="submit" id="form-submit1" class="">SEND</button>
												</div>

												<div class="pd_top_20"></div>

                                                <p class="lost_password">
                                                   <a href="<?php echo site_url('customer'); ?>">Log in Now</a>
                                                </p>
                                             <?php echo form_close(); ?>

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
         </div>
      </div>
   </div>
   <!-- Back to top with progress indicator-->
   </div>
   <!---============== wrapper_full =================-->

	<!---==============footer start =================-->
	<div class="footer_area footer_two" id="footer_contents">
		<div class="footer_copy_right bg_dark_3">
			<!--===============spacing==============-->
			<div class="pd_top_20"></div>
			<!--===============spacing==============-->
			<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="footer_copy_content text-center">
						<small><?php echo date('Y')." &copy; ".COMPANY_NAME; ?>. All rights reserved.</small>
					</div>
				</div>
			</div>
			</div>
			<!--===============spacing==============-->
			<div class="pd_bottom_20"></div>
			<!--===============spacing==============-->
		</div>
	</div>
	<!---==============footer end =================-->
</div>

   <!---========================== javascript ==========================-->
    <script type='text/javascript' src='<?php echo base_url("assets/js/jquery-3.6.0.min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/bootstrap.min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/jquery.fancybox.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/jquery.flexslider-min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/owl.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/swiper.min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/isotope.min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/simpleParallax.min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/appear.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/plugins.js"); ?>'></script>

    <script src="<?php echo base_url('assets/js/validation/jqBootstrapValidation.js'); ?>" type="text/javascript"></script>
    
    <script src="<?php echo base_url('assets/plugins/validate/form-validation.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/validate/form-validation.min.js'); ?>" type="text/javascript"></script>

    <!-- main-js -->
    <script type='text/javascript' src='<?php echo base_url('assets/js/creote-extension.js'); ?>'></script>
    <!---========================== javascript ==========================-->

	<script type="text/javascript">
		$(function(){
		$('#submitForm1').on('submit', function(e) {
				e.preventDefault();

				$.ajax({
					url : $(this).attr('action') || window.location.pathname,
					type: "POST",
					data: $(this).serialize(),
					dataType: "JSON",
					cache: false,
					processData:false,
					beforeSend: function(){
						$('#form-submit1').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> SENDING...');
						$('#form-submit1').attr('disabled', true);
					},
					success: function (response) {
					if(response['success'] == true) {
						document.getElementById("submitForm1").reset();
						$.notify({ message: response['message'] },{ type: 'success' });
						setTimeout(function() {
							window.location.href = '<?php echo base_url("subscriptioncustomer/login"); ?>';
						}, 2000);
					}
					else {
						$.notify({ message: response['message'] },{ type: 'danger' });
					}
					$('#form-submit1').html('SEND');
					$('#form-submit1').attr('disabled', false);
					},
					error: function (jXHR, textStatus, errorThrown) {
						$('#form-submit1').html('SEND');
						$('#form-submit1').attr('disabled', false);
						$.notify({ message: errorThrown },{ type: 'danger' });
					}
				});
			});
		});
	</script>

</body>
</html>