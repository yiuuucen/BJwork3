<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php if ( $paged > 1 ) {echo ('第'); echo ($paged); echo '页'; if(get_option('leonhere_separator')){ echo ' '.get_option('leonhere_separator').' ';	}else {	echo '_';}}?><?php if (is_home () ) {if(get_option('leonhere_title')){echo get_option('leonhere_title');}else {bloginfo('name'); if(get_option('leonhere_separator')){echo ' '.get_option('leonhere_separator').' ';}else {echo '_';} bloginfo('description');}	} elseif ( is_category() ) {single_cat_title(); if(get_option('leonhere_separator')){ echo ' '.get_option('leonhere_separator').' ';}else {echo '_';} bloginfo('name'); } elseif (is_single() || is_page() ) {single_post_title(); if(get_option('leonhere_separator')){ echo ' '.get_option('leonhere_separator').' ';	}else {echo '_';}bloginfo('name'); } elseif (is_search() ) {bloginfo('name'); echo "search results:"; echo wp_specialchars($s); } else { wp_title('',true); if(get_option('leonhere_separator')){ echo ' '.get_option('leonhere_separator').' ';}else {	echo '_';} bloginfo('name'); } ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if(is_home()){?>
<meta name="keywords" content="家政知识,家政注意事项,如何找家政"/>
<meta name="description" content="无忧保姆网『家政百科』频道为您提供详细实用的家政知识，帮您轻松掌握如何找家政、如何找保姆月嫂育儿嫂等技巧和找保姆注意事项、请月嫂注意事项等知识。无忧保姆，保您无忧。"/>
<?php }elseif(is_single()){ $description = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"");	?>
<meta name="keywords" content="<?php tagtext();?>"/>
<meta name="description" content="<?php echo $description;?>"/>
<?php }elseif(is_category()){ 
	$cat_des = strip_tags(category_description());	
?>
<meta name="description" content="『家政百科』家政知识_注意事项_如何找保姆月嫂育儿嫂 - 无忧保姆网"/>
<?php } ?>
<!--framework-->
<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/bootstrap.min.css" media="screen"/>
<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/iconfont.css" media="screen"/>
<!--framework-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<!--[if lt IE 9]><script src="<?php bloginfo('template_url');?>/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url');?>/js/html5shiv.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/respond.min.js"></script>
<![endif]-->
<script>
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
  var msViewportStyle = document.createElement("style")
  msViewportStyle.appendChild(
    document.createTextNode(
      "@-ms-viewport{width:auto!important}"
    )
  )
  document.getElementsByTagName("head")[0].appendChild(msViewportStyle)
}
</script>
<?php if(is_singular()) wp_enqueue_script('comment-reply');?>
<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<!--<header>
	<div class="container" id="header">
	<div class="row">-->
		<!--<div class="col-xs-4 col-sm-2 logo">
			<h1><a href="<?php bloginfo('home'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('template_url');?>/images/logo.png" alt="<?php bloginfo('name'); ?>"></a></h1>
		</div>-->
		<!--<div class="col-xs-5 col-sm-8 col-sm-offset-2 col-xs-offset-3  banner">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
<!-- 自适应广告 -->
<!--<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9642311778195731"
     data-ad-slot="6411638153"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		</div>
	</div>
	</div>
</header>-->
<!--<script type="text/javascript" src="js/header.js"></script>-->
<div id="shortcut">
<!--<div class="headerBox">
            <div class="newWrap clearFix header"><a href="http://www.51baomu.cn/RegHousemaid.aspx" class="fl bdnone">保姆登记</a><a href="http://www.51baomu.cn/aboutinfo/maphousemaid.aspx" class="fl">保姆分布</a><a href="http://www.51baomu.cn/wiki/index.php" class="fl">无忧快报</a><a href="http://www.51baomu.cn/topic/zhaobaomu.aspx" class="fl">如何找保姆？</a><a href="http://www.51baomu.cn/calcsalary.aspx" class="fl">保姆工资计算器</a><span class="fuwuTel">服务热线 <strong>4006093600</strong></span><div class="fr top_gfwxNew">官方微信<img src="<?php bloginfo('template_url');?>/images/top_line1.jpg" alt="更多关于保姆，月嫂，育儿嫂，小时工，育婴师，钟点工的信息，关注享受更多优惠" class="top_line" /><div class="top_hidden top_client top_letter"><strong class="base_color">无忧保姆</strong><p class="mt5">预定服务，在线抢红包<br />
                更多优惠，扫我吧</p>
            </div>
            </div>
                <div class="fr top_gfwxNew top_khd">APP下载<img src="<?php bloginfo('template_url');?>/images/top_line1.jpg" alt="手机找保姆，月嫂，育儿嫂，小时工，育婴师，钟点工，尽在无忧保姆客户端" class="top_line" /> <a href="http://www.51baomu.cn/client.html" target="_blank"><div class="top_hidden top_client" id="newClient"><strong class="base_color">无忧保姆（iOS&android手机）</strong><p class="mt5">手机上选保姆，在线支付<br />
                    更多优惠，扫我吧</p>
                </div></a>
                </div>
                <div class="fr top_gfwxNew">我的账户<img src="<?php bloginfo('template_url');?>/images/top_line1.jpg" alt="" class="top_line" /><div class="top_hidden top_myAccount"><a href="http://www.51baomu.cn/usercenter/main.aspx">我的资料</a><span>&nbsp;</span><a href="http://www.51baomu.cn/usercenter/mycontract.aspx">我的合同</a><span>&nbsp;</span><a href="http://www.51baomu.cn/usercenter/myorder.aspx">我的订单</a><span>&nbsp;</span><a href="http://www.51baomu.cn/usercenter/mysurance.aspx">我的保险</a></div>
                </div>
                <div class="fr top_gfwxNew"><a href="http://www.51baomu.cn/aboutinfo/contact.html" class="fr colorF" rel="nofollow">联系我们</a><img src="<?php bloginfo('template_url');?>/images/top_line1.jpg" alt="" class="top_line" /><div class="top_hidden top_myAccount top_contact"><a href="http://www.51baomu.cn/aboutinfo/contact-beijing.html" rel="nofollow">北京</a><a href="http://www.51baomu.cn/aboutinfo/contact-shanghai.html" rel="nofollow">上海</a><a href="http://www.51baomu.cn/aboutinfo/contact-tianjin.html" rel="nofollow">天津</a><a href="http://www.51baomu.cn/aboutinfo/contact-chengdu.html" rel="nofollow">成都</a><a href="http://www.51baomu.cn/aboutinfo/contact-dalian.html" rel="nofollow">大连</a><a href="http://www.51baomu.cn/aboutinfo/contact-shenzheng.html" rel="nofollow">深圳</a><a href="http://www.51baomu.cn/aboutinfo/contact-changsha.html" rel="nofollow">长沙</a><a href="http://www.51baomu.cn/aboutinfo/contact-chongqing.html" rel="nofollow">重庆</a><a href="http://www.51baomu.cn/aboutinfo/contact-guangzhou.html" rel="nofollow">广州</a><a href="http://www.51baomu.cn/aboutinfo/contact-qingdao.html" rel="nofollow">青岛</a><a href="http://www.51baomu.cn/aboutinfo/contact-zhengzhou.html" rel="nofollow">郑州</a><a href="http://www.51baomu.cn/aboutinfo/contact-wuhan.html" rel="nofollow">武汉</a></div>
                </div>
                <div class="fr clearFix newDLZC" id="logreginfo" runat="server"><a href="http://www.51baomu.cn/denglukuaisu.aspx?rklx=1" class="fr bdnone">注册</a></div>
            </div>
        </div>-->
        <div class="headerBox">
            <div class="newWrap clearFix header"><div class="fl top_gfwxNew"><a href="<%=ResolveUrl("~/aboutinfo/contact.html")%>" class="fr colorF" rel="nofollow">全国分店</a><img src="<?php bloginfo('template_url');?>/images/top_line1.jpg" alt="" class="top_line top_line_left" /><div class="top_hidden top_myAccount top_contact" id="getCity"></div>
                </div><a href="http://www.51baomu.cn/RegHousemaid.aspx" class="fl bdnone" rel="nofollow">保姆登记</a><a href="http://www.51baomu.cn/aboutinfo/maphousemaid.aspx" class="fl" rel="nofollow">保姆分布</a><a href="http://www.51baomu.cn/wiki/" class="fl" rel="nofollow">无忧快报</a><a href="http://www.51baomu.cn/topic/zhaobaomu.aspx" class="fl" rel="nofollow">如何找保姆？</a><a href="http://www.51baomu.cn/calcsalary.aspx" class="fl" rel="nofollow">保姆工资计算器</a><span class="fuwuTel">服务热线 <strong>4006093600</strong></span><div class="fr top_gfwxNew">官方微信<img src="<%=ResolveUrl("~/img_new/top_line1.jpg")%>" alt="更多关于保姆，月嫂，育儿嫂，小时工，育婴师，钟点工的信息，关注享受更多优惠" class="top_line" /><div class="top_hidden top_client top_letter"><strong class="base_color">无忧保姆微信公众号</strong><p class="mt5">预订保姆、在线抢红包，<br/>扫码关注获取更多优惠信息</p>
            </div>
            </div>
                <div class="fr top_gfwxNew top_khd">APP下载<img src="<?php bloginfo('template_url');?>/images/top_line1.jpg" alt="手机找保姆，月嫂，育儿嫂，小时工，育婴师，钟点工，尽在无忧保姆客户端" class="top_line" /> <div class="top_hidden top_client" id="newClient"><strong class="base_color">无忧保姆APP</strong><p class="mt5">手机选保姆更便捷，在线支付优惠更多，扫码下载</p>
                </div>
                </div>
                <div class="fr top_gfwxNew">我的账户<img src="<?php bloginfo('template_url');?>/images/top_line1.jpg" alt="" class="top_line" /><div class="top_hidden top_myAccount"><a href="http://www.51baomu.cn/usercenter/main.aspx" rel="nofollow">我的资料</a><span>&nbsp;</span><a href="http://www.51baomu.cn/usercenter/mycontract.aspx" rel="nofollow">我的合同</a><span>&nbsp;</span><a href="http://www.51baomu.cn/usercenter/myorder.aspx" rel="nofollow">我的订单</a><span>&nbsp;</span><a href="http://www.51baomu.cn/usercenter/mysurance.aspx" rel="nofollow">我的保险</a><span>&nbsp;</span><a href="http://www.51baomu.cn/usercenter/mybalance.aspx" rel="nofollow">我的钱包</a></div>
                </div>
                
                <div class="fr clearFix newDLZC" id="logreginfo" runat="server"><a href="http://www.51baomu.cn/denglukuaisu.aspx?rklx=1" class="fr bdnone">注册</a></div>
            </div>
        </div>
</div>
<!--pagelogo start-->
<div class="newHeaderBox">
<div id="header" class="newWrap newMidHeader">
	<div id="logo">
        <a href="http://www.51baomu.cn">
            <img alt="保姆网_家政_保姆_月嫂_育儿嫂_育婴师_小时工_钟点工-无忧保姆网" src='<?php bloginfo('template_url');?>/images/newLogo.jpg' width="191" height="55" /></a>
    </div>
    <div id="hotline">
    	<div id="divLike">
            <div class="bdlikebutton" id="bdlike"></div>
        </div>
        <script id="bdlike_shell"></script>
        <script>
            var bdShare_config = {
                "type": "small",
                "color": "blue"
            };
            document.getElementById("bdlike_shell").src = "http://bdimg.share.baidu.com/static/js/like_shell.js?t=" + Math.ceil(new Date() / 3600000);
        </script>
        <!-- Baidu Button BEGIN -->        

        <div>
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                <span class="bds_more">分享</span>
                <a class="shareCount"></a>
            </div>
            <script type="text/javascript" id="Script1" data="type=tools&amp;uid=3472405"></script>
            <script type="text/javascript" id="Script2"></script>
        </div>
        <script type="text/javascript" id="bdshare_js" data="type=tools"></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
        </script>
    </div>
    <div class="form">
    	<a href="http://www.51baomu.cn/default.aspx"><img src="<?php bloginfo('template_url');?>/images/pagelogo.png"/></a>
    </div>
    <div id="brand-bar">
		<dl class="slogens">
		<dd class="newFore1"><a  href="http://www.51baomu.cn/topThree.aspx?#1" title="如果您是注册用户，您可以直接在网站上预约您挑好的几位保姆，无忧保姆网的工作人员会跟您取得联系并安排这些保姆跟您约定时间面试。"><span>在线预约</span></a></dd>
		<dd class="newFore2"><a  href="http://www.51baomu.cn/topThree.aspx?#2" title="当您看好某位保姆，您可以直接用QQ或电话跟这位保姆的管理员联系，无忧保姆网的保姆管理员可以打开视频，方便您直接和这位保姆视频面谈。"><span>视频面试</span></a></dd>
		<dd class="newFore3"><a  href="http://www.51baomu.cn/topThree.aspx?#3" title="如果您看好某位保姆，但因为比较繁忙而无时间去公司面试这位保姆或挑选其他保姆，无忧保姆网的工作人员可以安排保姆上门让您面试，不过需要收取一定的上门费，具体额度请咨询工作人员。"><span>送人上门</span></a></dd>
	</dl>
			
	</div>
    <div class="new400 fr"><img src="<?php bloginfo('template_url');?>/images/new400.jpg" alt=""/></div> 
</div>
</div>
<!--pagelogo end-->
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery-1.11.0.min.js"></script>
<script>
$(function(){
	$('.top_gfwx').mouseenter(function () {
        $thisItem = $(this);
        var inx = $thisItem.index();
        if (inx == 4 || inx == 3) {
            $thisItem.css('background-color', '#7CD0B4');
            $thisItem.css({ 'color': '#fff6a8', 'background-image': 'url(<?php bloginfo('template_url');?>/images/headerArrow2.jpg)' });
        }
        if (inx == 5) {
            $thisItem.css({ 'color': '#fff6a8', 'background-image': 'url(<?php bloginfo('template_url');?>/images/headerArrow3.jpg)' });
        }
        $thisItem.find('.top_hidden').css('display', 'block');
    }).mouseleave(function () {
        $thisItem = $(this);
        var inx = $thisItem.index();
        if (inx == 4 || inx == 3) {
            $thisItem.css('background-color', '#29BA8A');
        }
        $thisItem.css({ 'color': '#fff', 'background-image': 'url(<?php bloginfo('template_url');?>/images/headerArrow1.jpg)' });
        $thisItem.find('.top_hidden').css('display', 'none');
    });
	$('.top_gfwxNew').mouseenter(function () {
            $thisItem = $(this);
            var inx = $thisItem.index();
            
            if (inx == 4 || inx == 3) {
                $thisItem.css('background-color', '#DFDFDF');
                $thisItem.css({ 'color': '#666', 'background-image': 'url(<?php bloginfo('template_url');?>/images/headerArrow2.png)' });
            }
            if (inx == 5) {
                $thisItem.css({ 'color': '#666', 'background-image': 'url(<?php bloginfo('template_url');?>/images/headerArrow2.png)' });
            }
            $thisItem.find('.top_hidden').css('display', 'block');
        }).mouseleave(function () {
            $thisItem = $(this);
            var inx = $thisItem.index();
            if (inx == 4 || inx == 3) {
                $thisItem.css('background-color', '#f9f9f9');
            }
            $thisItem.css({ 'color': '#666', 'background-image': 'url(<?php bloginfo('template_url');?>/images/headerArrow1.png)' });
            $thisItem.find('.top_hidden').css('display', 'none');
        });
	
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
            $('#shortcut,.newHeaderBox,#nav').css('display','none');
			$('#mobileBack').css('display','block');
        }
})
</script>
<?php if(!is_home()){?>
<div id="mobileBack"><a href="javascript:history.back();">返回</a></div>
<?php }?>

<nav id="nav" class="navbar navbar-default" role="navigation">
	<!--<div class="container h100">
    	<div class="col-xs-4 col-sm-2 logo">
			<h1><a href="http://www.51baomu.cn/index.aspx" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('template_url');?>/images/logo.png" alt="<?php bloginfo('name'); ?>"></a></h1>
		</div>
		<ul id="navAdd">
        	<li><a href="http://www.51baomu.cn/">首页</a></li>
            <li><a href="http://www.51baomu.cn/baomu1-0-1-0-0-0-0-0-0-1-1-0-0.html">住家保姆</a></li>
            <li><a href="http://www.51baomu.cn/baomu1-0-2-0-0-0-0-0-0-1-1-0-0.html">不住家保姆</a></li>
            <li><a href="http://www.51baomu.cn/baomu1-0-3-0-0-0-0-0-0-1-1-0-0.html">月嫂</a></li>
            <li><a href="http://www.51baomu.cn/baomu1-0-4-0-0-0-0-0-0-1-1-0-0.html">育儿嫂</a></li>
            <li><a href="http://www.51baomu.cn/baomu1-0-5-0-0-0-0-0-0-1-1-0-0.html">小时工</a></li>
            <li><a href="http://www.51baomu.cn/baomu1-0-0-84-0-0-0-0-0-1-1-0-0.html">照顾老人</a></li>
            <li><a href="http://www.51baomu.cn/xiaoshigong.aspx">临时小时工</a></li>
            <li><a href="http://www.51baomu.cn/searchbyid.aspx">编号搜索</a></li>
            <li class="active"><a href="http://www.51baomu.cn/wiki/index.php">家政百科</a></li>
        </ul>
	</div>-->
		<!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			<?php wp_nav_menu( array('theme_location' =>'header-menu','container' => '','container_class' => '','menu_class' => '','depth' => 0,'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>')); ?>
			<ul class="nav navbar-nav navbar-right social">
				<a target="_blank" href="<?php echo stripslashes(get_option('leonhere_weibo'));?>" rel="nofollow" class="weibo"></a> 
				<a target="_blank" href="<?php echo stripslashes(get_option('leonhere_qqweibo'));?>" rel="nofollow" class="qqweibo"></a> 
				<a target="_blank" href="<?php echo stripslashes(get_option('leonhere_facebook'));?>" rel="nofollow" class="fb"></a> 
				<a target="_blank" href="<?php echo stripslashes(get_option('leonhere_twitter'));?>" rel="nofollow" class="tw"></a> 
				<a target="_blank" href="<?php echo stripslashes(get_option('leonhere_in'));?>" rel="nofollow" class="in"></a>			
			</ul>
		</div>-->	
	<div class="newNavBox">
<div id="nav-2015" class="newWrap">
    <ul id="navitems-2015" class="clearFix">
        <li class="<%=sCurrentCss2 %>" id="navZjz">
            <a href='http://www.51baomu.cn/baomu1-0-1-0-0-0-0-0-0-1-1-0-0.html'>找家政</a>
            
        </li>
        <li class="<%=sCurrentCss3 %>" id="Li7"><a href='http://www.51baomu.cn/zhaoguzhu.aspx'>找雇主</a></li>
        <li class="<%=sCurrentCss4 %>" id="Li8"><a href='http://www.51baomu.cn/paihangbang.aspx'>排行榜</a></li>
        <li class="<%=sCurrentCss5 %>" id="Li9"><a href='http://www.51baomu.cn/wenda.aspx'>问答</a></li>
        <li class="newActive" id="Li10"><a href='http://www.51baomu.cn:89/wiki/' >家政百科</a></li>
        <li class="<%=sCurrentCss1 %>" id="Li5"><a href='http://www.51baomu.cn/huodong.aspx'>活动</a></li>
        <li class="<%=sCurrentCss1 %>" id="peixun"><a href='javascript:;'>培训</a><img src="<%=ResolveUrl("~/img_new/newPeixun.gif")%>" alt="" /><div><a href="http://www.51baomu.cn/activityPeixun.html">母婴护理师</a><a href="http://www.51baomu.cn/activityYuying.html">育婴早教师</a></div></li>
    </ul>
</div>
<div class="newSubNavBox">
	<ul class="clearFix newSubNav">
                <li><a href="http://www.51baomu.cn/baomu1-0-1-0-0-0-0-0-0-1-1-0-0.html">住家保姆</a></li>
                <li><a href="http://www.51baomu.cn/baomu1-0-2-0-0-0-0-0-0-1-1-0-0.html">不住家保姆</a></li>
                <li><a href="http://www.51baomu.cn/baomu1-0-3-0-0-0-0-0-0-1-1-0-0.html">月嫂</a></li>
                <li><a href="http://www.51baomu.cn/baomu1-0-4-0-0-0-0-0-0-1-1-0-0.html">育儿嫂</a></li>
                <li><a href="http://www.51baomu.cn/baomu1-0-5-0-0-0-0-0-0-1-1-0-0.html">小时工</a></li>
                <li><a href="http://www.51baomu.cn/xiaoshigong.aspx">临时小时工</a></li>
                <li><a href="http://www.51baomu.cn/hugong.aspx">护工</a></li>
            </ul>
</div>
</div>
</nav>
<script>
    $(function(){
        /*if($("#navZjz").hasClass('newActive')){
            $('.newSubNav,.newSubNavBox').css('display','block');
            $(this).children("a").css({"color":"#1ABB89","background-color":"#fff","border-radius":"4px 4px 0 0"});
        }
        else{
            $("#navZjz").mouseenter(function(){
                //$('.newSubNav,.newSubNavBox').css('display','block');
                $('.newSubNav,.newSubNavBox').stop().fadeIn(500);
                $(this).children("a").css({"color":"#1ABB89","background-color":"#fff","border-radius":"4px 4px 0 0","height":"44px"});
            }).mouseleave(function(){
                //$('.newSubNav,.newSubNavBox').css('display','none');
                $('.newSubNav,.newSubNavBox').stop().fadeOut(500);
                $(this).children("a").css({"color":"#fff","background-color":"#1ABB89","border-radius":"4px 4px 0 0"});
            })
        }*/
		$("#peixun").mouseenter(function(){
            $(this).addClass("newActive").children("div").css('display','block');
        }).mouseleave(function(){
            $(this).removeClass("newActive").children("div").css('display','none');
        });
    })
</script>
<!--<div id="breadcrumb" class="container">	
	<?php get_breadcrumbs();?>
</div>-->