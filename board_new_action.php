<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>새글 등록</title>
</head>

<body>
    <?php

    require_once __DIR__ . '/dbconn.php';

    $board_pw = $_POST["board_pw"];
    $board_title = $_POST["board_title"];
    $board_user = $_POST["board_user"];
    $board_text = $_POST["board_text"];
    echo "board_pw : " . $board_pw . "<br>";
    echo "board_text :" . $board_text . "<br>";
    echo "board_title :" . $board_title . "<br>";
    echo "board_user :" . $board_user . "<br>";

    $sql = "INSERT INTO board(board_pw, board_text, board_user, board_title) value(?, ?, ?, ?)";

    $result = $pdo->prepare($sql);
    $result->execute([$board_pw, $board_text, $board_user, $board_title]);
    $pdo = null;

    header("Location:http://localhost/board_list.php");
    ?>
</body>

</html>