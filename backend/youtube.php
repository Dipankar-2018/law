<?php
include_once('../conn/connection.php'); 
echo "<pre>";
print_r($_POST);

if(isset($_POST['youtube'])){
    $title = $_POST['title'];
    $link = $_POST['link'];

    $conn->query("INSERT INTO `videos` (`VIDEO_URL`, `VIDEO_TITLE`) VALUES ('$title', '$link')") or die($conn->error);
    header("location:../youtube.php");

}





?>