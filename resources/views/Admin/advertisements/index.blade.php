@extends('Admin.master')

@section('script')
    {{--    @include('Admin.root.script')--}}
@endsection

@section('content')
    <div id="advertisements" class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper d-flex justify-content-between">
                                    <span class="nav-tabs-title text-uppercase font-weight-bold">All advertisements</span>
                                    <a href="{{ route('advertisements.create') }}" type="button" rel="tooltip" title=""
                                       class="btn btn-danger btn-link btn-sm"
                                       data-original-title="create">
                                        <i class="material-icons text-white"
                                           style="font-size: 24px;">add_circle_outline</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active  table-responsive table-borderless" id="profile">
                                   <adverts-table></adverts-table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection