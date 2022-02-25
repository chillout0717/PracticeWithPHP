<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>board_list.php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <title>게시글 수정</title>
    <?php
    require_once __DIR__ . '/top_bar.php';
    $board_no = $_GET["board_no"];
    require_once __DIR__ . '/dbconn.php';

    $sql = "SELECT board_text FROM board where board_no=" . $board_no;
    $result = $pdo->prepare($sql);
    $result->execute();
    $board_text = $result->fetchColumn();
    $pdo = null;
    ?>

    <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
        <div class="container-fluid">
            <b>게시글 수정</b>
        </div>
    </nav>

    <div class="mb-3" style="margin-top:10px;">
        <label for="exampleFormControlInput1" class="form-label" style="margin-left: 600px;">수정 전</label>
        <div class="form-control" id="exampleFormControlInput1" style="width:500px;height:220px;font-size:12px;margin-left:600px;"><?= $board_text ?></div>
    </div>
    <form action="/board_update_action.php" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label" style="width:500px;height:40px;margin-left:600px;">카테고리 수정</label>
            <select name="board_category" class="form-select" aria-label="Disabled select example" style="width:350px; margin-top:-10px; margin-left:600px;">
                <option value="1">잡담</option>
                <option value="2">고민거리</option>
                <option value="3">메뉴추천</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1" style="margin-left: 600px;">내 용</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="board_text" style="width:500px;height:220px;font-size:12px;margin-left:600px;" placeholder="수정할 내용을 적어주세요."></textarea>
            <input type="hidden" name="board_no" value="<?php echo $board_no ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1" style="margin-left: 600px;">비밀번호</label>
            <input type="password" class="form-control" name="board_pw" style="width:500px;height:40px;font-size:12px;margin-left:600px;">
        </div>
        <br>
        <button type="submit" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em; margin-left: 920px;">게시글 수정</button>
        <button type="button" class="btn btn-outline-secondary" style="width:80px; height:30px; font-size:0.7em;" onClick="history.back(-1);">뒤로가기</button>
    </form>
</body>

</html>