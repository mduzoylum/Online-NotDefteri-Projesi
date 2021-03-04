<?php 
ob_start();
session_start();
$deger=$_COOKIE["kullanici"];

unset($_SESSION['kullanici']);
setcookie("kullanici",$deger,time()-1);

echo header("location:giris.php");

?>
