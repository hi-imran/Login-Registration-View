<?php

	$conn = mysqli_connect("localhost","root","","con_infoware") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM state";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['sid']}'>{$row['sname']}</option>";
		}
	}else if($_POST['type'] == "cityData"){

		$sql = "SELECT * FROM city WHERE sid = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['cid']}'>{$row['cname']}</option>";
		}
	}

	echo $str;
 ?>
