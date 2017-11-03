<div id="mobileFoot">
<footer>
	<div class="foot-2017">
    <div class="newWrap">
        <div class="link-2017">
            <dl class="clearfix" id="friend-2017">
                <dt>友情链接</dt>
                <dd><a href="http://so.jiameng.com/" target="_blank">品牌项目查询</a></dd>
                <dd><a href="http://www.zywsw.com/" target="_blank">职业病</a></dd>
                <dd><a href="http://www.39clean.com/" target="_blank">武汉家政网</a></dd>
                <dd><a href="http://www.szxmsj.com/" target="_blank">深圳家政公司</a></dd>
                <dd><a href="http://bj.ganji.com/zpbaomu/" target="_blank">北京保姆招聘</a></dd>
                <dd><a href="http://bj.ganji.com/baojie/" target="_blank">北京保洁</a></dd>
                <dd><a href="http://top.91jm.com/ " target="_blank">加盟项目排行</a></dd>
            </dl>
        </div>
    </div>
    <div class="foot-nav-2017">
        <a href="http://www.51baomu.cn/baomu1-0-1-0-0-0-0-0-0-1-1-0-0.html" target="_blank">保姆</a> - <a href="http://www.51baomu.cn/baomu1-0-3-0-0-0-0-0-0-1-1-0-0.html" target="_blank">月嫂</a> - <a href="http://www.51baomu.cn/baomu1-0-4-0-0-0-0-0-0-1-1-0-0.html" target="_blank">育儿嫂</a> - <a href="http://www.51baomu.cn/baomu1-0-5-0-0-0-0-0-0-1-1-0-0.html" target="_blank">小时工</a> - <a href="http://www.51baomu.cn/hugong.aspx" target="_blank">护工</a> - <a href="http://www.51baomu.cn" target="_blank">家政</a> - <a href="http://www.51baomu.cn" target="_blank">无忧保姆</a>
    </div>
    <div class="foot-nav-2017 foot-nav2-2017">
        <a href="http://www.51baomu.cn/baomu1-921-0-0-0-0-0-0-0-1-1-0-0.html" target="_blank">热门城市</a> | <a href="http://www.51baomu.cn/aboutinfo/contact.html" target="_blank">附近城市</a> | <a href="http://www.51baomu.cn/wiki/" target="_blank">老版家政百科</a>
    </div>
    <div class="foot-copy-2017">
        <p>Copyright &copy;2008-2017【无忧保姆】 北京家事无忧家政服务有限公司 | 北京市公安局朝阳分局备案编号 110105052337 | 京ICP备号-3 | 京公网安备 11011502017947</p>
        <img src="<?php bloginfo('template_url');?>/images/foot-img01.png" alt=""><img src="<?php bloginfo('template_url');?>/images/foot-img02.png" alt="">
    </div>
</div>
</footer>
</div>
<script type="text/javascript">
$(function(){
	function IsPC() {
            var userAgentInfo = navigator.userAgent;
            //alert(userAgentInfo);
            var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
            var flag = true;
            for (var v = 0; v < Agents.length; v++) {
                if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
            }
            return flag;
        }
        var isMobile = IsPC();
        if (isMobile == false) {
            $('#mobileFoot').css('display','none');
        }
})
</script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery-1.11.0.min.js"></script>
<!--framework-->
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/bootstrap.min.js"></script>
<!--framework-->
<script type="text/javascript">
$(document).ready(function(){
	$('a.click-top').click(function () {
		$('body,html').animate({scrollTop: 0}, 900);
		return false;
	});
	$('.avatar img').removeAttr('height');
	if($.browser.msie && ($.browser.version == '6.0' || $.browser.version == '7.0')) {
		alert("您的浏览器版本过低，请尽快升级IE8或更高版本的浏览器，否则会影响网页性能和操作！");
		return;
	}	
});
</script>
<!--请保留博客吧网址，尊重作者劳动，谢谢-->
<?php wp_footer();?>
</body>
</html>