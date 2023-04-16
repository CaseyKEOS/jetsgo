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
     <form method="post">
		<label for="email">Email:</label>
		<input type="email" name="email" required><br><br>
		<label for="subject">Subject:</label>
		<input type="text" name="subject" required><br><br>
		<label for="message">Message:</label>
		<textarea name="message" required></textarea><br><br>
		<input type="submit" name="submit" value="Send Email">
	</form>
	<?php
		use assets\PHPMailer\src\PHPMailer;
		use assets\PHPMailer\src\Exception;
		
		require 'vendor/autoload.php';
		
		if(isset($_POST['submit'])){
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			
			$mail = new PHPMailer(true);
			
			try {
				//Server settings
				$mail->SMTPDebug = 0;
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'caseykeos352@gmail.com';
				$mail->Password = 'ddfwxadklfwqruay';
				$mail->SMTPSecure = 'tls';
				$mail->Port = 587;

				//Recipients
				$mail->setFrom('caseykeos352@gmail.com', 'JetsGo');
				$mail->addAddress($email);

				//Content
				$mail->isHTML(true);
				$mail->Subject = $subject;
				$mail->Body    = $message;

				$mail->send();
				echo '<p style="color:green;">Email sent successfully!</p>';
			} catch (Exception $e) {
				echo '<p style="color:red;">Error: '.$mail->ErrorInfo.'</p>';
			}
		}
	?>

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."footer.php"); ?>

</div>

<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."messenger.php"); ?>

</body>
</html>