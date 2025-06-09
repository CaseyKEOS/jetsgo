<?php
session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jetsgo Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-image: url('img/coronnnn.jpg');">

    <div class="container mt-5" >
        <div class="row mt-5">
            <div class="col-sm-9 col-md-6 col-lg-5 mx-auto mt-5">
            <h2 class="card-title text-center text-white mb-5"><b><img src="http://main.jetsgo.website/img/jetsgotran.png" alt="JetsGo" style="width: 300px;"></b></h2>
                <div class="card border-0 shadow-lg rounded-3 my-5">
                    <div class="card-body p-5 p-sm-6">
                        <h5 class="p-4"><b>'The most important thing is, whatever you do decide to choose, take it seriously and do your best.' - Tom Sturridge</b></h4>
                        <form action="loginfunc.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="sample@example.com" required>
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">

                                    <!-- <div class="col">
                                        
                                        <a href="#!">Forgot password?</a>
                                    </div> -->
                                </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" name="login" type="submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>