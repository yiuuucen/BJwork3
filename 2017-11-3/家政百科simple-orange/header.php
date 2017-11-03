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
    <div class="newWrap">
        <div class="headerBox">
            <div class="newWrap clearFix header"><div class="fl top_gfwxNew"><a href="http://www.51baomu.cn/aboutinfo/contact.html" class="fr colorF" rel="nofollow">全国分店</a><div class="top_hidden top_myAccount top_contact" id="getCity" style="display: none;"><a href="http://www.51baomu.cn/aboutinfo/contact-beijing.html" rel="nofollow">北京</a><a href="http://www.51baomu.cn/aboutinfo/contact-shanghai.html" rel="nofollow">上海</a><a href="http://www.51baomu.cn/aboutinfo/contact-tianjin.html" rel="nofollow">天津</a><a href="http://www.51baomu.cn/aboutinfo/contact-chengdu.html" rel="nofollow">成都</a><a href="http://www.51baomu.cn/aboutinfo/contact-dalian.html" rel="nofollow">大连</a><a href="http://www.51baomu.cn/aboutinfo/contact-shenzhen.html" rel="nofollow">深圳</a><a href="http://www.51baomu.cn/aboutinfo/contact-changsha.html" rel="nofollow">长沙</a><a href="http://www.51baomu.cn/aboutinfo/contact-chongqing.html" rel="nofollow">重庆</a><a href="http://www.51baomu.cn/aboutinfo/contact-guangzhou.html" rel="nofollow">广州</a><a href="http://www.51baomu.cn/aboutinfo/contact-qingdao.html" rel="nofollow">青岛</a><a href="http://www.51baomu.cn/aboutinfo/contact-zhengzhou.html" rel="nofollow">郑州</a><a href="http://www.51baomu.cn/aboutinfo/contact-wuhan.html" rel="nofollow">武汉</a><a href="http://www.51baomu.cn/aboutinfo/contact-nanjing.html" rel="nofollow">南京</a><a href="http://www.51baomu.cn/aboutinfo/contact-hangzhou.html" rel="nofollow">杭州</a><a href="http://www.51baomu.cn/aboutinfo/contact-suzhou.html" rel="nofollow">苏州</a><a href="http://www.51baomu.cn/aboutinfo/contact-fuzhou.html" rel="nofollow">福州</a><a href="http://www.51baomu.cn/aboutinfo/contact-haikou.html" rel="nofollow">海口</a><a href="http://www.51baomu.cn/aboutinfo/contact-jinan.html" rel="nofollow">济南</a><a href="http://www.51baomu.cn/aboutinfo/contact-xian.html" rel="nofollow">西安</a><a href="http://www.51baomu.cn/aboutinfo/contact-hefei.html" rel="nofollow">合肥</a><a href="http://www.51baomu.cn/aboutinfo/contact-foshan.html" rel="nofollow">佛山</a><a href="http://www.51baomu.cn/aboutinfo/contact-dongguan.html" rel="nofollow">东莞</a></div>
                </div><a href="<http://www.51baomu.cn/RegHousemaid.aspx" class="fl bdnone" rel="nofollow">保姆登记</a><a href="http://www.51baomu.cn/aboutinfo/maphousemaid.aspx" class="fl" rel="nofollow">保姆分布</a><a href="http://www.51baomu.cn/wiki/" class="fl" rel="nofollow">无忧快报</a><a href="http://www.51baomu.cn/topic/zhaobaomu.aspx" class="fl" rel="nofollow">如何找保姆？</a><a href="http://www.51baomu.cn/calcsalary.aspx" class="fl" rel="nofollow">保姆工资计算器</a><span class="fuwuTel">服务热线 <strong>4006093600</strong></span><div class="fr top_gfwxNew">官方微信<img src="<?php bloginfo('template_url');?>/img_new/top_line1.jpg" alt="更多关于保姆，月嫂，育儿嫂，小时工，育婴师，钟点工的信息，关注享受更多优惠" class="top_line" /><div class="top_hidden top_client top_letter"><strong class="base_color">无忧保姆微信公众号</strong><p class="mt5">预订保姆、在线抢红包，<br/>扫码关注获取更多优惠信息</p>
            </div>
            </div>
                <div class="fr top_gfwxNew top_khd">APP下载<img src="<?php bloginfo('template_url');?>/img_new/top_line1.jpg" alt="手机找保姆，月嫂，育儿嫂，小时工，育婴师，钟点工，尽在无忧保姆客户端" class="top_line" /> <div class="top_hidden top_client" id="newClient"><strong class="base_color">无忧保姆APP</strong><p class="mt5">手机选保姆更便捷，在线支付优惠更多，扫码下载</p>
                </div>
                </div>
                <div class="fr top_gfwxNew">我的账户<img src="<?php bloginfo('template_url');?>/img_new/top_line1.jpg" alt="" class="top_line" /><div class="top_hidden top_myAccount"><a href="http://www.51baomu.cn/Login.aspx?returnurl=http%3a%2f%2fwww.51baomu.cn%2fusercenter%2fmain.aspx" rel="nofollow">我的资料</a><span>&nbsp;</span><a href="http://www.51baomu.cn/Login.aspx?returnurl=http%3a%2f%2fwww.51baomu.cn%2fusercenter%2fmycontract.aspx" rel="nofollow">我的合同</a><span>&nbsp;</span><a href="http://www.51baomu.cn/Login.aspx?returnurl=http%3a%2f%2fwww.51baomu.cn%2fusercenter%2fmyorder.aspx" rel="nofollow">我的订单</a><span>&nbsp;</span><a href="http://www.51baomu.cn/Login.aspx?returnurl=http%3a%2f%2fwww.51baomu.cn%2fusercenter%2fmysurance.aspx" rel="nofollow">我的保险</a><span>&nbsp;</span><a href="http://www.51baomu.cn/Login.aspx?returnurl=http%3a%2f%2fwww.51baomu.cn%2fusercenter%2fmybalance.aspx" rel="nofollow">我的钱包</a></div>
                </div>
                
                <div class="fr clearFix newDLZC" id="logreginfo" runat="server"><a href="http://www.51baomu.cn/Login.aspx?returnurl=http%3a%2f%2fwww.51baomu.cn%2fusercenter%2fmain.aspx" class="fr" rel="nofollow">登录</a><a href="http://www.51baomu.cn/denglukuaisu.aspx?rklx=1" class="fr bdnone" id="registerBtn"  onclick="_hmt.push(['_trackEvent', '注册按钮', 'click'])" rel="nofollow">注册</a></div>
               <!--  <div class="fr clearFix" id="logoutinfo" runat="server">您好,<%= sUserName %>！<span><a href='ResolveUrl("~/logout.aspx")'>[退出]</a></span></div> -->
            </div>
        </div>
    </div>
</div>
<!--pagelogo start-->
<div class="newHeaderBox">
    <div id="header" class="newWrap newMidHeader">
    <div id="logo">
        <a href="http://www.51baomu.cn">
            <img alt="保姆网_家政_保姆_月嫂_育儿嫂_育婴师_小时工_钟点工-无忧保姆网" src='http://www.51baomu.cn/img_new/2017/logo.jpg' width="180" height="34" /></a>
    </div>
    <div id="hotline">专注家政服务9年</div>
    <div id="search-total">

    <div id="search-2013">
                <div class="i-search ld">
                    <div class="form"><!-- <asp:TextBox ID="tbSeachword" runat="server" CssClass="text" Text="请输入地点、保姆类型、保姆籍贯或保姆能力..."></asp:TextBox> -->
                        <input class='text' type="text" placeholder='请输入地点、保姆类型、保姆籍贯或保姆能力...'>
                        <input type="button" value="找阿姨" id="btnSearch" class="button" />
                    </div>
                </div>
    </div>

    </div>

    <div id="brand-bar">
        <dl class="slogens">
        <dd class="newFore1"><a  href="http://www.51baomu.cn/sem/baidu/sousuo/0901/index.html#nanny" title="" rel="nofollow"><span>41万保姆</span></a></dd>
        <dd class="newFore2"><a  href="http://www.51baomu.cn/sem/baidu/sousuo/0901/index.html#safety"  title="" rel="nofollow"><span>六重安全</span></a></dd>
        <dd class="newFore3"><a  href="http://www.51baomu.cn/sem/baidu/sousuo/0901/index.html#service"  title="" rel="nofollow"><span>免费更换</span></a></dd>
    </dl>
            
    </div>
    <div class="new400 fr"><img src="<?php bloginfo('template_url');?>/img_new/new400.jpg" alt=""/></div>

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

<div class="newNavBox" id="newNavBox">
<div id="nav-2015" class="newWrap">
    <ul id="navitems-2015" class="clearFix">
        <li class="active" id="navZjz">
            <a href='http://www.51baomu.cn' target="_blank">首页</a>
        </li>
        <li class="" id="peixun"><a href='http://www.51baomu.cn/Default.aspx' target="_blank">家政服务</a><div><a href="http://www.51baomu.cn/baomu1-0-1-0-0-0-0-0-0-1-1-0-0.html" target="_blank">住家保姆</a><a href="http://www.51baomu.cn/baomu1-0-2-0-0-0-0-0-0-1-1-0-0.html" target="_blank">不住家保姆</a><a href="http://www.51baomu.cn/baomu1-0-3-0-0-0-0-0-0-1-1-0-0.html" target="_blank">月嫂</a><a href="http://www.51baomu.cn/baomu1-0-4-0-0-0-0-0-0-1-1-0-0.html" target="_blank">育儿嫂</a><a href="http://www.51baomu.cn/baomu1-0-5-0-0-0-0-0-0-1-1-0-0.html" target="_blank">小时工</a><a href="http://www.51baomu.cn/xiaoshigong.aspx" target="_blank">临时小时工</a><a href="http://www.51baomu.cn/hugong.aspx" target="_blank">护工</a><a href="http://www.gomegj.com/repairindex.html?channel=95&cmpid=pc_wuyoubaomu_repair_cps 
" target="_blank" rel="nofollow">家电维修</a><a href="http://www.gomegj.com/cleanindex.html?channel=95&cmpid=pc_wuyoubaomu_clean_cps" target="_blank" rel="nofollow">家电清洗</a></div></li>
        <li class="" id="Li8"><a href='http://www.51baomu.cn/sem/baidu/sousuo/0901/index.html' target="_blank" rel="nofollow">公司荣誉</a></li>
        <li class="" id="Li9"><a href='http://www.51baomu.cn/baike/meitibaodao' target="_blank">媒体报道</a></li>
        <li class="" id="Li10"><a href='http://www.51baomu.cn/sem/baidu/sousuo/0901/index.html#evaluate'  target="_blank">客户评价</a></li>
        <li class="" id="Li5"><a href='http://www.51baomu.cn/baike/' target="_blank">家政百科</a></li>
        <li class=""><a href='http://www.51baomu.cn/aboutinfo/about.aspx' target="_blank">公司介绍</a></li>
        <li class=""><a href='http://shop.51baomu.cn/' target="_blank" rel="nofollow">无忧商城</a></li>
    </ul>
</div>
</div>
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
        $("#btnSearch").click(function () {
                if ($(".form .text").val() == '' || $(".form .text").val() == '请输入地点、保姆类型、保姆籍贯或保姆能力...') {
                    alert("请输入地点、保姆类型、保姆籍贯或保姆能力...");
                    $(".form .text").focus();
                }
                else {
                    location.href = 'http://www.51baomu.cn/baomusousuo1-0-0-0-0-0-0-0-0-1-1-0-0-' +$(".form .text").val();
                }
        });
    })
</script>
<!--<div id="breadcrumb" class="container">	
	<?php get_breadcrumbs();?>
</div>-->
<script type="text/javascript">
    $(function () {
        $('.top_gfwxNew').mouseenter(function () {
            $thisItem = $(this);
            var inx = $thisItem.index();
            
            if (inx == 4 || inx == 3) {
                $thisItem.css('background-color', '#DFDFDF');
                $thisItem.css({ 'color': '#666', 'background-image': "url(<?php bloginfo('template_url');?>/img_new/headerArrow2.png)" });
            }
            if (inx == 5) {
                $thisItem.css({ 'color': '#666', 'background-image': "url(<?php bloginfo('template_url');?>/img_new/headerArrow2.png)" });
            }
            $thisItem.find('.top_hidden').css('display', 'block');
        }).mouseleave(function () {
            $thisItem = $(this);
            var inx = $thisItem.index();
            if (inx == 4 || inx == 3) {
                $thisItem.css('background-color', '#f9f9f9');
            }
            $thisItem.css({ 'color': '#666', 'background-image': "url(<?php bloginfo('template_url');?>/img_new/headerArrow1.png)"});
            $thisItem.find('.top_hidden').css('display', 'none');
        });
        //$('#newClient').click(function () {
        //    window.location.href='http://www.51baomu.cn/client.html';
        //})
        var url = window.hostUrl + "appdatacustomer.svc/i_g_huoquchengshi?" + parameter + "&data={}&sign=1&token=login";
        ajaxData('GET', url, null, function (data) {
            if (data) {
                if (data.status == 0) {
                    var oDiv = $("#getCity");
                    var html = "";
                    var list = data.dataResult.dataInfo;
                    console.log(list.length);
                    var listLength = list.length
                    for (var i = 0; i < listLength; i++) {
                        html += '<a href="<?php bloginfo('template_url');?>/aboutinfo/contact-' + list[i].RETURNED + '.html" rel="nofollow">' + list[i].DISPLAY + '</a>';
                    };
                    
                    oDiv.append(html);
                }
            }
        }, function () { });
    })
</script>