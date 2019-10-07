;(function ($) {
    $(document).ready(function () {
        var slider = tns({
           container:'.slider',
            speed:300,
            autoplayTimeout: 3000,
            autoplay:true,
            autoHeight:true,
            controls:false,
            nav:false,
            autoplayButtonOutput:false
        });
    });
})(jQuery);