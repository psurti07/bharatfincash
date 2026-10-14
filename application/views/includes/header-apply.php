<!DOCTYPE html>
<html lang="en-US" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title><?php if(isset($meta->title)) { echo $meta->title; } else { echo "Indcapital – Apply Instant Loan Online"; } ?></title>
  <meta name="description" content="<?php if(isset($meta->descriptions)) { echo $meta->descriptions; } ?>" />
  <meta name="keywords" content="<?php if(isset($meta->keywords)) { echo $meta->keywords; } ?>" />
  <meta name="author" content="vw-team">
  <link rel="canonical" href="<?php echo base_url(uri_string()); ?>" />
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/logo/favicon-16x16.png'); ?>">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/logo/bharatfincash-favicon.ico'); ?>">

   <!-- Google Fonts -->
   <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Spartan%3A400%2C500%2C600%2C700%2C800%2C900%7CInter%3A300%2C400%2C500%2C600%2C700%2C800%2C900&subset=latin%2Clatin-ext' type='text/css' media='all' />
   <!-- Google Fonts -->
   <script type="text/javascript">     (function(c,l,a,r,i,t,y){         c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};         t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;         y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);     })(window, document, "clarity", "script", "rfotu4h6ch"); </script>
   <link rel='stylesheet' href='<?php echo base_url("assets/css/bootstrap.min.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/owl.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/swiper.min.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/jquery.fancybox.min.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/icomoon.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/flexslider.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/font-awesome.min.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/style.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/scss/elements/theme-css.css?t=1"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/validation/form-validation.css"); ?>' type='text/css' media='all' />
   <!-- Style-->
   <!----woocommerce---->
   <link rel='stylesheet' href='<?php echo base_url("assets/css/woocommerce-layout.css"); ?>' type='text/css' media='all' />
   <link rel='stylesheet' href='<?php echo base_url("assets/css/woocommerce.css"); ?>' type='text/css' media='all' />
   <!----woocommerce---->

<!-- Facebook Domain + Pixel Code -->
<?php 
$fbdomain = getFacebookDomain();
if($fbdomain != Null) {
  echo '<meta name="facebook-domain-verification" content="'.$fbdomain.'" />';
}

$fbpixel = getFacebookPixel('facebookpixel');
if($fbpixel != Null) {
?>
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?php echo $fbpixel; ?>');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $fbpixel; ?>&ev=PageView&noscript=1" /></noscript>
<?php } ?>
<!-- End Facebook Domain + Pixel Code -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16555590592"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-16555590592');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M46Q792Z');</script>
<!-- End Google Tag Manager -->
 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CF1F0E0LRM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-CF1F0E0LRM');
</script>
<!-- Taboola Pixel Code -->
<script type='text/javascript'>
  window._tfa = window._tfa || [];
  window._tfa.push({notify: 'event', name: 'page_view', id: 1719054});
  !function (t, f, a, x) {
         if (!document.getElementById(x)) {
            t.async = 1;t.src = a;t.id=x;f.parentNode.insertBefore(t, f);
         }
  }(document.createElement('script'),
  document.getElementsByTagName('script')[0],
  '//cdn.taboola.com/libtrc/unip/1719054/tfa.js',
  'tb_tfa_script');
</script>
<!-- End of Taboola Pixel Code -->
 <!-- Microsoft tag -->
<script>
  (function(w,d,t,r,u)
  {
    var f,n,i;
    w[u]=w[u]||[],f=function()
    {
      var o={ti:"187177514", enableAutoSpaTracking: true};
      o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")
    },
    n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function()
    {
      var s=this.readyState;
      s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)
    },
    i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)
  })
  (window,document,"script","//bat.bing.com/bat.js","uetq");
</script>
<!-- Microsoft tag -->

<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@graph": [
        {
          "@type": "LocalBusiness",
          "name": "IndCapital",
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
          "name": "IndCapital",
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
          "name": "IndCapital",
          "description": "IndCapital offers digital personal and business loans with flexible EMIs and instant processing. Apply easily online.",
          "publisher": {
            "@type": "Organization",
            "name": "IndCapital",
            "logo": {
              "@type": "ImageObject",
              "url": "https://indcapital.in/assets/images/logo/logo.png"
            }
          }
        }
      ]
    }
  </script>
  <?php if(isset($responsedata['status']) == "true"){?>
<script>
  gtag('event', 'conversion', {
    'send_to': 'AW-17212941039/3mhOCOnegNwaEO_F4o9A',

    /* Conversion values */
    'transaction_id': '<?= $ms_gdata_data['transid'] ?>',
    'value': <?= $ms_gdata_data['amtvalue'] ?>,
    'currency': 'INR',

    /* Enhanced Conversion User Data */
    'user_data': {
      'email': '<?= strtolower(trim($ms_gdata_data['email'])) ?>',
      'phone_number': '+91<?= preg_replace("/[^0-9]/", "", $ms_gdata_data['phone']) ?>',
      'first_name': '<?= strtolower(trim($ms_gdata_data['name'])) ?>',
    }
  });
</script>
<?php } ?>
</head>
<body class="theme-creote left-sidebar">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M46Q792Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  
<div id="page" class="page_wapper hfeed site">
  <div id="wrapper_full" class="content_all_warpper page-wrapper" style="background: #f0f2f5;">
  
    <!----header----->
    <div class="r" id="header_contents">
      <header class="header_default style_one get_sticky_header">
        <header class="new-header-wrapper">
      <div class="header-logo-container">
        <div class="header_left">
          <a href="#" class="main_logo"><img src="<?php echo base_url() ?>assets/images/logo/bharatfincash-logo.png"></a>
        </div>
      </div>
      <!--<div class="header-red-bar">
        <div class="header_right">
          <p><?php echo COMPANY_NAME;?></p>
        </div>
      </div>-->
    </header>
      </header>
      <!-- end of the loop -->
    </div>
    <!----header----->