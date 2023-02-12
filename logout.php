<?php
    require'connect.php';
    //mysqli_query($conn,"UPDATE user_info SET currents = 0 WHERE username = '$user'");
    $_SESSION=[];
    session_unset();
    session_destroy();
    header("Location: index.php");

