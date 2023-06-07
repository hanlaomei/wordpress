<?php
/**
 * 产品列表模块
 */
if(is_category()){
    $categories = get_the_category();
    $term_id = $categories[0]->term_id;
    $cat_name = $categories[0]->name;
}
?>
<li class="<?php $sideon = get_option('cat-sideon-'.$term_id); if ($sideon == '1'): ?>col-8<?php else: ?>col-6<?php endif; ?> col-m-12 mb20 wow fadeInUp">
    <div class="pro-box box-tx ta-c">
        <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="img-box" data-ratio="16:9">
            <img src="<?php echo tx_inc1_image($post); ?>" alt="<?php the_title();?>">
            <i class="fa fa-plus-circle"></i>
        </a>
        <div class="pd10">
            <h2 class="txt-ov f-16 mb5"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
            <p class="f-12 f-gray i40"><?php echo tx_inc1_intro($post->post_content,120); ?></p>
        </div>
    </div>
</li>