<?php
    session_start();

    if(isset($_SESSION["userEmail"])){
        unset($_SESSION['userEmail']);
    }

    header("location: signin.php");
?>