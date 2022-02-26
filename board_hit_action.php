
    <?php
    require_once __DIR__ . '/dbconn.php';

    $board_no = $_GET["board_no"];
    $board_hit = 1;

    $sql = "UPDATE board SET board_hit = board_hit + 1 WHERE board_no=" . $board_no . "";

    $result = $pdo->prepare($sql);

    $result->execute();

    $pdo = null;
    ?>