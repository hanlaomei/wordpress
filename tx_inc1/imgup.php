<?php
/**
* Plugin Name: 分类自定义上传图片
*/
?>
<?php
if (!defined('Z_PLUGIN_URL'))
define('Z_PLUGIN_URL', untrailingslashit(plugins_url('', __FILE__)));
define('Z_IMAGE_PLACEHOLDER',''); 


load_plugin_textdomain('zci', FALSE, 'categories-images/languages');
add_action('admin_init', 'z_init');
function z_init() {
    $z_taxonomies = get_taxonomies();
    if (is_array($z_taxonomies)) {
        $zci_options = get_option('zci_options');
        if (empty($zci_options['excluded_taxonomies']))
            $zci_options['excluded_taxonomies'] = array();
        foreach ($z_taxonomies as $z_taxonomy) {
            if (in_array($z_taxonomy, $zci_options['excluded_taxonomies']))
                continue;
            add_action($z_taxonomy.'_add_form_fields', 'z_add_texonomy_field');
            add_action($z_taxonomy.'_edit_form_fields', 'z_edit_texonomy_field');
        }
    }
}

// add image field in add form
function z_add_texonomy_field() {
    if (get_bloginfo('version') >= 3.5)
        wp_enqueue_media();
    else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
    }
}
// add image field in edit form
function z_edit_texonomy_field($taxonomy) {
    if (get_bloginfo('version') >= 3.5)
        wp_enqueue_media();
    else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
    }
    if (z_taxonomy_image_url( $taxonomy->term_id, NULL, TRUE ) == Z_IMAGE_PLACEHOLDER)
        $image_text = "";
    else
        $image_text = z_taxonomy_image_url( $taxonomy->term_id, NULL, TRUE );
}
// upload using wordpress upload
function z_script() {
    return '<script type="text/javascript">
       jQuery(document).ready(function($) {
    var wordpress_ver = "'.get_bloginfo("version").'", upload_button;
    $(".z_upload_image_button").click(function(event) {
    upload_button = $(this);
    var frame;
    if (wordpress_ver >= "3.5") {
    event.preventDefault();
    if (frame) {
    frame.open();
    return;
    }
    frame = wp.media();
    frame.on( "select", function() {
    // Grab the selected attachment.
    var attachment = frame.state().get("selection").first();
    frame.close();
    if (upload_button.parent().prev().children().hasClass("tax_list")) {
    upload_button.parent().prev().children().val(attachment.attributes.url);
    upload_button.parent().prev().prev().children().attr("src", attachment.attributes.url);
    }
    else
    $("#taxonomy_image").val(attachment.attributes.url);
    });
    frame.open();
    }
    else {
    tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");
    return false;
    }
    });
    $(".z_remove_image_button").click(function() {
    $("#taxonomy_image").val("");
    $(this).parent().siblings(".title").children("img").attr("src","' . Z_IMAGE_PLACEHOLDER . '");
    $(".inline-edit-col :input[name=\'taxonomy_image\']").val("");
    return false;
    });
    if (wordpress_ver < "3.5") {
    window.send_to_editor = function(html) {
    imgurl = $("img",html).attr("src");
    if (upload_button.parent().prev().children().hasClass("tax_list")) {
    upload_button.parent().prev().children().val(imgurl);
    upload_button.parent().prev().prev().children().attr("src", imgurl);
    }
    else
    $("#taxonomy_image").val(imgurl);
    tb_remove();
    }
    }
    $(".editinline").live("click", function(){
       var tax_id = $(this).parents("tr").attr("id").substr(4);
       var thumb = $("#tag-"+tax_id+" .thumb img").attr("src");
    if (thumb != "' . Z_IMAGE_PLACEHOLDER . '") {
    $(".inline-edit-col :input[name=\'taxonomy_image\']").val(thumb);
    } else {
    $(".inline-edit-col :input[name=\'taxonomy_image\']").val("");
    }
    $(".inline-edit-col .title img").attr("src",thumb);
       return false;
    });
       });
    </script>';
}
// save our taxonomy image while edit or save term
add_action('edit_term','z_save_taxonomy_image');
add_action('create_term','z_save_taxonomy_image');
function z_save_taxonomy_image($term_id) {
    if(isset($_POST['taxonomy_image']))
        update_option('z_taxonomy_image'.$term_id, $_POST['taxonomy_image']);
}
// get attachment ID by image url
function z_get_attachment_id_by_url($image_src) {
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid = '$image_src'";
    $id = $wpdb->get_var($query);
    return (!empty($id)) ? $id : NULL;
}
// get taxonomy image url for the given term_id (Place holder image by default)
function z_taxonomy_image_url($term_id = NULL, $size = NULL, $return_placeholder = FALSE) {
    if (!$term_id) {
        if (is_category())
            $term_id = get_query_var('cat');
        elseif (is_tax()) {
            $current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $term_id = $current_term->term_id;
        }
    }
    $taxonomy_image_url = get_option('z_taxonomy_image'.$term_id);
    if(!empty($taxonomy_image_url)) {
        $attachment_id = z_get_attachment_id_by_url($taxonomy_image_url);
        if(!empty($attachment_id)) {
            if (empty($size))
                $size = 'full';
            $taxonomy_image_url = wp_get_attachment_image_src($attachment_id, $size);
            $taxonomy_image_url = $taxonomy_image_url[0];
        }
    }
    if ($return_placeholder)
        return ($taxonomy_image_url != '') ? $taxonomy_image_url : Z_IMAGE_PLACEHOLDER;
    else
        return $taxonomy_image_url;
}

?>
