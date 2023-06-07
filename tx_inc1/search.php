<?php
/**
 * 搜索页模板
*/
get_header();
?>
<?php $options = get_option('tx_inc1_options'); ?>

<div class="list-bg mb20" style="background-image:url(<?php echo ''. bloginfo('template_url').'/style/img/about-bg.jpg'; ?>);">
    <div class="wide">
        <div class="home-title ta-c wow fadeInUp">
            <h2 class="f-22 mb10"><?php echo trim(wp_title('',0));?></h2>
        </div>
    </div>
</div>

<div class="wide">
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
    
    <?php if(have_posts()):?>
    <div class="pagebar ta-c wow fadeInUp mb15">  	
        <?php tx_inc1_paginate(); ?>
    </div>
    <?php endif; ?>
</div>


<?php get_footer();?>