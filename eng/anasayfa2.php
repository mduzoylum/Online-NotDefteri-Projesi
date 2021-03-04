<?php 
ob_start();
session_start();
include('database_connection.php');
require_once('session.php');
require_once('tema.php');
?>
<!DOCTYPE html> 
<html><head> 
	<title>Notdefter.in</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no">
    <meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="css/joyride-2.1.css">
    <link rel="stylesheet" href="css/fontello.css">     
	<link rel="stylesheet" type="text/css" href="css/<?php echo $temacss; ?>.css" />
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
  <!-- Tour Scripti Silmeyin -->
    <script type="text/javascript" src="js/jquery-1.10.1.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/modernizr.mq.js"></script>
    <script type="text/javascript" src="js/jquery.joyride-2.1.js"></script>
   
<script>
      $(window).load(function() {
        $('#joyRideTipContent').joyride({
		autoStart : true,
		cookieMonster: true,          
		cookieName: "TourCookie",         
		cookieDomain: false,
		modal:true,
		expose: true
        });
      });
    </script>
    <!-- Tour Scripti Silmeyin -->

	<script language=" JavaScript" >
    function yenile()
    {
    window.location.reload();
    }
	</script>
    <style>
			.avatar {
					-webkit-mask-box-image: url(maske.png)
			}
			#preview {
				width: 80%; max-width: 300px;
			}
			#preview img {
				width: 100%;
			}
			.hiddenfile {
			 width: 0px;
			 height: 0px;
			 overflow: hidden;
			}
			.hiddenfile {
			 width: 0px;
			 height: 0px;
			 overflow: hidden;
			}
			.choose_file{
    position:relative;
    display:inline-block;    
	border-radius:8px;
    border:#ebebeb solid 1px;
    width:250px; 
    padding: 4px 6px 4px 8px;
    font-family: 'Ubuntu', sans-serif;
    color: #7f7f7f;
    margin-top: 2px;
	background:white
}
.choose_file input[type="file"]{
    -webkit-appearance:none; 
    position:absolute;
    top:0; left:0;
    opacity:0; 
}
</style>
</head>
<Body onLoad="yenile()" > 
<?php
$sor=mysql_query("SELECT * FROM uye u where u.kadi='$kadi'");
while($idyaz=mysql_fetch_array($sor))
{
$id_uye=$idyaz['id'];
$isimbu=$idyaz['adi'];
$aktiftarihcekkk=$idyaz['aktif_giris'];
$tarih=$idyaz['son_giris'];
$profil_resmi=$idyaz['profil_resmi'];
$ips=$idyaz['son_ip'];
$ipa=$idyaz['aktif_ip'];

}

if($ips=="")
{
$ipkesin=$ipa;
}
else
{
$ipkesin=$ips;
}
$ip = $ipkesin;
$locationdosya = file_get_contents("http://freegeoip.net/json/$ip");
 
$decodeislemi = json_decode($locationdosya);
 
$lolo=($decodeislemi->city);

echo "
<div data-role=\"page\" id=\"page1\">
<div data-theme=\"a\" data-role=\"header\">
         <a data-role=\"button\" data-direction=\"reverse\" data-transition=\"slide\" href=\"#left-panel\" data-icon=\"flat-menu\" data-iconpos=\"left\" id=\"menuac\" class=\"ui-btn-left\">Menü</a>
		 <a data-role=\"button\" data-direction=\"reverse\" data-transition=\"slide\" href=\"#right-panel\" data-icon=\"flat-menu\" data-iconpos=\"left\" id=\"notekle\"class=\"ui-btn-right\">Profilim</a>
        <h3><div style=\"font-size:13px; margin-top:1px;\">$isimbu</div></h3>
    </div>

 <div id=\"goruntule\"data-role=\"content\">
  <ul id=\"swipeMe\" data-role=\"listview\" data-filter-placeholder=\"Başlıklarda Ara\" data-icon=\"email\" data-divider-theme=\"a\" data-filter=\"true\">
  <div class=\"hr\"><hr /></div>";

$sor2=mysql_query("select * from notlar where ekleyen_id=$id_uye order by tarih desc");
while($yaz=mysql_fetch_array($sor2))
{

echo "
  <li data-icon=\"false\" data-swipeurl=\"sil.php?Git2=$id\"><a href=\"oku.php?Git=$id\">
	<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"3\">
  <tr>
    
    <td width=\"20%\">";
	
	echo "<div style=\"font-size:15px; font-family: 'Ubuntu', sans-serif;\">";
	echo $baslik=$yaz['baslik']; echo "<br></div>";
	echo "</td>
	<td width=\"15%\" rowspan=\"2\">";
	
	echo "<div style=\"margin-right:-10px;\"><a href=\"silbunu.php?baslik=$baslik&silsene=$id\" data-rel=\"dialog\">";
	echo "<div  style=\"margin-top:-20px; margin-top:-10px; margin-right:-10px;\"><img id=\"silbunu\"align=\"right\" src=\"deletebtn.png\" width=\"35\" height=\"35\" /></div>";
	echo "</a></div></td></tr><tr><td>";
	$tarih=$yaz['tarih'];
	echo "<div style=\"font-size:11px;  font-family: 'Ubuntu', sans-serif;\">";
	echo "<img style=\"margin-bottom:-1px; margin-right:5px;\" height=\"13\" width=\"13\"src=\"Calendar.png\">$tarih";
	echo "</div></td></tr></table></a></li><div class=\"hr\"><hr /></div>";
}

$aktiftarih = date('Y-m-d');
$aktiftarihyaz=mysql_query("update uye set aktif_giris='$aktiftarih' where kadi='$kadi'");
$tarihyerdegistir=mysql_query("update uye set son_giris='$aktiftarihcekkk' where kadi='$kadi'");

$toplamnot=mysql_query("SELECT COUNT(*) FROM notlar");
$toplamnotsayisi=mysql_fetch_array($toplamnot);

$gununtarihi = date("Y-m-d");
$bugunnot=mysql_query("SELECT COUNT(*) FROM notlar where sadece_tarih='$gununtarihi'");
$buguntoplamnotsayisi=mysql_fetch_array($bugunnot);

echo "</ul>
</div>

<!--/AÇILIR PANEL -->
			<div style=\"text-decoration:none\" data-role=\"panel\" id=\"left-panel\" data-theme=\"b\" data-position=\"left\" data-display=\"push\">
 			<ul  data-role=\"listview\" data-theme=\"a\" data-divider-theme=\"a\" data-inset=\"true\">
			
            <li data-theme=\"a\" data-icon=\"flat-plus\" ><a href=\"notekle.php?Git=$id_uye\" data-transition=\"slide\" style=\"text-decoration: none;\">Not Ekle</a></li>
			<div class=\"hrl\"><hr /></div>
            <li data-theme=\"a\" data-icon=\"flat-settings\" ><a href=\"sifredegistir.php\" data-transition=\"slide\" style=\"text-decoration: none;\">Şifremi Değiştir</a></li>
			<div class=\"hrl\"><hr /></div>
            <li data-theme=\"a\" data-icon=\"flat-bubble\"><a href=\"#page1\"  data-transition=\"flow\" style=\"text-decoration: none;\">Notdefter.in Nedir?</a></li>
			<div class=\"hrl\"><hr /></div>
			<li data-theme=\"a\" data-icon=\"flat-cross\" data-rel=\"close\"><a href=\"anasayfa.php\" data-rel=\"close\" data-transition=\"slide\" style=\"text-decoration: none;\">Menüyü Kapat</a></li>
			<div class=\"hrl\"><hr /></div>
			<li data-theme=\"a\" data-icon=\"flat-eye\"><a href=\"temasec.php\" data-transition=\"slide\" style=\"text-decoration: none;\">Tema Seç</a></li>
			<div class=\"hrl\"><hr /></div>
			<li data-theme=\"a\" data-icon=\"flat-man\"><a href=\"cikis.php\"  data-transition=\"slide\" style=\"text-decoration: none;\">Çıkış</a></li></ul><center>";
			
			echo "<div style=\"font-size:11px; margin-top:30px; font-family: 'Open Sans', sans-serif; text-decoration: none; text-shadow: 0 0 2px #999999;\">";
			
            
			$bugun = date('Y-m-d');
			$gun = fark_bul($tarih,$bugun,'-');
			$gunn = floor($gun);
			if ($gunn <= 30 ){
				if ($gunn==0){
					echo "Gün içinde $lolo yakınlarından giriş yapıldı.";
				}
				else{
					echo "".$gunn." gün önce $lolo yakınlarından giriş yapıldı";
				}
				
			}
			else if (($gunn >= 30) and ($gunn <= 360)){
				echo "".floor($gunn/30)." ay önce $lolo yakınlarından giriş yapıldı";
			}
			else if ($gunn >= 360){
				echo "".floor($gunn/360)." yıl önce $lolo yakınlarından giriş yapıldı";
			}

			echo "<br>Son giriş yapılan IP: $ip <br />";
			echo "Toplam Girilen Not Sayısı: $toplamnotsayisi[0]</br>
			Bugün Girilen Not Sayısı: $buguntoplamnotsayisi[0]</br></br></br>
			<img src=\"logo3.png\" height=\"69\" width=\"75\"></br></br>
			Copyright © 2013 Tüm Hakları Saklıdır.</br>
			Kodlama: Mehmet Düzoylum</br>
			Tasarım: Sefer Demirci
			";
			
			
			echo "</div></center>";	
			echo "</div><!--/AÇILIR PANEL -->";
			
?>


</div>
              <!-- Tip Content -->
            <ol id="joyRideTipContent">
              <li data-text="Evet">
                <h4>Hoşgeldin <?php echo $isimbu ?>!</h4>
                <p>Artık notlarını online bir ortamda güvenli bir şekilde saklayabilirsin. Sana kısaca siteyi tanıtmamı ister misin?</p>
              </li>
              <li data-id="notekle" data-button="İleri" "data-options="tipLocation:right;">
                <h4>Not Ekle</h4>
                <p>Sol üst köşede bulunan Not ekle butonuna tıklayarak yeni notlar kaydedebilirsiniz.</p>
              </li>
              <li data-id="goruntule" data-button="İleri" >
                <h4>Notları Görüntüleyin</h4>
                <p>Eklediğiniz notları bu sayfada listeleyebilir ve görüntüleyebilirsiniz</p>
              </li>
              <li data-id="menuac" data-button="İleri" >
                <h4>Size Özel</h4>
                <p>Menü butonunu kullanarak profilinize ve Notdefter.im hakkında daha detaylı bilgiye ulaşabilir, ayarlarınızı değiştirebilir veya sistemden çıkış yapabilirsiniz.</p>
              </li>
              <li data-id="silbunu" data-button="Son">
                <h4>Notları Özelleştirin</h4>
                <p>Notları dilediğiniz zaman çöp kutusu ikonuna tıklayarak silebilirsiniz veya notu görüntüledikten sonra sağ üst köşede bulunan düzenle butonu ile düzeltmeler yapabilirsiniz.</p>
              </li>
            </ol>
        </div>



		
<?php
			echo "</div>"; 

            function fark_bul($tarih1,$tarih2,$ayrac)
			{
			if (@$tarih==""){
			$tarih=date('Y-m-d');
			}
			else
			{
			//mktime( int saat, int dakika, int saniye, int ay, int gun, int yil);
			list($y1,$a1,$g1) = explode($ayrac,$tarih1);
			list($y2,$a2,$g2) = explode($ayrac,$tarih2);
			$t1_timestamp = mktime('0','0','0',$a1,$g1,$y1);
			$t2_timestamp = mktime('0','0','0',$a2,$g2,$y2);
			if ($t1_timestamp > $t2_timestamp)
			{
			$result = ($t1_timestamp - $t2_timestamp) / 86400;
			}
			else if ($t2_timestamp > $t1_timestamp)
			{
			$result = ($t2_timestamp - $t1_timestamp) / 86400;
			}
			return $result;
			}}
?>

   
</body>
</html>