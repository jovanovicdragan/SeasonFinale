<?php
//echo dirname(__FILE__);

include_once("../html/header.php");?>
<?php 
session_start();

unset($_COOKIE['user']);
setcookie('user','',time()-3600);

session_destroy();
?>

You have been successfully logged out. Go back to <a href='../index.php'>Homepage</a>.