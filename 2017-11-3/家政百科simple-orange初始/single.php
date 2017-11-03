<?php get_header();?>
<div id="content" class="container">
	<div class="row content">
		<div class="col-sm-8" role="main">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>">
				<div class="post single-post">					
					<h2><?php the_title();?></h2>
					<div class="row postmeta">
						<div class="col-sm-3 col-sm-offset-2">分类：<?php the_category(' &bull; '); ?></div>
						<div class="col-sm-3">发布日期：<?php the_time('Y-n-j'); ?></div>
						<div class="col-sm-2">浏览：<?php setPostViews(get_the_ID()); echo getPostViews(get_the_ID()); ?></div>
					</div>
					<div class="entry">
						<?php the_content();?>
					</div>					
				</div>				
			</article>
			<div class="list-group related">
			<?php
				$tags = wp_get_post_tags($post->ID);
				if ($tags) {
					$first_tag = $tags[0]->term_id;
					$args=array(
						'tag__in' => array($first_tag),
						'post__not_in' => array($post->ID),
						'showposts'=>10,
						'caller_get_posts'=>1
					);
					$my_query = new WP_Query($args);
					$i = 1;
					if( $my_query->have_posts() ) {
				?>
				<a href="<?php the_permalink() ?>" class="list-group-item <?php if($i == 1){echo 'active';}?>"><?php the_title();?></a>
			<?php  $i++; } }  wp_reset_query(); ?>
			</div>
			<?php endwhile; ?>		
			<?php comments_template(); ?>
			<?php else : ?>
			<div class="post">
			你要找的页面已删除或不存在
			</div>
			<?php endif; wp_reset_query();?>
		</div>
		<?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>