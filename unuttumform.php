<!DOCTYPE html> 
<html> 
<head> 
	<title>Şifre Hatırlat</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8>
    <meta http-equiv=content-type content=text/html;charset=windows-1254>
	<meta http-equiv=content-type content=text/html;charset=x-mac-turkish>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no">  
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


<!-- Home -->
<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
        <h3>
            Şifre Sıfırlama
        </h3>
    </div>
    <div data-role="content">
    
    
    <div style="margin-left:15px; margin-right:15px;"><center><h5>Şifrenizi unuttuysanız aşağıda bulunan bölüme e-posta adresinizi girin ve talimatları uygulayın...</h5></center></div>
<div style="margin-top:50px; margin-left:20px; margin-right:20px;">
<form action="sifreiste" method="post">
    <input name="eposta" placeholder="Sisteme Kayıtlı E-Posta Adresiniz" type="text" /><br/><br/>
 <div>
     <input type="submit" data-theme="d" value="Şifremi Unuttum!" />
 </div>
</form>
</div>
    
    
    
    
    </div>
</div>



</body>
</html>