<?php

  //function to fetch data from API and update water level
  function updateWaterLevel() {
    require('db.php');
    // Fetch data from API
    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.thingspeak.com/channels/2037956/feeds.json?api_key=9OK0H8WWTZQ00KDA&results=1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

// Decode JSON response and extract field3
$data = json_decode($response);
$field3 = $data->feeds[0]->field3;

// Output the result
echo $field3;


  


$query = "SELECT ip_address FROM ip";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);
$ipAddress = $row['ip_address'];
    

// Replace with your own values
$gateway_url = $ipAddress;
$username = 'admin';
$password = 'admin';



// Query the database to get the phone numbers
$sql = "SELECT phone_number FROM contact";
$result = mysqli_query($con, $sql);

// Loop through the phone numbers and send the SMS messages
$message = '';
while ($row = mysqli_fetch_assoc($result)) {
    $phone_number = $row['phone_number'];
    
    if($field3 >= 13 &&  $field3 <=15)
    {
        $message = 'The water level start to become higher please stay home.';
    }
    else if ($field3 >=8 &&  $field3 <=12)
    {
         $message = 'Warning! The water level exceeds the moderate level please prepare for evacuation anytime!';
    }
    else if ($field3 >= 1 &&  $field3 <=7)
    {
         $message = 'Alert! The water level reaches the critical level, please evacaute immediately.';
    }

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
  }
  updateWaterLevel();
?>
