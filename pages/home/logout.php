<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['fb_id']);
    session_destroy();
    header("Location: ../../index.php");
?>