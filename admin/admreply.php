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

    ?>

    <section class="home">

        <div class="container card mt-5" style="background-color: #a9cef9;">
            <div class="container-sm mt-4 my-5">
                <h3 class="text" align="center">Bookings of International Promo</h3>
                <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sender's Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Replyer's Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tblreply";
                        $result = mysqli_query($conn, $sql);
                        while ($row = $result->fetch_assoc()) :
                        ?>
                            <tr>
                                <td data-label="ID"><?php echo $row['msgID']; ?></td>
                                <td data-label="Sender's Name"><?php echo $row['mName']; ?></td>
                                <td data-label="Sender's Email"><?php echo $row['mEmail']; ?></td>
                                <td data-label="Subject"><?php echo $row['mSubject']; ?></td>
                                <td data-label="Message"><?php echo $row['mMessage']; ?></td>
                                <td data-label="Replyer's Name"><?php echo $row['replyerName']; ?></td>
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