
var $collectionHolder;

// setup an "add a tag" link
var $addTagButton = $('<button type="button" class="add_tag_link">Add a tag</button>');
var $newLinkLi = $('<li></li>').append($addTagButton);


$(document).ready(function () {

    function readURL(input,position) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                switch(position){
                    case 1:
                        $('#img1').attr('src', e.target.result);
                        break;
                    case 2:
                        $('#img2').attr('src', e.target.result);
                        break;
                    case 3:
                        $('#img3').attr('src', e.target.result);
                        break;
                    case 4:
                        $('#img4').attr('src', e.target.result);
                        break;
                    case 5:
                        $('#img5').attr('src', e.target.result);
                        break;
                }
            }

            reader.readAsDataURL(input.files[0]);

        }
    }

    $("#ad_form_photos_0_url").change(function() {
        readURL(this,1);
    });
    $("#ad_form_photos_1_url").change(function() {
        readURL(this,2);
    });
    $("#ad_form_photos_2_url").change(function() {
        readURL(this,3);
    });
    $("#ad_form_photos_3_url").change(function() {
        readURL(this,4);
    });
    $("#ad_form_photos_4_url").change(function() {
        readURL(this,5);
    });


    $collectionHolder = $('ul.photos');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new ad (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTagButton.on('click', function(e) {
        // add a new tag form (see next code block)
        addTagForm($collectionHolder, $newLinkLi);
    });

    function addTagForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');
console.log();
        // get the new index
        var index = $collectionHolder.data('index');

        var newForm = prototype;
        // You need this only if you didn't set 'label' => false in your tags field in TaskType
        // Replace '__name__label__' in the prototype's HTML to
        // instead be a number based on how many ads we have
        // newForm = newForm.replace(/__name__label__/g, index);

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many ads we have
        newForm = newForm.replace(/__name__/g, index);

        // increase the index with one for the next ad
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Add a tag" link li
        var $newFormLi = $('<li></li>').append(newForm);
        $newLinkLi.before($newFormLi);
    }


});
