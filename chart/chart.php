<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chart</title>
    <script src="js/chart.js"></script>
</head>
<body>
<div>
    <canvas id="myChart"></canvas>
</div>
</body>
</html>
<script>
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(99,133,255)',
            borderColor: 'rgb(146,255,99)',
            data: [<?php echo "5,15,40,20,25,10,5" ?>],
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };
</script>
<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>