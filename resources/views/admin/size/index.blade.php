@extends('layouts.admin.app')
@section('title', '| Sizes')
@section('content')

<div class="row">
    <div class="col-md-6">
        <a style="text-decoration:none; color:white;" href="{{ route('size.index') }}"><h1 class="h3">All Sizes</h1></a>
    </div>
    <div class="col-md-6 text-md-right">
        <a href="{{ route('size.create') }}" class="btn btn-primary">
            <span>Add New Size</span>
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
                <form class="search float-right mb-3" action="{{ route('size.index') }}" method="GET">
                    <input type="text" name="size" class="form-control" placeholder="Search Color" style="width:200px;">
                  </form>

                <div class="table-responsive">
                    <table class="table table-dark" id="category">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Size Name</th>
                            <th style="width:100px">Option</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $key=>$size)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ $size->name }} </td>
                                <td>
                                    <a class="float-left" href="{{ url('admin/size/'.$size->id.'/edit') }}" style="font-size: 18px; background-color: #3e3297; border-radius:20px; padding:10px; margin: 0px 14px 0px -26px;">
                                        <i class="mdi mdi-pencil text-primary"></i>
                                    </a>
                                    <form action="{{ url('admin/size/'.$size->id) }}" method="post">
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
            </div>
        </div>
    </div>
</div>

@endsection


