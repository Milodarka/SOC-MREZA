<?php


    session_start();

    if(isset($_SESSION['id']))
    {
        session_unset();
        session_destroy();
        header('Location: login.php');
    }
  


?>