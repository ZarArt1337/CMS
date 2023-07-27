<?php ob_start();

$db['db_host'] = "zarartd722.mysql.db";
$db['db_user'] = "zarartd722";
$db['db_pass'] = "ZarArt1337";
$db['db_name'] = "zarartd722";

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);



$query = "SET NAMES utf8";
mysqli_query($connection,$query);

//$connection = mysqli_connect('localhost','root','','cms');




?>