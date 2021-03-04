<?php
session_start();
include('database_connection.php');

$admin=$_SESSION["admin"];

if($admin=="")
{
   echo '<script>document.location.replace("admingiris.php");</script>';
}
?>
<head>
<META http-equiv=content-type content=text/html;charset=utf-8>
<link href="form.css" type="text/css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="favicon.ico">
<script language=" JavaScript" ><!--
function yenile()
{
window.location.reload();
}
//--></script>

<style>
	body{font-family: 'Ubuntu', sans-serif;}
	tr{background-color:white}
	tr:hover{background-color:#ccc}
    #bos,#bos:hover{
	background-color:white;}
 
</style>
</head>
<Body onLoad="yenile()" >
<?php



echo '

 <center><table width="85%" border="1" cellpadding="3" cellspacing="0">
    <tr>
	  <td width="14%" align="left"><strong>Kullanıcı Adı</strong></td>
      <td width="14%" align="left"><strong>Ad</strong></td>
      <td width="18%" align="left"><strong>Mail</strong></td>
      <td width="11%" align="left"><strong>Girdiği Not Sayısı</strong></td>
      <td width="15%" align="left"><strong>Son Giriş Yapılan Tarih</strong></td>
	  <td width="15%" align="left"><strong>Son Giriş Yapılan IP</strong></td>
	  <td width="7%" align="center"><strong>Üye Sil</strong></td>
      <td width="11%" align="center"><strong>Şifre Değiştir</strong></td>
      <td width="13%" align="left"><strong>Aktiflik Durumu</strong></td>
      
    </tr>
';




$bilgicek=mysql_query("SELECT * FROM uye");
while($bilgiyaz=mysql_fetch_array($bilgicek))
{
$id=$bilgiyaz['id'];
$kadi=$bilgiyaz['kadi'];
$uye=$bilgiyaz['adi'];
$mail=$bilgiyaz['mail'];
$songirtar=$bilgiyaz['son_giris'];

$aktif=$bilgiyaz['aktif'];
if($aktif==1)
{
    $resim="<a href=durumdegistir.php?deger=1&kadi=$kadi><img src=\"aktif.png\" width=\"18\" height=\"18\" /></a>";
}
else
{
    $resim="<a href=durumdegistir.php?deger=0&kadi=$kadi><img src=\"pasif.png\" width=\"18\" height=\"18\" /></a>";
}
$son_ip=$bilgiyaz['son_ip'];
$ek=0;$eb=0;
$bilgi=mysql_query("SELECT COUNT(*) FROM notlar  u where u.ekleyen_id='$id' ");
if($bilgi)
{
        $tek=mysql_fetch_array($bilgi);
        
}

echo "
    <tr class=\"satir\">
	  <td>$kadi</td>
      <td>$uye</td>
      <td>$mail</td>
      ";
	  echo "<td>";echo $tek[0]; echo"</td>";
	  echo"
	  <td>$songirtar</td>
	  <td>$son_ip</td>
	 <td align=\"center\"><a href=\"kisisil.php?kisiadi=$kadi\"><img src=\"delete.png\" width=\"18\" height=\"18\" /></a></td>
     <td align=\"center\"> <a href=\"adminsifredegistir.php?kadiadi=$kadi\"><img src=\"sifredegistir.png\" width=\"18\" height=\"18\" /></a></td>
      <td align=\"center\">$resim</td>
      
    </tr>
";
}
 echo "</table></center>";
 echo "<a href=\"adminkapat.php\"><input type=\"Submit\" value=\"Çıkış Yap\"></a>";



?>