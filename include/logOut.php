<?php
$connect = mysqli_connect("localhost", "root", "", "test");
session_start();

$_SESSION['username'] = null;
$_SESSION['user_id'] = null;
header("Location: ../index.php");



?>