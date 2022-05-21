$(document).ready(function($){
    var body = $('body');
    body.addClass('preloader-site');
})
$(window).load(function() {
    $('.preloader_wrapper').fadeOut();
    $('body').removeClass('preloader-site');
})