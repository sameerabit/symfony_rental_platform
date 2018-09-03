/**
 * Created by Buddhi on 5/25/2018.
 */

$(document)
    .ready(function () {
        // fix main menu to page on passing
        $('.main.menu').visibility({
            type: 'fixed'
        });
        $('.overlay').visibility({
            type: 'fixed',
            offset: 80
        });

        // lazy load images
        $('.image').visibility({
            type: 'image',
            transition: 'vertical flip in',
            duration: 500
        });

        // show dropdown on hover
        $('.main.menu  .ui.dropdown').dropdown({
            on: 'hover'
        });

        //init rating
        $('.rating').rating({
            maxRating: 5
        });
    })
;

function changeFunc() {
    var selectBox = document.getElementById("category");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    $.ajax({
        url: "/ad/category/" + selectedValue,
        success: function (data) {
            $('#rate').val(data.rate);
        }
    });
}