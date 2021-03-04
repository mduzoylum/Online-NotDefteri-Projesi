<?php
ob_start();
//session_start();
include('database_connection.php');
require_once('session.php');


$temasor=mysql_query("SELECT * FROM uye u where u.kadi='$kadi'");
while($temayaz=mysql_fetch_array($temasor))
{
$tema_uye=$temayaz['tema'];
}
if($tema_uye==0)
	{
		$temacss = "jquery.mobile.flatui";
	}
elseif($tema_uye==1)
	{
		$temacss = "jquery.mobile.min";
	}

?>