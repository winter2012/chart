<?php
$config_email = "2442037867@qq.com";
$config_key = "d2a05ae44060418e6a8330b6af690eb8";

function post_request($url, $data) {
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

function get_request($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function get_asset($sql){
    global $config_email,$config_key;
    $data = base64_encode($sql);
    $url = "https://fofa.so/api/v1/search/all?email=$config_email&key=$config_key&qbase64={$data}";
    return post_request($url, '');
}

function get_size($sql){
    $asset = get_asset($sql);
    $data = json_decode($asset,true);
    if( $data['error'] == true ){
        // TODO 输出日志
        echo $asset;die;
    }
    return $data['size'];
}

function get_distinct_size($sql){
    $base_url = "https://fofa.so/result?qbase64=";
    $url = $base_url . $sql;
    $content = get_request($url, '');
    echo $content;
}

get_distinct_size("dGl0bGU9IuWtpuagoSIgJiYgYm9keT0iZG93bmxvYWQi");