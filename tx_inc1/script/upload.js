jQuery(document).ready(function(){   
    var upload_frame;   
    var value_id;  
	var img_id;  
    jQuery('.upload_button').on('click',function(event){   
        value_id =jQuery( this ).attr('id'); 
		img_id = $(this).parent().find('.upimg-img img');
        event.preventDefault();   
        if( upload_frame ){   
            upload_frame.open();   
            return;   
        }   
        upload_frame = wp.media({   
            title: 'Insert image',   
            button: {   
                text: 'Insert',   
            },   
            multiple: false   
        });   
        upload_frame.on('select',function(){   
            attachment = upload_frame.state().get('selection').first().toJSON();   
            jQuery('input[name='+value_id+']').val(attachment.url);  
			img_id.attr("src", attachment.url);
        });	   
        upload_frame.open();   
    });   
}); 

function ChangeCheckValue(obj){
    $(obj).toggleClass('imgcheck-on');
    if($(obj).hasClass('imgcheck-on')){
        $(obj).prev('input').val('1');
        $(obj).next('.off-hide').show();
    }else{
        $(obj).prev('input').val('0');
        $(obj).next('.off-hide').hide();
    }
}

$(function(){
    var surl = location.href;
    $(".tx-configure-nav a").each(function() {
        if ($(this).attr("href")==surl) $(this).addClass("on");
    });
    
    $('input.checkbox').css("display","none");
    $('input.checkbox[value="1"]').after('<span class="imgcheck imgcheck-on"></span>');
    $('input.checkbox[value!="1"]').after('<span class="imgcheck"></span>');
    $("body").on("click","span.imgcheck", function(){ChangeCheckValue(this)});
    
    $(".recovery-color").click(function () {
        $(".color1").val("44b549");
        $(".color2").val("f9f9f9");
        $("#classic_form10").trigger('submit');
    });
});

