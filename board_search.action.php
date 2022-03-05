<?php
    require_once __DIR__ . '/dbconn.php';

    $search_text = $_GET["search_text"];
    $search_category = $_GET["search_category"];


    echo "search_text : " . $search_text . "<br>";
    echo "search_category : " . $search_category . "<br>";


    if($search_category == "1"){
        $sql = "SELECT * FROM board WHERE board_no='".$search_text;
    }else if($search_category == "2"){
        $sql = "SELECT * FROM board WHERE board_title in('".$search_text."')";
    }else if($search_category == "3"){
        $sql = "SELECT * FROM board WHERE board_user in(".$search_text.")";
    }

   

    $result = $pdo -> prepare($sql);

    $result -> execute();

    print_r($result);

    $pdo = null;

    var_dump($row);
    print_r($row);

    $row = $result -> fetch(PDO::FETCH_ASSOC);

    




?>
