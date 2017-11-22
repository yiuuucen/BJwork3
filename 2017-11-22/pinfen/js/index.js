//给页面fontsize自适应
setSize();
function setSize(){
    var desW =750;
    var winW = document.documentElement.clientWidth;
    if(winW>=750){
        winW = 750;
    }
    document.documentElement.style.fontSize = (winW/desW * 100) + "px";
}
window.onresize = setSize;