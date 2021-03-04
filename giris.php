<?php 
ob_start();
session_start();
if(@$_SESSION['kullanici']!="" or @$_COOKIE["kullanici"]!="")
{echo '<script>document.location.replace("anasayfa.php");</script>';}
?>
<!DOCTYPE html> 
<html> 
<head> 
	<title>Giriş Yap</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png"> 
	<link rel="stylesheet" type="text/css" href="css/jquery.mobile.flatui.css" />
	<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.js"></script>
	<script src="http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.mobile.min.js"></script>
     <link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
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
		#demo-page * {-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;}
		#demo-page .ui-header .ui-btn {background: none;border: none;top: 9px;}
		#demo-page .ui-header .ui-btn-inner {border: none;}
		dl { font-family: "Times New Roman", Times, serif; padding: 1em; }
		dt { font-size: 2em; font-weight: bold; }
		dt span { font-size: .5em; color: #777; margin-left: .5em; }
		dd { font-size: 1.25em;	margin: 1em 0 0; padding-bottom: 1em; border-bottom: 1px solid #eee; }
		.back-btn { float: right; margin: 0 2em 1em 0; }
		.hr {border: 0;padding:0px;margin-top:-8px;margin-bottom:-8px;color: #f00;opacity:.5;}
		.hrl {border: 0;padding:0px;margin-top:-8px;margin-bottom:-8px;color: #000;opacity:.1;}
		a.link,a.link:hover,a.link:visited{color: black;}
	</style>
</head> 
<body style="text-align:center"> 
<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
         <h3>
         <div style="margin-top:-2px; padding:-3px; position:absolute; z-index:999; margin-left:5px;"><img src="marka2.png" height="27" width="108" style="margn-right: 5px;"></div>
         <div style="margin-top:-2px; padding:-3px; position:absolute; z-index:999; margin-left:130px;margin-top: -8px;"><a href="giris.php?language=tr"><img src="tr.png" height="36" width="36" style="margin-right: 5px;"></a><a href="giris.php?language=eng"><img src="eng.png" height="36" width="36" ></a></div>
         
         </h3>
    </div>
<?php 
$language=@$_GET["language"];
if($language=="tr")
{
?>
<div data-role="content">
			<form action="islem.php" method="post" >
    	<div data-role="fieldcontain" class="form_element">
			<input name="kadi" id="username" placeholder="Kullanıcı Adınız" value="" type="text">
		</div>
        <div data-role="fieldcontain" class="form_element">
            <input name="sifre" id="sifre" placeholder="Şifreniz" value="" type="password">
        </div>
        <div id="checkboxes1" data-role="fieldcontain">
            
         		<fieldset data-role="controlgroup" data-type="vertical" data-mini="true">
                	<input id="checkbox1" name="beniHatirla" type="checkbox">
                	<label for="checkbox1">
                    Beni Hatırla
               		</label>
				</fieldset><br/>
         <input name="submit" type="submit" value="Giriş Yap" id="submit_btn" data-theme="a" />
    		</form> 
            <center>
	<div data-role="content" >
        <a data-role="button" target="_self" data-theme="a"  data-transition="flow" href="hatirlat.php" >Şifremi Unuttum</a>
        <a data-role="button" target="_self" data-theme="d"  data-transition="slide" href="register.php" >Üye Ol</a>
    </div>
    <div>
    <a href="../NotDefter.in.apk" class="link" target="_blank" ><img src="ic_launcher.png" width="64" height="64" /></a>
    </div>
    </center>
</div>
</div>
<?php 
}
else{ 
?>
<div data-role="content">
			<form action="islem.php" method="post" >
    	<div data-role="fieldcontain" class="form_element">
			<input name="kadi" id="username" placeholder="Username" value="" type="text">
		</div>
        <div data-role="fieldcontain" class="form_element">
            <input name="sifre" id="sifre" placeholder="Password" value="" type="password">
        </div>
        <div id="checkboxes1" data-role="fieldcontain">
            
         		<fieldset data-role="controlgroup" data-type="vertical" data-mini="true">
                	<input id="checkbox1" name="beniHatirla" type="checkbox">
                	<label for="checkbox1">
                    Remember me
               		</label>
				</fieldset><br/>
         <input name="submit" type="submit" value="Login" id="submit_btn" data-theme="a" />
    		</form> 
            <center>
	<div data-role="content" >
        <a data-role="button" target="_self" data-theme="a"  data-transition="flow" href="hatirlat.php" >Forgot Password</a>
        <a data-role="button" target="_self" data-theme="d"  data-transition="slide" href="register.php" >Sign Up</a>
    </div>
    <div>
    <a href="apk/NotDefter.in.apk" class="link" target="_blank" ><img src="ic_launcher.png" width="64" height="64" /></a>
    </div>
    </center>
</div>
</div>

<?php } ?>




</body>
</html>