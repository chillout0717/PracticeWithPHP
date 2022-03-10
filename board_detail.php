<!DOCTYPE html>
<html>

<head>
    <?php
    require_once __DIR__ . '/head.html';
    require_once __DIR__ . '/session.php';
    ?>


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

    $sql2 = "SELECT reply_user, reply_text, reply_no, user_email FROM reply WHERE board_no=" . $board_no;

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

                var superman = $("#superman").val();

                $("button:contains('게시글 삭제')").on("click", function() {

                    var msg = "정말 삭제하시겠습니까?";
                    var flag = confirm(msg);
                    if (flag == true) {
                        if (superman == 1) {
                            self.location = "/board_delete_action.php?board_no=<?= $board_no ?>&superman=" + superman + "&board_delete=1";
                            return alert("게시물이 삭제되었습니다.");
                        } else {
                            self.location = "/board_delete_form.php?board_no=<?= $board_no ?>";
                        }
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
                var superman = $("#superman").val();

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

            $(document).ready(function() {

                var translated_text = $("#tranText").val();

                $("#tran").on("click", function() {
                    $.ajax({
                        url: "https://dapi.kakao.com/v2/translation/translate?src_lang=kr&target_lang=en&query=" + translated_text,
                        type: "GET",
                        contentType: "application/x-www-form-urlencoded",
                        headers: {
                            "Authorization": "KakaoAK b3457faed853e75e583cc928abf63725"
                        },
                        data: {},

                        success: function(data) {
                            alert(data.translated_text[0]);
                        }
                    })
                });
            });
        </script>
        <div class="top">

            <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
                <div class="container-fluid">

                    <b>게시글 보기</b>

                </div>
            </nav>

            <?php
            $row1 = $result->fetch(PDO::FETCH_ASSOC)

            ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left:600px; margin-top:10px; font-size:13px;">카테고리</label>
                <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:40px;font-size:12px;margin-left:600px;"><?php
                                                                                                                                            switch ($row1["board_category"]) {
                                                                                                                                                case "1":
                                                                                                                                                    echo "잡담";
                                                                                                                                                    break;
                                                                                                                                                case "2":
                                                                                                                                                    echo "고민거리";
                                                                                                                                                    break;
                                                                                                                                                case "3":
                                                                                                                                                    echo "메뉴추천";
                                                                                                                                                    break;
                                                                                                                                            }
                                                                                                                                            ?></div>
            </div>
            <div class="mb-2" style="margin-top:10px;">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px; font-size:13px;">제 목</label>
                <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:40px;font-size:12px;margin-left:600px;"><?php echo $row1["board_title"] ?></div>
            </div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px; font-size:13px;">작성자</label>
                <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:40px;font-size:12px;margin-left:600px;"><?php echo $row1["board_user"] ?></div>
            </div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px; font-size:13px;">Email</label>
                <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:40px;font-size:12px;margin-left:600px;"><?php echo $row1["user_email"] ?></div>
            </div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px; font-size:13px;">작성일</label>
                <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:40px;font-size:12px;margin-left:600px;"><?php echo $row1["board_date"] ?></div>
            </div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label" style="margin-left:600px; font-size:13px;">내용</label>
                <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:130px;font-size:12px;margin-left:600px;"><?php echo $row1["board_text"] ?></div>
            </div>
            <div class="btn">
                <?php
                if ($_SESSION['user_email'] === $row1["user_email"] || $_SESSION['superman'] == 1) {
                ?> <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em; margin-left:620px" onclick="location.href='/board_update_form.php?board_no=<?= $board_no ?>'" style="margin-left: 690px;">게시글 수정</button>
                    <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onclick="location.href='/board_delete_form.php?board_no=<?= $board_no ?>'">게시글 삭제</button>
                    <input type="hidden" id="superman" value=<?php echo $_SESSION['superman'] ?>>
                    <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onclick="location.href='/board_reply_form.php?board_no=<?= $board_no ?>'">댓글 작성</button>
                    <button type="button" id="tran" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;">번역</button>
                    <input type="hidden" id="tranText" value="<?php echo $row1["board_text"] ?>">
                    <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onclick="location.href='/board_list.php'">홈으로</button></td>
                <?php } else {
                ?>
                    <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em; margin-left:810px;" onclick="location.href='/board_reply_form.php?board_no=<?= $board_no ?>'">댓글 작성</button>
                    <button type="button" id="tran" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;">번역</button>
                    <input type="hidden" id="tranText" value="<?php echo $row1["board_text"] ?>">
                    <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onclick="location.href='/board_list.php'">홈으로</button></td>
                <?php }
                ?>

            </div>
        </div>
        <div class="down" style="margin-left:600px; width:300px;">
            <div class="right" style="width:100px">
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

                                <div class="card text-white bg-light" style="width:500px;height:100px">
                                    <div class="card-header" style="color:dimgray;"><?php echo $row3["reply_user"] ?>
                                        <?php
                                        if ($_SESSION['user_email'] === $row3["user_email"] || $_SESSION['superman'] == 1) {
                                        ?>
                                            <button class="btn btn-outline-secondary" style="width:75px; height:30px; font-size:0.7em;float:right" onclick="location.href='/board_delete_form.php?reply_no=<?php echo $row3['reply_no'] . '&board_no=' . $board_no ?>'">댓글 삭제</button>
                                            <button class="btn btn-outline-secondary" style="width:75px; height:30px; font-size:0.7em;float:right" onclick="location.href='/board_reply_update_form.php?reply_no=<?php echo $row3['reply_no'] . '&board_no=' . $board_no ?>'">댓글 수정</button>
                                        <?php }
                                        ?>
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
                    ?>
                        <div class="card text-white bg-light" style="width:500px;height:150px">
                            <div class="card-header" style="color:dimgray;"></div>
                            <div class="card-body">
                                <p class="card-text" style="color:dimgray;"><?php echo "댓글이 아직 없습니다. 댓글을 써주세요!"; ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>