@extends('layouts.admin.app')
@section('title', '| Products')
@section('content')

<div class="row">
    <div class="col-md-6">
        <a style="text-decoration:none; color:white;" href="{{ route('product.index') }}"><h1 class="h3">All Products</h1></a>
    </div>
    <div class="col-md-6 text-md-right">
        <a href="{{ route('product.create') }}" class="btn btn-primary">
            <span>Add New Product</span>
        </a>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-body">
                 <!----alerat------->
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
                {{-- <form class="search float-right mb-3" action="{{ route('subCategory.index') }}" method="GET">
                    <input type="text" name="search" class="form-control" placeholder="Search SubCategory" style="width:200px;">
                  </form> --}}

                <div class="table-responsive">
                    <table class="table table-dark" id="category">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Discount Price</th>
                            <th>To day Deal</th>
                            <th>Featured</th>
                            <th>Image</th>
                            <th>Add Variation</th>
                            <th style="width:150px">Option</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key=>$product)

                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ substr($product->productName, 0, 20).'..' }} </td>
                                <td> {{ $product->category->name }} </td>
                                <td> {{ $product->after_discount }} </td>
                                <td> {{ $product->to_day_deal }} </td>
                                <td> {{ $product->featured }} </td>
                                <td> <img src="{{ asset('images/thumbnailImage/'.$product->thumbnailImage) }}" alt="" ></td>
                                <td><a class="btn btn-small btn-primary" href="{{ route('product.inventory',$product->id) }}">Add</a></td>
                                <td>
                                    <a class="float-left" href="{{ route('product.edit',$product->id) }}" style="font-size: 18px; background-color: #3e3297; border-radius:20px; padding:10px; margin: 0px 14px 0px -26px;">
                                        <i class="mdi mdi-pencil text-primary"></i>
                                    </a>
                                    <form action="{{ route('product.delete',$product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="confirm('are you sure delete this product')" style="font-size: 18px; background-color: #861f1f; border-radius:20px; padding:10px; border:none;">
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
