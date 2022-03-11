<!DOCTYPE html>
<html>

<head>
    <?php
        require_once __DIR__ . '/head.html';
    ?>
  <link rel="stylesheet" type="text/css" href='./css/login_form.css'>

  <script>
    $(function(){
      $(".findId").on("click", function(){
        var findCategory = 1;
        self.location = "/find_id_pw.php?findCategory="+findCategory;
      });

      $(".findPw").on("click", function(){
        var findCategory = 2;
        self.location = "/find_id_pw.php?findCategory="+findCategory;
      });
    });
  </script>
</head>

<body>
  <title>로그인</title>
  <main class="form-signin" style="margin-top:100px;">
    <form action='/login_action.php' method="post">
      <img class="mb-4" src="https://download.seaicons.com/icons/icons8/windows-8/128/Ecommerce-Barcode-Scanner-icon.png" alt="" width="102" height="87" style="margin-left:80px;margin-bottom:30px">
      <h1 class="h3 mb-3 fw-normal" style="margin-left:50px;margin-top:30px;margin-bottom:30px">Please sign in</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="margin-top:30px;" name="user_email">
        <label for="floatingInput">이메일</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="user_pw">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="find mb-3">
        <label style="display:flex;">
          <p class="find" style="font-size:0.8em">아이디 또는 비밀번호를 잊으셨나요?</p>
          <u type="button" class="findId "style="font-size:0.9em; margin-left:10px;">ID</u>
          <p style="font-size:0.8em;">&nbsp&nbsp/&nbsp&nbsp</p>
          <u type="button" class="findPw "style="font-size:0.9em;">PW</u>
          <p style="font-size:0.8em;">찾기</p>
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-secondary" type="submit">로그인</button>
      <button type="button" class="w-100 btn btn-lg btn-secondary" style="margin-top:10px;" onclick="location.href='/board_list.php'">취소</button></td>
    </form>
  </main>
</body>

</html>


<!-- https://www.studentstutorial.com/ajax/duplicate -->