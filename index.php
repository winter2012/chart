<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>资产统计</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <h1 class="page-header text-center">资产统计 <!--<small>By Winter</small>--></h1>
    <div class="form-horizontal">
        <div class="form-group">
            <label for="keywords" class="col-sm-4 control-label"></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="keywords" placeholder="请输入关键词，例如：学校">
            </div>
        </div>
        <h5 class="text-center" style="display: none" id="message"></h5>
        <div class="btn-group-justified">
            <div class="col-sm-offset-4 col-sm-4">
                <button type="submit" class="btn btn-custom btn-sm btn-block" id="callback">开始查找</button>
            </div>
        </div>
    </div>
    <span class="text-center" style="display: none" id="response"></span>
</body>
</html>