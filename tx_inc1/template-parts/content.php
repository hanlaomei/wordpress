<?php
/**
 * 默认文章列表模块
 */
if(is_category()){
    $categories = get_the_category();
    $term_id = $categories[0]->term_id;
    $cat_name = $categories[0]->name;
}
?>
<li class="<?php $sideon = get_option('cat-sideon-'.$term_id); if ($sideon == '1'): ?>col-24<?php else: ?>col-12<?php endif; ?> col-m-24 mb20 wow fadeInUp">
    <div class="news-box box-tx">
        <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><span class="img-box" data-ratio="16:9"><img src="<?php echo tx_inc1_image($post); ?>" alt="<?php the_title();?>"></span></a>
        <div class="pd10">
            <h2 class="txt-ov f-16 mb10"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
            <p class="f-12 txt-ov mb10"><?php echo tx_inc1_intro($post->post_content,120); ?></p>
            <p class="f-12 f-gray txt-ov"><span class="mr10"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d');?></span><span class="mr10"><i class="fa fa-eye"></i> <?php tx_inc1_post_views(' ', ' '); ?></span><span><i class="fa fa-comment-o"></i> <?php $id=$post->ID; echo get_post($id)->comment_count;?></span></p>
        </div>
    </div>
</li>