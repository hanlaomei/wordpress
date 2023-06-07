<?php
/**
 * 团队列表模块
 */
if(is_category()){
    $categories = get_the_category();
    $term_id = $categories[0]->term_id;
    $cat_name = $categories[0]->name;
}
?>
<li class="<?php $sideon = get_option('cat-sideon-'.$term_id); if ($sideon == '1'): ?>col-8<?php else: ?>col-6<?php endif; ?> col-m-12 mb20 wow fadeInUp">
    <div class="user-box">
        <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="img-box"><img src="<?php echo tx_inc1_image($post); ?>" alt="<?php the_title();?>"></a>
        <div class="ta-c">
            <h2 class="f-18 txt-ov mb10"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
            <p class="i40 f-12"><?php echo tx_inc1_intro($post->post_content,120); ?></p>
        </div>
    </div>
</li>