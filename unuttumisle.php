<?php
require("class.phpmailer.php");
include('database_connection.php');


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

$eposta = mysql_real_escape_string($_POST['eposta']);
 

 
$kontrol = mysql_query("SELECT * FROM uye WHERE mail='$eposta'");
$uye = mysql_fetch_array($kontrol);
     $uyeId = $uye['id'];
	 $isimsoyisin = $uye['adi'];
	 $kuladin = $uye['kadi'];
     
        $ekzaman = time();
        $hashHazirlik = $uyeId.$eposta.$ekzaman;
        $hash = crc32(sha1(md5(md5(sha1($hashHazirlik)))));
        mysql_query("INSERT INTO sifremiunuttum (unuttumHash,uyeId) VALUES ('$hash','$uyeId')");
        $baslik = "Parola değiştir";
        $icerik = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
<title>Şifreni Sıfırla</title>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
</head>
<body style=\"margin: 0; padding: 0;\">
	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">	
		<tr>
			<td style=\"padding: 10px 0 30px 0;\">
				<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border: 1px solid #cccccc; border-collapse: collapse;\">
					<tr>
						<td align=\"center\" bgcolor=\"#F1F1F1\" style=\"padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;\">
							<img src=\"localhost/mail/images/logo2.png\" alt=\"Notdefter.in\" width=\"164\" height=\"149\" style=\"display: block;\" />
						</td>
				  </tr>
					<tr>
						<td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
								<tr>
									<td style=\"color: #153643; font-family: Arial, sans-serif; font-size: 24px;\">
							        <h6>Şifreni mi unuttun, $isimsoyisin?									</h6></td>
								</tr>
								<tr>
									<td style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">&quot;$kuladin&quot; kullanıcı adlı Notdefter.in hesabınızın şifresini sıfırlamak istediğinize dair bir ileti alındı.</td>
								</tr>
								<tr>
									<td><span style=\"padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;\"><a href=\"localhost/yeni?kod={$hash}\"><img src=\"localhost/mail/images/link2.jpg\" alt=\"Şifrenizi sıfırlamak için tıklayın\" style=\"display: block;\" /></a></span></td>
								</tr>
								<tr>
								  <td>&nbsp;</td>
							  </tr>
								<tr>
								  <td><p><span style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">Veya şifreni sıfırlamak için aşağıdaki bağlantıya tıkla:</span><br />                                  
				                  <a href=\"localhost/yeni?kod={$hash}\" target=\"_blank\">localhost/yeni?kod={$hash}</a></p></td>
							  </tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor=\"#b4110d\" style=\"padding: 30px 30px 30px 30px;\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
								<tr>
									<td style=\"color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;\" width=\"75%\">
									    Notdefter.im Ekibi <br/>
Tüm Hakları Saklıdır &reg;</td>
									<td align=\"right\" width=\"25%\">
										<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
											<tr>
												<td style=\"font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;\">
													<a href=\"http://www.twitter.com/\" style=\"color: #ffffff;\">
														<img src=\"localhost/mail/images/tw.jpg\" alt=\"Twitter\" width=\"38\" height=\"38\" style=\"display: block;\" border=\"0\" />
													</a>
												</td>
												<td style=\"font-size: 0; line-height: 0;\" width=\"20\">&nbsp;</td>
												<td style=\"font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;\">
													<a href=\"http://www.twitter.com/\" style=\"color: #ffffff;\">
														<img src=\"localhost/mail/images/face.jpg\" alt=\"Facebook\" width=\"38\" height=\"38\" style=\"display: block;\" border=\"0\" />
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
</html>";
        
		  
$mail = new PHPMailer();
$mail->IsSMTP();                                   // send via SMTP
$mail->Host     = "mail.notdefter.in"; // SMTP Sunucusu / Kendi alan adiniza uyarlayiniz
$mail->SMTPAuth = true;     // SMTP Dogrulama / Bu bölümü degistirmeyiniz
$mail->Username = "iletisim@notdefter.in";  // SMTP kullanici adi yani Email adresiniz
$mail->Password = "Sefer.123"; // Email adresinizin sifresi

$mail->From     = "iletisim@notdefter.in"; // Email adresiniz
$mail->FromName = "Notdefter.in Sistem Mesajı";
$mail->AddAddress($eposta); // Mesajin gidecegi email adresi
$mail->AddReplyTo("iletisim@notdefter.in");
$mail->ContentType = "text/html";
$mail->Charset = "utf-8";
$mail->Headers = "charset=utf-8";
$mail->Subject  = "Yeni Şifre Onayı";
$mail->Body     = $icerik;

if(!$mail->Send())
{
   exit;
}
		  echo "<div data-role=\"page\" id=\"page1\">
			<div data-theme=\"a\" data-role=\"header\">
				<h3>
					Şifre Sıfırlama
				</h3>
			</div>
			<div data-role=\"content\">
				<h4>
					E-posta adresine şifre sıfırlama talimatlarını gönderdik.
				</h4>
				<h5>
					Eğer açıklamalar birkaç dakika içinde ulaşmazsa, e-posta hesabının spam
					ve istenmeyen filtrelerini kontrol et.
				</h5>
				<a data-role=\"button\" data-inline=\"true\" data-transition=\"flow\" data-theme=\"a\"
				href=\"giris.php\">
					Giriş Yap
				</a>
			</div>
		</div>";

?>



</body>
</html>