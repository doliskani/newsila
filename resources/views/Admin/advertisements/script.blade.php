<script>
    $(function () {

        $('#advertisments').on('change' , '#category_id' , function () {
            $('#position').attr('disabled' , true);
            $('#ad_number').attr('disabled' , true);
        });

        if ($('#category_id').val() != "none"){
            $('#ad_number').attr('disabled' , true);
            $('#position').attr('disabled' , true);
        }


    });

</script>