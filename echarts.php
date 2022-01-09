<?php
include("controller/search.php");
if( !$_POST["keywords"] ){
    return null;
} else {
    $keywords = $_POST["keywords"];
    getData($keywords);
}

function getData($keywords){
    $assets = get_last_year($keywords);
// data: ['2021.01', '2021.01', '2021.03', '2021.04', '2021.05', '2021.06', '2021.07', '2021.08', '2021.09', '2021.10', '2021.11', '2021.12', '2022.01'],
    $xAxis = "['";
// data: [150, 230, 224, 218, 600, 500, 400, 230, 224, 218, 135, 147, 260],
    $yAxis = "[";
    foreach ($assets as $key => $value){
        $xAxis .= $key . "', '";
        $yAxis .= $value . ", ";
    }
    $xAxis = rtrim($xAxis, ", '") . "']";
    $yAxis = rtrim($yAxis, ", ") . "]";
    //echo $xAxis . PHP_EOL . $yAxis;die;
    echo base_line_chart($keywords, $xAxis, $yAxis);
    echo base_bar_chart($keywords, $xAxis, $yAxis);
}

/**
 * 返回基础折线图
 * @param $xAxis
 * @param $yAxis
 * @return string
 */
function base_line_chart($keywords, $xAxis, $yAxis){
    $echarts = "
<script src='js/echarts.min.js'></script>
<div id='baseLineChart' style='width: 900px;height:400px;margin-top:80px'></div>
<script type='text/javascript'>
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('baseLineChart'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '近一年内的资产统计走势图',
            subtext: " . "'$keywords'" . ",
            left: 'center',
            textStyle: {
                color: '#05f2f2',
                fontSize: 22,
            },
            subtextStyle: {
                color: '#05f2f2',
                fontSize: 18,
            },
        },
        xAxis: {
            type: 'category',
            data: " . "$xAxis" . ",
            axisLine:{
                lineStyle:{
                    color: '#05f2f2',
                }
            },
        },
        yAxis: {
            type: 'value',
            axisLine:{
                lineStyle:{
                    color: '#05f2f2',
                }
            }
        },
        series: [
            {
                data: " . "$yAxis" . ",
                type: 'line',
                smooth: false,
                itemStyle : {
                    normal : {
                        color:'red',
                        lineStyle:{
                            color:'red',
                        }
                    }
                },
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
";
    return $echarts;
}

/**
 * 返回基础柱状图
 * @param $xAxis
 * @param $yAxis
 * @return string
 */
function base_bar_chart($keywords, $xAxis, $yAxis){
    $echarts = "
<script src='js/echarts.min.js'></script>
<div id='baseBarChart' style='width: 900px;height:400px;margin-top:80px'></div>
<script type='text/javascript'>
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('baseBarChart'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '近一年内的资产统计柱状图',
            subtext: " . "'$keywords'" . ",
            left: 'center',
            textStyle: {
                color: '#05f2f2',
                fontSize: 22,
            },
            subtextStyle: {
                color: '#05f2f2',
                fontSize: 18,
            },
        },
        xAxis: {
            type: 'category',
            data: " . "$xAxis" . ",
            axisLine:{
                lineStyle:{
                    color: '#05f2f2',
                }
            },
        },
        yAxis: {
            type: 'value',
            axisLine:{
                lineStyle:{
                    color: '#05f2f2',
                }
            }
        },
        series: [
            {
                data: " . "$yAxis" . ",
                type: 'bar',
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
";
    return $echarts;
}