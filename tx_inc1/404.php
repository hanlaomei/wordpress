<?php
/**
 * 404模板
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <title>404 - <?php bloginfo('name');?></title>
        <style>html{-webkit-text-size-adjust:none;word-wrap:break-word;word-break:break-all;font-size:10px}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}body{margin:0;padding:0;color:#333;font-size:1.4rem;font-family:"Microsoft YaHei",Verdana,sans-serif;line-height:1.42857143;background:#fff}img{max-width:100%;height:auto;width:auto;border:0;vertical-align:middle}.tx-404{background-color: #fff;font-weight:200;color:#999;}.tx-404-box{text-align: center;padding: 50px;}.tx-404-box h1{font-size: 20px;font-weight:200;margin: 20px 0;color:#666;}.tx-404 a.return{display: inline-block;line-height:50px;height: 50px;padding: 0 60px;background: #FF3A33;border-radius:5px;margin-top: 10px;color: #fff;text-decoration: none;}</style>
    </head>
    <body class="tx-404">
        <div class="tx-404-box">
            <p><img src="<?php bloginfo('template_url');?>/style/img/404.png" alt="<?php bloginfo('name');?>404页面"></p>
            <h1><?php bloginfo('name');?>提示您：您要查看的页面不存在或已删除！</h1>
            <small>请检查您输入的网址是否正确，或者点击返回首页按钮继续浏览</small>
            <p><a href="<?php bloginfo('url');?>" class="return">返回首页</a></p>
        </div>
    </body>
</html>