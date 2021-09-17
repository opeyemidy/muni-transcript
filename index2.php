<?php
$connect = mysqli_connect("localhost", "root", "", "test");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];

    if(!empty($username) && !empty($user_password)){
       $username = mysqli_real_escape_string($connect, $username);
       $user_password =  mysqli_real_escape_string($connect, $user_password);

       $user_password = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 10));

       $query = "INSERT INTO users(username, user_password)";
       $query .= "VALUES('{$username}', '{$user_password}')";
       $register_user_query =  mysqli_query($connect,$query);
       if(!$register_user_query){
           die("Query Failed" .mysqli_error($connect) . '' .mysqli_error($connect));
    
       }
       $message = "Your registration has be been submitted";
      }else{
          $message = "Fields cannot be empty";
      }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="js/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="css/fixed.css">
    <!-- Custom CSS -->
   <link rel="stylesheet" type="text/css" href="css/signUp.css">

   </head>

<body>

    <div class="parent" >
    <div class="parent-left">
        <img src="ABUpix.png" alt="">
    </div>
    <div class="parent-right">
        <h1 class="name">Ahmadu Bello University
        </h1>  
        <h3>Zaria-Nigeria</h3>
    </div>
    </div>
    <form role="form" action="index.php" method="POST" >
    <h6 class="text-center"><?php echo $message ; ?></h6>
        <div class="container">
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="username"><b>Email</b></label><br>
            <input type="text" placeholder="Enter Email" name="username" required><br>
            <label for="user_password"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="user_password" required><br>
           
            <p>By creating an account you agree to our<a href="#">Terms & Privacy.</a></p>
            <!-- <button type="submit" class="signUp">Sign Up</button> -->
            <input type="submit" name="submit" class="signUp" value="Re" >Submit
        </div>
    </form>
</body>
</html>