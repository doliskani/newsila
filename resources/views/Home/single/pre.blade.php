@extends('Home.master')

@section('script')
    @include('Home.shares.script')
@endsection

@section('content')

    <div id="single">
        <div class="container-fluid">
            <div class="row">


                <link rel="stylesheet" href="{{ asset('css/pre-single.css') }}">

                @include('Home.shares.aside'  , ['cls'=> 'hide-menu'])


                <iframe src="{!! MostUse::getUrlFull($post) !!}" frameborder="0" width="100%" height="100%"></iframe>





            </div>

        </div>
    </div>



@endsection