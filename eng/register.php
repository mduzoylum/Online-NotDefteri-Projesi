<?php 
include("database_connection.php"); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META http-equiv=content-type content=text/html;charset=utf-8>
<title>User Register</title>
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
$("#availability_status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking...');


$.ajax({  
    type: "POST",  
    url: "ajax_check_username.php",
    data: "username="+ username,
    success: function(server_response){  
   
   $("#availability_status").ajaxComplete(function(event, request){ 

	if(server_response == '0') 
	{ 
	$("#availability_status").html('<img src="available.png"><div style="margin-top:-20px; margin-left:30px;"><font color="Green"> Usable </font></div>  ');

	}  
	else  if(server_response == '1')
	{  
	 $("#availability_status").html('<img src="not_available.png"> <div style="margin-top:-20px; margin-left:30px;"><font color="red"> Previously Received</font></div>');
	}  
   
   });
   } 
   
  }); 

}
else
{

$("#availability_status").html('<img src="not_available.png"> <div style="margin-top:-20px; margin-left:30px;"><font color="#cc0000">Username Very Short(Min. 5 character)</font></div>');
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
$("#availability_statusm").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking...');


$.ajax({  
    type: "POST",  
    url: "ajax_check_mail.php",
    data: "mail="+ mail,
    success: function(server_response){  
   
   $("#availability_statusm").ajaxComplete(function(event, request){ 

	if(server_response == '0') 
	{ 
	$("#availability_statusm").html('<img src="available.png" > <div style="margin-top:-20px; margin-left:30px;"><font color="Green"> Usable </font></div>  ');

	}  
	else  if(server_response == '1')
	{  
	 $("#availability_statusm").html('<img src="not_available.png"> <div style="margin-top:-20px; margin-left:30px;"><font color="red"> Previously Received :( </font></div>');
	}  
	else  if(server_response == '2')
	{  
	 $("#availability_statusm").html('<img src="not_available.png" > <div style="margin-top:-20px; margin-left:30px;"><font color="red"> Invalid Email Address </font></div>');
	} 
   
   });
   } 
   
  }); 

}
else
{
$("#availability_statusm").html('<img src="not_available.png" align="absmiddle"> <font color="#cc0000">Mail Very Short</font>');
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
Add notes need to be a member to use the system.
        </h4><hr>
        <h5>
            By filling in the required fields correctly can complete record. System against<br> worse users activation is powered by Mail. 
        </h5>
    
<div id="content">
  <form action="register.php" method="post">
    <div class="style_form">
      <input type="text" name="username" id="username" placeholder="User Name" class="required" minlength="5" class="form_element"/>
      <span id="availability_status"></span> </div>
    <div class="style_form">
      <input type="text" name="adi" id="adi" placeholder="Name and Surname" class="required" minlength="5" class="form_element"/>
    </div>
    <div class="style_form">
      <input type="password" name="sifre" id="sifre" placeholder="Password" class="required" minlength="6" class="form_element"/>
    </div>
	 <div class="style_form">
      <input type="password" name="sifretek" id="sifretek" class="required" minlength="6" placeholder="Repeat Password" class="form_element"/>
    </div>
	 <div class="style_form">
      <input type="text" name="mail" id="mail" placeholder="E-Mail" class="form_element"/>
	  <span id="availability_statusm"></span>
    </div>
	<div class="style_form">
      <input name="submit" type="submit" value="Create account" data-theme="a"  id="submit_btn" />
    </div>
  </form>
</div>


<?php
if(isset($_POST["submit"]))
{
$kadi=@$_POST["username"];
$adi=@$_POST["adi"];
$sifre=@$_POST["sifre"];
$sifretekrar=@$_POST["sifretek"];
$eposta=@$_POST["mail"];
$baslangicturu="true";

$sifuret=crc32(sha1(md5(md5(sha1($sifre)))));

if($sifre!=$sifretekrar)
	{
	echo "<script>alert(\"Passwords do not match\")</script>";
	}
	elseif(strlen($sifre)  <= 5 )
			{
				echo "<script>alert(\"Your password must be at least 6 characters.\")</script>";
			}
	elseif(strlen($sifretekrar)  <= 5 )
			{
				echo "<script>alert(\"Your password must be at least 6 characters.\")</script>";
			}
	else{
		
			if($kadi=="")
			{
				echo "<script>alert(\"Please do not leave blank Username\")</script>";
			}
			elseif($adi=="")
			{
				echo "<script>alert(\"Please do not  leave blank name\")</script>";
				
			}
			elseif($sifre=="" or $sifretekrar=="")
			{
				echo "<script>alert(\"Please do not leave blank password\")</script>";
				
			}
			
			elseif($eposta=="")
			{
				echo "<script>alert(\"Please do not leave blank mail address\")</script>";
				
			}
			elseif ( !filter_var($eposta, FILTER_VALIDATE_EMAIL) )
			{
			echo "<script>alert(\"Incorrect Email Address!!\")</script>";
			}
			
				else{
						$kisi=mysql_query("select * from uye where kadi='$kadi' or mail='$eposta'");
						if(mysql_num_rows($kisi)>0)
						{
							echo "<script>alert(\"Users already registered.\")</script>";
						}
						else
						{
						$ekle=mysql_query("INSERT INTO uye(kadi,adi,sifre,mail,aktif,baslangicturu)VALUES('$kadi','$adi','$sifuret','$eposta',0,'$baslangicturu')");
						
							if($ekle)
							{
								echo '<script>document.location.replace("uyari");</script>';
								require("class.phpmailer.php");
								function tr_converter($uri) {
								$uri = str_replace ("Ã¼","ü",$uri);
								$uri = str_replace ("äÿ","ğ",$uri);
								$uri = str_replace ("Ä±","ı",$uri);
								$uri = str_replace ("åÿ","ş",$uri);
								$uri = str_replace ("Ã¶","ö",$uri);
								$uri = str_replace ("Ãœ","Ü",$uri);
								$uri = str_replace ("ÄŸ","Ğ",$uri);
								$uri = str_replace ("Ä°","İ",$uri);
								$uri = str_replace ("Å","Ş",$uri);
								$uri = str_replace ("Ã‡","Ç",$uri);
								$uri = str_replace ("Ã–","Ö",$uri);
								$uri = str_replace ("ã§","ç",$uri);
								$uri = strtolower($uri);
								 return $uri;
							}
							 
							$kontrol = mysql_query("SELECT * FROM uye WHERE mail='$eposta'");
							if(mysql_num_rows($kontrol)==0)
							{
								 echo "This e-mail address, we do not have a member with.";
							}
							else
							{
								$uye = mysql_fetch_array($kontrol);
								$uyeId = $uye['id']; 
								$unuttumKontrol = mysql_query("SELECT * FROM aktifet WHERE uyeId='$uyeId'");
								if(mysql_num_rows($unuttumKontrol)!=0){
								$unuttumVar = mysql_fetch_array($unuttumKontrol);
								$baslik = $adi.", Verify Account";
								$icerik = "<a href=\"http://www.notdefter.in/onay?kod={$unuttumVar['unuttumHash']}\" target=\"_blank\">Click here to verify your account</a>";
							}
								else
								{
										$ekzaman = time();
										$hashHazirlik = $uyeId.$eposta.$ekzaman;
										$hash = md5($hashHazirlik);
										mysql_query("INSERT INTO aktifet (aktifHash,uyeId) VALUES ('$hash','$uyeId')");
								 
										$baslik = $adi.", Verify Account";
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
																				<h6><b>Please Notdefter.in Verify Account</b></h6>
																			</td>
																		</tr>
																		<tr>
																			<td style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">When Verify Account<strong><b>Notdefter.in</b> full access</strong> all notices will be right and then will be sent to this e-mail address.</td>
																		</tr>
																		<tr>
																			<td><span style=\"padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;\"><a href=\"http://www.notdefter.in/onay?kod={$hash}\"><img src=\"http://www.notdefter.in/mail/images/link.jpg\" alt=\"Verify your account now\" style=\"display: block;\" /></a></span></td>
																		</tr>
																		<tr>
																		  <td>&nbsp;</td>
																	  </tr>
																		<tr>
																		  <td><p><span style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">Or click on the following link:</span><br />                                  
																		  <a href=\"http://www.notdefter.in/onay?kod={$hash}\" target=\"_blank\">http://www.notdefter.in/onay?kod={$hash}</a></p></td>
																	  </tr>
																	</table>
																</td>
															</tr>
															<tr>
																<td bgcolor=\"#b4110d\" style=\"padding: 30px 30px 30px 30px;\">
																	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
																		<tr>
																			<td style=\"color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;\" width=\"75%\"></td>
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
								$mail->Subject  = $adi.", Verify Account";
								$mail->Body     = $icerik;
							
									if(!$mail->Send())
									{
										exit;
									}
										  
								}
							}
					}
				else
				{
					echo "<script>alert(\"An error occurred while creating your registration. Please try again later. #20133 \")</script>";
				}
	}
}
}
}
?>




</body>
</html>


