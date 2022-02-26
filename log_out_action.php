<!DOCTYPE html>
<html>

<head>
    <?php
        require_once __DIR__ . '/head.html';
    ?>
</head>

<body>
    

    <?php
    session_start();
    $result = session_destroy();



    if ($result === true) {
    ?>
        <script>
            alert("정상적으로 로그 아웃 되었습니다.")
            location.href = "board_list.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("로그아웃에 실패하였습니다. 다시 시도해주세요.")
            location.href = "board_list.php";
        </script>
    <?php
    }
    ?>
</body>

</html>