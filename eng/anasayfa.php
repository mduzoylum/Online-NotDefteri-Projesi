
<?php 
ob_start();
session_start();
include('database_connection.php');
require('time_stamp.php');
require_once('session.php');
require_once('tema.php');
$tursor=mysql_query("SELECT * FROM uye u where u.kadi='$kadi'");
while($turyaz=mysql_fetch_array($tursor))
{
$turubaslat=$turyaz['baslangicturu'];
$ilknotid=$turyaz['id'];
}
if($turubaslat=="true"){
$sadecetarih = date("Y-m-d");
$tarih =date("Y-m-d H:i:s");
$ilknotekle=mysql_query("insert into notlar(ekleyen_id,baslik,icerik,sadece_tarih,tarih) values('$ilknotid','Hoşgeldin Notu!','İlk notun bizden olsun istedik. Notdefter.in kesinlikle bir ihtiyaç ve senin not tutma ihtiyacını tamamen karşılayacak bir uygulama. Unutma ki Notdefter.in yeni bir oluşum ve zamanla bu oluşumu senin desteklerinle geliştireceğiz. Senden tek isteğimiz Notdefter.in i arkadaşlarınla paylaşman ve etrafındakilere tavsiye etmen. Umarız keyifli vakit geçirirsin. Bu arada Hoşgeldin Notumuzu okuduktan sonra silmek istersen Notlarım sayfasındaki çöp kutusuna tıklayabilirsin.','$sadecetarih','$tarih')");	
}

?>
<!DOCTYPE html> 
<html><head> 
	<title>Notdefter.in</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
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
<?php echo" 
<script>
      $(window).load(function() {
        $('#joyRideTipContent').joyride({
		autoStart :"; echo $turubaslat.","; ?>
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
    <script>
    $('#page').on('pageinit', function(){
		$("#chooseFile").click(function(e){
			e.preventDefault();
			$("input[type=file]").trigger("click");
		});
		$("input[type=file]").change(function(){
			var file = $("input[type=file]")[0].files[0];            
			$("#preview").empty();
			displayAsImage3(file, "preview");
			
			$info = $("#info");
			$info.empty();
			if (file && file.name) {
				$info.append("<li>name:<span>" + file.name + "</span></li>");
			}
			if (file && file.type) {
				$info.append("<li>size:<span>" + file.type + " bytes</span></li>");
			}
			if (file && file.size) {
				$info.append("<li>size:<span>" + file.size + " bytes</span></li>");
			}
			if (file && file.lastModifiedDate) {
				$info.append("<li>lastModifiedDate:<span>" + file.lastModifiedDate + " bytes</span></li>");
			}
			$info.listview("refresh");
		});
    });

    function displayAsImage3(file, containerid) {
		if (typeof FileReader !== "undefined") {
			var container = document.getElementById(containerid),
			    img = document.createElement("img"),
			    reader;
			container.appendChild(img);
			reader = new FileReader();
			reader.onload = (function (theImg) {
				return function (evt) {
					theImg.src = evt.target.result;
				};
			}(img));
			reader.readAsDataURL(file);
		}
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
$tel=$idyaz['tel'];
$mail=$idyaz['mail'];
$dogum=$idyaz['dogum'];
$cinsiyet=$idyaz['cinsiyet'];
$ziyarets=$idyaz['ziyaret'];
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
         <a data-role=\"button\" data-direction=\"reverse\" data-transition=\"slide\" href=\"#left-panel\" data-icon=\"flat-menu\" data-iconpos=\"left\" id=\"menuac\" class=\"ui-btn-left\">Menu</a>
		 <a data-role=\"button\" data-direction=\"reverse\" data-transition=\"slide\" href=\"#right-panel\" data-icon=\"flat-menu\" data-iconpos=\"right\" id=\"notekle\"class=\"ui-btn-right\">Profile</a>
        <h3><div style=\"font-size:13px; margin-top:1px;\">$isimbu</div></h3>
    </div>

 <div id=\"goruntule\"data-role=\"content\">
  <ul id=\"swipeMe\" data-role=\"listview\" data-filter-placeholder=\"Başlıklarda Ara\" data-icon=\"email\" data-divider-theme=\"a\" data-filter=\"true\">
  <div class=\"hr\"><hr /></div>";

$sor2=mysql_query("select * from notlar where ekleyen_id=$id_uye order by tarih desc");
while($yaz=mysql_fetch_array($sor2))
{
$id=$yaz['id'];
$tarih=$yaz['tarih'];



echo "
  <li data-icon=\"false\" data-swipeurl=\"sil.php?Git2=$id\"><a href=\"oku.php?Git=$id\" data-transition=\"slide\">
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
	
	echo "<div style=\"font-size:11px;  opacity: 0.5; font-family: 'Ubuntu', sans-serif;\">";
	echo "<img style=\"margin-bottom:-1px; margin-right:5px;\" height=\"13\" width=\"13\"src=\"Calendar.png\">";
	
		$session_time = strtotime($tarih);
		echo time_stamp($session_time);	
	"";
	echo "</div></td></tr></table></a></li><div class=\"hr\"><hr /></div>";
}

$aktiftarih = date('Y-m-d');
$aktiftarihyaz=mysql_query("update uye set aktif_giris='$aktiftarih' where kadi='$kadi'");
$tarihyerdegistir=mysql_query("update uye set son_giris='$aktiftarihcekkk' where kadi='$kadi'");
$turukapat=mysql_query("update uye set baslangicturu='false' where kadi='$kadi'");


$toplamnot=mysql_query("SELECT COUNT(*) FROM notlar");
$toplamnotsayisi=mysql_fetch_array($toplamnot);

$gununtarihi = date("Y-m-d");
$bugunnot=mysql_query("SELECT COUNT(*) FROM notlar where sadece_tarih='$gununtarihi'");
$buguntoplamnotsayisi=mysql_fetch_array($bugunnot);


$bilgi=mysql_query("SELECT COUNT(*) FROM notlar where ekleyen_id='$id_uye' ");
if($bilgi)
{
        $tek=mysql_fetch_array($bilgi);
        
}

echo "</ul>
</div>

<!--/AÇILIR PANEL -->
				<div style=\"text-decoration:none\" data-role=\"panel\" id=\"left-panel\" data-theme=\"b\" data-position=\"left\" data-display=\"push\">
 			<ul  data-role=\"listview\" data-theme=\"a\" data-divider-theme=\"a\" data-inset=\"true\">
			
            <li data-theme=\"a\" data-icon=\"flat-plus\" ><a href=\"notekle.php?Git=$id_uye\" data-transition=\"slide\" style=\"text-decoration: none;\">Add Note</a></li>
			<div class=\"hrl\"><hr /></div>
            <li data-theme=\"a\" data-icon=\"flat-settings\" ><a href=\"profilduzenle2.php\" data-transition=\"slide\" style=\"text-decoration: none;\">Change Information</a></li>
			<div class=\"hrl\"><hr /></div>
			<li data-theme=\"a\" data-icon=\"flat-eye\"><a href=\"tema/\" data-transition=\"slide\" style=\"text-decoration: none;\">Choose Theme</a></li>
			<div class=\"hrl\"><hr /></div>
            <li data-theme=\"a\" data-icon=\"flat-checkround\"><a href=\"..\anasayfa.php\" data-transition=\"slide\" style=\"text-decoration: none;\">Dili Degistir</a></li>
			<div class=\"hrl\"><hr /></div>
            <li data-theme=\"a\" data-icon=\"flat-bubble\"><a href=\"hakkinda.php\"  data-transition=\"flow\" style=\"text-decoration: none;\">What is the Notdefter.in?</a></li>
			<div class=\"hrl\"><hr /></div>
			<li data-theme=\"a\" data-icon=\"flat-cross\" data-rel=\"close\"><a href=\"anasayfa.php\" data-rel=\"close\" data-transition=\"slide\" style=\"text-decoration: none;\">Close Menu</a></li>
			
			<div class=\"hrl\"><hr /></div>
			<li data-theme=\"a\" data-icon=\"flat-man\"><a href=\"cikis.php\"  data-transition=\"slide\" style=\"text-decoration: none;\">Logout</a></li></ul><center>";
			
			echo "<div style=\"font-size:11px; margin-top:30px; font-family: 'Open Sans', sans-serif; text-decoration: none; text-shadow: 0 0 2px #999999;\">";
		
			
			$bugun = date('Y-m-d');
			$gun = fark_bul($tarih,$bugun,'-');
			$gunn = floor($gun);
			if ($gunn <= 30 ){
				if ($gunn==0){
					echo "Today $lolo near the entry was made.";
				}
				else{
					echo "".$gunn." Before ago $lolo near the entry was made";
				}
				
			}
			else if (($gunn >= 30) and ($gunn <= 360)){
				echo "".floor($gunn/30)." Mounth ago $lolo near the entry was made";
			}
			else if ($gunn >= 360){
				echo "".floor($gunn/360)." Years ago $lolo near the entry was made";
			}

			
			echo "<br>Last Login IP: ";
			if($ip=="::1"){echo "127.0.0.1";} else{echo $ip;};
			echo " <br />";
			echo "Total Notes Number: $toplamnotsayisi[0]</br>
			Today entered Note Number: $buguntoplamnotsayisi[0]</br></br></br>
			<img src=\"logo3.png\" height=\"69\" width=\"75\"></br></br>
			";
			
			
			echo "</div></center>";	
			echo "</div><!--/AÇILIR PANEL -->";
			
?>			
			
			
<!--/SAĞ AÇILIR PANEL -->		
			
<div data-role="panel" id="right-panel" data-theme="b" data-position="right" data-display="overlay">
	<!-- ARKAPLAN -->
	<div style="position:absolute; z-index:-998; top:0px; left:0px; background-color:#f3f3f3; width:272px; height:379px;"> </div>

	<!-- Butonlar -->
    <a href="sifredegistir" data-rel="dialog"><div style="position:absolute; z-index:5; top:5px; left:5px; "><img src="settings.png" height="33" width="33"></center></div></a>
    <a href="profilduzenle2.php" data-rel="dialog"><div style="position:absolute; z-index:5; top:5px; right:5px; "><img src="editt.png" height="33" width="33"></center></div></a>

    <div style="position:absolute; left:0px; top:0px; z-index:-2; height:124px; width:272px; margin-top:0px; margin-left:0px; -webkit-filter: drop-shadow(0px 3px 3px rgba(0,0,0,0.3));"><img src="<?php $uret=array("cover.jpg","cover1.jpg","cover2.jpg","cover3.jpg","cover4.jpg"); echo $yenicover=$uret[rand(0,4)];?>" height="136" width="272" /></div>
    <div style="position:absolute; left:0px; top:0px; z-index:-1; height:124px; width:272px; margin-top:0px; margin-left:0px;"><img src="camgorunum.png" height="136" width="272" /></div>
    <div style="position:absolute; z-index:1; left:75px; top:75px;"><img src="profile_cover.png" width="120px" height="129px"/></div>
    <div style="position:absolute; z-index:0; left:84px; top:83px;"><img src="<?php if(empty($profil_resmi)){echo "../uploads/blankuser.jpg";}else{echo "../uploads/".$profil_resmi;}?>"  height="103px" width="103px" class="avatar"></div>
    <a href="profilduzenle.php" data-rel="dialog"><div style="position:absolute; z-index:5; left:75px; top:75px; height:120px; width:120px; opacity:0; background-color:#000; border-radius:60px;"></div></a>
    
    <div style="position:absolute; top:215px; font-size:27px; width:250px; text-shadow: 0px 1px 1px #999; color:#555; font-family: 'Doppio One', sans-serif;"><center><?php echo $isimbu?></center></div>
    <div style="position:absolute; top:255px; font-size:13px; width:250px; color:#666; font-family: 'Doppio One', sans-serif;"><center><?php echo $lolo; ?>, Türkiye<i class="icon-pin"></i></center></div>
<div style="position:absolute; top:280px; font-size:13px; width:250px; color:#666; font-family: 'Doppio One', sans-serif;"><center><?php echo $mail; ?> <i class="icon-mail"></i></center></div>


    <div style="position:absolute; z-index:3; top:300px; left:0px; font:15px; opacity:0.5; width:272px; height:50px;"><img src="notsayisi.png" height="105px" width="272px" /></div>
    
    <div style="position:absolute; z-index:4; left:20px; top:313px; font-size:12px; color:#666; text-shadow: 0 0 1px #fff; font-family: 'Doppio One', sans-serif; width:250px; height:50px;">Notes Count<div style="position:absolute; z-index:4; width:100px; font-size:40px; color:#666; text-shadow: 0 0 5px #999; font-family: 'Doppio One', sans-serif; height:50px;"><center><?php echo $tek[0] ?></center></div></div>

    <div style="position:absolute; z-index:4;left:150px; font-size:12px; top:313px; color:#666; text-shadow: 0 0 1px #fff; font-family: 'Doppio One', sans-serif; width:250px; height:50px;">Your points<div style="position:absolute; z-index:4; font-size:40px; left:20px; color:#666; text-shadow: 0 0 5px #999; font-family: 'Doppio One', sans-serif; height:50px;"><center>951</center></div></div>

</br></br></br></br>
<div style="position:absolute; z-index:4; top:395px; width:245px; ">
<a data-role="button" href="profilduzenle.php" data-mini="true" data-theme="d">
            Edit Profile
        </a>
</div>
 			
</div>	
			
<!--/SAĞ AÇILIR PANEL -->			

</div>
              <!-- Tip Content -->
            <ol id="joyRideTipContent">
              <li data-text="Evet">
                <h4>Welcome <?php echo $isimbu ?>!</h4>
                <p>Now notes in an online environment can safely store.Do you want to briefly introduce the application?</p>
              </li>
              <li data-id="notekle" data-button="İleri" "data-options="tipLocation:right;">
                <h4>View Your Profile</h4>
                <p>By clicking on My Profile your password, profile information and 
                you can change your profile photo, How many notes you've entered and you can see your Notdefter.in score.</p>
              </li>
              <li data-id="goruntule" data-button="İleri" >
                <h4>Notes of View</h4>
                <p>Listed on this page you can add and view notes</p>
              </li>
              <li data-id="menuac" data-button="İleri" >
                <h4>Customized</h4>
                <p>Using the menu button on your profile and Notdefter.im about more detailed information is available ,you can change your settings or exit from the system.</p>
              </li>
              <li data-id="silbunu" data-button="İleri">
                <h4>Customize notes</h4>
                <p>Notes at any time by clicking the delete icon to the trash can or after viewing the note with the edit button in the upper right corner you can make corrections.</p>
              </li>
              <li data-text="Turu Bitir">
                <h4>Thanks</h4>
                <p> Tanks for using Notdefter.in.</p>
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