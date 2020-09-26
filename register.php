<?php 
session_start(); 
include('connect.php') 
?>
<!DOCTYPE html>
<html>
<head>
<title>Preston Library</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="login_check.js"></script>
</head>

<body>

<h1>Preston Library</h1>

<div class ="login_form">
<div class="header">
<h2>Register</h2>

<form action="insert.php" method="POST" id="reg_form" name="reg_form" onsubmit="return checkempty();" >
<div class="container" style="background-color:#5AFFAD">
<label for="un">Username</label>
<input type ="text" id ="username" name ="username" placeholder ="Enter Username" onblur="checkUser()" required /> <span id="message"></span> 
</div>


<div class="container" style="background-color:#5AFFAD">
<label for="psw">Password</label>
<input type ="password" id ="password" name="password" placeholder="Enter Password" required />
</div>

<div class="container" style="background-color:#5AFFAD">
<label for="cpsw">Confirm password</label>
<input type ="password" id ="password_2" name="password_2" placeholder="Enter the Password again" required />
</div>

<div class="container" style="background-color:#5AFFAD">
<label for="email">Email</label>
<input type ="email" id ="email" name="email" placeholder="Enter email" required />
</div>

<div class="container" style="background-color:#5AFFAD">
<button type ="submit" name ="submit" class="btn" value ="submit">Submit</button>
</div>

<div class="container" style="background-color:#5AFFAD">	
<p>Are you a library member? <a href="login.php">Login Now</a></p>

</form>
</div>

</body>
</html>