<?php
require'connect.php';
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $username=$_POST["username"];
    //$email=$_POST["email"];
    if(isset($_POST['email'])){
        $email = test_input($_POST['email']);
    }
    $password=$_POST["password"];
    $confirm=$_POST["confirm"];
    $duplicate=mysqli_query($conn,"SELECT * FROM user_info WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo "<script> alert('Username or Email taken')</script>";
    }else{
        if($password==$confirm){
            $query="INSERT INTO user_info VALUES ('','$name','$username','$email','$password','','')";
            mysqli_query($conn,$query);
            echo "<script> alert('Success')</script>";
        }else{
            echo "<script> alert('Password does not match')</script>";
        }
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
<!DOCTYPE html>
<html>
<link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet'>
                
<head>
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="landing.css">
<body class="background-image">
    <h1>Registration</h1>
    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required value="">
        <br><br>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required value="">
        <br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required value="">
        <br><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required value="">
        <br><br>
        <label for="confirm">Re enter password: </label>
        <input type="password" name="confirm" id="confirm" required value="">
        <br><br>
        <button class="button1" type="submit" name="submit">Register</button>
    </form>
    <br><br>
    <a href="index.php">Already have an account?</a>
</body>
</html>