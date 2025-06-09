<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="img/jetsgotran.png">

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

  <style>
    .paragraph {
      line-height: 1.5em;
    }

    .collapsed {
      overflow: hidden;
      height: 4.5em;
    }

    .see-more-link {
      display: inline-block;
      color: blue;
      cursor: pointer;
    }
  </style>

</head>

<body>

  <?php
  require 'nav.php';
  include 'connection.php';
  ?>

  <div class="hero" style="background-image: url('img/jetsgobanner.png');background-size: cover; ">
    <div class="container mt-5 mb-5 pt-5 pb-5">
      <div class="row align-items-center mt-5 mb-5 pt-5 pb-5">
        <div class="col-lg-6 mx-auto text-center mt-5">
          <div class="intro-wrap">
            <!--<h1 class="text-black text-bold" style="text-shadow: 2px 2px 6px #fff;">Our Services</h1>-->
            <!-- <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="domestic">
    <div class="untree_co-section2">
      <div class="container">
        <div class="container-fluid">
          <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
              <h1 class="section-title text-center text-black">Domestic Promos</h1>
            </div>
          </div>
          <div class="row">
            <div class="owl-carousel owl-3-slider">
              <?php
              $sql = "SELECT * FROM tbldestination WHERE flightType = 'domestic'";
              $result = mysqli_query($conn, $sql);
              while ($row = $result->fetch_assoc()) :
              ?>
                <form action="" method="post">
                  <div class="item">
                    <a class="media-thumb" href="<?php echo "img/" . $row['imgName']; ?>" data-fancybox="gallery">
                      <img src="<?php echo "img/" . $row['imgName']; ?>" alt="Image" class="img-fluid">
                      <div class="d-flex text-black">
                        <div>
                          <h4><a href="#" style="pointer-events: none; cursor: default;"><?php echo $row['promoName']; ?></a></h4>
                          <span class="d-flex align-items-center loc mb-2">
                            <span class="icon-room"></span>
                            <span><?php echo $row['locationName']; ?></span>
                          </span>
                          <div class="price ml-auto">
                            <span><?php echo $row['pcurrency'] ?><?php echo $row['pPrice'] ?></span>
                          </div>
                          <a class="btn btn-primary mt-2" href="bookDest.php?imgID=<?php echo $row['imgID']; ?>">Book Now</a>
                        </div>
                      </div>
                    </a>
                  </div>
                </form>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="international">
    <div class="untree_co-section" style="background: #5E9BB8;">
      <div class="container">
        <div class="container-fluid">
          <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
              <h1 class="section-title text-center text-white">International Promos</h1>
            </div>
          </div>
          <div class="row">
            <div class="owl-carousel owl-3-slider">
              <?php
              $sql = "SELECT * FROM tbldestination WHERE flightType = 'international'";
              $result = mysqli_query($conn, $sql);
              while ($row = $result->fetch_assoc()) :
              ?>
                <form action="" method="post">
                  <div class="item">
                    <a class="media-thumb" href="<?php echo "img/" . $row['imgName']; ?>" data-fancybox="gallery">
                      <img src="<?php echo "img/" . $row['imgName']; ?>" alt="Image" class="img-fluid">
                      <div class="d-flex">
                        <div>
                          <h3><a href="#" style="pointer-events: none; cursor: default;" class="text-white"><?php echo $row['promoName']; ?></a></h3>
                          <span class="d-flex align-items-center loc mb-2">
                            <span class="icon-room text-white"></span>
                            <span class="text-white"><?php echo $row['locationName']; ?></span>
                          </span>
                          <div class="price ml-auto text-white">
                            <span><?php echo $row['pcurrency'] ?><?php echo $row['pPrice'] ?></span>
                          </div>
                          <a class="btn btn-primary mt-2" href="bookDest.php?imgID=<?php echo $row['imgID']; ?>">Book Now</a>
                        </div>
                      </div>
                    </a>
                  </div>
                </form>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="other">
    <div class="untree_co-section">
      <div class="container">
        <div class="container-fluid">
          <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
              <h1 class="section-title text-center text-black">Other Services</h1>
            </div>
          </div>
          <div class="row">
             <div class="col-lg-3 mb-4">
              <a href="#">
                <div class="team">
                  <img src="img/2go.png" alt="Image" class="img-fluid mb-4 rounded-20">
                  <div class="px-3">
                    <h3 class="mb-0 text-bold text-black">2GO Ticketing</h3>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 mb-4">
              <a href="#">
                <div class="team">
                  <img src="img/psa.png" alt="Image" class="img-fluid mb-4 rounded-20">
                  <div class="px-3">
                    <h3 class="mb-0 text-bold text-black">PSA Authentication</h3>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 mb-4">
              <a href="#">
                <div class="team">
                  <img src="img/passport.png" alt="Image" class="img-fluid mb-4 rounded-20">
                  <div class="px-3">
                    <h3 class="mb-0 text-bold text-black">Passporting</h3>
                  </div>
                </div>
            </div>
            </a>
            <div class="col-lg-3 mb-4">
              <a href="visa.php">
                <div class="team">
                  <img src="img/visaa.png" alt="Image" class="img-fluid mb-4 rounded-20">
                  <div class="px-3">
                    <h3 class="mb-0 text-bold text-black">VISA Assistance</h3>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 mb-4">
              <a href="#">
                <div class="team">
                  <img src="img/insurance.png" alt="Image" class="img-fluid mb-4 rounded-20">
                  <div class="px-3">
                    <h3 class="mb-0 text-bold text-black">Travel Insurance</h3>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 mb-4">
              <a href="#">
                <div class="team">
                  <img src="img/airroam.png" alt="Image" class="img-fluid mb-4 rounded-20">
                  <div class="px-3">
                    <h3 class="mb-0 text-bold text-black">Airroam</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <div class="py-5 cta-section">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h2 class="mb-2 text-white">Lets you Explore the Best. Contact Us Now</h2>
          <p class="mb-4 lead text-white text-white-opacity"></p>
          <p class="mb-0"><a href="contact.php" class="btn btn-outline-white text-white btn-md font-weight-bold">Get in touch</a></p>
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