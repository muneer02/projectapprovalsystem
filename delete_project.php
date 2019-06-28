<?php

$id = $_GET['id'];
if ($id) {

    include 'connect.php';

    // sql to delete a record
    $sql = "DELETE FROM projects WHERE id=" . $id;

    if ($conn->query($sql) === TRUE) {
        echo "Project deleted successfully";
        
    } else {
        echo "Error deleting project: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid Id.";
}
header("location: projects_list.php");

?>