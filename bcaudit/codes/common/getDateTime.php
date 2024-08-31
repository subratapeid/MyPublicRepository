<?php
// Function to fetch the current date and time from the World Time API
function getDateTime() {
    // Initialize cURL session
    $curl = curl_init();

    // Set the URL for the World Time API
    curl_setopt($curl, CURLOPT_URL, 'http://worldtimeapi.org/api/timezone/Asia/Kolkata');

    // Set to return the transfer as a string
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL session
    $response = curl_exec($curl);

    // Close cURL session
    curl_close($curl);

    // Decode the JSON response
    $data = json_decode($response, true);

    // Extract the UTC datetime from the response
    $utcDatetime = $data['utc_datetime'];

    // Convert UTC datetime to Kolkata timezone
    $kolkataTime = date_create($utcDatetime, new DateTimeZone('UTC'));
    $kolkataTime->setTimezone(new DateTimeZone('Asia/Kolkata'));

    // Format the date and time
    $formattedDateTime = $kolkataTime->format('Y-m-d H:i:s');
    // $formattedDateTime = $kolkataTime->format('y-m-d H:i:s');
    // echo ($formattedDateTime);
    // Return the formatted date and time
    return $formattedDateTime;
}
// getDateTime();
?>
