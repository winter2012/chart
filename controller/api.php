<?php
$config_email = "2442037867@qq.com";
$config_key = "d2a05ae44060418e6a8330b6af690eb8";

function request_by_curl($url, $data) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

$data = 'domain="fofa.so"';
$data = base64_encode($data);
$url = "https://fofa.so/api/v1/search/all?email=$config_email&key=$config_key&qbase64={$data}";
$test = request_by_curl($url, '');
var_dump($test);