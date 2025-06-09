<?php
session_start();
include '../connection.php';

// Delete Itinerary
if (isset($_GET['imgID'])) {
    // Sanitize the input to prevent SQL injection
    $imgID = mysqli_real_escape_string($conn, $_GET['imgID']);
    
    // SQL to delete the itinerary item with the specified destID and naryID
    $sql = "DELETE FROM tbldestdetails WHERE destID = '$imgID'";
    $sql2 = "DELETE FROM tbldestination WHERE imgID = '$imgID'";

    // Execute the delete queries
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        // Deletion successful, redirect back to the page where the item was deleted
        header("Location: ../adminter.php"); // Change 'previous-page.php' to the actual page URL
        exit();
    } else {
        // If deletion fails, display an error message
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // If destID or naryID is not set in the URL, display an error message
    echo "Invalid request.";
}

?>