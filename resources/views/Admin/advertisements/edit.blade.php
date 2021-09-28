@extends('Admin.master')

@section('script')
        @include('Admin.advertisements.script')
@endsection

@section('content')
    <div id="categories" class="content">
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
                            <form action="{{ route('advertisements.update' , ['id' => $advertisement->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Url</label>
                                            <input type="text" name="url" class="form-control" value="{{ old('url' , $advertisement->url) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Image</label>
                                            <input type="text" name="image" class="form-control" value="{{ old('image' , $advertisement->image) }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4 mt-3">
                                        <div class="form-group ">
                                            <label for="category_id" class="bmd-label-floating">Category</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                <option value="none" {{ $advertisement->category_id == "none" ? "selected" : "" }}>not selected</option>
                                                @foreach(\App\Category::all() as $cat)
                                                    <option value="{{ $cat->id }}" {{ $advertisement->category_id == $cat->id ? "selected" : "" }}>{{ $cat->title }}</option>
                                                @endforeach
                                                <option value="other" {{ $advertisement->category_id == "other" ? "selected" : "" }}>Other pages</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8"></div>

                                    <div class="col-sm-4 mt-3">
                                        <div class="form-group ">
                                            <label for="position" class="bmd-label-floating">Position</label>
                                            <select name="position" class="form-control" id="position">
                                                <option value="center" {{ $advertisement->position == 'center' ? 'selected' : '' }}>center</option>
                                                <option value="right" {{ $advertisement->position == 'right' ? 'selected' : '' }}>right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4 mt-3">
                                        <div class="form-group ">
                                            <label for="ad_number" class="bmd-label-floating">Ad number</label>
                                            <select name="ad_number" class="form-control" id="ad_number">
                                                <option value="1" {{ $advertisement->ad_number == '1' ? 'selected' : '' }}>one</option>
                                                <option value="2" {{ $advertisement->ad_number == '2' ? 'selected' : '' }}>two</option>
                                                <option value="3" {{ $advertisement->ad_number == '3' ? 'selected' : '' }}>three</option>
                                                <option value="4" {{ $advertisement->ad_number == '4' ? 'selected' : '' }}>four</option>
                                                <option value="5" {{ $advertisement->ad_number == '5' ? 'selected' : '' }}>five</option>
                                                <option value="6" {{ $advertisement->ad_number == '6' ? 'selected' : '' }}>six</option>
                                                <option value="7" {{ $advertisement->ad_number == '7' ? 'selected' : '' }}>seven</option>
                                                <option value="8" {{ $advertisement->ad_number == '8' ? 'selected' : '' }}>eight</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4 mt-3">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="publish" class="custom-control-input" id="switch1" {{ $advertisement->publish == "on" ? "checked" : "" }}>
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