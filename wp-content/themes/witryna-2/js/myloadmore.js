/*jQuery(function($){
    var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
        bottomOffset = 2000; // the distance (in px) from the page bottom when you want to load more posts

    $(window).scroll(function(){
        var data = {
            'action': 'loadmore',
            'query': misha_loadmore_params.posts,
            'page' : misha_loadmore_params.current_page
        };
        if( $(document).scrollTop() > ( $(document).height() - bottomOffset ) && canBeLoaded == true ){
            $.ajax({
                url : misha_loadmore_params.ajaxurl,
                data:data,
                type:'POST',
                beforeSend: function( xhr ){
                    // you can also add your own preloader here
                    // you see, the AJAX call is in process, we shouldn't run it again until complete
                    canBeLoaded = false;
                },
                success:function(data){
                    if( data ) {
                        $('div.homepage').find('section:last-of-type').after( data ); // where to insert posts
                        canBeLoaded = true; // the ajax is completed, now we can run it again
                        misha_loadmore_params.current_page++;
                    }
                }
            });
        }
    });
});*/

jQuery(function($){
    $(window).scroll(function(){
        var bottomOffset = 2000; // отступ от нижней границы сайта, до которого должен доскроллить пользователь, чтобы подгрузились новые посты
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page
        };
        if( $(document).scrollTop() > ($(document).height() - bottomOffset) && !$('body').hasClass('loading')){
            $.ajax({
                url:ajaxurl,
                data:data,
                type:'POST',
                beforeSend: function( xhr){
                    $('body').addClass('loading');
                },
                success:function(data){
                    if( data ) {
                        $('div.homepage').find('section:last-of-type').after( data );
                        $('body').removeClass('loading');
                        current_page++;
                    }
                }
            });
        }
    });
});