<?php 
session_start(); 
include('connect.php');

if (isset($_SESSION['comment'])) {
    echo $_SESSION['comment']; 
    unset($_SESSION['comment']);
}

if (isset($_POST['username'])) { 
    $username = $_POST['username'];
    $password = $_POST['password'];	

    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);

    $stmt->execute();#query was excuted, to enter the system with the specified login information
    $user = $stmt->get_result()->fetch_assoc();

    if (!empty($user['email'])) { 
        if (password_verify($password, $user['password'])) {
            echo "<p>Login Successful</p>"; #username and password matches the database
            session_start();
            $_SESSION['login'] = TRUE;
            $_SESSION['user'] = $user['username'];
            $_SESSION['username'] = $user['username'];
            header("Location: menu.php");
        } else {
            echo "<p>Login Failed</p>";
        }
    } else {
        echo "<p>This user does not exist</p>"; #the username was removed from the database
    }

    $stmt->close();
    $db->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Preston Library</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

?>
<h1>Preston Library</h1>
<div class ="login_form">
<div class="header">
<h2>Login</h2>

<form action="login.php" method="POST">
<div class="container" style="background-color:#5AFFAD">
<label for="un">Username</label>
<input type ="text" id ="username" name ="username" placeholder ="Enter Username" required />  
</div>


<div class="container" style="background-color:#5AFFAD">
<label for="psw">Password</label>
<input type ="password" id ="password" name="password" placeholder="Enter Password" required />
</div>

<div class="container" style="background-color:#5AFFAD">
<button type ="submit" name ="submit" class="btn" value ="login">Login</button>
</div>
<div class="container" style="background-color:#5AFFAD"	
<p>Not a library member? <a href="register.php">Register Now</a></p>

</form>
</div>

</body>
</html>