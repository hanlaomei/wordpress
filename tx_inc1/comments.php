<div class="info-comments">
    
    <?php 
    $id=$post->ID; 
    $connum = get_post($id)->comment_count;
    if ($connum > '0'):
    ?>
    <div class="tx-comments mb20">
        <h3>已有 <?php echo $connum; ?> 位网友发表了看法：</h3>
        <?php if(have_comments()):?>
        <ul class="commentlist"><?php wp_list_comments('type=comment&callback=commentlist&max_depth=10000'); ?></ul>
        <div class="commentnavi">
            <span id="cp_post_id" style="display:none;"><?php echo $post->ID; //ajax评论翻页?></span>
            <?php paginate_comments_links('');?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>


    <div id="comments">
        <?php if ( post_password_required() )return;?>
        <?php if (comments_open()): ?>
        <div id="respond" class="tx-comment">
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <?php if($user_ID): ?>
                <h3>
                    欢迎 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>发表评论:
                    <div class="cancel_comment_reply fr f-12">
                        <?php cancel_comment_reply_link('取消回复'); ?>
                    </div>
                </h3>
                <?php else: ?>
                <h3>
                    <?php if($comment_author): ?>欢迎回来，<?php echo $comment_author; ?>！<?php else: ?>欢迎评论<?php endif; ?>
                </h3>
                <div class="tx-comment-box tx-comment-ul3">
                    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" <?php if($req) echo "aria-required='true'"; ?> placeholder="名称(*)">
                </div>
                <div class="tx-comment-box tx-comment-ul3 tx-comment-ul3-2">
                    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" <?php if($req) echo "aria-required='true'"; ?> placeholder="邮箱">
                </div>
                <div class="tx-comment-box tx-comment-ul3">
                    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" placeholder="网站">
                </div>
                <?php endif; ?>
                <div class="tx-comment-box tx-comment-textarea">
                    <textarea name="comment" id="comment" tabindex="4" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                    <input name="submit" type="submit" id="submit" tabindex="5" value="发表评论" class="button">
                </div>
                <div>
                    <?php comment_id_fields(); ?>
                </div>
                <?php do_action('comment_form',$post->ID); ?>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>