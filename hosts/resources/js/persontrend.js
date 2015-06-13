$(function(){
    var user_arr =$("input[name=userArr]").val().split(','),
        depart = $("input[name=depart]").val()

    var ctx = $("#departChart").get(0).getContext("2d"),
        departChart = new Chart(ctx),
        xData = ["2010","2011","2012","2013","2014上半年","2014下半年"];

    // 设置chart的参数
    var options = {

        // y轴宽度
        scaleLineWidth : 2,

        // 刻度labels显示
        scaleShowLabels : false,

        // 刻度字体大小
        scaleFontSize:12,

        // 字体颜色
        scaleFontColor : "#666",

        // y轴没块刻度的长度
        scaleStepWidth: 100
    }

    //get画图所需要y轴的数据
    var getdepartData = (function() {
        var result;
        $.ajax({
            url: '/action/getDepartScore.php',
            type: "post",
            data:{
                depart:depart
            },
            async:false,
            success: function(data){
                var data = JSON.parse(data);
                result = data.yData;
                // 设置x轴数据
                var data = {
                    labels : xData,
                    datasets : [
                        {
                            fillColor : "rgba(151,187,205,0.5)",
                            strokeColor : "rgba(151,187,205,1)",
                            pointColor : "rgba(151,187,205,1)",
                            pointStrokeColor : "#fff",

                            // y轴数据
                            data : result
                        }
                    ]
                }
                // 画部门图表
                departChart.Line(data,options);
            }
        });

        return result;
    })();

    for(var i = 0;i< user_arr.length;i++){

        var userId = $('.userId').val(),
            ctx = $("#myChart_" + user_arr[i]).get(0).getContext("2d"),
            myNewChart = new Chart(ctx);

        // get画图所需要y轴的数据
        var getData = (function() {
            var result;
            $.ajax({
                url: '/action/getUserScore.php',
                type: "post",
                data:{
                    userId:user_arr[i]
                },
                async:false,
                success: function(data){
                    var data = JSON.parse(data);
                    result = data.yData;
                }
            });

            return result;
        })();

        var data = {

            // x轴数据
            labels : xData,
            datasets : [
                {
                    fillColor : "rgba(151,187,205,0.5)",
                    strokeColor : "rgba(151,187,205,1)",
                    pointColor : "rgba(151,187,205,1)",
                    pointStrokeColor : "#fff",

                    // y轴数据
                    data : getData
                }
            ]
        }

        // 画员工图
        myNewChart.Line(data,options);
    }
})