<?php
/**
 * 主题自带基础seo自定义TDK功能模板
*/
?>
<?php $options = get_option('tx_inc1_options');?>
<?php if(is_home()):?>
<title><?php if($options['title']):?><?php echo($options['title']); ?><?php else: ?><?php bloginfo('name');?><?php if($options['connector']){echo($options['connector']);}else{echo " - ";} ?><?php global $page, $paged; $site_description = get_bloginfo( 'description', 'display' ); echo $site_description;?><?php endif; ?></title>
<meta name="Keywords" content="<?php echo($options['keywords']); ?>">
<meta name="description" content="<?php echo($options['description']); ?>">
<?php elseif(is_category()):?>
<title><?php echo trim(wp_title('',0));?><?php if($options['connector']){echo($options['connector']);}else{echo " - ";} ?><?php bloginfo('name');?></title>
<?php $categories = get_the_category();$term_id = $categories[0]->term_id;$cat_name = $categories[0]->name;	?>
<?php if(get_option('cat-keywords-'.$term_id)):?><meta name="Keywords" content="<?php echo get_option('cat-keywords-'.$term_id);?>"><?php endif; ?> 
<?php if(get_option('cat-descriptions-'.$term_id)):?><meta name="description" content="<?php echo get_option('cat-descriptions-'.$term_id);?>"><?php endif; ?> 
<?php elseif(is_single()):?>
<title><?php echo trim(wp_title('',0));?><?php if($options['connector']){echo($options['connector']);}else{echo " - ";} ?><?php foreach((get_the_category()) as $category){ echo $category->cat_name;}?><?php if($options['connector']){echo($options['connector']);}else{echo " - ";} ?><?php bloginfo('name');?></title>
<meta name="Keywords" content="<?php $tags = get_the_tags ();$html = '';foreach ( $tags as $tag ) {$html .= "{$tag->name},";}$html .= '';echo $html; ?><?php bloginfo('name');?>">
<meta name="description" content="<?php if($post->post_excerpt){echo $post->post_excerpt;}else{echo tx_inc1_intro($post->post_content,130);} ?>">
<?php elseif(is_page()):?>
<title><?php echo trim(wp_title('',0));?><?php if($options['connector']){echo($options['connector']);}else{echo " - ";} ?><?php bloginfo('name');?></title>
<meta name="Keywords" content="<?php echo trim(wp_title('',0));?>，<?php bloginfo('name');?>">
<meta name="description" content="<?php if($post->post_excerpt){echo $post->post_excerpt;}else{echo tx_inc1_intro($post->post_content,130);} ?>">
<?php else: ?> 
<title><?php echo trim(wp_title('',0));?><?php if($options['connector']){echo($options['connector']);}else{echo " - ";} ?><?php bloginfo('name');?></title>
<?php endif; ?> 