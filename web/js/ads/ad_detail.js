$(document).ready(function () {
    $('.clickable-image').click(function() {
        let selectedImageElement = $(this).find('img');
        let displayImageElement = $('#display-image');
        let preSelectedImageElement =  $('.selected-image');
        preSelectedImageElement.removeClass('selected-image');
        preSelectedImageElement.addClass('disabled');
        $(this).addClass('selected-image');
        $(this).removeClass('disabled');
        displayImageElement.attr('src',selectedImageElement.attr('src'));
    });
});