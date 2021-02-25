<?php 
session_start();
require_once("../conn/connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM `videos` WHERE `VIDEO_ID` = $id") or die($conn->error);
    header("location:../youtube.php");
}





?>