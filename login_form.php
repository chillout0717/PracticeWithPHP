<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>board_list.php</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href='./css/login_form.css'>
</head>

<body>
  <title>로그인</title>
  <main class="form-signin" style="margin-top:100px;">
    <form action='/login_action.php' method="post">
      <img class="mb-4" src="https://download.seaicons.com/icons/icons8/windows-8/128/Ecommerce-Barcode-Scanner-icon.png" alt="" width="102" height="87" style="margin-left:80px;margin-bottom:30px">
      <h1 class="h3 mb-3 fw-normal" style="margin-left:50px;margin-top:30px;margin-bottom:30px">Please sign in</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="margin-top:30px;" name="user_email">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="user_pw">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">로그인</button>
      <button type="button" class="w-100 btn btn-lg btn-primary" style="margin-top:10px;" onclick="location.href='/board_list.php'">취소</button></td>
    </form>
  </main>
</body>

</html>