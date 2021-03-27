<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158068956-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-158068956-1');
  </script>

  <meta charset="utf-8">
  <title>Coin Sample - Get the Latest Cryptocurrency News and Prices!</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="Get the latest Bitcoin, Ethereum, XRP news and the latest stock quotes form one place. See the latest ratings of each cryptocurrency all the way down to Stellar." name="description">

  <script data-ad-client="ca-pub-7867777590859919" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

  <!-- <base href="https://coinsample.com/"> -->

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700|Raleway:400,700&display=swap"
    rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Site Data Json -->
  <script type="text/javascript" src="json/data.json"></script>

  <!-- Partner Data Json -->
  <script type="text/javascript" src="json/partner.json"></script>


  <!-- This is a test -->
  <script type="text/javascript" src="json/crypto-compare-news.json"></script>
  <script type="text/javascript" src="json/crypto-control-news.json"></script>


</head>

<body>

<?php require_once("php/page-components/top-menu.html")?>

  <main id="main">

    <div class="row">

    <!-- MAIN CONTENT -->
    <div class="col-lg-9">
      <div class="site-section site-portfolio">
        <div class="container">
          <?php
            require_once('php/page-components/newsletter-signup.html');
          ?>
          <div class="row mb-5 align-items-center">
            <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
              <h2>We have the latest!</h2>
              <p class="mb-0">Current Crypto Prices and News</p>
            </div>
            <div class="col-md-12 col-lg-6 text-left text-lg-right" data-aos="fade-up" data-aos-delay="100">
              <div class="filters">
                <a href="#portfolio-grid">Coins</a>
                <a href="#partners-section">Partners</a>
                <a href="#latest-news">Latest News Headlines</a>
                <a href="#random-news">Random News</a>
              </div>
            </div>
          </div>
          <div id="portfolio-grid" class="row no-gutter portfolio" data-aos="fade-up" data-aos-delay="200">
          </div>
        </div>
      </div>

      <div class="site-section" id="partners-section">
        <div class="container">
          <div class="row justify-content-center text-center mb-4">
            <div class="col-5">
              <h3 class="h3 heading">Partner Networks</h3>
              <p>These are the picks for the best places to exchange cryptocurrency.</p>
            </div>
          </div>
          <div id="partners" class="row">
            <!-- Dynamic Data -->
          </div>
        </div>
      </div>


      <div class="site-section" id="latest-news">
        <div class="container">
          <div class="row justify-content-center text-center mb-4">
            <div class="col-5">
              <h3 class="h3 heading">Latest Crypto News Headlines</h3>
              <p>What is going on in the crypto markets?</p>
            </div>
          </div>
          <div id="top-news-stories" class="row">
            <!-- Dynamic Data -->
          </div>
        </div>
      </div>

      <div class="site-section pt-0" id="random-news">
        <div class="container">

          <div id = "top-coin-news" class="owl-carousel testimonial-carousel">
            <!-- Dynamic data -->
          </div>

        </div>
      </div>
    </div>
    <!-- //SIDEBAR -->
    <div class="col-lg-3">
      <?php require_once("php/page-components/sidebar-content.html")?>
    </div>
  </div>
  </main>
<?php require_once("php/page-components/footer.html")?>

<!-- dynamic data from sources (must run before owl carousel js) -->
<script type="text/javascript" src="js/homeData.js"></script>

  <!-- Vendor JS Files -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/jquery/jquery-migrate.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/easing/easing.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>
  <script src="vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="vendor/aos/aos.js"></script>
  <script src="vendor/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>
