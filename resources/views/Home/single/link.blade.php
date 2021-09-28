
    <div id="single">
        <div class="container-fluid">
            <div class="row">


                <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">


                <script>
                    setTimeout(function () {
                        if (document.getElementById('singleRedirect'))
                            document.getElementById('singleRedirect').click();
                    }, 1000);
                </script>


                <a id="singleRedirect" class="d-block text-center mt-3 w-100 h6 font-weight-bold" href="{{ $post->url }}"><span class="text-dark">Opening</span> {{ $post->url }}</a>




            </div>

        </div>
    </div>



