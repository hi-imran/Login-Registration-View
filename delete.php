<?php
include "connection.php";
include "login_check.php";

if(isset($_GET['del_id']))
{
	$sql = "DELETE FROM `registration` WHERE `id` = $_GET[del_id]";
	$db->query($sql);
	header("Location: view.php");
}
?>