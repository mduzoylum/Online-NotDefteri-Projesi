<?php
session_start();
include('../database_connection.php');
include('../session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lütfen Bekleyiniz</title>
<script language=" JavaScript" >
function yenile()
{
window.location.reload();
}
</script>

</head>

<Body onLoad="yenile()">

<?php
$temakaydet=$_GET["ok"];
$temaguncelle=mysql_query("update uye set tema='$temakaydet' where kadi='$kadi'");
echo "<script>document.location.replace(\"../anasayfa.php\");</script>";
?>
</body>
</html>
