<?php
// logout.php


// Destroy all session data
session_destroy();

// Redirect the user to the login page or any desired location
header("Location: index.html");
exit();
?>
