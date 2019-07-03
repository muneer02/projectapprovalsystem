<?php

    session_start();
    if($_SESSION['user']){
        header('Location: home.php');
    }
    else{
        header('Location: login.php');
    }

?>