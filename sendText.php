<?php
require('db.php');
// Replace with your own values
$gateway_url = 'http://192.168.15.96:8080';
$username = 'admin';
$password = 'admin';

// Query the database to get the phone numbers
$sql = "SELECT phone_number FROM contact";
$result = mysqli_query($con, $sql);

// Loop through the phone numbers and send the SMS messages
while ($row = mysqli_fetch_assoc($result)) {
    $phone_number = $row['phone_number'];
    $message = 'Hello, this is a test message';

    // Set up the curl request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "{$gateway_url}/v1/sms/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
        'phone' => $phone_number,
        'message' => $message,
    )));
    curl_setopt($ch, CURLOPT_USERPWD, "{$username}:{$password}");

    // Execute the curl request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        echo "SMS sent to {$phone_number} successfully.<br>";
    }

    // Clean up
    curl_close($ch);
}

// Close the database connection
mysqli_close($con);
?>