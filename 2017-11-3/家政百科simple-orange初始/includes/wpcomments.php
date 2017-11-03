<?phpfunction leonhere_comment($comment, $args, $depth){
   $GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>">
		<div class="col-xs-2 avatar">
			<?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment,64); } ?>
		</div>
		<div class="col-xs-9 comment-con">
			<div class="comment-info">
				<span><a rel="nofollow" href="<?php comment_author_url() ?>" target="_blank"><?php comment_author() ?></a></span> <span><?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
			</div>
			<div class="comment-text">
			<?php if($comment->comment_approved =='0') : ?>
			<em>你的评论正在审核，稍后会显示出来！</em>
			<?php endif;?>
			<?php comment_text(); ?>
			</div>
		</div>
<?php } ?>