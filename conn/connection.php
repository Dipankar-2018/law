<?php

// $servername ="localhost";
// $username = "progatic";
// $password = "y08uBZ7e3k";
// $dbname = "progatic_db";

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "uppl";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn)
{ 
}
else
{
   die("Connection failed Due to".mysqli_connect_error());
}
