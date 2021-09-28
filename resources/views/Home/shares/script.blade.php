<script>


    var hWin = $(window).height();
    var wWin = $(window).width();

    $('aside.mt-4').css('height', hWin);
    var headlines = $('#app');
    // show more on news
    headlines.on('click', '.show-more', function (e) {
        e.preventDefault();
        console.log(10000);
        $(this).parents('article').find('figcaption span:not(:first-of-type)').toggleClass('text-hide');
        $(this).find('i').toggleClass('rotate');
    });

    // show and hide menu
    var header = $('#header');




    //  hide menu in mobile device on click
    $(document).on('click scroll', function (e) {
        var aside = $('#menu');
        if ($(e.target).closest('#menu').length == 0) {

            if ($(e.target).closest('.menu').length != 0) {
                if (wWin < 992 && aside.hasClass('d-none')){
                    aside.addClass('hide-menu');
                    aside.removeClass('d-none');
                }

                setTimeout(function () {
                    aside.toggleClass('hide-menu');
                }, 100);

            }else{
                console.log(6);
                if ($("#single").length > 0 || wWin < 992)
                    aside.addClass('hide-menu');
            }
        }


        if ($(e.target).closest('#search').length == 0 && $(e.target).closest('.res-search').length == 0) {
            $('.res-search').addClass('d-none');
        }

        if ($(e.target).closest('.custom-search').length == 0) {
            if ($(e.target).closest('.custom-search-caret').length == 0) {
                $('.custom-search').addClass('d-none');
                $('.custom-search-caret').removeClass('caret-up');
            }
        }


    });


    // focus on the search box
    var search = $("#search-site");
    search.on('focus', "#search", function () {
        $(this).css('background-color', '#fff');
        $('#search-site .form-show-res > form').css({
            'background-color': '#fff',
            'border': '1px solid #eae9e9',
        });
        $('#search-site .input-group-append span').css('background-color', '#fff');
        $('#search-site .input-group-prepend button').css('background-color', '#fff');
    });

    // focusout on the search box
    search.on('focusout', "#search", function () {
        $(this).css('background-color', '#EAE9E9');
        $('#search-site .input-group-append span').css('background-color', '#EAE9E9');
        $('#search-site .form-show-res > form').css({
            'background-color': '#EAE9E9',
            'border': '1px solid transparent',
        });
        $('#search-site .input-group-prepend button').css('background-color', '#EAE9E9');
    });


    // show search box in mobile device
    header.on('click', ".show-search button", function () {
        $(this).parent().addClass('d-none').removeClass('d-block');
        $('#logo').addClass('d-none');
        $('#search-site').addClass('shown-mobile-search').css({
            'display': 'block',
        });
        $('#search-site form').removeClass('d-none');
        $('#search-site form input').focus();
        $('#search-site .input-group-prepend i').removeClass('fa-search').addClass('fa-angle-left ');

    });

    // hide search box in mobile device
    header.on('click', ".shown-mobile-search button", function (e) {
        var val = $('#search').val();
        if($(this).find('i').hasClass('fa-angle-left')){
            if (val.length < 2){
                e.preventDefault();
            }
        }
        $('#logo , .show-search').removeClass('d-none');
        $('#search-site').removeAttr('style');
        $('#search-site form').addClass('d-none');
        $('#search-site .input-group-prepend i').addClass('fa-search').removeClass('fa-angle-left');

    });





    // $('.singleRedirect').trigger('click');


    function getSubStr(str, from, to) {
        sub = str.split(/\s+/).slice(from, to).join(" ");
        return sub;
    }
</script>