<?php

require_once __DIR__ . '/dbconn.php';

$past_pw = $_POST["past_pw"];
$change_pw = $_POST["change_pw"];
$re_change_pw = $_POST["re_change_pw"];
$user_email = $_POST["user_email"];

$sql = "SELECT user_pw FROM usercontrol WHERE user_email='{$user_email}'";

$result = $pdo -> prepare($sql);
$result -> execute();
$pw = $result->fetchColumn();

if($change_pw === $re_change_pw && password_verify($past_pw, $pw)){
    $hashedPassword = password_hash($change_pw, PASSWORD_DEFAULT);

    $sql1 = "UPDATE usercontrol SET user_pw=? WHERE user_email='{$user_email}'";

    $result1 = $pdo -> prepare($sql1);
    $result1 -> execute([$hashedPassword]);
    $pdo = null;

    echo "good";
}else{
    echo "bad";
}

?>