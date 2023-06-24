@extends('Admin.layouts.master')
@section('title', 'Category List')
@section('activeStatus', 'active has-sub')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Category List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('category#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>New category
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>
                    @if (session('categorySuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{ session('categorySuccess') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if (session('categoryDelete'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span>{{ session('categoryDelete') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="row">

                        {{-- Search Icon --}}
                        <div class="col-3 offset-9">
                            <form action="{{ route('category#list') }}" method="get">
                                @csrf
                                <div class="d-flex">
                                    <input type="text" name="key" class="form-control" value="{{ request('key') }}"
                                        placeholder="Search...">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>

                                </div>
                            </form>

                        </div>
                        <div class="col-3 my-2">
                            <span class="text-primary">Total : {{ $categories->total() }}</span>
                        </div>
                    </div>

                    @if (count($categories) != 0)

                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Created_at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $item)
                                        <tr class="tr-shadow">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>

                                            <td>{{ $item->created_at->format('j-F-Y') }}</td>

                                            <td>
                                                <div class="table-data-feature">
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                            <i class="zmdi zmdi-mail-send"></i>
                                        </button> --}}
                                                    <a href="{{route('category#edit', $item->id)}}">
                                                        <button class="item btn btn-warning" data-toggle="tooltip"
                                                            data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('category#delete', $item->id) }}">
                                                        <button class="item btn btn-danger mx-2" data-toggle="tooltip"
                                                            data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>

                                                    <button class="item mx-2" data-toggle="tooltip" data-placement="top"
                                                        title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <div class="mt-3">

                                {{ $categories->appends(request()->query())->links() }}


                            </div>
                        </div>
                    @else
                        <h5 class="text-danger text-center mt-4">There is no new category</h5>

                    @endif

                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
@endsection
