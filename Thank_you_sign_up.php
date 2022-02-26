<!DOCTYPE html>

<head>
    <?php
        require_once __DIR__ . '/head.html';
    ?>
</head>

<body>
    <title>가입 축하</title>
    <?php
    require_once __DIR__ . '/top_bar.php';
    ?>
    <div class="card text-center" style="margin-top:180px; margin-left:500px; height:300px; width:800px;">
        <div class="card-header">
            <h4><b>스캐너 커뮤니티</b></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">환 영 합 니 다!</h5>
            <p class="card-text" style="margin-top:50px">저희 커뮤니티를 방문해주시고 가입해주셔서 정말 감사합니다. 좋은 하루 되세요!</p>
            <a href="#" class="btn btn-secondary" style="margin-top:40px" onclick="location.href='/board_list.php'"> 게시판 목록으로 가기</a>
        </div>
    </div>
</body>