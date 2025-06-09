<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JetsGo admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css" />
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <?php
    include 'adminnav.php';
    require 'connection.php';

    ?>

    <section class="home">
        <form action="updater.php" method="post" enctype="multipart/form-data">
            <div class="container card mt-5" style="background-color: #a9cef9;">
                <div class="container-sm mt-4 my-5">
                    <h3 class="text" align="center">Popular Places</h3>
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Place Name</th>
                                <th>Location Name</th>
                                <th>File Name</th>
                                <!-- <th>Operators</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM tblpplaces";
                            $result = mysqli_query($conn, $sql);
                            while ($row = $result->fetch_assoc()) :
                            ?>
                                <tr>
                                    <td data-label="ID"><?php echo $row['imgID']; ?></td>
                                    <td data-label="Place Name"><?php echo $row['placeName']; ?></td>
                                    <td data-label="Location Name"><?php echo $row['locName']; ?></td>
                                    <td data-label="File Name"><?php echo $row['imgName']; ?></td>
                                    <!-- <td>
                                        <button class="btn btn-success" name="insert" type="submit">Insert</button>
                                        <button class="btn btn-primary" name="update" type="submit">Update Image</button>
                                        <button class="btn btn-info" name="upprice" type="submit">Update Price</button>
                                        <button class="btn btn-danger" name="delete" type="submit">Delete</button>
                                    </td> -->
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container card mt-5" style="background-color: #a9cef9;">
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="place" id="place" placeholder="Enter Place Name" required>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="loc" id="loc" placeholder="Enter Location Name" required>
                        </div>
                    </div>
                </div>
                    <div class="col-md py-3">
                        <div class="input-group">
                            <input type="file" class="form-control" name="img" id="img" aria-describedby="image_id" aria-label="Upload">
                        </div>
                    </div>

                <div class="mt-2 my-3" align="center">
                    <button class="btn btn-success" name="insert2" type="submit">Insert</button>
                    <button class="btn btn-primary" name="update2" type="submit">Update Image</button>
                    <button class="btn btn-danger" name="delete2" type="submit">Delete</button>
                </div>
            </div>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
            select: {
                style: 'single'
            }
        });
    </script>
</body>

</html>