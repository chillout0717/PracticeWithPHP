<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once __DIR__ . '/dbconn.php';

    $user_email = $_POST["user_email"];
    $user_pw = $_POST["user_pw"];

    echo "user_email = " . $user_email;
    echo "user_pw = " . $user_pw;

    $sql = "SELECT user_pw FROM usercontrol WHERE user_email='" . $user_email . "'";

    $result = $pdo->prepare($sql);
    $result->execute();

    $pdo = null;
    $dbPw = $result->fetchColumn();

    if ($user_pw == $dbPw) {
    ?>
        <script>
            alert("정상적으로 로그인이 되었습니다.")
        </script>
    <?php header("Location: http://localhost/board_list.php");
    } else {
    ?>
        <script>
            alert("로그인에 실패하였습니다. 다시 시도해주세요.")
        </script>
    <?php
        header("Location: http://localhost/board_list.php");
    }
    ?>
    <?php

    header("Location: http://localhost/board_list.php");

    ?>
</body>

</html>