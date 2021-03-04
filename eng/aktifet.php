<?php
include('database_connection.php');
require("class.phpmailer.php");
?>
<!DOCTYPE html> 
<html> 
<head> 
	<title>Activation is completed.</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8>
    <meta http-equiv=content-type content=text/html;charset=windows-1254>
	<meta http-equiv=content-type content=text/html;charset=x-mac-turkish>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no"> 
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
	<link rel="stylesheet" type="text/css" href="css/jquery.mobile.flatui.css" />
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
 
$kontrol = mysql_query("SELECT * FROM aktifet WHERE aktifHash='$hash'");
 
if(mysql_num_rows($kontrol)==0){
	$degiskenimiz ="You have come to the wrong address";
	?>
	<!-- Home -->
<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
        <h3>
           Activation is completed.
        </h3>
    </div>
    <div data-role="content">
        <h4>
           Your account is already active
        </h4>
        <h5>
            <?php 
			
			echo $degiskenimiz;
			
			?>
        </h5>
        <a data-role="button" data-inline="false" data-transition="flow" data-theme="a"
        href="giris">
            Log in
        </a>
    </div>
</div>
	
    
     
     
     
     
     
	 <?php
}
else{
    
 
     $hashBilgi = mysql_fetch_array($kontrol);
     $uyeId = $hashBilgi['uyeId'];
 
     mysql_query("UPDATE uye SET aktif='1' WHERE id='$uyeId'");
     mysql_query("DELETE FROM aktifet WHERE aktifHash='$hash'");
 

	
echo "	<!-- Home -->
<div data-role=\"page\" id=\"page1\">
    <div data-theme=\"a\" data-role=\"header\">
        <h3>
            Verification Successful
        </h3>
    </div>
    <div data-role=\"content\">
        <h4>
          Your account is verified. Thank you!
        </h4>
        <h5>
            Welcome aboard!  Now you can enjoy Notdefter.in .Add notes as you wish. You can access notes from anywhere you wish. 
        </h5>
        <a data-role=\"button\" data-inline=\"false\" data-transition=\"flow\" data-theme=\"a\" href=\"giris\">
            Log in
        </a>
    </div>
</div>";
	

}
?>



</body>
</html>