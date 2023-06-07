<?php
/**
 * 公用头部模板
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <?php $options = get_option('tx_inc1_options');?>
        <?php get_template_part( 'seo' );?>
        <link href="<?php if ($options['favicon']){ echo($options['favicon']);}else{echo ''. bloginfo('template_url').'/style/img/favicon.ico';} ?>" type="image/x-icon" rel="icon">
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/style/css/shiui.min.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/style/css/font-awesome.min.css" type="text/css" media="all">
        <?php if(is_home()):?>
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/style/css/swiper-4.2.2.min.css" type="text/css" media="all">
        <?php endif; ?> 
        <?php if($options['wowon'] !== '0'):?>
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/style/css/animate.min.css" type="text/css" media="all">
        <?php endif; ?> 
        <link rel="stylesheet" href="<?php bloginfo('template_url');?>/style.css?2019-12-18" type="text/css" media="all">
        <script src="<?php bloginfo('template_url');?>/script/jquery-2.2.4.min.js" type="text/javascript"></script>
        <?php if(is_home()):?>
        <script src="<?php bloginfo('template_url');?>/script/swiper-4.2.2.min.js"></script>
        <?php endif; ?> 
        <style type="text/css">
            body{background-color:#<?php echo($options['color2']);?>;}a:hover,.nav>div>ul>li>a:hover,.nav>div>ul>li:hover i,.nav>div>ul>li.on>a,.nav>div>ul>li.hover>a,.home-btn,.home-color .home-btn:hover,.fixed-kefu li ul>i,.list-nav a,.pro-box >a>i,.info-con a{color:#<?php echo($options['color1']);?>;}.pagebar a:hover,.pagebar .now-page,.nav>div>ul>li.on>a::after,.nav>div>ul>li>a:hover::after,.nav>div>ul>li.hover>a::after,.nav>div>ul>li>ul li a:hover,.home-flash .swiper-pagination-bullet-active,.home-title h2::after,.home-btn::before,.home-btn:hover::before,.search-con form button,#searchform input[type="submit"],.search-con>a,.info-tag a:hover,.tx-comment-box input.button,.fixed-kefu>ul>li>a,.fixed-kefu li ul.call-box,.list-nav a:hover,.list-nav a.on{background-color:#<?php echo($options['color1']);?>;}.home-btn,.user-box:hover>div,.search-con form,.fixed-kefu li ul,.list-nav a,.user-box:hover>a,.info-con h2,.info-con h3,#searchform{border-color:#<?php echo($options['color1']);?>;}.home-contact .home-fl-bg{background-image: url(<?php if ($options['map']){ echo($options['map']);}else{echo ''. bloginfo('template_url').'/style/img/map.jpg';} ?>);}.home-about .home-fl-bg{background-image: url(<?php if ($options['about-bg']){ echo($options['about-bg']);}else{echo ''. bloginfo('template_url').'/style/img/about-bg.jpg';} ?>);}
        </style>
        <?php wp_head(); ?>
    </head>

    <body>
        <div class="header">
            <div class="wide">
                <div class="logo fl">
                    <?php if(is_single() || is_page()):?>
                    <h2><a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>"><img src="<?php if ($options['logo']){ echo($options['logo']);}else{echo ''. bloginfo('template_url').'/style/img/logo.png';} ?>" alt="<?php bloginfo('name');?>"></a></h2>
                    <?php else: ?> 
                    <h1><a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>"><img src="<?php if ($options['logo']){ echo($options['logo']);}else{echo ''. bloginfo('template_url').'/style/img/logo.png';} ?>" alt="<?php bloginfo('name');?>"></a></h1>
                    <?php endif; ?> 
                </div>
                <div class="search fr">
                    <a href="javascript:;" class="search-on"><i class="fa fa-search"></i></a>
                </div>
                <div class="nav fr">
                    <?php wp_nav_menu(); ?>
                </div>
            </div>
            <a href="javascript:;" class="nav-on"><i class="fa fa-bars fa-close (alias)"></i></a>
        </div>
        <div class="header-location"></div>