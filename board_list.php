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

  $data = json_decode($json, true);

  $currentTemp = $data['list'][4]['main']['temp'] - 273.15;
  $currentHumidity = $data['list'][4]['main']['humidity'];

  $tomorrowTemp = $data['list'][12]['main']['temp'] - 273.15;
  $tomorrowHumidity = $data['list'][12]['main']['humidity'];

  $day_after_tomorrowTemp = $data['list'][20]['main']['temp'] - 273.15;
  $day_after_tomorrowHumidity = $data['list'][20]['main']['humidity'];


  ?>
  <div class="top">
    <div class="weather">
      <div class="card border-light mb-3" style="max-width: 18rem;">
        <div class="card-header">오늘날씨
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clouds-fill" viewBox="0 0 16 16">
            <path d="M11.473 9a4.5 4.5 0 0 0-8.72-.99A3 3 0 0 0 3 14h8.5a2.5 2.5 0 1 0-.027-5z" />
            <path d="M14.544 9.772a3.506 3.506 0 0 0-2.225-1.676 5.502 5.502 0 0 0-6.337-4.002 4.002 4.002 0 0 1 7.392.91 2.5 2.5 0 0 1 1.17 4.769z" />
          </svg>
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo "현재온도 = " . $currentTemp ?>°C</p>
          <p class="card-text"><?php echo "습도 = " . $currentHumidity ?>%</p>
        </div>
      </div>
      <div class="card border-light mb-3" style="max-width: 18rem;">
        <div class="card-header">내일날씨
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-fill" viewBox="0 0 16 16">
            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
          </svg>
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo "현재온도 = " . $tomorrowTemp ?>°C</p>
          <p class="card-text"><?php echo "습도 = " . $tomorrowHumidity ?>%</p>
        </div>
      </div>
      <div class="card border-light mb-3" style="max-width: 18rem;">
        <div class="card-header">모레날씨
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-rain-heavy-fill" viewBox="0 0 16 16">
            <path d="M4.176 11.032a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm3 0a.5.5 0 0 1 .292.643l-1.5 4a.5.5 0 0 1-.936-.35l1.5-4a.5.5 0 0 1 .644-.293zm.229-7.005a5.001 5.001 0 0 0-9.499-1.004A3.5 3.5 0 1 0 3.5 10H13a3 3 0 0 0 .405-5.973z" />
          </svg>
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo "현재온도 = " . $day_after_tomorrowTemp ?>°C</p>
          <p class="card-text"><?php echo "습도 = " . $day_after_tomorrowHumidity ?>%</p>
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
  <div class="search">
    
  </div>
  <h6>
    <?php
    echo "Total " . $row_num . "개의 글";
    ?>
  </h6>
  </div>

  <button type="button" class="btn btn-outline-secondary" onclick="location.href='/board_new_form.php'" style="margin-left:1800px; width:80px; height:40px; font-size:0.7em; margin-top:10px;">새글 작성</button>
  <div class="total">

    <nav aria-label="Page navigation example" style='margin-top:20px;margin-left:-110px;'>
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

</body>

</html>