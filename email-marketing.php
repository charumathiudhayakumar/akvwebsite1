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

<!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-WJG7ZH9Q3D"></script>-->

<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z4LK46XBSX"></script> <script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-Z4LK46XBSX'); </script>

<script>
//   window.dataLayer = window.dataLayer || [];
//   function gtag(){dataLayer.push(arguments);}
//   gtag('js', new Date());

//   gtag('config', 'G-WJG7ZH9Q3D');
</script>

 <!-- Google Tag Manager -->
 <script>
//  (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
//   new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
//   j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
//   'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
//   })(window,document,'script','dataLayer','GTM-K92G4T3');
  
  </script>
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
  <div class="header-main pt-0">
    <h6 class="page-navigation">
      Services <i class="bi bi-arrow-right"></i> Digital Marketing <i class="bi bi-arrow-right"></i> Email Marketing Services </h6>
      <div class="header-details" data-aos="fade-right" data-aos-delay="150">
          <h1>Email Marketing Services</h1>
          <p>We offer Professional Email Marketing
            <br> That Converts Prospects Into Customers</p>
      </div>

      <img src="assets/img/email-marketing-head.png" data-aos="fade-left" alt="email marketing,online marketing,digital marketing company,digital marketing agency,marketing agency">

      <a class="get-report get-started-btn text-white" data-aos="fade-right" data-aos-delay="150" href="#">Get Proposal <i class="bi bi-arrow-right-circle"></i></a>
  </div>
  <!-- ======= Conversion Section ======= -->
  <section id="about" class="about" style="padding-top:80px;">>
      <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-4 order-1 mt-5 order-lg-2" data-aos="fade-left" data-aos-delay="100">
              <img src="assets/img/61576.jpg" class="img-fluid mt-5 about-img" alt="email marketing,online marketing,digital marketing company,digital marketing agency,marketing agency">
            </div>

            <div class="col-lg-8 pt-5 pt-lg-0 order-2 order-lg-1 content text-left" data-aos="fade-right" data-aos-delay="100">
              
                  <div class="section-title ">
                    <h2 class="h-title">Start The Conversion Today</h2>
                    <p>The Importance of Email Marketing</p>
                  </div>
                
                  <ul>
                    <li><i class="ri-check-double-line"></i> 
                      Email marketing is a digital marketing strategy applied by thousands of organizations 
                      around the world to develop brand awareness, sales, and client connections.
                  </li>

                    <li><i class="ri-check-double-line"></i>
                      Different email service providers (ESPs) are used by email marketing organizations to send out automated, 
                      customized marketing emails with brand promotions and announcements. 
                      Email marketing includes anything from weekly email newsletters and promotional 
                      alerts to customer survey forms and event invitations.
                  </li>

                    <li><i class="ri-check-double-line"></i> 
                      Since social media platforms are so widely available and online networks traffic has risen dramatically over time,
                        many marketers wonder why email marketing is so vital. But here's the thing: people still check their inboxes for 
                        special offers from the brands they care about. In fact, 44% of users check their emails for business promotions,
                        whereas only 4% use social media sites to learn about marketing campaigns.
                  </li>
                  <li><i class="ri-check-double-line"></i> 
                      That is only the tip of the iceberg when it comes to the possibilities. With the variety of 
                      options that web email marketing provides, you're one step closer to increasing conversions for your company.
                  </li>
                  </ul>
            
            </div>
          </div>
        </div>
  </section>
  <!-- Conversion Section End -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2 class="h-title">Performance</h2>
        <p>Email Marketing Performance</p>
      </div>

      <div class="row">
      
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4><a href="">Increase Brand Loyalty</a></h4>
            <p>
                Regular brand interactions are required for strong client connections, and consistent web email marketing 
                conversations with users allow any organisation to build brand loyalty while boosting sales. 
                Moreover, employing the best email campaigns to engage with and advertise to an existing client 
                is six to twelve times less expensive than using other marketing channels like paid advertising or 
                social network marketing. Targeted email marketing efforts not only increase revenue, but they also 
                save money.

            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Save Your Time And Efforts</a></h4>
            <p>
              Email marketing is substantially less labor-intensive than traditional marketing for small businesses, 
              franchises, and multi-location businesses. There is no need to worry about postage or labelling for each 
              campaign that is distributed. Targeted email marketing allows you to contact and engage with your desired 
              market segments (whether there are a few hundred or a few hundred thousand) in minutes. The top email 
              marketing businesses can help you if you don't have time to master the ropes of email campaign optimization.

            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Track Your Analytics</a></h4>
            <p>
              Email marketing software provides important insight into the performance of your 
              targeted email marketing efforts and deployed campaigns through data and analytics. Open rates, 
              click rates, and click-through rates (CTRs), bounces, and conversions are the most commonly 
              reported engagement metrics. An expert email marketing specialist can decode the numbers and 
              translate them into meaningful applications to better target your audiences, depending on your
              marketing goals.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Expand the range of your company</a></h4>
              <p>
                Traditional marketing tactics have been shown to have a lower reach and engagement potential 
                than email campaigns. According to statistics, 72% of email users check their inboxes
                more than six times per day, and 92% of internet users have at least one email account. 
                Email marketing experts can assist you in reaching your target audiences on any device 
                while remaining non-invasive and complying with the CAN-SPAM Act.
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Trial with email campaigns and see what performs better.</a></h4>
              <p>
                Online email marketing provides a number of options for determining whether your marketing efforts 
                are on target. Almost every aspect of your email campaign may be tested using A/B and multivariate testing, 
                from the subject line to the time it was delivered to the content of the email campaign itself. 
                This provides useful information about where you might need to change your email marketing approach 
                in order to get the most out of your email campaigns.

              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Connect With a Wide range Of audiences</a></h4>
              <p>
                One of the numerous advantages of using B2C and B2B email marketing to reach your customers is hyper-personalized communication.
                While traditional marketing approaches focus on sending a wide message to a vast audience, marketing emails enable you to offer
                unique discounts and codes, tailored messages, and data-driven campaigns based on birthdays, locations, and customer lifetime 
                value (CLV). You can reach out to multiple target segments with a personal touch instead 
                of focusing your efforts on a single campaign.
              </p>
            </div>
          </div>

    </div>
  </section>
  <!-- End Services Section -->

  <!--Email marketing advantages Section Start -->
  <section class="bg-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
    <div class="mt-4" style="text-align: center;" data-aos="zoom-in">
      <h4 style="color: crimson;">Apart from being the major means of marketing communication, 
        email marketing has the following advantages:
      </h4>
    </div>

    <div class="hire-agency email-mark">

      <div class="email-m-image" data-aos="flip-left">
        <!-- <img src="assets/img/email-marketing.jpg" alt="email marketing is essential,email marketing,online marketing,digital marketing company,digital marketing agency,marketing agency">
        <div class="section-title"> -->
            <h2 class="h-title">Why email Marketing Essential</h2>
            
          </div>
      </div>

      <div class="col-lg-8">
        <p  data-aos="flip-right"><span><i class="bi bi-currency-dollar"></i></span> <b>It shows a high ROI (return of investment) :</b> For every $1 invested on email marketing, $44 is returned.</p>
        <p data-aos="flip-right"><span><i class="bi bi-people"></i></span> <b>It's an active channel to acquire new customers: </b> Email marketing is 40 times more effective than Facebook or Twitter in attracting new clients.</p>
        <p data-aos="flip-right"><span><i class="bi bi-chat-square-dots"></i></span> <b>It's easily integrated with other communication channels :</b>  Use this opportunity to expand your audience
          by integrating emails with your social media profiles, SMS, or web push notifications.
        </p>
        <p data-aos="flip-right"><span><i class="bi bi-search"></i></span> <b>It helps your SEO:</b> Create content strategy, distribute it to your subscribers, gain backlinks, and increase traffic to your website.</p>
      </div>

    </div>
  </section>
  <!-- Email marketing advantages End -->

  <!-- FAQ Section Start-->
  <section>
      <div class="container" data-aos="fade-up">
          <div class="section-title">
          <h2 class="h-title">Email Marketing</h2>
          <p>Email Marketing FAQs</p>
        </div>
              <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Is email marketing still effective? 
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              Email marketing is one of the most effective ways for a business to reach customers directly. Think about it. You’re not posting something on your site and hoping people will visit it. You’re not even posting something on a social media page and hoping fans will see it. You’re sending something directly into each person’s inbox, where they definitely will see it! Even if they don’t open it, they’ll still see the subject line and your company’s name each time you send an email, so you’re always communicating directly with your audience.              </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Isn’t social media marketing taking the place of email marketing?           
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              Actually, recent statistics show that email reaches three times more people than Facebook and Twitter combined. That’s a significant difference. Social media marketing is wildly popular, and becoming even more so every day, but it is definitely not taking the place of social media marketing any time soon. With social media ex. facebook if you were to make a post to reach your followers Facebook only reaches a small portion of your users. If you have users opted into your email list everyone on that list will receive that message.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              Can I buy a list when I’m just starting out with email marketing? 
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              It can be tempting, but you’ve got to resist that temptation. The only way to get an email subscriber list that will be beneficial to your company is to grow it organically. First of all, many email service providers won’t even allow you to use purchased lists. And secondly, the email addresses found on lists like those are not high-quality leads, to say the least. They will not contain people truly interested in your products or services, since these people didn’t opt-in to your specific email list, so they’ll also be much more likely to mark your emails as spam.              </div>
            </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
              How should I grow my subscriber list?            
            </button>
          </h2>
          <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              The best way to grow an email subscriber list is to offer your audience an incentive in exchange for signing up to receive your emails. You can put this offer on your site, on your social media pages, on landing pages you create to get people excited – just get the word out, and your leads will automatically qualify themselves by opting in.              </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
              What makes a good incentive?
            </button>
          </h2>
          <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"> 
              <p class="card-text">
                  Any kind of content that will be seen as valuable by your particular audience. It can be an eBook, a white paper, a video, a webinar, even a coupon – anything that is attractive enough to potential customers that they are willing to give up their email address in order to get it.
              </p>
  
          </div>
          </div>
        </div>
  
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseFour">
              Do I need to send an email newsletter?                
            </button>
          </h2>
          <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              For some businesses, a newsletter is the way to go. For others, a different approach works better. Newsletters usually feature several different pieces of content, such as recent blog posts and current specials. But it’s also perfectly fine to send an email featuring only one piece of content, or an individual marketing message. Tailor your email structure to your unique audience, and see what works best through experimentation.              </div>
          </div>
        </div>
  
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingSeven">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseFour">
              How often should I send marketing emails?             
            </button>
          </h2>
          <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              As often as you can, without getting annoying. How’s that for a vague answer? But it’s true – you want to send frequent emails, but not so frequent that people start unsubscribing or worse, marking them as spam. Where’s the happy medium? Unfortunately, it’s different for each business. For some, once a month is plenty, while for others, daily emails are just fine. Again, it’s a matter of experimentation and testing to see what your particular audience responds best to.            </div>
        </div>
  
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingEight">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseFour">
              What is the best day and time to send my marketing emails?           
            </button>
          </h2>
          <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              Once again, the answer to this question differs from business to business. And once again, testing is the way to find out what works best. As a general rule, weekends and mornings seem to be the times when more emails are opened – but since your audience may have different habits, it’s best to experiment and then use your own data to decide.              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Faq Section End  -->
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