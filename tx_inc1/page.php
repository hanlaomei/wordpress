<?php
/**
 * 单页模板
*/
get_header();
?>
<?php $options = get_option('tx_inc1_options'); ?>

<div class="list-bg mb20" style="background-image:url(<?php echo ''. bloginfo('template_url').'/style/img/about-bg.jpg'; ?>);">
    <div class="wide">
        <div class="home-title ta-c wow fadeInUp">
            <h1 class="f-22 mb10"><?php echo trim(wp_title('',0));?></h1>
			<p class="f-gray f-12"><?php echo tx_inc1_slug(); ?></p>
        </div>
    </div>
</div>

<div class="wide">
    <div class="bg-white mb15 wow fadeInUp">
        <div class="place pd15 border-b">
            当前位置：<?php if (function_exists('tx_inc1_breadcrumbs')){tx_inc1_breadcrumbs(); } ?>  
        </div>
        <div class="pd20">
            <div class="info-con">
                <?php echo $post->post_content;?>
            </div>
            <div class="clearfix">
                <?php if($options['fx']): ?>
                <div class="info-fx fr">
                    <?php echo($options['fx']); ?>
                </div>
                <?php endif; ?> 
            </div>
        </div>
    </div>

    <?php if(comments_open()): ?>
    <div class="bg-white mb15 pd15 wow fadeInUp">
        <?php echo comments_template(); ?>
    </div>
    <?php endif; ?>
</div>


<?php get_footer(); ?>

