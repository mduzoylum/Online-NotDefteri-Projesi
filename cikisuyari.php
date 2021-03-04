<?php
ob_start();
session_start();
$deger=$_COOKIE["kullanici"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Güncelleme Sonucu</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png"> 
	<link rel="stylesheet" type="text/css" href="css/jquery.mobile.flatui.css" />
	<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.js"></script>
	<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.mobile.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>

<?php 
$prfluyari=$_GET["u"];

if($prfluyari=="1"){
echo "<script>alert(\"Bilgileriniz güncellendi.\")</script>";
echo '<script>document.location.replace("anasayfa.php");</script>';
		
}elseif($prfluyari=="0"){



unset($_SESSION['kullanici']);
setcookie("kullanici",$deger,time()-1);

echo "<script>alert(\"Bilgileriniz güncellendi. Şuan oturumunuz sonlandırılıyor. Sisteme yeni kullanıcı adın ile tekrar giriş yap.\")</script>";
echo '<script>document.location.replace("giris.php");</script>';
}
?>

</body>
</html>