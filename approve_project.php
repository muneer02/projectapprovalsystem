<?php

$id = $_GET['id'];
if ($id) {

    include 'connect.php';

    $value=1;
    $sql = "UPDATE projects set approved=".$value." where id="."$id";

    if ($conn->query($sql) === TRUE) {
        alert("Project approved successfully");
        
    } else {
        alert("Error approving project: " . $conn->error);
    }

    $conn->close();
} else {
    alert("Invalid Id.");
}
header("location: projects_list.php");

function alert($message){
    echo '<script language="javascript">';
    echo 'alert("'.$message.'")';
    echo '</script>';
}

?>