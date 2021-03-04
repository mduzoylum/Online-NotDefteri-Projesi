<?php 

echo "<head> 
	<title>Admin - Şifre Değiştirme</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8></head>";  

include('database_connection.php');

$kadi=$_GET["kadiadi"];


echo "<center>
<form action=\"adminsifredegistirtmm.php?kullanici=$kadi\" method=\"post\"><table border=0>

<tr>
<td>Şifre </td><td><input type=\"text\" name=\"sifre\"></td></tr>

<tr><td></td><td><input type=\"submit\" name=\"submit\" value=\"Güncelle\"></td>
</tr>
</table></form></center>";





?>
</body>