<div class="col-sm-4 sidebar">
	<aside>
		
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) :?>
		<div class="widget">
			<h3>热门产品动态</h3>
			<?php query_posts('showposts=5'); ?> 
			<ul>			
			<?php while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile;?>
			</ul>
			<?php wp_reset_query();?>
		</div>
	<?php endif; ?>
	</aside>
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
            $('.widget').eq(0).css('display','block').siblings().css('display','none');	
        }
})
</script>