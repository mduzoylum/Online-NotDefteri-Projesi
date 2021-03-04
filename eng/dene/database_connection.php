<?php
$dbhost	="tklnk.tk";
$dbuser	="mddiz_user";
$dbpass	="12345";
$dbadi 	="mddizayn_db";


$baglan=mysql_connect($dbhost,$dbuser,$dbpass);
if(! $baglan) die("Mysql Baglantısı Sağlanamadı");
mysql_query("SET NAMES 'utf8'");

mysql_select_db($dbadi,$baglan) or die("Veritabanına Bağlantı Sağlanamadı");

//tr
setlocale(LC_ALL, "tr_TR");
mysql_select_db($dbadi,$baglan);
$SQL1 = "SET CHARACTER SET utf8";
$SQL2 = "SET NAMES 'utf8'";
$isle = mysql_query($SQL1, $baglan) or die(mysql_error());
$isle2 = mysql_query($SQL2, $baglan) or die(mysql_error());
?>