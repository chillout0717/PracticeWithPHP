<?php
    require_once __DIR__ . '/dbconn.php';

    $superman = $_POST["superman"];
    $board_delete = $_POST["board_delete"];
    $reply_delete = $_POST["reply_delete"];
    $board_no = $_POST["board_no"];
    $board_pw = $_POST["password"];
    $reply_no = $_POST["reply_no"];
    $reply_pw = $_POST["password"];

    $superman = $_GET["superman"];
    $board_delete = $_GET["board_delete"];
    $board_no = $_GET["board_no"];


    if ($board_delete == 1) {
        if($superman == 1){

        $sql ="DELETE FROM board WHERE board_no=" . $board_no . "";

        }else{

        $sql = "DELETE FROM board WHERE board_pw='" . $board_pw . "' AND board_no=" . $board_no . "";
        }

        $result = $pdo->prepare($sql);

        $result->execute();

        $pdo = null;

        echo "게시물이 삭제되었습니다.";
        header("Location: http://localhost/board_list.php");


        
    } else if ($reply_delete == 2) {
        if($superman == 1){
            $sql1 = "DELETE FROM reply WHERE reply_no=" . $reply_no . "";
        }else{
            $sql1 = "DELETE FROM reply WHERE reply_pw='" . $reply_pw . "' and reply_no=" . $reply_no . "";
        }
        
        $result1 = $pdo->prepare($sql1);

        $result1->execute();

        $pdo = null;

        echo "게시물이 삭제되었습니다.";
        header("Location: http://localhost/board_detail.php?board_no=" . $board_no . "");
    }
