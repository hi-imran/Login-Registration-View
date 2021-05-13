<?php


session_start();

if( !isset($_SESSION['login_user']) || $_SESSION['login_user']<1 )
{
	header("Location: index.php?msg=1");
	die();
}
?>