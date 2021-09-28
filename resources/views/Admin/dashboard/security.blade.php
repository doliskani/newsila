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
                            <h4 class="card-title">Security update</h4>
                            <p class="card-category">Fill out the form below</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('security.update' , ['user' => $user->id]) }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Old password</label>
                                            <input type="password" name="old" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">New password </label>
                                            <input type="password" name="new" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Confirm password </label>
                                            <input type="password" name="confirm" class="form-control" >
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