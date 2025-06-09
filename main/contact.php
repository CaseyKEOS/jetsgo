<!-- /*
* Template Name: Tour
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/daterangepicker.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

  <title>JetsGo</title>
</head>

<body>

  <?php
  require 'nav.php';
  ?>

  <div class="hero hero-inner" style="background-image: url('img/123.jpg');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mx-auto text-center">
          <div class="intro-wrap" style="text-shadow: 2px 2px 8px #000;">
            <h1 class="mb-0">Contact Us</h1>
            <p class="text-white"></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="untree_co-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <form class="contact-form" action="send_contact.php" method="POST">
            <div class="form-group">
              <label class="text-black" for="name">Full name</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
              <label class="text-black" for="email">Email address</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label class="text-black" for="subject">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject">
            </div>
            <div class="form-group">
              <label class="text-black" for="message">Message</label>
              <textarea class="form-control" name="message" id="message" cols="30" rows="5"></textarea>
            </div>
            <button type="submit" name="send" class="btn btn-primary" onclick="sendemail()">Send Message</button>
          </form>
        </div>

        <div class="col-lg-6 ml-auto textnew text-bold" >
          <div class="quick-contact-item d-flex align-items-center mb-4">
            <span class="flaticon-house te"></span>
            <address class="text">
              Borol 1st, Balagtas, Bulacan, 3018 Philippines
            </address>
          </div>
          <div class="quick-contact-item d-flex align-items-center mb-4">
            <span class="flaticon-phone-call"></span>
            <address class="text">
            +639228409293 (sun)<br>
            +639560473114 (globe)
            </address>
          </div>
          <div class="quick-contact-item d-flex align-items-center mb-4">
            <span class="flaticon-mail"></span>
            <address class="text">
              jetsgotravel@yahoo.com
            </address>
          </div>
          <div class="quick-contact-item d-flex align-items-center mb-4">
            <i class="flaticon-facebook bi bi-facebook"></i>
            <a href="https://www.facebook.com/JetsGoTravelServices" target="_blank">
                    <address class="text textnew">Jet's Go Travel Services&nbsp/
                    </address>
                </a>
                <a href="https://www.facebook.com/jetsgotravel.eileen" target="_blank">
                    <address class="text textnew">
                      Jets Go Main
                    </address>
                </a>
                
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include 'assets/php/footer.php';
  ?>

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/daterangepicker.js"></script>

  <script src="js/typed.js"></script>

  <script src="js/custom.js"></script>

</body>

</html>