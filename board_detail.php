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

    <nav class="navbar navbar-dark bg-secondary">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">게시판 목록</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href='/board_list.php'>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">회원가입</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">로그인</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                게시판 카테고리
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">잡담</a></li>
                                <li><a class="dropdown-item" href="#">고민거리</a></li>
                                <li><a class="dropdown-item" href="#">오늘 뭐먹지?</a></li>
                            </ul>
                        </li>
                        <img src="https://previews.123rf.com/images/afe207/afe2071602/afe207160200028/52329315-m%C3%A4nnliches-avatarprofilbild-schattenbildlichtschatten.jpg" width="45px" height="45px" style="border-radius:70%;margin-left:1100px;">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="margin-left:10px;">Jehyun Lim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">로그아웃</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </nav>
    </div>
    <?php

    $board_no = $_GET["board_no"];

    require_once __DIR__ . '/dbconn.php';

    $sql = "SELECT * from board where board_no=" . $board_no . "";

    $result = $pdo->prepare($sql);

    $result->execute();

    $sql1 = "UPDATE board SET board_hit = board_hit+1 WHERE board_no=" . $board_no . "";

    $result1 = $pdo->prepare($sql1);

    $result1->execute();

    $sql2 = "SELECT reply_user, reply_text, reply_no FROM reply WHERE board_no=" . $board_no . " ORDER by board_no";

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
                $("button:contains('댓글 삭제')").on("click", function() {

                    var msg = "정말 삭제하시겠습니까?";
                    var flag = confirm(msg);
                    if (flag == true) {

                        self.location = "/board_delete_form.php?reply_no=<?php echo $row3['reply_no'] . '&board_no=' . $board_no ?>";

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
                        self.location = "/board_reply_form.php?reply_no=<?php echo $row3['reply_no'] . '&board_no=' . $board_no ?>";
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
        </script>
        <div class="top">
            <h1 style="margin-left:600px;margin-top:20px;margin-bottom:40px">게시글 상세보기</h1>
            <?php
            $row1 = $result->fetch(PDO::FETCH_ASSOC)

            ?>
            <div class="mb-3">
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