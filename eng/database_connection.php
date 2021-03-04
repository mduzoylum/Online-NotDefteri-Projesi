<?php
$dbhost	="localhost";
$dbuser	="root";
$dbpass	="";
$dbadi 	="ndefteri";


$baglan=mysql_connect($dbhost,$dbuser,$dbpass);
if(! $baglan) die("Mysql Baglantisi Saglanamadi");
mysql_query("SET NAMES 'utf8'");

mysql_select_db($dbadi,$baglan) or die("Veritabanına Baglanti Saglanamadi");

//tr
setlocale(LC_ALL, "tr_TR");
mysql_select_db($dbadi,$baglan);
$SQL1 = "SET CHARACTER SET utf8";
$SQL2 = "SET NAMES 'utf8'";
$isle = mysql_query($SQL1, $baglan) or die(mysql_error());
$isle2 = mysql_query($SQL2, $baglan) or die(mysql_error());
?>