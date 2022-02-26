<!DOCTYPE html>
<html>

<head>
    <?php
        require_once __DIR__ . '/head.html';
    ?>
</head>

<body>
    <?php
    require_once __DIR__ . '/top_bar.php';
    $board_no = $_GET["board_no"];
    $reply_no = $_GET["reply_no"];
    ?>

    <?php
    if ($reply_no == null) {
    ?> <title>게시글 삭제</title>
    <?php    } else {
    ?> <title>댓글 삭제</title>
    <?php }
    ?>

    <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
        <div class="container-fluid">

            <?php
            if ($reply_no == null) {
            ?> <b>게시글 삭제</b>
            <?php
            } else {
            ?> <b>댓글 삭제</b>
            <?php }
            ?>
        </div>
    </nav>
    <form action="/board_delete_action.php" method="post">
        <table class="table table-bordered" style="width:500px;height:30px;margin-left:660px; margin-top:200px;">
            <tr>
                <?php
                if ($reply_no == null) {
                ?> <td>게시글 비밀 번호를 입력해주세요.</td>
                <?php } else {
                ?> <td>댓글 비밀 번호를 입력해주세요.</td>
                <?php
                }
                ?>
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