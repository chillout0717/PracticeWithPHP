<!DOCTYPE html>
<nav class="navbar navbar-dark bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <b><a class="navbar-brand" href='/board_list.php' style="margin-left:-30px;font-size:2em;">스캐너 커뮤니티</a></b>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item" >
                        <a class="nav-link" href='/sign_up_form.php' >회원가입</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='/login_form.php'>로그인</a>
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
                    <img src="https://previews.123rf.com/images/afe207/afe2071602/afe207160200028/52329315-m%C3%A4nnliches-avatarprofilbild-schattenbildlichtschatten.jpg" width="45px" height="45px" style="border-radius:70%;margin-left:1080px;" onclick="location.href='/profile.php'">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-left:10px;" onclick="location.href='/profile.php'">Jehyun Lim</a>
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