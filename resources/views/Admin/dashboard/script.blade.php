<script>
    $(function () {
        let hWin = $(window).height();
        let wWin = $(window).width();

        $('aside.mt-4').css('height', hWin);
        let headlines = $('#headlines');
        // show more on news
        headlines.on('click', '.show-more', function (e) {
            e.preventDefault();
            $(this).parents('article').find('figcaption span').toggleClass('text-hide');
            $(this).find('i').toggleClass('rotate');

        });

        // show and hide menu
        let header = $('#header');
        let aside = $('.container-fluid > .row > .col-lg-2 > aside');
        header.on('click', '.menu', function (e) {
            e.preventDefault();
            if (wWin <= 992){
                aside.addClass('hide-menu');
                aside.removeClass('d-none');
                setTimeout(function () {


                        aside.removeClass('hide-menu');

                } , 100);

            }

        });

        //  hide menu in mobile device on click
        $(document).on('click scroll', function (e) {
            if($(e.target).closest('#newsila-menu').length == 0){
                if (wWin <= 992){
                    aside.addClass('hide-menu');
                }else{
                    if($(e.target).closest('.menu').length != 0){
                        aside.toggleClass('hide-menu');
                    }
                }

            }

        });




        // focus on the search box
        let search = $("#search-site");
        search.on('focus', "input", function () {
            $(this).css('background-color', '#fff');
            $('#search-site form').css({
                'background-color': '#fff',
                'border': '1px solid #eae9e9',
            });
            $('#search-site .input-group-append span').css('background-color', '#fff');
            $('#search-site .input-group-prepend button').css('background-color', '#fff');
        });

        // focusout on the search box
        search.on('focusout', "input", function () {
            $(this).css('background-color', '#EAE9E9');
            $('#search-site .input-group-append span').css('background-color', '#EAE9E9');
            $('#search-site form').css({
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
            e.preventDefault();
            $('#logo , .show-search').removeClass('d-none');
            $('#search-site').removeAttr('style');
            $('#search-site form').addClass('d-none');
            $('#search-site .input-group-prepend i').addClass('fa-search').removeClass('fa-angle-left ');

        });

    });


    function getSubStr(str, from, to) {
        sub = str.split(/\s+/).slice(from, to).join(" ");
        return sub;
    }
</script>