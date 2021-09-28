<script>
    $(function () {
        //  hide menu in mobile device on click
        $(document).on('click scroll', function (e) {
            $('.posts-res').addClass('d-none');


        });
    });


    function getSubStr(str, from, to) {
        sub = str.split(/\s+/).slice(from, to).join(" ");
        return sub;
    }
</script>