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
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/logo/favicon-16x16.png'); ?>">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/logo/favicon.ico'); ?>">

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

         <!----header----->
         <div class="header_area" id="header_contents">
            <header class="header header_default style_one get_sticky_header" style="border-bottom: 1px solid #e6e6e6; box-shadow: 5px 0  5px #e8e8e8;">
               <div class="auto-container">
                  <div class="row align-items-center">
                     <div class="col-lg-2 col-md-9 col-sm-9 col-xs-9 logo_column">
                        <div class="header_logo_box">
                           <a href="#" class="logo navbar-brand">
                              <img src="<?php echo base_url('assets/images/logo/logo.png'); ?>" alt="<?php echo PROJECT_NAME; ?>" class="logo_default">
                              <img src="<?php echo base_url('assets/images/logo/logo.png'); ?>" alt="<?php echo PROJECT_NAME; ?>" class="logo__sticky">
                            </a>
                        </div>
                     </div>

                     <div class="col-lg-10 col-md-3 col-sm-3 col-xs-3 menu_column">
                        <div class="navbar_togglers hamburger_menu">
                           <span class="line"></span>
                           <span class="line"></span>
                           <span class="line"></span>
                        </div>
                        <div class="header_content_collapse">
                           <div class="header_menu_box">
                              <div class="navigation_menu">
                                 <ul id="myNavbar" class="navbar_nav">
                                    <li class="menu-item position-static nav-item">
                                       <a href="<?php echo site_url('customer/dashboard'); ?>" class="dropdown-toggle nav-link">
                                          <span>Dashboard</span>
                                       </a>
                                    </li>
                                    
                                    <li class="menu-item menu-item-has-children dropdown nav-item">
                                       <a href="#" class="dropdown-toggle nav-link">
                                          <span>My Loan</span>
                                       </a>
                                       <ul class="dropdown-menu">
                                          <!--<li class="menu-item nav-item">
                                             <a href="<?php echo site_url('customer/offers'); ?>" class="dropdown-item nav-link">
                                                <span>Apply Now</span>
                                             </a>
                                          </li>-->
                                          <li class="menu-item  nav-item">
                                             <a href="<?php echo site_url('customer/offers/preapproved'); ?>" class="dropdown-item nav-link">
                                                <span>Pre-Approve Loan</span>
                                             </a>
                                          </li>
                                          <li class="menu-item  nav-item">
                                             <a href="<?php echo site_url('customer/loan/history'); ?>" class="dropdown-item nav-link">
                                                <span>My Loan History</span>
                                             </a>
                                          </li>
                                          
                                       </ul>
                                    </li>
                                   <!-- <li class="menu-item position-static nav-item">
                                       <a href="<?php echo site_url('customer/offers/cardoffers'); ?>" class="dropdown-toggle nav-link">
                                          <span>Card Offers</span>
                                       </a>
                                    </li>-->
                                    <!--
                                    <li class="menu-item menu-item-has-children dropdown nav-item">
                                       <a href="#" class="dropdown-toggle nav-link">
                                          <span>Customers</span>
                                       </a>
                                       <ul class="dropdown-menu">
                                          <li class="menu-item  nav-item">
                                             <a href="<?php echo site_url('customer/referral'); ?>" class="dropdown-item nav-link">
                                                <span>My Customers</span>
                                             </a>
                                          </li>
                                          <li class="menu-item  nav-item">
                                             <a href="<?php echo site_url('customer/referral/history'); ?>" class="dropdown-item nav-link">
                                                <span>My Customers Loans</span>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                    -->
                                    <li class="menu-item menu-item-has-children dropdown nav-item">
                                       <a href="#" class="dropdown-toggle nav-link">
                                          <span>Profile</span>
                                       </a>
                                       <ul class="dropdown-menu">
                                          <li class="menu-item  nav-item">
                                             <a href="<?php echo site_url('customer/profile'); ?>" class="dropdown-item nav-link">
                                                <span>My Profile</span>
                                             </a>
                                          </li>
                                          <li class="menu-item  nav-item">
                                             <a href="<?php echo site_url('customer/profile/documents'); ?>"
                                                class="dropdown-item nav-link">
                                                <span>KYC Documents</span>
                                             </a>
                                          </li>
                                          <li class="menu-item  nav-item">
                                             <a href="<?php echo site_url('customer/profile/mcard'); ?>"
                                                class="dropdown-item nav-link">
                                                <span>Plan Details</span>
                                             </a>
                                          </li>
                                          <li class="menu-item  nav-item">
                                             <a href="<?php echo site_url('customer/support'); ?>"
                                                class="dropdown-item nav-link">
                                                <span>Support </span>
                                             </a>
                                          </li>
                                          <li class="menu-item  nav-item">
                                             <a href="<?php echo site_url('customer/Login/logout'); ?>"
                                                class="dropdown-item nav-link">
                                                <span>Log Out </span>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </header>

             <!---==============mobile menu =================-->
            <div class="crt_mobile_menu">
              <div class="menu-backdrop"></div>
              <nav class="menu-box">
                  <div class="close-btn"><i class="icon-close"></i></div>
                  <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                  </div>
              </nav>
            </div>
            <!---==============mobile menu end =================-->
         </div>
         <!----header end----->