$(function () {
    $("#callback").click(function () {
        let keywords = $("#keywords").val();
        if(keywords === ""){
            $("#message").show().html("请输入搜索关键词").css("color","red");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "echarts.php",
            beforeSend : hideMessage(),
            data: {
                keywords: keywords
            },success:function (res) {
                $("#response").show().html(res);
            }
        });
    });
});
function hideMessage() {
    $("#message").hide();
    return null;
}