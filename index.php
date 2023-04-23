<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JetsGo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."nav.php"); ?>

  <div class="main">
    <section class="section-one">
        <div class="body">
          <div class="carousel 300-px-wide">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="img/phbeach.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Boracay, Aklan</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/coron.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Coron, Palawan</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/subic.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Subic, Zambales</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
    </section>
    <section class="section-two">
        <div class="container mb-3">
          <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
              <form action="send.php" method="POST">
                <div class="mb-4">
                <h1 class="text-uppercase fw-bold mb-4 head-text container">Contact Us!</h1>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="name@example.com">
                  <label for="floatingEmail">Email address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="name" id="floatingName" placeholder="Name">
                  <label for="floatingName">Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="subject" id="floatingSubject" placeholder="Subject">
                  <label for="floatingSubject">Subject</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea type="text" class="form-control" name="message" id="floatingMessage"  placeholder="Message" style="height: 100px"></textarea>
                  <label for="floatingMessage">Message</label>
                </div>
                <div class="d-flex justify-content-center mb-3">
                  <button type="submit" name="send" class="btn btn-success">SEND</button>
                </div>
              </form>
            </div>
          </div>
        </div>
   </section>

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."footer.php"); ?>

</div>

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."messenger.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>