<?php
class leonhere_cat_post_list extends WP_Widget {
	function leonhere_cat_post_list(){
		$widget_des = array('description' => '热门文章列表');
		parent::WP_Widget('leonhere_cat_post_list',$name='LEONHERE热门文章',$widget_des);		
	}
	function form($instance){		//title:模块标题，title_en:英文标题，showPosts:显示文章数量，cat:分类目录ID
		$instance = wp_parse_args((array)$instance,array('title'=>'热门文章','showPosts'=>10));//默认值
		$title = htmlspecialchars($instance['title']);		
		$showPosts = htmlspecialchars($instance['showPosts']);		
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('title').'">标题:<input style="width:200px;" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" /></label></p>';	
		echo '<p style="text-align:left;"><label for="'.$this->get_field_name('showPosts').'">文章数量:<input style="width:200px;" id="'.$this->get_field_id('showPosts').'" name="'.$this->get_field_name('showPosts').'" type="text" value="'.$showPosts.'" /></label></p>';		
	}
	//更新保存 小工具表单数据
	function update($new_instance,$old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));		
		$instance['showPosts'] = strip_tags(stripslashes($new_instance['showPosts']));		
		return $instance;
	}
	//文章分类显示
	function the_rand_posts($args = ''){
		$default = array('meta_key' => 'post_views_count','orderby' => 'meta_value_num','order' => DESC,'showPosts'=>10);
		$r = wp_parse_args($args,$default);
		extract($r);
		$rand_query = new WP_Query("showposts=$showPosts&orderby=desc&meta_key=post_views_count&orderby=meta_value_num");		
		if($rand_query->have_posts()){
			echo '<ul>';			
			while($rand_query->have_posts()){				
				$rand_query->the_post();				
				echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';				
			}			
			echo '</ul>';			
		}
		wp_reset_query();
	}	
	//小工具在前台显示效果
	function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('分类文章<i>Title</i>','yang') : $instance['title']);//小工具前台标题
		$title = $title;
		$showPosts = empty($instance['showPosts']) ? 10 : $instance['showPosts'];
		echo $before_widget;
		if( $title ) echo $before_title . $title . $after_title;
		self::the_rand_posts("showPosts=$showPosts");
		echo $after_widget;
	}
}
//激活小工具
register_widget('leonhere_cat_post_list');
?>