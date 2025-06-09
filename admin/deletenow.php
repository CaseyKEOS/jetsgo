
<?php
// Include your database connection file if not already included
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deliti'])) {
    // Retrieve data from form
    $destID = $_POST['destID'];
    $naryID = $_POST['naryID'];
    $detPosition = $_POST['detPosition'];
    // Prepare update query
    $sql = "DELETE FROM tbldestdetails detPosition='$detPosition'";

    // Execute update query
    if (mysqli_query($conn, $sql)) {
        // Redirect to adminter.php after successful update
        header("Location: editDest.php?imgID=" . $destID);
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}
?>
