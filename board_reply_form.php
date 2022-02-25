<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
</head>

<body>
    <title>댓글 쓰기</title>
    <?php
    require_once __DIR__ . '/top_bar.php';

    $board_no = $_GET["board_no"];

    require_once __DIR__ . '/dbconn.php';

    $sql = "SELECT reply_user, reply_text FROM reply WHERE board_no=" . $board_no . " ORDER by board_no";
    $result = $pdo->prepare($sql);
    $result->execute();


    $sql1 = "SELECT board_text FROM board WHERE board_no=" . $board_no;
    $result2 = $pdo->prepare($sql1);
    $result2->execute();
    $pdo = null;
    $row1 = $result2->fetch(PDO::FETCH_ASSOC);
    ?>
    <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
        <div class="container-fluid">
            <b>댓글 쓰기<b>
        </div>
    </nav>

    <div class="mb-3" style="margin-top:10px;">
        <label for="exampleFormControlInput1" class="form-label" style="margin-left:600px;">게시글 내용</label>
        <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:200px;font-size:12px;margin-left:600px;"><?php echo $row1['board_text'] ?></div>
    </div>
    <div>

        <form action="/board_reply_action.php" method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1" style="margin-left: 600px;">작성자</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="reply_user" style="width:500px;height:40px;font-size:12px;margin-left:600px;">
                <input type="hidden" name="board_no" value="<?php echo $board_no ?>">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1" style="margin-left: 600px;">비밀번호</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" name="reply_pw" style="width:500px;height:40px;font-size:12px;margin-left:600px;">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:600px;">댓글 내용</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="댓글내용을 적어주세요." name="reply_text" style="width:500px;height:300px;font-size:12px;margin-left:600px;"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em; margin-left:820px">완료 </button>
                <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onClick="history.back(-1);">뒤로가기</button>
                <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onclick="location.href='/board_list.php'">홈으로</button></td>

            </div>
        </form>

    </div>
</body>

</html>