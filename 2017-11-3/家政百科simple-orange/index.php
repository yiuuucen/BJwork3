<?php get_header();?>
<div id="content" class="container">
	<div class="row content">
		<div class="col-sm-8" role="main">	
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>		
			<article id="post-<?php the_ID(); ?>">
				<div class="row post">
					<div class="col-xs-1 time"><time><strong><?php the_time('Y'); ?></strong><?php the_time('n.j'); ?></time></div>
					<div class="col-xs-3">
						<figure>
							<img width="160px" class="thumbnail" src="<?php echo catch_that_image();?>" alt="<?php the_title();?>">
						</figure>
					</div>
					<div class="col-xs-8">
						<h2><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title();?></a></h2>
						<div class="postmeta">分类：<?php the_category(' &bull; '); ?></div>
						<div class="entry">
							<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,"……"); ?></p>				
						</div>
						<p class="more"><a href="<?php the_permalink(); ?>" rel="nofollow">详情</a></p>
					</div>
				</div>
			</article>
			<div class="hr"></div>
			<?php endwhile; ?>
			<div class="pagenavi">
				<ul class="pagination">
					<?php boke8_net_pagenavi(5);?>
				</ul>
			</div>
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
