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
                            <h4 class="card-title">Settings update</h4>
                            <p class="card-category">Fill out the form below</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('settings.update') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Title SEO</label>
                                            <input type="text" name="title_seo" class="form-control" value="{{ old('title_seo' , $setting->index_title_seo) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Description SEO </label>
                                            <textarea name="description_seo" class="form-control" id="" cols="30" rows="10">{{ old('description_seo' , $setting->index_description_seo) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Keyword SEO </label>
                                            <input type="text" name="keyword_seo" class="form-control" value="{{ old('keyword_seo' , $setting->index_keyword_seo) }}">
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