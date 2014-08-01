<?php

$hostname="localhost";
$username="root";
$password="";
$dbname="codypaste";

mysql_connect($hostname,$username,$password) or die(mysql_error());

mysql_select_db("$dbname") or die("table unavailable");

?>
