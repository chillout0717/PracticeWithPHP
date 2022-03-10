
    <?php

    require_once __DIR__ . '/dbconn.php';

    $board_no = $_POST["board_no"];
    $reply_user = $_POST["reply_user"];
    $reply_text = $_POST["reply_text"];
    $reply_pw = $_POST["reply_pw"];
    $user_email = $_POST["user_email"];
    echo "board_no : " . $board_no . "<br>";
    echo "reply_text : " . $reply_text . "<br>";
    echo "reply_user : " . $reply_user . "<br>";
    echo "reply_pw : " . $reply_pw . "<br>";

    $sql = "INSERT INTO reply (reply_text, board_no, reply_user, reply_pw, user_email) values (?,?,?,?,?)";

    $result = $pdo->prepare($sql);

    $result->execute([$reply_text, $board_no, $reply_user, $reply_pw, $user_email]);

    $pdo = null;

    header("Location: http://localhost/board_detail.php?board_no=" . $board_no . "");
    ?>
