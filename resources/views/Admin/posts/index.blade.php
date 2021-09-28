@extends('Admin.master')

@section('script')
        @include('Admin.posts.script')
@endsection

@section('content')
    <div id="posts" class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <search-post></search-post>

                        <sources-posts :sourcesposts="{{ json_encode($sources_posts) }}" :sources="{{ ($sources) }}"></sources-posts>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection