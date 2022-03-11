
<?php


$board_no = $_POST["board_no"];
$board_text = $_POST["board_text"];
$user_pw = $_POST["user_pw"];
$board_category = $_POST["board_category"];
$origin_pw = $_POST["origin_pw"];
echo "board_no : " . $board_no . "<br>";
echo "board_text :" . $board_text . "<br>";
echo "user_pw :" . $user_pw . "<br>";
echo "board_category :" . $board_category . "<br>";
echo "origin_pw :" . $origin_pw . "<br>";

if (password_verify($user_pw, $origin_pw)) {

    $sql = "UPDATE board SET board_text='" . $board_text . "', board_category='" . $board_category . "' WHERE board_no=" . $board_no . "";

    $result = $pdo->prepare($sql);

    $result->execute();

    $pdo = null;

    echo "good";
    header("LOCATION: http://localhost/board_detail.php?board_no=" . $board_no);
    
} else {

    echo "bod";
    header("LOCATION: http://localhost/board_detail.php?board_no=" . $board_no);
}
?>
