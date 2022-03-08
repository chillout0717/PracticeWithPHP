<?php
    require_once __DIR__ . '/dbconn.php';

    $user_email = $_POST["user_email"];
   
    $sql = "SELECT user_email FROM usercontrol WHERE user_email='$user_email'";
    
    $result1 = $pdo -> prepare($sql);
    $result1 -> execute();

    $count  = $result1 -> rowCount();

    if($count <1){  
        echo "good";
    }else{
        echo "bad";
    }
    $pdo = null;

?>