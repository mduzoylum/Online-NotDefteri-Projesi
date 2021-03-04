<?php 
include('database_connection.php');
$deger=$_GET["deger"];
$kadi=$_GET["kadi"];

if($deger==1)
{
    $yazdeger=0;
}
else{
    $yazdeger=1;
}
$guncelle=mysql_query("update uye set aktif='$yazdeger' where kadi='$kadi'");
header("location:admin.php");
?>