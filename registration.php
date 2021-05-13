<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
  body{
    font-family: arial;
    background: #4793E3;
    padding:0;
    margin: 0;
}
   input[type=text] {
      width: 50%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid black;
      border-radius: 4px;
    }
     input[type=email] {
      width: 50%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid black;
      border-radius: 4px;
    }
input[type=number] {
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

<script type="text/javascript">
    function same() {
      var p1 = document.f1.password.value;
      var p2 = document.f1.confirm_password.value;

      if(p1.length<5) {
        alert('Password is too small');
        document.f1.password.focus();
        return false;
      }

      if(p1!=p2) {
        alert('Password and Confirm Password does not match');
        document.f1.confirm_password.focus();
        return false;
      }
    return true;
    }
  </script>


<body>
	<div id="main">
		<div id="header">
			<h1>Registration</h1>
		</div>
    <?php
    include "connection.php";
    session_start();
    
    if(isset($_GET['msg']) && $_GET['msg'] == "1")
      print "<div style = \"color: white; background: crimson;  padding: 10px 10px; text-align: center; \">Email already exists! Please Enter another email or login with your password</div>";
    ?>
		<div id="content">
			<form method="post" action="registration_thanks.php" name="f1" onsubmit="return same();">
          
          <label for="fname">First Name</label>
          <input type="text" id="fname" name="fname" required value="<?php
          if(isset($_SESSION['save_data']))
            print $_SESSION['save_data']['fname'];
          ?>">

          <label for="lname">Last Name</label>
          <input type="text" id="lname" name="lname" required value="<?php
          if(isset($_SESSION['save_data']))
            print $_SESSION['save_data']['lname'];
          ?>">


          <label for="email">Email</label>
          <input type="email" id="email" name="email" required value="<?php
          if(isset($_SESSION['save_data']))
            print $_SESSION['save_data']['email'];
          ?>">

          <label for="phone">Phone</label>
          <input type="number" id="phone" name="phone" required value="<?php
          if(isset($_SESSION['save_data']))
            print $_SESSION['save_data']['phone'];
          ?>">


          <label for="address" >Address</label>
          <textarea id="address" name="address" rows="4" cols="60" required ><?php
            if(isset($_SESSION['save_data']))
              print $_SESSION['save_data']['address'];
          ?>
          </textarea>

          <label for="pin">Pin Code</label>
          <input type="number" id="pin" name="pin" required value="<?php
          if(isset($_SESSION['save_data']))
            print $_SESSION['save_data']['pin'];
          ?>">

          <label>State/UT : </label>
          <select id="state" name="state" required>
        	   <option value="">Select state</option>
          </select>
        <br><br>
          <label>City : </label>
          <select id="city" name="city" required>
        	   <option value=""></option>
          </select>
          <br><br>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>


          <label for="confirm_password">Confirm Password</label>
          <input type="password" id="confirm_password" name="confirm_password">

          <label></label>
          <input type="image" src = "image/register.png" width="120">
</form>

<h4>Existing User?  <a href="index.php">Login</a></h4>
		
    </div>
	</div>
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    function loadData(type, category_id){
      $.ajax({
        url : "load-cs.php",
        type : "POST",
        data: {type : type, id : category_id},
        success : function(data){
          if(type == "cityData"){
            $("#city").html(data);
          }else{
            $("#state").append(data);
          }
          
        }
      });
    }

    loadData();

    $("#state").on("change",function(){
      var state = $("#state").val();

      if(state != ""){
        loadData("cityData", state);
      }else{
        $("#city").html("");
      }

      
    })
  });
</script>
</body>
</html>
