<!DOCTYPE html>
<html>

<head>
    <?php
        require_once __DIR__ . '/head.html';
        require_once __DIR__ . '/session.php';
    ?>
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
        <label for="exampleFormControlInput1" class="form-label" style="margin-left:600px; font-size:13px;">게시글 내용</label>
        <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:160px;font-size:12px;margin-left:600px;"><?php echo $row1['board_text'] ?></div>
    </div>
    <div>

        <form action="/board_reply_action.php" method="post">
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px; font-size:13px;">작성자</label>
                <div class="form-control" id="exampleFormControlInput1" name="reply_user" style="width:500px;height:40px;font-size:12px;margin-left:600px;"><?php echo $_SESSION['user_fullname'] ?></div>
                <input type="hidden" class="form-control" name="reply_user" value="<?php echo $_SESSION['user_fullname'] ?>">
                <input type="hidden" name="board_no" value="<?php echo $board_no ?>">
            </div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px; font-size:13px;">이메일</label>
                <div class="form-control" id="exampleFormControlInput1" name="user_email" style="width:500px;height:40px;font-size:12px;margin-left:600px;"><?php echo $_SESSION['user_email'] ?></div>
                <input type="hidden" class="form-control" name="user_email" value="<?php echo $_SESSION['user_email'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="margin-left:600px; font-size:13px;">댓글 내용</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="댓글내용을 적어주세요." name="reply_text" style="width:500px;height:280px;font-size:12px;margin-left:600px;"></textarea>
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