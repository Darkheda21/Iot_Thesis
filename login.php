<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>IoT Municipality of Loboc</title>
<!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>
<style>
    body {
     background-image: url(assets/images/Suba.jpg);
     font-family:Arial, Sans-Serif;
     background-repeat: no-repeat;
     background-size: cover;
     height: 100vh;
}
.clearfix:before, .clearfix:after{
     content: "";
     display: table;
}
.clearfix:after{
     clear: both;
}
a{
     color:#0067ab;
     text-decoration:none;
}
a:hover{
     text-decoration:underline;
}
.form{
     width: 300px;
     margin: 0 auto;

}

.form{
    margin-top: 15rem;
    border: 2px solid black;
}
.register{
    font-weight: bold;
}
input[type='text'], input[type='email'],
input[type='password'] {
     width: 280px;
     height: 50px;
     border-radius: 2px;
     border: 1px solid #CCC;
     padding: 10px;
     color: #333;
     font-size: 14px;
     margin-top: 10px;
}
input[type='submit']{
     padding: 10px 25px 8px;
     color: #fff;
     background-color: #0067ab;
     text-shadow: rgba(0,0,0,0.24) 0 1px 0;
     font-size: 16px;
     box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0;
     border: 1px solid #0164a5;
     border-radius: 2px;
     margin-top: 10px;
     cursor:pointer;
     width: 300px;
}
input[type='submit']:hover {
     background-color: #024978;
}
</style>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = $_REQUEST['password'];
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='" . $password . "'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: googlesheet.php");
	    exit();
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p class="register">Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>