




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IoT Municipality of Loboc</title>
</head>
<style>
body {
     background-image: url(assets/images/Suba.jpg);
     font-family:Arial, Sans-Serif;
     background-repeat: no-repeat;
     background-size: cover;
     text-align: center;
     height: 100vh;

}
.form{
  margin: auto;
}
.form{
   
    margin-top: 15rem;
    border: 2px solid black;
    width: 200px;
    padding-top: 2rem;
}
.phone {
  font-size: 18px;
  font-weight: bold;
  color: #333;
}

/* Style for the name */
.name {
  font-size: 16px;
  color: #666;
}

/* Style for the send button */
.send-btn {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}
</style>
<body>
<?php
require('db.php');
if (isset($_REQUEST['name'])){
  // removes backslashes
$name = stripslashes($_REQUEST['name']);
  //escapes special characters in a string
$name = mysqli_real_escape_string($con,$name); 
$phoneNumber = stripslashes($_REQUEST['phoneNumber']);
$phoneNumber = mysqli_real_escape_string($con,$phoneNumber);
// $trn_date = date("Y-m-d H:i:s");
$query = "INSERT into `contact` (`name`, `phone_number`)
VALUES (md5('$name'), '$phoneNumber')";
  $result = mysqli_query($con,$query);
  if($result){
      echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='flood_graph.php'>Back</a></div>";
  }
}else{
?>
<div class="form">
<form name="registration" action="Sim_Register.php" method="post">
  <input  type="phone no" placeholder="Phone no" name="phoneNumber" required><br><br>
  <input  type="text" placeholder="Name" name="name" required><br><br>
  <input type="submit" name="submit" value="Register" /><br><br>
</form>
</div>
<?php } ?>
</body>
</html>
