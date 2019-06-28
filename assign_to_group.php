<?php

$id=$_GET['id'];
if ($id && $_SERVER["REQUEST_METHOD"] == "POST") {

  include 'connect.php';

  if (isset($_POST["group"]) && test_input($_POST["group"]) != '') {
      $group_id = test_input($_POST["group"]);
  } else {
      die("Enter valid group");
  }   

  $sql = "UPDATE users set group_id=".$group_id." where id="."$id";
  if ($conn->query($sql) === TRUE) {
      alert("User linked successfully");
      
  } else {
      alert("Error linking user: " . $conn->error);
  }
  $conn->close();

} else {
  alert("Invalid Id.");
}
header("location: groups_list.php");


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function alert($message){
  echo '<script language="javascript">';
  echo 'alert("'.$message.'")';
  echo '</script>';
}
?>