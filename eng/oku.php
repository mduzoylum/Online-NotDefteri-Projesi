<?php 
session_start();
include('database_connection.php');
require_once('session.php');
require_once('tema.php');
?>
<!DOCTYPE html> 
<html> 
<head> 
	<title>Giriş Yap</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8>
    <meta http-equiv=content-type content=text/html;charset=windows-1254>
	<meta http-equiv=content-type content=text/html;charset=x-mac-turkish>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no">  
	<link rel="stylesheet" type="text/css" href="css/<?php echo $temacss; ?>.css" />
	<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.js"></script>
	<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.mobile.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
 <style>
	.hr {
	border: 0;
	padding:0px;
	margin-top:-8px;
	margin-bottom:-8px;
	color: #f00;
	opacity:.5;
		}
	.hrl {
	  border: 0;
	  padding:0px;
	  margin-top:-8px;
	  margin-bottom:-8px;
	  color: #000;
	  opacity:.1;
		}
</style>
</head>
<Body onLoad="yenile()">

<?php


$kulidceksorgu=mysql_query("select * from uye u where u.kadi='$kadi'");
$kulidyaz=mysql_fetch_array($kulidceksorgu);
$kulidyazdeger=$kulidyaz['id'];

$idcek=$_GET["Git"];
echo "<table width=\"20%\" border=\"0\" align=\"center\">";
$sor=mysql_fetch_array(mysql_query("select * from notlar where id='$idcek' and ekleyen_id='$kulidyazdeger' "));
if(!$sor)
{
    echo "<script>alert(\"İzniniz Olmayan Biryere Erişmeye Çalışıyorsunuz!!\")</script>";
    echo '<script>document.location.replace("anasayfa.php");</script>';
}
$baslik=$sor['baslik'];
$icerik=$sor['icerik'];
$tarih=$sor['tarih'];

echo "<!-- Home -->
<div data-role=\"page\" id=\"oku\">
    <div data-theme=\"a\" data-role=\"header\">
        <a data-role=\"button\" data-transition=\"slide\" href=\"anasayfa.php\"
        data-icon=\"arrow-l\" data-iconpos=\"left\" class=\"ui-btn-left\">
            Geri
        </a>
        <a data-role=\"button\" data-transition=\"flip\" href=\"duzenle.php?Git2=$idcek\"
        data-icon=\"flat-new\" data-iconpos=\"left\" class=\"ui-btn-right\">
            Düzelt
        </a>
        
        <h3>
            $baslik
        </h3>
    </div>
    <div data-role=\"content\">
        <h5>
            $icerik
        </h5>
    </div>
	<div data-theme=\"a\" data-role=\"footer\" data-position=\"fixed\">
        <h5>
            <div style=\"font-size:12px; margin-top:3px;\">Son Güncelleme: $tarih</div>
        </h5>
    </div>
</div>
";
?>
</body>