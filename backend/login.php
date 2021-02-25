<?php 
session_start();
include_once('../conn/connection.php');

if(isset($_POST['submit'])){

    $user = $_POST['email'];
    $user = mysqli_real_escape_string($conn, $user);
    
    $password = $_POST['password'];
    $password = mysqli_real_escape_string($conn, $password);

    $result = $conn->query("SELECT * FROM super_admin WHERE super_admin_username = '$user' AND super_admin_password = '$password'");

    $total = mysqli_num_rows($result);

    if($total == 1){
       
        $_SESSION['user'] = $user;
        header('location:../index.php');
        

    }else{
        $_SESSION['err'] = true;
        header('location:../login.php');
    }

    


    



}



?>