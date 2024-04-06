<?php
    session_start();
    session_destroy();
    header("location: ../loginPage/adminlog.html");
    exit();
?>