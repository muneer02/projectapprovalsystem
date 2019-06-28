<?php
    include 'connect.php';

    // sql to create table
    $sql = "CREATE TABLE khalid (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        fullname VARCHAR(30) NOT NULL,
        dob DATE NOT NULL,
        address VARCHAR(30) NOT NULL,
        gender CHARACTER(1) NOT NULL,
        department VARCHAR(15) NOT NULL,
        semester CHARACTER(1),
        email VARCHAR(30) NOT NULL UNIQUE,
        mobile CHAR(10) NOT NULL,
        registration_no VARCHAR(20),        
        password VARCHAR(40) NOT NULL,
        role VARCHAR(7) NOT NULL,
        approved boolean NOT NULL,
        group_id INT UNSIGNED,
        FOREIGN KEY (group_id) REFERENCES groups(id),
        created_at TIMESTAMP NOT NULL DEFAULT NOW(),
        updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW()

    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table users created successfully";
    }
    else {
        echo "Error creating table: " . $conn->error;
    }



    $conn->close();
?>