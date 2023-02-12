<?php
require'connect.php';
if(!empty($_SESSION["id"])){
    $id=$_SESSION["id"];
    $result=mysqli_query($conn,"SELECT * FROM user_info WHERE id=$id");
    $row=mysqli_fetch_assoc($result);
}else{
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet'>
<link href="https://fonts.cdnfonts.com/css/bruno-ace-sc" rel="stylesheet">
                
<head>
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="landing.css">
<style>
  div {
    position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translate(-50%,-50%);
  transform: translate(-50%,-50%);
      }
    </style>
</head>
<body class="background-image">
<ul>
  <li><a href="landing.php">Home</a></li>
  <li style="float:right"><a href="logout.php">Log Out</a></li>
  <li style="float:right"><a href="stores.html">Stores</a></li>
  <li style="float:right"><a href="plant.php">Plant</a></li>
  <li style="float:right"><a href="quiz.php">Quiz</a></li>

</ul>
<div>
<h1>Know your daily footsteps </h1> 
<h1>every small decisions counts</h1>
<br>
<button class = "button" id="button" type="button" onclick="window.location.href='quiz.php'"> Start Quiz</button>
</div>
</body>
</html>

