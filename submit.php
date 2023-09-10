<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        session_start();
        $_SESSION["post"]=$_POST;
        header("Location: view.php");
        exit();
    }else {
        header("Location: index.php");
        exit();
    }
?>