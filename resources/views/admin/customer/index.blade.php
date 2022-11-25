@extends('layouts.admin.app')
@section('title', '| Customers')
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
        <a style="text-decoration:none; color:white;" href="{{ route('customerlist.index') }}"><h1 class="h3">All Customers</h1></a>
    </div>

    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-body">
                 <!----alerat customers update------->
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
                <form class="search float-right mb-3" action="" method="GET">
                    <input type="text" name="category_search" class="form-control" placeholder="Search Category" style="width:200px;">
                  </form>

                <div class="table-responsive">
                    <table class="table table-dark" id="category">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th style="width:100px">Option</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $key=>$customer)

                            <tr>
                                <td> {{ ($customers->currentpage() - 1) * $customers->perpage() + $loop->index + 1 }} </td>
                                <td> {{ $customer->fname }} </td>
                                <td> {{ $customer->lname }} </td>
                                <td> {{ $customer->username }} </td>
                                <td> {{ $customer->email }} </td>
                                <td>
                                    <form action="{{ route('customerlist.delete', $customer->id) }}" method="post">
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
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</div>

@endsection


