@extends('layouts.frontend.app')
@section('content-frontend')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        <h3 class="breadcrumb-title pe-3">Category Shop</h3>
                        <div class="ms-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}"><i class="bx bx-home-alt"></i>
                                            Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('frontend.shop') }}">Shop</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Category Shop</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <!--start shop area-->
            <section class="py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-xl-12">
                            <div class="product-wrapper">
                                <div class="toolbox d-lg-flex align-items-center mb-3 gap-2 p-3 bg-white border">
                                    <div class="d-flex flex-wrap flex-grow-1 gap-1">
                                        <div class="">
                                            <select class="form-select rounded-0">
                                                <option selected="selected">Size</option>
                                                <option>Small</option>
                                                <option>Small</option>
                                                <option>Small</option>
                                                <option>Extra Large</option>
                                            </select>
                                        </div>
                                        <div class="">
                                            <select class="form-select rounded-0">
                                                <option selected="selected">Color</option>
                                                <option>Red</option>
                                                <option>Yellow</option>
                                                <option>Black</option>
                                                <option>White</option>
                                                <option>Green</option>
                                                <option>Blue</option>
                                            </select>
                                        </div>
                                        <div class="">
                                            <select class="form-select rounded-0">
                                                <option selected="selected">Price</option>
                                                <option>$5 to $49</option>
                                                <option>$49 to $99</option>
                                                <option>$99 to $149</option>
                                                <option>$149 to $300</option>
                                                <option>$300 to $500</option>
                                                <option>Above $1000</option>
                                            </select>
                                        </div>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <select class="form-select rounded-0">
                                                <option value="menu_order" selected="selected">Default sorting</option>
                                                <option value="popularity">Sort by popularity</option>
                                                <option value="rating">Sort by average rating</option>
                                                <option value="date">Sort by newness</option>
                                                <option value="price">Sort by price: low to high</option>
                                                <option value="price-desc">Sort by price: high to low</option>
                                            </select>
                                        </div>
                                        <div class="">
                                            <button type="button"
                                                class="btn btn-dark rounded-0 text-uppercase">Search</button>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <p class="mb-0 font-13 text-nowrap text-white">Show:</p>
                                            <select class="form-select ms-3 rounded-0">
                                                <option>9</option>
                                                <option>12</option>
                                                <option>16</option>
                                                <option>20</option>
                                                <option>50</option>
                                                <option>100</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div><a href="shop-grid-filter-on-top.html" class="btn btn-dark rounded-0"><i
                                                class='bx bxs-grid me-0'></i></a>
                                    </div>
                                    <div><a href="shop-list-filter-on-top.html" class="btn btn-light rounded-0"><i
                                                class='bx bx-list-ul me-0'></i></a>
                                    </div>
                                </div>
                                <div class="product-grid">
                                    <div
                                        class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-3 g-sm-4">
                                        @foreach ($category_product as $cate_product)
                                            <div class="col">
                                                <div class="card">
                                                    <div class="position-relative overflow-hidden">
                                                        <form action="{{ route('cart.insert') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $cate_product->id }}">
                                                            <input type="hidden" name="quntity" value="1">
                                                            @auth('web')
                                                                <div class="add-cart add-carts position-absolute top-0 end-0 mt-3 me-3">
                                                                    <button class="" type="submit"><i class='bx bx-cart-add'></i></button>
                                                                </div>
                                                            @else
                                                                <div class="add-cart position-absolute top-0 end-0 mt-3 me-3">
                                                                    <a href="{{ route('login') }}"><i class='bx bx-cart-add'></i></a>
                                                                </div>
                                                            @endauth
                                                        </form>
                                                        <div class="quick-view position-absolute start-0 bottom-0 end-0">
                                                            <a href="javascript:;" data-bs-toggle="modal"
                                                                data-bs-target="#QuickViewProduct">Quick View</a>
                                                        </div>
                                                        <a href="{{ route('single.Product', $cate_product->id) }}">
                                                            <img src="{{ asset('storage/backend/upload/product/thumbnailImage/' . $cate_product->thumbnailImage) }}"
                                                                class="img-fluid" alt="...">
                                                        </a>
                                                    </div>
                                                    <div class="card-body px-0">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="">
                                                                <p class="mb-1 product-short-name">
                                                                    {{ $cate_product->subcategory->subcategory }}</p>
                                                                <a href="{{ route('single.Product', $cate_product->id) }}">
                                                                    <h6 class="mb-0 fw-bold product-short-title">
                                                                    {{ substr($cate_product->productName, 0, 20) . '...' }}
                                                                    </h6>
                                                                </a>
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
                                                        <div
                                                            class="product-price d-flex align-items-center justify-content-start gap-2 mt-2">
                                                            <div
                                                                class="h6 fw-light fw-bold text-secondary text-decoration-line-through">
                                                                &#2547;{{ $cate_product->productPrice }}</div>
                                                            <div class="h6 fw-bold">&#2547;{{ $cate_product->after_discount }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!--end row-->

                                </div>
                                <hr>
                                <nav class="d-flex justify-content-between" aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="javascript:;"><i
                                                    class='bx bx-chevron-left'></i> Prev</a>
                                        </li>
                                    </ul>
                                    <ul class="pagination">
                                        <li class="page-item active d-none d-sm-block" aria-current="page"><span
                                                class="page-link">1<span class="visually-hidden">(current)</span></span>
                                        </li>
                                        <li class="page-item d-none d-sm-block"><a class="page-link"
                                                href="javascript:;">2</a>
                                        </li>
                                        <li class="page-item d-none d-sm-block"><a class="page-link"
                                                href="javascript:;">3</a>
                                        </li>
                                        <li class="page-item d-none d-sm-block"><a class="page-link"
                                                href="javascript:;">4</a>
                                        </li>
                                        <li class="page-item d-none d-sm-block"><a class="page-link"
                                                href="javascript:;">5</a>
                                        </li>
                                    </ul>
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="javascript:;"
                                                aria-label="Next">Next <i class='bx bx-chevron-right'></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section>
            <!--end shop area-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection
