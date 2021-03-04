<?php
include('database_connection.php');

$kadi=$_GET['kadi'];
$sifre=$_GET['sifre'];

$sor=mysql_query("SELECT * FROM uye where kadi='".$kadi."' and sifre='".$sifre."'");


if(mysql_num_rows($sor)){echo "dogrulama basarili";}


?>