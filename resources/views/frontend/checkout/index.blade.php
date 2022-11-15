@extends('layouts.frontend.shop.app')
@section('front_title' ,'/ Checkout')
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
            <li class="breadcrumb-item"><a>Shop</a></li>
            <li class="breadcrumb-item active">Checkout</li>
        </ol>
    </nav>
</div>
<!-- Page Header End -->


<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <form action="{{ route('order') }}" method="POST">
        @csrf
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        @php
                            $user= Auth::user();
                        @endphp
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" name="fname" type="text" value="{{ $user->fname }}">
                            @error('fname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" name="lname" type="text" value="{{ $user->lname }}">
                            @error('lname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email" type="text" value="{{ $user->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" name="number" type="text" value="{{ $user->phone }}">
                            @error('number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="form-control" id="country" name="country" selected>
                                <option value="1" selected>Bangladesh</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Division</label>
                            <select class="form-control" id="division" name="division">
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                            @error('division')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label>District</label>
                            <select class="form-control" id="district" name="district">
                            </select>
                            @error('district')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Sub District</label>
                            <select class="form-control" id="sub_district" name="sub_district">
                                <option>-Select-</option>
                            </select>
                            @error('sub_district')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" name="state" type="text">
                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" name="zip_code" type="text">
                            @error('zip_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Address Line</label>
                            <textarea name="address" class="form-control"></textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Order Notes</label>
                            <textarea name="order_note" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        @foreach ($carts as $cart)
                            <div class="d-flex justify-content-between" style="font-size: 14px;">
                                <p>{{ substr($cart->product->productName, 0, 30).'..' }}  X {{ $cart->quntity }}</p>
                                <p><span>&#2547;</span>{{ $cart->product->after_discount }}</p>
                            </div>
                        @endforeach

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <input type="hidden" name="subtotal" id="subtotal" value="{{ session('subtotal') }}">
                            <h6 class="font-weight-medium">&#2547;{{ session('subtotal') }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Discount</h6>
                            <input type="hidden" name="product_discount" value="{{ session('discount') }}">
                            <h6 class="font-weight-medium">{{ session('discount') }}%</h6>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="">
                                <h6 class="font-weight-medium">Delivery Charge</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="delevery_charge" id="inside_valu" value="60">
                                    <label class="form-check-label" for="inside_valu">Inside Dhaka <span style="margin-left:212px">&#2547; <span>60</span></span></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="delevery_charge" id="outside_valu" value="120">
                                    <label class="form-check-label" for="outside_valu">Out Side Dhaka <span style="margin-left:187px">&#2547; <span>120</span></span></label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <input type="hidden" id="total" name="total"value="{{ session('total') }}">
                            <h5 class="font-weight-bold">&#2547;<span  id="grand_total">{{ session('total') }}</span></h5>
                        </div>
                    </div>
                </div>
                @error('payment_method')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_method" id="Cash_on_delivery" value="1">
                                <label class="custom-control-label" for="Cash_on_delivery">Cash on Delivery</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_method" id="ssl_commerze" value="2">
                                <label class="custom-control-label" for="ssl_commerze">SSL Commerze</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_method" id="banktransfer" value="3">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Checkout End -->

@endsection

@section('script')

    <script>
       // ----selcet 2----
        $(document).ready(function() {
            $('#country').select2();
        });

        $(document).ready(function() {
            $('#division').select2();
        });

        $(document).ready(function() {
            $('#district').select2();
        });

        $(document).ready(function() {
            $('#sub_district').select2();
        });


        //delivery charge--
        $('#inside_valu').click(function(){
            var total = parseInt($('#total').val());
            var inside_value = parseInt($('#inside_valu').val());
            var g_total = total + inside_value;
            $('#grand_total').html(g_total);
        })

        $('#outside_valu').click(function(){
            var total = parseInt($('#total').val());
            var inside_value = parseInt($('#outside_valu').val());
            var g_total = total + inside_value;
            $('#grand_total').html(g_total);
        })

    </script>

    <!----division select district select subdistrict ajax ---->
    <script>
        $('#division').change(function(){
            var division_id = $('#division').val();
            var url = "{{ route('district') }}";

            $.ajax({
                type: "post",
                url: url,
                data: {'division_id':division_id},
                success: function (data) {
                    $('#district').html(data);
                    $('#sub_district').html('');
                }
            });
        })

        $('#district').change(function(){
            var district_id = $('#district').val();
            var url = "{{ route('sub_district') }}";

            $.ajax({
                type: "post",
                url: url,
                data: {'district_id':district_id},
                success: function (data) {
                    $('#sub_district').html(data);
                }
            });
        })
    </script>
@endsection
