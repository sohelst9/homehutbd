@extends('layouts.admin.app')
@section('title', '| Coupons')
@section('content')

<div class="row">
    <div class="col-md-6">
        <a style="text-decoration:none; color:white;" href="{{ route('coupon.index') }}"><h1 class="h3">All Coupon</h1></a>
    </div>
    <div class="col-md-6 text-md-right">
        <a href="{{ route('coupon.create') }}" class="btn btn-primary">
            <span>Add New Coupon</span>
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
                <div class="table-responsive">
                    <table class="table table-dark" id="category">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Dicount</th>
                            <th>Validity</th>
                            <th style="width:100px">Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($coupons as $key=>$coupon)
                           <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $coupon->name }}</td>
                            <td>{{ $coupon->discount }}</td>
                            <td>{{ $coupon->validity }}</td>
                            <td>
                                <a href="" class="btn btn-small btn-primary">edit</a>
                                <a href="" class="btn btn-small btn-danger">Delete</a>
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


