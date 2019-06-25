<?php

$id = $_GET['id'];
if ($id) {

    include 'connect.php';

    // sql to delete a record
    $value=true;
    $sql = "UPDATE users set approved=".$value." where id="."$id";

    if ($conn->query($sql) === TRUE) {
        alert("User approved successfully");
        
    } else {
        alert("Error approving record: " . $conn->error);
    }

    $conn->close();
} else {
    alert("Invalid Id.");
}
header("location: list.php");

function alert($message){
    echo '<script language="javascript">';
    echo 'alert("'.$message.'")';
    echo '</script>';
}

?>