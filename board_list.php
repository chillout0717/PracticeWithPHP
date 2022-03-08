<!DOCTYPE html>
<html>

<head>
  <?php

  require_once __DIR__ . '/head.html';
  ?>
  <link rel="stylesheet" type="text/css" href='./css/board_list.css'>
</head>

<body>
  <title>게시글 목록</title>

  <?php
  require_once __DIR__ . '/top_bar.php';
  require_once __DIR__ . '/dbconn.php';
  $sortNum = $_GET['sortNum'];
  $board_category = $_GET['board_category'];

  ?>
  <nav class="navbar">
    <div class="container-fluid">
      <b>게시글 목록
        <?php
        switch ($board_category) {
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

  <?php


    $url = "https://api.openweathermap.org/data/2.5/forecast?q=cypress&appid=c52bf429d5f41ca2f4a178b210f3c55a";

    $json = file_get_contents($url);
    
    $data = json_decode($json, true); //true면 array, 없으면 obj를 된다.

    if($json==false){
      $todayTemp = "값을";
      $todayHumidity = "찾아 올 수";
      $weather1 = " 없습니다.";

      $tomorrowTemp = "값을";
      $tomorrowHumidity = "찾아 올 수";
      $weather2 = " 없습니다."; 
  
      $day_after_tomorrowTemp = "값을";
      $day_after_tomorrowHumidity = "찾아 올 수";
      $weather3 = " 없습니다.";

    }else{
    $todayTemp = $data['list'][4]['main']['temp_max'] - 273.15."°C";
    $todayHumidity = $data['list'][4]['main']['humidity']."%";
    $weather1 = $data['list'][4]['weather'][0]['main'];

    $tomorrowTemp = $data['list'][12]['main']['temp_max'] - 273.15."°C";
    $tomorrowHumidity = $data['list'][12]['main']['humidity']."%";
    $weather2 = $data['list'][12]['weather'][0]['main'];

    $day_after_tomorrowTemp = $data['list'][20]['main']['temp_max'] - 273.15."°C";
    $day_after_tomorrowHumidity = $data['list'][20]['main']['humidity']."%";
    $weather3 = $data['list'][20]['weather'][0]['main'];
  }
 
  ?>

  <div class="top">
    <div class="weather">
      <div class="card border-light mb-3" style="max-width: 18rem;">
        <div class="card-header" id="weather1">오늘날씨
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo "최고온도 = " . $todayTemp ?></p>
          <p class="card-text"><?php echo "습도 = " . $todayHumidity ?></p>
          <p class="card-text"><?php echo "날씨 = " . $weather1 ?></p>
        </div>
      </div>
      <div class="card border-light mb-3" style="max-width: 18rem;">
        <div class="card-header" id="weather2">내일날씨
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo "최고온도 = " . $tomorrowTemp ?></p>
          <p class="card-text"><?php echo "습도 = " . $tomorrowHumidity ?></p>
          <p class="card-text"><?php echo "날씨 = " . $weather2 ?></p>
        </div>
      </div>
      <div class="card border-light mb-3" style="max-width: 18rem;">
        <div class="card-header" id="weather3">모레날씨
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo "최고온도 = " . $day_after_tomorrowTemp ?></p>
          <p class="card-text"><?php echo "습도 = " . $day_after_tomorrowHumidity ?></p>
          <p class="card-text"><?php echo "날씨 = " . $weather3 ?></p>
        </div>
      </div>
    </div>
    <div class="sort">
      <form>
        <button class="btn btn-outline-secondary" style=" width:60px; height:40px; font-size:0.7em" onclick="location.href='/board_list.php'">작성일</button>
        <input type="hidden" name="board_category" value="<?php echo $board_category ?>">
        <input type="hidden" name="sortNum" value="1">
      </form>
      <form>
        <button class="btn btn-outline-secondary" style=" width:60px; height:40px; font-size:0.7em; " onclick="location.href='/board_list.php'">조회수</button>
        <input type="hidden" name="board_category" value="<?php echo $board_category ?>">
        <input type="hidden" name="sortNum" value="2">
      </form>
    </div>
  </div>

  <?php

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  $sqlde = "SELECT COUNT(*) FROM board ";

  if ($board_category == 0) {
    $sql = $sqlde;
  } else {
    $sql = $sqlde . " WHERE board_category=" . $board_category;
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

  $sqlde1 = "SELECT board_no, board_title, board_text, board_user, board_date, board_hit, board_category FROM board ";

  switch ($sortNum) {

    case "1":
      if ($board_category == null) {
        $sql = $sqlde1 . " WHERE board_category in (1,2,3) order by board_date DESC limit " . $start_num . "," . $list . "";
      } else {
        $sql = $sqlde1 . " WHERE board_category=" . $board_category . " order by board_date DESC limit " . $start_num . "," . $list . "";
      }
      break;
    case "2":
      if ($board_category == null) {
        $sql = $sqlde1 . " WHERE board_category in (1,2,3) order by board_hit DESC limit " . $start_num . "," . $list . "";
      } else {
        $sql = $sqlde1 . " WHERE board_category=" . $board_category . " order by board_hit DESC limit " . $start_num . "," . $list . "";
      }
      break;
    default:
      $sql = $sqlde1 . " WHERE board_category in (1,2,3) order by board_no DESC limit " . $start_num . "," . $list . "";
  }

  $result = $pdo->prepare($sql);
  $result->execute();
  $pdo = null;
  ?>

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
            switch ($row["board_category"]) {
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

  <button id="newBtn" type="button" class="btn btn-outline-secondary" onclick="location.href='/board_new_form.php'" style="width:80px; height:40px; font-size:0.7em; float: right;">새글 작성</button>

  <form action="/board_search.action.php" method="GET">
    <div class="search" style="display:flex; padding-left:680px">
      <select class="btn btn-outline-secondary" name="search_category">
        <option value="1">내용</option>
        <option value="2">제목</option>
        <option value="3">작성자</option>
      </select>
      <input id="search" type="text" name="search_text" class="form-control" placeholder="Search..." style="width:400px;">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </form>

  <br>

  <div class="total">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?php
        if ($page <= 1) {
          echo "<li class='page-item'><a class='page-link' style='color:black'>처음</a></li>";
        } else {
          echo "<li class='page-item'><a class='page-link' style='color:black' href='?board_category=$board_category&sortNum=$sortNum&page=1'>처음</a></li>";
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
  </div>
</body>

</html>