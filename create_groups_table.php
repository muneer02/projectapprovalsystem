<?php
    include 'connect.php';

    // sql to create table
    $sql = "CREATE TABLE groups (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        name VARCHAR(20) NOT NULL UNIQUE
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table groups created successfully";
    }
    else {
        echo "Error creating table: " . $conn->error;
    }



    $conn->close();
?>