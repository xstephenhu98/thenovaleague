<?php

$db = mysql_connect("localhost","root",""); //connect to database
if(!$db) die("Error connecting to MySQL database.");
mysql_select_db("thenovaleague" ,$db);
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysql_query("SELECT * FROM user WHERE username = '$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session = $row['username'];

if(!isset($login_session)){
mysql_close($connection);
header('Location: index.html');
}

?>