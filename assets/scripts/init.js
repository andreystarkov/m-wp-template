/* M-Template by Andrey Starkov
    im@andreystarkov.ru | github/andreystarkov */

(function($) {
    $.fn.parallax = function(options) {
        var windowHeight = $(window).height();
        var settings = $.extend({
            speed: 0.15
        }, options);

        return this.each(function() {
            var $this = $(this);
            $(document).scroll(function() {
                var scrollTop = $(window).scrollTop();
                var offset = $this.offset().top;
                var height = $this.outerHeight();
                if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
                    return;
                }
                var yBgPosition = Math.round((offset - scrollTop) * settings.speed);
                $this.css('background-position', 'center ' + yBgPosition + 'px');
            });
        });
    }
}(jQuery));


function initScreen() {
    $('.cd-hero-slider li .overlay').css({
        backgroundColor: 'rgba(30,28,27,0.5)'
    });
    $('.caption div, .navigation').fadeIn(1500);
};

function animateElement(element, animation) {
    var classes = "animated " + animation;
    $(element).removeClass('faded hidden icon-hidden').css({
        translateY: '-1000px'
    }).addClass("visible " + classes);
    setTimeout(function() {
        $(element).removeClass(animation)
    }, 1500);
}

function svgDraw(svgObj, waypointObj, animationType, animationDuration) {

    if ( ($('#'+svgObj).length > 0) && ($(waypointObj).length > 0) ) {
        var theObj = new Vivus(svgObj, {
            type: animationType,
            duration: animationDuration,
            start: 'manual',
            onReady: function(obj) {
                obj.el.classList.add('svg-stroked');
            }
        }, function(obj) {
            obj.el.classList.add('svg-done');
        });
        new Waypoint({
            element: $(waypointObj),
            handler: function(direction) {
                console.log('animate! '+theObj);
                theObj.play();
            },
            offset: '75%'
        });
        return theObj;
    }
}

if ($('#the-logo').length > 0) {
    var mIcon = new Vivus('the-logo', {
            type: 'async',
            duration: 120,
            start: 'manual',
            onReady: function(obj) {
                obj.el.classList.add('stroke');
                setTimeout(function() {
                    obj.el.classList.add('finished');
                    initScreen();
                }, 3200);
            }
        },
        function(obj) {
            $('.caption div').css({
                opacity: '1',
                'transition': '0.7s ease-in-out opacity'
            });
            obj.el.classList.add('shadowed');
        });

    setTimeout(function() {
        mIcon.play();
    }, 400);
}

function initMenuElements(){
    console.log('het');
    var menuElements = '<div class="menu-buttons"><div class="menu-btn vkusno"><span class="icon-basket"></span></div><div class="menu-btn sweet"><span class="icon ot-icon-heart"></span></div></div>';
    $('.section-menu .menu-link').each(function(){
         console.log('dsadsa');
         $('.caption', this).append(menuElements);
    });
}

var pagesLoaded = 0;

function loadBullshit(btn, what, where){
    $.post('testing.php', {
        'page': pagesLoaded,
        'what': what
    }, function(data) {
        $(where).append(data);
        $("html, body").animate({
            scrollTop: $(".first-loaded").offset().top-150
        }, 800, function() {
            $(".first-loaded").removeClass('first-loaded');
        });
        pagesLoaded++;
    }).fail(function(xhr, ajaxOptions, thrownError) {
        console.log("fail: ".thrownError);
    }).done(function() {
      initMenuElements();
    });
}

function responsiveImageParallax(obj, nameImg, options){
    var pic = '<img srcset="'+nameImg+'-tiny.jpg 320w,'+nameImg+'-xsmall.jpg 480w, '+nameImg+'-small.jpg 640w, '+nameImg+'-medium.jpg w768, '+nameImg+'-medium.jpg 1024w, '+nameImg+'-laptop.jpg 1200w, '+nameImg+'-large.jpg 1400w,'+nameImg+'-xlarge.jpg 1600w,'+nameImg+'-full.jpg w1900" class="background-image img-parallax" data-parallax="'+options+'">';
    console.log(pic);
    $(obj).append(pic);
}

$(function() {

    $('.gallery .item').each(function(){
        $(this).append('<div class="overlay"></div>')
    });

    $("#gallery").lightGallery();

    $('top-slider .caption div').css({
        opacity: '0'
    });

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        // if mobile
    } else {
        ParallaxScroll.init();
        svgDraw('svg-icon-wine', '.intro-feature', 'async', 160);
        svgDraw('svg-icon-gift', '.intro-feature', 'async', 160);
        svgDraw('svg-icon-heart', '.intro-feature', 'async', 160);
        svgDraw('svg-icon-news', '.container-news', 'async', 200);
        svgDraw('svg-icon-mail', '.section-form', 'async', 200);
        svgDraw('svg-icon-camera', '#instagram-header', 'async', 254);
        svgDraw('svg-icon-menu', '#menu-list', 'async', 154);
        svgDraw('svg-icon-camera', '#svg-icon-camera', 'async', 154);
    }

    $('#recent').pongstgrm({
        accessId: '1590265550',
        accessToken: '1590265550.d8874ae.f5c1cbb59f6a4d09bf2e5ae4e6034d4f',
        show: 'recent'
    });

    $('.section-pictures .thumb').each(function() {
        $(this).append('<div class="overlay"></div>')
    });

    $('.cd-slider-nav li').each(function() {
        $(this).css({
            'height': $('.cd-slider-nav').height()
        });
    });

    var news = new WOW({
        boxClass: 'blog-post',
        animateClass: 'animated bounceInUp',
        offset: 10,
        delay: "0.5s",
        duration: '0.8s',
        mobile: false,
        live: true
    });

    var animObjects = new WOW({
        boxClass: 'wow',
        mobile: false,
        live: true
    });

    news.init();
    animObjects.init();
    initMenuElements();

    $('.tip').tooltip();

    $("#btn-more-news").click(function(e) {
        loadBullshit("#btn-more-news", "news", ".container-news");
    });

    $("#btn-more-menu").click(function(e) {
        loadBullshit("#btn-more-menu", "menu", ".container-menu");
    });

    $('.sweet').click(function(){
        $(this).addClass('toggled');
        $(this).parent().parent().parent().addClass('active');
    })

});