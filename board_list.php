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
  <nav class="navbar navbar-dark bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">게시판 목록</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href='/board_list.php'>Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">회원가입</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">로그인</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                게시판 카테고리
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">잡담</a></li>
                <li><a class="dropdown-item" href="#">고민거리</a></li>
                <li><a class="dropdown-item" href="#">오늘 뭐먹지?</a></li>
              </ul>
            </li>
            <img src="https://previews.123rf.com/images/afe207/afe2071602/afe207160200028/52329315-m%C3%A4nnliches-avatarprofilbild-schattenbildlichtschatten.jpg" width="45px" height="45px" style="border-radius:70%;margin-left:1100px;">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="margin-left:10px;">Jehyun Lim</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">로그아웃</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </nav>
  <form>
    <button class="btn btn-outline-secondary" name="sortNum" value="1" onclick="sort('date')" style="margin-top:20px; margin-bottom:20px; margin-left:1760px; width:60px; height:40px; font-size:0.7em">작성일</button>
    <button class="btn btn-outline-secondary" name="sortNum" value="2" onclick="sort('hit')" style="margin-top:20px; margin-bottom:20px; width:60px; height:40px; font-size:0.7em">조회수</button>
  </form>

  <?php

  require_once __DIR__ . '/dbconn.php';

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $sql = "SELECT COUNT(*) FROM board";
  $result2 = $pdo->prepare($sql);
  $result2->execute();
  $row_num  = $result2->fetchColumn();

  $list = 10;
  $block_ct = 5;

  $block_num = ceil($page / $block_ct); //1

  $block_start = (($block_num - 1) * $block_ct) + 1; //1

  $block_end = $block_start + $block_ct - 1; //5

  $total_page = ceil($row_num / $list);

  if ($block_end > $total_page) $block_end = $total_page;

  $total_block = ceil($total_page / $block_ct);
  $start_num = ($page - 1) * $list;

  $sortNum = $_GET['sortNum'];

  switch ($sortNum) {

    case "1":
      $sql = "SELECT board_no, board_title, board_text, board_user, board_date, board_hit FROM board order by board_date DESC limit " . $start_num . "," . $list . "";
      break;
    case "2":
      $sql = "SELECT board_no, board_title, board_text, board_user, board_date, board_hit FROM board order by board_hit DESC limit " . $start_num . "," . $list . "";
      break;
    default:
      $sql = "SELECT board_no, board_title, board_text, board_user, board_date, board_hit FROM board order by board_no DESC limit " . $start_num . "," . $list . "";
  }

  $result = $pdo->prepare($sql);
  $result->execute();

  ?>
  <h5>
    <?php
    echo "Total " . $row_num . " POST";
    ?>
  </h5>
  <?php

  $pdo = null;
  ?>




  <table class="table">
    <thead class="table-active">
      <tr>
        <th style="width:10%;text-align: center">번호</th>
        <th style="width:60%;text-align: center">제목</th>
        <th style="width:10%;text-align: center">작성일</th>
        <th style="width:10%;text-align: center">작성자</th>
        <th style="width:10%;text-align: center">조회수</th>
      </tr>
    </thead>
    <tbody>

      <?php
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <tr>
          <td style="width:10%;text-align: center">
            <?php
            echo $row["board_no"];
            ?>
          </td>
          <td style="width:60%;text-align: center">
            <?php
            echo "<a style='color:black; text-decoration-line:none;' href='/board_detail.php?board_no=" . $row["board_no"] . "'>";
            echo $row["board_title"];
            echo "</a>";
            ?>
          </td>
          <td style="width:10%;text-align: center;">
            <?php
            echo $row["board_date"];
            ?>
          </td>
          <td style="width:10%;text-align: center">
            <?php
            echo $row["board_user"];
            ?>
          </td>
          <td style="width:10%;text-align: center">
            <?php
            echo $row["board_hit"];
            ?>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <button type="button" class="btn btn-outline-secondary" onclick="location.href='/board_new_form.php'" style="margin-left:1800px; width:80px; height:40px; font-size:0.7em; margin-top:20px;">새글 작성</button>



  &nbsp;&nbsp;&nbsp;&nbsp;

  <nav aria-label="Page navigation example" style='margin-top:20px;'>
    <ul class="pagination justify-content-center">
      <?php
      if ($page <= 1) {
        echo "<li class='page-item'><a class='page-link' style='color:black'>처음</a></li>";
      } else {
        echo "<li class='page-item'><a class='page-link' style='color:black' href='?sortNum=$sortNum&page=1'>처음</a></li>";
      }

      for ($i = $block_start; $i <= $block_end; $i++) {

        if ($page == $i) {
          echo "<li class='page-item'><a class='page-link' style='background:grey;color:black';'>$i</a></li>";
        } else {
          echo "<li class='page-item'><a class='page-link' style='color:black' href='?sortNum=$sortNum&page=$i'>$i</a></li>";
        }
      }
      if ($page >= $total_page) {
        echo "<li class='page-item'><a class='page-link' style='color:black'>마지막</a></li>";
      } else {
        echo "<li class='page-item'><a class='page-link' style='color:black' href='?sortNum=$sortNum&page=$total_page'>마지막</a></li>";
      }
      ?>
    </ul>
  </nav>
  &nbsp;&nbsp;
  <br><br><br><br><br>
</body>

</html>