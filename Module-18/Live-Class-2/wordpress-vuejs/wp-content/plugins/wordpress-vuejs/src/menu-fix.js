function menuFix(slug) {
    var $ = jQuery;
    let menuRoot = $('#toplevel_page_' + slug);
    let currentUrl = window.location.href;
    let currentPath = currentUrl.substring(currentUrl.indexOf('admin.php'));

    menuRoot.on('click', 'a', function () {
        $('ul.wp-submenu li', menuRoot).removeClass('current');
        if ($(this).hasClass('wp-has-submenu')) {
            $('li.wp-first-item', menuRoot).addClass('current');
        } else {
            $(this).parents('li').addClass('current');
        }
    });

    $('ul.wp-submenu a', menuRoot).each(function (index, el) {
        if ($(el).attr('href') === currentPath) {
            $(el).parent().addClass('current');
            return;
        } else {
            $(el).parent().removeClass('current');
        }
    })
}

export default menuFix;