<?php
session_start();
include('database_connection.php');
require_once('session.php');
require_once('tema.php');
$id_cek=@$_GET["Git2"];
 ?>
<head>
    <META http-equiv=content-type content=text/html;charset=utf-8>
    <link href="form.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png"> 
	<link rel="stylesheet" type="text/css" href="css/<?php echo $temacss; ?>.css" />
	<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.js"></script>
	<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.mobile.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Varela&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script language=" JavaScript" >
    function yenile()
    {
    window.location.reload();
    }
    </script>
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
		/* custom icons */
	</style>
</head>
	<Body onLoad="yenile()" >
<?php


$kulidceksorgu=mysql_query("select * from uye u where u.kadi='$kadi'");
$kulidyaz=mysql_fetch_array($kulidceksorgu);
$kulidyazdeger=$kulidyaz['id'];



$sor=mysql_query("select * from notlar where id='$id_cek' and ekleyen_id='$kulidyazdeger'");



$yaz=@mysql_fetch_array(@$sor);
$tarih=$yaz['tarih'];
$baslik=$yaz['baslik'];
$icerik=$yaz['icerik'];
$ekleyeninidsi=$yaz['ekleyen_id'];


echo "<!-- Home -->
<div data-role=\"page\" id=\"page1\">
    <div data-theme=\"a\" data-role=\"header\">
       <a data-role=\"button\" data-transition=\"slide\" href=\"oku.php?Git=$id_cek\"
        data-icon=\"arrow-l\" data-iconpos=\"left\" class=\"ui-btn-left\">
            Geri
        </a>
	   
	    <h3>
            Güncelle
        </h3>
    </div>
    <div data-role=\"content\">
        <form action=\"duzenle.php?iddeger=$id_cek\" method=\"post\" data-ajax=\"false\">
            <div data-role=\"fieldcontain\">
                <input name=\"baslik\" id=\"textinput1\" placeholder=\"\" value=\"$baslik\" type=\"text\">
            </div>
            <div data-role=\"fieldcontain\">
                <textarea name=\"icerik\" style=\"height:200px;\"; rows=\"4\" id=\"icerik\" cols=\"45\" rows=\"5\">$icerik</textarea>
            </div>
            <input type=\"submit\" name=\"button\" data-theme=\"d\" value=\"Güncelle\" data-mini=\"false\">
        </form>
		
		 <div data-theme=\"a\" data-role=\"footer\" data-position=\"fixed\">
        <h5>
            <div style=\"font-size:12px; margin-top:3px;\">Son Güncelleme: $tarih</div>
        </h5>
    </div>
    </div>
</div>";










/*echo "<div style=\"margin-top:0px; margin-right:auto; width:100%; position:absolute; z-index:0; margin-left:auto; vertical-align: middle;\"><img src=\"notheader.png\" height=\"43px\" width=\"100%\"></div>";
echo "<div style=\"position:absolute; font-size:16px; font-weight:bold; text-shadow: 0 0 8px #000000; font-family: 'Varela', sans-serif; color:#fff; margin-top:12px; z-index:9999;\"><center>Notunuzu Güncelleyin</center><div>";

echo "
<div style=\"margin-top:50px; margin-left:15px; margin-right:15px;\">
<div style=\"margin-top:5px; color:#000; margin-right:15px; opacity:.7; font-family: 'Varela', sans-serif; font-size:11px;\">Son güncelleme tarihi: $tarih </div>
<hr>
<form name=\"form1\" method=\"post\" action=\"duzenle.php?iddeger=$id_cek\">
	<input type=\"text\" name=\"baslik\" value=\"$baslik\" id=\"baslik\">
	<textarea name=\"icerik\" style=\"height:200px;\"; rows=\"4\" id=\"icerik\" cols=\"45\" rows=\"5\">$icerik</textarea>
	
	<input type=\"submit\" name=\"button\" data-theme=\"a\" id=\"button\" value=\"Güncelle\">
</form>
</div>
";*/



$deger=@$_GET["iddeger"];
if(isset($_POST["button"]))

{

$tarih =date("Y-m-d H:i:s");
$baslik=@$_POST["baslik"];
$icerik=@$_POST["icerik"];

	if($baslik=="")
	{
	echo "<script>alert(\"!!!Başarısız Güncelleme\")</script>";
	
	}
	else{
			$guncelle=mysql_query("update notlar set baslik='$baslik',icerik='$icerik',tarih='$tarih' where id='$deger' and ekleyen_id='$kulidyazdeger'");
			
				if($guncelle)
				{
				echo "<script>alert(\"Güncelleme Başarılı\")</script>";
				echo '<script>document.location.replace("anasayfa.php");</script>';
				}
				
				else
				{
				echo "<script>alert(\"!! Güncelleme Başarısız. İzin yok\")</script>";
				echo '<script>document.location.replace("duzenle.php?Git=$deger");</script>';
				}
			
			
		}

	

}

?>