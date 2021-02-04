jQuery(function($){
    $(window).scroll(function(){
        var bottomOffset = 2000; // отступ от нижней границы сайта, до которого должен доскроллить пользователь, чтобы подгрузились новые посты

        // if($('body').hasClass('home')) {
            var action = 'loadmore';
        // }
        // else if($('body').hasClass('single')) {
        //     var action = 'loadmore_single';
        // }

        var data = {
            'action': action,
            'query': true_posts,
            'page' : current_page,
            'type' : type
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
                        $('div.homepage, div.single, div.single-preview').find('section:last-of-type').after( data );
                        $('body').removeClass('loading');
                        current_page++;
                    }
                }
            });
        }
    });
});