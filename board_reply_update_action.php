    
    <?php

    require_once __DIR__ . '/dbconn.php';
    $board_no = $_POST["board_no"];
    $reply_no = $_POST["reply_no"];
    $reply_text = $_POST["reply_text"];
    $reply_pw = $_POST["reply_pw"];
    echo "reply_no : " . $reply_no . "<br>";
    echo "reply_text :" . $reply_text . "<br>";
    echo "reply_pw :" . $reply_pw . "<br>";
    echo "board_no : " . $board_no . "<br>";

    $sql = "UPDATE reply SET reply_text='" . $reply_text . "' WHERE reply_no=" . $reply_no . " AND reply_pw=" . $reply_pw . "";

    $result = $pdo->prepare($sql);

    $result->execute();

    $pdo = null;

    header("Location: http://localhost/board_detail.php?board_no=" . $board_no . "");
    ?>
