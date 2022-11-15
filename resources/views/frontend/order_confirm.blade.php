@extends('layouts.frontend.shop.app')
@section('front_title' ,'/ Order/ Confirm')
@section('shop_content')
<style>
    .select2-container .select2-selection--single{
        height:35px;
    }
    .select2-container .select2-selection--single .select2-selection__rendered{
        padding-top:2px;
    }
    .form-control{
        border:1px solid #9A9FAE;
    }
    .select2-container--default .select2-selection--single{
        border-radius: 0px;
    }

</style>
  <!-- Page Header Start -->
  <div style="margin-top:20px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" style="margin-left: 47px;">Home</a></li>
            <li class="breadcrumb-item active">Order Confirmation</li>
        </ol>
    </nav>
</div>
<!-- Page Header End -->


<!-- order confirm Start -->
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header" style="background-color:burlywood">
                    <div class="icon text-center">
                        <i style="font-size:60px; color:#e2634e;" class="fas fa-envelope-open"></i>
                    </div>
                    <h4 style="font-size:25px; color:#0a0b0b; text-transform:uppercase;" class="text-center mt-3">Order Confirmation Message</h4>
                </div>
                <div class="card-body">
                   <div class="confirm-msg">
                        <h4 class="text-center" style="
                        color: #1d3479;
                        padding: 20px;
                        font-size: 18px;
                        ">Thanks You {{ auth()->user()->username }} , Your Order has Been Success !</h4>
                   </div>
                   <div class="button text-center mt-3">
                        <a href="{{ url('/') }}" class="btn btn-danger">Continue Shopping</a>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- order confirm End -->

@endsection


