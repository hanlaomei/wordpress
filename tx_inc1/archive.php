<?php
/**
 * 默认列表页模板
*/
get_header();
?>
<?php $options = get_option('tx_inc1_options'); ?>

<?php if(is_category()):?>

<?php
$categories = get_the_category();
$term_id = $categories[0]->term_id;
$cat_name = $categories[0]->name;	
$listbg = get_option('cat-listbg-'.$term_id); 
?>
<div class="list-bg mb20" style="background-image:url(<?php if ($listbg){ echo $listbg;}else{echo ''. bloginfo('template_url').'/style/img/about-bg.jpg';} ?>);">
    <div class="wide">
        <div class="home-title ta-c wow fadeInUp">
            <h2 class="f-22 mb10"><?php echo trim(wp_title('',0));?></h2>
            <?php if(get_option('cat-descriptions-'.$term_id)):?>
            <p class="f-gray f-12"><?php echo get_option('cat-descriptions-'.$term_id);?></p>
            <?php else: ?>
            <p class="f-gray f-12"><?php $cat = get_query_var('cat');$yourcat = get_category($cat);echo "" . $yourcat->slug; ?></p>
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
    <?php
    if(is_category()) {
        $cat = get_query_var('cat');
        $categoryurl = get_category_link($cat);
        if(get_category_children(tx_inc1_get_category_root_id(the_category_ID(false)))!= "" ) {
            echo '<div class="list-nav mb15 ta-c"><ul class="clearfix ta-c">';
            echo '<li><a href="'.$categoryurl.'">全部</a></li>';
            echo wp_list_categories("child_of=".tx_inc1_get_category_root_id(the_category_ID(false)). "&depth=0&hide_empty=0&title_li=&orderby=id&order=ASC");
            echo '</ul></div>';
        }
    }
    ?>

    <div class="row">
        <div class="<?php if(is_category()):?><?php $sideon = get_option('cat-sideon-'.$term_id); if ($sideon == '1'): ?>col-18<?php else: ?>col-24<?php endif; ?> <?php else: ?>col-24<?php endif; ?> col-m-24">
            <?php if(is_category()):?>
            <?php $liststyle = get_option('cat-liststyle-'.$term_id); if ($liststyle == '2'): ?>
            <ul class="row mb15">
                <?php
                if ( have_posts() ) {
                    while(have_posts()){
                        the_post();
                        get_template_part( 'template-parts/content-pro' );
                    }
                } else {
                    echo '<li class="alert alert-danger pd15 ta-c mb15 col-24 col-m-24">暂时没有内容，请等待更新。</li>';
                }
                ?>
            </ul>
            <?php elseif ($liststyle == '3'): ?>
            <ul class="row mb15">
                <?php
                if ( have_posts() ) {
                    while(have_posts()){
                        the_post();
                        get_template_part( 'template-parts/content-user' );
                    }
                } else {
                    echo '<li class="alert alert-danger pd15 ta-c mb15">暂时没有内容，请等待更新。</li>';
                }
                ?>
            </ul>
            <?php else: ?>
            <ul class="row">
                <?php
                if ( have_posts() ) {
                    while(have_posts()){
                        the_post();
                        get_template_part( 'template-parts/content' );
                    }
                } else {
                    echo '<li class="alert alert-danger pd15 ta-c mb15">暂时没有内容，请等待更新。</li>';
                }
                ?>
            </ul>
            <?php endif; ?>
            
            
            <?php else: ?>
            <ul class="row">
                <?php
                if ( have_posts() ) {
                    while(have_posts()){
                        the_post();
                        get_template_part( 'template-parts/content-pro' );
                    }
                } else {
                    echo '<li class="alert alert-danger pd15 ta-c mb15">暂时没有内容，请等待更新。</li>';
                }
                ?>
            </ul>
            <?php endif; ?>
            
            <?php if(have_posts()):?>
            <div class="pagebar ta-c wow fadeInUp mb15">  	
                <?php tx_inc1_paginate(); ?>
            </div>
            <?php endif; ?>
            
        </div>

        <?php if(is_category()):?>
        <?php $sideon = get_option('cat-sideon-'.$term_id); if ($sideon == '1'): ?>
        <div class="tx-side col-6 col-m-24">
            <?php dynamic_sidebar( 'widget_default' ); ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>
