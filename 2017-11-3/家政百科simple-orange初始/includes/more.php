<?php/*-----------------------------------------------------------------------------------*/
/* LeonHere最新wordpress企业主题 */
/*-----------------------------------------------------------------------------------*/
function more_themes_page(){
?><div class="wrap themes-page">
	<h2>最新动态</h2>	<?php // Get RSS Feed(s)
		include_once(ABSPATH . WPINC . '/feed.php');
		$rss = fetch_feed('http://www.boke8.net/wptheme/feed');	
        // Of the RSS is failed somehow.
        if (is_wp_error($rss) ) {
            $error = $rss->get_error_code();
            if($error == 'simplepie-error') {                //Simplepie Error
                echo "<div class='updated fade'><p>An error has occured with the RSS feed. (<code>". $error ."</code>)</p></div>";
            }
            return;
         }
	?>
	<div class="page-info">	
		<form id="search" method="get" action="http://www.boke8.net/" target="_blank">
			<input type="text" class="text" name="s" id="textfield" onblur="if (this.value == '') {this.value = '输入关键词搜索...';}" onfocus="if (this.value == '输入关键词搜索...') {this.value = '';}" value="输入关键词搜索..." />
			<input type="submit" id="submit" class="submits" value="搜索" />
		</form>
	</div>	<?php		$maxitems = $rss->get_item_quantity(30); 
		$items = $rss->get_items(0, 30);	
	?>
	<ul class="themes">
	<?php if (empty($items)) echo '<li>No items</li>';
        else			foreach ( $items as $item ) : ?>
			<li class="theme">
				<a href='<?php echo esc_url( $item->get_permalink() ); ?>' title='<?php echo $item->get_title(); ?>' target='_blank'><?php echo esc_html( $item->get_title() ); ?></a>			</li>
	<?php endforeach; ?>
			<li><a href="http://www.boke8.net/wptheme/" target="_blank">More...</a></li>
	</ul>
	<div class="copyright">
		CopyRight &copy 2013-<?php echo date('Y');?> <a href="http://www.leonhere.com" target="_blank">LeonHere</a>.<b>请购买LeonHere官方正版主题，我们为正版用户提供免费安装调试，免费技术支持，永久免费更新升级等售后服务！</b>	</div></div><?php } if (!function_exists('more_themes_recommend_page')):
	function leonhere_more_themes() {		add_menu_page("模板动态", "<strong>更多主题</strong>", 0, 'leonhere', 'more_themes_page',get_bloginfo('template_url').'/includes/new.png');	}		add_action('admin_menu', 'leonhere_more_themes');	endif;?>