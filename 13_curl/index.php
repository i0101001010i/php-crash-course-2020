<?php

$url = 'https://jsonplaceholder.typicode.com/users';
// Sample example to get data.
// tạo mới một CURL
// $resource = curl_init($url);

// // cấu hình cho CURL
// curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);

// // thực thi url
// $result = curl_exec($resource);

// $info = curl_getinfo($resource);
// $code = curl_getinfo($resource, CURLINFO_HTTP_CODE);

// echo '<pre>';
// var_dump($code);
// echo '</pre>';

// // close
// // curl_close($resource);
// echo $result;

// Get response status code (Done)

// set_opt_array (Done)

// Post request
$resource = curl_init();
$user = [
    'name' => 'John Doe',
    'username' => 'john',
    'email' => 'john@example.com',
];
curl_setopt_array($resource, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['content-type: application/json'],
    CURLOPT_POSTFIELDS => json_encode($user)
]);
$result = curl_exec($resource);
curl_close($resource);
echo $result;