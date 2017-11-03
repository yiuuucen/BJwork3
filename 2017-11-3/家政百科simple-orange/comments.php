<?php
	if(isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die('please do not load this page directly. Thanks!');
	if ( post_password_required() ) {?>
<div class="commentlist">
	<h3>网友留言</h3>
	<ol>
		<li><p>请输入密码再查看评论内容.</p></li>
	</ol>
</div>
<?php return;} ?>
<?php if(have_comments()) : ?>
<div class="commentlist">
	<h3>网友留言</h3>
	<ol>
		<?php wp_list_comments('type=comment&callback=leonhere_comment');?>
		<?php
			if (get_option('page_comments')) {
				$comment_pages = paginate_comments_links('echo=0');
				if ($comment_pages) {
					echo '<li class="page_navi">';
					echo $comment_pages;
					echo '</li>';
				}
			}
		?>
	</ol>
</div>
<?php else : if ( comments_open() ) : else : endif; endif; ?>	
<?php if (comments_open() ) : ?>
<div id="respond">
	<?php if (get_option('comment_registration') && !is_user_logged_in()) :	?>
	<p>你必须 <a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a> 才能发表评论.</p>
	<?php else : ?>
	<form class="form-horizontal" id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" role="form">
	<?php if(is_user_logged_in()) :?>
		<div>您已登录:<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出 &raquo;</a></div>
	<?php else : ?>
		<div class="form-group">    
			<div class="col-sm-10">
			<input type="text" class="form-control" id="inputPassword3" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="Name" tabindex="1"/>
			</div>
			<label for="inputPassword3" class="col-sm-2 control-label sr-only">昵称</label>
		</div>
		<div class="form-group">    
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputEmail3" name="email" value="<?php echo $comment_author_email; ?>" tabindex="2" placeholder="Email"/>
			</div>
			<label for="inputEmail3" class="col-sm-2 control-label sr-only">邮箱</label>
		</div> 
		<div class="form-group">   
			<div class="col-sm-10">
			<input type="text" name="url" class="form-control" id="inputPassword3" value="<?php echo $comment_author_url; ?>" tabindex="3" placeholder="Password"/>
			</div>
			<label for="inputPassword3" class="col-sm-2 control-label sr-only">网址</label>
		</div>
	<?php endif; ?>	
		<textarea name="comment" id="comment" class="form-control" rows="3" tabindex="4"></textarea>
		<div class="form-group">
			<div class="col-sm-10">
			<button type="submit" name="submit" class="btn btn-default submit" tabindex="5">提交</button>
		</div>
		<?php cancel_comment_reply_link(); ?>
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form',$post->ID);?>
	</div>
</form>
<?php endif; ?>	
</div>
<?php endif;?>