<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>게시글 삭제</title>
</head>

<body>
    <h1>게시글 삭제</h1>

    <?php
    require_once __DIR__ . '/dbconn.php';

    $board_delete = $_POST["board_delete"];
    $reply_delete = $_POST["reply_delete"];
    $board_no = $_POST["board_no"];
    $board_pw = $_POST["password"];
    $reply_no = $_POST["reply_no"];
    $reply_pw = $_POST["password"];
    echo "board_no : " . $board_no . "<br>";
    echo "board_pw : " . $board_pw . "<br>";

    if ($board_delete == 1) {

        $sql = "DELETE FROM board WHERE board_pw='" . $board_pw . "' AND board_no=" . $board_no . "";

        $result = $pdo->prepare($sql);

        $result->execute();

        $pdo = null;

        header("Location: http://localhost/board_list.php");
    } else if ($reply_delete == 2) {

        $sql1 = "DELETE FROM reply WHERE reply_pw='" . $reply_pw . "' and reply_no=" . $reply_no . "";

        $result1 = $pdo->prepare($sql1);

        $result1->execute();

        $pdo = null;

        header("Location: http://localhost/board_detail.php?board_no=" . $board_no . "");
    }
    ?>
</body>

</html>