<?php      
//类ClassicOptions   
class ClassicOptions {      
    function getOptions() {     
        $options = get_option('tx_inc1_options');          
        if (!is_array($options)) {       
            $options['title'] = ''; 
            $options['keywords'] = ''; 
            $options['description'] = ''; 
            $options['connector'] = ''; 
            $options['logo'] = ''; 
            $options['favicon'] = ''; 
            $options['pic'] = ''; 
            $options['copy'] = '网站底部版权'; 
            $options['wowon'] = '1'; 
            $options['color1'] = '44b549'; 
            $options['color2'] = 'f9f9f9'; 
            $options['map'] = ''; 
            $options['about-bg'] = ''; 
            $options['footon'] = '1'; 
            $options['linkson'] = '1'; 
            $options['foot1'] = '
<h2 class="f-18 mb10">自定义文字</h2>
<ul>
    <li><a href="#">打开后台</a></li>
    <li><a href="#">看右上角</a></li>
    <li><a href="#">主题配置</a></li>
    <li><a href="#">自行修改</a></li>
</ul>'; 
            $options['foot2'] = '
<h2 class="f-18 mb10">自定义文字</h2>
<ul>
    <li><a href="#">打开后台</a></li>
    <li><a href="#">看右上角</a></li>
    <li><a href="#">主题配置</a></li>
    <li><a href="#">自行修改</a></li>
</ul>'; 
            $options['foot3'] = '
<h2 class="f-18 mb10">自定义文字</h2>
<ul>
    <li><a href="#">打开后台</a></li>
    <li><a href="#">看右上角</a></li>
    <li><a href="#">主题配置</a></li>
    <li><a href="#">自行修改</a></li>
</ul>'; 
            $options['foot4'] = '
<h2 class="f-18 mb10">自定义文字</h2>
<p>这里的文字是自定义修改的文字，打开你网站的后台看右上角找到主题配置，打开主要设置，找到底部自定义项就能修改了。</p>'; 
            $options['sstags'] = '
<li><a href="#">打开后台</a></li>
<li><a href="#">看右上角</a></li>
<li><a href="#">主题配置</a></li>
<li><a href="#">自行修改</a></li>'; 
            $options['kf1'] = '
<h3 class="f-15 mb5 f-bold">售前支持</h3>
<li class="mb5"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456789&amp;site=qq&amp;menu=yes" rel="nofollow">1号技术支持</a></li>
<li class="mb5"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456789&amp;site=qq&amp;menu=yes" rel="nofollow">2号技术支持</a></li>
<li class="mb20"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456789&amp;site=qq&amp;menu=yes" rel="nofollow">3号技术支持</a></li>
<h3 class="f-15 mb5 f-bold">售后支持</h3>
<li class="mb5"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456789&amp;site=qq&amp;menu=yes" rel="nofollow">1号技术支持</a></li>
<li class="mb5"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456789&amp;site=qq&amp;menu=yes" rel="nofollow">2号技术支持</a></li>
<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456789&amp;site=qq&amp;menu=yes" rel="nofollow">3号技术支持</a></li>'; 
            $options['kf2'] = '
<li class="fl mr10">
    <p>扫一扫关注我们</p>
    <p><img src="/wp-content/themes/tx_inc1/style/img/wx.png"></p>
</li>
<li class="fl">
    <p>我！打钱！</p>
    <p><img src="/wp-content/themes/tx_inc1/style/img/zfb.png"></p>
</li>'; 
            $options['kf3'] = '13888888888'; 
            $options['flashon'] = '1'; 
            $options['flash'] = '
<div class="swiper-slide"><a href="#"><img src="/wp-content/themes/tx_inc1/style/img/flash1.jpg"></a></div>
<div class="swiper-slide"><a href="#"><img src="/wp-content/themes/tx_inc1/style/img/flash1.jpg"></a></div>'; 
            $options['serviceon'] = '1'; 
            $options['service'] = '
<dd class="col-6 col-m-12 mb15 wow slideInLeft">
    <div class="service-box">
        <div class="clearfix">
            <i class="fa fa-briefcase"></i>
            <h3 class="txt-ov f-18 mb10"><a href="#">服务项目</a></h3>
            <p class="f-12 f-gray i40">后台右上角主题配置自行修改</p>
        </div>
    </div>
</dd>
<dd class="col-6 col-m-12 mb15 wow slideInLeft">
    <div class="service-box">
        <div class="clearfix">
            <i class="fa fa-fax"></i>
            <h3 class="txt-ov f-18 mb10"><a href="#">服务项目</a></h3>
            <p class="f-12 f-gray i40">后台右上角主题配置自行修改</p>
        </div>
    </div>
</dd>
<dd class="col-6 col-m-12 mb15 wow slideInRight">
    <div class="service-box">
        <div class="clearfix">
            <i class="fa fa-coffee"></i>
            <h3 class="txt-ov f-18 mb10"><a href="#">服务项目</a></h3>
            <p class="f-12 f-gray i40">后台右上角主题配置自行修改</p>
        </div>
    </div>
</dd>
<dd class="col-6 col-m-12 mb15 wow slideInRight">
    <div class="service-box">
        <div class="clearfix">
            <i class="fa fa-desktop"></i>
            <h3 class="txt-ov f-18 mb10"><a href="#">服务项目</a></h3>
            <p class="f-12 f-gray i40">后台右上角主题配置自行修改</p>
        </div>
    </div>
</dd>'; 
            $options['proid'] = '1'; 
			$options['proidn'] = '8'; 
			$options['proidon'] = '1'; 
            $options['abouton'] = '1'; 
            $options['about'] = '
<div class="home-fl-bg ta-r">
    <h2 class="f-22">关于我们</h2>
    <p class="f-12">About</p>
</div>
<div class="wide">
    <div class="row">
        <div class="home-fr-txt col-12 fr info-con">
            <p>这里是首页关于我们的文字内容，打开你后台-右上角主题配置--找到对应选项自行修改；这里是首页关于我们的文字内容，打开你后台-右上角主题配置--找到对应选项自行修改；</p>
            <p>这里是首页关于我们的文字内容，打开你后台-右上角主题配置--找到对应选项自行修改；这里是首页关于我们的文字内容，打开你后台-右上角主题配置--找到对应选项自行修改；</p>
            <p>这里是首页关于我们的文字内容，打开你后台-右上角主题配置--找到对应选项自行修改；这里是首页关于我们的文字内容，打开你后台-右上角主题配置--找到对应选项自行修改；</p>
        </div>
    </div>
</div>'; 
            $options['userid'] = '1';
			$options['useridn'] = '8';
			$options['useridon'] = '1';
            $options['newsid'] = '1'; 
			$options['newsidn'] = '8'; 
			$options['newsidon'] = '1'; 
            $options['contacton'] = '1'; 
            $options['contact'] = '
<div class="home-fl-bg">
    <h2 class="f-22">联系我们</h2>
    <p class="f-12">About</p>
</div>
<div class="wide">
    <div class="row">
        <div class="home-fr-txt col-12 info-con">
            <p>公司地址：湖北省武汉市洪山区华中科技大学东门50号桔子科技有限公司</p>
            <p>联系电话：027-88888888</p>
            <p>公司微信：shhkdh</p>
            <p>售前咨询：13888888888</p>
            <p>售后咨询：13885788554</p>
            <p>在线QQ：1255544566</p>
        </div>
    </div>
</div>'; 
            $options['caseid'] = '1';
			$options['caseidn'] = '15';
			$options['caseidon'] = '1';
            $options['fx'] = ''; 
            update_option('tx_inc1_options', $options);      
        }    
        return $options;   
    }   
    /* -- init函数 初始化 -- */     
    function init() {      
        if(isset($_POST['copy'])) {        
            $options = ClassicOptions::getOptions();           
            $options['copy'] = stripslashes($_POST['copy']);
            $options['wowon'] = stripslashes($_POST['wowon']);
            $options['footon'] = stripslashes($_POST['footon']);
            $options['foot1'] = stripslashes($_POST['foot1']);
            $options['foot2'] = stripslashes($_POST['foot2']); 
            $options['foot3'] = stripslashes($_POST['foot3']);
            $options['foot4'] = stripslashes($_POST['foot4']);
            $options['sstags'] = stripslashes($_POST['sstags']);
            $options['kf1'] = stripslashes($_POST['kf1']);
            $options['kf2'] = stripslashes($_POST['kf2']);
            $options['kf3'] = stripslashes($_POST['kf3']);
            update_option('tx_inc1_options', $options);      
        } 
        if(isset($_POST['color1'])) {        
            $options = ClassicOptions::getOptions();           
            $options['color1'] = stripslashes($_POST['color1']);
            $options['color2'] = stripslashes($_POST['color2']);
            update_option('tx_inc1_options', $options);      
        } 
        if(isset($_POST['flash'])) {        
            $options = ClassicOptions::getOptions();           
            $options['flashon'] = stripslashes($_POST['flashon']);
            $options['flash'] = stripslashes($_POST['flash']);
            $options['serviceon'] = stripslashes($_POST['serviceon']);
            $options['service'] = stripslashes($_POST['service']);
            $options['proid'] = stripslashes($_POST['proid']);
			$options['proidn'] = stripslashes($_POST['proidn']);
			$options['proidon'] = stripslashes($_POST['proidon']);
            $options['abouton'] = stripslashes($_POST['abouton']);
            $options['about'] = stripslashes($_POST['about']);
            $options['userid'] = stripslashes($_POST['userid']);
			$options['useridn'] = stripslashes($_POST['useridn']);
			$options['useridon'] = stripslashes($_POST['useridon']);
            $options['newsid'] = stripslashes($_POST['newsid']);
			$options['newsidn'] = stripslashes($_POST['newsidn']);
			$options['newsidon'] = stripslashes($_POST['newsidon']);
            $options['contacton'] = stripslashes($_POST['contacton']);
            $options['contact'] = stripslashes($_POST['contact']);
            $options['caseid'] = stripslashes($_POST['caseid']);
			$options['caseidn'] = stripslashes($_POST['caseidn']);
			$options['caseidon'] = stripslashes($_POST['caseidon']);
            $options['linkson'] = stripslashes($_POST['linkson']);
            update_option('tx_inc1_options', $options);      
        } 

        if(isset($_POST['title'])) {        
            $options = ClassicOptions::getOptions();           
            $options['title'] = stripslashes($_POST['title']);
            $options['keywords'] = stripslashes($_POST['keywords']);     
            $options['description'] = stripslashes($_POST['description']);
            $options['connector'] = stripslashes($_POST['connector']);
            update_option('tx_inc1_options', $options);      
        }

        if(isset($_POST['logo'])) {        
            $options = ClassicOptions::getOptions();           
            $options['logo'] = stripslashes($_POST['logo']);  
            $options['favicon'] = stripslashes($_POST['favicon']);
            $options['pic'] = stripslashes($_POST['pic']); 
            $options['map'] = stripslashes($_POST['map']);
            $options['about-bg'] = stripslashes($_POST['about-bg']);
            update_option('tx_inc1_options', $options);      
        }

        add_theme_page("天兴主题设置", "天兴主题设置", 'edit_themes', basename(__FILE__), array('ClassicOptions', 'tx_inc1_theme_style'));   
    }     

    function tx_inc1_theme_style() {   
        wp_enqueue_script('my-jq', get_bloginfo( 'stylesheet_directory' ) . '/script/jquery-2.2.4.min.js'); 
        wp_enqueue_script('my-upload', get_bloginfo( 'stylesheet_directory' ) . '/script/upload.js'); 
        wp_enqueue_script('my-color', get_bloginfo( 'stylesheet_directory' ) . '/source/jscolor.js'); 
        wp_enqueue_media(); 
        $options = ClassicOptions::getOptions(); 
        
        $act = "";
        if ($_GET['act']){
            $act = $_GET['act'] == "" ? 'config' : $_GET['act'];
        }
?>   
<style>
.tx-configure::after,.clearfix::after,tx-configure-item::after{display: table;content: " ";clear: both; }
.fl{float: left;}.fr{float: right;}.f-12{font-size: 12px;}
.tx-configure{background-color: #fff;box-shadow: 0 1px 15px #eee;max-width: 900px;margin: 20px auto;font-weight: 200;border-radius: 5px;overflow: hidden;position: relative;font-size: 14px;}
.tx-configure *{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
.tx-configure a{transition: all .35s ease 0s;text-decoration: none;}
.tx-configure::after{content: "";position: absolute;left: 0;top: 0;width: 180px;height: 100%;box-shadow: 0 6px 12px rgba(0,0,0,.1);z-index: 1;background-color: #fdfdfd;}
.tx-configure-cate{margin: 0;max-width: 700px;border: 1px solid #eee;}
.tx-configure-title{color: #000;position: relative;z-index: 11;width: 100%;background-color: #555;padding:10px 15px;line-height: 40px;color: #fff;box-shadow: 0 6px 12px rgba(0,0,0,.1);}
.tx-configure-title h2{font-size: 20px;font-weight: 200;margin: 0;color: #fff;}
.tx-logo{display: inline-block;width: 40px;height: 40px;background:url(<?php bloginfo('url');?>/wp-content/themes/tx_inc1/style/img/txcstx.png) no-repeat 0 0;background-size:100% 100%;border-radius: 50%;box-shadow: 0 6px 12px rgba(0,0,0,.1);float: left;margin-right: 15px;}
.tx-configure-title a{color: #fff;}
.tx-configure-cate::after{display: none;}
.tx-configure-cate h2{font-size: 18px;}
.tx-configure-cate .tx-configure-box{padding:5px 20px;}
.tx-configure-cate .tx-configure-box li:last-child{border-bottom: 0;}
.tx-configure-nav{line-height: 40px;padding: 15px 0;float: left;width: 180px;position: relative;z-index: 2;}
.tx-configure-nav a{display:block; padding: 0 26px;color:#000;text-decoration: none;position: relative;}
.tx-configure-nav a:hover{padding-left:31px;}
.tx-configure-nav a.on,.tx-configure-nav a:hover,.tx-configure a:hover{color: #ff6f3d;}
.tx-configure-nav a.on::after{content: "";position: absolute;top:50%;left:0;width:1px;height:14px;border-left: 3px solid #ff6f3d;margin-top:-7px;}
.tx-configure-text{padding:15px 30px;color: #666;overflow: hidden;}
.tx-configure-text-title{font-size: 20px;font-weight: 200;color: #111;margin:15px 0;padding:0;line-height: 1.2;}
.tx-configure-text li{padding: 10px 0;border-bottom: 1px dotted #eee;}
.tx-configure-text li:last-child{padding-bottom: 0;border-bottom: 0;}
.tx-configure-box{padding: 15px 30px;line-height: 30px;color: #666;overflow: hidden;}
.tx-configure-item{padding: 8px 0;border-bottom: 1px dotted #eee;}
.tx-configure-label{display: block;margin-bottom: 5px;cursor:auto;}
.label-block{float: left;margin:0 5px 0 0;}
.tx-configure-block span{margin-left: 10px;color: #999;font-size: 12px;}
.tx-configure-block small{margin-top: 8px;color: #aaa;font-size: 12px;display: block;line-height: 1.2;position: relative;padding-left: 18px;}
.tx-configure-block small::after{content: "?";display: block;position: absolute;left: 0;top: 0;width: 14px;height: 14px;line-height: 14px; border-radius: 50%;background-color: #eee;color: #999;text-align: center;font-size: 9px;}
.tx-configure-box input[type="text"],.tx-configure-box textarea{width: 100%;padding:4px 8px;box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);font-weight: 200;color: #666;font-size: 14px;font-family: "Microsoft YaHei", Verdana, sans-serif;}
.tx-configure-box input[type="text"]{line-height: 22px;height: 30px;overflow: hidden;}
.tx-configure-submit{background-color: #fff;padding:10px 0 0 0;border-radius:0 0 5px 5px;color: #aaa;font-size: 10px;line-height: 29px;}
.tx-configure-submit input,.tx-configure input[type="Submit"],#btnPost,.tx-configure-upfile input[type="button"]{background-color: #ff6f3d;margin: 0;padding: 0 20px;color: #fff;border: 0;border-radius: 2px;font-weight: 200;font-size: 14px;font-family: "Microsoft YaHei", Verdana, sans-serif;line-height:29px;height:29px;display:inline-block;vertical-align:middle}
.tx-configure-submit input:hover{opacity: 0.9;background-color: #ff6f3d;}
.tx-configure-upfile{position: relative;width: 60%;}
.tx-configure-aryic{width: 99%;margin-bottom: 8px;}
.tx-configure-upfile input[type="button"]{position: absolute;right: 0;top: 0;}
.tx-configure-upfile input[type="text"]{width: 100%;box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);font-weight: 200;color: #666;font-size: 14px;font-family: "Microsoft YaHei", Verdana, sans-serif;padding: 0 5px;line-height: 29px;height: 29px;}
.ul-two li{float: left;width: 48%;}
.ul-two li:nth-child(2n){float: right;}
.tx-configure-upfile-box{box-shadow: 0 1px 5px rgba(0,0,0,.1);background-color: #fff;border-radius: 3px;overflow: hidden;}
.tx-configure-upimg li{width: 32%;float: left;margin-right: 2%;border: 0;padding: 0;margin-bottom: 10px;}
.tx-configure-upimg li:nth-child(3n){float: right;margin-right: 0;}
.tx-configure-upimg li.tx-configure-submit{width: 100%;margin: 0;}
.upimg-img{width:100%;height: 100px; overflow: hidden;text-align: center;padding:30px 10px;}
.upimg-img img{max-width: 100%;height:40px;-o-object-fit: cover;object-fit: cover;display:inline-block;line-height: 1;}
.tx-configure-upimg a.upload_button{display: block;width: 100%;border: 0;background-color: #ff6f3d;margin: 0;line-height: 33px;height: 33px;padding: 0;text-align:center;color:#fff}
.tx-configure-upimg p{line-height: 30px;padding: 0;height: 30px;overflow: hidden;padding: 0 15px;background-color: #fafafa;text-align: center;margin:0}
.recovery-color{display: inline-block;margin-left: 10px;line-height: 29px;height: 29px;background-color: #f1f1f1;border-radius: 2px;padding: 0 15px;vertical-align:middle;font-size: 12px;}
/*checkbox*/
.imgcheck{background: url(<?php bloginfo('url');?>/wp-content/themes/tx_inc1/style/img/checkbox.png) no-repeat 0 bottom; width: 40px; height: 17px; display: inline-block;/*	float:left;*/ cursor: pointer; margin-bottom: -3px; margin-left: 5px; }
.imgcheck-on{background: url(<?php bloginfo('url');?>/wp-content/themes/tx_inc1/style/img/checkbox.png) no-repeat 0 top; }
@media screen and (max-width: 900px) {
    .tx-configure,.ul-two li,.tx-configure-upfile,.upimg-img{width: 100%;}   
}
</style>

<div class="tx-configure">
	<div class="tx-configure-title clearfix">
        <a href="https://www.txcstx.cn/" target="_blank" class="tx-logo"></a>
        <h2>天兴工作室 - 主题配置</h2>
    </div>
    <div class="tx-configure-nav clearfix">
        <a href="<?php bloginfo('url');?>/wp-admin/themes.php?page=theme-options.php">主题说明</a>
        <a href="<?php bloginfo('url');?>/wp-admin/themes.php?page=theme-options.php&act=logo">图片上传</a>
        <a href="<?php bloginfo('url');?>/wp-admin/themes.php?page=theme-options.php&act=seo">SEO设置</a>
        <a href="<?php bloginfo('url');?>/wp-admin/themes.php?page=theme-options.php&act=home">首页设置</a>
        <a href="<?php bloginfo('url');?>/wp-admin/themes.php?page=theme-options.php&act=qita">其他设置</a>
        <a href="<?php bloginfo('url');?>/wp-admin/themes.php?page=theme-options.php&act=color">颜色设置</a>
        <a href="https://www.txcstx.cn/muban/" target="_blank">更多主题</a>
    </div>
    <?php
        if ($act == ''){        	 	 
    ?>
    <div class="tx-configure-text">
        <h2 class="tx-configure-text-title">主题使用说明</h2>
        <ul class="clearfix">
            <li>使用说明：页面的各项自定义配置都在后台--外观--天兴主题设置里面；每个分类的样式在后台--文章--分类目录里面设置；友情链接在后台--设置--阅读里面设置。</li>
            <li class="tx-configure-item">主题作者：<a href="https://www.txcstx.cn/" target="_blank">天兴工作室</a>；</li>
            <li>网站地址：<a href="https://www.txcstx.cn/" target="_blank">https://www.txcstx.cn</a>；</li>
            <li>联系QQ：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1109856918&amp;site=qq&amp;menu=yes" rel="nofollow">1109856918</a>；</li>
        </ul>
    </div>
    <?php
        }    	 	  		 
        if ($act == 'logo'){      				 	
    ?>
    <div class="tx-configure-text">
        <h2 class="tx-configure-text-title">主题自带图片 <span class="f-12">上传后记得保存设置</span></h2>
        <ul class="tx-configure-upimg clearfix">
            <form method="post" enctype="multipart/form-data" name="classic_form" id="classic_form1">   
                <li>
					<div class="tx-configure-upfile-box tx-configure-aryic">
                        <input name="logo" type="hidden" value="<?php echo($options['logo']); ?>">
						<a id="logo" class="upload_button" href="javascript:;">点击上传</a> 
                        <div class="upimg-img">
                            <img src="<?php if ($options['logo']){ echo($options['logo']);}else{echo ''. bloginfo('template_url').'/style/img/logo.png';} ?>">
                        </div>
                        <p>上传LOGO</p>
                    </div>
                </li> 
                <li class="tx-configure-upimg">
					<div class="tx-configure-upfile-box tx-configure-aryic">
                        <input name="favicon" type="hidden" value="<?php echo($options['favicon']); ?>">
						<a id="favicon" class="upload_button" href="javascript:;">点击上传</a> 
                        <div class="upimg-img">
                            <img src="<?php if ($options['favicon']){ echo($options['favicon']);}else{echo ''. bloginfo('template_url').'/style/img/favicon.ico';} ?>">
                        </div>
                        <p>网站头像</p>
                    </div>
                </li> 
                <li class="tx-configure-upimg">
					<div class="tx-configure-upfile-box tx-configure-aryic">
                        <input name="pic" type="hidden" value="<?php echo($options['pic']); ?>">
						<a id="pic" class="upload_button" href="javascript:;">点击上传</a> 
                        <div class="upimg-img">
                            <img src="<?php if ($options['pic']){ echo($options['pic']);}else{echo ''. bloginfo('template_url').'/style/img/pic.png';} ?>">
                        </div>
                        <p>默认缩略图</p>
                    </div>
                </li>
                <li class="tx-configure-upimg">
					<div class="tx-configure-upfile-box tx-configure-aryic">
                        <input name="about-bg" type="hidden" value="<?php echo($options['about-bg']); ?>">
						<a id="about-bg" class="upload_button" href="javascript:;">点击上传</a> 
                        <div class="upimg-img">
                            <img src="<?php if ($options['about-bg']){ echo($options['about-bg']);}else{echo ''. bloginfo('template_url').'/style/img/about-bg.jpg';} ?>">
                        </div>
                        <p>导航下默认图-推荐1920*400</p>
                    </div>
                </li>
                <li class="tx-configure-upimg">
					<div class="tx-configure-upfile-box tx-configure-aryic">
                        <input name="map" type="hidden" value="<?php echo($options['map']); ?>">
						<a id="map" class="upload_button" href="javascript:;">点击上传</a> 
                        <div class="upimg-img">
                            <img src="<?php if ($options['map']){ echo($options['map']);}else{echo ''. bloginfo('template_url').'/style/img/map.jpg';} ?>">
                        </div>
                        <p>首页联系我们图-推荐1920*600</p>
                    </div>
                </li> 
                <li class="tx-configure-submit clearfix">
                    <input type="submit" name="classic_save" value="<?php _e('保存设置'); ?>" />  
                </li>
            </form>
        </ul>
    </div>
    <?php
        }    	 	  		 
        if ($act == 'seo'){      				 	
    ?> 
    <div class="tx-configure-box">
        <h2 class="tx-configure-text-title">主题自带SEO功能</h2>
        <ul class="clearfix">
            <form method="post" enctype="multipart/form-data" name="classic_form" id="classic_form2">   
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('首页标题');?></label>
                    <div class="tx-configure-block">
                        <input type="text" name="title" value="<?php echo($options['title']); ?>">
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('首页seo关键词');?></label>
                    <div class="tx-configure-block">
                        <input type="text" name="keywords" value="<?php echo($options['keywords']); ?>">
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('首页seo描述');?></label>
                    <div class="tx-configure-block">
                        <textarea name="description" type="text" id="description"><?php echo($options['description']); ?></textarea>
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('标题之间的间隔符');?></label>
                    <div class="tx-configure-block">
                        <input type="text" name="connector" value="<?php echo($options['connector']); ?>">
                        <small>页面标题之间的连接符，可以是“-”也可以是“/”，可以是任何你觉得合适的符号</small>
                    </div>
                </li>
                <li class="tx-configure-submit clearfix">
                    <input type="submit" name="classic_save" value="<?php _e('保存设置'); ?>" />  
                </li>
            </form>
        </ul>
    </div>
    <?php
        }    	 	  		 
        if ($act == 'color'){      				 	
    ?> 
    <div class="tx-configure-box">
        <h2 class="tx-configure-text-title">主题自定义颜色</h2>
        <ul class="clearfix ul-two">
            <form method="post" enctype="multipart/form-data" name="classic_form" id="classic_form10">   
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('点亮色');?></label>
                    <div class="tx-configure-block">
                        <input class="color1" type="text" name="color1" value="#<?php echo($options['color1']); ?>">
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('页面背景色');?></label>
                    <div class="tx-configure-block">
                        <input class="color2" type="text" name="color2" value="#<?php echo($options['color2']); ?>">
                    </div>
                </li>
                <li class="tx-configure-submit clearfix">
                    <input type="submit" name="classic_save" value="<?php _e('保存设置'); ?>">
                    <a href="javascript:;" class="recovery-color">恢复默认配色</a>
                </li>
            </form>
        </ul>
    </div>
    <?php
        }    	 	  		 
        if ($act == 'qita'){      				 	
    ?> 
    <div class="tx-configure-box">
        <h2 class="tx-configure-text-title">主题其他部分设置</h2>
        <ul class="clearfix">
            <form method="post" enctype="multipart/form-data" name="classic_form" id="classic_form3">   
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('底部版权文字');?></label>
                    <div class="tx-configure-block">
                        <textarea name="copy" type="text" id="copy"><?php echo($options['copy']); ?></textarea>
                        <small>可以放统计代码，备案信息啥的</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label label-block"><?php _e('动画开关');?></label>
                    <div class="tx-configure-block">
                        <input name="wowon" type="text" value="<?php echo($options['wowon']); ?>" class="checkbox" style="display:none;">
                        <span>关闭后不显示动画效果</span>
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('底部第一个模块');?></label>
                    <div class="tx-configure-block">
                        <textarea name="foot1" type="text" id="foot1" rows="6"><?php echo($options['foot1']); ?></textarea>
                        <small>仅修改文字链接即可，代码格式勿动！</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('底部第2个模块');?></label>
                    <div class="tx-configure-block">
                        <textarea name="foot2" type="text" id="foot2" rows="6"><?php echo($options['foot2']); ?></textarea>
                        <small>仅修改文字链接即可，代码格式勿动！</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('底部第3个模块');?></label>
                    <div class="tx-configure-block">
                        <textarea name="foot3" type="text" id="foot3" rows="6"><?php echo($options['foot3']); ?></textarea>
                        <small>仅修改文字链接即可，代码格式勿动！</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('底部第4个模块');?></label>
                    <div class="tx-configure-block">
                        <textarea name="foot4" type="text" id="foot4" rows="5"><?php echo($options['foot4']); ?></textarea>
                        <small>仅修改文字链接即可，代码格式勿动！</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label label-block"><?php _e('底部自定义模块开关');?></label>
                    <div class="tx-configure-block">
                        <input name="footon" type="text" value="<?php echo($options['footon']); ?>" class="checkbox" style="display:none;">
                        <span>勾选后则不显示此模块</span>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('在线qq客服');?></label>
                    <div class="tx-configure-block">
                        <textarea name="kf1" type="text" id="kf1" rows="6"><?php echo($options['kf1']); ?></textarea>
                        <small>将代码中的“123456”替换成你自己的qq号码即可；留空则不显示</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('微信二维码');?></label>
                    <div class="tx-configure-block">
                        <textarea name="kf2" type="text" id="kf2" rows="5"><?php echo($options['kf2']); ?></textarea>
                        <small>仅修改文字链接即可，留空则不显示</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('联系电话');?></label>
                    <div class="tx-configure-block">
                        <textarea name="kf3" type="text" id="kf3"><?php echo($options['kf3']); ?></textarea>
                        <small>替换成你自己的电话即可，留空则不显示</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('搜索框下推荐搜索关键词');?></label>
                    <div class="tx-configure-block">
                        <textarea name="sstags" type="text" id="sstags" rows="5"><?php echo($options['sstags']); ?></textarea>
                        <small>仅修改文字链接即可，代码格式勿动！</small>
                    </div>
                </li>
                <li class="tx-configure-submit clearfix">
                    <input type="submit" name="classic_save" value="<?php _e('保存设置'); ?>" />  
                </li>
            </form>
        </ul>
    </div>
    <?php
        }    	 	  		 
        if ($act == 'home'){      				 	
    ?> 
    <div class="tx-configure-box">
        <h2 class="tx-configure-text-title">首页设置</h2>
        <ul class="clearfix">
            <form method="post" enctype="multipart/form-data" name="classic_form" id="classic_form3">  
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('首页flash幻灯片');?></label>
                    <div class="tx-configure-block">
                        <textarea name="flash" type="text" id="flash" rows="5"><?php echo($options['flash']); ?></textarea>
                        <small>仅修改文字链接即可，代码格式勿动！</small>
                    </div>
                </li>			
				<li class="tx-configure-item">
                    <label class="tx-configure-label label-block"><?php _e('幻灯片显示开关');?></label>
                    <div class="tx-configure-block">
                        <input name="flashon" type="text" value="<?php echo($options['flashon']); ?>" class="checkbox" style="display:none;">
                        <span>是否显示幻灯片？</span>
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('产品分类调用');?></label>
                    <div class="tx-configure-block tx-cate-get">
                        <select name="proid">
                            <?php tx_inc1_category($options['proid']); ?>                       
                        </select>
						<span>此模块调用文章数量</span>
						<input type="text" name="proidn" value="<?php echo($options['proidn']); ?>" style="width:80px">
						<span>是否显示？</span>
						<input name="proidon" type="text" value="<?php echo($options['proidon']); ?>" class="checkbox" style="display:none;">
                        <small>选择要调用的分类,调用文章数量只能填写整数。</small>
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('首页公司团队栏目调用');?></label>
                    <div class="tx-configure-block">
                        <select name="userid">
                            <?php tx_inc1_category($options['userid']); ?>                       
                        </select>
                        <span>此模块调用文章数量</span>
						<input type="text" name="useridn" value="<?php echo($options['useridn']); ?>" style="width:80px">
						<span>是否显示？</span>
						<input name="useridon" type="text" value="<?php echo($options['useridon']); ?>" class="checkbox" style="display:none;">
                        <small>选择要调用的分类,调用文章数量只能填写整数。</small>
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('首页新闻栏目调用');?></label>
                    <div class="tx-configure-block">
                        <select name="newsid">
                            <?php tx_inc1_category($options['newsid']); ?>                       
                        </select>
                        <span>此模块调用文章数量</span>
						<input type="text" name="newsidn" value="<?php echo($options['newsidn']); ?>" style="width:80px">
						<span>是否显示？</span>
						<input name="newsidon" type="text" value="<?php echo($options['newsidon']); ?>" class="checkbox" style="display:none;">
                        <small>选择要调用的分类,调用文章数量只能填写整数。</small>
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('首页案例演示栏目调用');?></label>
                    <div class="tx-configure-block">
                        <select name="caseid">
                            <?php tx_inc1_category($options['caseid']); ?>                       
                        </select>
                        <span>此模块调用文章数量</span>
						<input type="text" name="caseidn" value="<?php echo($options['caseidn']); ?>" style="width:80px">
						<span>是否显示？</span>
						<input name="caseidon" type="text" value="<?php echo($options['caseidon']); ?>" class="checkbox" style="display:none;">
                        <small>选择要调用的分类,调用文章数量只能填写整数。</small>
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('首页服务项目');?></label>
                    <div class="tx-configure-block">
                        <textarea name="service" type="text" id="service" rows="15"><?php echo($options['service']); ?></textarea>
                        <small>仅修改文字链接即可，代码格式勿动！</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label label-block"><?php _e('服务项目开关');?></label>
                    <div class="tx-configure-block">
                        <input name="serviceon" type="text" value="<?php echo($options['serviceon']); ?>" class="checkbox" style="display:none;">
                        <span>是否显示服务项目模块？</span>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('首页关于我们');?></label>
                    <div class="tx-configure-block">
                        <textarea name="about" type="text" id="about" rows="15"><?php echo($options['about']); ?></textarea>
                        <small>仅修改文字链接即可，代码格式勿动！</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label label-block"><?php _e('关于我们开关');?></label>
                    <div class="tx-configure-block">
                        <input name="abouton" type="text" value="<?php echo($options['abouton']); ?>" class="checkbox" style="display:none;">
                        <span>是否显示关于我们模块？</span>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label"><?php _e('首页联系我们');?></label>
                    <div class="tx-configure-block">
                        <textarea name="contact" type="text" id="contact" rows="15"><?php echo($options['contact']); ?></textarea>
                        <small>仅修改文字链接即可，代码格式勿动！</small>
                    </div>
                </li>
				<li class="tx-configure-item">
                    <label class="tx-configure-label label-block"><?php _e('首页联系我们开关');?></label>
                    <div class="tx-configure-block">
                        <input name="contacton" type="text" value="<?php echo($options['contacton']); ?>" class="checkbox" style="display:none;">
                        <span>是否显示联系我们模块？</span>
                    </div>
                </li>
                <li class="tx-configure-item">
                    <label class="tx-configure-label label-block"><?php _e('首页友情链接开关');?></label>
                    <div class="tx-configure-block">
                        <input name="linkson" type="text" value="<?php echo($options['linkson']); ?>" class="checkbox" style="display:none;">
                        <span>是否显示友情链接模块？</span>
                    </div>
                </li>
                <li class="tx-configure-submit clearfix">
                    <input type="submit" name="classic_save" value="<?php _e('保存设置'); ?>" />  
                </li>
            </form>
        </ul>
    </div>
    <?php
        }    	 	  		    				 	
    ?>
</div>
<?php      
    }      
}    
add_action('admin_menu', array('ClassicOptions', 'init'));
?>