<?php
    session_start();
    if(!$_SESSION['user']){
        echo "<script>alert('Your session has expired');</script>";
        echo "<script>location.href = 'login.php';</script>";
    }
?>