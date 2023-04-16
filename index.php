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

  <div class="card">
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
  <section class="contact_section layout_padding">
    <div class="container ">
      <h2 class="">
        Ask Anything
      </h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <form action="" method="POST">
            <div>
              <input type="text" name="name" placeholder="Name" />
            </div>
            <div>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <!-- <div>
              <input type="text" placeholder="Phone Number" />
            </div> -->
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit">
                SEND
              </button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."footer.php"); ?>

</div>

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."messenger.php"); ?>

</body>
</html>