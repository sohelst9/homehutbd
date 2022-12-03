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
                                                        <img src="{{ asset('images/galleryImage/' . $galleryImage->gallery) }}" class="img-fluid" alt="">
                                                    </div>
                                                    @endforeach

                                                </div>
                                                <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                    @foreach ($single_products->galleryImages as $galleryImage)
                                                        <button class="owl-thumb-item">
                                                            <img src="{{ asset('images/galleryImage/' . $galleryImage->gallery) }}" class="" alt="">
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
