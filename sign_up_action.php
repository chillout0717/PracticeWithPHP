
    <?php
    require_once __DIR__ . '/dbconn.php';
    
    $user_fullname = $_POST["user_fullname"];
    $user_phone = $_POST["user_phone"];
    $user_email = $_POST["user_email"];
    $user_pw = $_POST["user_pw"];
    $user_addr1 = $_POST["user_addr1"];
    $user_addr2 = $_POST["user_addr2"];
    $user_city = $_POST["user_city"];
    $user_state = $_POST["user_state"];
    $user_zip = $_POST["user_zip"];

    $hashedPassword = password_hash($user_pw, PASSWORD_DEFAULT);
    echo $hashedPassword;

    echo "user_fullname : " . $user_fullname . "<br>";
    echo "user_phone : " . $user_phone . "<br>";
    echo "user_email : " . $user_email . "<br>";
    echo "user_pw : " . $user_pw . "<br>";
    echo "user_addr1 : " . $user_addr1 . "<br>";
    echo "user_addr2 : " . $user_addr2 . "<br>";
    echo "user_city : " . $user_city . "<br>";
    echo "user_state : " . $user_state . "<br>";
    echo "user_zip : " . $user_zip . "<br>";


    $sql1 = "INSERT INTO usercontrol(user_fullname, user_phone, user_email, user_pw, user_addr1, user_addr2, user_city, user_state, user_zip, superman) value(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $result1 = $pdo->prepare($sql1);
    $result1->execute([$user_fullname, $user_phone,  $user_email, $hashedPassword, $user_addr1, $user_addr2, $user_city, $user_state, $user_zip, 2]);
    $pdo = null;

    if($result === false){
        echo"저장에 문제가 생겼음 ";
    }else{
    ?>
        <script>
        alert("회원가입이 완료되었습니다");
        location.href = "Thank_you_sign_up.php";
        </script>
    <?php
    }
    ?>
