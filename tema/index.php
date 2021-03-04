<?php 
session_start();
include('../database_connection.php');
include('../session.php');
 
$tema_uye=$_GET["sec"];
if($tema_uye==0)
	{
		$temacss = "jquery.mobile.flatui";
	}
elseif($tema_uye==1)
	{
		$temacss = "jquery.mobile.min";
	}

echo "<head> 
	<title>Notlarım</title>
    <meta http-equiv=content-type content=text/html;charset=utf-8>
	<link href='http://fonts.googleapis.com/css?family=Varela&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no\"> 
	<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/$temacss.css\" />

	<script src=\"http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.js\"></script>
	<script src=\"http://view.jquerymobile.com/1.3.1/dist/demos/js/jquery.mobile.min.js\"></script>";
    echo'<script language=" JavaScript" ><!--
function yenile()
{
window.location.reload();
}
//--></script>

</head>';

echo '<Body onLoad="yenile()" >'; 

echo "<div data-role=\"page\" id=\"page1\">
    <div data-theme=\"b\" data-role=\"header\">
	<a data-role=\"button\" data-transition=\"slide\" href=\"../anasayfa.php\"
        data-icon=\"arrow-l\" data-iconpos=\"left\" class=\"ui-btn-left\">
            Geri
        </a>
        <h3>";
          echo  "Tema ".(($tema_uye)+1);
        echo "</h3>
    </div>
    <div data-role=\"content\">
        <div class=\"ui-grid-a\">
            <div class=\"ui-block-a\">
                 <a href=\"#\" onclick=\"window.open('index.php?sec=0','_self');\">
                    <div style=\"\">
                        <img style=\"width: 135px; height: 141px\" src=\"http://p1308.hizliresim.com/1d/k/rljby.png\">
                    </div>
                </a>
            </div>
            <div class=\"ui-block-b\">
                 <a href=\"#\" onclick=\"window.open('index.php?sec=1','_self');\">
                    <div style=\" text-align:center\">
                        <img style=\"width: 135px; height: 141px\" src=\"http://p1308.hizliresim.com/1d/k/rljdd.png\">
                    </div>
                </a>
            </div>
        </div></br>
    
            <a data-role=\"button\" a href=\"tok.php?ok=$tema_uye\" name=\"submit\" type=\"submit\" data-icon=\"check\" data-iconpos=\"left\">Temayı Uygula
       </a>
    </div>
    <div data-theme=\"b\" data-role=\"footer\" data-position=\"fixed\" data-tap-toggle=\"true\">
        <h1>
            <div style=\"font-size:10px;\">Seçtiğiniz temayı kaydetmek için temayı uygulaya tıklayınız.</div>
        </h1>
    </div>
</div>";

?>
</body>
</html>