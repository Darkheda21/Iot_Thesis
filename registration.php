<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>IoT Municipality of Loboc</title>
<link rel="stylesheet" href="css/style.css" />
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
    margin-top: 10rem;
    border: 2px solid black;
}
input[type='text'], input[type='email'],
input[type='password'] {
     width: 200px;
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
}
input[type='submit']:hover {
     background-color: #024978;
}
</style>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	// $email = stripslashes($_REQUEST['email']);
	// $email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	// $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password )
VALUES ('$username', '" . $password . "')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="registration.php" method="post">
<input type="text" name="username" placeholder="Username" required />
<!-- <input type="email" name="email" placeholder="Email" required /> -->
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>