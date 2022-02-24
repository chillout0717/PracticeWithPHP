<!DOCTYPE html>
<html>

<?php
require_once __DIR__ . '/top_bar.php';
require_once __DIR__ . '/dbconn.php';
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
    <title>댓글 수정</title>
</head>

<body>
    <title>댓글 수정</title>
    <?php
    $reply_no = $_GET["reply_no"];
    $board_no = $_GET["board_no"];

    $sql = "SELECT reply_text FROM reply where reply_no=" . $reply_no;
    $result = $pdo->prepare($sql);
    $result->execute();
    $reply_text = $result->fetchColumn();
    $pdo = null;
    ?>
    <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
        <div class="container-fluid">
            댓글 수정
        </div>
    </nav>

    <div class="mb-3" style="margin-top:10px;">
        <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px;">수정 전</label>
        <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:200px;font-size:12px;margin-left:600px;"><?= $reply_text ?></div>
    </div>

    <form action="/board_reply_update_action.php" method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" style="margin-left: 600px;">내 용</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="reply_text" style="width:500px;height:300px;font-size:12px;margin-left:600px;" placeholder="수정할 댓글 내용을 적어주세요."></textarea>
            <input type="hidden" name="reply_no" value="<?php echo $reply_no ?>">
            <input type="hidden" name="board_no" value="<?php echo $board_no ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1" style="margin-left: 600px;">비밀번호</label>
            <input type="password" class="form-control" name="reply_pw" style="width:500px;height:40px;font-size:12px;margin-left:600px;">
        </div>

        <button type="submit" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em; margin-left: 920px;">댓글 수정</button>
        <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onClick="history.back(-1);">뒤로가기</button>
    </form>
</body>

</html>