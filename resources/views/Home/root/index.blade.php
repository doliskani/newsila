@extends('Home.master')

@section('script')
    @include('Home.shares.script')
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                @include('Home.shares.aside')
            </div>
            <div class="col-lg-10">
                <div class="row">
                    <div id="headlines" class="col-lg-8 col-xl-8 mt-5 pl-lg-5">
                        <header class="d-flex justify-content-between mb-3">
                            <a href="" class="text-dark text-decoration-none">
                                <h4 class="font-weight-light">Headlines</h4>
                            </a>
                            <a href="{{ route('news.headlines' ,['lang' => $lang]) }}" class="text-decoration-none">More headlines</a>
                        </header>


                        <headlines :language="{{ json_encode($lang) }}" :adverts="{{ $adverts['center'] }}" :latestposts="{{ $latest_posts }}" :catsposts="{{ json_encode($catsPosts) }}" :latestids="{{ json_encode($latest_ids) }}" ></headlines>


                    </div>


                    <div id="right-sidebar" class="col-8 col-lg-4 col-xl-3 mt-lg-5 pr-5 ">
                        <aside class="mt-lg-5">

                            @include('Home.root.layouts.tags' , ['tags'])


                            @include('Home.shares.sources')


                            @include('Home.root.layouts.ads' , ['adverts' => $adverts['right']])





                        </aside>
                    </div>


                </div>


            </div>
        </div>

        <share-link></share-link>

    </div>


@endsection