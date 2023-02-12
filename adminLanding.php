<?php
require'connect.php';

if(!empty($_SESSION["id"])){
    $id=$_SESSION["id"];
    $result=mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$id");
    $row=mysqli_fetch_assoc($result);
}else{
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $message=$_POST["message"];
    $query="INSERT INTO reminders VALUES ('','$message')";
    mysqli_query($conn,$query);
    echo "<script> alert('Message successfully added')</script>";


}
if(isset($_POST["submit2"])){
    $name=$_POST["name"];
    $username=$_POST["username"];
    //$email=$_POST["email"];
    if(isset($_POST['email'])){
        $email = test_input($_POST['email']);
    }
    $password=$_POST["password"];
    $confirm=$_POST["confirm"];
    $duplicate=mysqli_query($conn,"SELECT * FROM admin_info WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo "<script> alert('Username or Email taken')</script>";
    }else{
        if($password==$confirm){
            $query="INSERT INTO admin_info VALUES ('','$name','$username','$email','$password')";
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
<link href="https://fonts.cdnfonts.com/css/bruno-ace-sc" rel="stylesheet">
                
<head>
  <link rel="stylesheet" href="landing.css"><head>  <link rel="stylesheet" href="landing.css">
</head>
<body class="background-image">
    <h1>Admin Landing Page</h1>
    <form class="" action="" method="post" autocomplete="off">
        <p><label for="message">Add Messsage:</label></p>
        <textarea id="message" name="message" rows="4" cols="50" required value=""></textarea>
        <br>
        <button class = "button1" type="submit" name="submit">Submit</button>
    </form>
    <br>
    <form class="" action="" method="post" autocomplete="off">
        <p>Add Admin:</p>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required value="">
        <br>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required value="">
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required value="">
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required value="">
        <br>
        <label for="confirm">Re enter password: </label>
        <input type="password" name="confirm" id="confirm" required value="">
        <br>
        <button class = "button1" type="submit" name="submit2">Register</button>
    </form>
    <br><br><br>
<a href="logout.php">logout</a>
</body>
</html>
