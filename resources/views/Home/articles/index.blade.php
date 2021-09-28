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
                    <div id="categories" class="col-lg-8 col-xl-8 mt-5 pl-lg-5">
                        <header class="d-flex justify-content-between mb-3">
                            <a href="" class="text-dark text-decoration-none d-flex">
                                <span>
                                    @php
                                        $cls = MostUse::getArticlesFontClass($type ,$obj );
                                        $title = MostUse::getArticlesPageTitle($type , $obj);
                                    @endphp
                                    <i class="fa  {{ $cls }} "></i>
                                </span>
                                <h4 class="font-weight-light ml-2"> {{ $title  }} </h4>
                            </a>
                            <a href="" class="btn btn-outline-primary share-link   p-4 mb-4 bg-white"
                               data-toggle="modal" data-target="#shareLink"
                               data-text="" data-title="{{ $title }}" data-cls="{{ $cls }}"
                               data-url="{{ request()->url() }}">
                                <i class="fa fa-share-alt"></i>
                                <span class="text-primary text-secondary">Share</span>
                            </a>
                        </header>

                        <category-articles :language="{{ json_encode($lang) }}" :obj="{{ json_encode($obj) }}"
                         :ownAdvert="{{ empty($ownAdvert) ? json_encode("empty") : $ownAdvert }}" :type="{{ json_encode($type) }}">
                        </category-articles>


                    </div>


                    <div id="right-sidebar" class="col-8 col-lg-4 col-xl-3 mt-lg-5 pr-5 ">
                        <aside class="mt-lg-5">

                            @include('Home.root.layouts.tags' , ['tags' => $tags])

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