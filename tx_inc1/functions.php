<?php
/**
 * tx_inc1
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package WordPress
 * @subpackage tx_inc1
 * @since 1.0.0
 */
require_once( dirname(__FILE__).'/category_field.php' );
add_action('publish_post', 'tx_inc1_addmeta');//发布文章时
function tx_inc1_addmeta($post_ID) {
    global $wpdb;
    if(!wp_is_post_revision($post_ID)) {
        add_post_meta($post_ID, '产品价格', '', true);
        add_post_meta($post_ID, '购买按钮链接', '', true);
        add_post_meta($post_ID, '购买按钮文字', '', true);
    }
}
//谷歌字体
function remove_open_sans() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    wp_enqueue_style('open-sans','');
}
add_action( 'init', 'remove_open_sans' );

remove_action( 'wp_head', 'wp_enqueue_scripts', 1 ); //Javascript的调用
remove_action( 'wp_head', 'feed_links', 2 ); //移除feed
remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除feed
remove_action( 'wp_head', 'rsd_link' ); //移除离线编辑器开放接口
remove_action( 'wp_head', 'wlwmanifest_link' );  //移除离线编辑器开放接口
remove_action('admin_print_scripts','print_emoji_detection_script');
remove_action('admin_print_styles','print_emoji_styles');
remove_action('wp_head','print_emoji_detection_script',7);
remove_action('wp_print_styles','print_emoji_styles');
remove_filter('the_content_feed','wp_staticize_emoji');
remove_filter('comment_text_rss','wp_staticize_emoji');
remove_filter('wp_mail','wp_staticize_emoji_for_email');

//禁止加载WP自带的jquery.js
if ( !is_admin() ) { // 后台不禁止
    function my_init_method() {
        wp_deregister_script( 'jquery' ); // 取消原有的 jquery 定义
    }
    add_action('init', 'my_init_method'); 
}
wp_deregister_script( 'l10n' );

if(function_exists('register_nav_menu')){
    register_nav_menu('tx_inc1','主导航');
}
if (!is_nav_menu('主导航')){
    $menu_id_1 = wp_create_nav_menu('主导航');
    wp_update_nav_menu_item($menu_id_1, 0);
}

function tx_inc1_getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if( $count=='' ) {
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return "0";
    }
    return $count;
}

function tx_inc1_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}

function tx_inc1_image($as) {
    $specialthumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()));
    global $post, $posts;
    $first_img = "";
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $as->post_content, $matches); 
    $first_img = $matches [1] [0];
    if($specialthumb){
        $first_img = $specialthumb[0];
    }elseif($first_img){  
        $first_img = $first_img;
    }else{
        $first_img = get_bloginfo('stylesheet_directory').'/style/img/pic.png';
    }
    return $first_img;
}

function tx_inc1_breadcrumbs(){  
    global $wp_query;  
    if ( !is_home() ){  
        echo '<a href="'. get_settings('home') .'">首页</a>';  
        if ( is_category() ) {  
            $catTitle = single_cat_title( "", false );  
            $cat = get_cat_ID( $catTitle );  
            echo " > ". get_category_parents( $cat, TRUE, "  " ) ."";  
        }  
        elseif ( is_archive() && !is_category() ){  
            echo " >  正文";  
        }  
        elseif ( is_search() ) {  
            echo " >  搜索内容";  
        }  
        elseif ( is_404() ) {  
            echo " >  404 Not Found";  
        }  
        elseif ( is_single() ) {  
            $category = get_the_category();  
            $category_id = get_cat_ID( $category[0]->cat_name );  
            echo ' >   '. get_category_parents( $category_id, TRUE, "  >  " );  
            echo the_title('','', FALSE) ."";  
        }  
        elseif ( is_page() ) {  
            $post = $wp_query->get_queried_object();  
            if ( $post->post_parent == 0 ){  
                echo " >   ".the_title('','', FALSE)."";  
            } else {  
                $title = the_title('','', FALSE);  
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );  
                array_push($ancestors, $post->ID);  
                foreach ( $ancestors as $ancestor ){  
                    if( $ancestor != end($ancestors) ){  
                        echo ' >  <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a>';  
                    } else {  
                        echo ' >  '. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'';  
                    }  
                }  
            }  
        }  
    }  
}  


/* 访问计数 */
function tx_inc1_record_visitors(){
    if (is_singular()){
        global $post;
        $post_ID = $post->ID;
        if($post_ID){
            $post_views = (int)get_post_meta($post_ID, 'views', true);
            if(!update_post_meta($post_ID, 'views', ($post_views+1))){
                add_post_meta($post_ID, 'views', 1, true);
            }
        }
    }
}
add_action('wp_head', 'tx_inc1_record_visitors');

/// 获取所有分类
function tx_inc1_category($default){
    global $wpdb;
    $request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
    $request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
    $request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
    $request .= " ORDER BY term_id asc";
    $categorys = $wpdb->get_results($request);
    foreach ($categorys as $category) {
        $output = '<option ' . ($default == $category->term_id ? 'selected="selected"' : '') . ' value="'.$category->term_id.'">'.$category->name.'</option> ';
        echo $output;
    }
}
/// 获取子分类
function tx_inc1_get_category_root_id($cat){
    $this_category = get_category($cat);
    while($this_category->category_parent) {
        $this_category = get_category($this_category->category_parent);
    }
    return $this_category->term_id;
}

/// 取得文章的阅读次数
function tx_inc1_post_views($before = '(点击 ', $after = ' 次)', $echo = 1){
    global $post;
    $post_ID = $post->ID;
    $views = (int)get_post_meta($post_ID, 'views', true);
    if ($echo) echo $before, number_format($views), $after;
    else return $views;
}


function TransferHTML($source, $para){
    if (strpos($para, '[html-format]') !== false) {
        $source = htmlspecialchars($source);
    }
    if (strpos($para, '[nohtml]') !== false) {
        $source = preg_replace("/<([^<>]*)>/si", "", $source);
        $source = str_replace("<", "˂", $source);
        $source = str_replace(">", "˃", $source);
    }
    if (strpos($para, '[noscript]') !== false) {
        $class = new XssHtml($source);
        $source = trim($class->getHtml());
    }
    if (strpos($para, '[enter]') !== false) {
        $source = str_replace("\r\n", "<br/>", $source);
        $source = str_replace("\n", "<br/>", $source);
        $source = str_replace("\r", "<br/>", $source);
        $source = preg_replace("/(<br\/>)+/", "<br/>", $source);
    }
    if (strpos($para, '[noenter]') !== false) {
        $source = str_replace("\r\n", "", $source);
        $source = str_replace("\n", "", $source);
        $source = str_replace("\r", "", $source);
    }
    if (strpos($para, '[filename]') !== false) {
        $source = str_replace(array("/", "#", "$", "\\", ":", "?", "*", "\"", "<", ">", "|", " "), array(""), $source);
    }
    if (strpos($para, '[normalname]') !== false) {
        $source = str_replace(array("#", "$", "(", ")", "*", "+", "[", "]", "{", "}", "?", "\\", "^", "|", ":", "'", "\"", ";", "@", "~", "=", "%", "&"), array(""), $source);
    }
    return $source;
}

function SubStrUTF8($sourcestr, $cutlength){
    if (function_exists('mb_substr') && function_exists('mb_internal_encoding')) {
        mb_internal_encoding('UTF-8');
        return mb_substr($sourcestr, 0, $cutlength);
    }
    if (function_exists('iconv_substr') && function_exists('iconv_set_encoding')) {
        iconv_set_encoding("internal_encoding", "UTF-8");
        iconv_set_encoding("output_encoding", "UTF-8");
        return iconv_substr($sourcestr, 0, $cutlength);
    }
    $ret = '';
    $i = 0;
    $n = 0;
    $str_length = strlen($sourcestr); //字符串的字节数
    while (($n < $cutlength) and ($i <= $str_length)) {
        $temp_str = substr($sourcestr, $i, 1);
        $ascnum = ord($temp_str); //得到字符串中第$i位字符的ascii码
        if ($ascnum >= 224) { //如果ASCII位高与224，
            $ret = $ret . substr($sourcestr, $i, 3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
            $i = $i + 3; //实际Byte计为3
            $n++; //字串长度计1
        } elseif ($ascnum >= 192) { //如果ASCII位高与192，
            $ret = $ret . substr($sourcestr, $i, 2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
            $i = $i + 2; //实际Byte计为2
            $n++; //字串长度计1
        } elseif ($ascnum >= 65 && $ascnum <= 90) { //如果是大写字母，
            $ret = $ret . substr($sourcestr, $i, 1);
            $i = $i + 1; //实际的Byte数仍计1个
            $n++; //但考虑整体美观，大写字母计成一个高位字符
        } else {
            //其他情况下，包括小写字母和半角标点符号，
            {
                $ret = $ret . substr($sourcestr, $i, 1);
                $i = $i + 1; //实际的Byte数计1个
                $n = $n + 0.5; //小写字母和半角标点等与半个高位字符宽...
            }
        }
    }
    return $ret;
}


function tx_inc1_intro($as,$long){    	 			   		  		  
    $description = '';     		   	 
    if (has_excerpt()){
        $description = get_the_excerpt();	 	 	 
    }else{
        $description = preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($as,'[nohtml]'),$long)));
    }
    return $description;      	  	  
} 


//评论列表
function commentlist($comment,$args,$depth){
    $GLOBALS['comment']=$comment; 
    //主评论计数器 by zwwooooo
    global $commentcount, $page, $wpdb;
    if ( (int) get_option('page_comments') === 1 && (int) get_option('thread_comments') === 1 ) { //开启嵌套评论和分页才启用
        if(!$commentcount) { //初始化楼层计数器
            $page = ( !empty($in_comment_loop) ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args ); //获取当前评论列表页码
            $cpp = get_option('comments_per_page'); //获取每页评论显示数量
            if ( get_option('comment_order') === 'desc' ) { //倒序
                $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type = 'all' AND comment_approved = '1' AND !comment_parent");
                $cnt = count($comments); //获取主评论总数量
                if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp))) { //如果评论只有1页或者是最后一页，初始值为主评论总数
                    $commentcount = $cnt + 1;
                } else {
                    $commentcount = $cpp * $page + 1;
                }
            } else {
                $commentcount = $cpp * ($page - 1);
            }
        }
        if ( !$parent_id = $comment->comment_parent ) {
            $commentcountText = '<div class="floor">';
            if ( get_option('comment_order') === 'desc' ) { //倒序
                $commentcountText .= '#' . ++$commentcount;
            } else {
                $commentcountText .= '#' . ++$commentcount;
            }
            $commentcountText .= '</div>';
        }
    }
?>
<li <?php comment_class(); ?>>
    <div id="comment-<?php comment_ID(); ?>" class="comment-body">
        <?php echo get_avatar($comment,'32'); ?>
        <section>
            <p class="commentname mb5">
                <span class="mr10"><?php printf(__('%s'), get_comment_author_link()) ?></span>
                <span class="mr15 f-gray f-12">评论于[<?php comment_time('Y-m-d H:i:s'); ?>]</span>
                <span class="reply hide">
                    <?php comment_reply_link(array_merge($args,array('reply_text' =>'回复','depth' =>$depth,'max_depth'=>$args['max_depth']))) ?>
                </span>
            </p>
            <?php if($comment->comment_approved=='0'): ?>
            <span class="moderation"><?php _e('您的评论正在等待审核.') ?></span>
            <?php endif; ?>
            <div class="commenttext">
                <?php comment_text() ?>
            </div>
        </section>
        <?php echo $commentcountText;?>
    </div>
    <?php 
}

//冒充评论检验
function CheckEmailAndName(){
    global $wpdb;
    $comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
    $comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
    if(!$comment_author || !$comment_author_email){
        return;
    }
    $result_set = $wpdb->get_results("SELECT display_name, user_email FROM $wpdb->users WHERE display_name = '" . $comment_author . "' OR user_email = '" . $comment_author_email . "'");
    if ($result_set) {
        if ($result_set[0]->display_name == $comment_author){
            err(__('警告: 您不能使用博主的昵称！'));
        }else{
            err(__('警告: 您不能使用博主的邮箱！'));
        }
        fail($errorMessage);
    }
}
add_action('pre_comment_on_post', 'CheckEmailAndName');

/* 评论必须有中文和禁止某些字段出现 */    
function tx_comment_post( $incoming_comment ) {    
    $pattern = '/[一-龥]/u';    
    $http = '/[.|<|妈|逼|滚|贱|淫|互|娘|爹|孙|友|夜|ッ|の|ン|優|業|グ|貿|]/u';  
    // 禁止全英文评论  
    if(!preg_match($pattern, $incoming_comment['comment_content'])) {  
        wp_die( "请认真评论好吗?您这样随意打乱码对站长也太不尊敬了吧,你觉得呢?" );  
    }elseif(preg_match($http, $incoming_comment['comment_content'])) {  
        wp_die( "万恶的发贴机,这里不允许出现连点号,更请您文明用语!" );    
    }    
    return( $incoming_comment );    
}    
add_filter('preprocess_comment', 'tx_comment_post');

function AjaxCommentsPage(){
    if( isset($_GET['action'])&& $_GET['action'] == 'AjaxCommentsPage'  ){
        global $post,$wp_query, $wp_rewrite;
        $postid = isset($_GET['post']) ? $_GET['post'] : null;
        $pageid = isset($_GET['page']) ? $_GET['page'] : null;
        if(!$postid || !$pageid){
            fail(__('Error post id or comment page id.'));
        }
        // get comments
        $comments = get_comments('post_id='.$postid);
        $post = get_post($postid);
        if(!$comments){
            fail(__('Error! can\'t find the comments'));
        }
        //if( 'desc' != get_option('comment_order') ){
        //	$comments = array_reverse($comments);
        //}
        $comments = array_reverse($comments);//?有点不明白
        // set as singular (is_single || is_page || is_attachment)
        $wp_query->is_singular = true;
        // base url of page links
        $baseLink = '';
        if ($wp_rewrite->using_permalinks()) {
            $baseLink = '&base=' . user_trailingslashit(get_permalink($postid) . 'comment-page-%#%', 'commentpaged');
        }
        // response 注意修改callback为你自己的，没有就去掉callback
        wp_list_comments('callback=commentlist&type=comment&max_depth=10000&page=' . $pageid . '&per_page=' . get_option('comments_per_page'), $comments);
        echo '<!--winysky-AJAX-COMMENT-PAGE-->';
        echo '<span id="cp_post_id" style="display:none;">'.$post->ID.'</span>';
        paginate_comments_links('current=' . $pageid . $baseLink);
        die;
    }
}
add_action('init', 'AjaxCommentsPage');

function tx_inc1_paginate(){
    $args = array(
        'prev_next'          => 0,
        'format'       => '?paged=%#%',
        'before_page_number' => '',
        'mid_size'           => 2,
        'current' => max( 1, get_query_var('paged') ),
        'prev_next'    => True,
        'prev_text'    => __('上一页'),
        'next_text'    => __('下一页'),
    );
    $page_arr=paginate_links($args); 
    if ($page_arr) {
        echo $page_arr;
    }else{
        echo "<small>您已经看完所有文章了...</small>";
    }
}

/* 友情链接 */  
add_action('admin_init', 'tx_blogroll_settings_api_init');
function tx_blogroll_settings_api_init() {
    add_settings_field('tx_blogroll_setting', '友情链接', 'tx_blogroll_setting_callback_function', 'reading');
    register_setting('reading','tx_blogroll_setting');
}

function tx_blogroll_setting_callback_function() {
    echo '<textarea name="tx_blogroll_setting" rows="10" cols="50" id="tx_blogroll_setting" class="large-text code">' . get_option('tx_blogroll_setting') . '</textarea><p>友情链接格式为：&lt;li&gt&lt;a href=&quot;#&quot; target=&quot;_blank&quot;&gt;文字&lt;/a&gt;&lt;/li&gt</p>';
}

function tx_blogroll(){
    $tx_blogroll_setting =  get_option('tx_blogroll_setting');
    if($tx_blogroll_setting){
        $tx_blogrolls = explode("\n", $tx_blogroll_setting);
        foreach ($tx_blogrolls as $tx_blogroll) {
            $tx_blogroll = explode("|", $tx_blogroll );
            echo ''.trim($tx_blogroll[0]).'';
        }
    }
}

register_sidebar( array(
    'name' => __( '默认侧边栏', 'Bing' ),
    'id' => 'widget_default',
    'description' => __( '侧边栏的描述', 'Bing' ),
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
));

include_once('theme-options.php');  

?>
