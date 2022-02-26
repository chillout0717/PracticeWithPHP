<!DOCTYPE html>
<html>

<head>
    <?php
    require_once __DIR__ . '/head.html';
    ?>
</head>

<body>
    <?php
    require_once __DIR__ . '/dbconn.php';
    $user_email = $_POST["user_email"];
    $user_pw = $_POST["user_pw"];

    echo "user_email = " . $user_email;
    echo "user_pw = " . $user_pw;
    
   

    $sql = "SELECT user_pw FROM usercontrol WHERE user_email='{$user_email}'";

    $result = $pdo->prepare($sql);
    $result->execute();
    $hashedPassword = $result->fetchColumn();

    $passwordResult = password_verify($user_pw, $hashedPassword);

    $pdo = null;

    if ($passwordResult === true) {
        session_start();
        $_SESSION['user_email'] = $user_email;
        print_r($_SESSION);
        echo $_SESSION['user_email'];
    ?>
        <script>
            alert("정상적으로 로그인이 되었습니다.")
            location.href = "board_list.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("로그인에 실패하였습니다. 다시 시도해주세요.")
            location.href = "board_list.php";
        </script>
    <?php
    }
    ?>
</body>

</html>