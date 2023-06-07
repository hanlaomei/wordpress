<?php
/**
 * 首页模板
*/
get_header(); ?>
<?php $options = get_option('tx_inc1_options'); ?>

<?php if($options['flashon']=='1'):?>
<div class="home-flash">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php echo($options['flash']); ?>
        </div>
        <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
        <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
        <div class="swiper-pagination"></div>
    </div>
    <script>
        var swiper = new Swiper('.home-flash .swiper-container', {
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
			autoHeight: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</div>
<?php endif; ?> 


<?php if($options['serviceon']=='1'):?>
<div class="index-service ta-c home-pd1">
    <div class="wide">
        <dl class="row">
            <?php echo($options['service']); ?>
        </dl>
    </div>
</div>
<?php endif; ?> 


<?php if($options['proid'] && $options['proidon']=='1'):?>
<div class="home-pro bg-white home-pd">
    <div class="wide">
        <div class="home-title ta-c mb20 wow fadeInUp">
            <h2 class="f-22 mb10"><?php echo get_cat_name($options['proid']);?></h2>
            <?php $cat = get_category($options['proid']); if($cat->slug): ?><p class="f-gray f-12"><?php $cat = get_category($options['proid']);echo $cat->slug;?></p><?php endif; ?> 
        </div>
        <ul class="row mb15">
            <?php $pron='8';$cateid=$options['proid'];if($options['proidn']){$pron=$options['proidn'];};
			query_posts('cat='.$cateid.'&showposts='.$pron.''); ?>
            <?php while (have_posts()) : the_post(); ?>
            <li class="col-6 col-m-12 mb20 wow fadeInUp">
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
        <div class="ta-c wow fadeInUp">
            <a href="<?php echo get_category_link($options['proid']); ?>" class="home-btn">查看更多</a>
        </div>
    </div>
</div>
<?php endif; ?> 


<?php if($options['abouton']=='1'):?>
<div class="home-about home-around home-color wow fadeInUp">
    <?php echo($options['about']); ?>
</div>
<?php endif; ?> 


<?php if($options['userid'] && $options['useridon']=='1'):?>
<div class="home-user home-pd home-bg home-color" style="background-color:#888;">
    <div class="home-title ta-c mb20 wow fadeInUp">
        <h2 class="f-22 mb10"><?php echo get_cat_name($options['userid']);?></h2>
        <?php $cat = get_category($options['userid']); if($cat->slug): ?><p class="f-gray f-12"><?php $cat = get_category($options['userid']);echo $cat->slug;?></p><?php endif; ?> 
    </div>
    <div class="wide">
        <ul class="row mb20">
			<?php $usern='4';$cateid=$options['userid'];if($options['useridn']){$usern=$options['useridn'];};
			query_posts('cat='.$cateid.'&showposts='.$usern.''); ?>
            <?php while (have_posts()) : the_post(); ?>
            <li class="col-6 col-m-12 mb20 wow fadeInUp">
                <div class="user-box">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" class="img-box"><img src="<?php echo tx_inc1_image($post); ?>" alt="<?php the_title();?>"></a>
                    <div class="ta-c">
                        <h2 class="f-18 txt-ov mb10"><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
                        <p class="i40 f-12"><?php echo tx_inc1_intro($post->post_content,120); ?></p>
                    </div>
                </div>
            </li>
            <?php endwhile; wp_reset_query(); ?>
        </ul>
        <div class="ta-c wow fadeInUp">
            <a href="<?php echo get_category_link($options['userid']); ?>" class="home-btn">查看更多</a>
        </div>
    </div>
</div>
<?php endif; ?> 


<?php if($options['newsid'] && $options['newsidon']=='1'):?>
<div class="home-news home-pd">
    <div class="wide">
        <div class="home-title ta-c mb20 wow fadeInUp">
            <h2 class="f-22 mb10"><?php echo get_cat_name($options['newsid']);?></h2>
            <?php $cat = get_category($options['newsid']); if($cat->slug): ?><p class="f-gray f-12"><?php $cat = get_category($options['newsid']);echo $cat->slug;?></p><?php endif; ?> 
        </div>
        <ul class="row mb20">
			<?php $newsn='8';$cateid=$options['newsid'];if($options['newsidn']){$newsn=$options['newsidn'];};
			query_posts('cat='.$cateid.'&showposts='.$newsn.''); ?>
            <?php while (have_posts()) : the_post(); ?>
            <li class="col-12 col-m-24 mb20 wow fadeInUp">
                <div class="news-box box-tx">
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
        <div class="ta-c wow fadeInUp">
            <a href="<?php echo get_category_link($options['newsid']); ?>" class="home-btn">查看更多</a>
        </div>
    </div>
</div>
<?php endif; ?> 


<?php if($options['contacton']=='1'):?>
<div class="home-contact home-around home-color wow fadeInUp">
    <?php echo($options['contact']); ?>
</div>
<?php endif; ?> 


<?php if($options['caseid'] && $options['caseidon']=='1'):?>
<div class="home-case bg-white home-pd">
    <div class="wide">
        <div class="home-title ta-c mb20 wow fadeInUp">
            <h2 class="f-22 mb10"><?php echo get_cat_name($options['caseid']);?></h2>
            <?php $cat = get_category($options['caseid']); if($cat->slug): ?><p class="f-gray f-12"><?php $cat = get_category($options['caseid']);echo $cat->slug;?></p><?php endif; ?> 
        </div>
        <div class="swiper-container wow fadeInUp mb20">
            <div class="swiper-wrapper">
				<?php $casen='15';$cateid=$options['caseid'];if($options['caseidn']){$casen=$options['caseidn'];};
			query_posts('cat='.$cateid.'&showposts='.$casen.''); ?>
                <?php while (have_posts()) : the_post(); ?>
                <div class="swiper-slide">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                        <span class="img-box" data-ratio="16:16"><img src="<?php echo tx_inc1_image($post); ?>" alt="<?php the_title();?>"></span>
                        <h3 class="f-15 txt-ov"><?php the_title();?></h3>
                    </a>
                </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            <div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
            <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
        </div>
        <script>
            var swiper = new Swiper('.home-case .swiper-container', {
                slidesPerView: 6,
                spaceBetween: 10,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    }
                }
            });
        </script>
        <div class="ta-c wow fadeInUp">
            <a href="<?php echo get_category_link($options['caseid']); ?>" class="home-btn">查看更多</a>
        </div>
    </div>
</div>
<?php endif; ?> 



<?php if(is_home() && $options['linkson']=='1'):?>
<div class="home-links home-pd">
    <div class="wide">
        <div class="home-title ta-c mb20 wow fadeInUp">
            <h2 class="f-22 mb10">友情链接</h2>
            <p class="f-gray f-12">Links</p>
        </div>
        <ul class="clearfix ta-c wow fadeInUp">
            <?php if(function_exists("tx_blogroll")) tx_blogroll();?>
        </ul>
    </div>
</div>
<?php endif; ?> 

<?php get_footer();?>
