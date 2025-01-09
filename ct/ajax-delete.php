<?php
// ajax-delete.php
include("db.php"); // Include your database connection file

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete the record from the database
    $sql = "DELETE FROM empp WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
} else {
    echo 0; // Invalid request
}
?>