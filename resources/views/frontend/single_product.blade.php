@extends('layouts.frontend.app')
@section('content-frontend')
<style>
    .quntity_input{
        padding: 0;
    }
    .btn-plus-desable{
            pointer-events: none;
        }
</style>
    {{-- <!-- Page Header Start -->
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
    <!-- Products End --> --}}

    <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h4 style="font-size: 18px;" class="breadcrumb-title pe-3">{{ $single_products->productName }}</h4>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="{{ route('frontend.index') }}"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="{{ route('subcategory.shop',$subcate_id->subcategory->id) }}">{{  $subcate_id->subcategory->subcategory }}</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Product Details</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start product detail-->
				<section class="py-4">
					<div class="container">
						<div class="product-detail-card">
							<div class="product-detail-body">
                                <form action="{{ route('cart.insert') }}" method="POST">
                                    @csrf
                                
                                    <input type="hidden" name="product_id" value="{{ $single_products->id }}">
                                    <div class="row g-0">
                                        <div class="col-12 col-lg-5">
                                            <div class="image-zoom-section">
                                                <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">

                                                    @foreach ($single_products->galleryImages as $galleryImage)
                                                    <div class="item">
                                                        <img src="{{ asset('storage/backend/upload/product/galleryImage/' . $galleryImage->gallery) }}" class="img-fluid" alt="">
                                                    </div>
                                                    @endforeach

                                                </div>
                                                <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                    @foreach ($single_products->galleryImages as $galleryImage)
                                                        <button class="owl-thumb-item">
                                                            <img src="{{ asset('storage/backend/upload/product/galleryImage/' . $galleryImage->gallery) }}" class="" alt="">
                                                        </button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-7">
                                            <div class="product-info-section p-3">
                                                <h3 class="mt-3 mt-lg-0 mb-0">{{ $single_products->productName }}</h3>
                                                <div class="product-rating d-flex align-items-center mt-2">
                                                    <div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-warning"></i>
                                                        <i class="bx bxs-star text-light-4"></i>
                                                    </div>
                                                    <div class="ms-1">
                                                        <p class="mb-0">(24 Ratings)</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3 gap-2">
                                                    <h5 class="mb-0 text-decoration-line-through text-light-3">&#2547; {{ $single_products->productPrice }}</h5>
                                                    <h4 class="mb-0">&#2547; {{ $single_products->after_discount }}</h4>
                                                </div>
                                                <div class="mt-3">
                                                    <h6>Discription :</h6>
                                                    <p class="mb-0">Virgil Abloh’s Off-White is a streetwear-inspired collection that continues to break away from the conventions of mainstream fashion. Made in Italy, these black and brown Odsy-1000 low-top sneakers.</p>
                                                </div>
                                                <dl class="row mt-3">	<dt class="col-sm-3">Product id</dt>
                                                    <dd class="col-sm-9">{{ $single_products->barcode }}</dd>
                                                </dl>
                                                <div class="row row-cols-auto align-items-center mt-3">
                                                    
                                                    <div class="col">
                                                        <label class="form-label">Color</label>
                                                        <select name="color" id="color" class="form-control">
                                                            <option value="">-Select-</option>
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color->color_id }}">{{ $color->colors->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Size</label>
                                                        <select name="size" id="size" class="form-control">
                                                            <option value="">-Select-</option>
                                                        </select>
                                                    </div>

                                                    <div class="col mt-4">
                                                        <span class="text-dark font-weight-medium  mr-3">Stocks : </span>
                                                        <span id="stocks_quantity">0</span>
                                                    </div>
                                            
                                                </div>
                                                <!--end row-->

                                                <div class="input-group quantity mr-3 mt-3" style="width: 130px;">
                                                    <div class="input-group-btn">
                                                        <a class="btn btn-dark btn-minus">
                                                            <i class="fa fa-minus"></i>
                                                        </a>
                                                    </div>
                                                    <input type="text" class="form-control  bg-light text-center quntity_input" readonly name="quntity" value="1">
                                                    <div class="input-group-btn">
                                                        <a class="btn btn-dark btn-plus">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                        
                                                </div>
                                                

                                                <div class="d-flex gap-2 mt-3">
                                                    @auth('web')
                                                        <button type="submit" class="btn btn-dark btn-ecomm"><i class="bx bxs-cart-add"></i>Add to Cart</button> 
                                                    @else
                                                        <a href="{{ route('login') }}" class="btn btn-dark btn-ecomm"><i class="bx bxs-cart-add"></i>Add to Cart</a> 
                                                    @endauth

                                                    <a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
                                                </div>
                                                <hr/>
                                                <div class="product-sharing">
                                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                                        <div class="">
                                                        <button type="button" class="btn-social bg-twitter"><i class='bx bxl-twitter'></i></button>
                                                        </div>
                                                        <div class="">
                                                        <button type="button" class="btn-social bg-facebook"><i class='bx bxl-facebook'></i></button>
                                                        </div>
                                                        <div class="">
                                                        <button type="button" class="btn-social bg-linkedin"><i class='bx bxl-linkedin'></i></button>
                                                        </div>
                                                        <div class="">
                                                        <button type="button" class="btn-social bg-youtube"><i class='bx bxl-youtube'></i></button>
                                                        </div>
                                                        <div class="">
                                                        <button type="button" class="btn-social bg-pinterest"><i class='bx bxl-pinterest'></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
								<!--end row-->
							</div>
						</div>
					</div>
				</section>
				<!--end product detail-->
				<!--start product more info-->
				<section class="py-4">
					<div class="container">
						<div class="product-more-info">
							<ul class="nav nav-tabs mb-0" role="tablist">
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#discription">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">Description</div>
										</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#more-info">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">More Info</div>
										</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#tags">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">Tags</div>
										</div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active" data-bs-toggle="tab" href="#reviews">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">(3) Reviews</div>
										</div>
									</a>
								</li>
							</ul>
							<div class="tab-content pt-3">
								<div class="tab-pane fade" id="discription">
									<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi.</p>
									<ul>
										<li>Not just for commute</li>
										<li>Branded tongue and cuff</li>
										<li>Super fast and amazing</li>
										<li>Lorem sed do eiusmod tempor</li>
									</ul>
									<p class="mb-1">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.</p>
									<p class="mb-1">Seitan aliquip quis cardigan american apparel, butcher voluptate nisi.</p>
								</div>
								<div class="tab-pane fade" id="more-info">
									<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
								</div>
								<div class="tab-pane fade" id="tags">
									<div class="tags-box d-flex flex-wrap gap-2">
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Cloths</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Electronis</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Furniture</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Sports</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Men Wear</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Women Wear</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Laptops</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Formal Shirts</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Topwear</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Headphones</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Bottom Wear</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Bags</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Sofa</a>
										<a href="javascript:;" class="btn btn-ecomm btn-outline-dark">Shoes</a>
									</div>
								</div>
								<div class="tab-pane fade show active" id="reviews">
									<div class="row">
										<div class="col col-lg-8">
											<div class="product-review">
												<h5 class="mb-4">3 Reviews For The Product</h5>
												<div class="review-list">
													<div class="d-flex align-items-start">
														<div class="review-user">
															<img src="assets/images/avatars/avatar-1.png" width="65" height="65" class="rounded-circle" alt="" />
														</div>
														<div class="review-content ms-3">
															<div class="rates cursor-pointer fs-6">
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
															</div>
															<div class="d-flex align-items-center mb-2">
																<h6 class="mb-0">James Caviness</h6>
																<p class="mb-0 ms-auto">February 16, 2021</p>
															</div>
															<p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
														</div>
													</div>
													<hr/>
													<div class="d-flex align-items-start">
														<div class="review-user">
															<img src="assets/images/avatars/avatar-2.png" width="65" height="65" class="rounded-circle" alt="" />
														</div>
														<div class="review-content ms-3">
															<div class="rates cursor-pointer fs-6">
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
															</div>
															<div class="d-flex align-items-center mb-2">
																<h6 class="mb-0">David Buckley</h6>
																<p class="mb-0 ms-auto">February 22, 2021</p>
															</div>
															<p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
														</div>
													</div>
													<hr/>
													<div class="d-flex align-items-start">
														<div class="review-user">
															<img src="assets/images/avatars/avatar-3.png" width="65" height="65" class="rounded-circle" alt="" />
														</div>
														<div class="review-content ms-3">
															<div class="rates cursor-pointer fs-6">
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
																<i class="bx bxs-star text-warning"></i>
															</div>
															<div class="d-flex align-items-center mb-2">
																<h6 class="mb-0">Peter Costanzo</h6>
																<p class="mb-0 ms-auto">February 26, 2021</p>
															</div>
															<p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col col-lg-4">
											<div class="add-review border">
												<div class="form-body p-3">
													<h4 class="mb-4">Write a Review</h4>
													<div class="mb-3">
														<label class="form-label">Your Name</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="mb-3">
														<label class="form-label">Your Email</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="mb-3">
														<label class="form-label">Rating</label>
														<select class="form-select rounded-0">
															<option selected>Choose Rating</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="3">4</option>
															<option value="3">5</option>
														</select>
													</div>
													<div class="mb-3">
														<label class="form-label">Example textarea</label>
														<textarea class="form-control rounded-0" rows="3"></textarea>
													</div>
													<div class="d-grid">
														<button type="button" class="btn btn-dark btn-ecomm">Submit a Review</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--end row-->
								</div>
							</div>
						</div>
					</div>
				</section>
				<!--end product more info-->
				<!--start similar products-->
				<section class="py-4">
					<div class="container">
						<div class="separator pb-4">
							<div class="line"></div>
							<h5 class="mb-0 fw-bold separator-title">Similar Products</h5>
							<div class="line"></div>
						 </div>
						 <div class="product-grid">
							<div class="similar-products owl-carousel owl-theme position-relative">
								 <div class="item">
									<div class="card">
										<div class="position-relative overflow-hidden">
											<div class="add-cart position-absolute top-0 end-0 mt-3 me-3">
												<a href="javascript:;"><i class='bx bx-cart-add' ></i></a>
											  </div>
										  <div class="quick-view position-absolute start-0 bottom-0 end-0">
											<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewProduct">Quick View</a>
										  </div>
										  <a href="javascript:;">
											<img src="assets/images/similar-products/01.png" class="img-fluid" alt="...">
										  </a>
										</div>
										<div class="card-body px-0">
										  <div class="d-flex align-items-center justify-content-between">
											  <div class="">
												  <p class="mb-1 product-short-name">Topwear</p>
												  <h6 class="mb-0 fw-bold product-short-title">White Polo Shirt</h6>
											  </div>
											  <div class="icon-wishlist">
												  <a href="javascript:;"><i class="bx bx-heart"></i></a>
											  </div>
										  </div>
										  <div class="cursor-pointer rating mt-2">
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
										  </div>
										  <div class="product-price d-flex align-items-center justify-content-start gap-2 mt-2">
											<div class="h6 fw-light fw-bold text-secondary text-decoration-line-through">$59.00</div>
											<div class="h6 fw-bold">$48.00</div>
										  </div>
										</div>
									  </div>
								   </div>
								   <div class="item">
									<div class="card">
										<div class="position-relative overflow-hidden">
											<div class="add-cart position-absolute top-0 end-0 mt-3 me-3">
												<a href="javascript:;"><i class='bx bx-cart-add' ></i></a>
											  </div>
										  <div class="quick-view position-absolute start-0 bottom-0 end-0">
											<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewProduct">Quick View</a>
										  </div>
										  <a href="javascript:;">
											<img src="assets/images/similar-products/02.png" class="img-fluid" alt="...">
										  </a>
										</div>
										<div class="card-body px-0">
										  <div class="d-flex align-items-center justify-content-between">
											  <div class="">
												  <p class="mb-1 product-short-name">Topwear</p>
												  <h6 class="mb-0 fw-bold product-short-title">White Polo Shirt</h6>
											  </div>
											  <div class="icon-wishlist">
												  <a href="javascript:;"><i class="bx bx-heart"></i></a>
											  </div>
										  </div>
										  <div class="cursor-pointer rating mt-2">
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
										  </div>
										  <div class="product-price d-flex align-items-center justify-content-start gap-2 mt-2">
											<div class="h6 fw-light fw-bold text-secondary text-decoration-line-through">$59.00</div>
											<div class="h6 fw-bold">$48.00</div>
										  </div>
										</div>
									  </div>
								   </div>
								   <div class="item">
									<div class="card">
										<div class="position-relative overflow-hidden">
											<div class="add-cart position-absolute top-0 end-0 mt-3 me-3">
												<a href="javascript:;"><i class='bx bx-cart-add' ></i></a>
											  </div>
										  <div class="quick-view position-absolute start-0 bottom-0 end-0">
											<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewProduct">Quick View</a>
										  </div>
										  <a href="javascript:;">
											<img src="assets/images/similar-products/03.png" class="img-fluid" alt="...">
										  </a>
										</div>
										<div class="card-body px-0">
										  <div class="d-flex align-items-center justify-content-between">
											  <div class="">
												  <p class="mb-1 product-short-name">Topwear</p>
												  <h6 class="mb-0 fw-bold product-short-title">White Polo Shirt</h6>
											  </div>
											  <div class="icon-wishlist">
												  <a href="javascript:;"><i class="bx bx-heart"></i></a>
											  </div>
										  </div>
										  <div class="cursor-pointer rating mt-2">
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
										  </div>
										  <div class="product-price d-flex align-items-center justify-content-start gap-2 mt-2">
											<div class="h6 fw-light fw-bold text-secondary text-decoration-line-through">$59.00</div>
											<div class="h6 fw-bold">$48.00</div>
										  </div>
										</div>
									  </div>
								   </div>
								   <div class="item">
									<div class="card">
										<div class="position-relative overflow-hidden">
											<div class="add-cart position-absolute top-0 end-0 mt-3 me-3">
												<a href="javascript:;"><i class='bx bx-cart-add' ></i></a>
											  </div>
										  <div class="quick-view position-absolute start-0 bottom-0 end-0">
											<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewProduct">Quick View</a>
										  </div>
										  <a href="javascript:;">
											<img src="assets/images/similar-products/04.png" class="img-fluid" alt="...">
										  </a>
										</div>
										<div class="card-body px-0">
										  <div class="d-flex align-items-center justify-content-between">
											  <div class="">
												  <p class="mb-1 product-short-name">Topwear</p>
												  <h6 class="mb-0 fw-bold product-short-title">White Polo Shirt</h6>
											  </div>
											  <div class="icon-wishlist">
												  <a href="javascript:;"><i class="bx bx-heart"></i></a>
											  </div>
										  </div>
										  <div class="cursor-pointer rating mt-2">
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
										  </div>
										  <div class="product-price d-flex align-items-center justify-content-start gap-2 mt-2">
											<div class="h6 fw-light fw-bold text-secondary text-decoration-line-through">$59.00</div>
											<div class="h6 fw-bold">$48.00</div>
										  </div>
										</div>
									  </div>
								   </div>
								   <div class="item">
									<div class="card">
										<div class="position-relative overflow-hidden">
											<div class="add-cart position-absolute top-0 end-0 mt-3 me-3">
												<a href="javascript:;"><i class='bx bx-cart-add' ></i></a>
											  </div>
										  <div class="quick-view position-absolute start-0 bottom-0 end-0">
											<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewProduct">Quick View</a>
										  </div>
										  <a href="javascript:;">
											<img src="assets/images/similar-products/05.png" class="img-fluid" alt="...">
										  </a>
										</div>
										<div class="card-body px-0">
										  <div class="d-flex align-items-center justify-content-between">
											  <div class="">
												  <p class="mb-1 product-short-name">Topwear</p>
												  <h6 class="mb-0 fw-bold product-short-title">White Polo Shirt</h6>
											  </div>
											  <div class="icon-wishlist">
												  <a href="javascript:;"><i class="bx bx-heart"></i></a>
											  </div>
										  </div>
										  <div class="cursor-pointer rating mt-2">
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
										  </div>
										  <div class="product-price d-flex align-items-center justify-content-start gap-2 mt-2">
											<div class="h6 fw-light fw-bold text-secondary text-decoration-line-through">$59.00</div>
											<div class="h6 fw-bold">$48.00</div>
										  </div>
										</div>
									  </div>
								   </div>
								   <div class="item">
									<div class="card">
										<div class="position-relative overflow-hidden">
											<div class="add-cart position-absolute top-0 end-0 mt-3 me-3">
												<a href="javascript:;"><i class='bx bx-cart-add' ></i></a>
											  </div>
										  <div class="quick-view position-absolute start-0 bottom-0 end-0">
											<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewProduct">Quick View</a>
										  </div>
										  <a href="javascript:;">
											<img src="assets/images/similar-products/06.png" class="img-fluid" alt="...">
										  </a>
										</div>
										<div class="card-body px-0">
										  <div class="d-flex align-items-center justify-content-between">
											  <div class="">
												  <p class="mb-1 product-short-name">Topwear</p>
												  <h6 class="mb-0 fw-bold product-short-title">White Polo Shirt</h6>
											  </div>
											  <div class="icon-wishlist">
												  <a href="javascript:;"><i class="bx bx-heart"></i></a>
											  </div>
										  </div>
										  <div class="cursor-pointer rating mt-2">
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
										  </div>
										  <div class="product-price d-flex align-items-center justify-content-start gap-2 mt-2">
											<div class="h6 fw-light fw-bold text-secondary text-decoration-line-through">$59.00</div>
											<div class="h6 fw-bold">$48.00</div>
										  </div>
										</div>
									  </div>
								   </div>
								   <div class="item">
									<div class="card">
										<div class="position-relative overflow-hidden">
											<div class="add-cart position-absolute top-0 end-0 mt-3 me-3">
												<a href="javascript:;"><i class='bx bx-cart-add' ></i></a>
											  </div>
										  <div class="quick-view position-absolute start-0 bottom-0 end-0">
											<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewProduct">Quick View</a>
										  </div>
										  <a href="javascript:;">
											<img src="assets/images/similar-products/07.png" class="img-fluid" alt="...">
										  </a>
										</div>
										<div class="card-body px-0">
										  <div class="d-flex align-items-center justify-content-between">
											  <div class="">
												  <p class="mb-1 product-short-name">Topwear</p>
												  <h6 class="mb-0 fw-bold product-short-title">White Polo Shirt</h6>
											  </div>
											  <div class="icon-wishlist">
												  <a href="javascript:;"><i class="bx bx-heart"></i></a>
											  </div>
										  </div>
										  <div class="cursor-pointer rating mt-2">
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
											  <i class="bx bxs-star text-warning"></i>
										  </div>
										  <div class="product-price d-flex align-items-center justify-content-start gap-2 mt-2">
											<div class="h6 fw-light fw-bold text-secondary text-decoration-line-through">$59.00</div>
											<div class="h6 fw-bold">$48.00</div>
										  </div>
										</div>
									  </div>
								   </div>
							</div>
						</div>
					</div>
				</section>
				<!--end similar products-->
			</div>
		</div>
		<!--end page wrapper -->

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
    // $('.btn-plus').click(function(){
    //     var quntity = $('.quntity_input').val();
    //     var product_price = $('.discount_price').html();
    //     var total_quntity_price = quntity*product_price;
    //     $('.total_product_price').html(total_quntity_price);
    // });

    // $('.btn-minus').click(function(){
    //     var quntity = $('.quntity_input').val();
    //     var product_price = $('.discount_price').html();
    //     var total_quntity_price = quntity*product_price;
    //     $('.total_product_price').html(total_quntity_price);
    // });

    // // cart quantity and stock balance--
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
