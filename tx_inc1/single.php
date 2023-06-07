<?php
/**
 * 文章页模板
*/
get_header();
?>
<?php $options = get_option('tx_inc1_options'); ?>

<?php if(is_single()):?>
<?php
$categories = get_the_category();
$term_id = $categories[0]->term_id;
$cat_name = $categories[0]->name;	
$listbg = get_option('cat-listbg-'.$term_id); 
?>
<div class="list-bg mb20" style="background-image:url(<?php if ($listbg){ echo $listbg;}else{echo ''. bloginfo('template_url').'/style/img/about-bg.jpg';} ?>);">
    <div class="wide">
        <div class="home-title ta-c wow fadeInUp">
            <h2 class="f-22 mb10"><?php foreach((get_the_category()) as $category){ echo $category->cat_name;}?></h2>
            <?php if(get_option('cat-descriptions-'.$term_id)):?>
            <p class="f-gray f-12"><?php echo get_option('cat-descriptions-'.$term_id);?></p>
            <?php else: ?>
            <p class="f-gray f-12"><?php foreach((get_the_category()) as $category){ echo $category->slug;}?></p>
            <?php endif; ?> 
        </div>
    </div>
</div>
<?php else: ?> 
<div class="list-bg mb20" style="background-image:url(<?php echo ''. bloginfo('template_url').'/style/img/about-bg.jpg'; ?>);">
    <div class="wide">
        <div class="home-title ta-c wow fadeInUp">
            <h2 class="f-22 mb10"><?php echo trim(wp_title('',0));?></h2>
        </div>
    </div>
</div>
<?php endif; ?> 

<div class="wide">
    <div class="row">
        <div class="<?php $sideon = get_option('cat-sideon-'.$term_id); if ($sideon == '1'): ?>col-18<?php else: ?>col-24<?php endif; ?> col-m-24">
            <?php $liststyle = get_option('cat-liststyle-'.$term_id); if ($liststyle == '2'): ?>
            <div class="bg-white mb15 wow fadeInUp">
                <div class="place pd15 border-b">
                    当前位置：<?php if (function_exists('tx_inc1_breadcrumbs')){tx_inc1_breadcrumbs(); } ?>  
                </div>
                <div class="pd20-3">
                    <dl class="row">
                        <dd class="col-8 col-m-24 mb20">
                            <span class="info-pro-img"><img src="<?php echo tx_inc1_image($post); ?>" alt="<?php the_title();?>"></span>
                        </dd>
                        <dd class="info-pro-txt col-15 col-m-24 fr mb20">
                            <h1 class="f-22 mb15"><?php the_title();?></h1>
                            <ul class="clearfix mb15">
                                <li class="mb10"><span>发布时间：</span><?php the_time('Y-m-d');?></li>
                                <?php if(get_post_meta($post->ID, '产品价格', true)): ?>
                                <li class="mb10"><span>产品价格：</span><strong class="f-red"><?php echo get_post_meta($post->ID, '产品价格', true); ?></strong></li>
                                <?php endif; ?> 
                                <li class="introduction mb10"><span>产品简介：</span><?php echo tx_inc1_intro($post->post_content,120); ?></li>
                            </ul>
                            <?php if(get_post_meta($post->ID, '购买按钮文字', true)): ?>
                            <p>
                                <a href="<?php echo get_post_meta($post->ID, '购买按钮链接', true); ?>" class="home-btn" rel="nofollow" target="_blank">
                                    <?php if(get_post_meta($post->ID, '购买按钮文字', true)){echo get_post_meta($post->ID, '购买按钮文字', true);}else{echo '立即购买';} ?>
                                </a>
                            </p>
                            <?php endif; ?> 
                        </dd>
                    </dl>
                </div>
            </div>

            <div class="bg-white mb15 wow fadeInUp">
                <h2 class="pd15-2 f-18 lh-50 bg-white border-b">产品介绍</h2>
                <div class="info-con pd20">
                    <?php echo $post->post_content;?>
                    <div class="clearfix">
                        <?php if($options['fx']): ?>
                        <div class="info-fx fr">
                            <?php echo($options['fx']); ?>
                        </div>
                        <?php endif; ?> 
                        <?php 
                        $tags = get_the_tag_list();
                        if($tags){
                            echo '<div class="info-tag fl"><strong>TAGS：</strong> '.$tags.'</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="info-next bg-white mb15 wow fadeInUp pd15-3">
                <ul class="row">
                    <li class="col-12 col-m-24 mb15"><?php previous_post_link('上一篇： %link') ?></li>
                    <li class="col-12 col-m-24 mb15 ta-r"><?php next_post_link('下一篇： %link'); ?></li>
                </ul>
            </div>

            <div class="wow fadeInUp">
                <h2 class="pd15-2 f-18 lh-50 bg-white mb15">相关推荐</h2>
                <ul class="clearfix row">
                    <?php
                    $cat = get_the_category();
                    foreach($cat as $key=>$category){
                        $catid = $category->term_id;
                    }
                    $args = array('orderby' => 'rand','showposts' => 8,'cat' => $catid );
                    $query_posts = new WP_Query();
                    $query_posts->query($args);
                    while ($query_posts->have_posts()) : $query_posts->the_post();
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
                    <?php endwhile; wp_reset_query(); ?>
                </ul>
            </div>
            <?php else: ?>
            <div class="bg-white mb15 wow fadeInUp">
                <div class="place pd15 border-b">
                    当前位置：<?php if (function_exists('tx_inc1_breadcrumbs')){tx_inc1_breadcrumbs(); } ?>  
                </div>
                <div class="pd20">
                    <div class="info-title mb15 ta-c">
                        <h1 class="f-22 mb10"><?php the_title(); ?></h1>
                        <p class="f-12 f-gray"><span class="mr10"><i class="fa fa-user"></i> <?php echo get_the_author_meta('user_nicename',$post->post_author);?></span><span class="mr10"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d');?></span><span class="mr10"><i class="fa fa-eye"></i> <?php tx_inc1_post_views(' ', ' '); ?></span><span><i class="fa fa-comment-o"></i> <?php $id=$post->ID; echo get_post($id)->comment_count;?></span></p>
                    </div>
                    <div class="info-con">
                        <?php echo $post->post_content;?>
                    </div>
                    <div class="clearfix">
                        <?php if($options['fx']): ?>
                        <div class="info-fx fr">
                            <?php echo($options['fx']); ?>
                        </div>
                        <?php endif; ?> 
                        <?php 
                        $tags = get_the_tag_list();
                        if($tags){
                            echo '<div class="info-tag fl"><strong>TAGS：</strong> '.$tags.'</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="info-next bg-white mb15 wow fadeInUp pd15-3">
                <ul class="row">
                    <li class="col-12 col-m-24 mb15"><?php previous_post_link('上一篇： %link') ?></li>
                    <li class="col-12 col-m-24 mb15 ta-r"><?php next_post_link('下一篇： %link'); ?></li>
                </ul>
            </div>
            

            <div class="bg-white mb15 wow fadeInUp">
                <h2 class="pd15-2 border-b f-22 lh-50">相关推荐</h2>
                <div class="pd15-3">
                    <ul class="clearfix row">
                        <?php
                        $cat = get_the_category();
                        foreach($cat as $key=>$category){
                            $catid = $category->term_id;
                        }
                        $args = array('orderby' => 'rand','showposts' => 8,'cat' => $catid );
                        $query_posts = new WP_Query();
                        $query_posts->query($args);
                        while ($query_posts->have_posts()) : $query_posts->the_post();
                        ?>
                        <li class="<?php $sideon = get_option('cat-sideon-'.$term_id); if ($sideon == '1'): ?>col-24<?php else: ?>col-12<?php endif; ?> col-m-24 mb15 wow fadeInUp">
                            <div class="news-box">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><span class="img-box" data-ratio="16:9"><img src="<?php echo tx_inc1_image($post); ?>" alt="<?php the_title();?>"></span></a>
                                <div class="pd10">
                                    <h2 class="txt-ov f-16 mb10"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
                                    <p class="f-12 txt-ov mb10"><?php echo tx_inc1_intro($post->post_content,120); ?></p>
                                    <p class="f-12 f-gray txt-ov"><span class="mr10"><i class="fa fa-clock-o"></i> <?php the_time('Y-m-d');?></span><span class="mr10"><i class="fa fa-eye"></i> <?php tx_inc1_post_views(' ', ' '); ?></span><span><i class="fa fa-comment-o"></i> <?php $id=$post->ID; echo get_post($id)->comment_count;?></span></p>
                                </div>
                            </div>
                        </li>
                        <?php endwhile; wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
            
            <?php endif; ?>
            
            <?php if(comments_open()): ?>
            <div class="bg-white mb15 pd15 wow fadeInUp">
                <?php echo comments_template(); ?>
            </div>
            <?php endif; ?>

        </div>

        <?php if(is_single()):?>
        <?php $sideon = get_option('cat-sideon-'.$term_id); if ($sideon == '1'): ?>
        <div class="tx-side col-6 col-m-24">
            <?php dynamic_sidebar( 'widget_default' ); ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
