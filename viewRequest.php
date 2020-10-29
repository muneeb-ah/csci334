<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AdTech IT Consulting</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage - v2.1.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <div id="alert-div">
    
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">AdTech IT Consulting</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="index.php#about">About</a></li>
          <li><a href="index.php#team">Team</a></li>
          <li><a href="index.php#pricing">Pricing</a></li>
          <li><a href="index.php#contact">Contact</a></li>

          <?php
            session_start();
            if(isset($_SESSION["u_name"])){
              echo '<li class="drop-down"><a href="">'.$_SESSION["u_name"].'</a>
            <ul>
              <li><a href="requestHistory.php?action=new">New Request</a></li>
              <li><a href="requestHistory.php">Request History</a></li>
              <li><a href="#">Account</a></li>
              <li class="logout"><a href="assets/php/logout.php">Logout</a></li>
            </ul>
          </li>';
            }else{
              header("Location: index.php");
            }
          ?>

        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="#about" class="get-started-btn scrollto">Get Started</a> -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <section>
      <div class="container">
        <div class="row no-gutters">
          <div class="col-9 conversation">
            <h2>Hardware problem (20200919011)</h2>
            <hr>
            <div class="row">
              <div class="col-2">
                <span>Description: </span>
              </div>
              <div class="col-10">
                <span>We faced a hardware problem, our monitor not working, we getting an error with error code ERR1001.</span>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-baseline conDiv">
              <div>
                <span class="title">System</span>
                <span class="content">Wei Han had assigned to help you</span>
              </div>
              <span>2020/09/19 14:30</span>
            </div>
            <div class="d-flex justify-content-between align-items-baseline conDiv">
              <div>
                <span class="title">IT Technician</span>
                <span class="content">Hi, can I have more details regarding the problem?</span>
              </div>
              <span>2020/09/19 14:31</span>
            </div>
            <div class="d-flex justify-content-between align-items-baseline conDiv">
              <div>
                <span class="title">IT Technician</span>
                <span class="content">Hi, can I have more details regarding the problem?</span>
              </div>
              <span>2020/09/19 14:31</span>
            </div>
            <div class="d-flex justify-content-between align-items-baseline conDiv">
              <div>
                <span class="title">IT Technician</span>
                <span class="content">Hi, can I have more details regarding the problem?</span>
              </div>
              <span>2020/09/19 14:31</span>
            </div>

            <div class="replyDiv">
              <div class="d-flex justify-content-between align-items-center">
                <b>Enter your reply:</b>
                <button class="btn btn-sm btn-main">Reply</button>
              </div>
              <textarea rows="5"></textarea>
            </div>
            
          </div>
          <div class="col-3 progressDiv">
            <div>
              <b>Requrest status:</b>
              <ul class="progressList">
                <li class="checked">Request created<span class="time">2020/09/19 14:26</span></li>
                <li class="checked">IT technician assigned<span class="time">2020/09/19 14:30</span><span><b>Wei Han</b> will help you to solve the issue.</span></li>
                <li>Issue resolved<span class="time"></span></li>
              </ul>
              <b>Service review:</b>
              <span>Please rate our service and give us a comment below</span>
              <div class="stars">
                <div class="star" data-star="1"></div>
                <div class="star" data-star="2"></div>
                <div class="star" data-star="3"></div>
                <div class="star" data-star="4"></div>
                <div class="star" data-star="5"></div>
              </div>
              <b>Please leave a comment:</b>
              <textarea rows="4"></textarea>
              <button class="btn btn-sm btn-main" style="float: right">Submit</button>




            </div>
            
          </div>
        </div>
      </div>
        
    </section>
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>AdTech IT Consulting</h3>
            <p>
              No 301, Level 30,<br>
              Menara Prestige, 50450 Kuala Lumpur,<br>
              Federal Territory of Kuala Lumpur  <br><br>
              <strong>Phone:</strong> +603 - 1234 5678<br>
              <strong>Email:</strong> info@adtech.com.my<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Be the first to have our latest informations</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>AdTech IT Consulting</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/sha256.js"></script>
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">

    <?php
      if(isset($_GET["action"]) && $_GET["action"] == "new"){
        echo '$("#newResquest").modal(\'show\');';
      }
    ?>

    $(".close-modal").click(()=>{
      console.log("Tas");
      location.href = "requestHistory.php";
    });
    

    function createAlert(type, content){
      $("#alert-div").prepend('<div class="alert alert-'+type+' alert-dismissible fade show" role="alert">'+content+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    var rated = false;

    $(".star").mouseenter((event)=>{
      for(var i = 0; i < event.currentTarget.getAttribute("data-star"); i++){
        $(".star")[i].style.backgroundImage = "url(http://localhost/csci334/assets/img/star.png)";
      }
      if(rated == true){
          $(".star").mouseleave((event)=>{
            for(var i = 0; i < 5; i++){
              $(".star")[i].style.backgroundImage = "";
            }
          });

      }
    });
    $(".star").mouseleave((event)=>{
      for(var i = 0; i < 5; i++){
        $(".star")[i].style.backgroundImage = "";
      }
    });

    $(".star").click((event)=>{
      console.log(event.currentTarget.getAttribute("data-star"));
      for(var i = 0; i < event.currentTarget.getAttribute("data-star"); i++){
          $(".star")[i].style.backgroundImage = "url(http://localhost/csci334/assets/img/star.png)";
          console.log("asd");
      }

      $(".star").off("mouseleave");
      rated = true;
    });
  </script>
</body>

</html>