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
                <div class="modal-content" style="background-color: #004175;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Add Itinerary</h1>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="destTitle" name="destTitle" placeholder="title" value="">
                                    <label for="destTitle">Title</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="detPosition" name="detPosition" placeholder="title" value="">
                                    <label for="detPosition">Arrangement No.</label>
                                </div>
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
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-success" name="additi" type="submit">Add Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- modal for delete itinerary -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #004175;">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="deleteConfirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    Are you sure you want to delete this itinerary?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal for delete all destination data -->
    <div class="modal fade" id="deleteConfirmationModal2" tabindex="-1" aria-labelledby="deleteConfirmationModal2Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #004175;">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="deleteConfirmationModal2Label">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    Are you sure you want to delete this Destination?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton2">Delete Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Inclusions or exclusions ADD-->
    <form action="crud-insert.php?imgID=<?php echo $row['imgID']; ?>" method="post">
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop2Label" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" style="background-color: #004175;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-white" id="staticBackdrop2Label">Add Inclusions or Exclusions</h1>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="col-md">
                                <select class="form-select" name="detailType" id="detailType" aria-label="Default select example" value="" required>
                                    <option value="inclusion">Inclusion</option>
                                    <option value="exclusion">Exclusion</option>
                                </select>
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
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-success" name="addinex" type="submit">Add Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="crud-insert.php?imgID=<?php echo $row['imgID']; ?>" method="post">
        <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop3Label" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" style="background-color: #004175;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-white" id="staticBackdrop3Label">Add Terms and Conditions</h1>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-success" name="addtnc" type="submit">Add Confirm</button>
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
                        <!-- <button type="submit" name="update1" class="btn btn-success mt-4 mx-1" style="float:left;">Edit</button> -->
                        <!-- <button type="submit" name="delete_student" value="" class="btn btn-danger mt-4 mx-1" style="float:left;">Delete This Datas</button> -->
                        <button type="submit" name="deleteitinerary2" class="btn btn-danger mt-4 mx-1" onclick="confirmDelete2('<?php echo $row['imgID']; ?>')" tyle="float:left;">Delete Destination</button>
                    </div>
                    <!-- <div class="col-md py-3">
                        <h2 class="textnew text-bold mb-3 mt-3" style="color: #004175;"><?php echo $row['promoName']; ?></h2>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-lg-6 ml-auto" align="center">
                        <div class="card text-white mb-3" style="background:#004175;">
                            <div class="container">
                                <!-- <h3 class="text-bold">Update</h3> -->
                                <form action="crud-edit.php?imgID=<?php echo $row['imgID']; ?>" method="post" enctype="multipart/form-data">
                                    <div class="row g-3 py-3">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="promo" name="promo" value="<?php echo $row['promoName']; ?>" required>
                                                <label for="promo">Promo Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="location" name="location" value="<?php echo $row['locationName']; ?>" required>
                                                <label for="location">Location</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md">
                                            <select class="form-select" name="flighttype" id="flighttype" aria-label="Default select example" value="" required>
                                                <?php
                                                if ($row['flightType'] == 'domestic') {
                                                ?>
                                                    <option value="domestic">Domestic</option>
                                                    <option value="international">International</option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="international">International</option>
                                                    <option value="domestic">Domestic</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-3 py-3">
                                        <div class="col-md">
                                            <select class="form-select" name="currency" id="currency" aria-label="Default select example" required>
                                                <?php
                                                if ($row['pcurrency'] == '$') {
                                                ?>
                                                    <!-- <option selected value="<?php echo $row['pcurrency']; ?>" readonly><?php echo $row['pcurrency']; ?></option> -->
                                                    <option value="$">Dollar</option>
                                                    <option value="₱">Peso</option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="₱">Peso</option>
                                                    <option value="$">Dollar</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="price" id="price" value="<?php echo $row['pPrice']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="updDetails" class="btn btn-success mb-3" style="float:right;">Update Details</button>
                                </form>
                            </div>
                        </div>
                        <div class="card p-3" style="background-color: #004175;">
                            <form action="crud-edit.php?imgID=<?php echo $row['imgID']; ?>" method="post" enctype="multipart/form-data">
                                <div class="col-md mb-3">
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="img" name="img" aria-describedby="image_id" aria-label="Upload">
                                        <button type="submit" name="updimgdest" class="btn btn-success upload-btn" onclick="document.getElementById('img').click()" id="updimgdest" disabled>Update Picture</button>
                                    </div>
                                </div>
                                <div class="card text-white">
                                    <img src="<?php echo "http://main.jetsgo.website/img/" . $row['imgName']; ?>" class="card-img-top" alt="...">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-6 card p-3 ml-auto" style="background-color: #004175;">
                        <div class="">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="nav-item">
                                    <a href="#itinerary" class="nav-link active text-primary text-bold" data-bs-toggle="tab">Itinerary</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#inexclusion" class="nav-link text-primary text-bold" data-bs-toggle="tab">Inclusions / Exclusions</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tandc" class="nav-link text-primary text-bold" data-bs-toggle="tab">Terms and Conditions</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active mt-3" id="itinerary">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;">Add</button>
                                    <h2 class="text-bold text-white container">Itinerary</h2>
                                    <div class="accordion mb-3 mt-3" id="accordionExample">
                                        <?php
                                        $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'itinerary' ORDER BY detPosition";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = $result->fetch_assoc()) :
                                        ?>
                                            <div class="card my-3 py-3 textnew" style="background: #EBE3D5;">
                                                <form method="post" action="crud-edit.php"> <!-- Add form for editing -->
                                                    <input type="hidden" name="destID" value="<?php echo $row['destID']; ?>"> <!-- Hidden input for destID -->
                                                    <input type="hidden" name="naryID" value="<?php echo $row['naryID']; ?>"> <!-- Hidden input for naryID -->
                                                    <div class="row container">
                                                        <div class="col-md-8">
                                                            <div class="px-1">
                                                                <label for="detPosition" class="text-bold">Arrangement No.</label>
                                                                <input type="text" class="form-control" name="detPosition" placeholder="title" value="<?php echo $row['detPosition'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button type="submit" name="upditinerary" class="btn btn-success mt-4">Update</button>
                                                            <button type="button" name="deleteitinerary" class="btn btn-danger mt-4" onclick="confirmDelete('<?php echo $row['destID']; ?>', '<?php echo $row['naryID']; ?>')">Delete</button> <!-- Call JavaScript function to pass ID -->
                                                        </div>
                                                    </div>
                                                    <div class="px-3">
                                                        <label for="destTitle" class="text-bold">Title</label>
                                                        <input type="text" class="form-control" name="destTitle" placeholder="title" value="<?php echo $row['destTitle'] ?>">
                                                    </div>
                                                    <div class="px-3">
                                                        <label for="destDetails" class="text-bold">Details</label>
                                                        <textarea class="form-control" placeholder="Add details here" name="destDetails" style="height: 200px"><?php echo $row['destDetails'] ?></textarea>
                                                        <!-- <textarea class="form-control" placeholder="Add details here" name="destDetails" style="height: 200px" id="editor">&lt;p&gt;<?php echo $row['destDetails'] ?>&lt;/p&gt;</textarea> -->
                                                    </div>

                                                </form>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="inexclusion">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" id="addButton2" style="float:right;">Add</button>
                                    <h2 class="text-bold text-white container mt-3">Inclusions:</h2>
                                    <?php
                                    $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'inclusion'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = $result->fetch_assoc()) :
                                    ?>
                                        <form method="post" action="crud-edit.php">
                                            <div class="card p-3 my-3 py-3 textnew" id="inclusion" style="background: #EBE3D5;">
                                                <input type="hidden" name="destID" value="<?php echo $row['destID']; ?>"> <!-- Hidden input for destID -->
                                                <input type="hidden" name="naryID" value="<?php echo $row['naryID']; ?>"> <!-- Hidden input for naryID -->
                                                <div class="row">
                                                    <div class="px-3">
                                                        <label for="destDetails" class="text-bold">Inclusion Details</label>
                                                        <textarea class="form-control" placeholder="Add details here" name="destDetails" style="height: 200px"><?php echo $row['destDetails'] ?></textarea>
                                                    </div>
                                                    <div class="px-3">
                                                        <button type="button" name="deleteitinerary" class="btn btn-danger mt-4" onclick="confirmDelete('<?php echo $row['destID']; ?>', '<?php echo $row['naryID']; ?>')" style="float:right;">Delete</button>
                                                        <button type="submit" name="updinclusion" class="btn btn-success mt-4 mx-1" style="float:right;">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php endwhile; ?>
                                    <h2 class="text-bold text-white container">Exclusions:</h2>
                                    <?php
                                    $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'exclusion'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = $result->fetch_assoc()) :
                                    ?>
                                        <form method="post" action="crud-edit.php">
                                            <div class="card p-3 my-3 py-3 textnew" id="exclusion" style="background: #EBE3D5;">
                                                <input type="hidden" name="destID" value="<?php echo $row['destID']; ?>"> <!-- Hidden input for destID -->
                                                <input type="hidden" name="naryID" value="<?php echo $row['naryID']; ?>"> <!-- Hidden input for naryID -->
                                                <div class="row">
                                                    <div class="px-3">
                                                        <label for="destDetails" class="text-bold">Exclusion Details</label>
                                                        <textarea class="form-control" placeholder="Add details here" name="destDetails" style="height: 200px"><?php echo $row['destDetails'] ?></textarea>
                                                    </div>
                                                    <div class="px-3">
                                                        <button type="button" name="deleteitinerary" class="btn btn-danger mt-4" onclick="confirmDelete('<?php echo $row['destID']; ?>', '<?php echo $row['naryID']; ?>')" style="float:right;">Delete</button>
                                                        <button type="submit" name="updexclusion" class="btn btn-success mt-4 mx-1" style="float:right;">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php endwhile; ?>
                                </div>
                                <div class="tab-pane fade" id="tandc">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop3" id="addButton" style="float:right;">Add</button>
                                    <div class="mt-3" id="destination">
                                        <?php
                                        $sql = "SELECT * FROM tbldestdetails WHERE destID = '$id' && detailType = 'tnc'";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = $result->fetch_assoc()) :
                                        ?>
                                            <form method="post" action="crud-edit.php">
                                                <div class="card p-3 my-3 py-3 textnew" style="background: #EBE3D5;">
                                                    <input type="hidden" name="destID" value="<?php echo $row['destID']; ?>"> <!-- Hidden input for destID -->
                                                    <input type="hidden" name="naryID" value="<?php echo $row['naryID']; ?>"> <!-- Hidden input for naryID -->
                                                    <div class="row">
                                                        <div class="px-3">
                                                            <label for="destTitle" class="text-bold">Title</label>
                                                            <input type="text" class="form-control" name="destTitle" placeholder="title" value="<?php echo $row['destTitle'] ?>">
                                                        </div>
                                                        <div class="px-3">
                                                            <label for="destDetails" class="text-bold">Details</label>
                                                            <textarea class="form-control" placeholder="Add details here" name="destDetails" style="height: 800px"><?php echo $row['destDetails'] ?></textarea>
                                                        </div>
                                                        <div class="px-3">
                                                            <button type="button" name="deleteitinerary" class="btn btn-danger mt-4" onclick="confirmDelete('<?php echo $row['destID']; ?>', '<?php echo $row['naryID']; ?>')" style="float:right;">Delete</button>
                                                            <button type="submit" name="updtnc" class="btn btn-success mt-4 mx-1" style="float:right;">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // JavaScript function to pass ID to modal
        function confirmDelete(naryID) {
            console.log('Delete button clicked! ID:', naryID); // Check if the function is invoked and ID is passed correctly
            var deleteForm = document.getElementById('deleteForm'); // Assuming your form has an ID 'deleteForm'
            deleteForm.elements['naryID'].value = naryID; // Set the value of naryID input field
            $('#staticBackdrop2').modal('show'); // Show the modal
        }
    </script>

    <script>
        function confirmDelete(destID, naryID) {
            // Set the values of destID and naryID to data attributes of the delete button
            $('#confirmDeleteButton').attr('data-destID', destID);
            $('#confirmDeleteButton').attr('data-naryID', naryID);
            // Show the delete confirmation modal
            $('#deleteConfirmationModal').modal('show');
        }

        // Event listener for the confirmation delete button in the modal
        $('#confirmDeleteButton').click(function() {
            var destID = $(this).attr('data-destID');
            var naryID = $(this).attr('data-naryID');
            // Redirect to PHP script for deletion with both destID and naryID
            window.location.href = "crud-delete-funcs/itidelete.php?destID=" + destID + "&naryID=" + naryID;
        });
    </script>

    <script>
        function confirmDelete2(imgID) {
            // Set the values of destID and naryID to data attributes of the delete button
            $('#confirmDeleteButton2').attr('data-imgID', imgID);
            // Show the delete confirmation modal
            $('#deleteConfirmationModal2').modal('show');
        }

        // Event listener for the confirmation delete button in the modal
        $('#confirmDeleteButton2').click(function() {
            var imgID = $(this).attr('data-imgID');
            // Redirect to PHP script for deletion with both destID and naryID
            window.location.href = "crud-delete-funcs/desDelete.php?imgID=" + imgID;
        });
    </script>

    <script>
        document.getElementById('img').addEventListener('change', function() {
            var updimgdest = document.getElementById('updimgdest');
            if (this.value !== "") {
                updimgdest.disabled = false;
            } else {
                updimgdest.disabled = true;
            }
        });
    </script>
    <script>
        function hasData(destinationId) {
            var destination = document.getElementById(destinationId);
            // Check if destination has any content
            return destination.innerHTML.trim().length > 0;
        }

        // Function to toggle add button visibility based on destination data
        function toggleAddButtonVisibility() {
            var addButton = document.getElementById("addButton");
            var destinationId = "destination";

            if (hasData(destinationId)) {
                addButton.style.display = "none"; // Hide add button
            } else {
                addButton.style.display = "inline"; // Show add button
            }
        }

        // Call the toggleAddButtonVisibility function initially
        toggleAddButtonVisibility();
    </script>

    <script>
        // Function to check if a container has data
        function hasData2(containerId) {
            var container = document.getElementById(containerId);
            // Check if container has any content
            return container.innerHTML.trim().length > 0;
        }

        // Function to toggle add button visibility based on inclusion and exclusion data
        function toggleAddButtonVisibility2() {
            var addButton2 = document.getElementById("addButton2");
            var inclusionId = "inclusion";
            var exclusionId = "exclusion";
            var inclusionData = hasData2(inclusionId);
            var exclusionData = hasData2(exclusionId);

            if (inclusionData && exclusionData) {
                addButton2.style.display = "none"; // Hide add button
            } else {
                addButton2.style.display = "inline"; // Show add button
            }
        }

        // Call the toggleAddButtonVisibility function initially
        toggleAddButtonVisibility2();
    </script>

</body>

</html>