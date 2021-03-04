<?php ob_start();session_start(); 

echo "
<head> 
	<title>Admin</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8></head>
<center>
<form action=\"admingiris.php\" method=\"post\">
<table border=0>
<tr><td>isim </td><td><input type=\"text\" name=\"name\"></td></tr>
<tr><td>Şifre </td><td><input type=\"password\" name=\"password\"></td></tr>
<tr><td></td><td><input type=\"submit\" name=\"giris\" value=\"Giriş\"></td></tr>
</table>
</form>
</center>";


if(isset($_POST["giris"]))
{
    $name=$_POST["name"];
    $password=$_POST["password"];
    
    if($name=="adminler" and $password=="8520")
    {
        $_SESSION["admin"]=$name;
        echo '<script>document.location.replace("admin.php");</script>';
    }
    else{
         echo "<script>alert(\"İzninizin olmadığı bir alan erişmeye çalışıyorsunuz.3 Yanlıştan sonraki IP Banlanacaktır!!\")</script>";
    }
}




?>