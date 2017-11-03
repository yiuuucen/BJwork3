<?php
$themename = "主题";
$shortname = "leonhere";
$options = array (
	//SEO设置
	array("name" => "SEO设置","type" => "section"),
	array("name" => "首页Title标题","id" => $shortname."_title","desc" => "这里是首页title标题设置","std" => "","type" => "text"),
    array("name" => "网站关键词","id" => $shortname."_keywords","desc" => "这里是网站关键词，多个关键词用英文逗号隔开","std" => "","type" => "text"),
	array("name" => "网站描述","id" => $shortname."_description","desc" => "这里是网站描述，建议不超过150字符","std" => "","type" => "textarea"),
	array("name" => "内页Title标题分隔符","id" => $shortname."_separator","desc" => "这里是网页标题Title分隔符设置，输入“ | ”、“ _ ”、“ - ”或其它符号，默认是下划线","std" => "","type" => "text"),		//基础设置
	array("name" => "基础设置","type" => "section"),
	array("name" => "新浪微博","id" => $shortname."_weibo","desc" => "新浪微博地址","std" => "","type" => "text"),	array("name" => "腾讯微博","id" => $shortname."_qqweibo","desc" => "腾讯微博地址","std" => "","type" => "text"),	array("name" => "Facebook","id" => $shortname."_facebook","desc" => "Facebook脸书地址","std" => "","type" => "text"),
	array("name" => "Twitter推特","id" => $shortname."_twitter","desc" => "推特地址","std" => "","type" => "text"),
	array("name" => "领英In","id" => $shortname."_in","desc" => "linkedin领英地址","std" => "","type" => "text"),		array("name" => "网站统计","id" => $shortname."_tongji","desc" => "第三方网站统计代码，如百度统计，cnzz","std" => "","type" => "textarea"),);function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {        if ( 'save' == $_REQUEST['action'] ) {            foreach ($options as $value) {            update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }            foreach ($options as $value) {
            if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
            header("Location: themes.php?page=theme-opition.php&saved=true"); 
            die;
        } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] );
                update_option( $value['id'], $value['std'] );
            }
            header("Location: themes.php?page=theme-opition.php&reset=true");
            die;
        }
    }    add_theme_page($themename." 配置", "$themename 设置", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}function leonhere_add_init() {	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_style("functions", $file_dir."/includes/panel.css", false, "1.0", "all");	}
function mytheme_admin() {    global $themename, $shortname, $options;    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 设置已保存。</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 设置已重置。</strong></p></div>';?> <div class="panel_wrap">    <h2><b><?php echo $themename; ?> 设置</b></h2>
	<form method="post">
		<?php foreach ($options as $value) {
			if ($value['type'] == "section") {				echo '<h3>'.$value['name'].'</h3>';
			} elseif ($value['type'] == "text") { ?>
        <div class="lh_input">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?><br/><br/><small><?php echo $value['desc']; ?></small></label>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" size="40" />
        </div>
		<?php } elseif ($value['type'] == "textarea") { ?>
		<div class="lh_input">
            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?><br/><br/><small><?php echo $value['desc']; ?></small></label>
			<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
        </div>
		<?php } elseif ($value['type'] == "select") { ?>
		<div class="lh_input">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?><br/><br/><small><?php echo $value['desc']; ?></small></label>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $option) { ?>
				<option value="<?php echo $option;?>" <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>>
				<?php
					if ((empty($option) || $option == '' ) && isset($value['default_option_value'])) {
					echo $value['default_option_value'];
					} else {
					echo $option; 
				}?>
				</option><?php } ?>
			</select>
		</div>
		<?php } elseif ($value['type'] == "editor") {?>
		<div class="lh_input">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?><br/><br/><small><?php echo $value['desc']; ?></small></label>
			<?php
			if ( get_settings( $value['id'] ) != "") { $content = stripslashes(get_settings( $value['id']) ); } else { $content = $value['std']; }
			wp_editor($content,$value['id'],$settings = array('media_buttons'=> false,'teeny'=>true,'quicktags'=>0,'tinymce'=>array('plugins'=>'','skin'=>'default') ) );?>
		</div>
		<?php } ?>
		<?php } ?>
		<div class="submit">
			<input style="font-size:12px !important;" name="save" type="submit" value="保存设置" />
			<input type="hidden" name="action" value="save" />
		</div>
	</form>
	<form method="post" class="defaultbutton">
		<div class="submit">
			<input style="font-size:12px !important;" name="reset" type="submit" value="还原默认设置" />
			<input type="hidden" name="action" value="reset" />
		</div>
	</form>
	<div class="copyright">
		CopyRight &copy 2013-<?php echo date('Y');?> <a href="http://www.leonhere.com" target="_blank">LeonHere</a>.<b>请购买LeonHere官方正版主题，我们为正版用户提供免费安装调试，免费技术支持，永久免费更新升级等售后服务！</b>
	</div>
</div>
    <?php
}
add_action("admin_init", "leonhere_add_init");
add_action('admin_menu', 'mytheme_add_admin');
?>