@extends('layouts.admin.app')
@section('title', '| Cayegory')
@section('content')

<style>
    .pagination, .jsgrid .jsgrid-pager{
        margin-top:10px;
    }
    .page-item.active .page-link, .jsgrid .jsgrid-pager .active.jsgrid-pager-nav-button .page-link, .jsgrid .jsgrid-pager .active.jsgrid-pager-page .page-link, .page-item.active .jsgrid .jsgrid-pager .jsgrid-pager-nav-button a, .jsgrid .jsgrid-pager .jsgrid-pager-nav-button .page-item.active a, .jsgrid .jsgrid-pager .active.jsgrid-pager-nav-button a, .page-item.active .jsgrid .jsgrid-pager .jsgrid-pager-page a, .jsgrid .jsgrid-pager .jsgrid-pager-page .page-item.active a, .jsgrid .jsgrid-pager .active.jsgrid-pager-page a{
        background: rgb(53, 29, 189);
    }
</style>
<div class="row">
    <div class="col-md-6">
        <a style="text-decoration:none; color:white;" href="{{ route('category.index') }}"><h1 class="h3">All Categories</h1></a>
    </div>
    <div class="col-md-6 text-md-right">
        <a href="{{ route('category.create') }}" class="btn btn-primary">
            <span>Add New category</span>
        </a>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-body">
                 <!----alerat profile update------->
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
                <form class="search float-right mb-3" action="{{ route('category.index') }}" method="GET">
                    <input type="text" name="category_search" class="form-control" placeholder="Search Category" style="width:200px;">
                  </form>

                <div class="table-responsive">
                    <table class="table table-dark" id="category">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>Added By</th>
                            <th>Banner</th>
                            <th style="width:100px">Option</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_category as $key=>$category)

                            <tr>
                                <td> {{ ($all_category->currentpage() - 1) * $all_category->perpage() + $loop->index + 1 }} </td>
                                <td> {{ $category->name }} </td>
                                <td> {{ $category->admin->username }} </td>
                                <td> <img src="{{ asset('images/category/'.$category->banner) }}" alt="" ></td>
                                <td>
                                    <a class="float-left" href="{{ url('admin/category/'.$category->id.'/edit') }}" style="font-size: 18px; background-color: #3e3297; border-radius:20px; padding:10px; margin: 0px 14px 0px -26px;">
                                        <i class="mdi mdi-pencil text-primary"></i>
                                    </a>
                                    <form action="{{ url('admin/category/'.$category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button style="font-size: 18px; background-color: #861f1f; border-radius:20px; padding:10px; border:none;">
                                            <i class="mdi mdi-delete text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $all_category->links() }}
            </div>
        </div>
    </div>
</div>

@endsection


