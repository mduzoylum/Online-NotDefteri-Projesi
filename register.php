<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META http-equiv=content-type content=text/html;charset=utf-8>
<title>Üye Kayıt</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no"> 
<link rel="stylesheet" type="text/css" href="css/jquery.mobile.flatui.css" />
<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.js"></script>
<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.mobile.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
<script>
$(document).bind( "mobileinit", function(event) {
    $.extend($.mobile.zoom, {locked:true,enabled:false});
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
        <h4>
            Not ekle sistemini kullanabilmek için üye olman gerekiyor.
        </h4><hr>
        <h5>
            Gerekli alanları doğru bir şekilde doldurarak üye kaydını tamamlayabilirsin. Sistem kötü <br>kullanıcılara karşı Mail Aktivasyonu ile güçlendirilmiştir. 
        </h5>
    
<div id="content">
  <form action="register.php" method="post">
    <div class="style_form">
      <input type="text" name="username" id="username" placeholder="Kullancı Adı" class="required" minlength="5" class="form_element"/>
      <span id="availability_status"></span> </div>
    <div class="style_form">
      <input type="text" name="adi" id="adi" placeholder="İsim Soyisim" class="required" minlength="5" class="form_element"/>
    </div>
    <div class="style_form">
      <input type="password" name="sifre" id="sifre" placeholder="Şifre" class="required" minlength="6" class="form_element"/>
    </div>
	 <div class="style_form">
      <input type="password" name="sifretek" id="sifretek" class="required" minlength="6" placeholder="Tekrar Şifre" class="form_element"/>
    </div>
	 <div class="style_form">
      <input type="text" name="mail" id="mail" placeholder="E-Posta" class="form_element"/>
	  <span id="availability_statusm"></span>
    </div>
	<div class="style_form">
      <input name="submit" type="submit" value="Kayıt Ol" data-theme="a"  id="submit_btn" />
    </div>
  </form>
</div>

<?php
if(isset($_POST["submit"]))
{
require("class.phpmailer.php");	
include("database_connection.php");
$kadi=@$_POST["username"];
$adi=@$_POST["adi"];
$sifre=@$_POST["sifre"];
$sifretekrar=@$_POST["sifretek"];
$eposta=@$_POST["mail"];


if($kadi=="" or $adi=="" or $sifre=="" or $sifretekrar=="" or $eposta=="")
{
  echo "<script>alert(\"Bos alan birakmayiniz\")</script>";  
}
else if($sifre!=$sifretekrar)
{
    echo "<script>alert(\"Şifreleriniz Uyusmuyor\")</script>";
}
else if(strlen($sifre)  <= 3 or strlen($sifretekrar)  <= 3 )
{
    echo "<script>alert(\"Şifreniz En Az 4 karakterli olmalidir\")</script>";
}
else
{

$sifuret=crc32(sha1(md5(md5(sha1($sifre)))));
$baslangicturu=false;
$ekle=mysql_query("INSERT INTO uye(kadi,adi,sifre,mail,aktif,baslangicturu)VALUES('".$kadi."','".$adi."','".$sifuret."','".$eposta."',0,'".$baslangicturu."')");
						
/**************************************/
$kontrol = mysql_query("SELECT * FROM uye WHERE mail='$eposta'");		
$uye = mysql_fetch_array($kontrol);
$uyeId = $uye['id']; 
$unuttumKontrol = mysql_query("SELECT * FROM aktifet WHERE uyeId='$uyeId'");
if(mysql_num_rows($unuttumKontrol)!=0){
$unuttumVar = mysql_fetch_array($unuttumKontrol);
$baslik = $adi.", Hesabını Doğrula";
$icerik = "<a href=\"localhost/onay?kod={$unuttumVar['unuttumHash']}\" target=\"_blank\">Hesabınızı doğrulamak için tıklayınız</a>";}
/**************************************/								
                                        
                                        
                                        
                                        $ekzaman = time();
										$hashHazirlik = $uyeId.$eposta.$ekzaman;
										$hash = md5($hashHazirlik);
										mysql_query("INSERT INTO aktifet (aktifHash,uyeId) VALUES ('$hash','$uyeId')");
								 
										$baslik = $adi.", Hesabını Doğrula";
										$icerik = "
										<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
										<html xmlns=\"http://www.w3.org/1999/xhtml\">
										<head>
										<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
										<title>Demystifying Email Design</title>
										<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
										</head>
										<body style=\"margin: 0; padding: 0;\">
											<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">	
												<tr>
													<td style=\"padding: 10px 0 30px 0;\">
														<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border: 1px solid #cccccc; border-collapse: collapse;\">
															<tr>
																<td align=\"center\" bgcolor=\"#F1F1F1\" style=\"padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;\">
																	<img src=\"http://www.notdefter.in/mail/images/logo2.png\" alt=\"Notdefter.in\" style=\"display: block;\" />
																</td>
														  </tr>
															<tr>
																<td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\">
																	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
																		<tr>
																			<td style=\"color: #153643; font-family: Arial, sans-serif; font-size: 24px;\">
																				<h6><b>Lütfen Notdefter.in Hesabını Doğrula</b></h6>
																			</td>
																		</tr>
																		<tr>
																			<td style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">Hesabını doğruladığında <strong><b>Notdefter.in</b>'e tam erişim</strong> hakkın olacak ve bundan sonra tüm bildirimler bu e-posta adresine gönderilecektir.</td>
																		</tr>
																		<tr>
																			<td><span style=\"padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;\"><a href=\"localhost/onay?kod={$hash}\"><img src=\"localhost/mail/images/link.jpg\" alt=\"Hesabını şimdi doğrula\" style=\"display: block;\" /></a></span></td>
																		</tr>
																		<tr>
																		  <td>&nbsp;</td>
																	  </tr>
																		<tr>
																		  <td><p><span style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">Veya aşağıdaki bağlantıya tıkla:</span><br />                                  
																		  <a href=\"localhost/onay?kod={$hash}\" target=\"_blank\">localhost/onay?kod={$hash}</a></p></td>
																	  </tr>
																	</table>
																</td>
															</tr>
															<tr>
																<td bgcolor=\"#b4110d\" style=\"padding: 30px 30px 30px 30px;\">
																	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
																		<tr>
																			<td style=\"color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;\" width=\"75%\">
																				Notdefter.in Ekibi <br/>Tüm Hakları Saklıdır &reg;</td>
																			<td align=\"right\" width=\"25%\">
																				<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
																					<tr>
																						<td style=\"font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;\">
																							<a href=\"http://www.twitter.com/\" style=\"color: #ffffff;\">
																								<img src=\"http://www.notdefter.in/mail/images/tw.jpg\" alt=\"Twitter\" width=\"38\" height=\"38\" style=\"display: block;\" border=\"0\" />
																							</a>
																						</td>
																						<td style=\"font-size: 0; line-height: 0;\" width=\"20\">&nbsp;</td>
																						<td style=\"font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;\">
																							<a href=\"http://www.twitter.com/\" style=\"color: #ffffff;\">
																								<img src=\"http://www.notdefter.in/mail/images/face.jpg\" alt=\"Facebook\" width=\"38\" height=\"38\" style=\"display: block;\" border=\"0\" />
																							</a>
																						</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																	</table>
																</td>
														  </tr>
														</table>
													</td>
												</tr>
											</table>
										</body>
										</html> ";
                                        
								  
								$mail = new PHPMailer();
								$mail->IsSMTP();                                   // send via SMTP
								$mail->Host     = "mail.notdefter.in"; // SMTP Sunucusu / Kendi alan adiniza uyarlayiniz
								$mail->SMTPAuth = true;     // SMTP Dogrulama / Bu bölümü degistirmeyiniz
								$mail->Username = "iletisim@notdefter.in";  // SMTP kullanici adi yani Email adresiniz
								$mail->Password = "Sefer.123"; // Email adresinizin sifresi
								
								$mail->From     = "iletisim@notdefter.in"; // Email adresiniz
								$mail->FromName = "Notdefter.in";
								$mail->AddAddress($eposta); // Mesajin gidecegi email adresi
								$mail->AddReplyTo("iletisim@notdefter.in");
								$mail->ContentType = "text/html";
								$mail->Charset = "utf-8";
								$mail->Headers = "charset=utf-8";
								$mail->Subject  = $adi.", Hesabını Doğrula";
								$mail->Body     = $icerik;
							
									if(!$mail->Send())
									{
										exit;
										
									}
									
										  
								echo '<script>document.location.replace("uyari");</script>';
							
				

}
}

?>




</body>
</html>


