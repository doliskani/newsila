@extends('Admin.master')

@section('script')
    {{--    @include('Admin.root.script')--}}
@endsection

@section('content')
    <div id="categories" class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper d-flex justify-content-between">
                                    <span class="nav-tabs-title text-uppercase font-weight-bold">All tags</span>
                                    <a href="{{ route('tags.create') }}" type="button" rel="tooltip" title=""
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
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    Title
                                                </th>
                                                <th class="text-right pr-4">
                                                    Operation
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tags as $tag)
                                            <tr>
                                                <td class="">
                                                    <span>{{ $tag->title }}</span>
                                                </td>
                                                <td class="td-actions text-right d-flex flex-row-reverse">
                                                    <form action="{{ route('tags.destroy' , ['id' => $tag->id]) }}"
                                                          method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <a href="{{ route('tags.edit' , ['id' => $tag->id]) }}"
                                                           type="button" rel="tooltip" title=""
                                                           class="btn btn-primary btn-link btn-sm"
                                                           data-original-title="Edit Task"
                                                           aria-describedby="tooltip474024">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                        <button type="submit" rel="tooltip" title=""
                                                                class="btn btn-danger btn-link btn-sm"
                                                                data-original-title="Remove">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection