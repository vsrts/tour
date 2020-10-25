
jQuery(document).ready(function(){

    jQuery(".item-block").click(function(event) {
        var blockId = jQuery(this).attr('id');
        jQuery('#itemLink').val(blockId);
        var text = this.querySelectorAll('.teaser-name');
        var text2 = jQuery(text).text();
        jQuery("#tourName").text(text2);
    });

    jQuery('.send').click(function () {
        jQuery('.pay-form').addClass('form-open');
    });
    jQuery('.close-img').click(function () {
        jQuery('.p-form').removeClass('form-open');
    });

    var height = screen.height;
    var host = window.location.hash;
    if(~host.indexOf('#') && i != 1){
        if(jQuery('body').hasClass('itemid-101')){
            jQuery('body, html').animate({scrollTop: jQuery(host).offset().top - 1}, 400);
        }else {
            jQuery('body, html').animate({scrollTop: jQuery(host).offset().top - 300}, 400);
        }
    var i = 1;
    }

    if (document.body.clientWidth <= '980') {
        jQuery(".left-open").toggle(function(){
            jQuery(".sidebar1").animate({left:'0px'},500); jQuery('.sidebar-arrow').addClass("rotate-arrow");}, function() {
            jQuery(".sidebar1").animate({left:'-289px'},500); jQuery('.sidebar-arrow').removeClass("rotate-arrow");
        });
    }


    if (document.body.clientWidth >= '980') {
        jQuery(window).scroll(function () {
            //if(jQuery(this).scrollTop() > 500 ){
            //  jQuery('.sidebar-nav .nav').addClass('scroll-nav');
            //}else{
            //  jQuery('.sidebar-nav .nav').removeClass('scroll-nav');
            //}

            if (jQuery(this).scrollTop() > 525) {
                jQuery('.banner').addClass('banner-scroll');
                jQuery('.page-content').addClass('page-scroll');

            } else {
                jQuery('.banner').removeClass('banner-scroll');
                jQuery('.page-content').removeClass('page-scroll');
            }
        });
    }

    jQuery(".open-banner").toggle(function(){
        jQuery('.banner-scroll').addClass('banner-open');
        }, function() {
        jQuery('.banner-scroll').removeClass('banner-open');
    });



});
///////Отправка почты
jQuery(function(){
    jQuery('#application').submit(function(e){
        e.preventDefault();
        var m_method=jQuery(this).attr('method');
        var m_action=jQuery(this).attr('action');
        var m_data=jQuery(this).serialize();
        jQuery.ajax({
            type: m_method,
            url: m_action,
            data: m_data,
            success: function(result){
                jQuery('#application').html(result);
            }
        });
    });
});