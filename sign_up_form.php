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
    <title>회원가입</title>
    <?php
    require_once __DIR__ . '/top_bar.php';
    ?>
    <nav class="navbar navbar-light bg-light" style="margin-left:5px;">
        <div class="container-fluid">
            회원 가입
        </div>
    </nav>

    <div class="main" style="width:1100px; height:800px; margin-left:400px; margin-top:10px;">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Phone</label>
                <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose</option>
                    <option>AK</option>
                    <option>AL</option>
                    <option>CA</option>
                    <option>IL</option>

                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>

            <div class="input-group" style="width:600px; height:40px; margin-top:30px">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">프로필 사진</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">파일 찾기</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="margin-top:30px; margin-left:943px">회원 가입</button>
                <button type="button" class="btn btn-primary" style="margin-top:30px" onclick="location.href='/board_list.php'">취소</button>
            </div>
        </form>
    </div>

</body>

</html>