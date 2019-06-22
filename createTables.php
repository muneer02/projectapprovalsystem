<?php
    include 'connect.php';

    // sql to create table
    $sql = "CREATE TABLE users (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        fullname VARCHAR(30) NOT NULL,
        dob DATE NOT NULL,
        address VARCHAR(30) NOT NULL,
        gender CHARACTER(1) NOT NULL,
        department VARCHAR(15) NOT NULL,
        semester CHARACTER(1),
        email VARCHAR(30) NOT NULL UNIQUE,
        mobile CHARACTER(10) NOT NULL,
        registration_no VARCHAR(20),        
        password VARCHAR(40) NOT NULL,
        role VARCHAR(7) NOT NULL,
        approved boolean NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT NOW(),
        updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW()

    )";

    $sql = "CREATE TABLE projects (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        title VARCHAR(30) NOT NULL,
        discription VARCHAR(30) NOT NULL,
        guide VARCHAR(30) NOT NULL,
        group_id INT(5),
        department VARCHAR(15) NOT NULL,
        session INT(5),
        approved boolean NOT NULL,        
        synopsis VARCHAR(35),
        documentation VARCHAR(35),
        created_at TIMESTAMP NOT NULL DEFAULT NOW(),
        updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW()
    
        )";


    if ($conn->query($sql) === TRUE) {
        echo "Table users and projects created successfully";
    }
    else {
        echo "Error creating table: " . $conn->error;
    }



    $conn->close();
?>