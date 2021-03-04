<?php 

echo "<head> 
	<title>Admin - Şifre Değiştirme</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8></head>";  

include('database_connection.php');

echo $kisi_adi=$_GET["kisiadi"];

$sil=mysql_query("delete from uye where kadi='$kisi_adi'");
echo "<meta http-equiv=\"refresh\" content=\"0;URL='admin.php'\">";




?>