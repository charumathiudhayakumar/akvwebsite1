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
    <ul class="top-header">

      <li> <b>Connect With Us</b> <a href="https://api.whatsapp.com/send?phone=+919620826156&text=Welcomeakv tecknologies" class="client-login" id="myBtn" ><i class="fa fa-whatsapp"></i> WhatsApp</a></li>
      <li><a href="https://rzp.io/l/akvtechnologies" class="btn btn-large bg-white text-dark px-5 d-none d-lg-block d-md-block" target="_blank">Pay now</a></li>
      <div class="social-links ">
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
               <li class="dropdown"><a href="Graphicdesing.php">Graphic Design</a></li>

              <li class="dropdown"><a href="webdesign.php">Website Design <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="e-commerce-website.php">E-Commerce Website</a></li>
                 
                </ul>
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
    <div class="modal-content">
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

  
  <!-- Header Main Section -->
  <section class="pt-0">
  <div class="header-main">
    <h6 class="page-navigation">Services <i class="bi bi-arrow-right"></i> Digital Marketing <i class="bi bi-arrow-right"></i><a href="ppc"> PPC Marketing</a></h6>
      <div class="header-details row " data-aos="zoom-in" data-aos-delay="150">
        <h1>PAY PER CLICK </h1>

          <div class="header-details-ppc">
            <h3>Search Engine Marketing (PPC)</h3>
            <p>Eliminate Wasteful Ad Spend And Maximize Your Company's ROI. <br> With Full Funnel PPC Services <br> Advertise, analyse, and optimize! We do it all for you.</p>

          </div>

      </div>
      <div class="header-image">
        <img src="assets/img/ppc.jpg" data-aos="fade-left" alt="ppc management services,marketing agency,digital marketing agency,online marketing,digital marketing company">
      </div>
      <a class="get-report get-started-btn text-white" data-aos="fade-up" data-aos-delay="150" href="#contact">Get Proposal <i class="bi bi-arrow-right-circle"></i></a>
   </div>
</section>
  <!-- ======= About Section ======= -->
  <section id="about" class="about pt-5"style="padding-top:80px;">>
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/ppc2.png" class="img-fluid mt-5" alt="ppc management services,marketing agency,digital marketing agency,online marketing,digital marketing company">
          </div>
          <div class="col-lg-8 pt-5 pt-lg-0 order-2 order-lg-1 content text-left" data-aos="fade-right" data-aos-delay="100">
              
          <div class="section-title">
              <h2 class="h-title">PPC</h2>
              <p>Why Paid Search Works</p>
            </div>
                  
            <ul>
              <li><i class="ri-check-double-line"></i>There are more opportunities today to reach your customers and prospects than ever before. At the same time, there’s more competition.  </li>
              <li><i class="ri-check-double-line"></i>Results pages and social media platforms are flooded with content.</li>
              <li><i class="ri-check-double-line"></i> Millions of blogs, videos, and graphics are published every single minute. This information overload makes it harder than ever to get your message in front of the people who matter most.</li>
              <li><i class="ri-check-double-line"></i>Unless you use paid search. . Paid search campaigns allow you to target your audiences (based on who there are, where they live, what their interests are, and more) and guarantee that your message hits its mark.</li>
          </ul>
            
          </div>
        </div>

      </div>


  </section>
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
<div class="container" data-aos="fade-up">

  <div class="section-title">
    <h2 class="h-title">Our Services</h2>
    <p>Different Types of PPC Ads</p>
  </div>

  <div class="row">
    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
      <div class="icon-box">
        <div class="icon"><i class="bx bxl-dribbble"></i></div>
        <h4><a href="">Search Ads</a></h4>
        <p>Search advertising is the most common form of paid search marketing. Search ads appear to prospects who are already looking for your industry or brand offerings online. These pay per click ads are suitable for short sales cycles or one-time campaign promotions. Our pay per click advertising firm recommends search advertising to businesses aiming to acquire strong, high-quality leads from new customers.</p>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
      <div class="icon-box">
        <div class="icon"><i clas s="bx bx-file"></i></div>
        <h4><a href="">Display Ads</a></h4>
        <p>Display advertising is known for its effectiveness in reaching more than 90 percent of online users. Display ads appear on Google’s partner websites, targeting people who visited industry-related sites. Display advertising maximizes photos and texts to capture the online users’ attention and convince them to take action. Our pay per click advertising agency recommends display advertising to companies with lengthy sales cycles and niche or luxury customers. </p>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
      <div class="icon-box">
        <div class="icon"><i class="bx bx-tachometer"></i></div>
        <h4><a href="">Remarketing </a></h4>
        <p>Remarketing is one of the best ways to reach high-converting customers and double your turnovers. Remarketing ads remind people who have already visited your website to come back and compel them to convert. Unlike search advertising, remarketing is relatively cheaper because there are lower competition and highly targeted customer segments. Our PPC marketing firm uses smart PPC ad formats and extensions to produce significant results with your PPC campaign. </p>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
      <div class="icon-box">
        <div class="icon"><i class="bx bx-world"></i></div>
        <h4><a href="">Product Listing Ads</a></h4>
        <p>Advertise more and more Pproducts and related information toconvert your leads into assured sales with our customized product listing ads. </p>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
      <div class="icon-box">
        <div class="icon"><i class="bx bx-slideshow"></i></div>
        <h4><a href="">Google Shopping Ads</a></h4>
        <p>Advertise more and more Pproducts and related information toconvert your leads into assured sales with our customized product listing ads. </p>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
      <div class="icon-box">
        <div class="icon"><i class="bx bx-arch"></i></div>
        <h4><a href="">Mobile Advertising</a></h4>
        <p>Advertise more and more Pproducts and related information toconvert your leads into assured sales with our customized product listing ads. </p>
      </div>
    </div>

  </div>

</div>
  </section>
  <!-- End Services Section -->
               
  <!-- More Content Section -->
  <section>
    <div class="container more-content">

      <div class="row">
        <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 content text-left" data-aos-delay="100">   
        <div class="section-title text-center" >
            <p style="font-size: 30px;" data-aos="fade-right">CONVERT EVEN IF THEY LEAVE YOU.</p>
            <h3 data-aos="fade-right">USING RETARGETING STRATEGIES</h3>
          </div>    
          <p class="text-left" data-aos="fade-right">Retargeting, also known as remarketing, is a form of online advertising that can help you keep your brand in front of bounced traffic after they leave your website. For most websites, only 2% of web traffic converts on the first visit. Retargeting is a tool designed to help companies reach the 98% of users who don’t convert right away.</p>
          <div class="collapse" id="collapseExample">
            <div >
              <h2 style="font-size: 25px;">How Does ReTargeting Work?</h2>
            <p><i class="ri-check-double-line"></i>Retargeting is a cookie-based technology that uses simple Javascript code to anonymously ‘follow’ your audience all over the Web.
            Here's how it works: you place a small, unobtrusive piece of code on your website (this code is sometimes referred to as a pixel). The code, or pixel, is unnoticeable to your site visitors and won’t affect your site’s performance. Every time a new visitor comes to your site, the code drops an anonymous browser cookie. Later, when your cookied visitors browse the Web, the cookie will let your retargeting provider know when to serve ads, ensuring that your ads are served to only to people who have previously visited your site.
            Retargeting is so effective because it focuses your advertising spend on people who are already familiar with your brand and have recently demonstrated interest. That’s why most marketers who use it see a higher ROI than from most other digital channels.</p>
            <h2 style="font-size: 25px;"> When Does ReTargeting Work?</h2>
            <p><i class="ri-check-double-line"></i>Retargeting is a powerful branding and conversion optimization tool, but it works best if it’s part of a larger digital strategy.
            Retargeting works best in conjunction with inbound and outbound marketing or demand generation. Strategies involving content marketing, AdWords, and targeted display are great for driving traffic, but they don’t help with conversion optimization. Conversely, retargeting can help increase conversions, but it can’t drive people to your site. Your best chance of success is using one or more tools to drive traffic and retargeting to get the most out of that traffic.</p>
            </div>
          </div>

          <a class="learn-more-btn"  data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          Learn more
          </a>
        </p>
      
        </div>
      </div>
    </div>
  </section>
  <!-- More Content Section -->
  <!-- ======= PPC Management  Section ======= -->
  <section id="mgt-service" class="services">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2 class="h-title">Why Clients Hire Us..?</h2>
        <p>PPC Management Services We Use</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch text-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4><a href="">Analysis</a></h4>
            <p>Before a Contract is ever signed,we pop the hood on your business with a detailed audit.You get an in-depth report on what's working,what's not,and what opportunities we've found for serious growth.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 text-center" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="">Strategy</a></h4>
            <p>Once a baseline of your current marketing efforts is developed,we draw up the best marketing mix for reaching your business goals.Then,campaigns for each channel are mapped out,maintaining a hoslistic view of the overall PPC marketing strategy.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0 text-center" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4><a href="">Creative </a></h4>
            <p>Banner and textual ads are created with each keyword and audience in mind, with custom landing pages. </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 text-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4><a href="">Implementation</a></h4>
            <p>Your Campaigns are lunched and result are continuously measured.These Campaigns will go through many iterations as we test and tweak </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 text-center" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Management</a></h4>
            <p>Our team continues to monitor ad performance to make adjustments based on preset guidelines and optimization. </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 text-center" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-arch"></i></div>
            <h4><a href="">Reporting</a></h4>
            <p>We produce unique reports for each of our clients to show them the metrics and help them draw a meaningful conclusion. </p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- End Services Section -->
  <!-- FAQ Section Start-->
  <section>
    <div class="container" data-aos="fade-up">
        <div class="section-title">
        <h2 class="h-title">Pay Per Click</h2>
        <p>PPC FAQs</p>
      </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            What is PPC
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">PPC is the acronym for pay-per-click. It's a digital marketing tactic and it buys web traffic to your website. You, the advertiser, pays a small fee each time one of your ads is clicked on by a user. Search engine advertising is the most popular form of PPC. However, many other platforms such as social media giant, Facebook, now offer PPC ad models. You can promote your company in search results, on websites and across social media platforms. PPC ads can feature text, images and video.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Will My Target Click On My Online PPC ads
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Ads that appear in search results are targeted to meet a specific audience and often earn almost half of all page clicks. Users who click on paid ads are usually ready to make a decision and therefore more likely to buy a product or service by comparison to an organic visitor. With PPC ads, your ads are targeted for the online users searching for your type of business. This can make a significant impact on your bottom line.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            How Much Does a PPC Campaign Cost
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">The cost of running a PPC ad campaign varies. Different cost factors include your industry type, business type and business size. These will influence the pricing of your PPC ad campaign. Pricing can also be affected by the type of strategy you're rolling out. However, expect to spend up to $5,000 per month for a small-to-medium company. This price includes both your ad spend and professional services from your chosen PPC agency.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
            How Do i Budget For My PPC Campaigns
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Our PPC costs must be calculated based on your bid, your targeting and your ad quality. The amount of money you're willing to spend for a user to click on your ad is called your bid. You enter your bid into an ad auction and the highest bidder wins, so you could end up paying less than your bid amount, but never more. Targeting factors include all aspects of your goal, from the keywords you’re ranking for to the demographics of your audience. The more competitively you want to target, the higher the costs. For instance, bidding on a very competitive keyword costs more because it features a higher cost-per-click (CPC). Google also monitors the quality of your ads. If your ad quality is high, you can often maintain lower costs because Google will rank your ad ahead of competitors with low-quality ads. Understanding and accounting for all of these factors are how you determine your PPC budget.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
            Why Should i Advertising With Pay-Per-Click ADS
          </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">PPC is a flexible online advertising method that lets you create a budget and adjust it at any time necessary. Most importantly, you can target your ideal audience directly, which is impossible with traditional advertising or digital marketing campaigns. The insights gleaned from the data tracked from PPC campaigns is invaluable because it gives you a better idea of your users' behavior. Your paid advertising campaigns appear ahead of all organic results in search results, helping you to instantly outrank your competitors and support your search engine optimization (SEO) efforts.</div>
        </div>
      </div>
    </div>
  </div>
  </section>
  <!-- Feq Section End  -->
                  
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section_all pb-0">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2 class="h-title">Get Quote</h2>
            
          </div>
          <div class="row mt-5 d-flex align-items-center justify-content-center p-5" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;">
            <div class="col-lg-6 mt-5 mt-lg-0 " >
  
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <p><b>Send Message</b> </p>
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                 <!--  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" required>
                  </div> -->
                </div>
               <!--  <div class="form-group mt-3">
                  <input type="text" class="form-control" name="website" id="website" placeholder="Website" required>
                </div> -->
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Get A Qoute <i class="bi bi-arrow-right-circle"></i></button></div>
              </form>
            </div>
          </div>
        </div>
      </section><!-- End Contact Section -->


  <!-- ======= Footer ======= -->


   <footer id="footer" class="">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>AKV Technologies</h3>
              <p>
                Akv Internet Marketing Agency is a full-service digital marketing agency.
                Attract, Impress, and Convert more leads online and get best results in your
                business
              </p>
               <h4 class="pt-4 mb-0">Registered Address:</h4>
                <p>4th Floor, Classic Arena, 1597/2662, AECS Layout, A Block, Singasandra, Bangalore, Karnataka, India, 560068</p>
              <h4 class="pt-4 mb-0">Our Corporate Address</h4>
              <p>AKV Technologies <br>B-Block, BHIVE Workspace - No.112,</p>
              <p>AKR Tech Park, "A" and, 7th Mile Hosur Rd, </p>
              <p>Krishna Reddy Industrial Area,<br> Bengaluru, Karnataka - 560068</p>
              
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.akvtechnologies.com/">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.akvtechnologies.com/Aboutus.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#Offerings">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="terms-conditions.php">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="refund-policy.php">Refund policy</a></li>
               <li><i class="bx bx-chevron-right"></i> <a href="privacy-policy.php">Privacy policy</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="shipping-policy.php">Shipping policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#Offerings">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#Offerings">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#Offerings">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#Offerings">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#Offerings">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>For Payment</h4>
            <p class="h4 text-blue">Click Here For Payment</p>
            <p><a href="https://rzp.io/l/akvtechnologies" class="btn btn-large bg-white px-5" target="_blank">Pay now</a>
            </p>
    
            <div class="social-links mt-5">
                <a href="https://twitter.com/AkvTechnologies" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/AKVTechnologies" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/akvtechnologies/" target="_blank"class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="https://in.pinterest.com/akvtechnologiesDM/" target="_blank"  class="google-plus"><i class="bx bxl-pinterest"></i></a>
                <a href="https://in.linkedin.com/company/akv-technologies" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>AKV</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a href="https://www.akvtechnologies.com/">AKV Technologies</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
<!-- 
  <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- sticky PopUp section -->

<a class="fixed-wh" href="https://api.whatsapp.com/send?phone=+919620826156&text=Welcomeakv tecknologies" target="_blank" title="whatsapp Now">
  <i class="fa fa-whatsapp my-float"></i></a>
<a class="fixed-tel text-white" href="https://rzp.io/l/akvtechnologies" target="_blank" title="Pay Now">Pay Now</a>

<!-- <a class="fixed-tel" href="tel:+8548222xxx" target="_blank" title="Call Now"><i class="fas fa-phone-alt"></i></a> -->

<!-- GEt Quote Pop Up Section -->
<style type="text/css">
   .fixed-wh {
  position: fixed;
  bottom: 250px;
  right: 20px;
  width: 50px;
  height: 50px;
  line-height: 50px;
  z-index: 9999;
  text-align: center;
}

.fixed-wh:before {
  content: "";
  width: 50px;
  height: 50px;
  background-color: #4c71ce;
  position: absolute;
  border-radius: 100%;
  box-shadow: 0 1px 1.5px 0 rgba(0, 0, 0, .12), 0 1px 1px 0 rgba(0, 0, 0, .24);
  z-index: 1;
  top: 0;
  left: 0;
}

.fixed-wh i {
  vertical -align: middle;
  z-index: 2;
  position: relative;
  color: #fff;
  font-size: 1.5rem;
}
  .fixed-tel {
  position: fixed;
  bottom: 310px;
  right: 20px;
  width: 45px;
  height: 80px;
  line-height: 50px;
  z-index: 9999;
  text-align: center;
  background-color: #4c71ce;
  color :#fff;
  writing-mode: vertical-lr;
text-orientation: mixed;
font-size: 1rem;
}

.fixed-tel:before {
  content: "";
  width: 50px;
  height: 100px;
  position: absolute;
  border-radius: ;100%;
  box-shadow: ;0 1px 1.5px 0 rgba(0, 0, 0, .12), 0 1px 1px 0 rgba(0, 0, 0, .24);
  z-index: 1;
  top: 0;
  left: 0;
}

.fixed-tel i {
  vertical -align: middle;
  z-index: 2;
  position: relative;
  color: #fff;
  font-size: 2rem;
}

</style>
<!-- <a aria-label="Chat on WhatsApp" href="https://wa.me/1XXXXXXXXXX"> <img alt="Chat on WhatsApp" src="WhatsAppButtonGreenLarge.svg" />
<a />
 --><!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 16512513;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/16512513/" rel="nofollow">Chat with us</a>, powered by <a href="https://akvtechnologies.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->



    <!-- JQuery File -->
    <script src="assets/js/jQuery/jQuery.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
 

  <!--Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/custom-JS/custom.js"></script>
</body>

</html>