<?php
include('head.php');
// Function to perform cURL request
function curlRequest($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// URLs of the remote company's API endpoints
$urlA = 'https://hponukumati.000webhostapp.com/company/curl/userdata.php';
$urlB = 'https://abhinandu.000webhostapp.com/curl/userdata.php';
$dataA = curlRequest($urlA);
$dataB=curlRequest($urlB);
$urlC = 'https://maheedhar.000webhostapp.com/curl/userdata.php'; 
$dataC = curlRequest($urlC);

echo '<p>Data From company A</p>';
print_r($dataA);
echo '<p>Data From company B</p>';
print_r($dataB);
echo '<p>Data From company C</p>';
print_r($dataC);
?>
