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
<script type="text/javascript">
$(document).ready(function()
{
$("#username").change(function() 
{ 

var username = $("#username").val();
if(username.length > 4)
{
$("#availability_status").html('<img src="loader.gif" align="absmiddle">&nbsp;Kontrol Ediliyor...');


$.ajax({  
    type: "POST",  
    url: "ajax_check_username.php",
    data: "username="+ username,
    success: function(server_response){  
   
   $("#availability_status").ajaxComplete(function(event, request){ 

	if(server_response == '0') 
	{ 
	$("#availability_status").html('<img src="available.png"><div style="margin-top:-20px; margin-left:30px;"><font color="Green"> Kullanılabilir </font></div>  ');

	}  
	else  if(server_response == '1')
	{  
	 $("#availability_status").html('<img src="not_available.png"> <div style="margin-top:-20px; margin-left:30px;"><font color="red"> Daha Önce Alınmış </font></div>');
	}  
   
   });
   } 
   
  }); 

}
else
{

$("#availability_status").html('<img src="not_available.png"> <div style="margin-top:-20px; margin-left:30px;"><font color="#cc0000">Kullanıcı Adı Çok Kısa(Min. 5 karakter)</font></div>');
}



return false;
});

});



<!------------------------------------------->
$(document).ready(function()
{
$("#mail").change(function() 
{ 

var mail = $("#mail").val();
if(mail.length > 1)
{
$("#availability_statusm").html('<img src="loader.gif" align="absmiddle">&nbsp;Kontrol Ediliyor...');


$.ajax({  
    type: "POST",  
    url: "ajax_check_mail.php",
    data: "mail="+ mail,
    success: function(server_response){  
   
   $("#availability_statusm").ajaxComplete(function(event, request){ 

	if(server_response == '0') 
	{ 
	$("#availability_statusm").html('<img src="available.png" > <div style="margin-top:-20px; margin-left:30px;"><font color="Green"> Kullanılabilir </font></div>  ');

	}  
	else  if(server_response == '1')
	{  
	 $("#availability_statusm").html('<img src="not_available.png"> <div style="margin-top:-20px; margin-left:30px;"><font color="red"> Daha Önce Alınmış :( </font></div>');
	}  
	else  if(server_response == '2')
	{  
	 $("#availability_statusm").html('<img src="not_available.png" > <div style="margin-top:-20px; margin-left:30px;"><font color="red"> Geçersiz Mail Adresi </font></div>');
	} 
   
   });
   } 
   
  }); 

}
else
{
$("#availability_statusm").html('<img src="not_available.png" align="absmiddle"> <font color="#cc0000">Mail Çok Kısa</font>');
}



return false;
});

});
<!------------------------------------------->







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
  <form action="profilduzenle2.php" method="post">
    
    <div style="margin-left:0px; margin-top:8px; position:absolute;">Kullanıcı Adın: </div><div style="margin-left:110px;" class="style_form">
     <?php echo $vkadi?>
     <input type="hidden" name="username" id="username" value="<?php $vkadi ?>" class="required" minlength="5" class="form_element"/>
   
      <span id="availability_status"></span> </div>
      
      
      
    <div style="margin-left:0px; margin-top:17px; position:absolute;">Adın Soyadın: </div> <div style="margin-left:110px;" class="style_form">
      <input type="text" name="adi" id="adi" value="<?php echo $adi?>" class="required" minlength="5" class="form_element"/>
    </div>
    
    <div style="margin-left:0px; margin-top:17px; position:absolute;">Cinsiyetin: </div> <div style="margin-left:110px;" class="style_form">
    <?php if($cinsiyet=="erkek"){echo "<select id=\"cinsiyet\" name=\"cinsiyet\" data-native-menu=\"false\">
                <option value=\"erkek\">
                    Erkek
                </option>
                <option value=\"kadin\">
                    Kadın
                </option>
     </select>";}elseif($cinsiyet==""){echo "<select id=\"cinsiyet\" name=\"cinsiyet\" data-native-menu=\"false\">
                <option value=\"erkek\">
                    Erkek
                </option>
                <option value=\"kadin\">
                    Kadın
                </option>
     </select>";} else{echo"<select id=\"cinsiyet\" name=\"cinsiyet\" data-native-menu=\"false\">
                <option value=\"kadin\">
                    Kadın
                </option>
				<option value=\"erkek\">
                    Erkek
                </option>
     </select>";}?>  
    </div>
    
    <div style="margin-left:0px; margin-top:17px; position:absolute;">Doğum Tarihin: </div><div style="margin-left:110px;" class="style_form">
   <input name="mydate" id="mydate" type="date"  data-role="datebox" data-options='{"mode": "slidebox"}'>
   </div>
    
	 <div style="margin-left:0px; margin-top:17px; position:absolute;">GSM Numaran: </div><div style="margin-left:110px;" class="style_form">
      <input type="tel" name="telefon" id="telefon" minlength="6" <?php if(empty($tel)){echo "placeholder=\"Örn: 0555 555 55 55\"";}else{echo "value=\"$tel\"";}?> class="form_element"/>
    </div>
	 <div style="margin-left:0px; margin-top:17px; position:absolute;">E-mail Adresin: </div><div style="margin-left:110px;" class="style_form">
      <input type="email" name="mail" id="mail" value="<?php echo $eposta ?>" class="form_element"/>
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
//	$kadii=@$_POST["username"];
	$adii=@$_POST["adi"];
	$cinsiyeit=@$_POST["cinsiyet"];
	$telefoni=@$_POST["telefon"];
	$dogumtari=@$_POST["mydate"];
	$epostai=@$_POST["mail"];

		
				 
					
	      
			if($adii=="")
			{
				echo "<script>alert(\"Adınızı Boş Bırakmayın\")</script>";
				
			}
			elseif($epostai=="")
			{
				echo "<script>alert(\"Mail Alanınızı Boş Bırakmayın\")</script>";
				
			}
			elseif ( !filter_var($epostai, FILTER_VALIDATE_EMAIL) )
			{
			echo "<script>alert(\"Yanlış Mail Adresi!!\")</script>";
			} 
            else {
				mysql_query("update uye set adi='$adii', mail='$epostai', tel='$telefoni', dogum='$dogumtari', cinsiyet='$cinsiyeit' WHERE kadi='$kadi'");
				
			}
            
            echo '<script>document.location.replace("anasayfa.php");</script>';
		}

?>




</body>
</html>


