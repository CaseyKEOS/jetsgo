<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jetsgo Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css" />
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <?php
    include 'adminnav.php';
    require 'connection.php';

    $sql = "SELECT * FROM tbluser WHERE verstats = '1'";
    $result = mysqli_query($conn, $sql);
    ?>

    <section class="home">
        <h1 class="text" align="center">JetsGo Travel Services</h1>
        <div class="container" align="center">
            </br>
            <div class="main-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="container">
                            <div class="container">
                                <div class="row card container" style="background-color: #a9cef9;">
                                    <div class="card-body">
                                        <h4 class="text card-title">JetsGo Employees</h4>
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>User ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    while ($row = $result->fetch_assoc()) :
                                                    ?>
                                                        <td data-label="Name"><?= $row['username']; ?></td>
                                                        <td data-label="User ID"><?= $row['userid']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <script type="text/javascript">
        $('#example').DataTable({
            searching: false,
            ordering: false,
            paging: false,
            info: false,
            lengthMenu: [
                [5],
                [5],
            ],
        });
    </script>
</body>

</html>