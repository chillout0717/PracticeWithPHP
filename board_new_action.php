
    <?php

    require_once __DIR__ . '/dbconn.php';

    $board_title = $_POST["board_title"];
    $board_user = $_POST["board_user"];
    $board_text = $_POST["board_text"];
    $board_category = $_POST["board_category"];
    $user_email = $_POST["user_email"];
    echo "board_text :" . $board_text . "<br>";
    echo "board_title :" . $board_title . "<br>";
    echo "board_user :" . $board_user . "<br>";
    echo "board_category :" . $board_category . "<br>";

    $sql = "INSERT INTO board(board_text, board_user, board_title, board_category, user_email) value(?, ?, ?, ?, ?)";

    $result = $pdo->prepare($sql);
    $result->execute([$board_text, $board_user, $board_title, $board_category, $user_email]);
    $pdo = null;

    header("Location:http://localhost/board_list.php");
    ?>
