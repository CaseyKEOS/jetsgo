<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jetsgo Admin</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="akin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <?php
    include 'adminnav.php';
    require 'connection.php';

    $id = $_GET['imgID'];
    $sql = "SELECT * FROM tbldestination WHERE imgID ='$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    ?>

    <!-- Modal Itinerary ADD-->
    <form action="crud-insert.php?imgID=<?php echo $row['imgID']; ?>" method="post">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" style="background-color: #EBE3D5;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Itinerary</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="destTitle" name="destTitle" placeholder="title" value="">
                                <label for="destTitle">Title</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a details here" id="destDetails" name="destDetails" style="height: 200px"></textarea>
                                <label for="destDetails">Details</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" name="additi" type="submit">Add Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <section class="home">

        <div class="container">
            <div class="">
                <div class="row g-3">
                    <div class="col-md py-3">
                        <a href="adminter.php" class="btn btn-primary mt-4" style="float:left;">Back</a>
                        <button type="submit" name="update1" class="btn btn-success mt-4 mx-1" style="float:left;">Edit</button>
                        <button type="submit" name="delete_student" value="" class="btn btn-danger mt-4" style="float:left;">Delete</button>
                    </div>
                    <div class="col-md py-3">
                        <h2 class="textnew text-bold mb-3 mt-3" style="color: #004175;"><?php echo $row['promoName']; ?></h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 ml-auto" align="center">
                        <div class="card text-white p-3 mb-3" style="background:#004175;">
                            <div class="container">
                                <h3 class="text-bold">Update</h3>
                                <form action="crud-edit.php?imgID=<?php echo $row['imgID']; ?>" method="post" enctype="multipart/form-data">
                                    <div class="row g-3">
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="promo" name="promo" value="<?php echo $row['promoName']; ?>" required>
                                                <label for="promo">Promo Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="location" name="location" value="<?php echo $row['locationName']; ?>" required>
                                                <label for="location">Location</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md py-3">
                                            <select class="form-select" name="flighttype" id="flighttype" aria-label="Default select example" value="" required>
                                                <option selected value="<?php echo $row['flightType']; ?>"><?php echo $row['flightType']; ?></option>
                                                <option value="domestic">Domestic</option>
                                                <option value="international">International</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md py-3">
                                            <select class="form-select" name="currency" id="currency" aria-label="Default select example" required>
                                                <option selected value="<?php echo $row['pcurrency']; ?>"><?php echo $row['pcurrency']; ?></option>
                                                <option value="₱">Peso</option>
                                                <option value="$">Dollar</option>
                                            </select>
                                        </div>
                                        <div class="col-md py-3">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="price" id="price" value="<?php echo $row['pPrice']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="updDetails" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>
                        <div class="card p-3" style="background-color: #004175;">
                            <div class="col-md mb-3">
                                <div class="input-group">
                                    <input type="file" class="form-control" name="img" id="img" aria-describedby="image_id" aria-label="Upload">
                                    <button type="submit" name="" class="btn btn-success">Update</button>
                                </div>
                            </div>
                            <div class="card text-white">
                                <img src="<?php echo "http://main.jetsgo.website//img/" . $row['imgName']; ?>" class="card-img-top" alt="...">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 card p-3 ml-auto" style="background-color: #004175;">
                        <div class="">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="nav-item">
                                    <a href="#itinerary" class="nav-link active" data-bs-toggle="tab">Itinerary</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#inexclusion" class="nav-link" data-bs-toggle="tab">Inclusions / Exclusions</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tandc" class="nav-link" data-bs-toggle="tab">Terms and Conditions</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="itinerary">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;">Add</button>
                                    <div class="accordion mb-3 mt-3" id="accordionExample">
                                        <h2 class="text-bold text-white container">Itinerary</h2>
                                        <?php
                                        $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'itinerary' ORDER BY detPosition";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = $result->fetch_assoc()) :
                                        ?>
                                            <div class="accordion-item text-black">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse aria-expanded=" true" aria-controls="collapse">
                                                        <h5 class="text-bold"><?php echo $row['destTitle'] ?></h5>
                                                    </button>
                                                </h2>
                                                <div id="collapse" class="accordion-collapse collapse show">
                                                    <div class="accordion-body">

                                                        <pre class="inner-pre container text-black" style="font-size: 16px; font-family: sans-serif; white-space: pre-wrap; "><?php echo $row['destDetails'] ?></pre>
                                                    </div>
                                                    <div class="mb-2">
                                                        <button type="button" class="btn btn-success btn-sm">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="inexclusion">
                                    <h2 class="text-bold text-white container mt-3">Inclusions:</h2>
                                    <?php
                                    $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'inclusion'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = $result->fetch_assoc()) :
                                    ?>
                                        <p><i class="bi bi-check-circle-fill text-success"> </i> <?php echo $row['destDetails'] ?></p>
                                    <?php endwhile; ?>
                                    <h2 class="text-bold text-white container">Exclusions:</h2>
                                    <?php
                                    $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'exclusion'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = $result->fetch_assoc()) :
                                    ?>
                                        <p><i class="bi bi-x-circle-fill text-danger"> </i> <?php echo $row['destDetails'] ?></p>
                                    <?php endwhile; ?>
                                </div>
                                <div class="tab-pane fade" id="tandc">
                                    <?php
                                    $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'tnc'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = $result->fetch_assoc()) :
                                    ?>
                                        <h4 class="mt-2 text-bold text-white container"><?php echo $row['destTitle'] ?></h4>
                                        <pre class="inner-pre container text-white" style="font-size: 16px; font-family: sans-serif; white-space: pre-wrap; "><span><?php echo $row['destDetails'] ?></span></pre>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <script type="text/javascript">
        $('#example').DataTable({
            scrollX: true,
            scrollY: true,
            searching: true,
            ordering: true,
            paging: true,
            info: false,
            lengthMenu: [
                [5, 10, 20, 50, 100],
                [5, 10, 20, 50, 100],
            ],
        });
    </script>
</body>

</html>