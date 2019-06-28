<?php

$id = $_GET['id'];
if ($id) {

    include 'connect.php';

    $value=1;
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
header("location: users_list.php");

function alert($message){
    echo '<script language="javascript">';
    echo 'alert("'.$message.'")';
    echo '</script>';
}

?>