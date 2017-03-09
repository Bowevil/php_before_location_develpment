var $ = jQuery.noConflict();

$(document).ready(function () {
    check_php_sponsored();
    var pager = $("li.pager-item");
    if(pager.length > 0){
        each.pager.click(function(){
            check_php_sponsored();
        })
    }

});

function check_php_sponsored(){

    $('table tbody tr > td:first-child a div').each(function() {
        if ($(this).text().search(/\$token\$/g) >= 0) {
            $(this).text($(this).text().replace(/\$token\$/, ''));
            $(this).addClass('php-sponsored');
        }
    });
}