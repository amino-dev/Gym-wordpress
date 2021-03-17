jQuery(document).ready(function($){

    var share_container;

    $(window).on('resize.wslu', function() {
        
        share_container = $('.xs_social_share_widget.wslu-share-horizontal.wslu-main_content'),
        parent = share_container.parent(),
        shareCount = share_container.find('.wslu-share-count'),
        parentWidth = parent.width();
        shareContainerWidth = share_container.find('ul').outerWidth(true);

        shareCount.length ? shareContainerWidth += shareCount.outerWidth(true) : '';



        if(shareContainerWidth > parentWidth){
            var shareCountWidth = shareCount.length ? shareCount.outerWidth(true) : 0;
            temLength =  shareCountWidth ? shareCountWidth : 0;
                var listItem = share_container.find('ul li'),
                lastELementWidth;
            for(let i = 0; i <= listItem.length; i++ ){
                temLength += $(listItem).eq(i).outerWidth(true);
             
                if(temLength > parentWidth){
                   
                    temLength -= $(listItem).eq(i).outerWidth(true);
                    lastELementWidth = $(listItem).eq(i-2).outerWidth(true);
                    break;
                }
            }



            console.log(temLength);

            var listItemWidth = share_container.find('ul').css('flex-wrap', 'wrap').find('li').outerWidth(true),
                shareBTN = 76;


     
            
            var wrapperItemsPos = Math.floor((temLength - shareCountWidth) / lastELementWidth);
            var back = shareBTN > lastELementWidth ? Math.ceil(shareBTN / lastELementWidth) : 1;


            share_container.find('ul li').slice( wrapperItemsPos -  back ).wrapAll( "<div class='wslu-share-more'><ul></ul></div>" );
            
        }
    }).trigger('resize.wslu');

    share_container.find('.wslu-share-more').prepend('<span class="wslu-share-more-btn-close met-social met-social-cross"></span><h3 class="wslu-share-more-btn-title">Share this with:</h3>').before('<li class="wslu-share-more-btn"><a href="#"><div class="wslu-both-counter-text"><span class="wslu-share-more-btn--icon met-social met-social-share-1"></span> Share</div></a></li>');

    $('.xs_social_share_widget').on('click', '.wslu-share-more-btn', function(){
        $(this).addClass('active').next().addClass('active');
    });
    $('.xs_social_share_widget').on('click', '.wslu-share-more-btn-close', function(){
        $(this).parent().removeClass('active').prev().removeClass('active');
    });


    if(rest_config.insta_enabled == '1') {

        setTimeout(function (ev) {
            check_instagram_cache();
        }, 1200);
    }
});

function check_instagram_cache() {

    var values = {
        'route': '',
        '_token': ''
    };

    jQuery.ajax({
        data: values,
        type: 'post',
        url: window.rest_config.rest_url + 'wslu/v1/check_cache/instagram/',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-WP-Nonce', rest_config.nonce);
        },
        success: function (data) {
            if(data.success && data.expired) {

                fetch_and_cache_instagram_count(data.unm);
            }
            console.log('Instagram data cache was initiated - ', data);
        },
        error: function (data) {},
        complete: function () {}
    });

}


function fetch_and_cache_instagram_count(username) {

    jQuery.get("https://www.instagram.com/" + username + "/?__a=1", function (content) {
        console.log(content.graphql.user.edge_followed_by);
        console.log(content);

        var count = 0;

        if(content.graphql.user.edge_followed_by) {

            count = content.graphql.user.edge_followed_by;
        }

        jQuery.ajax({
            type: 'POST',
            url: window.rest_config.rest_url + 'wslu/v1/save_cache/instagram/',
            data: {
                content: count
            },
            success: function (data) {
                console.log('Instagram data fetch for user - ' + username, data);

            },
            error: function (data) {
                console.log('Instagram data fetch failed for user - ' + username, data);
            }
        })
    });
}