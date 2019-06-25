<?php
    include 'connect.php';

    // sql to create table
    $sql = "CREATE TABLE projects (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        title VARCHAR(30) NOT NULL,
        description TEXT NOT NULL,
        group_id INT UNSIGNED NOT NULL,
        FOREIGN KEY (group_id) REFERENCES groups(id),
        guide_id INT UNSIGNED NOT NULL,
        FOREIGN KEY (guide_id) REFERENCES users(id),
        department VARCHAR(15) NOT NULL,
        session CHAR(4) NOT NULL,
        synopsis VARCHAR(70) UNIQUE,
        documentation VARCHAR(70) UNIQUE,
        approved boolean NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT NOW(),
        updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW()
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table projects created successfully";
    }
    else {
        echo "Error creating table: " . $conn->error;
    }



    $conn->close();
?>