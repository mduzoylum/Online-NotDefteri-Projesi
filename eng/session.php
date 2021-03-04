<?php
$skadi=@$_SESSION["kullanici"];
$ckadi=@$_COOKIE["kullanici"];

if(empty($skadi) and empty($ckadi))
{
	echo '<script>document.location.replace("giris");</script>';
}

if($skadi!="")
{
	$kadi=$skadi;
    
}
elseif($ckadi!="")
{
    $kadi=$ckadi;
   
}
else{
    echo '<script>document.location.replace("cikis");</script>';
}

?>