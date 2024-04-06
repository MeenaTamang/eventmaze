<?php

$host = "127.0.0.1";
$db = "eventmaze";
$user = "root";
$password = "";

//create connection
$conn = new mysqli($host, $user, $password, $db);

//check connection
if($conn->connect_error){
    die("Connection Failed" .$conn->connect_error);
}
?>