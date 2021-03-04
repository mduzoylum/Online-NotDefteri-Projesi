<?php 
session_start(); 
include('database_connection.php');
include('session.php');

$id_cek=@$_GET["Git2"];
?>
<head>
<META http-equiv=content-type content=text/html;charset=utf-8>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no"> 
<link href="form.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="/favicon.ico">
<script language=" JavaScript" ><!--
function yenile()
{
window.location.reload();
}
//--></script>

</head>
<Body onLoad="yenile()" >

<?php

$kulidceksorgu=mysql_query("select * from uye u where u.kadi='$kadi'");
$kulidyaz=mysql_fetch_array($kulidceksorgu);
$kulidyazdeger=$kulidyaz['id'];


/*
$sorsil=mysql_query("select * from notlar where id='$id_cek' and ekleyen_id='$kulidyazdeger' ");
if(mysql_num_rows(@$sil)<1)
{
    echo "<script>alert(\"İzniniz Olmayan Biryere Erişmeye Çalışıyorsunuz!!\")</script>";
    echo '<script>document.location.replace("anasayfa.php");</script>';
    
}*/
$sil=mysql_query("delete from notlar where id='$id_cek' and ekleyen_id='$kulidyazdeger' ");


if($sil)
{

echo "<meta http-equiv=\"refresh\" content=\"0;URL='anasayfa.php'\">";

}
else
{
echo "<script>alert(\"!!! İşlem Başarısız\")</script>";

echo "<meta http-equiv=\"refresh\" content=\"0;URL='anasayfa.php'\">";
}
?>