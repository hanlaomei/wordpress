<?php 
// 分类添加字段
require_once( dirname(__FILE__).'/imgup.php' );

function ems_add_category_field(){
    echo '
    <div class="form-field">
        <label for="cat-keywords">分类seo关键词</label>
        <input name="cat-keywords" id="cat-keywords" type="text" value="" size="40">
	</div>
    <div class="form-field">
		<label for="cat-descriptions">分类seo描述</label>
		<input name="cat-descriptions" id="cat-descriptions" type="text" value="" size="40">
	</div>
    <div class="form-field">
		<label for="cat-listbg">此分类导航栏下的背景图</label>
		<input name="cat-listbg" id="cat-listbg" class="upload_input" type="text" value="" size="40">
        <a id="cat-listbg" class="upload_button" href="javascript:;">上传</a>
	</div>
    <div class="form-field">
        <label for="cat-liststyle">此分类显示样式</label>
        <p>
            <span style="margin-right:20px;"><input type="radio" name="cat_liststyle" value="1"> 默认样式（新闻列表）</span>  
            <span style="margin-right:20px;"><input type="radio" name="cat_liststyle" value="2"> 产品列表样式</span>  
            <span style="margin-right:20px;"><input type="radio" name="cat_liststyle" value="3"> 公司团队样式</span>
        </p>
	</div>
    <div class="form-field">
		<label for="cat-sideon">此栏目是否显示侧栏</label>
        <p>
            <span style="margin-right:20px;"><input type="radio" name="cat_sideon" value="1"> 显示</span>  
            <span style="margin-right:20px;"><input type="radio" name="cat_sideon" value="2"> 不显示(默认)</span>  
        </p>
    </div>
    <style>.upload_button{margin-left:-40px;display: inline-block;width: 40px;line-height: 26px;height: 26px;text-align: center;background-color: #ff6f3d;color: #fff;text-decoration:none;font-size: 12px;}</style>
    ';
?>
<script src="<?php echo ''. bloginfo('template_url').'/script/jquery-2.2.4.min.js'; ?>"></script>
<script src="<?php echo ''. bloginfo('template_url').'/script/upload.js'; ?>"></script>
<?php
}
add_action('category_add_form_fields','ems_add_category_field',10,2);

// 分类编辑字段
function ems_edit_category_field($tag){
    echo '<tr class="form-field">
			<th scope="row"><label for="cat-keywords">分类seo关键词</label></th>
			<td>
				<input name="cat-keywords" id="cat-keywords" type="text" value="';
    echo get_option('cat-keywords-'.$tag->term_id).'" size="40"/><br>
			</td>
		</tr>';
    echo '<tr class="form-field">
			<th scope="row"><label for="cat-descriptions">分类seo描述</label></th>
			<td>
				<input name="cat-descriptions" id="cat-descriptions" type="text" value="';
    echo get_option('cat-descriptions-'.$tag->term_id).'" size="40"/><br>
			</td>
		</tr>';	
    echo '<tr class="form-field">
			<th scope="row"><label for="cat-listbg">此分类导航栏下的背景图</label></th>
			<td>
				<input name="cat-listbg" id="cat-listbg" class="upload_input" type="text" value="';
    echo get_option('cat-listbg-'.$tag->term_id).'" size="40"/><a id="cat-listbg" class="upload_button" href="javascript:;">上传</a><br>
			</td>
		</tr>';	
    echo '<tr class="form-field">
			<th scope="row"><label for="cat-liststyle">此分类显示样式</label></th>
			<td>
                <span style="margin-right:20px;"><input type="radio" name="cat-liststyle" value="1"> 默认样式（新闻列表）</span>
                <span style="margin-right:20px;"><input type="radio" name="cat-liststyle" value="2"> 产品列表样式</span>  
                <span style="margin-right:20px;"><input type="radio" name="cat-liststyle" value="3"> 公司团队样式</span>
			</td>
		</tr>
    ';	
    echo '<tr class="form-field">
			<th scope="row"><label for="cat-sideon">此分类显示样式</label></th>
			<td>
                <span style="margin-right:20px;"><input type="radio" name="cat-sideon" value="1"> 显示</span>  
                <span style="margin-right:20px;"><input type="radio" name="cat-sideon" value="2"> 不显示(默认)</span>  
			</td>
		</tr>
    ';	
    echo '<script>
    var y = "';echo get_option('cat-liststyle-'.$tag->term_id).'";
    var x = "';echo get_option('cat-sideon-'.$tag->term_id).'";
    var radiovar = document.getElementsByName("cat-liststyle");
    var radiovas = document.getElementsByName("cat-sideon");
    for(var i=0;i<radiovar.length;i++){
    if(radiovar[i].value==y)
    radiovar[i].checked = "checked";
    }
    for(var i=0;i<radiovas.length;i++){
    if(radiovas[i].value==x)
    radiovas[i].checked = "checked";
    }
    </script>
    <style>.upload_button{margin-left:-40px;display: inline-block;width: 40px;line-height: 26px;height: 26px;text-align: center;background-color: #ff6f3d;color: #fff;text-decoration:none;font-size: 12px;}</style>
    ';
?>
<script src="<?php echo ''. bloginfo('template_url').'/script/jquery-2.2.4.min.js'; ?>"></script>
<script src="<?php echo ''. bloginfo('template_url').'/script/upload.js'; ?>"></script>
<?php
}
add_action('category_edit_form_fields','ems_edit_category_field',10,2);

// 保存数据
function ems_taxonomy_metadate($term_id){
    if(isset($_POST['cat-keywords']) && isset($_POST['cat-descriptions'])){
        if(!current_user_can('manage_categories')){
            return $term_id;
        }
        
        $keywords_key = 'cat-keywords-'.$term_id; 
        $keywords_value = $_POST['cat-keywords'];

        $descriptions_key = 'cat-descriptions-'.$term_id;
        $descriptions_value = $_POST['cat-descriptions'];	
        
        $sideon_key = 'cat-sideon-'.$term_id; 
        $sideon_value = $_POST['cat-sideon'];
        
        $liststyle_key = 'cat-liststyle-'.$term_id; 
        $liststyle_value = $_POST['cat-liststyle'];
        
        $listbg_key = 'cat-listbg-'.$term_id; 
        $listbg_value = $_POST['cat-listbg'];

        update_option( $keywords_key, $keywords_value ); 
        update_option( $descriptions_key, $descriptions_value );
        update_option( $sideon_key, $sideon_value ); 
        update_option( $liststyle_key, $liststyle_value ); 
        update_option( $listbg_key, $listbg_value ); 
    }
}

add_action('created_category','ems_taxonomy_metadate',10,1);
add_action('edited_category','ems_taxonomy_metadate',10,1);
?>