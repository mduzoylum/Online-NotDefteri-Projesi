<?php
		require("class.phpmailer.php");

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
											<td><span style=\"padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;\"><a href=\"http://www.notdefter.in/onay?kod={$hash}\"><img src=\"http://www.notdefter.in/mail/images/link.jpg\" alt=\"Hesabını şimdi doğrula\" style=\"display: block;\" /></a></span></td>
										</tr>
										<tr>
										  <td>&nbsp;</td>
									  </tr>
										<tr>
										  <td><p><span style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\">Veya aşağıdaki bağlantıya tıkla:</span><br />                                  
										  <a href=\"http://www.notdefter.in/onay?kod={$hash}\" target=\"_blank\">http://www.notdefter.in/onay?kod={$hash}</a></p></td>
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
$mail->AddAddress("duzoylummehmet@gmail.com"); // Mesajin gidecegi email adresi
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



?>