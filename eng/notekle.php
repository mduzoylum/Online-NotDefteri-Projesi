<?php
session_start();
include('database_connection.php');
include('session.php');
require_once('tema.php');
$sorgux=mysql_query("select * from uye where kadi='$kadi'");
$sorguyazx=mysql_fetch_array($sorgux);
echo $id=@$sorguyazx['id'];


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
<body>






<?php 







echo "<!-- Home -->
<div data-role=\"page\" id=\"page1\">
    <div data-theme=\"a\" data-role=\"header\">
	<a data-role=\"button\" data-transition=\"slide\" href=\"anasayfa.php\"
        data-icon=\"arrow-l\" data-iconpos=\"left\" class=\"ui-btn-left\">
            Back
        </a>
        <h3>
            Add Note
        </h3>
    </div>
    <div data-role=\"content\">
        <form action=\"notekle.php\" method=\"post\" data-ajax=\"false\">
            <div data-role=\"fieldcontain\">
                <input name=\"baslik\" id=\"textinput1\" placeholder=\"Note Header\" type=\"text\">
            </div>
            <div data-role=\"fieldcontain\">
                <textarea name=\"icerik\" style=\"height:200px;\"; rows=\"4\" placeholder=\"Note contet (Max 3000 character)\" id=\"icerik\" cols=\"45\" rows=\"5\">$icerik</textarea>
            </div>
            <input type=\"submit\" name=\"button\" data-theme=\"d\" value=\"Save\" data-mini=\"false\">
        </form>
    </div>
</div>";



/*
echo "<div style=\"margin-top:0px; width:100%; margin-right:auto; position:fixed; z-index:0; margin-left:auto; vertical-align: middle;\"><img src=\"notheader.png\"  width=\"800\" height=\"43px\"></div>";
echo "<div style=\"position:absolute; font-size:16px; font-weight:bold; text-shadow: 0 0 8px #000000; font-family: 'Varela', sans-serif; color:#fff; margin-top:12px; z-index:9999;\"><center>Notunuzu Bırakın</center><div>";
echo "
<div style=\"margin-top:50px; margin-left:15px; margin-right:15px;\">
<form name=\"form1\" method=\"post\" action=\"notekle.php?Git=$id\">
	<input type=\"text\" name=\"baslik\" placeholder=\"Not Başlığı\" id=\"baslik\">
	<textarea name=\"icerik\" style=\"height:200px;\"; rows=\"4\" placeholder=\"Not İçeriği (Max 3000 karakter)\" id=\"icerik\" cols=\"45\" rows=\"5\"></textarea>
	<input type=\"submit\" name=\"button\" data-theme=\"a\" id=\"button\" value=\"Kaydet\">
</form>
</div>
";*/






if(isset($_POST["button"]))
{


$baslik=$_POST["baslik"];
$icerik=$_POST["icerik"];
	if($baslik=="")
	{
	echo "<script>alert(\"Do not leave blank Header\")</script>";
	}
	elseif($icerik=="")
	{
	echo "<script>alert(\"Do not leave blank content\")</script>";
	}
	else
	{	
		$sadecetarih = date("Y-m-d");
		$tarih =date("Y-m-d H:i:s");
		$ekle=mysql_query("insert into notlar(ekleyen_id,baslik,icerik,tarih,sadece_tarih) values('$id','$baslik','$icerik','$tarih','$sadecetarih')");
		/*if($ekle)
		{
		echo "<script>alert(\"Adding successful\")</script>";*/
	//GOTO("anasayfa.php");?>
    
    <meta http-equiv="refresh" content="0;URL='anasayfa.php'">
    
    <?php
		/*}
		else
		{
		echo "<script>alert(\"Unsuccessful!!!\")</script>";
		}
*/
	}

}


?>
</body>