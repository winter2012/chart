<?php
include("api.php");
//$keywords = $_POST["keywords"];
//$date = $_POST["date"];
$keywords = "棋牌";
$date = "2021-06-06";
$start_time = "2021-08-01";
$end_time = "2021-09-01";

function get_date_size($keywords, $date){
    $keywords_sql = 'title="' . $keywords . '" && body="download"';
    $date_sql = 'before="' . $date . '"';
    $sql = $keywords_sql . ' && ' . $date_sql;
    return get_size($sql);
}

function get_timing_size($keywords, $start_time, $end_time){
    $keywords_sql = 'body="' . $keywords . '"';
    $timing_sql = 'after="' . $start_time . '" && before="' . $end_time . '"';
    $sql = $keywords_sql . ' && ' . $timing_sql;
    return get_size($sql);
}

function get_half_year($keywords){
    $dates = [
        /*"2021-01-31",
        "2021-02-28",
        "2021-03-31",
        "2021-04-30",
        "2021-05-31",
        "2021-06-30",*/
        "2021-07-31",
        "2021-08-31",
        "2021-09-30",
        "2021-10-31",
        "2021-11-30",
        "2021-12-31",
        date("Y-m-d")
    ];
    $size_count = [];
    foreach ($dates as $date){
        $size = get_date_size($keywords, $date);
        $xAxis = substr(str_replace("-", ".", $date),0,7);
        $size_count[$xAxis] = $size;
        sleep(1);
    }
    return $size_count;
}


function get_last_year($keywords){
    $dates = [
        "2021-01-01" => "2021-01-31",
        "2021-02-01" => "2021-02-28",
        "2021-03-01" => "2021-03-31",
        "2021-04-01" => "2021-04-30",
        "2021-05-01" => "2021-05-31",
        "2021-06-01" => "2021-06-30",
        "2021-07-01" => "2021-07-31",
        "2021-08-01" => "2021-08-31",
        "2021-09-01" => "2021-09-30",
        "2021-10-01" => "2021-10-31",
        "2021-11-01" => "2021-11-30",
        "2021-12-01" => "2021-12-31",
        "2022-01-01" => date("Y-m-d")
    ];
    $size_count = [];
    foreach ($dates as $start => $end) {
        $size = get_match_size($keywords, $start, $end);
        $xAxis = substr(str_replace("-", ".", $start),0,7);
        $size_count[$xAxis] = $size;
    }
    return $size_count;
}