<?php session_start(); 

unset($_SESSION['admin']);
echo '<script>document.location.replace("admingiris.php");</script>';
?>