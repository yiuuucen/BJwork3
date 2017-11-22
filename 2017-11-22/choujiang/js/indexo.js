/**
 * Created by Administrator on 2017/6/27.
 */
$(function () {
    //请求参数
    /*无缝滚动*/
   /* var scrollDiv = $(".scroll"),
        $ul = scrollDiv.find("ul"),
        $li = scrollDiv.find("li"),
        $length = $li.length,
        $liHeight = $li.height(),
        num = 0;
    if (scrollDiv.length == 0) {
        return;
    }
    if ($length > 1) {
        $ul.append($li.eq(0).clone());
        $ul.append($li.eq(1).clone());
        $ul.append($li.eq(2).clone());
        $ul.append($li.eq(3).clone());
        $ul.append($li.eq(4).clone());
        setInterval(
            function () {
                num++;
                $ul.addClass("animate").css("-webkit-transform", "translateY(-" + $liHeight * (num) + "px)");
                setTimeout(
                    function () {
                        if (num == $length) {
                            $ul.removeClass("animate").css("-webkit-transform", "translateY(0)");
                            num = 0;
                            $(".scroll").append($ul);
                        }
                    }, 300);
            }, 3000);
    }*/




//验证码
    $(".yzmBtn").click(function (e) {
        var tel = $("input[type='tel']").val();
        if (tel.Trim().length == 0 || !(/^1[123456789][0-9]{9}$/).test(tel)) {
            tips("请输入您正确的手机号")
            return false;
        }
        $(".yzmBtn").attr("disabled",true);
        time(".yzmBtn");
        var dataStr ={"mobile":tel};
        var senddata = {
            "apiKey": "huodong",
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
            url: 'http://api.51baomu.cn/v1/Huodong/GetYZM',
            data: senddata,
            dataType: 'json',
            success: function (data) {
                console.log('yanzhegnma没成');
                console.log(senddata)
                console.log(data)

                if (data.status == 1) {
                    tips("验证码发送成功");
                    console.log('yzm成功');
                    console.log(data)
                }else {
                    tips(data.message);
                }
            },
            error: function () {
            },
            complete: function () {
            }
        });
        });
    var waitTime = 60;

    function time(o) {
        //console.log(waitTime);
        if (waitTime == 0) {
            $(o).html("获取验证码");
            $(o).attr("disabled",false);
            waitTime = 60;
        } else {
            $(o).css("background-color", "#bbb");
            $(o).html("(" + waitTime + "s)后重发");
            waitTime--;
            setTimeout(function () {
                time(o)
            }, 1000)
        }
    }


//提交
    $("#drawBtn").click(function (e) {
        var tel = $("input[type='tel']").val();
        var yzm = $("input[type='number']").val();
        var haoma1 = $("#oneh").val();
        var haoma2 = $('#twoh').val();
        var haoma3 = $('#three').val();
        if (tel.Trim().length == 0) {
            tips("手机号不能为空");
            return false;
        }
        if (yzm.Trim().length == 0 || yzm.Trim().length != 6) {
            tips("请输入正确的验证码");
            return false;
        }
        if (!(/^1[123456789][0-9]{9}$/).test(tel)) {
            tips("请输入您的手机号");
            return false;
        }
        if (!haoma1&&!haoma2&&!haoma3) {
            tips("请输入3位1-6的数字");
            return false;
        }
        if (!(haoma1>=1&&haoma1<=6)){
            tips("请输入1-6的数字");
            return false;
        }
        if (!(haoma2>=1&&haoma2<=6)){
            tips("请输入1-6的数字");
            return false;
        }
        if (!(haoma3>=1&&haoma3<=6)){
            tips("请输入1-6的数字");
            return false;
        }

        var dataStr = {'mobile':tel,'yanzhengma':yzm,'haoma1':haoma1,'haoma2':haoma2,'haoma3':haoma3};
        var senddata = {
            "apiKey": "danzi",
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
            url: 'http://api.51baomu.cn/v1/Huodong/Choujiang',
            data: senddata,
            dataType: 'json',
            success: function (data) {
                console.log('没成功')
                console.log(senddata)
                console.log(data)
                if (data.status == 1) {
                    console.log('成功抽奖')
                    console.log(data)
                    tips("成功抽奖");

                    $("#oneh").readonly=true;
                    $('#twoh').readonly=true;
                    $('#three').readonly=true;

                }else{
                    tips(data.message);
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
