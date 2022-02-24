<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</head>

<body>

    <title>게시글 보기</title>
    <?php

    require_once __DIR__ . '/top_bar.php';

    $board_no = $_GET["board_no"];

    require_once __DIR__ . '/dbconn.php';

    $sql = "SELECT * from board where board_no=" . $board_no . "";

    $result = $pdo->prepare($sql);

    $result->execute();

    $sql1 = "UPDATE board SET board_hit = board_hit+1 WHERE board_no=" . $board_no . "";

    $result1 = $pdo->prepare($sql1);

    $result1->execute();

    $sql2 = "SELECT reply_user, reply_text, reply_no FROM reply WHERE board_no=" . $board_no;

    $result2 = $pdo->prepare($sql2);

    $result2->execute();

    $sql3 = "SELECT count(reply_no) FROM reply where board_no=" . $board_no . "";

    $result3 = $pdo->prepare($sql3);

    $result3->execute();

    $replyNum = $result3->fetchColumn();

    $pdo = null;
    ?>
    <div class="main">
        <script>
            $(function() {
                $("button:contains('게시글  삭제')").on("click", function() {

                    var msg = "정말 삭제하시겠습니까?";
                    var flag = confirm(msg);
                    if (flag == true) {

                        self.location = "/board_delete_form.php?board_no=<?= $board_no ?>";

                    } else {
                        self.location = "/board_detail.php?board_no=<?= $board_no ?>"
                    }
                });
            });

            $(function() {
                $("button:contains('게시글 수정')").on("click", function() {

                    var msg = "정말 수정하시겠습니까?";
                    var flag = confirm(msg);
                    if (flag == true) {

                        self.location = "/board_update_form.php?board_no=<?= $board_no ?>";

                    } else {
                        self.location = "/board_detail.php?board_no=<?= $board_no ?>"
                    }
                });

            });



            $(function() {
                $("button:contains('댓글 삭제')").on("click", function() {

                    var msg = "정말 삭제하시겠습니까?";
                    var flag = confirm(msg);
                    if (flag == true) {

                    } else {
                        self.location = "/board_detail.php?board_no=<?= $board_no ?>"
                    }
                });

            });

            $(function() {
                $("button:contains('댓글 수정')").on("click", function() {

                    var msg = "정말 수정하시겠습니까?";
                    var flag = confirm(msg);
                    if (flag == true) {

                    } else {
                        self.location = "/board_detail.php?board_no=<?= $board_no ?>"
                    }
                });

            });
        </script>
        </script>
        <div class="top">

            <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
                <div class="container-fluid">

                    게시글 보기

                </div>
            </nav>

            <?php
            $row1 = $result->fetch(PDO::FETCH_ASSOC)

            ?>
            <div class="mb-3" style="margin-top:10px;">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px;">제 목</label>
                <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:40px;font-size:12px;margin-left:600px;"><?php echo $row1["board_title"] ?></div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px;">작성자</label>
                <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:40px;font-size:12px;margin-left:600px;"><?php echo $row1["board_user"] ?></div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px;">작성일</label>
                <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:40px;font-size:12px;margin-left:600px;"><?php echo $row1["board_date"] ?></div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left:600px;">내용</label>
                <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:150px;font-size:12px;margin-left:600px;"><?php echo $row1["board_text"] ?></div>
            </div>
            <div class="btn">
                <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em; margin-left:710px" onclick="location.href='/board_update_form.php?board_no=<?= $board_no ?>'" style="margin-left: 690px;">게시글 수정</button>
                <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onclick="location.href='/board_delete_form.php?board_no=<?= $board_no ?>'">게시글 삭제</button>
                <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onclick="location.href='/board_reply_form.php?board_no=<?= $board_no ?>'">댓글 작성</button>
                <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onclick="location.href='/board_list.php'">홈으로</button></td>
            </div>
        </div>
        <div class="down" style="margin-left:600px;">
            <div class="right">
                <br>
                <h6><?php echo $replyNum ?>comment</h6>
                <br>
                <div>
                    <?php
                    if ($replyNum != null) {
                    ?>
                        <div>
                            <?php
                            while ($row3 = $result2->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <div class="card text-white bg-light" style="width:500px;height:150px">
                                    <div class="card-header" style="color:dimgray;"><?php echo $row3["reply_user"] ?>
                                        <button class="btn btn-outline-secondary" style="width:75px; height:30px; font-size:0.7em;float:right" onclick="location.href='/board_delete_form.php?reply_no=<?php echo $row3['reply_no'] . '&board_no=' . $board_no ?>'">댓글 삭제</button>
                                        <button class="btn btn-outline-secondary" style="width:75px; height:30px; font-size:0.7em;float:right" onclick="location.href='/board_reply_update_form.php?reply_no=<?php echo $row3['reply_no'] . '&board_no=' . $board_no ?>'">댓글 수정</button>
                                        <input type="hidden" name="reply_text" value="<?php echo $board_no ?>">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text" style="color:dimgray;"><?php echo $row3["reply_text"] ?></p>
                                    </div>
                                    <br>
                                    <br>
                                <?php
                            }
                                ?>

                                </div>
                        </div>
                    <?php
                    } else {
                    ?> <h5><?php echo "댓글이 아직 없습니다. 댓글을 써주세요!"; ?></h5>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

</body>

</html>