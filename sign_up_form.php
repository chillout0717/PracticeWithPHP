<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <?php
    require_once __DIR__ . '/head.html';
    ?>
    <link rel="stylesheet" type="text/css" href='./css/sign_up.css'>

    <script>
        $(document).ready(function() {

            $(function() {
                $("#emailCheck").on('keyup', function(event) {
                    if (!(event.keyCode >= 37 && event.keyCode <= 40)) {
                        var inputVal = $(this).val();

                        $(this).val(inputVal.replace(/[^a-z0-9@_.-]/gi, ''));
                    }
                });
            });

            $("#emailCheck").keyup(function() {

                $.ajax({
                    url: "sign_up_checking_email.php",
                    type: "POST",
                    data: "user_email=" + $("#emailCheck").val(),

                    success: function(data) {

                        if (data === "bad") {
                            $("#emailCheck").attr('class', 'form-control is-invalid');
                        } else if (data === "good") {
                            $("#emailCheck").attr('class', 'form-control is-valid');
                        }
                    }
                });
            });

            $("#pw2").focusout(function() {
                var pw2 = $("#pw2").val();
                var pw1 = $("#pw1").val();

                if (pw1 != "" || pw2 != "") {
                    if (pw1 == pw2) {
                        $("#pw2").attr('class', 'form-control is-valid');
                        $("#pw1").attr('class', 'form-control is-valid');
                    } else {
                        $("#pw2").attr('class', 'form-control is-invalid');
                        $("#pw1").attr('class', 'form-control is-valid');
                    }
                }

            });

        });
    </script>

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
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <b>회원 가입</b>
        </div>
    </nav>

    <div class="main">
        <div class="qwe">
            <form class=" row g-3" action="/sign_up_action.php" method="post">
                <div class="abc1">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" class="form-control" name="user_fullname">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="user_phone">
                    </div>
                </div>
                <div class="abc">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input id="emailCheck" type="text" class="form-control" name="user_email">
                    </div>
                </div>
                <div class="pw">
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input id="pw1" type="password" class="form-control" name="user_pw">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Check Password</label>
                        <input id="pw2" type="password" class="pw form-control">
                    </div>
                </div>
                <div class="abc2">
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" name="user_addr1">
                    </div>
                    <div class="col-12" id="a">
                        <label for="inputAddress2" class="form-label">Address 2</label>
                        <input type="text" class="form-control" name="user_addr2">
                    </div>
                </div>
                <div class="abc3">
                    <div class="col-md-4" id="b">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" name="user_city">
                    </div>
                    <div class="col-md-5" id="c">
                        <label for="inputState" class="form-label">State</label>
                        <select class="form-select" name="user_state">
                            <option selected>Choose</option>
                            <option>AK</option>
                            <option>AL</option>
                            <option>CA</option>
                            <option>IL</option>
                        </select>
                    </div>
                    <div class="col-md-3" id="d">
                        <label for="inputZip" class="form-label">Zip</label>
                        <input type="text" class="form-control" name="user_zip">
                    </div>
                </div>
                <div id="btn" class="col-12">
                    <button type="submit" class="btn btn-secondary">회원 가입</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='/board_list.php'">취소</button>
                </div>
        </div>
        </form>
    </div>
    </div>
</body>

</html>