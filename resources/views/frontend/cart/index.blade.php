@extends('layouts.frontend.app')
@section('front_title', '/product/cart')
@section('content-frontend')
<style>
    .quntity_input1{
        padding: 0;
    }
</style>
    <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">Shop Cart</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="{{ route('frontend.index') }}"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start shop cart-->
				<section class="py-4">
					<div class="container">
						<div class="shop-cart">
							<div class="row">
								<div class="col-12 col-xl-8">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <div class="shop-cart-list mb-3 p-3">
                                            @php
                                                $subtotal = 0;
                                            @endphp
                                            @forelse ($user_carts as $user_cart)
                                                <div class="row align-items-center g-3 product_data">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="d-lg-flex align-items-center gap-3">
                                                            <div class="cart-img text-center text-lg-start">
                                                                <a href="{{ route('single.Product',$user_cart->product_id) }}"><img src="{{ asset('images/thumbnailImage/'. $user_cart->product->thumbnailImage) }}" width="130" alt=""></a>
                                                            </div>
                                                            <div class="cart-detail text-center text-lg-start">
                                                                <h6 class="mb-2"><a href="{{ route('single.Product',$user_cart->product_id) }}">{{ $user_cart->product->productName }}</a></h6>
                                                                <p class="mb-0">Size: <span>{{ $user_cart->sizes->name ?? 'NA' }}</span>
                                                                </p>
                                                                <p class="mb-2">Color: <span>{{ $user_cart->colors->name ?? 'NA' }}</span>
                                                                </p>

                                                                <p style="display: none;">{{ $user_cart->quntity }}</p>
                                                                <p class="price" style="display: none;">{{ $user_cart->product->after_discount }}</p>
                                                                @php
                                                                    $total_q_price = $user_cart->quntity*$user_cart->product->after_discount;
                                                                @endphp
                                                                <h5 class="mb-0">&#2547; <span class="total_price">{{ $total_q_price }}</span></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3">
                                                        <div class="cart-action text-center ">
                                                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-sm btn-dark btn-minus" >
                                                                    <i class="fa fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                                <input type="text" class="form-control form-control-sm bg-light text-center quntity_input1" name="quantity[{{ $user_cart->id }}]" readonly value="{{ $user_cart->quntity }}">
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-sm btn-dark btn-plus">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-3">
                                                        <div class="text-center">
                                                            <div class="d-flex gap-3 justify-content-center justify-content-lg-end">
                                                                <a href="{{ route('cart.destroy',$user_cart->id) }}" class="btn btn-outline-dark rounded-0 btn-ecomm"><i class='bx bx-x'></i>Remove</a>
                                                                <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-heart me-0'></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                @php
                                                    $subtotal = $subtotal + $total_q_price;
                                                @endphp
                                            @empty
                                                
                                            @endforelse
                                            
                                            
                                            <div class="d-lg-flex align-items-center gap-2">
                                                <a href="{{ route('frontend.index') }}" class="btn btn-dark btn-ecomm"><i class='bx bx-shopping-bag'></i> Continue Shoping</a>
                                                {{-- <a href="javascript:;" class="btn btn-light btn-ecomm ms-auto"><i class='bx bx-x-circle'></i> Clear Cart</a> --}}
                                                <button type="submit" class="btn btn-white btn-ecomm ms-auto"><i class='bx bx-refresh'></i> Update Cart</button>
                                            </div>
                                        </div>
                                    </form>
								</div>
								<div class="col-12 col-xl-4">
									<div class="checkout-form p-3 bg-light">
                                        @if(session('msg'))
                                            <div class="alert alert-danger">{{ session('msg') }}</div>
                                        @endif
										<div class="card rounded-0 border bg-transparent shadow-none">
											<div class="card-body">
												<p class="fs-5">Apply Discount Code</p>
												<form action="">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control rounded-0" placeholder="Enter discount code" id="coupon_code" value="{{ $coupon_code }}">
                                                        <button class="btn btn-dark btn-ecomm" type="button" id="coupon_btn">Apply</button>
                                                    </div>
                                                </form>
											</div>
										</div>
										<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
											<div class="card-body">
												<p class="mb-2">Subtotal: <span class="float-end">&#2547; {{ $subtotal }}</span>
												</p>
												
												<p class="mb-0">Discount: <span class="float-end">{{ $discount }} %</span>
												</p>
												<div class="my-3 border-top"></div>

                                                <!---grand total ---->
                                                @php
                                                    $grand_total = $subtotal-$subtotal*$discount/100;
                                                    session([
                                                        'discount'=>$discount,
                                                        'subtotal'=>$subtotal,
                                                        'total'=>$subtotal-$subtotal*$discount/100,
                                                    ]);
                                                @endphp

												<h5 class="mb-0">Order Total: <span class="float-end">&#2547; {{ $grand_total }}</span></h5>
												<div class="my-4"></div>
												<div class="d-grid"> <a href="{{ route('checkout') }}" class="btn btn-dark btn-ecomm">Proceed to Checkout</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end row-->
						</div>
					</div>
				</section>
				<!--end shop cart-->
			</div>
		</div>
		<!--end page wrapper -->

@endsection

@section('script')
    <script>
        // cart quntity increment---
        $('.btn-plus').click(function(e){
            e.preventDefault();
            var quntity = $(this).closest('.product_data').find('.quntity_input1').val();
            var value = parseInt(quntity, 10);
            value = isNaN(value) ? 0 : value;
            if(value){
                value++;
                $(this).closest('.product_data').find('.quntity_input1').val(value);
            }
        });
        // cart quntity decriment---
        $('.btn-minus').click(function(e){
            e.preventDefault();
            var quntity = $(this).closest('.product_data').find('.quntity_input1').val();
            var value = parseInt(quntity, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1){
                value--;
                $(this).closest('.product_data').find('.quntity_input1').val(value);
            }
        });
    </script>
    <script>
        // cart quntity increment after total price---
        $(function(){
            $('.btn-plus').click(function(){
                var quantity_input = $(this).closest('.product_data').find('.quntity_input1').val();
                var price = $(this).closest('.product_data').find('.price').text();
                $(this).closest('.product_data').find('.total_price').text(quantity_input*price);
            });
        });

        // cart quntity decriment after total price---
        $(function(){
            $('.btn-minus').click(function(){
                var quantity_input = $(this).closest('.product_data').find('.quntity_input1').val();
                var price = $(this).closest('.product_data').find('.price').text();
                $(this).closest('.product_data').find('.total_price').text(quantity_input*price);
            });
        });

        //coupon
        $('#coupon_btn').click(function(){
            var coupon_code = $('#coupon_code').val();
            var currentlink = "{{ url('/user/cart') }}";
            var createlink = currentlink+'/'+coupon_code;
            window.location.href=createlink;
        });
    </script>
@endsection

