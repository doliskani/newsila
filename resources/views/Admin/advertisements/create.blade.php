@extends('Admin.master')

@section('script')
        @include('Admin.advertisements.script')
@endsection

@section('content')
    <div id="advertisments" class="content">
        <div class="container-fluid">
            <div class="row">
                @include('Admin.shares.errors')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">create advertisement</h4>
                            <p class="card-category">Fill out the form below</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('advertisements.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Url</label>
                                            <input type="text" name="url" class="form-control" value="{{ old('url') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Image</label>
                                            <input type="text" name="image" class="form-control" value="{{ old('image') }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4 mt-3">
                                        <div class="form-group ">
                                            <label for="category_id" class="bmd-label-floating">Category</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                <option value="none">not selected</option>
                                                @foreach(\App\Category::all() as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                                <option value="other">Other pages</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4 mt-3">
                                        <div class="form-group ">
                                            <label for="position" class="bmd-label-floating">Position</label>
                                            <select name="position" class="form-control" id="position">
                                                <option value="center">center</option>
                                                <option value="right">right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8"></div>

                                    <div class="col-sm-4 mt-3">
                                        <div class="form-group ">
                                            <label for="ad_number" class="bmd-label-floating">Ad number</label>
                                            <select name="ad_number" class="form-control" id="ad_number">
                                                <option value="1">one</option>
                                                <option value="2">two</option>
                                                <option value="3">three</option>
                                                <option value="4">four</option>
                                                <option value="5">five</option>
                                                <option value="6">six</option>
                                                <option value="7">seven</option>
                                                <option value="8">eight</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4 mt-3">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="publish" class="custom-control-input" id="switch1">
                                            <label class="custom-control-label" for="switch1">Publish</label>
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