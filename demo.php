<body style="background-color: #040c1f;">
<script src='js/echarts.min.js'></script>
<!--<div id='baseBarChart' style='width: 900px;height:400px;'></div>-->
<div id='baseBarChart' style='width:38rem;height:28rem;'></div>
<script type='text/javascript'>
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('baseBarChart'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '近一年内的资产统计走势图',
            subtext: '棋牌',
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
            name: "这个是X轴",
            type: 'category',
            data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            axisLine:{
            lineStyle:{
                color: '#05f2f2',
                }
            },
        },
        yAxis: {
            name: "这个是Y轴",
            type: 'value',
            axisLine:{
                lineStyle:{
                    color: '#05f2f2',
                }
            },
            axisLabel: {
                formatter: function (value, index) {
                    // value大于1000时除以1000并拼接k，小于1000按原格式显示
                    if (value >= 1000) {
                        value = value / 1000 + 'k';
                    }else if(value < 1000){
                        value;
                    }
                    return value;
                }
            },

        },
        series: [
            {
                name:'销售量',
                type:'line',
                stack: '这是一个测试示例',
                data: [150, 230, 224, 218, 135, 147, 260],
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
</body>