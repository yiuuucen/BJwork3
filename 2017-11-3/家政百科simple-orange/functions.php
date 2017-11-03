<?php
include_once('includes/wpcomments.php');
include_once('includes/theme-opition.php');
include_once('includes/postviews.php');
include_once('includes/no-category-parents.php');
include_once('includes/custom-widget-hot.php');
include_once('includes/more.php');
function daxiawp_disable_autosave(){wp_deregister_script('autosave');}
add_action( 'wp_print_scripts', 'daxiawp_disable_autosave' );
remove_action('pre_post_update', 'wp_save_post_revision' ); 
function hide_admin_bar($flag) {return false;}
add_filter('show_admin_bar','hide_admin_bar');
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'feed_links_extra', 3 ); 
remove_action('wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'index_rel_link' ); 
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
function add_editor_buttons($buttons) {
	$buttons[] = 'fontselect';	
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';
	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'copy';
	$buttons[] = 'paste';
	$buttons[] = 'cut';
	$buttons[] = 'undo';
	$buttons[] = 'image';
	$buttons[] = 'anchor';
	$buttons[] = 'backcolor';
	$buttons[] = 'wp_page';
	$buttons[] = 'charmap';
	return $buttons;
}
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	if(empty($first_img)){ //Defines a default image
		$site_url = get_bloginfo('template_directory');
		$random_img = rand(1,8);
        $first_img = "$site_url/images/rand/$random_img.jpg";
	}
	return $first_img;
}
add_filter("mce_buttons_3", "add_editor_buttons");
register_nav_menus(array('header-menu' => __( '顶部导航菜单' ),	));
function get_category_root_id($cat){
	$this_category = get_category($cat);
	while($this_category->category_parent){
		$this_category = get_category($this_category->category_parent);
	}
	return $this_category->term_id;
}
function post_is_in_descendant_category( $cats,$_post = null ){
	foreach ( (array) $cats as $cat ) {
		$descendants = get_term_children( (int) $cat,'category');
		if ( $descendants &&in_category( $descendants,$_post ) )
			return true;
		}
	return false;
}

if( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => '边栏小工具',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function get_breadcrumbs(){
    global $wp_query; 
	echo '<ol class="breadcrumb">';
	if(is_home()) {
		echo '<li><a href="'. get_settings('home') .'">'. get_bloginfo('name') .'首页</a></li>';		
	}
    if ( !is_home() ){ 
        // Start the UL        
        // Add the Home link
        echo '<li><a href="'. get_settings('home') .'">'. get_bloginfo('name') .'</a></li>';
        if ( is_category() )
        {
            $catTitle = single_cat_title( "", false );
            $cat = get_cat_ID( $catTitle );
            echo "<li>". get_category_parents( $cat, TRUE, "</li>" );
        }
        elseif ( is_archive() && !is_category() )
        {
            echo "<li>Archives</li>";
        }
        elseif ( is_search() ) { 
            echo "<li>搜索结果</li>";
        }
        elseif ( is_404() )
        {
            echo "<li>404 Not Found</li>";
        }
        elseif ( is_single() )
        {
            $category = get_the_category();
            $category_id = get_cat_ID( $category[0]->cat_name );
            echo '<li>'. get_category_parents( $category_id, TRUE, "</li>" );
            echo '<li>'.the_title('','', FALSE).'</li>';
        }
        elseif ( is_page() )
        {
            $post = $wp_query->get_queried_object();
            if ( $post->post_parent == 0 ){
                echo "<li>".the_title('','', FALSE)."</li>";
            } else {
                $title = the_title('','', FALSE);
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                array_push($ancestors, $post->ID); 
                foreach ( $ancestors as $ancestor ){
                    if( $ancestor != end($ancestors) ){
                        echo '<li><a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';
                    } else {
                        echo '<li>'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ).'</li>';
                    }
                }
            }
        } 
        // End the UL
    }
	echo '</div>';
}

function tagtext(){
	global $post;
	$gettags = get_the_tags($post->ID);
	if ($gettags) {
		foreach ($gettags as $tag) {
		$posttag[] = $tag->name;
	}
	$tags = implode( ',', $posttag );
		echo $tags;
	}
}
function boke8_net_pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<li><a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 首页 </a></li>";}
	echo "<li>";
	previous_posts_link(' &laquo; ');
	echo "</li>";
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){
		echo "<li><a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a></li>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<li><a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a></li>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<li><a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a></li>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<li><a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a></li>";}}
	echo "<li>";
	next_posts_link(' &raquo; ');
	echo "</li>";
    if($paged != $max_page){echo "<li><a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 末页 </a></li>";}}
}
function copyrightDate() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
		SELECT
			YEAR(min(post_date_gmt)) AS firstdate,
			YEAR(max(post_date_gmt)) AS lastdate
		FROM
			$wpdb->posts
		WHERE post_status = 'publish'
	");
	if($copyright_dates) {
		$date = date('Y-m-d');
		$date = explode('-', $date);
		$copyright = "Copyright &copy; " . $copyright_dates[0]->firstdate;
		if($copyright_dates[0]->firstdate != $date[0]) {
			$copyright .= '-' . $date[0];
		}
		echo $copyright;
	}
}
function wp_copyright() {
	$copyright = '网站技术支持：<a href="http://www.leonhere.com" target="_blank"><strong><span>L</span>eon<span>H</span>ere</strong></a>';
	echo $copyright;
}
//add_filter('wp_footer','copyright');
/* ----------------------------------<<小牆>> Anti-Spam v1.8 by Willin Kan.*/
//建立
class anti_spam {
function anti_spam() {
if ( !current_user_can('level_0') ) {
add_action('template_redirect', array($this, 'w_tb'), 1);
add_action('init', array($this, 'gate'), 1);
add_action('preprocess_comment', array($this, 'sink'), 1);

} }
//設欄位
function w_tb() {
if ( is_singular() ) {
ob_start(create_function('$input','return preg_replace("#textarea(.*?)name=([\"\'])comment([\"\'])(.+)/textarea>#",
"textarea$1name=$2w$3$4/textarea><textarea name=\"comment\" cols=\"100%\" rows=\"4\" style=\"display:none\"></textarea>",$input);') );
} }
//檢查
function gate() {
( !empty($_POST['w']) && empty($_POST['comment']) ) ?
$_POST['comment'] = $_POST['w'] : $_POST['spam_confirmed'] = 1;
}
//處理
function sink( $comment ) {
if ( !empty($_POST['spam_confirmed']) ) {
//方法一:直接擋掉, 將 die(); 前面兩斜線刪除即可.
//die();
//方法二:標記為spam, 留在資料庫檢查是否誤判.
add_filter('pre_comment_approved', create_function('','return "spam";'));
$is_ping = in_array( $comment['comment_type'], array('pingback', 'trackback') );
$comment['comment_content'] = ( $is_ping ) ?
"◎ 這是 Pingback/Trackback, 小牆懷疑這可能是 Spam!\n" . $comment['comment_content'] :
"[ 小牆判斷這是Spam! ]\n" . $comment['comment_content'];
}
return $comment;
} }
$anti_spam = new anti_spam();
// -- END ----------------------------------------
?>