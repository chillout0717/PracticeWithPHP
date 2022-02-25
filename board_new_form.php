<!DOCTYPE html>
<html>
<?php
require_once __DIR__ . '/top_bar.php';
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>board_list.php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <title>새글 쓰기</title>

    <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
        <div class="container-fluid">
            <b>새글 쓰기</b>
        </div>
    </nav>
    <form action="/board_new_action.php" method="post">
        <div class="dropdown">
            <label for="exampleFormControlInput1" style="margin-left: 680px;margin-top:30px;">카테고리</label>
            <select name="board_category" class="form-select" aria-label="Disabled select example" style="width:350px; margin-left:680px;">
                <option value="1">잡담</option>
                <option value="2">고민거리</option>
                <option value="3">메뉴추천</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" style="margin-left: 680px; margin-top:20px;">제 목</label>
            <input type="text" class="form-control" name="board_title" style="width:500px;height:40px;font-size:12px;margin-left:680px;">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" style="margin-left: 680px;">작성자 이름</label>
            <input type="text" class="form-control" name="board_user" style="width:500px;height:40px;font-size:12px;margin-left:680px;">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1" style="margin-left: 680px;">내 용</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="board_text" style="width:500px;height:300px;font-size:12px;margin-left:680px;"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" style="margin-left: 680px;">비밀번호</label>
            <input type="password" class="form-control" name="board_pw" style="width:500px;height:40px;font-size:12px;margin-left:680px;">
        </div>
        <button type="submit" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em; margin-left: 1000px;">완료 </button>
        <button type="button" class="btn btn-outline-secondary" style="width:90px; height:30px; font-size:0.7em;" onClick="history.back(-1);">뒤로가기</button></td>
    </form>
</body>

</html>