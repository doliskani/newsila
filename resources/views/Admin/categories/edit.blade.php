@extends('Admin.master')

@section('script')
    {{--    @include('Admin.root.script')--}}
@endsection

@section('content')
    <div id="categories" class="content">
        <div class="container-fluid">
            <div class="row">
                @include('Admin.shares.errors')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit category</h4>
                            <p class="card-category">Fill out the form below</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categories.update' , ['id' => $category->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ old('title' , $category->title) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Icon's class </label>
                                            <input type="text" name="icon_class" class="form-control" value="{{ old('icon_class' , $category->icon_class) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Title SEO </label>
                                            <input type="text" name="title_seo" class="form-control" value="{{ old('title_seo' , $category->title_seo) }}">
                                        </div>
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Keyword SEO </label>
                                            <input type="text" name="keyword_seo" class="form-control" value="{{ old('keyword_seo' , $category->keyword_seo) }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description SEO</label>
                                            <div class="form-group bmd-form-group">
                                                <textarea name="description_seo" class="form-control" rows="5">{{ old('description_seo' , $category->description_seo) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection