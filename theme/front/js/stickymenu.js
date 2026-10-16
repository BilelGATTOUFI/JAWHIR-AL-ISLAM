function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('#sticky-anchor').offset().top;
    var height = $('#sticky').height();
    if (window_top > div_top) {
        $('#sticky').addClass('stick');
        $('.emerald').css({top:height});
        $('#title h1').addClass('stick-emerald-title');
        $('.emerald').addClass('stick-emerald');
        $(".navbar").addClass("navbar-scrolled");
    } else {
        //$('.emerald').height(height);
        $('#sticky').removeClass('stick');
        $('.emerald').removeClass('stick-emerald');
        $('#title h1').removeClass('stick-emerald-title');
        $(".navbar").removeClass("navbar-scrolled");
    }
}

$(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});/**
 * Created by khaled on 20/10/2015.
 */
