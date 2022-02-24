<!DOCTYPE html>
<html>
<?php
require_once __DIR__ . '/top_bar.php';
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
</head>

<body>
    <title>새글 쓰기</title>

    <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
        <div class="container-fluid">
            새글 쓰기
        </div>
    </nav>
    <form action="/board_new_action.php" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1" style="margin-left: 680px;margin-top:60px;">제 목</label>
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