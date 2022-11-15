@extends('layouts.frontend.shop.app')
@section('front_title', '/products')
@section('css')
    <style>
        .btn-plus-desable{
            pointer-events: none;
        }
    </style>
@endsection
@section('shop_content')
    <!-- Page Header Start -->
    <div style="margin-top:20px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" style="margin-left: 47px;">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('subcategory.shop',$subcate_id->subcategory->id) }}">{{  $subcate_id->subcategory->subcategory }}</a></li>
                <li class="breadcrumb-item active">{{ $single_products->productName }}</li>
            </ol>
        </nav>
    </div>
    <!-- Page Header End -->
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img style="height:500px;" class="w-100" src="{{ asset('storage/backend/upload/product/thumbnailImage/' . $single_products->thumbnailImage) }}" alt="Image">
                        </div>
                        @foreach ($single_products->galleryImages as $galleryImage)
                        <div class="carousel-item">
                            <img style="height:500px;" class="w-100" src="{{ asset('storage/backend/upload/product/galleryImage/' . $galleryImage->gallery) }}" alt="Image">
                        </div>
                        @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
                <div class="col-lg-7 pb-5">
                    <form action="{{ route('cart.insert') }}" method="POST">
                        @csrf
                    <h3 class="font-weight-semi-bold single_productName">{{ $single_products->productName }}</h3>
                    <input type="hidden" name="product_id" value="{{ $single_products->id }}">
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(2 Reviews)</small>
                    </div>

                    <div class="d-flex">
                         <h6 style="font-size: 20px; color:rgb(221, 69, 27);" >&#2547; <span class="discount_price">{{ $single_products->after_discount }}</span></h6>
                        <h6 class="text-muted ml-2" style="font-size: 14px; margin-top:4px;">
                            <del>&#2547; {{ $single_products->productPrice }}</del></h6>
                    </div>
                    <p class="mb-4">{{ $single_products->meta_descp }}</p>
                    <!---color -->
                    <div class="d-flex mb-4" style="width: 206px;">
                        <p class="text-dark font-weight-medium mt-2 mr-3">Colors:</p>
                        <select name="color" id="color" class="form-control">
                            <option value="">-Select-</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->color_id }}">{{ $color->colors->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--size--->
                    <div class="d-flex mb-4" style="width: 206px;">
                        <p class="text-dark font-weight-medium mt-2 mr-3">Sizes:</p>
                        <select name="size" id="size" class="form-control">
                            <option value="">-Select-</option>
                        </select>
                    </div>

                    <div class="d-flex mb-4">
                        <span class="text-dark font-weight-medium  mr-3">Stocks : </span>
                        <span id="stocks_quantity"></span>
                    </div>

                    <div class="total_price" style="font-size:20px; color:rgb(221, 69, 27); margin-bottom:5px; font-weight:600;">
                        Total : &#2547; <span class="total_product_price" >{{ $single_products->after_discount }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <a class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </a>
                            </div>
                            <input type="text" class="form-control bg-secondary text-center quntity_input" readonly name="quntity" value="1">
                            <div class="input-group-btn">
                                <a class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>

                        </div>
                        @auth
                            <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</a>
                        @endauth

                    </div>
                    <div class="d-flex pt-2">
                        <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                    </form>
                </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt
                            duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur
                            invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet
                            rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam
                            consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam,
                            ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr
                            sanctus eirmod takimata dolor ea invidunt.</p>
                        <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor
                            consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita
                            diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed
                            et diam takimata sed justo. Magna takimata justo et amet magna et.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt
                            duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur
                            invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet
                            rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam
                            consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam,
                            ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr
                            sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                        style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no
                                            at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">From The Same Store</span></h2>
        </div>
        <div class="row px-xl-5">
            <h3>Not Working</h3>
        </div>
    </div>
    <!-- Products End -->
@endsection

@section('script')
<script>
    // ajax  select color then  size show---
    $('#color').change(function(){
        var color_id = $('#color').val();
        var product_id = "{{ $single_products->id }}";
        var url = "{{ route('get.size') }}";
        $.ajax({
            type: "POST",
            url: url,
            data: {'color_id':color_id, 'product_id':product_id},
            success: function (data) {
                if(data.includes('>NA<') == true){
                    //data replace
                    $('#size').html(data.replace('<option value="">-Select-</option>', ''));
                    // get size id
                    var mainstr = data.replace('<option value="">-Select-</option>', '');
                     var size_id = mainstr.split('"')[1];
                    $.ajax({
                        type: "POST",
                        url: "/get-quantity",
                        data: {'color_id':color_id, 'size_id':size_id, 'product_id':product_id},
                        success: function (data) {
                            $('#stocks_quantity').html(data);
                        }
                    });
                }
                else{
                    $('#size').html(data);
                    $('#stocks_quantity').html('');
                }
            }
        });
    });

    // ajax  select color and  size show quantity ---
    $('#size').change(function(){
        var color_id = $('#color').val();
        var size_id = $(this).val();
        var product_id = "{{ $single_products->id }}";
        var url = "{{ route('get.quantity') }}";
        $.ajax({
            type: "POST",
            url: url,
            data: {'color_id':color_id, 'size_id':size_id, 'product_id':product_id},
            success: function (data) {
                $('#stocks_quantity').html(data);
            }
        });
    });

    // cart quntity---
    $('.btn-plus').click(function(e){
        e.preventDefault();
        var quntity = $('.quntity_input').val();
        var value = parseInt(quntity, 10);
        value = isNaN(value) ? 0 : value;
        if(value <10){
            value++;
            $('.quntity_input').val(value);
        }
    });

    $('.btn-minus').click(function(e){
        e.preventDefault();
        var quntity = $('.quntity_input').val();
        var value = parseInt(quntity, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $('.quntity_input').val(value);
        }
    });
</script>

<script>
    // cart quantity*product price
    $('.btn-plus').click(function(){
        var quntity = $('.quntity_input').val();
        var product_price = $('.discount_price').html();
        var total_quntity_price = quntity*product_price;
        $('.total_product_price').html(total_quntity_price);
    });

    $('.btn-minus').click(function(){
        var quntity = $('.quntity_input').val();
        var product_price = $('.discount_price').html();
        var total_quntity_price = quntity*product_price;
        $('.total_product_price').html(total_quntity_price);
    });

    // cart quantity and stock balance--
    $('.btn-plus').click(function(){
        var stocks_quantity = $('#stocks_quantity').html();
        var total_stocks_quantity =parseInt(stocks_quantity);
        var quantity = $('.quntity_input').val();
        if(total_stocks_quantity <= quantity){
            $('.btn-plus').addClass('btn-plus-desable');
        }
    });

    $('.btn-minus').click(function(e){
        var stocks_quantity = $('#stocks_quantity').html();
        var total_stocks_quantity =parseInt(stocks_quantity);
        var quantity = $('.quntity_input').val();
        if(total_stocks_quantity >= quantity){
            $('.btn-plus').removeClass('btn-plus-desable');
        }
    });
</script>
@endsection
