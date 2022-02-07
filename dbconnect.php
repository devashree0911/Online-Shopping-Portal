<?php
$host='localhost';
$username='root';
$pass='';
$db='online_shopping';
$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn) die("Connection refused").mysqli_connect_error();
?>
