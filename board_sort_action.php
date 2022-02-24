<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <?php
    require_once __DIR__ . '/dbconn.php';

    $sortNum = $_GET["sortNum"];

    echo "sortNum : " . $sortNum . "<br>";


    if ($board_delete == 1) {

        $sql = "DELETE FROM board WHERE board_pw='" . $board_pw . "' AND board_no=" . $board_no . "";

        $result = $pdo->prepare($sql);

        $result->execute();

        $pdo = null;

        header("Location: http://localhost/board_list.php");
    } else if ($reply_delete == 2) {

        $sql = "DELETE FROM reply WHERE reply_pw='" . $reply_pw . "' and reply_no=" . $reply_no . "";

        $result = $pdo->prepare($sql);

        $result->execute();

        $pdo = null;

        header("Location: http://localhost/board_detail.php?board_no=" . $board_no . "");
    }
    ?>
</body>

</html>