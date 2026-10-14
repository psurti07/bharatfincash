<!DOCTYPE html>
<html lang="en-US" data-textdirection="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>
    <?php if(isset($meta->title)) { echo $meta->title; } else { echo "Bharatfincash – Personal Loan and Business Loan"; } ?>
  </title>
  <meta name="description" content="<?php if(isset($meta->descriptions)) { echo $meta->descriptions; } ?>" />
  <meta name="keywords" content="<?php if(isset($meta->keywords)) { echo $meta->keywords; } ?>" />
  <meta name="author" content="vw-team">

  <meta property="og:title" content="Bharatfincash - Fast & Easy Online Loans for Personal and Business Needs" />
  <meta property="og:description"
    content="Quick online loan solutions by Bharatfincash. Apply for personal or business loans from the comfort of your home. Get started today!" />
  <meta property="og:url" content="https://indcapital.in/" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="https://indcapital.in/assets/images/logo/logo.png" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Bharatfincash - Fast & Easy Online Loans for Personal and Business Needs" />
  <meta name="twitter:description"
    content="Bharatfincash makes personal and business loan applications simple, fast, and secure. Apply online today." />
  <meta name="twitter:image" content="https://indcapital.in/assets/images/logo/logo.png" />

  <link rel="canonical" href="<?php echo base_url(uri_string()); ?>" />
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
  <link rel="icon" type="image/png" sizes="16x16"
    href="<?php echo base_url('assets/images/logo/favicon-16x16.png'); ?>">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/logo/bharatfincash-favicon.ico'); ?>">

  <!-- Google Fonts -->
  <link rel='stylesheet'
    href='https://fonts.googleapis.com/css?family=Spartan%3A400%2C500%2C600%2C700%2C800%2C900%7CInter%3A300%2C400%2C500%2C600%2C700%2C800%2C900&subset=latin%2Clatin-ext'
    type='text/css' media='all' />
  <!-- Google Fonts -->
  <script type="text/javascript">
    (function (c, l, a, r, i, t, y) {
      c[a] = c[a] || function () {
        (c[a].q = c[a].q || []).push(arguments)
      };
      t = l.createElement(r);
      t.async = 1;
      t.src = "https://www.clarity.ms/tag/" + i;
      y = l.getElementsByTagName(r)[0];
      y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", "rfotu4h6ch");
  </script>
  <link rel='stylesheet' href='<?php echo base_url("assets/css/bootstrap.min.css"); ?>' type='text/css' media='all' />
  <link rel='stylesheet' href='<?php echo base_url("assets/css/owl.css"); ?>' type='text/css' media='all' />
  <link rel='stylesheet' href='<?php echo base_url("assets/css/swiper.min.css"); ?>' type='text/css' media='all' />
  <link rel='stylesheet' href='<?php echo base_url("assets/css/jquery.fancybox.min.css"); ?>' type='text/css'
    media='all' />
  <link rel='stylesheet' href='<?php echo base_url("assets/css/icomoon.css"); ?>' type='text/css' media='all' />
  <link rel='stylesheet' href='<?php echo base_url("assets/css/flexslider.css"); ?>' type='text/css' media='all' />
  <link rel='stylesheet' href='<?php echo base_url("assets/css/font-awesome.min.css"); ?>' type='text/css'
    media='all' />
  <link rel='stylesheet' href='<?php echo base_url("assets/css/style.css"); ?>' type='text/css' media='all' />
  <link rel='stylesheet' href='<?php echo base_url("assets/css/scss/elements/theme-css.css?t=3"); ?>' type='text/css'
    media='all' />
  <link rel='stylesheet' href='<?php echo base_url("assets/css/validation/form-validation.css"); ?>' type='text/css'
    media='all' />
  <!-- Style-->
  <!----woocommerce---->
  <link rel='stylesheet' href='<?php echo base_url("assets/css/woocommerce-layout.css"); ?>' type='text/css'
    media='all' />
  <link rel='stylesheet' href='<?php echo base_url("assets/css/woocommerce.css"); ?>' type='text/css' media='all' />
  <!----woocommerce---->

  <!-- Facebook Domain + Pixel Code -->
  <?php
  $fbdomain = getFacebookDomain();
  if ($fbdomain != Null) {
    echo '<meta name="facebook-domain-verification" content="' . $fbdomain . '" />';
  }

  $fbpixel = getFacebookPixel();
  if ($fbpixel != Null) {
    ?>
  <script>
    ! function (f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function () {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?php echo $fbpixel; ?>');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=<?php echo $fbpixel; ?>&ev=PageView&noscript=1" /></noscript>
  <?php } ?>
  <!-- End Facebook Domain + Pixel Code -->
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16555590592"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-16555590592');
  </script>

  <!-- Google Tag Manager -->
  <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-M46Q792Z');
  </script>
  <!-- End Google Tag Manager -->
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-CF1F0E0LRM"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-CF1F0E0LRM');
  </script>

  <!-- Microsoft tag -->
  <script>
    (function (w, d, t, r, u) {
      var f, n, i;
      w[u] = w[u] || [], f = function () {
          var o = {
            ti: "187177514",
            enableAutoSpaTracking: true
          };
          o.q = w[u], w[u] = new UET(o), w[u].push("pageLoad")
        },
        n = d.createElement(t), n.src = r, n.async = 1, n.onload = n.onreadystatechange = function () {
          var s = this.readyState;
          s && s !== "loaded" && s !== "complete" || (f(), n.onload = n.onreadystatechange = null)
        },
        i = d.getElementsByTagName(t)[0], i.parentNode.insertBefore(n, i)
    })
    (window, document, "script", "//bat.bing.com/bat.js", "uetq");
  </script>
  <!-- Microsoft tag -->

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@graph": [{
          "@type": "LocalBusiness",
          "name": "Bharatfincash",
          "image": "https://indcapital.in/assets/images/logo/logo.png",
          "telephone": "+91-98730-80345",
          "email": "info@indcapital.in",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "302-A, heny Arcade , Dabholi Gam , Dabholi, BRTS, Katargam",
            "addressLocality": "Surat",
            "addressRegion": "Gujarat",
            "postalCode": "395004",
            "addressCountry": "IN"
          },
          "url": "https://indcapital.in"
        },
        {
          "@type": "Organization",
          "name": "Bharatfincash",
          "url": "https://indcapital.in",
          "logo": "https://indcapital.in/assets/images/logo/logo.png",
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91-98730-80345",
            "contactType": "Customer Service",
            "areaServed": "IN",
            "availableLanguage": "en"
          },
          "sameAs": [
            "https://www.facebook.com/indcapitalofficial",
            "https://www.instagram.com/indcapital.in/",
            "https://twitter.com/Indcapital_",
            "https://www.linkedin.com/company/Indcapital",
            "https://in.pinterest.com/indcapital007/"
          ]
        },
        {
          "@type": "WebSite",
          "url": "https://indcapital.in",
          "name": "Bharatfincash",
          "description": "Bharatfincash offers digital personal and business loans with flexible EMIs and instant processing. Apply easily online.",
          "publisher": {
            "@type": "Organization",
            "name": "Bharatfincash",
            "logo": {
              "@type": "ImageObject",
              "url": "https://indcapital.in/assets/images/logo/logo.png"
            }
          }
        }
      ]
    }
  </script>

</head>

<body class="home theme-creote page-home-default-one">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M46Q792Z" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div id="page" class="page_wapper hfeed site">
    <div id="wrapper_full" class="content_all_warpper">

      <!----header----->
      <div class="header_area " id="header_contents">
        <header class="header header_default style_one get_sticky_header">
          <div class="auto-container">
            <div class="row align-items-center">
              <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9 logo_column">
                <div class="header_logo_box">
                  <a href="<?php echo site_url(); ?>" class="logo navbar-brand">
                    <img src="<?php echo base_url('assets/images/logo/bharatfincash-logo.png'); ?>" alt="<?php echo PROJECT_NAME; ?>"
                      class="logo_default">
                    <img src="<?php echo base_url('assets/images/logo/bharatfincash-logo.png'); ?>" alt="<?php echo PROJECT_NAME; ?>"
                      class="logo__sticky">
                  </a>
                </div>
              </div>
              <div class="col-lg-9 col-md-3 col-sm-3 col-xs-3 menu_column">
                <div class="navbar_togglers hamburger_menu">
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
                </div>
                <div class="header_content_collapse">
                  <div class="header_menu_box">
                    <div class="navigation_menu">
                      <ul id="myNavbar" class="navbar_nav">
                        <li class="menu-item">
                          <a href="<?php echo site_url(); ?>" class="dropdown-toggle nav-link">
                            <span>Home</span>
                          </a>
                        </li>

                        <li class="menu-item">
                          <a href="<?php echo site_url('company'); ?>" class="dropdown-toggle nav-link">
                            <span>Company</span>
                          </a>
                        </li>

                        <li class="menu-item menu-item-has-children dropdown nav-item">
                          <a href="#" class="dropdown-toggle nav-link">
                            <span>Products</span>
                          </a>
                          <ul class="dropdown-menu">
                            <li class="menu-item  nav-item">
                              <a href="<?php echo site_url('bharatfincash-plan'); ?>" class="dropdown-item nav-link">
                                <span>BharatFinCash Subscription</span>
                              </a>
                            </li>

                          </ul>
                        </li>

                        <li class="menu-item menu-item-has-children dropdown nav-item">
                          <a href="#" class="dropdown-toggle nav-link">
                            <span>Apply Now</span>
                          </a>
                          <ul class="dropdown-menu">
                            <li class="menu-item  nav-item">
                              <a href="<?php echo site_url('subscription/bharatfincash'); ?>"
                                class="dropdown-item nav-link">
                                <span>BharatFinCash Subscription</span>
                              </a>
                            </li>
                          </ul>
                        </li>

                        <li class="header-button menu-item menu-item-has-children dropdown nav-item">
                          <a href="#" class="theme-btn one dropdown-toggle nav-link" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="text-light">Log In <span class="caret" style="margin-left:6px;"></span></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li class="menu-item nav-item">
                              <a href="<?php echo site_url('subscriptioncustomer'); ?>"
                                class="dropdown-item nav-link text-light">BharatFinCash Log In</a>
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
        <!-- end of the loop -->

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
      <!----header----->