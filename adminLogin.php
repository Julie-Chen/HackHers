<?php
require'connect.php';
if(isset($_POST["submit"])){
    $user=$_POST["user"];
    $password=$_POST["password"];
    $result=mysqli_query($conn,"SELECT * FROM admin_info WHERE username='$user' OR email='$user'");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($password==$row["password"]){
            $_SESSION["login"]=true;
            $_SESSION["id"]=$row["id"];
            header("Location: adminLanding.php");
        }else{
            echo "<script> alert('Wrong Password')</script>";
        }
    }else{
        echo "<script> alert('Admin does not exist')</script>";

    }
}
?>
<!DOCTYPE html>

<html>
<link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet'>
                
<head>
  <link rel="stylesheet" href="landing.css"><head>  <link rel="stylesheet" href="landing.css">
</head>
<body class="background-image">
    <h1>Admin Login</h1>
    <form class="" action="" method="post" autocomplete="off">
        <label for="user">Username/Email: </label>
        <input type="text" name="user" id="user" required value="">
        <br><br><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required value="">
        <br><br><br>
        <button class = "button1" type="submit" name="submit">Login</button>
    </form><br><br>
    <a href="index.php">Not an admin?</a>
</body>
</html>