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
<!-- Home -->

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

$eposta = mysql_real_escape_string($_POST['eposta']);
 

 
$kontrol = mysql_query("SELECT * FROM uye WHERE mail='$eposta'");
if(mysql_num_rows($kontrol)==0){
    echo "<div data-role=\"page\" id=\"page1\">
    <div data-theme=\"a\" data-role=\"header\">
        <h3>
            Şifre Sıfırlama
        </h3>
    </div>
    <div data-role=\"content\">
        <h4>
           Please check your information.   
        </h4>
        <h5>
           $eposta e-posta adresi sistemimize kayıtlı değil.
        </h5>
        <a data-role=\"button\" data-inline=\"true\" data-transition=\"flow\" data-theme=\"a\"
        href=\"hatirlat\">
            Tekrar Dene
        </a>
    </div>
</div>";
}
else{
 $uye = mysql_fetch_array($kontrol);
     $uyeId = $uye['id'];
	 $isimsoyisin = $uye['adi'];
	 $kuladin = $uye['kadi'];
     
     $unuttumKontrol = mysql_query("SELECT * FROM sifremiunuttum WHERE uyeId='$uyeId'");
 
     if(mysql_num_rows($unuttumKontrol)!=0)
		{
          $unuttumVar = mysql_fetch_array($unuttumKontrol);
          $baslik = "Parola değiştir";
          $icerik = "<a href=\"http://www.notdefter.in/yeni?kod={$unuttumVar['unuttumHash']}\" target=\"_blank\">Click here for change your password.</a>";
		}
     else{
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
							<img src=\"http://www.notdefter.in/mail/images/logo2.png\" alt=\"Notdefter.in\" width=\"164\" height=\"149\" style=\"display: block;\" />
						</td>
				  </tr>
					<tr>
						<td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
								<tr>
									<td style=\"color: #153643; font-family: Arial, sans-serif; font-size: 24px;\">
							        <h6>Did you forget password, $isimsoyisin?									</h6></td>
								</tr>
								<tr>
									<td style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">&quot;$kuladin&quot; named user.We took request for change password from you </td>
								</tr>
								<tr>
									<td><span style=\"padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;\"><a href=\"http://www.notdefter.in/yeni?kod={$hash}\"><img src=\"http://www.notdefter.in/mail/images/link2.jpg\" alt=\"Click here for reset your password\" style=\"display: block;\" /></a></span></td>
								</tr>
								<tr>
								  <td>&nbsp;</td>
							  </tr>
								<tr>
								  <td><p><span style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">or click following link</span><br />                                  
				                  <a href=\"http://www.notdefter.in/yeni?kod={$hash}\" target=\"_blank\">http://www.notdefter.in/yeni?kod={$hash}</a></p></td>
							  </tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor=\"#b4110d\" style=\"padding: 30px 30px 30px 30px;\">
							<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
								<tr>
									<td style=\"color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;\" width=\"75%\">
									    Notdefter.im Team <br/>
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
					We have sent instruction to your mail address
				</h4>
				<h5>
					Please check your spam
				</h5>
				<a data-role=\"button\" data-inline=\"true\" data-transition=\"flow\" data-theme=\"a\"
				href=\"giris.php\">
					Giriş Yap
				</a>
			</div>
		</div>";
          
     }
}
?>



</body>
</html>