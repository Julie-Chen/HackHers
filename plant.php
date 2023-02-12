<?php
require'connect.php';
if(!empty($_SESSION["id"])){
    $id=$_SESSION["id"];
    $result=mysqli_query($conn,"SELECT * FROM user_info WHERE id=$id");
    $row=mysqli_fetch_assoc($result);
}else{
    header("Location: index.php");
}
$watercount=2;
$fertcount=2;
$coin = mysqli_query($conn,"SELECT coins FROM user_info WHERE id=$id");
$coin2 = implode(mysqli_fetch_assoc($coin));

if(array_key_exists('buywater', $_POST)) {
  $coin2 = ((int)$coin2)-3;
  mysqli_query($conn,"UPDATE user_info SET coins='$coin2'  WHERE id='$id'");
  $watercount =((int)$watercount)+2;
}
if(array_key_exists('buyfert', $_POST)) {
  $coin2 = ((int)$coin2)-5;
  mysqli_query($conn,"UPDATE user_info SET coins='$coin2'  WHERE id='$id'");
  $fertcount=((int)$fertcount)+2;

}

?>
<!DOCTYPE html>
<html>
<link href='https://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet'>
<head>
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="plant.css">
  <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>

</head>
<body class="background-image">
<ul>
  <li><a href="landing.php">Home</a></li>
  <li style="float:right"><a href="logout.php">Log Out</a></li>
  <li style="float:right"><a href="stores.html">Stores</a></li>
  <li style="float:right"><a href="plant.php">Plant</a></li>
  <li style="float:right"><a href="quiz.php">Quiz</a></li>
</ul>

<h3>Coins: <?php echo $coin2; ?></h3>
<h3>Water: <?php echo $watercount; ?></h3>
<h3>Fert: <?php echo $fertcount; ?></h3>


<img id="plant" src="plant1.png">

<table>
  <tr>
    <td><img id="water" src="water.png"></td>
  </tr>
  <tr>
    <td><img id="fert" src="fert.png"></td>
  </tr>
  <tr>
    <td><button id=shopbtn onclick="showshop()"><img id="shop" src="shop.png"></button></td>
  </tr>
</table>

<?php

?>

<div class="modal" id="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>You can buy fertilizer for 5 coins. This will help your plant grow big and strong.</p>
        <p>You can also purchase water for 3 coins to keep your plant hydrated.</p>
        <form method="post">
        <input type="submit" name="buywater"
                class="button" value="Buy Water" />
         
        <input type="submit" name="buyfert"
                class="button" value="Buy Fertilizer" />
    </form>
    </div>
</div>

<script>


var modal= document.getElementById("modal");
var btn = document.getElementById("modalBtn");
var span = document.getElementsByClassName("close")[0];
function showshop(){
    modal.style.display = "block";
}
span.onclick = function(){
    modal.style.display="none";
}
window.onclick=function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>