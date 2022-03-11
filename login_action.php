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
    $hashedPassword = $result->fetchColumn(); //암호화 뭐썻는지 알아보자! 어떻게 작동되는지!

    $passwordResult = password_verify($user_pw, $hashedPassword);


    if ($passwordResult === true) {
        $sql1 = "SELECT * FROM usercontrol WHERE user_email='{$user_email}'";

        $result1 = $pdo->prepare($sql1);
        $result1 -> execute();
        $pdo = null;

        $row = $result1->fetch(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_fullname'] = $row["user_fullname"];
        $_SESSION['user_phone'] = $row["user_phone"];
        $_SESSION['user_pw'] = $row["user_pw"];
        $_SESSION['user_addr1'] = $row["user_addr1"];
        $_SESSION['user_addr2'] = $row["user_addr2"];
        $_SESSION['user_city'] = $row["user_city"];
        $_SESSION['user_state'] = $row["user_state"];
        $_SESSION['user_zip'] = $row["user_zip"];
        $_SESSION['superman'] = $row["superman"];
        $_SESSION['user_date'] = $row["user_date"];

        print_r($_SESSION);
        echo $_SESSION['user_email'];
        echo $_SESSION['user_fullname'];
        echo $_SESSION['user_phone'];
        echo $_SESSION['user_pw'];
        echo $_SESSION['user_addr1'];
        echo $_SESSION['user_addr2'];
        echo $_SESSION['user_city'];
        echo $_SESSION['user_state'];
        echo $_SESSION['user_zip'];
        echo $_SESSION['superman'];
        echo $_SESSION['user_date'];
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