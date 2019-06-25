<?php

  include 'connect.php';

  $sql = "SELECT * FROM groups ORDER BY name DESC";
  $groups = $conn->query($sql);
  
  if ($groups->num_rows != 0) {
    $row = $groups->fetch_assoc();
    $group_name = ++$row['name'];
  }
  else{
    $group_name = 'Group 01';
  }

  $sql = "INSERT INTO groups (name) VALUES ('$group_name')";

    if ($conn->query($sql) === TRUE) {
        header("location: groups.php");
    }
    else {
        echo "Error creating group: <br>" . $conn->error;
    }

    $conn->close();
  

?>
