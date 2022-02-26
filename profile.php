<!DOCTYPE html>
<haed>
    <?php
        require_once __DIR__ . '/head.html';
    ?>
    <link rel="stylesheet" type="text/css" href='./profile.css'>
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
                                <h5 class="my-3">Jehyun Lim</h5>
                                <p class="text-muted mb-1">Jr.Developer</p>
                                <p class="text-muted mb-4">Diamond bar, CA</p>
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
                                        <p class="text-muted mb-0">Johnatan Smith</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">example@example.com</p>
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
                                        <button class="btn btn-outline-secondary" style="font-size: 0.8em;" type="button">Edit</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">(097) 234-5678</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Mobile</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">(098) 765-4321</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
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