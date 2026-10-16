<script src="theme/front/js/jquery.js"></script>

<script src="theme/front/js/animateheadline.js"></script>
<script src="theme/front/js/bootstrap.min.js"></script>
<script src="vendor/megamenu/js/modernizr.js"></script>

<script src="theme/front/js/stickymenu.js"></script>

<link href="vendor/bootstrap3_player/css/bootstrap3_player.css" rel="stylesheet" type="text/css">
<script src="vendor/bootstrap3_player/js/bootstrap3_player.js"></script>


<link href="vendor/liScroll/li-scroller.css" rel="stylesheet" type="text/css">
<link href="theme/front/css/animate.css" rel="stylesheet" type="text/css">
<script src="vendor/liScroll/jquery.li-scroller.1.0.js"></script>
<script src="vendor/verticalScroll/js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
<link href="vendor/verticalScroll/css/site.css" rel="stylesheet" type="text/css">
<script language="javascript">
    $(function () {
        $("ul#newsScroll").liScroll();
        $(".newsVerticalUp").bootstrapNews({
            newsPerPage: 4,
            autoplay: true,
            pauseOnHover: true,
            direction: 'up',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        });
        $(".newsVerticalDown").bootstrapNews({
            newsPerPage: 4,
            autoplay: true,
            pauseOnHover: true,
            direction: 'down',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        });

        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).fadeIn("fast");
            },
            function () {
                $('.dropdown-menu', this).fadeOut("fast");
            });
        //#main-slider

        $('#aslider').carousel({
            interval: 5000
        });


        $('.centered').each(function (e) {
            $(this).css('margin-top', ($('#main-slider').height() - $(this).height()) / 2);
        });

        $(window).resize(function () {
            $('.centered').each(function (e) {
                $(this).css('margin-top', ($('#main-slider').height() - $(this).height()) / 2);
            });
        });


        //goto top
        $('.gototop').click(function(event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $("body").offset().top
            }, 500);
        });
    });
</script>
