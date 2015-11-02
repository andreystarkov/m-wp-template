jQuery(document).ready(function($) {

    $('.cd-3d-nav-trigger').on('click', function() {
        toggle3dBlock(!$('.top-navigation').hasClass('nav-is-visible'));
    });

    $('.cd-3d-nav').on('click', 'a', function() {
        var selected = $(this);
        selected.parent('li').addClass('cd-selected').siblings('li').removeClass('cd-selected');
        updateSelectedNav('close');
    });

    $(window).on('resize', function() {
        window.requestAnimationFrame(updateSelectedNav);
    });

    function toggle3dBlock(addOrRemove) {
        if (typeof(addOrRemove) === 'undefined') addOrRemove = true;
        $('.top-navigation').toggleClass('nav-is-visible', addOrRemove);
        $('.cd-3d-nav-container').toggleClass('nav-is-visible', addOrRemove);
        $('main').toggleClass('nav-is-visible', addOrRemove).one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
            addOrRemove && updateSelectedNav();
        });
    }

    function updateSelectedNav(type) {
        var selectedItem = $('.cd-selected'),
            selectedItemPosition = selectedItem.index() + 1,
            leftPosition = selectedItem.offset().left,
            backgroundColor = selectedItem.data('color'),
            marker = $('.cd-marker');

        marker.removeClassPrefix('color').addClass('color-' + selectedItemPosition).css({
            'left': leftPosition,
        });
        if (type == 'close') {
            marker.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                toggle3dBlock(false);
            });
        }
    }

    $.fn.removeClassPrefix = function(prefix) {
        this.each(function(i, el) {
            var classes = el.className.split(" ").filter(function(c) {
                return c.lastIndexOf(prefix, 0) !== 0;
            });
            el.className = $.trim(classes.join(" "));
        });
        return this;
    };
});