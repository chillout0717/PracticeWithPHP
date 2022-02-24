<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>게시글 수정</title>
</head>

<body>
    <h1>게시글 수정</h1>

    <?php

    require_once __DIR__ . '/dbconn.php';

    $board_no = $_POST["board_no"];
    $board_text = $_POST["board_text"];
    $board_pw = $_POST["board_pw"];
    echo "board_no : " . $board_no . "<br>";
    echo "board_text :" . $board_text . "<br>";
    echo "board_pw :" . $board_pw . "<br>";

    $sql = "UPDATE board SET board_text='" . $board_text . "' WHERE board_no=" . $board_no . " AND board_pw=" . $board_pw . "";

    $result = $pdo->prepare($sql);

    $result->execute();

    $pdo = null;

    header("LOCATION: http://localhost/board_detail.php?board_no=".$board_no);
    ?>
</body>

</html>