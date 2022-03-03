<?php

require_once __DIR__ . '/dbconn.php';

$past_pw = $_POST["past_pw"];
$current_pw = $_POST["current_pw"];
$re_current_pw = $_POST["re_current_pw"];

$sql = "SELECT user_pw FROM usercontrol WHERE user_pw=?";

$result = $pdo -> prepare($sql);
$result -> execute($user_pw);
$pw = $result->fetchColumn();

$pwResult = password_verify($user_pw, $pw);

$pdo = null;

if($pwResult === true){

}
    
?>