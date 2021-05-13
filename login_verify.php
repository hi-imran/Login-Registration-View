<?php
session_start();
include "connection.php";

$email = $_POST['email'];
$pwd   = md5($_POST['password']);

$sql = "SELECT * FROM `registration` WHERE `email` = '$email' AND `password` = '$pwd' ";
$res = $db->query($sql);
$num = $res->num_rows;
$row = $res->fetch_array();

if($num>0) {

	$_SESSION['login_user'] = $row['id']; 
	$_SESSION['login_name'] = $row['fname']; 

	header("Location: view.php");
} else {

	header("Location: index.php?msg=1");
}
?>