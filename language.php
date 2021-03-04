<?php 
session_start();
include('database_connection.php');
include('session.php');

$sor=mysql_query("SELECT * FROM uye u where u.kadi='$kadi'");
while($yaz=mysql_fetch_array($tursor))
{
    $id_dil=$yaz['dil'];
    
}
if($id_dil==0)
{
    $id_dil=1;
}
else if($id_dil==1)
{
    $id_dil=0;
}
$guncelle=mysql_query("UPDATE uye SET dil=$id_dil WHERE uye.kadi='$kadi'");

    echo '<script>document.location.replace("anasayfa.php");</script>';



?>
</body>
</html>