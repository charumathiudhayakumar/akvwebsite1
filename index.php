<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Website Design & Development,Digital Marketing SEO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 <!-- Favicons -->
   <link rel="icon" href="assets/img/icons/favicon.ico" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <script src="https://kit.fontawesome.com/1a38d929a9.js" crossorigin="anonymous"></script>


  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/custom.css">

  <!--Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,700&family=Lobster&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-------hero slider------------------------------------>

<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
<link href="pure-js-slider.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,700&display=swap" rel="stylesheet">

<script async src="https://www.googletagmanager.com/gtag/js?id=G-WJG7ZH9Q3D"></script>

<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z4LK46XBSX"></script> 
<script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-Z4LK46XBSX'); </script>
<!-- End Google Tag Manager -->



<script type="text/javascript">
  $(document).ready(function() {
    var $slider = $(".slider"),
      $slideBGs = $(".slide__bg"),
      diff = 0,
      curSlide = 0,
      numOfSlides = $(".slide").length - 1,
      animating = false,
      animTime = 500,
      autoSlideTimeout,
      autoSlideDelay = 4000,
      $pagination = $(".slider-pagi");

    function createBullets() {
      for (var i = 0; i < numOfSlides + 1; i++) {
        var $li = $("<li class='slider-pagi__elem'></li>");
        $li.addClass("slider-pagi__elem-" + i).data("page", i);
        if (!i) $li.addClass("active");
        $pagination.append($li);
      }
    };
    createBullets();

    function manageControls() {
      $(".slider-control").removeClass("inactive");
      if (!curSlide) $(".slider-control.left").addClass("inactive");
      if (curSlide === numOfSlides) $(".slider-control.right").addClass("inactive");
    };

    function autoSlide() {
      autoSlideTimeout = setTimeout(function() {
        curSlide++;
        if (curSlide > numOfSlides) curSlide = 0;
        changeSlides();
      }, autoSlideDelay);
    };
    autoSlide();

    function changeSlides(instant) {
      if (!instant) {
        animating = true;
        manageControls();
        $slider.addClass("animating");
        $slider.css("top");
        $(".slide").removeClass("active");
        $(".slide-" + curSlide).addClass("active");
        setTimeout(function() {
          $slider.removeClass("animating");
          animating = false;
        }, animTime);
      }
      window.clearTimeout(autoSlideTimeout);
      $(".slider-pagi__elem").removeClass("active");
      $(".slider-pagi__elem-" + curSlide).addClass("active");
      $slider.css("transform", "translate3d(" + -curSlide * 100 + "%,0,0)");
      $slideBGs.css("transform", "translate3d(" + curSlide * 50 + "%,0,0)");
      diff = 0;
      autoSlide();
    }

    function navigateLeft() {
      if (animating) return;
      if (curSlide > 0) curSlide--;
      changeSlides();
    }

    function navigateRight() {
      if (animating) return;
      if (curSlide < numOfSlides) curSlide++;
      changeSlides();
    }
    $(document).on("mousedown touchstart", ".slider", function(e) {
      if (animating) return;
      window.clearTimeout(autoSlideTimeout);
      var startX = e.pageX || e.originalEvent.touches[0].pageX,
        winW = $(window).width();
      diff = 0;
      $(document).on("mousemove touchmove", function(e) {
        var x = e.pageX || e.originalEvent.touches[0].pageX;
        diff = (startX - x) / winW * 70;
        if ((!curSlide && diff < 0) || (curSlide === numOfSlides && diff > 0)) diff /= 2;
        $slider.css("transform", "translate3d(" + (-curSlide * 100 - diff) + "%,0,0)");
        $slideBGs.css("transform", "translate3d(" + (curSlide * 50 + diff / 2) + "%,0,0)");
      });
    });
    $(document).on("mouseup touchend", function(e) {
      $(document).off("mousemove touchmove");
      if (animating) return;
      if (!diff) {
        changeSlides(true);
        return;
      }
      if (diff > -8 && diff < 8) {
        changeSlides();
        return;
      }
      if (diff <= -8) {
        navigateLeft();
      }
      if (diff >= 8) {
        navigateRight();
      }
    });
    $(document).on("click", ".slider-control", function() {
      if ($(this).hasClass("left")) {
        navigateLeft();
      } else {
        navigateRight();
      }
    });
    $(document).on("click", ".slider-pagi__elem", function() {
      curSlide = $(this).data("page");
      changeSlides();
    });
  });
</script>

 
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <ul class="top-header p-2">
    
     <!--<li><a href="https://wa.me/919620826156" class="client-login"target="_blank" id="myBtn"><i class="fa fa-whatsapp"></i> WhatsApp</a></li>-->
     <li><a href="https://wa.me/919620826156" class="client-login"target="_blank" id="myBtn"><i class="fa fa-whatsapp"></i> WhatsApp</a></li>
      <li><a href="https://rzp.io/l/akvtechnologies" class="btn btn-large bg-white text-dark px-5 d-none d-lg-block d-md-block" target="_blank">Pay now</a></li>
      <div class="social-links p-2">
        <a href="https://twitter.com/i/flow/login?redirect_after_login=%2FAkvTechnologies" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/AKVTechnologies" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/akvtechnologies/?hl=en" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://in.pinterest.com/akvtechnologiesDM/" class="google-plus"><i class="bx bxl-pinterest"></i></a>
        <a href="https://in.linkedin.com/company/akv-technologies" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>

      <li><a href="tel:+919620826156" class="contact"><i class="fas fa-phone-alt"></i>+91 96208 26156 </a></li>
     
    </ul>
    <!-- <hr> -->
    <div class="container d-flex align-items-lg-start justify-content-lg-between">
      <div class="logo">
        <a href="https://www.akvtechnologies.com/">
            <img src="assets/img/logo.png" width="auto" height="auto">
        <span style="color: #335dc8; font-size: 12px;"> AKV Technologies</span>
    </a> 
      </div>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="https://www.akvtechnologies.com/">Home</a></li>
          <li><a class="nav-link scrollto" href="Aboutus.php">About</a></li>
          <!-- <li><a class="nav-link scrollto" href="#"></a></li> -->
          <li><a class="nav-link scrollto " href="Portfolio.php">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="blog.php">Blog</a></li>
          <li class="dropdown"><a href="#services"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="webdesign.php">Website Design</a>
               <li class="dropdown"><a href="Graphicdesing.php">Graphic Design</a></li>
                 <li class="dropdown"><a href="e-commerce-website.php">E-Commerce Website</a></li>
                </li>
             
              <li class="dropdown"><a href="#"><span>Digital Marketing</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="seo.php">Search Engine Optimization (SEO)</a></li>
                  <li><a href="digital-marketing-agency.php">Digital Marketing Strategy</a></li>
                  <!-- <li><a href="ppc.php">PPC Marketing</a></li> -->
                  <li><a href="google-analytics.php">Google Analytic Services</a></li>
                  <!-- <li><a href="email-marketing.php">Email Marketing Services</a></li> -->
                </ul>
              </li>
              <li class="dropdown"><a href="social-media-marketing.php"><span>Social Media Marketing</span></a> </li>
              <!-- <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li> --> 
              <li class="dropdown"><a href="softwaredevelopment.php"><span>Software Developement</span></a> </li>
             
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="career.php">Career</a></li>

          <li><a class="nav-link scrollto" href="contactUs.php">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
      <button type="button" class="btn get-started-btn  scrollto mx-3 bg-blue px-3 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Get Proposal 
</button>
<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3 get_popup_model">
      <div class="modal-header pt-0">
        <h5 class="modal-title" id="exampleModalLabel">Get Proposal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-1">
         <form action="popup-mail.php" class="model-container" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Name">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                <input type="number" class="form-control" name="phno" id="exampleFormControlInput1" placeholder="Contact Number">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Message</label>
              <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="submit">
              </div>
    </form>
      </div>
    </div>
  </div>
</div>
      <!-- <a href="#contact" class="get-started-btn scrollto text-lg-white">Get Proposal </a> -->
      <!-- <button class="get-started-btn scrollto">Get Quote </button> -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section class="pb-0 pt-0 ">
      <div class="slider-container">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  <div class="slider">
    <div class="slide slide-0 active">
   
      <div class="slide__bg" style=" background-image: url('assets/img/slider1.png');"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text pb-5">
          <h2 class="slide__text-heading text-white" style="font-family: 'Bricolage Grotesque', sans-serif;">The Right Digital Agency</h2>
          <p class="slide__text-desc">You Have Better Things To Do Then Worry About Your Business  </p>
          <a class=" btn btn-lg text-white slide__text-link" href="#contact" target="_blank" style="font-family: 'Lobster',sans-serif;">Know More</a>
        </div>
      </div>
    </div>
     
    <div class="slide slide-1 pb-5">
      <div class="slide__bg" style=" background-image: url('assets/img/slider2.png');"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text pb-5">
          <h2 class="slide__text-heading text-white" style="font-family: 'Bricolage Grotesque', sans-serif;">Digital Web Design Solutions Agency</h2>
          <p class="slide__text-desc" style="font-family: 'Roboto', sans-serif;">Crafting digital strategies that work</p>
          <a class="btn btn-lg text-white slide__text-link" href="#contact" target="_blank"style="font-family: 'Lobster',sans-serif;">Know More</a>
        </div>
      </div>
    </div>
 <div class="slide slide-2 ">
      <div class="slide__bg" style=" background-image: url('assets/img/slider3.png');"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading text-white" style="font-family: 'Bricolage Grotesque', sans-serif;">We Build Modern Website for your Business</h2>
          <p class="slide__text-desc" style="font-family: 'Roboto', sans-serif;">We aim to deliver quality creative solutions</p>
          <a class="btn btn-lg text-white slide__text-link" href="#contact" target="_blank" style="font-family: 'Lobster',sans-serif;">Know More</a>
        </div>
      </div>
    </div> 
  </div>
    </div>
  </section>
  
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about bg-color">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2 class="h-title">About</h2>
          <!-- <p>What We DO</p> -->
        </div>
        <div class="row">
         <!--  <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/hero-bg.jpg" class="img-fluid" alt="">
          </div> -->
          <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 content text-center" data-aos="fade-right" data-aos-delay="100">
            <h3>A Digital Marketing Agency Where Ideas Converge With Trends.</h3>
            <p class="pt-5">
              AKV is a India-based full-service digital marketing agency that helps
              businesses establish effective brands that earn market share and expand.
              We've combined the power of traditional web marketing with the
              in-demand technologically driven new-age digital media. We are the ideal
              one-stop solution for digital branding and digital marketing solutions that
              help firms reach their marketing objectives.
            </p>
            <p>
              Our digital marketing
              techniques are in accordance with current digital marketing trends. We
              consistently invigorate our skill-set and tech-expertise and work with a
              high-level integrity. The deal has only one goal: to promote your business
              in front of your target customers.
            </p>
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->

          <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients " >
        <div class="container" data-aos="zoom-in">
          <div class="section-title mt-5">
            <h2 class="h-title">Work</h2>
            <h3>What We Work</h3>
          </div>
          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide"><img src="assets/img/clients/web-p1.png" class="swipper-slider-image" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/fb-1.png" class="swipper-slider-image" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/google-1.png" class="swipper-slider-image" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/google-2.png" class="swipper-slider-image" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/web-p2.png" class="swipper-slider-image" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/google-3.png" class="swipper-slider-image" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/web-p3.png" class="swipper-slider-image" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/google-4.png" class="swipper-slider-image" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/in.png" class="swipper-slider-image" alt=""></div>

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section>
    <!-- End Clients Section -->

    <!-- ======= Features Section ======= -->
    <!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services bg-color" style=" background-image: url('assets/img/pattern11.png')  ;background-repeat:no-repeat;">
      <div class="container" data-aos="fade-up" id="Offerings">

        <div class="section-title">
          <h2 class="h-title">Services</h2>
          <h3>Our Core Offerings</h3>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="http://akvtechnologies.com/webdesign.php" target="_blank">WebSite Development</a></h4>
              <p>We use the latest web technologies like HTML5, Bootstrap, and jQuery to
                create a product list that you will be able to run on every device. AKV is the
                best place for Modern design techniques and overall excellence
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="akvtechnologies.com/seo.php" target="_blank">Digital Marketing</a></h4>
              <p>Keeping up with the pace of the evolving trends, we offer a full suite of
                digital marketing solutions that expand your online visibility and increase
                conversions. Choose the best digital marketing agency in Bangalore. Our
                services meet all the set quality standards.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="akvtechnologies.com/contactUs.php" target="_blank">It Consultant</a></h4>
              <p>A company's technology organization should support its business strategy,
                not constrain it. AKV focuses first on the strategic needs of our clients'
                businesses to determine the technology capabilities needed to support their
                long-term goals.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="https://www.akvtechnologies.com/digital-marketing-agency.php" target="_blank">Digital Branding</a></h4>
              <p>We offer a variety of services to employ the most popular platforms and
                strategies to generate leads and conversions for your business, based on our
                extensive expertise conducting performance campaigns.                
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="https://www.akvtechnologies.com/softwaredevelopment.php" target="_blank">Technology Enablement</a></h4>
              <p>When your target audience visits you online, we construct world-class
                websites and mobile applications to guarantee you make the correct
                first impression.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="https://www.akvtechnologies.com/e-commerce-website.php" target="_blank"></a>E-Commerce WebSite</h4>
              <p>A company's technology organization should support its business strategy,
                not constrain it. AKV focuses first on the strategic needs of our clients'
                businesses to determine the technology capabilities needed to support their
                long-term goals.</p>
            </div>
          </div>

        </div>
        <div class="col-lg-6 offset-lg-6 mt-5 ">
          <a href="https://www.akvtechnologies.com/contactUs.php" class="btn btn-lg text-white slide__text-link" style="font-family: 'Lobster',sans-serif;">Know More</a>
        </div>
 
      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="section features" style=" background-image: url('assets/img/pattern-5.png') ;background-repeat:no-repeat;">
      <div class="container" data-aos="fade-up">
          <div class="section-title mt-5">
            <h2 class="h-title lh-base">Three Digital Marketing Steps To Driving Your Success</h2>
            <h3 class="pt-5">Determine Who Your Targeted Audience Are</h3>
          </div>
        <div class="row">
          <div class="image col-lg-6" style='background-image: url("assets/img/about.png");' data-aos="fade-right"></div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
              <!-- <i class="bx bx-receipt"></i>
              <h4>Est labore ad</h4> -->
              <p>Knowing who your targeted audience are,
                how they want to interact with your
                business, and how they want to know about
                the goods/services/promotions you offer is
                the most critical component of developing a
                digital marketing plan.<br><br> Examine your
                customer's purchase process across all of
                your media before developing a digital
                marketing plan to match. The first step is to
                figure out where your customers look for
                your products or services, whether it's
                online, offline, or on their phones. </p>
                <div class="col-lg-6 offset-lg-1 mt-5 ">
                  <a class="btn btn-lg text-white slide__text-link" style="font-family: 'Lobster',sans-serif;">Know More</a>
                </div>
            </div>
           
          </div>
        </div>
          
      </div>
    </section>
    <!-- End Features Section-->
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts bg-color">
          <div class="container">
            <div class="section-title">
              <h3>Consider A Mobile Strategy</h3>
            </div>
            <div class="row no-gutters">
              <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="content d-flex flex-column justify-content-center">
                  <!-- <h3>Customized Digital Marketing Strategy</h3> -->
                  <p class="p-sm-3">
                    When it comes to shopping, consumers
                    depend on their smartphones. M-commerce
                    has become an integral element of the
                    shopping experience, whether it's
                    researching products and promotions
                    in-store or completing the entire customer
                    journey on a mobile device. Our Businesses
                    must respond by prioritizing mobile in their
                    digital marketing plan, beginning with a
                    mobile-responsive website.<br><br> Mobile must no
                    longer be an afterthought or an expense; it
                    must be at the core of all strategy and
                    decisions. A simple app and a fresh website
                    with relevant information can drive in a whole
                    new set of customers.
                  </p>
                  
                  <div class="col-lg-6  mt-5 ">
                  <a class="btn btn-lg text-white slide__text-link" style="font-family: 'Lobster',sans-serif;">Know More</a>
                  </div>
                </div>
                <!-- End .content-->
              </div>
                <div class="image col-xl-5 col-sm-10  d-flex align-items-end  justify-content-lg-end p-5" data-aos="fade-up"></div>
            </div>
          </div>
        </section>
        <!-- End Counts Section -->
        <section id="features" class="features"  style='background-image: url("assets/img/pattern-6.png");' data-aos="fade-right">
          <div class="container" data-aos="fade-up">
              <div class="section-title">
                <h3>Pay Attention To Your Clients</h3>
              </div>
            <div class="row">
              <div class="image col-lg-6" style='background-image: url("assets/img/about3.png");' data-aos="fade-right"></div>
              <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
                <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                  <!-- <i class="bx bx-receipt"></i>
                  <h4>Est labore ad</h4> -->
                  <p>Companies may learn a lot about how
                    to customize data and content to the
                    needs of their customers by analyzing
                    the data they generate. The more
                    customers interact with businesses
                    through digital channels. Business
                    decision-makers now have access to a
                    wide range of information that was
                    previously unavailable. <br><br>Adopters will
                    likely have relative merits rewards for
                    being among the first to capitalize on
                    these insights. Will show you how
                    clients find your business (both offline
                    and online), where they are, what else
                    they are looking for, what they are
                    looking at, and how long they are
                    looking at it. This information can be
                    used to boost your company's
                    conversion rates.  </p>
                    <div class="col-lg-6 offset-lg-0  oofset-sm-2 mt-5 ">
                      <a class="btn btn-lg text-white slide__text-link" style="font-family: 'Lobster',sans-serif;">Know More</a>
                    </div>
                </div>
                
              </div>
            </div>
    
          </div>
        </section>

        <section id="fetured_services" class="fetured_services">
          <div class="container" data-aos="zoom-in">
            <div class="">
              <div class="section-title">
                <h2 class="h-title" >Connecting your business with the world</h2>
                <h3>Branding <a href="f">(FLYMY BRAND)</a> Services</h3>
              </div>
            <div class="row">
              
              <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
                <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                  <!-- <i class="bx bx-receipt"></i>
                  <h4>Est labore ad</h4> -->
                  <p class="p-sm-3">Startup branding is the process of creating a unique and compelling identity for a new business venture. It involves establishing a strong and memorable presence in the market that sets the startup apart from its competitors and resonates with its target audience. Effective branding goes beyond just designing a logo; 
                    it encompasses the startup's values, mission, personality, and the overall experience it aims to provide to customers.</p>
                </div>
                <div class="col-lg-6 mt-5 ">
                <a class="btn btn-lg text-white slide__text-link" style="font-family: 'Lobster',sans-serif;">Know More</a>
                </div>
                </div>


                <div class="col-lg-6"  data-aos="fade-right">
                <div class="row">
                  <div class="col-lg-6">
                  <a class="card1" href="#">
                      <h3>Startup  Branding</h3>
                      <p class="small">Brand Identity ,Design a Distinctive Logo,Build an Online Presence,Craft a Compelling Brand Story</p>
                      <div class="go-corner" href="#">
                        <div class="go-arrow">
                          →
                        </div>
                      </div>
                    </a>
                    </div>
                    <div class="col-lg-6">
                    <a class="card1" href="#">
                      <h3>MSMEs</h3>
                      <p class="small">Focus on Local Identity,Storytelling,Emphasize Personalization,Visual Identity,Partnerships and Collaborations,Sustainability and Social Responsibility</p>
                      <div class="go-corner" href="#">
                        <div class="go-arrow">
                          →
                        </div>
                      </div>
                    </a>
                    </div>
                  
                    <div class="col-lg-6">
                    <a class="card1" href="#">
                      <h3>offline marketting</h3>
                      <p class="small">Print Advertising,Outdoor Advertising,Radio and Television Advertising,Vehicle Branding,Public Relations (PR)</p>
                      <div class="go-corner" href="#">
                        <div class="go-arrow">
                          →
                        </div>
                      </div>
                    </a>
                    </div>
                  
                    <div class="col-lg-6">
                    <a class="card1" href="#">
                      <h3>online marketing.</h3>
                      <p class="small">SEO, Pay-Per-Click Advertising (PPC), Social Media Marketing,Video Marketing,E-commerce and Online Sales:</p>
                      <div class="go-corner" href="#">
                        <div class="go-arrow">
                          →
                        </div>
                      </div>
                    </a>
                    </div>
                  </div>              
                </div>
            </div>
</section>


            <!-- ======= Testimonials Section ======= -->
           
    <section id="testimonials" class="testimonials section">
      <div class="container" data-aos="zoom-in">
        <div class="section-title mt-5">
          <h2 class="h-title" >What they are talking about agency?</h2>
          <h3 class="">Clients feedback</h3>
          <p>Promises, we keep. Success, they enjoy.</p>
        </div>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Sadeer Sabbak</h3>
                <!-- <h4>Ceo &amp; Founder</h4> -->
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  This team of experts and strategic minds helped us to increase my
                  E-commerce business. They work on each and every need for our business
                  growth as they are known to keep their promises
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Kelly Paxton</h3>
                <!-- <h4>Designer</h4> -->
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  This team is incredible. They continue to amaze me every step of the way.
                  We use them for all of our marketing, including building our website,
                  advertising on Google, blog posts, etc. They continue to provide quality
                  leads and recommendations through the pandemic. I rely on them heavily
                  for all my marketing needs. Thank you so much to the team!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Christine Rawson</h3>
                <!-- <h4>Store Owner</h4> -->
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Great things to say about AKV Technologies. They have such an incredible
                  team that helps walk you through a customized digital marketing strategy
                  created for your specific business goals. Their ability to optimize SEO and
                  increase Google search rank helps consistently bring in new clients. I
                  highly recommend working with AKV Technologies if you are looking to
                  take your digital marketing efforts to the next level.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Jesse Couch</h3>
                <!-- <h4>Freelancer</h4> -->
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Having worked with many marketing companies over the years, I can say
                  AKV Technologies has been the best. The innovative strategies and
                  consistent outcomes make AKV Digital Marketing an SEO company not to
                  be ignored.

                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            
            <!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
    
    <!--ooh section starts------------------------>
    <section id="ooh_services" class="ooh_services section" style='background-image: url("assets/img/pattern-8.png");background-repeat: no-repeat;background-size:cover;' data-aos="fade-right">

      <div class="container" data-aos="zoom-in">
        <div class="section-title mt-5">
          <h2 class="h-title">Scale Your Business With Our Services</h2>
          <h3 class="">OOH Services</h3>
          </div>
          <div class="row">
        <div class="cards col-lg-12">
          
            <div class="card card-one col-lg-10 ">
            <h2 class="card-title">
              Bill Board </h2>
            <p class="lead">Advertisements</p>
            <p class="description">High Visibility,Constant Exposure,Local Targeting,Brand Awareness,Complementary to Digital Campaigns</p>
          </div>
          
          
          
          <div class="card card-two  col-sm-6 col-lg-4">
            <h2 class="card-title">Bus Shelter</h2>
            <p class="lead">Advertisements</p>
            <p class="description">Localized Marketing,Enhanced Brand Recognition,Dual Audience,24/7 Exposure,Dual Audience</p>
          </div>
         

          
          <div class="card card-three">
            <h2 class="card-title">SkyWalk</h2>
            <p class="lead">Advertisements</p>
            <p class="description">High Foot Traffic,Captive Audience,Elevated Visibility,Exclusive Placement,Brand Impact,Direct Interaction</p>
          </div>
          </a>
          
         
          <div class="card card-four">
            <h2 class="card-title">DOOH</h2>
            <p class="lead">Advertisements</p>
            <p class="description">Digital Billboards,Malls and Retail,Entertainment Venues,Attention-Grabbing,Airports</p>
          </div>
          
          
        </div>
      </div>


    </section>
    <!----ooh section ends--------------------->
    <!-- End Testimonials Section -->
    <section class="p-0"  style='background-image: url("assets/img/pattern-7.png");'>
      <div class="sectiontitle">
        <h2 >Let The Numbers Speak</h2>
        <span class="headerLine"></span>
      </div>
     <div id="projectFacts" class="sectionClass" data-aos="fade-up">
     <div class="fullWidth eight columns">
      <div class="projectFactsWrap ">
          <div class="item wow fadeInUpBig animated animated"  data-number="430" style="visibility: visible;">
              <i class="fa fa-briefcase"></i>
              <p id="number1" class="number purecounter" data-purecounter-start="100" data-purecounter-end="430" data-purecounter-duration="4">9+</p>
               <span ></span>
              <p>Completed Projects</p>
          </div>
          <div class="item wow fadeInUpBig animated animated" data-number="11" style="visibility: visible;">
              <i class="fa fa-smile-o"></i>
              <p id="number2" class="number purecounter" data-purecounter-start="0" data-purecounter-end="11" data-purecounter-duration="4">35</p>
              <span></span>
              <p>Successful Years</p>
          </div>
          <div class="item wow fadeInUpBig animated animated" data-number="20" style="visibility: visible;">
              <i class="fa fa-coffee"></i>
              <p id="number3" class="number purecounter" data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="4">359</p>
              <span></span>
              <p>Counteris with Clients</p>
          </div>
          <div class="item wow fadeInUpBig animated animated" data-number="900" style="visibility: visible;">
              <i class="fa fa-camera"></i>
              <p id="number4" class="number purecounter" data-purecounter-start="0" data-purecounter-end="900" data-purecounter-duration="4">246</p>
              <span></span>
              <p>Customer Satisfaction</p>
          </div>
      </div>
  </div>
  </div>
</section>
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta section" >
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <!-- <h3>Call To Action</h3> -->
          <h3>Ready To Grow Your Business?</h3>
          <p> Contact us to work with a results-driven digital marketing agency.</p>
          <a class="cta-btn" href="#">Get Free Proposal </a> <span> Or </span> <a class="cta-btn" href="#">
          Call +1(347)836-4883</a>
        </div>

      </div>
    </section>
    <!-- End Cta Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact"  style='background-image: url("assets/img/lines2.png");'>
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 class="h-title">Get In Touch </h2>
          <br>   <h6><u><i>Have any project on mind! feel free contact with us or say hello</i></u></h6>
          <h3>Send us Message</h3>
       
        </div>

        <!-- <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div> -->

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Registered Address:</h4>
                <p>4th Floor, Classic Arena, 1597/2662, AECS Layout, A Block, Singasandra, Bangalore, Karnataka, India, 560068</p>
                
                <h4 class="pt-4 mb-0">USA</h4>
                     <p>651, N. Broad St, Suitr 206, Middletown , DE - 19709</p>
                 
                 <h4 class="pt-4 mb-0">Our Corporate Address</h4>
                  <p>AKV Technologies <br>B-Block, BHIVE Workspace - No.112,</p>
              <p>AKR Tech Park, "A" and, 7th Mile Hosur Rd, </p>
              <p>Krishna Reddy Industrial Area,<br> Bengaluru, Karnataka - 560068</p>
              </div>
             </div>
            </div>

        <div class="col-lg-4">
            <div class="info">
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@akvtechnologies.com</p>
              </div>
            </div>
        </div>
        
         <div class="col-lg-4">
            <div class="info">
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p> <a href="tel:+919620826156">+91 96208 26156</a></p>
              </div>
            </div>
            </div>
            
            </div>

          </div>

          <div class="col-lg-12 mt-5 mt-lg-0 c-form" id="contact">

            <form action="mail-contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="number" class="form-control" name="subject" id="phno" placeholder="contact Number" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

    
<style>
    /* onload popup css */
.on_load_frm{
  background: transparent !important;
  padding:15px !important;
  border:2px 4px #fff  !important;
  border-style: inset;
  border-radius:10% 10%;
}
form-label{
  color:#335dc8;
}
#onload{
  background-color: transparent !important;
}
.modal .onload{
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 120px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}
.modal-content .onload{
  position: relative;
  display: flex;
  flex-direction: column;
  width: 100%;
  pointer-events: auto;
  background-color: #fff;
  background-image: url('assets/img/popupbg.png');
  background-repeat: no-repeat0;
  background-size: top left center;
  background-clip: padding-box;
  border:none !important;
  border-style: inset;
  border-radius:10% 10%;
  box-shadow: 3px 3px 2px #d6d6d6;
  outline: 0;
}
.icon-color{
  color: #335dc8 !important;
}
</style>



<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 16512513;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/16512513/" rel="nofollow">Chat with us</a>, powered by <a href="https://akvtechnologies.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->


 


  <!-- ======= Footer ======= -->
 <?php
 include('footer.php');
 ?>

  
  
  
</body>

</html>