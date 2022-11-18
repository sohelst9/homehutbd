@extends('layouts.frontend.app')
@section('front_title' ,'/ Order/ Confirm')
@section('content-frontend')
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
  <!--start breadcrumb-->
  <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
    <div class="container">
        <div class="page-breadcrumb d-flex align-items-center">
            <h3 class="breadcrumb-title pe-3">Order Complete</h3>
            <div class="ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}"><i class="bx bx-home-alt"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Shop</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Order Complete</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--end breadcrumb-->


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
                        font-size: 14px;
                        ">Thanks You {{ auth()->user()->username }} , Your order has been placed and will be processed as soon as possible. Make sure you make note of your order number, which is 34VB5540K83. You will be receiving an email shortly with confirmation of your order. You can now:</h4>
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


