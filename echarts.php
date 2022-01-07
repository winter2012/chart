<?php
include("controller/search.php");
$keywords = "棋牌";
$assets = get_last_year($keywords);
// data: ['2021.01', '2021.01', '2021.03', '2021.04', '2021.05', '2021.06', '2021.07', '2021.08', '2021.09', '2021.10', '2021.11', '2021.12', '2022.01']
$xAxis = "['";
// data: [150, 230, 224, 218, 600, 500, 400, 230, 224, 218, 135, 147, 260],
$yAxis = "[";
foreach ($assets as $key => $value){
    $xAxis .= substr(str_replace("-", ".", $key),0,7) . "', '";
    $yAxis .= $value . ", ";
}
$xAxis = rtrim($xAxis, ", '") . "']";
$yAxis = rtrim($yAxis, ", ") . "]";
//echo $xAxis;
//echo PHP_EOL;
//echo $yAxis;
//die;
?>

<script src="js/echarts.min.js"></script>
<!-- 为 ECharts 准备一个定义了宽高的 DOM -->
<div id="main" style="width: 900px;height:400px;"></div>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));

    // 指定图表的配置项和数据
    var option = {
        color: [
            '#c23531',
            '#2f4554',
            '#61a0a8',
            '#d48265',
            '#91c7ae',
            '#749f83',
            '#ca8622',
            '#bda29a',
            '#6e7074',
            '#546570',
            '#c4ccd3'
        ],
        xAxis: {
            type: 'category',
            // data: ['2021.01', '2021.01', '2021.03', '2021.04', '2021.05', '2021.06', '2021.07', '2021.08', '2021.09', '2021.10', '2021.11', '2021.12', '2022.01']
            data: <?php echo $xAxis ?>
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                // data: [150, 230, 224, 218, 600, 500, 400, 230, 224, 218, 135, 147, 260],
                data: <?php echo $yAxis ?>,
                type: 'line',
                smooth: false
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>