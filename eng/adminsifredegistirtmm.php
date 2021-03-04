<?php 
echo "<head> 
	<title>Admin - Şifre Değiştirme</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8></head>";  

include('database_connection.php');

$kadi=$_GET["kullanici"];
$sifrex=$_POST["sifre"];


    $sifrelex=crc32(sha1(md5(md5(sha1($sifrex)))));
    $gunceller=mysql_query("update uye set sifre='$sifrelex' where kadi='$kadi'");
    echo '<script>document.location.replace("admin.php");</script>';
   


?>