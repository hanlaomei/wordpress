<?php
/**
 * 公用底部模板
*/
?>
<?php $options = get_option('tx_inc1_options'); ?>

<div class="footer">
    <?php if($options['footon']=='1'):?>
    <div class="wide">
        <dl class="row">
            <dd class="col-5 col-m-8 mb15 wow fadeInUp">
                <?php echo($options['foot1']); ?>
            </dd>
            <dd class="col-5 col-m-8 mb15 wow fadeInUp">
                <?php echo($options['foot2']); ?>
            </dd>
            <dd class="col-5 col-m-8 mb15 wow fadeInUp">
                <?php echo($options['foot3']); ?>
            </dd>
            <dd class="col-9 col-m-24 mb15 wow fadeInUp">
                <?php echo($options['foot4']); ?>
            </dd>
        </dl>
    </div>
    <?php endif; ?> 
    <div class="copy ta-c f-12">
        <div class="wide">
            <?php echo($options['copy']); ?>
        </div>
    </div>
</div>



<div class="search-box">
    <div class="search-con">
        <form action="<?php bloginfo('url');?>" method="get" id="adminbarsearch" class="mb15">
            <input class="fl" placeholder="输入关键词可以直接搜索" name="s" id="adminbar-search" type="text" value="" maxlength="150">
            <button class="adminbar-button fl" id="btnPost" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <?php if($options['sstags']):?>
        <ul class="left-li clearfix">
            <li><strong>热门搜索：</strong></li>
            <?php echo($options['sstags']); ?>
        </ul>
        <?php endif; ?> 
        <a href="javascript:void(0)" title="关闭窗口" class="search-off1"><i class="fa fa-close (alias)"></i></a>
    </div>
    <div class="search-off"></div>
</div>

<div class="fixed-kefu">
    <ul class="clearfix">
        <?php if($options['kf1']):?>
        <li>
            <a href="javascript:;"><i class="fa fa-qq"></i> <span>在线客服</span></a>
            <ul class="qq-kefu">
                <?php echo($options['kf1']); ?>
                <i class="fa fa-caret-right"></i>
            </ul>
        </li>
        <?php endif; ?> 
        <?php if($options['kf2']):?>
        <li>
            <a href="javascript:;"><i class="fa fa-qrcode"></i> <span>关注我们</span></a>
            <ul class="weixin-qrcode clearfix ta-c">
                <?php echo($options['kf2']); ?>
                <i class="fa fa-caret-right"></i>
            </ul>
        </li>
        <?php endif; ?> 
        <?php if($options['kf3']):?>
        <li>
            <a href="tel:<?php echo($options['kf3']); ?>"><i class="fa fa-phone"></i> <span>联系电话</span></a>
            <ul class="call-box">
                <li><i class="fa fa-phone"></i> <?php echo($options['kf3']); ?></li>
            </ul>
        </li>
        <?php endif; ?> 
        <li><a href="javascript:;" class="gotop"><i class="fa fa-arrow-up"></i> <span>回到顶部</span></a></li>
    </ul>
</div>

<script src="<?php bloginfo('template_url');?>/script/txcstx.js"></script>
<?php if($options['wowon'] !== '0'):?>
<script src="<?php bloginfo('template_url');?>/script/wow.min.js"></script>
<script>if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {new WOW().init();};</script>
<?php endif; ?> 

<?php wp_footer(); ?>
</body>
</html>
