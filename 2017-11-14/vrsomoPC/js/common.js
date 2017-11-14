(function ()
{
    window.hostUrl = "http://www.51baomu.cn/wcfyonghu/";
    //window.hostUrl = "http://182.92.100.44/wcf/";
    parameter = "apiKey=1&version=1.0&clientId=1&reqId=1&reqTime=99999&dataType=json";
    parameterPost = '"apiKey":"1","version":"1.0","clientId":"1","reqId":"1","reqTime":"99999","dataType":"json"';
})();

/**
* 返回
*/
function pageBack() {
    var a = window.location.href;
    if (/#top/.test(a)) {
        window.history.go(-2);
        window.location.load(window.location.href)
    } else {
        window.history.back();
        window.location.load(window.location.href)
    }
}

/**
 * 清除搜索词汇
 */
function cancelHotWord() {
    $("#keyWord").val("");
    $("#keyWord").focus();
}

/**
 * 绑定显示/隐藏bar的事件
 */
$(function () {
    if ($("#btnJdkey")) {
        $("#btnJdkey").click(function () {
            $("#jdkey").toggle();
        })
    }
    if ($("#btnJdBox")) {
        $("#btnJdBox").click(function () {
            $("#_jdBox").hide();
            $("#_jdSearch").show();
            $("#keyWord").focus()
        })
    }
    if ($("#_cancelSearch")) {
        $("#_cancelSearch").click(function () {
            $("#_jdSearch").hide();
            $("#_jdBox").show()
        })
    }
});

//type:请求方法
//url：请求url
//data：请求参数
//callback：成功回调
//errorCallback：错误回调
//GET或POST数据
function ajaxData(type, url, data, callback, errorCallback, isAsync) {
    var async=true;
    if(isAsync&&isAsync==false)
    {
        async=false;
    }
    $.ajax({
        type: type,
        url: url,
        data: data,
        dataType: "json",
        async:async,
        success: function (req) {
            if (callback) {
                callback(req);
            }
        },
        error: function () {
            if (errorCallback) {
                errorCallback();
            }
        }
    });
}
//根据参数名字获取url参数数据
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}

//获取本地存储数据
function GetLocalData(url, key) {
    var responeData = null;
    var local = window.localStorage;
    if (!local) {
        $.ajax({
            type: "GET",
            url: url,
            data: null,
            dataType: "text",
            async: false,
            success: function (data) {
                if (data) {
                    var jsonData = $.parseJSON(data);
                    if (jsonData.status == 0) {
                        responeData = data;
                    }
                }
            },
            error: function () {
                console.log("基础数据接口调用失败");
            }
        });
    }
    else {
        var data = local.getItem(key);
        if (data) {
            return data;
        }
        $.ajax({
            type: "GET",
            url: url,
            data: null,
            dataType: "text",
            async: false,
            success: function (data) {
                if (data) {
                    var jsonData = $.parseJSON(data);
                    if (jsonData.status == 0) {
                        local.removeItem(key);
                        local.setItem(key, data);
                        responeData = data;
                    }
                }
            },
            error: function () {
                console.log("基础数据接口调用失败");
            }
        });
    }
    return responeData;
}

//写cookies 
function setCookie(name, value) {
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
}

//读取cookies 
function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");

    if (arr = document.cookie.match(reg))

        return unescape(arr[2]);
    else
        return null;
}

//删除cookies 
function delCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = getCookie(name);
    if (cval != null)
        document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}

String.prototype.Trim = function () {
    return this.replace(/(^\s*)|(\s*$)/g, "");
};
Array.prototype.Contain = function (e) {
    for (i = 0; i < this.length; i++) {
        if (this[i] == e)
            return true;
    }
    return false;
}
Date.prototype.Format = function(formatStr)   
{   
    var str = formatStr;   
    var Week = ['日','一','二','三','四','五','六'];  
  
    str=str.replace(/yyyy|YYYY/,this.getFullYear());
    str=str.replace(/yy|YY/,(this.getYear() % 100)>9?(this.getYear() % 100).toString():'0' + (this.getYear() % 100));
  
    str=str.replace(/MM/,this.getMonth()>9?(this.getMonth()+1).toString():'0'+(this.getMonth()+1).toString());
    str=str.replace(/M/g,(this.getMonth()+1));
  
    str=str.replace(/w|W/g,Week[this.getDay()]);
  
    str=str.replace(/dd|DD/,this.getDate()>9?this.getDate().toString():'0' + this.getDate());
    str=str.replace(/d|D/g,this.getDate());
  
    str=str.replace(/hh|HH/,this.getHours()>9?this.getHours().toString():'0' + this.getHours());
    str=str.replace(/h|H/g,this.getHours());
    str=str.replace(/mm/,this.getMinutes()>9?this.getMinutes().toString():'0' + this.getMinutes());
    str=str.replace(/m/g,this.getMinutes());
  
    str=str.replace(/ss|SS/,this.getSeconds()>9?this.getSeconds().toString():'0' + this.getSeconds());
    str=str.replace(/s|S/g,this.getSeconds());
  
    return str;
}  
//判断是否为null
function GetNull(val) {
    if (val) {
        return val;
    }
    else {
        if (!isNaN(val)) {
            return "0";
        } else {
            return "暂无";
        }
    }
}
//判断是否为null
function GetEmpty(val) {
    if (val) {
        return val;
    }
    else {
        return " ";
    }
}
