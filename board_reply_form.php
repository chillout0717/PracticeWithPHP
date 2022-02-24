<!DOCTYPE html>
<html>

<nav class="navbar navbar-dark bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">댓글 작성</a>
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

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
</head>

<body>

    <div margin-left:10px>


        <?php
        $board_no = $_GET["board_no"];

        require_once __DIR__ . '/dbconn.php';

        $sql = "SELECT reply_user, reply_text FROM reply WHERE board_no=" . $board_no . " ORDER by board_no";
        $result = $pdo->prepare($sql);
        $result->execute();


        $sql1 = "SELECT board_text FROM board WHERE board_no=" . $board_no;
        $result2 = $pdo->prepare($sql1);
        $result2->execute();
        $pdo = null;
        ?>
        <br>
        <?php
        $row1 = $result2->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="mb-3" style="margin-top:30px;">
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