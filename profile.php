<!DOCTYPE html>
<html>
<haed>
    <?php
    require_once __DIR__ . '/head.html';
    require_once __DIR__ . '/session.php';


    ?>
    <link rel="stylesheet" type="text/css" href='./profile.css'>

    <script>
        $(function() {

            $("button:contains('비밀번호 수정')").on("click", function() {
                var msg = "현재 비밀번호를 입력해주세요.";
                var msg1 = "변경하실 비밀번호를 입력해주세요.";
                var msg2 = "변경하실 비밀버호를 한번 더 입력해주세요.";
                var past_pw = prompt(msg);
                var change_pw = prompt(msg1);
                var re_change_pw = prompt(msg2);
                var user_email = $("#user_email").val();

                var allData = {
                    "past_pw": past_pw,
                    "change_pw": change_pw,
                    "re_change_pw": re_change_pw,
                    "user_email": user_email
                };

                $.ajax({
                    url: "update_pw.php",
                    type: "POST",
                    data: allData,

                    success: function(data) {

                        if (data === "good") {
                            alert("비밀번호가 성공적으로 바뀌었습니다.");
                        } else if(data === "bad") {
                            alert("비밀번호 수정에 실패했습니다.");
                        }
                    }

                });
            });
        });
    </script>
</haed>

<body>
    <title>회원 정보</title>
    <?php
    require_once __DIR__ . '/top_bar.php';
    require_once __DIR__ . '/dbconn.php';

    $user_email = $_SESSION['user_email'];

    $sql = "SELECT board_no, board_category, board_title, board_date, board_hit FROM board WHERE user_email='{$user_email}'";

    $result = $pdo->prepare($sql);

    $result->execute();


    $sql1 = "SELECT board_no, reply_no, reply_text, reply_date FROM reply WHERE user_email='{$user_email}'";

    $result1 = $pdo->prepare($sql1);

    $result1->execute();


    $pdo = null;

    ?>
    <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
        <div class="container-fluid">
            <b>회원 정보</b>
        </div>
    </nav>
    <div class="main">
        <div class="top">
            <section>
                <div class="container py-5">
                    <div class="row">
                        <div id="name"class="col-lg-4">
                            <div class="card mb-4" id="profile">
                                <div class="card-body text-center">
                                    <img src="https://previews.123rf.com/images/afe207/afe2071602/afe207160200028/52329315-m%C3%A4nnliches-avatarprofilbild-schattenbildlichtschatten.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3"><?php echo $_SESSION['user_fullname'] ?></h5>
                                    <p class="text-muted mb-1">
                                        <?php if ($_SESSION['superman'] == 2) {
                                        ?>권한 : 일반회원
                                        <?php } else {
                                        ?>권한 : 관리자
                                    <?php }
                                    ?>
                                    </p>
                                    <p class="text-muted mb-4"><?php echo $_SESSION['user_city'] ?>, <?php echo $_SESSION['user_state'] ?></p>
                                    <div class="d-flex justify-content-center mb-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8" style="height:30px;">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $_SESSION['user_fullname'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $_SESSION['user_email'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Password</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="text-muted mb-0" type="password">************</p>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-outline-secondary" style="font-size: 0.8em;" type="button">비밀번호 수정</button>
                                            <input type="hidden" id="user_email" name="user_email" value="<?php echo $_SESSION['user_email'] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $_SESSION['user_phone'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Join Date</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $_SESSION['user_date'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $_SESSION['user_addr1'] ?><?php echo $_SESSION['user_addr2'] ?>, <?php echo $_SESSION['user_city'] ?>, <?php echo $_SESSION['user_state'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <button id="button1" class="btn btn-outline-secondary" type="button" onclick="location.href='/board_list.php'" style="margin-left: 1550px; margin-top:-60px">확인</button>
        <h5 style="margin-left:310px" >내가 쓴 게시글과 댓글</h5>

        <div class="bottom" style="display:flex; position:absolute; left:16%">
            <div class="board" style="width:880px;">
                <table class="table">
                    <thead class="table-active">
                        <tr>
                            <th style="width:10%;text-align: center">카테고리</th>
                            <th style="width:35%;text-align: center">게시글 제목</th>
                            <th style="width:25%;text-align: center">작성일</th>
                            <th style="width:10%;text-align: center">조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($boardRow = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td style="width:10%;text-align: center">
                                    <?php
                                    switch ($boardRow["board_category"]) {
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
                                    ?>
                                </td>
                                <td style="width:35%;text-align: center">
                                    <?php
                                    echo "<a style='color:black; text-decoration-line:none;' href='/board_detail.php?board_no=" . $boardRow["board_no"] . "'>";
                                    echo $boardRow["board_title"];
                                    echo "</a>";
                                    ?>
                                </td>
                                <td style="width:10%;text-align: center;">
                                    <?php
                                    echo $boardRow["board_date"];
                                    ?>
                                </td>
                                <td style="width:10%;text-align: center">
                                    <?php
                                    echo $boardRow["board_hit"];
                                    ?>
                                </td>
                            </tr>

                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="reply" style="width:400px; margin-left:20px">
                <table class="table">
                    <thead class="table-active">
                        <tr>
                            <th style="width:10%;text-align: center">댓글 내용</th>
                            <th style="width:10%;text-align: center">작성일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($replyRow = $result1->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td style="width:10%;text-align: center;">
                                    <?php
                                    echo "<a style='color:black; text-decoration-line:none;' href='/board_detail.php?board_no=" . $replyRow["board_no"] . "'>";
                                    echo $replyRow["reply_text"];
                                    ?>
                                </td>
                                <td style="width:10%;text-align: center">
                                    <?php
                                    echo $replyRow["reply_date"];
                                    ?>
                                </td>
                            </tr>

                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>