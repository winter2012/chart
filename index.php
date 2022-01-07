<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>资产统计</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <h1 class="page-header text-center">资产统计 <small>By Winter</small></h1>
    <div class="form-horizontal">
        <div class="form-group">
            <label for="orderAmount" class="col-sm-4 control-label">关键词</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="orderAmount" placeholder="棋牌">
            </div>
        </div>
        <h5 class="text-center" style="display: none" id="message"></h5>
        <div class="btn-group-justified">
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit" class="btn btn-success btn-sm btn-block" id="callback">开始查找</button>
            </div>
        </div>
        <?php include("echarts.php")?>
    </div>
</body>
</html>