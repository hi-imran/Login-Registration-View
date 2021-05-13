<?php
include "connection.php";
session_start();

$sql = "SELECT * FROM `registration` WHERE `email` = '$_POST[email]'";
$res = $db->query($sql);
$num = $res->num_rows;

if($num)
{
	$_SESSION['save_data'] = $_POST;
	header("Location: registration.php?msg=1");
	die();
}

if(isset($_POST['fname']))
{
	$password = md5($_POST['password']);
	$time 	  = time();

	$sql = "INSERT INTO `registration` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `pin`, `sid`, `cid`, `password`, `timestamp`) VALUES (NULL, '$_POST[fname]', '$_POST[lname]', '$_POST[email]', '$_POST[phone]', '$_POST[address]', '$_POST[pin]', '$_POST[state]', '$_POST[city]', '$password', '$time')";
	$db->query($sql);
	header("Location: index.php?msg=2");
}
?>