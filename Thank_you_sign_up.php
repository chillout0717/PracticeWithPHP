<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>board_list.php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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