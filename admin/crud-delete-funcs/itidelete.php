<?php
session_start();
include '../connection.php';

// Delete Itinerary
if (isset($_GET['destID']) && isset($_GET['naryID'])) {
    // Sanitize the input to prevent SQL injection
    $destID = mysqli_real_escape_string($conn, $_GET['destID']);
    $naryID = mysqli_real_escape_string($conn, $_GET['naryID']);
    
    // SQL to delete the itinerary item with the specified destID and naryID
    $sql = "DELETE FROM tbldestdetails WHERE destID = '$destID' AND naryID = '$naryID'";
    
    // Execute the delete query
    if (mysqli_query($conn, $sql)) {
        // Deletion successful, redirect back to the page where the item was deleted
        header("Location: ../editDest.php?imgID=" . $destID); // Change 'previous-page.php' to the actual page URL
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