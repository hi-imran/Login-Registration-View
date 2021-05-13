<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
  body{
    font-family: arial;
    background: #4793E3;
    padding:0;
    margin: 0;
  }
  input[type=email] {
      width: 50%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid black;
      border-radius: 4px;
  }
  input[type=password] {
      width: 50%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid black;
      border-radius: 4px;
  }
  #header{
    background: #4FC3A1;
    color: #fff;
    height: 80px;
  }
</style>
</head>


<body>
	<div id="main">
		<div id="header">
			<h1>Login</h1>
		</div>
    <?php
    include "connection.php";
    session_start();
    if(isset($_GET['msg']) && $_GET['msg'] == "1"){
      print "<div style = \"color: white; background: crimson;  padding: 10px 10px; text-align: center; \">Either Email or Password is incorrect. Please enter valid credentials</div>";
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "2")
      print "<div style = \"color: white; background: #4793E3;  padding: 10px 10px; text-align: center; \">Successfully Register</div>";

    if(isset($_GET['msg']) && $_GET['msg'] == "3")
      print "<div style = \"color: white; background: #4793E3;  padding: 10px 10px; text-align: center; \">Successfully Logout</div>";

    ?>
		<div id="content">
			<form method="post" action="login_verify.php">
          
          <label for="email">Email</label>
          <input type="text" id="email" name="email" required>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>

          <label></label>
          <input type="image" src = "image/login.png" width="120">

          <h4>New User?  <a href="registration.php">Register</a></h4>



      </form>
		</div>
	</div>
</body>
</html>
