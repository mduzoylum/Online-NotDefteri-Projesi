<!DOCTYPE html> 
<html> 
<head> 
	<title>Giriş Yap</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8>
    <meta http-equiv=content-type content=text/html;charset=windows-1254>
	<meta http-equiv=content-type content=text/html;charset=x-mac-turkish>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no"> 
	<link rel="stylesheet"  href="http://view.jquerymobile.com/1.3.1/dist/demos/css/themes/default/jquery.mobile.min.css">
	<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.js"></script>
	<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.mobile.min.js"></script>
	<script>
		$( document ).on( "pageinit", "#page1", function() {

			$( document ).on( "swipeleft swiperight", "#page1", function( e ) {
				// We check if there is no open panel on the page because otherwise
				// a swipe to close the left panel would also open the right panel (and v.v.).
				// We do this by checking the data that the framework stores on the page element (panel: open).
				if ( $.mobile.activePage.jqmData( "panel" ) !== "open" ) {
					if ( e.type === "swipeleft"  ) {
						$( "#right-panel" ).panel( "open" );
					} else if ( e.type === "swiperight" ) {
						$( "#left-panel" ).panel( "open" );
					}
				}
			});
		});
    </script>
    <style>
		/* Swipe works with mouse as well but often causes text selection. */
		#demo-page * {
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			-o-user-select: none;
			user-select: none;
		}
		/* Arrow only buttons in the header. */
		#demo-page .ui-header .ui-btn {
			background: none;
			border: none;
			top: 9px;
		}
		#demo-page .ui-header .ui-btn-inner {
			border: none;
		}
		/* Content styling. */
		dl { font-family: "Times New Roman", Times, serif; padding: 1em; }
		dt { font-size: 2em; font-weight: bold; }
		dt span { font-size: .5em; color: #777; margin-left: .5em; }
		dd { font-size: 1.25em;	margin: 1em 0 0; padding-bottom: 1em; border-bottom: 1px solid #eee; }
		.back-btn { float: right; margin: 0 2em 1em 0; }
	</style>
</head> 
<body> 

<?php
include('database_connection.php');
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

$hash = mysql_real_escape_string($_GET['kod']);
 
$kontrol = mysql_query("SELECT * FROM sifremiunuttum WHERE unuttumHash='$hash'");
 
if(mysql_num_rows($kontrol)==0){
	$degiskenimiz ="You come to wrong address";
	?>
	
	
	
	<!-- Home -->
<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
        <h3>
            Password Reset
        </h3>
    </div>
    <div data-role="content">
        <h4>
            Reset the password to your e-mail links is disposable.
        </h4>
        <h5>
            <?php 
			
			echo $degiskenimiz;
			
			?>
        </h5>
        <a data-role="button" data-inline="true" data-transition="flow" data-theme="a"
        href="hatirlat">
            Tekrar Şifre İste
        </a>
    </div>
</div>
	
    
<?php
}
else{
    $yeniparola = rand(1000000,10000000);
	
    $parolaHash = crc32(sha1(md5(md5(sha1($yeniparola)))));
 
     $hashBilgi = mysql_fetch_array($kontrol);
     $uyeId = $hashBilgi['uyeId'];
 
     mysql_query("UPDATE uye SET sifre='$parolaHash' WHERE id='$uyeId'");
     mysql_query("DELETE FROM sifremiunuttum WHERE unuttumHash='$hash'");
 
 
     $uyeSorgu = mysql_query("SELECT * FROM uye WHERE id='$uyeId'");
     $uyeBilgi = mysql_fetch_array($uyeSorgu);
     $eposta = $uyeBilgi['mail'];
	 $kadisi = $uyeBilgi['kadi'];
	 $adisi = $uyeBilgi['adi'];
 
 
     $baslik = "Parola değiştirildi";
     $icerik = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
<title>Yeni Şifreniz</title>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
</head>
<body style=\"margin: 0; padding: 0;\">
	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">	
		<tr>
			<td style=\"padding: 10px 0 30px 0;\">
				<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border: 1px solid #cccccc; border-collapse: collapse;\">
					<tr>
						<td align=\"center\" bgcolor=\"#F1F1F1\" style=\"padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;\">
							<img src=\"http://www.notdefter.in/mail/images/logo2.png\" alt=\"Notdefter.in\" width=\"164\" height=\"149\" style=\"display: block;\" />
						</td>
				  </tr>
					<tr>
					  <td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					    <tr>
					      <td style=\"color: #153643; fhttp://www.notdefter.inont-family: Arial, sans-serif; font-size: 24px;\"><h6>Hello again, $adisi </h6></td>
				        </tr>
					    <tr>
					      <td height=\"77\" style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">&quot;$kadisi&quot; called user password is bleow. if you want to change password,after entering the account you change the password in the password change area</td>
				        </tr>
				      </table></td>
				  </tr>
					<tr>
					  <td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\"><table width=\"100%\" border=\"0\">
					    <tr>
					      <td>&nbsp;</td>
					      <td align=\"center\" style=\"color: #ffffff; font-family: Verdana, Geneva, sans-serif; font-size: 14px;\" height=\"34\" width=\"252\" background=\"http://www.notdefter.in/mail/images/link3.jpg\">New Password: <b>$yeniparola</b></td>
					      <td>&nbsp;</td>
				        </tr>
					    </table></td>
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
</html>";

	$Mesaj= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
<title>Yeni Şifreniz</title>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
</head>
<body style=\"margin: 0; padding: 0;\">
	<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">	
		<tr>
			<td style=\"padding: 10px 0 30px 0;\">
				<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\" style=\"border: 1px solid #cccccc; border-collapse: collapse;\">
					<tr>
						<td align=\"center\" bgcolor=\"#F1F1F1\" style=\"padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;\">
							<img src=\"http://www.notdefter.in/mail/images/logo2.png\" alt=\"Notdefter.in\" width=\"164\" height=\"149\" style=\"display: block;\" />
						</td>
				  </tr>
					<tr>
					  <td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					    <tr>
					      <td style=\"color: #153643; font-family: Arial, sans-serif; font-size: 24px;\"><h6>Tekrar Merhaba, $adisi </h6></td>
				        </tr>
					    <tr>
					      <td height=\"77\" style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">&quot;$kadisi&quot; called user password is bleow. if you want to change password,after entering the account you change the password in the password change area.</td>
				        </tr>
				      </table></td>
				  </tr>
					<tr>
					  <td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\"><table width=\"100%\" border=\"0\">
					    <tr>
					      <td>&nbsp;</td>
					      <td align=\"center\" style=\"color: #000000; font-family: Verdana, Geneva, sans-serif; font-size: 14px;\" height=\"32\" width=\"250\" background=\"http://www.notdefter.in/mail/images/link3.jpg\">Yeni Şifreniz: <b>$yeniparola</b></td>
					      <td>&nbsp;</td>
				        </tr>
					    </table></td>
					</tr>
					<tr>
						<td bgcolor=\"#b4110d\" style=\"padding: 30px 30px 30px 30px;\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
								<tr>
									<td style=\"color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;\" width=\"75%\">
									    Notdefter.im Team <br/>
All Rights Reserved &reg;</td>
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
</html>";


	
	$mail = new PHPMailer();
	$mail->IsSMTP();                                   // send via SMTP
	$mail->Host     = "mail.notdefter.in"; // SMTP Sunucusu / Kendi alan adiniza uyarlayiniz
	$mail->SMTPAuth = true;     // SMTP Dogrulama / Bu bölümü degistirmeyiniz
	$mail->Username = "iletisim@notdefter.in";  // SMTP kullanici adi yani Email adresiniz
	$mail->Password = "Sefer.123"; // Email adresinizin sifresi
	
	$mail->From     = "iletisim@notdefter.in"; // Email adresiniz
	$mail->FromName = "Notdefter.in System Message";
	$mail->AddAddress($eposta); // Mesajin gidecegi email adresi
	$mail->AddReplyTo("iletisim@notdefter.in");
	$mail->ContentType = "text/html";
	$mail->Charset = "utf-8";
	$mail->Headers = "charset=utf-8";
	$mail->Subject  = "New Message";
	$mail->Body     = $Mesaj;
	
	if(!$mail->Send())
	{
	
	echo "	<!-- Home -->
<div data-role=\"page\" id=\"page1\">
    <div data-theme=\"a\" data-role=\"header\">
        <h3>
            Şifre Sıfırlama
        </h3>
    </div>
    <div data-role=\"content\">
        <h4>
           We have sent a new password to the email address.
        </h4>
        <h5>
            After logging you ,You can change password
        </h5>
        <a data-role=\"button\" data-inline=\"true\" data-transition=\"flow\" data-theme=\"a\"
        href=\"giris\">
            Giriş Yap
        </a>
    </div>
</div>";
	 
	   exit;
	}

	
echo "	<!-- Home -->
<div data-role=\"page\" id=\"page1\">
    <div data-theme=\"a\" data-role=\"header\">
        <h3>
            Reset Password
        </h3>
    </div>
    <div data-role=\"content\">
        <h4>
           We have sent new  password
        </h4>
        <h5>
            After logging you ,You can change password</h5>
        <a data-role=\"button\" data-inline=\"true\" data-transition=\"flow\" data-theme=\"a\"
        href=\"giris\">
            Giriş Yap
        </a>
    </div>
</div>";
	

}
?>



</body>
</html>