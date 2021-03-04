<?php 
ob_start();
session_start();
include("database_connection.php");
?>
<html>
<head>
<body>
<?php
$kadi=@$_POST["kadi"];
$sifre=@$_POST["sifre"];
$hatirla=@$_POST["beniHatirla"];
$aktifmi=mysql_query("SELECT * FROM uye u where u.kadi='$kadi'");
while($aktifyaz=mysql_fetch_array($aktifmi))
{$aktiflik=$aktifyaz['aktif'];
$aktifipcekkk=$aktifyaz['aktif_ip'];}
$yenisifre=crc32(sha1(md5(md5(sha1($sifre)))));
    
    

	if($kadi=="")
	{
	echo "<script>alert(\"Your username do not leave blank\")</script>";
	echo '<script>document.location.replace("giris");</script>';
	}
	elseif ($sifre=="")
	{
	echo "<script>alert(\"Your password do not leave blank\")</script>";
	echo '<script>document.location.replace("giris");</script>';
	}
	elseif($aktiflik=="0")
	{
		echo '<script>document.location.replace("uyari0");</script>';	
	}
	else
	{
	$sor=mysql_query("SELECT * FROM uye where kadi='".$kadi."' and sifre='".$yenisifre."'")or die("Now! There was a problem in the database.Please Try Again Later!");
	
		if(mysql_num_rows($sor))
		{
			if($hatirla=="on")
			{
				setcookie("kullanici",$kadi,time()+36000);
			}
			else
			{
				$_SESSION['kullanici']=$kadi;
			}
			$aktifip = $_SERVER['REMOTE_ADDR'];
			$aktifipyaz=mysql_query("update uye set aktif_ip='$aktifip',son_ip='$aktifipcekkk' where kadi='$kadi'");
			echo '<script>document.location.replace("notlar");</script>';
		}
		else
		{
			echo "<script>alert(\"Didnt find record \")</script>";
			echo '<script>document.location.replace("giris");</script>';
		}		
	}

?>
</body>
</html>