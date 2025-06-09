<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jetsgo Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css" />
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'adminnav.php';
    require 'connection.php';

    ?>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style="background-color: #EBE3D5;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Destination</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="crud-insert.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row g-3">
                                <div class="col-md py-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="promo" name="promo" placeholder="Enter Promo Name" required>
                                        <label for="promo">Promo Name</label>
                                    </div>
                                </div>
                                <div class="col-md py-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location Name" required>
                                        <label for="location">Location</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md py-3">
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="img" id="img" aria-describedby="image_id" aria-label="Upload" required>
                                    </div>
                                </div>
                                <div class="col-md py-3">
                                    <select class="form-select" name="flighttype" id="flighttype" aria-label="Default select example">
                                        <option selected value="domestic">Domestic</option>
                                        <option value="international">International</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md py-3">
                                    <select class="form-select" name="currency" id="currency" aria-label="Default select example">
                                        <option selected value="₱">Peso</option>
                                        <option value="$">Dollar</option>
                                    </select>
                                </div>
                                <div class="col-md py-3">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" name="adddest" type="submit">Add Input</button>
                    </div>
                </form>
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

    <section class="home">
        <div class="container card mt-5" style="background-color: #EBE3D5;">
            <div class="container-sm mt-4 my-5">
                <h3 class="text" align="center">List of Promos</h3>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;">
                    Add
                </button>
                <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Place Name</th>
                            <th>Location Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tbldestination ORDER BY imgID DESC";
                        $result = mysqli_query($conn, $sql);
                        while ($row = $result->fetch_assoc()) :
                        ?>
                            <tr>
                                <td data-label="ID"><?php echo $row['imgID']; ?></td>
                                <td data-label="Promo Name"><?php echo $row['promoName']; ?></td>
                                <td data-label="Country Name"><?php echo $row['locationName']; ?></td>
                                <td data-label="Price"><?php echo $row['pcurrency']; ?><?php echo $row['pPrice']; ?></td>
                                <td>
                                    <a href="viewDest.php?imgID=<?php echo $row['imgID']; ?>" class="btn btn-primary btn-sm">View</a>
                                    <a href="editDest.php?imgID=<?php echo $row['imgID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <!-- <button type="submit" name="delete_student" value="" class="btn btn-danger btn-sm">Delete</button> -->
                                    <button type="submit" name="deleteitinerary2" class="btn btn-danger btn-sm" onclick="confirmDelete2('<?php echo $row['imgID']; ?>')" tyle="float:left;">Delete</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <script type="text/javascript">
        $('#example').DataTable({
            scrollX: true,
            scrollY: true,
            searching: true,
            ordering: false,
            paging: true,
            info: false,
            lengthMenu: [
                [10, 20, 50, 100],
                [10, 20, 50, 100],
            ],
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
</body>

</html>