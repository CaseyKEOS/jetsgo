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
</head>

<body>
	<?php
	require 'nav.php';
	include 'connection.php';
	?>

	<div class="hero" style="background-image: url('img/coron2.jpg');">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7" style="text-shadow: 2px 2px 8px #000000;">
					<div class="intro-wrap">
						<h1 class="mb-5"><b><span class="d-block">Let us Bring You </span> There... <span class="typed-words"></span></b></h1>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="slides shadow-lg">
						<img src="images/starter-1.jpg" alt="Image" class="img-fluid active">
						<img src="images/starter-2.jpg" alt="Image" class="img-fluid">
						<img src="images/starter-4.jpg" alt="Image" class="img-fluid">
						<img src="images/starter-3.jpg" alt="Image" class="img-fluid">
						<img src="images/starter-5.jpg" alt="Image" class="img-fluid">
						<img src="images/inter-1.png" alt="Image" class="img-fluid">
						<img src="images/inter-2.png" alt="Image" class="img-fluid">
						<img src="images/inter-3.png" alt="Image" class="img-fluid">
						<img src="images/inter-4.png" alt="Image" class="img-fluid">
						<img src="images/inter-5.png" alt="Image" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="untree_co-section">
		<div class="container">
			<div class="row text-center justify-content-center mb-5">
				<div class="col-lg-7">
					<h2 class="section-title text-center">Popular Places in the Philippines</h2>
				</div>
			</div>

			<div class="owl-carousel owl-3-slider">
				<?php
				$sql = "SELECT * FROM tblpplaces";
				$result = mysqli_query($conn, $sql);
				while ($row = $result->fetch_assoc()) :
				?>
					<div class="item">
						<a class="media-thumb" href="<?php echo "img/" . $row['imgName']; ?>" data-fancybox="gallery">
							<div class="media-text" align="center">
								<h3 style="color: #f3faff; text-shadow: 3px 3px 10px #000;"><?php echo $row['placeName']; ?></h3>
								<span class="location" style="color: #f3faff; text-shadow: 3px 3px 10px #000;"><?php echo $row['locName']; ?></span>
							</div>
							<img src="<?php echo "img/" . $row['imgName']; ?>" alt="Image" class="img-fluid">
						</a>
					</div>
				<?php endwhile; ?>

			</div>

		</div>
	</div>	

	<div class="untree_co-section" style="background-image: url('img/coronpalawan.jpg');">
		<div class="container">
			<div class="row justify-content-center text-center mb-5">
				<div class="col-lg-6">
					<h2 class="section-title text-center mb-3" style="color: #f3faff; text-shadow: 3px 3px 10px #000;">Special Offers &amp; Discounts</h2>
				</div>
			</div>
			<div class="row">
				<?php
				$sql = "SELECT * FROM tbldestination ORDER BY RAND() LIMIT 4";
				$result = mysqli_query($conn, $sql);
				while ($row = $result->fetch_assoc()) :
				?>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
						<div class="media-1 card p-3 text-black shadow" style=" border-radius: 15px;">
							<a href="#" class="d-block mb-3" style="pointer-events: none; cursor: default;"><img src="<?php echo "img/" . $row['imgName']; ?>" alt="Image" class="img-fluid" data-fancybox="gallery">
								<span class="d-flex align-items-center loc mt-2 mb-2">
									<span class="icon-room mr-3"></span>
									<span><?php echo $row['promoName']; ?></span>
								</span>
								<div class="d-flex align-items-center">
									<div>
										<h3><a href="#" style="pointer-events: none; cursor: default;"><?php echo $row['locationName']; ?></a></h3>
										<div class="price ml-auto">
											<span ><?php echo $row['pcurrency'] ?><?php echo $row['pPrice'] ?></span>
										</div>
										<a class="btn btn-primary mt-2" href="bookDest.php?imgID=<?php echo $row['imgID']; ?>">Book Now</a>
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="mt-5" align="center">
				<a class="btn btn-primary" href="services.php">See All</a>
			</div>
		</div>
	</div>

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
	<script>
		$(function() {
			var slides = $('.slides'),
				images = slides.find('img');

			images.each(function(i) {
				$(this).attr('data-id', i + 1);
			})

			var typed = new Typed('.typed-words', {
				strings: [" Coron."," Boracay."," Puerto Princesa."," Bohol."," Siargao."," Korea."," Japan."," Taiwan."," Singapore."," Vietnam."],
				typeSpeed: 80,
				backSpeed: 80,
				backDelay: 4000,
				startDelay: 1000,
				loop: true,
				showCursor: true,
				preStringTyped: (arrayPos, self) => {
					arrayPos++;
					//console.log(arrayPos);
					$('.slides img').removeClass('active');
					$('.slides img[data-id="' + arrayPos + '"]').addClass('active');
				}

			});
		})
	</script>

	<script src="js/custom.js"></script>

</body>

</html>