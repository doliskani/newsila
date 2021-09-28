@extends('Admin.master')

@section('script')
    {{--    @include('Admin.root.script')--}}
@endsection

@section('content')
    <div id="dashboard" class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            Profile
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Created at
                                    </th>


                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="">
                                            {{ $user->name  }}
                                        </td>
                                        <td class="">
                                            {{ $user->email  }}
                                        </td>
                                        <td class="">
                                            {{ $user->created_at  }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection