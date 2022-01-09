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
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_ENCODING, "");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_exec($ch);
    $response = curl_multi_getcontent($ch);
    curl_close($ch);
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

function get_web_page($sql){
    $data = base64_encode($sql);
    $base_url = "https://fofa.so/result?qbase64=";
    $url = $base_url . $data;
    return get_request($url);
}

function get_match_size($keywords, $start_time, $end_time){
    $keywords_sql = 'title="' . $keywords . '"';
    $timing_sql = 'after="' . $start_time . '" && before="' . $end_time . '"';
    $sql = $keywords_sql . ' && ' . $timing_sql;
    $content = get_web_page($sql);
    file_put_contents("fofa.txt", $content);

    $rule = "/<span.*?class=\"pSpanColor\".*>.*?<\/span>/";
    preg_match_all($rule, $content,$match);

    $size_str = rtrim(substr(strstr($match[0][0],'class="pSpanColor">'),19),"</span>");
    $size = str_replace(",","",$size_str);
    return intval($size);
}

function get_distinct_ips(){

}