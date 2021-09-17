<?php
$connection = mysqli_connect("localhost", "root", "", "test");

// if(isset($_POST['submit'])){
    // $username = $_POST['username'];
    // $user_password = $_POST['user_password'];

    $username = 'muni';
    $password = 'muni';

    if(!empty($username) && !empty($password)){
       $username = mysqli_real_escape_string($connection, $username);
       $password =  mysqli_real_escape_string($connection, $password);

       $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));

       $query = "INSERT INTO users (username, password)";
       $query.= "VALUES('{$username}', '{$password}')";
       $register_user_query =  mysqli_query($connection,$query);
       if(!$register_user_query){
           die("Query Failed" .mysqli_error($connection) . '' .mysqli_error($connection));
    
       }
    //    $message = "Your registration has be been submitted";
    echo 'successful';
      }else{
          echo "Fields cannot be empty";
      }
// }
?>