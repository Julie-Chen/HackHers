<?php
use Twilio\Rest\Client;
require __DIR__ . '/vendor/autoload.php';
require'connect.php';

if(isset($_POST["submit"])){
    $user=$_POST["user"];
    $password=$_POST["password"];
    $result=mysqli_query($conn,"SELECT * FROM user_info WHERE username='$user' OR email='$user'");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($password==$row["password"]){
            $_SESSION["login"]=true;
            $_SESSION["id"]=$row["id"];
            header("Location: landing.php");
            $display=mysqli_query($conn,"SELECT message FROM reminders ORDER BY RAND() LIMIT 1");
            mysqli_query($conn,"UPDATE user_info SET currents = 1 WHERE username = '$user'");

// Use the REST API Client to make requests to the Twilio REST API



// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC0a86f3f61d86c815a4092be1e62ba712';
$token = 'cc2df572e881751c9b581fd4dd6bcc49';
$client = new Client($sid, $token);
$text1 = "ECO FRIENDLY REMINDER ";
$text2 = implode(mysqli_fetch_assoc($display));

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+16095821831',
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+18449246783',
        // the body of the text message you'd like to send
        'body' => "ECO FRIENDLY REMINDER!!! " . $text2
        //'ECO FRIENDLY REMINDER: ' . mysqli_fetch_array($display)
    ]
);
        }else{
            echo "<script> alert('Wrong Password')</script>";
        }
    }else{
        echo "<script> alert('User does not exist')</script>";

    }
}
?>
<!DOCTYPE html>
<link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet'>

<html><head>  <link rel="stylesheet" href="landing.css">
</head>
<body class="background-image">
    <h1>Daily Footprint</h1>
    <br>
    <form class="" action="" method="post" autocomplete="off">
        <label for="user">Username/Email: </label>
        <input type="text" name="user" id="user" required value="">
        <br>    <br>        <br>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required value="">
        <br>        <br>        <br>


        <button class="button1" type="submit" name="submit">Login</button>
    </form>
    <br><br>
    <a href="registration.php">Don't have an account?</a>
    <br>
    <a href="adminLogin.php">Admin Login</a>
</body>
</html>

