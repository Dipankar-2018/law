<?php 
include_once('../conn/connection.php');


if(isset($_POST['gallary'])){

    $title = $_POST['title'];

    $photo = $_FILES['photo']['name'];    
    
    $photo_temp = $_FILES['photo']['tmp_name'];
    
    $photo_folder = "../doc/gallary/" . $photo;
    
    move_uploaded_file($photo_temp, $photo_folder);
    
    $conn->query("INSERT INTO `gallery` (`IMAGE_URL`, `IMAGE_TITLE`) VALUES ('$photo', '$title')");
    
    header("location:../gallary.php");
    
    }
    
    //---------------------------------------------------------------delete-imge------------------------------------------------------------------------------------------
    
    if(isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $conn->query("DELETE FROM gallery WHERE GALLERY_ID = $id");
    header("location:../gallary.php");
    }
    







?>