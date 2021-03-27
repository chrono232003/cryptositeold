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
  <title>The latest quotes and news for crytocurrency.</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="Detailed information on cryptocurrencies (Bitcoin, XRP, Stallar, Ethereum) as well as the latest news headlines.)" name="description">

  <script data-ad-client="ca-pub-7867777590859919" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

  <base href="https://coinsample.com/">

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

  <!-- News Data Json -->
  <script type="text/javascript" src="json/news.json"></script>

</head>

<body>

<?php require_once("php/page-components/top-menu.html")?>

  <main id="main">

    <div class="site-section site-portfolio">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div id ="div-title"class="col-md-6" data-aos="fade-up">
            <!-- dynamic data -->
          </div>
          <div class="col-md-12 col-lg-6 text-left text-lg-right" data-aos="fade-up" data-aos-delay="100">
            <div class="filters">
              <a href="#coin-info">Coin Info</a>
              <a href="#latest-news">Latest News Headlines</a>
              <a href="#random-news">Random News</a>
            </div>
          </div>
        </div>
      </div>
    </div>

      <div class="site-section pb-0" id="coin-info">
        <div class="container">
          <div class="row align-items-stretch">
            <div class="col-md-3" data-aos="fade-up"  id="image-container">
              <!-- <img src="img/img_1_big.jpg" alt="Image" class="img-fluid"> -->
            </div>
            <div class="col-md-8 ml-auto" data-aos="fade-up" data-aos-delay="100">
              <div class="sticky-content" id="side-content"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- News Section -->
      <div class="site-section pb-0" id="latest-news">
        <div class="row justify-content-center text-center mb-4">
          <div class="col-5">
            <h3 class="h3 heading">Latest Crypto News</h3>
            <p>Get the latest crypto headlines and stories below.</p>
          </div>
        </div>
        <div class="container">

          <div id ="news-stories" class="row">
              <!-- Dynamic Data -->
          </div>
        </div>
      </div>


      <!-- <div class="site-section pb-0">
        <div class="container">
          <div class="row justify-content-center text-center mb-4">
            <div class="col-5">
              <h3 class="h3 heading">More Works</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit explicabo inventore.</p>
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
              <a href="work-single.html" class="item-wrap fancybox">
                <div class="work-info">
                  <h3>Boxed Water</h3>
                  <span>Web</span>
                </div>
                <img class="img-fluid" src="img/img_1.jpg">
              </a>
            </div>
            <div class="item photography col-sm-6 col-md-4 col-lg-4 mb-4">
              <a href="work-single.html" class="item-wrap fancybox">
                <div class="work-info">
                  <h3>Build Indoo</h3>
                  <span>Photography</span>
                </div>
                <img class="img-fluid" src="img/img_2.jpg">
              </a>
            </div>
            <div class="item branding col-sm-6 col-md-4 col-lg-4 mb-4">
              <a href="work-single.html" class="item-wrap fancybox">
                <div class="work-info">
                  <h3>Cocooil</h3>
                  <span>Branding</span>
                </div>
                <img class="img-fluid" src="img/img_3.jpg">
              </a>
            </div>
            <div class="item design col-sm-6 col-md-4 col-lg-4 mb-4">
              <a href="work-single.html" class="item-wrap fancybox">
                <div class="work-info">
                  <h3>Nike Shoe</h3>
                  <span>Design</span>
                </div>
                <img class="img-fluid" src="img/img_4.jpg">
              </a>
            </div>
            <div class="item photography col-sm-6 col-md-4 col-lg-4 mb-4">
              <a href="work-single.html" class="item-wrap fancybox">
                <div class="work-info">
                  <h3>Kitchen Sink</h3>
                  <span>Photography</span>
                </div>
                <img class="img-fluid" src="img/img_5.jpg">
              </a>
            </div>
            <div class="item branding col-sm-6 col-md-4 col-lg-4 mb-4">
              <a href="work-single.html" class="item-wrap fancybox">
                <div class="work-info">
                  <h3>Amazon</h3>
                  <span>brandingn</span>
                </div>
                <img class="img-fluid" src="img/img_6.jpg">
              </a>
            </div>
          </div>
        </div>
      </div> -->



      <div class="site-section pt-0" id="random-news">
        <div class="container">

          <div id = "top-coin-news" class="owl-carousel testimonial-carousel">
            <!-- Dynamic data -->
          </div>

        </div>
      </div>
  </main>

<?php require_once("php/page-components/footer.html")?>

<!-- dynamic data from sources (must run before owl carousel js) -->
  <script type="text/javascript" src="js/singleCoin.js"></script>

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
