<?php 
ob_start();
session_start();
include('database_connection.php');
require_once('session.php');
require_once('tema.php');
$eski=mysql_query("select * from uye where kadi='$kadi'");
while($yaz=mysql_fetch_array($eski))
{
$vkadi=$yaz['kadi'];
$adi=$yaz['adi'];
$aydi=$yaz['id'];
$cinsiyet=$yaz['cinsiyet'];
$dogum=$yaz['dogum'];
$tel=$yaz['tel'];
$eposta=$yaz['mail'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META http-equiv=content-type content=text/html;charset=utf-8>
<title>Üye Kayıt</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no"> 
<link rel="stylesheet" type="text/css" href="css/<?php echo $temacss; ?>.css" />
<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.js"></script>
<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.mobile.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
<script>
$(document).bind('mobileinit',function(){
		$.mobile.selectmenu.prototype.options.nativeMenu = false;
	});
</script>

<style>
#availability_status{

	font-size:14px;

	}
</style>

    <meta http-equiv=content-type content=text/html;charset=utf-8>
    <meta http-equiv=content-type content=text/html;charset=windows-1254>
	<meta http-equiv=content-type content=text/html;charset=x-mac-turkish>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="shortcut icon" href="/favicon.ico">
</head>
<body>
<div data-role="content">
    <a href="anasayfa.php" style="color:#34495e;text-decoration: none;">Back</a>
    
<div id="content">
  <form action="sifredegistir.php" method="post">
  
  <input type="hidden" name="username" id="username" value="<?php $vkadi ?>" class="required" minlength="5" class="form_element"/>
    
   	 <div style="margin-left:0px; margin-top:17px; position:absolute;">Sifre: </div><div style="margin-left:110px;" class="style_form">
      <input type="password" name="sifre1" id="sifre1" value="" class="form_element"/>
	  <span id="availability_statusm"></span>
    </div>
    <div style="margin-left:0px; margin-top:17px; position:absolute;">Sifre Tekrar: </div><div style="margin-left:110px;" class="style_form">
      <input type="password" name="sifre2" id="sifre2" value="" class="form_element"/>
	  <span id="availability_statusm"></span>
    </div>
	<div class="style_form"></br>
      <input name="submit" type="submit" value="Bilgilerimi Güncelle" data-theme="a"  id="submit_btn" />
    </div>
  </form>
</div>


<?php
if(isset($_POST["submit"]))
{
    $kadii=@$_POST["username"];
	$sifre1i=@$_POST["sifre1"];
	$sifre2i=@$_POST["sifre2"];


		if($sifre1i==$sifre2i){
		  $yenisifre=crc32(sha1(md5(md5(sha1($sifre1i)))));
				/* echo "<script>alert(\"Kullanıcı Adı sana ait zaten \")</script>";*/
				 mysql_query("update uye set sifre='$yenisifre' WHERE kadi='$kadi'");
				 echo '<script>document.location.replace("anasayfa.php");</script>';			
		} else
        { echo "<script>alert(\"Sifreler uyusmuyor ! \")</script>";
            echo '<script>document.location.replace("sifredegistir.php");</script>';}
}

?>




</body>
</html>


