

@if(MostUse::switchSingleSources($post->source))
    @include('Home.single.pre' , ['post' => $post])


@else

    <div id="single">



        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/single.css') }}" />

        <script>
            window.Laravel = {};
            window.Laravel.Auth = '{{ Auth::check() }}' == '' ? false : true;
            window.Laravel.csrfToken = '{{ csrf_token() }}';
        </script>


        <div id="app-single">
            @include('Home.shares.header')
            <div class="container-fluid">
                <div class="row">
                    @include('Home.shares.aside' , ['cls'=> 'hide-menu'])
                </div>
            </div>

        </div>


        <script src="{{ asset('js/home.js') }}"></script>
        @include('Home.shares.script')
        <script src="{{ asset('js/single-app.js') }}"></script>
        <script>



            {{--@if($post->source == "usatoday")--}}
                    {{--$('body').css('padding-top' , 0 + 'important');--}}
            {{--@endif--}}
        </script>
    </div>
    {!! $content !!}

@endif





