$('#menutab-recent').hide();
$('.item-title-1').addClass('active-menutab');
$(document).ready(function () {
   $('#title1').click(function () {
       $('#menutab-first').show();
       $('#menutab-recent').hide();
       $('.item-title-1').addClass('active-menutab');
       $('.item-title-2').removeClass('active-menutab');
   });
    $('#title2').click(function () {
        $('#menutab-recent').show();
        $('#menutab-first').hide();
        $('.item-title-2').addClass('active-menutab');
        $('.item-title-1').removeClass('active-menutab');
    })
    $('#menu-item-1530').find("a:first").append('<i class="fa fa-sort-desc" aria-hidden="true"></i>');
    $('#list-related-post').find("li").eq(0).css("float","right");
    $('#list-related-post').find("li").eq(2).css("float","right");
    $('#list-related-post').find("li").eq(1).css("float","left");
    $('#list-related-post').find("li").eq(3).css("float","left");
});