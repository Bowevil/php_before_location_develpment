var $ = jQuery.noConflict();

$(document).ready(function () {
    add_login_redirect_url();
    check_php_sponsored();
    var pager = $("li.pager-item");
    if (pager.length > 0) {
        each.pager.click(function () {
            check_php_sponsored();
        })
    }
});

function check_php_sponsored() {

    $('table tbody tr > td.views-field-title a div').each(function () {
        if ($(this).text().search(/\$token\$/g) >= 0) {
            $(this).text($(this).text().replace(/\$token\$/, ''));
            $(this).addClass('php-sponsored');
            $(this).prepend('<img class="php-image" src="sites/all/themes/bootstrap_business/images/bullet-person.png" >');
        }
    });
}

function add_login_redirect_url() {
    $('#login-redirect').click(function (e) {
        e.preventDefault();
        var paramValue = window.location.pathname;

        window.location = '/user/login?previous=' + paramValue;
    });
    $('#logout-redirect').click(function (e) {
        e.preventDefault();
        var paramValue = window.location.pathname;

        window.location = '/user/logout?destination=' + paramValue;
    });

}
