<!DOCTYPE html>
<haed>
    <?php
        require_once __DIR__ . '/head.html';
        require_once __DIR__ . '/session.php';


    ?>
    <link rel="stylesheet" type="text/css" href='./profile.css'>

    <script>
    $(function(){

        $("button:contains('비밀번호 수정')").on("click", function(){
            var msg = "현재 비밀번호를 입력해주세요.";
            var msg1 = "변경하실 비밀번호를 입력해주세요.";
            var msg2 = "변경하실 비밀버호를 한번 더 입력해주세요.";
            var past_pw = prompt(msg);
            var change_pw = prompt(msg1);
            var re_change_pw = prompt(msg2);
            var user_email = $("#user_email").val();
            
            var allData = {"past_pw":past_pw, "change_pw":change_pw, "re_change_pw":re_change_pw, "user_email":user_email};

                $.ajax({
                url:"update_pw.php",
                type:"POST",
                data:allData,

                success : function(data){
                    if(data === "good"){
                        alert("비밀번호가 성공적으로 바뀌었습니다.");
                    }else{
                        alert("비밀번호 수정에 실패했습니다.");
                    }
                }

            })
        });
    });
    </script>
</haed>

<body>
    <title>회원 정보</title>
    <?php
    require_once __DIR__ . '/top_bar.php';
    ?>
    <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
        <div class="container-fluid">
            <b>회원 정보</b>
        </div>
    </nav>
    <div class="main" style="margin-top: 60px;">
        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4" id="profile">
                            <div class="card-body text-center">
                                <img src="https://previews.123rf.com/images/afe207/afe2071602/afe207160200028/52329315-m%C3%A4nnliches-avatarprofilbild-schattenbildlichtschatten.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3"><?php echo $_SESSION['user_fullname']?></h5>
                                <p class="text-muted mb-1">
                                <?php if($_SESSION['superman']==2){
                                    ?>권한 : 일반회원
                                <?php }else{
                                    ?>권한 : 관리자   
                                <?php }
                                ?>
                                </p>
                                <p class="text-muted mb-4"><?php echo $_SESSION['user_city']?>, <?php echo $_SESSION['user_state']?></p>
                                <div class="d-flex justify-content-center mb-2">
                                    <button type="button" id="button1" class="btn btn-outline-secondary">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8" style="height:30px;">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION['user_fullname']?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION['user_email']?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Password</p>
                                    </div>
                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0" type="password">************</p>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-outline-secondary" style="font-size: 0.8em;" type="button">비밀번호 수정</button>
                                        <input type="hidden" id="user_email" name="user_email" value="<?php echo $_SESSION['user_email']?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION['user_phone']?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Join Date</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION['user_date']?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION['user_addr1']?><?php echo $_SESSION['user_addr2']?>, <?php echo $_SESSION['user_city']?>, <?php echo $_SESSION['user_state']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="bottom">
        <button id="button1" class="btn btn-outline-secondary" type="button" onclick="location.href='/board_list.php'" style="margin-left: 1440px; margin-top: 320px">확인</button>
    </div>
</body>