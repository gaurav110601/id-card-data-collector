<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "id-card-generator";
//create connection
$conn = mysqli_connect($host, $username, $password, $dbname);
//check connection if it is working or not
if (!$conn)
{
die("Connection failed!" . mysqli_connect_error());
}

?>