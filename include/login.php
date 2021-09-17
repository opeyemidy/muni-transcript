<?php
$connect = mysqli_connect("localhost", "root", "", "test");
session_start();



if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];

    $username = mysqli_real_escape_string($connect, $username);
    $user_password = mysqli_real_escape_string($connect, $user_password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = mysqli_query($connect, $query);
    if(!$select_user_query){
        die("QUERY FAILED" .mysqli_error($connect)); 
    } 
    while($row = mysqli_fetch_array($select_user_query)){
         $db_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['password']; 
    }

    if($username === $db_username && $user_password === $db_user_password){

        $_SESSION['username'] = $db_username;
        $_SESSION['user_id'] = $db_id;

        header("Location: ../dashboard.php");
    }else{
        header("Location: ../index.php");
    }

} 

?>