
$(document).ready(function () {
    $('.ui.modal')
        .modal()
    ;

    // $(document).on("click",".sub-category-list-item", function () {
    //     let categoryName = $(this).attr('categoryName');
    //     let categoryId = $(this).attr('categoryId');
    //     $('#selected-category-name').html(categoryName);
    //     $('#selected-category-id').val(categoryId);
    //     $('#applyFilters').removeClass('disabled');
    //     $('#resetFilters').removeClass('disabled');
    //     $('#select-category-modal').modal('hide');
    // });
    //
    // $('#open-select-category-modal').click(function () {
    //     $.ajax({
    //         type: 'GET',
    //         url: "subCategories",
    //         data: {"categoryId": 1},
    //         success: function (result) {
    //             var listHtml = "";
    //             result.forEach(function (subCategory) {
    //                 listHtml += '<div class="item sub-category-list-item" categoryName="'+subCategory.name+
    //                     '" categoryId="'+subCategory.id+
    //                     '" style="margin: 5px;">\n' +
    //                     '<div class="content">\n' +
    //                     '<a style="color: black; !important;">'+subCategory.name+'</a>\n' +
    //                     '</div>\n' +
    //                     '</div>'
    //             });
    //             $("#sub-category-list").html(listHtml);
    //         }
    //     });
    //     $('#select-category-modal').modal('show');
    // });


    // $('#back-to-main-categories').unbind('click').click( function () {
    //
    //     $('#category-navigation').html(mainCategoryList);
    // });

    // $('.select-category').unbind('click').click( function () {
    //     let clickedCategoryId = $(this).attr('categoryId');
    //     let selectedContent = $(this).html();
    //     $.ajax({
    //         type: 'GET',
    //         url: "subCategories",
    //         data: {"categoryId": clickedCategoryId},
    //         success: function (result) {
    //             let listHtml = '<a class="item select-category" style="background-color: #bababc;" categoryId="1">\n'
    //                 + selectedContent.replace("grey","") +
    //                 '</a>';
    //             listHtml += '<a class="item select-category" id="back-to-main-categories" style="color: #7d899a;" categoryId="1">\n'
    //                 + 'Back to categories' +
    //                 '</a>';
    //
    //             result.forEach(function (subCategory) {
    //                 listHtml += '<a class="item select-sub-category" subCategoryId="'+subCategory.id+'">\n' +
    //                     subCategory.name +
    //                     '</a>'
    //             });
    //             $("#category-navigation").html(listHtml);
    //         }
    //     });
    // });

    $(document).on("click",".sub-location-list-item", function () {
        let locationName = $(this).attr('locationName');
        let locationId = $(this).attr('locationId');
        $('#selected-location-name').html(locationName);
        $('#selected-location-id').val(locationId);
        $('#applyFilters').removeClass('disabled');
        $('#resetFilters').removeClass('disabled');
        $('#select-location-modal').modal('hide');
    });

    $('#open-select-location-modal').click(function () {
        $.ajax({
            type: 'GET',
            url: "locations",
            data: {"districtId": 1},
            success: function (result) {
                var listHtml = "";
                result.forEach(function (location) {
                    listHtml += '<div class="item sub-location-list-item" locationName="'+location.name+
                        '" locationId="'+location.id+
                        '" style="margin: 5px;">\n' +
                        '<div class="content">\n' +
                        '<a style="color: black; !important;">'+location.name+'</a>\n' +
                        '</div>\n' +
                        '</div>'
                });
                $("#sub-location-list").html(listHtml);
            }
        });
        $('#select-location-modal').modal('show');
    });

    $('.select-location').click(function () {
        var clickedDistrictId = $(this).attr('districtId');
        $.ajax({
            type: 'GET',
            url: "locations",
            data: {"districtId": clickedDistrictId},
            success: function (result) {
                var listHtml = "";
                result.forEach(function (location) {
                    listHtml += '<div class="item sub-location-list-item" locationName="'+location.name+
                        '" locationId="'+location.id+
                        '" style="margin: 5px;">\n' +
                        '<div class="content">\n' +
                        '<a style="color: black; !important;">'+location.name+'</a>\n' +
                        '</div>\n' +
                        '</div>'
                });
                $("#sub-location-list").html(listHtml);
            }
        });
    });

    $("#category_list").on("click", "a", function (event) {
        categoryID = event.target.id;
        category = event.target.innerText;
        $('#openModal').html(category);
        $.ajax({
            type: 'GET',
            url: "ads",
            data: {categoryId: categoryID},
            success: function (items) {
                $('#itemList').html("");
                $('#register-modal').modal('hide');
                var itemListHtml = "";
                items.forEach(function (item) {
                    itemListHtml += '<div class="ad ui grid"><div class="three wide column">' +
                        '<img src="images/ads/'+item.photos[0].url+'" class="left floated ui small rounded image"> </div><div class="eight wide column">' +
                        '<h4 class="ui header"><a href="/ad/' + item.id + '">'+item.title+'</a></h4> ' +
                        '<p class="two wide coumn">'+ item.description+'</p><p>'+ item.location.name+'</p> ' +
                        '<div class="ui star rating bottom aligned" data-rating="3"></div> ' +
                        '</div> ' +
                        '<div class="four wide column right floated"> ' +
                        '<div class="ui huge header right floated">'+item.cost+' LKR</div> ' +
                        '<div class="ui right floated">Per '+ item.rentFrequency+' '+item.frequencyType.name +'</div>'+
                        '<button class="ui labeled icon green button right floated"> ' +
                        '<i class="phone icon"></i>071 248 9789 </button> </div></div>';
                });
                $('#itemList').html(itemListHtml);
            }
        });
    });

    $("#location_list").on("click", "a", function (event) {
        locationId = event.target.id;
        locationaName = event.target.innerText;
        $('#openLocationModal').html(locationaName);
        $.ajax({
            type: 'GET',
            url: "ads",
            data: {locationId: locationId},
            success: function (items) {
                $('#itemList').html("");
                $('#location-modal').modal('hide');
                var itemListHtml = "";
                items.forEach(function (item) {
                    console.log(item);
                    itemListHtml += '<div class="ad ui grid"><div class="three wide column">' +
                        '<img src="images/ads/'+item.photos[0].url+'" class="left floated ui small rounded image"> </div><div class="eight wide column">' +
                        '<h4 class="ui header"><a href="/ad/' + item.id + '">'+item.title+'</a></h4> ' +
                        '<p class="two wide coumn">'+ item.description+'</p><p>'+ item.location.name+'</p> ' +
                        '<div class="ui star rating bottom aligned" data-rating="3"></div> ' +
                        '</div> ' +
                        '<div class="four wide column right floated"> ' +
                        '<div class="ui huge header right floated">'+item.cost+' LKR</div> ' +
                        '<div class="ui right floated">Per '+ item.rentFrequency+' '+item.frequencyType.name +'</div>'+
                        '<button class="ui labeled icon green button right floated"> ' +
                        '<i class="phone icon"></i>071 248 9789 </button> </div></div>';
                });
                $('#itemList').html(itemListHtml);
            }
        });
    });

    $("#resetFilters").click(function () {
        let isDisabled = $(this).hasClass('disabled');
        if(!isDisabled){
            window.location.href="ads?reset=1";
        }
    });

    $("#applyFilters").click(function () {
        let isDisabled = $(this).hasClass('disabled');
        if(!isDisabled){
            let selectedLocationId = $('#selected-location-id').val();
            let isMainCategorySearch = $('#isMainCategorySearch').val();
            if( isMainCategorySearch){
                let selectedCategoty = $('#selectedCategotyMenuTitle');
                window.location.href="ads?mainCategoryId="+ selectedCategoty.attr("selectedCategoryId") +"&locationId="+selectedLocationId;
            }else{
                window.location.href="ads?locationId="+selectedLocationId;
            }
        }
    });



    $("#item_autocomplete").autocomplete({
        minLength: 0,
        source: "ads",
        focus: function( event, ui ) {
            $( "#item_autocomplete" ).val( ui.item.label );
            return false;
        },
        select: function( event, ui ) {
            $( "#item_autocomplete" ).val( ui.item.label );
            $( "#project-id" ).val( ui.item.value );
            $( "#project-description" ).html( ui.item.desc );
            $( "#project-icon" ).attr( "src", "images/" + ui.item.icon );
            return false;
        }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
            .append( "<a href='/ad/update/"+item.value+"'>" + item.label + "</a>" )
            .appendTo( ul );
    };

});
