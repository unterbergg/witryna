jq2 = jQuery.noConflict();
jq2(function($) {
    $('#footer-menu').find('a').on('click', (e) => {
        e.preventDefault();
        var target = $(e.target).html();
        $("body").css('overflow', 'hidden').find("[data-item='"+target+"']").show();
    });
    $('body').on('click', 'section.popup .modal-close i', (e) => {
        var target = $(e.target).closest('section.popup').attr('data-item');
        $(this).css('overflow', 'auto').find("[data-item='"+target+"']").hide();
    })
});