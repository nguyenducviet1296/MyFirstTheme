$(document).ready(function () {
    $('.search-submit').val('');
    $('.search-submit').replaceWith('<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>')
    if(!$('.search-field').val()){
        $('.search-field').attr('placeholder','Search the site');
    }
});