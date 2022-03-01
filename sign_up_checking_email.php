<?php
    require_once __DIR__ . '/dbconn.php';

    $user_email = $_POST["user_email"];

    $sql = "SELECT count(user_email) FROM usercontrol WHERE user_email = ".$user_email;

    $result1 = $pdo -> prepare($sql);
    $result1 -> execute();
    $pdo = null;

    $result = $result1;

    if($result == 0){
        echo 1;
    }else{
        echo 2;
    }
     
?>