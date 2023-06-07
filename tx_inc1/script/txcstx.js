function onoff(onbtn,oncon,oni,onii) {
    $(onbtn).on("click", function(e){
        $(oni).toggleClass(onii);
        $(oncon).slideToggle();
        $(document).one("click", function(){
            $(oncon).slideUp();
            $(oni).toggleClass(onii);
        });
        e.stopPropagation();
    });
    $(oncon).on("click", function(e){
        e.stopPropagation();
    });
}
onoff(".search-on",".search-box",".search-on i","");

function pcnav() {
    $(".nav>div>ul>li").hover(function() {
        if($(this).find("li").length > 0){
            $(this).children("ul").stop(true, true).slideDown();
            $(this).addClass("hover");
        }
    },function() {
        $(this).children("ul").stop(true, true).slideUp();
        $(this).removeClass("hover");
    });
}

function wapnav() {
    $(".nav>div>ul>li").each(function(){ 
        var _this = this
        $(this).find("i").click(function() {
            $(_this).find("i").toggleClass("fa-angle-up");
            $(_this).find("ul").slideToggle();
        });
    });
}

$(function(){
    var winr=$(window); 
    var surl = location.href;
    var surl2 = $(".place a:eq(1)").attr("href");
    var navbox = $(".header"),st;

    $(".nav li a").each(function() {
        if ($(this).attr("href")==surl || $(this).attr("href")==surl2) $(this).parent().addClass("on");
    });
    $(".list-nav a").each(function() {
        if ($(this).attr("href")==surl || $(this).attr("href")==surl2) $(this).addClass("on");
    });

    $(window).scroll(function () {
        st = Math.max(document.body.scrollTop || document.documentElement.scrollTop);
        if(st > 80){
            navbox.addClass("fixednav");
        }else{
            navbox.removeClass("fixednav");
        }
    });

    $(".nav>div>ul>li").each(function(){ 
        if($(this).find("li").length > 0){
            $(this).append("<i class='fa fa-angle-down'></i>");
        }
    });

    if( winr.width() >=960){
        pcnav();
    }else{
        wapnav();
        var bottommc = $('.fixed-kefu>ul').children().length;
        var bottomgs = (100/bottommc);
        $('.fixed-kefu>ul>li').css({"width":bottomgs+'%'});
    } 
    $(window).resize(function(){
        if( winr.width() >=960){
            pcnav();
        }else{
            wapnav();
            var bottommc = $('.fixed-kefu>ul').children().length;
            var bottomgs = (100/bottommc);
            $('.fixed-kefu ul li').css({"width":bottomgs+'%'});
        }
    });

    $(".search-off").click(function () {
        $(".search-box").slideUp();
    });
    $(".search-off1").click(function () {
        $(".search-box").slideUp();
    });
    $(".nav-on").click(function () {
        $(".nav>div").slideToggle();
        $(".nav-on i").toggleClass("fa-bars");
    });

    $(".side-box dl").each(function(){ 
        $(this).addClass("wow fadeInUp");
    });
    $(".gotop").click(function(){
        $('body,html').animate({scrollTop:0},1000);
    });

    $(".fixed-kefu>ul>li").hover(function() {
        if($(this).find("li").length > 0){
            $(this).children("ul").stop(true, true).fadeIn();
            $(this).addClass("on");
        }
    },function() {
        $(this).children("ul").stop(true, true).fadeOut();
        $(this).removeClass("on");
    });
});