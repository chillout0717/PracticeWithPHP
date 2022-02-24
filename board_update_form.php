<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
    <title>게시글 수정</title>
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
    <h1 style="margin-left:600px;margin-top:40px;margin-bottom:40px">게시글 수정</h1>

    <?php
    $board_no = $_GET["board_no"];
    ?>
    <form action="/board_update_action.php" method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" style="margin-left: 600px;">내 용</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="board_text" style="width:500px;height:300px;font-size:12px;margin-left:600px;" placeholder="수정할 내용을 적어주세요."></textarea>
            <input type="hidden" name="board_no" value="<?php echo $board_no ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1" style="margin-left: 600px;">비밀번호</label>
            <input type="password" class="form-control" name="board_pw" style="width:500px;height:40px;font-size:12px;margin-left:600px;">
        </div>
        <br>
        <button type="submit" class="btn btn-outline-secondary" style="width:80px; height:30px; font-size:0.7em; margin-left: 940px;">수정</button>
        <button type="button" class="btn btn-outline-secondary" style="width:80px; height:30px; font-size:0.7em;" onClick="history.back(-1);">뒤로가기</button>
    </form>
</body>

</html>