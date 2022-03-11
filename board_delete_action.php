<?php
require_once __DIR__ . '/dbconn.php';

$superman = $_POST["superman"];
$board_delete = $_POST["board_delete"];
$reply_delete = $_POST["reply_delete"];
$board_no = $_POST["board_no"];
$user_pw = $_POST["origin_pw"];
$reply_no = $_POST["reply_no"];
$delete_pw = $_POST["delete_pw"];

if ($board_delete == 1) {
    if ($superman == 1) {
        $sql = "DELETE FROM board WHERE board_no=" . $board_no . "";
        $result = $pdo->prepare($sql);
        $result->execute();
        $pdo = null;

        echo "good";
    } else {
        if (password_verify($delete_pw, $user_pw)) {
            $sql = "DELETE FROM board WHERE board_no=" . $board_no . "";
            $result = $pdo->prepare($sql);
            $result->execute();
            $pdo = null;

            echo "good";
        }else{
            echo "bad";
        }
    }
} else if ($reply_delete == 2) {
    if ($superman == 1) {
        $sql1 = "DELETE FROM reply WHERE reply_no=" . $reply_no . "";
        $result = $pdo->prepare($sql1);
        $result->execute();
        $pdo = null;

        echo "good";
    } else {
        if(password_verify($delete_pw, $user_pw)){
            $sql1 = "DELETE FROM reply WHERE reply_no=" . $reply_no . "";
            $result = $pdo->prepare($sql1);
            $result->execute();
            $pdo = null;

            echo "good";
        }else{
            echo "bad";
        }
        
    }
}
