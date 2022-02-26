<!DOCTYPE html>
<html>

<head>
    <?php
    require_once __DIR__ . '/head.html';
    ?>
</head>

<body>
    <title>회원가입</title>
    <?php
    require_once __DIR__ . '/top_bar.php';
    require_once __DIR__ . '/dbconn.php';

    $sql = "SELECT user_email FROM usercontrol";
    $result = $pdo->prepare($sql);
    $result->execute();
    $pdo = null;

    ?>
    <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
        <div class="container-fluid">
            <b>회원 가입</b>
        </div>
    </nav>

    <div class="main" style="width:1100px; height:800px; margin-left:400px; margin-top:60px;">
        <form class="row g-3" action="/sign_up_action.php" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="text" class="form-control" name="user_fullname">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Phone</label>
                <input type="text" class="form-control" name="user_phone">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="text" class="form-control" name="user_email">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" name="user_pw">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" name="user_addr1" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Address 2</label>
                <input type="text" class="form-control" name="user_addr2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" name="user_city">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select class="form-select" name="user_state">
                    <option selected>Choose</option>
                    <option>AK</option>
                    <option>AL</option>
                    <option>CA</option>
                    <option>IL</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" name="user_zip">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-secondary" style="margin-top:30px; margin-left:940px">회원 가입</button>
                <button type="button" class="btn btn-secondary" style="margin-top:30px" onclick="location.href='/board_list.php'">취소</button>
            </div>
        </form>
    </div>

</body>

</html>