<?php

$id = $_GET['id'];
if ($id) {

    include 'connect.php';

    // sql to delete a record
    $sql = "DELETE FROM users WHERE id=" . $id;

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid Id.";
}
header("location: list.php");

?>