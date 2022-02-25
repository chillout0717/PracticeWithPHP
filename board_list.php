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
  <title>게시글 목록</title>
  <?php
  require_once __DIR__ . '/top_bar.php';
  require_once __DIR__ . '/dbconn.php';
  $sortNum = $_GET['sortNum'];
  $board_category = $_GET['board_category'];
  ?>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <b>게시글 목록  
      <?php
        switch($board_category){
          case "1":
            echo "잡담";
            break;
          case "2";
            echo "고민거리";
            break;
          case "3";
            echo "메뉴추천";
            break;
          default;
            echo "전체글";
            break;
        }
      ?>
      </b>
    </div>
  </nav>
  <div class="sort" style=" display:flex;">
  <form>
    <button class="btn btn-outline-secondary" style="margin-top:20px; margin-bottom:5px; margin-left:1760px; width:60px; height:40px; font-size:0.7em"  onclick="location.href='/board_list.php'">작성일</button>
    <input type="hidden" name="board_category" value="<?php echo $board_category ?>">
    <input type="hidden" name="sortNum" value="1">
  </form>
  <form>
    <button class="btn btn-outline-secondary"  style="margin-top:20px; margin-bottom:5px; width:60px; height:40px; font-size:0.7em; margin-left:10px"  onclick="location.href='/board_list.php'">조회수</button>
    <input type="hidden" name="board_category" value="<?php echo $board_category ?>">
    <input type="hidden" name="sortNum" value="2">
  </form>
  </div>

  <?php

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  
  if($board_category == 0){
    $sql = "SELECT COUNT(*) FROM board";
  }else{
    $sql = "SELECT COUNT(*) FROM board WHERE board_category=".$board_category;
  }
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
  
  switch ($sortNum) {

    case "1":
      if($board_category == null){
        $sql = "SELECT board_no, board_title, board_text, board_user, board_date, board_hit, board_category FROM board WHERE board_category in (1,2,3) order by board_date DESC limit " . $start_num . "," . $list . "";
      }else{
        $sql = "SELECT board_no, board_title, board_text, board_user, board_date, board_hit, board_category FROM board WHERE board_category=".$board_category." order by board_date DESC limit " . $start_num . "," . $list . "";
      }
      break;
    case "2":
      if($board_category == null){
        $sql = "SELECT board_no, board_title, board_text, board_user, board_date, board_hit, board_category FROM board WHERE board_category in (1,2,3) order by board_hit DESC limit " . $start_num . "," . $list . "";
      }else{
        $sql = "SELECT board_no, board_title, board_text, board_user, board_date, board_hit, board_category FROM board WHERE board_category=".$board_category." order by board_hit DESC limit " . $start_num . "," . $list . "";
      } 
      break;
    default:
      $sql = "SELECT board_no, board_title, board_text, board_user, board_date, board_hit, board_category FROM board WHERE board_category in (1,2,3) order by board_no DESC limit " . $start_num . "," . $list . "";
  }

  $result = $pdo->prepare($sql);
  $result->execute();
  $pdo = null;
  ?>

  <h6>
    <?php
    echo "Total " . $row_num . "개의 글";
    ?>
  </h6>
  <table class="table">
    <thead class="table-active">
      <tr>
        <th style="width:10%;text-align: center">번호</th>
        <th style="width:15%;text-align: center">카테고리</th>
        <th style="width:30%;text-align: center">제목</th>
        <th style="width:10%;text-align: center">작성일</th>
        <th style="width:10%;text-align: center">작성자</th>
        <th style="width:20%;text-align: center">조회수</th>
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
          <td style="width:10%;text-align: center">
            <?php
            switch($row["board_category"]){
              case "1":
                echo "잡담";
                break;
              case "2":
                echo "고민거리";
                break;
              case "3":
                echo "메뉴추천";
                break;
              }        
            ?>
          </td>
          <td style="width:45%;text-align: center">
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

  <button type="button" class="btn btn-outline-secondary" onclick="location.href='/board_new_form.php'" style="margin-left:1800px; width:80px; height:40px; font-size:0.7em; margin-top:10px;">새글 작성</button>

  <nav aria-label="Page navigation example" style='margin-top:20px;margin-left:-110px;'>
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
          echo "<li class='page-item'><a class='page-link' style='color:black' href='?board_category=$board_category&sortNum=$sortNum&page=$i'>$i</a></li>";
        }
      }
      if ($page >= $total_page) {
        echo "<li class='page-item'><a class='page-link' style='color:black'>마지막</a></li>";
      } else {
        echo "<li class='page-item'><a class='page-link' style='color:black' href='?board_category=$board_category&sortNum=$sortNum&page=$total_page'>마지막</a></li>";
      }
      ?>
    </ul>
  </nav>
</body>

</html>