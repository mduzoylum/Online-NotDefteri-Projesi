<?php
include('database_connection.php');
//Include The Database Connection File 

if(isset($_POST['mail']))//If a mail has been submitted 
{
$mail = mysql_real_escape_string($_POST['mail']);//Some clean up :)

$check_for_mail = mysql_query("SELECT * FROM uye WHERE mail='$mail'");
//Query to check if mail is available or not 

if(mysql_num_rows($check_for_mail))
{
echo '1';//If there is a  record match in the Database - Not Available
}
elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL))
{
echo '2';
}
else
{
echo '0';//No Record Found - mail is available 
}


}

?>