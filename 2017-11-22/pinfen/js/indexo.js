/**
 * Created by Administrator on 2017/6/27.
 */
$(function () {

//提交
    $("#drawBtn").click(function (e) {
        var tel = $("input[type='tel']").val();
        var yzm = $("input[type='number']").val();
        var haoma1 = $("#oneh").val();
        var haoma2 = $('#twoh').val();
        var haoma3 = $('#three').val();
        //if (tel.Trim().length == 0) {
        //    tips("手机号不能为空");
        //    return false;
        //}
        //if (yzm.Trim().length == 0 || yzm.Trim().length != 6) {
        //    tips("请输入正确的验证码");
        //    return false;
        //}
        //if (!(/^1[123456789][0-9]{9}$/).test(tel)) {
        //    tips("请输入您的手机号");
        //    return false;
        //}
        //if (!haoma1&&!haoma2&&!haoma3) {
        //    tips("请输入3位1-6的数字");
        //    return false;
        //}
        //if (!(haoma1>=1&&haoma1<=6)){
        //    tips("请输入1-6的数字");
        //    return false;
        //}
        //if (!(haoma2>=1&&haoma2<=6)){
        //    tips("请输入1-6的数字");
        //    return false;
        //}
        //if (!(haoma3>=1&&haoma3<=6)){
        //    tips("请输入1-6的数字");
        //    return false;
        //}

        var dataStr = {'mobile':'18910352321'};
        var senddata = {
            "apiKey": "apiKey",
            "clientId": "1",
            "data": dataStr,
            "dataType": "json",
            "reqId": "1",
            "sign": "sign",
            "token": "token",
            "version": "1.0",
            "reqTime": new Date().getTime()+""
        };

        $.ajax({
            type: 'POST',
            url: 'http://api.51baomu.cn/v1/Huifang/GetTimu',
            data: senddata,
            dataType: 'json',
            success: function (data) {
                console.log('没成功')
                console.log(senddata)
                console.log(data)
                if (data.status == 1) {
                    console.log('成功抽奖')
                    console.log(data)


                }else{

                }
            },
            error: function () {
            },
            complete: function () {
            }
        });

    });
        //点击让mask和show消失
        $("#mask,#show").click(function (event) {
            $("#mask").css("display", "none");
            $("#show").css("display", "none");
            $("body").css("overflow", "auto");
             document.body.style.overflow = "hidden";
            // 阻止向上冒泡
            if (event && event.stopPropagation()) {
                return event.stopPropagation();
            } else {
                event.cancelBubble = true;
            }
        });
        function tips(text) {
            $('.errorTip').text(text)
                .fadeIn(1000)
                .delay(2000)
                .fadeOut(500);
        }
    });


//设置一个input框只能输入一个数字，且光标自动移动到下一个input
$(document).ready(function() {
    var txts = $("#wrap input");
    for (var i = 0; i < txts.length; i++) {
        var t = txts[i];
        t.index = i;
        t.setAttribute("readonly", true);
        t.onkeyup = function() {
            this.value = this.value.replace(/^(.).*$/, '$1');
            var next = this.index + 1;
            if (next > txts.length - 1) return;
            txts[next].removeAttribute("readonly");
            txts[next].focus();
        }
    }
    txts[0].removeAttribute("readonly");
});
