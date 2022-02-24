<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">

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
    <h1 style="margin-left:600px;margin-top:40px;margin-bottom:40px">삭제</h1>
    <?php
    $board_no = $_GET["board_no"];
    $reply_no = $_GET["reply_no"];
    ?>
    <form action="/board_delete_action.php" method="post">
        <table class="table table-bordered" style="width:500px;height:30px;margin-left:600px;">
            <tr>
                <td>비밀 번호를 입력하세요.</td>
            </tr>
            <tr>
                <td><input type="password" name="password" style="width:500px;">

                    <input type="hidden" name="board_no" value="<?php echo $board_no ?>">

                </td>
            </tr>
            <tr>
                <?php
                if ($reply_no == null) {
                ?>
                    <td><button id="delete" type="submit" name="board_delete" value="1" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em; margin-left:310px">게시글 삭제

                        <?php
                    } else {
                        ?>
                    <td><button id="modal" type="submit" name="reply_delete" value="2" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em; margin-left:310px">댓글 삭제
                            <input type="hidden" name="reply_no" value="<?php echo $reply_no ?>">
                        <?php
                    }
                        ?>
                        <button type="button" class="btn btn-outline-secondary" style="width:80px; height:30px; font-size:0.7em; margin-left:10px" onClick="history.back(-1);">뒤로가기</button>
            </tr>
        </table>
    </form>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>