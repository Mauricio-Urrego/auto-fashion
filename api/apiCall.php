<?php
// Initialize curl object
$ch = curl_init();

// Set curl options
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => 1, // Return information from server
    CURLOPT_URL => 'http://colormind.io/api/',
    CURLOPT_POST => 1, // Normal HTTP post
    CURLOPT_POSTFIELDS => "{\"model\":\"default\"}",
    CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
));

// Execute curl and return result to $response
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
echo $response;
// Close request
curl_close($ch);
