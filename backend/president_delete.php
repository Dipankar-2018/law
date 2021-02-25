<?php 
session_start();
require_once("../conn/connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM `president` WHERE `PRESIDENT_ID` = $id") or die($conn->error);
    header("location:../president.php");
}





?>