<!DOCTYPE html>
<html>

<head>
    <?php
    require_once __DIR__ . '/head.html';
    ?>
    <link rel="stylesheet" type="text/css" href='./css/findPWID.css'>

    <script>
        $(function() {

            $("#fidnId").on("click", function() {
                var fullName = $("#validationTooltip01").val();
                var phone = $("#validationTooltip02").val();
                var zip = $("#validationTooltip05").val();
                var id = 1;

                var allData = {
                    "fullName": fullName,
                    "phone": phone,
                    "zip": zip,
                    "id": id
                };

                $.ajax({
                    url: "findAction.php",
                    type: "POST",
                    data: allData,

                    success: function(data) {
                        if (data === "bad") {
                            alert("존재하는 아이디가 없습니다.");
                            location.href = "./login_form.php";
                        } else {
                            alert("찾으신 당신의 이메일은 : " + data + "입니다.");
                            location.href = "./login_form.php";

                        }
                    }
                });
            });

            $("#fidnPw").on("click", function() {
                var fullName = $("#name").val();
                var user_email = $("#email").val();
                var password = $("#password").val();
                var pw = 2;

                var allData = {
                    "fullName": fullName,
                    "user_email": user_email,
                    "password": password,
                    "pw": pw
                };

                $.ajax({
                    url: "findAction.php",
                    type: "POST",
                    data: allData,

                    success: function(data) {
                        if (data === "good") {
                            alert("새로운 비밀번호로 변경 되었습니다.");
                            location.href = "./login_form.php";
                        } else if(data === "bad"){
                            alert("찾으시는 아이디가 없습니다.");
                            location.href = "./login_form.php";

                        }
                    }
                });
            });
        });
    </script>
</head>

<body>
    <?php
    require_once __DIR__ . '/top_bar.php';
    $findCategory = $_GET["findCategory"];

    if ($findCategory == 1) {
    ?> <nav class="navbar">
            <div class="container-fluid">
                <b>아이디 찾기
                </b>
            </div>
        </nav>
        <div class="main">
            <div class="info">
                <div id="input" class="col-md-4 position-relative">
                    <label for="validationTooltip01" class="form-label">Full name</label>
                    <input type="text" class="form-control" id="validationTooltip01" required>
                    <div class="invalid-tooltip">
                        Please provide a Full name.
                    </div>
                </div>
                <div id="input" class="col-md-4 position-relative">
                    <label for="validationTooltip02" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="validationTooltip02" required>
                    <div class="valid-tooltip">
                        Please provide a Phone number.
                    </div>
                </div>
                <div id="input" class="col-md-3 position-relative">
                    <label for="validationTooltip05" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="validationTooltip05" required>
                    <div class="invalid-tooltip">
                        Please provide a valid zip.
                    </div>
                </div>
                <div id="input" class="col-12">
                    <button id="fidnId" class="btn btn-outline-secondary" type="submit">ID 찾기</button>
                    <button class="btn btn-outline-secondary" onClick="history.back(-1);">취소</button>
                </div>
            </div>
        </div>
    <?php } else {
    ?>
        <div class="main">

            <nav class="navbar">
                <div class="container-fluid">
                    <b>비밀번호 찾기
                    </b>
                </div>
            </nav>
            <div class="findpw">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Full Name</span>
                    <input id="name" type="text" class="form-control" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">Email</span>
                    <input id="email" type="text" class="form-control" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2">New password</span>
                    <input id="password" type="password" class="form-control" aria-describedby="basic-addon1">
                </div>

                <div id="input" class="col">
                    <button id="fidnPw" class="btn btn-outline-secondary" type="submit">PW 찾기</button>
                    <button class="btn btn-outline-secondary" onClick="history.back(-1);">취소</button>
                </div>
            <?php }
            ?>
            </div>
        </div>


</body>

</html>