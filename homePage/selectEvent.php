<?php
session_start();
$eventID = $_GET['id'];
$_SESSION['selectedEvent']=$eventID;
header("location:calender.php");
exit();
?>