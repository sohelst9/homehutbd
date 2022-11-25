
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    @php
        $header_setting = headersetting();
    @endphp
    <link rel="icon" href="{{ asset('storage/backend/upload/site_icon/' . $header_setting->site_icon) }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('frontend/new_asset/plugins/OwlCarousel/css/owl.carousel.min.css') }}" rel="stylesheet" />

     <!-- Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('frontend/new_asset/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('frontend/new_asset/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('frontend/new_asset/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/new_asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="{{ asset('frontend/new_asset/css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/new_asset/css/icons.css') }}" rel="stylesheet">
    <title>HomeHutBd  @yield('front_title')</title>
    <style>
        .add-carts button {
            color: rgb(25, 22, 22);
            font-size: 20px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #fff;
            border: 1px solid #d7d7d7;
        }
    </style>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--start top header wrapper-->
        <div class="header-wrapper">
            <div class="top-menu">
                <div class="container">
                    <nav class="navbar navbar-expand">
                        <div class="shiping-title d-none d-sm-flex">Welcome to our Shopingo store!</div>
                        <ul class="navbar-nav ms-auto d-none d-lg-flex">
                            <li class="nav-item"><a class="nav-link" href="order-tracking.html">Track Order</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="about-us.html">About</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="shop-categories.html">Our Stores</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="blog-post.html">Blog</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="javascript:;">Help & FAQs</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">USD</a>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <li><a class="dropdown-item" href="#">USD</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">EUR</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                    data-bs-toggle="dropdown">
                                    <div class="lang d-flex gap-1">
                                        <div><i class="flag-icon flag-icon-um"></i>
                                        </div>
                                        <div><span>ENG</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg-end">
                                    <a class="dropdown-item d-flex allign-items-center" href="javascript:;"> <i
                                            class="flag-icon flag-icon-de me-2"></i><span>German</span>
                                    </a> <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
                                            class="flag-icon flag-icon-fr me-2"></i><span>French</span></a>
                                    <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
                                            class="flag-icon flag-icon-um me-2"></i><span>English</span></a>
                                    <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
                                            class="flag-icon flag-icon-in me-2"></i><span>Hindi</span></a>
                                    <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
                                            class="flag-icon flag-icon-cn me-2"></i><span>Chinese</span></a>
                                    <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i
                                            class="flag-icon flag-icon-ae me-2"></i><span>Arabic</span></a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav social-link ms-lg-2 ms-auto">
                            <li class="nav-item"> <a class="nav-link" href="javascript:;"><i
                                        class='bx bxl-facebook'></i></a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="javascript:;"><i
                                        class='bx bxl-twitter'></i></a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="javascript:;"><i
                                        class='bx bxl-linkedin'></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="header-content bg-warning">
                <div class="container">
                    <div class="row align-items-center gx-4">
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-3">
                                <div class="mobile-toggle-menu d-inline d-xl-none" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasNavbar">
                                    <i class="bx bx-menu"></i>
                                </div>
                                <div class="logo">
                                    <a href="{{ route('frontend.index') }}">
                                        <img src="{{ asset('storage/backend/upload/site_logo/' . $header_setting->site_logo) }}" class="logo-icon" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl order-4 order-xl-0">
                            <div class="input-group flex-nowrap pb-3 pb-xl-0">
                                <input type="text" class="form-control w-100 border-dark border border-3"
                                    placeholder="Search for Products">
                                <button class="btn btn-dark btn-ecomm border-3" type="button">Search</button>
                            </div>
                        </div>
                        <div class="col-auto d-none d-xl-flex">
                            <div class="d-flex align-items-center gap-3">
                                <div class="fs-1 text-content"><i class='bx bx-headphone'></i></div>
                                <div class="">
                                    <p class="mb-0 text-content">CALL US NOW</p>
                                    <h5 class="mb-0">{{ $header_setting->help_number ?? '01785868569' }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto ms-auto">
                            <div class="top-cart-icons">
                                <nav class="navbar navbar-expand">
                                    <ul class="navbar-nav">
                                        @auth('web')
                                            <li class="nav-item"><a href="{{ route('user.dashboard') }}"
                                                class="nav-link cart-link"><i class='bx bx-user'></i></a>
                                            </li>
                                        @else
                                            <li class="nav-item"><a style="font-size: 24px; margin-top: 3px;" href="{{ route('login') }}" class="nav-link cart-link">Login</a>
                                            </li>
                                        @endauth
                                       
                                        <!-----cart----->
                                        @php
                                            $cart = cartCount();
                                        @endphp
                                        <li class="nav-item dropdown dropdown-large">
                                            <a href="#"
                                                class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link"
                                                data-bs-toggle="dropdown"> <span class="alert-count">{{ $cart }}</span>
                                                <i class='bx bx-shopping-bag'></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ route('cart', '') }}">
                                                    <div class="cart-header">
                                                        <p class="cart-header-title mb-0">{{ $cart }} ITEMS</p>
                                                        <p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
                                                    </div>
                                                </a>
                                                <div class="cart-list">
                                                    @php
                                                        $carts = carts();
                                                    @endphp
                                                    @foreach ($carts as $cartitem)
                                                        
                                                    <a class="dropdown-item" href="javascript:;">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">
                                                                <h6 class="cart-product-title">{{ substr($cartitem->product->productName,0,25).'..' }}</h6>
                                                                <p class="cart-product-price">{{ $cartitem->quntity }} X {{ $cartitem->product->after_discount }}</p>
                                                            </div>
                                                            <div class="position-relative">
                                                                <div class="cart-product-cancel position-absolute"><i
                                                                        class='bx bx-x'></i>
                                                                </div>
                                                                <div class="cart-product">
                                                                    <img src="{{ asset('storage/backend/upload/product/thumbnailImage/'. $cartitem->product->thumbnailImage) }}"
                                                                        class="" alt="product image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                </div>
                                                <a href="javascript:;">
                                                    <div class="text-center cart-footer d-flex align-items-center">
                                                        <h5 class="mb-0">TOTAL</h5>
                                                        <h5 class="mb-0 ms-auto">$189.00</h5>
                                                    </div>
                                                </a>
                                                <div class="d-grid p-3 border-top"> <a href="javascript:;"
                                                        class="btn btn-dark btn-ecomm">CHECKOUT</a>
                                                </div>
                                                
                                            </div>
                                        </li>

                                        <!-----logout----->
                                        <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="nav-link cart-link">
                                            <i class='bx bx-log-out'></i></a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>

                                        {{-- <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
            <div class="primary-menu">
                <nav class="navbar navbar-expand-xl w-100 navbar-dark container mb-0 p-0">
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                        <div class="offcanvas-header">
                            <div class="offcanvas-logo"><img src="{{ asset('frontend/new_asset/images/logo-icon.png') }}" width="100"
                                    alt="">
                            </div>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body primary-menu">
                            <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.index') }}">Home</a>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="tv-shows.html"
                                        data-bs-toggle="dropdown">
                                        Categories
                                    </a>
                                    <div class="dropdown-menu dropdown-large-menu">
                                        <div class="row">
                                            <div class="col-12 col-xl-4">
                                                <h6 class="large-menu-title">Fashion</h6>
                                                <ul class="list-unstyled">
                                                    <li><a href="javascript:;">Casual T-Shirts</a>
                                                    </li>
                                                    <li><a href="javascript:;">Formal Shirts</a>
                                                    </li>
                                                    <li><a href="javascript:;">Jackets</a>
                                                    </li>
                                                    <li><a href="javascript:;">Jeans</a>
                                                    </li>
                                                    <li><a href="javascript:;">Dresses</a>
                                                    </li>
                                                    <li><a href="javascript:;">Sneakers</a>
                                                    </li>
                                                    <li><a href="javascript:;">Belts</a>
                                                    </li>
                                                    <li><a href="javascript:;">Sports Shoes</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-12 col-xl-4">
                                                <h6 class="large-menu-title">Electronics</h6>
                                                <ul class="list-unstyled">
                                                    <li><a href="javascript:;">Mobiles</a>
                                                    </li>
                                                    <li><a href="javascript:;">Laptops</a>
                                                    </li>
                                                    <li><a href="javascript:;">Macbook</a>
                                                    </li>
                                                    <li><a href="javascript:;">Televisions</a>
                                                    </li>
                                                    <li><a href="javascript:;">Lighting</a>
                                                    </li>
                                                    <li><a href="javascript:;">Smart Watch</a>
                                                    </li>
                                                    <li><a href="javascript:;">Galaxy Phones</a>
                                                    </li>
                                                    <li><a href="javascript:;">PC Monitors</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- end col-3 -->
                                            <div class="col-12 col-xl-4 d-none d-xl-block">
                                                <div class="pramotion-banner1">
                                                    <img src="{{ asset('frontend/new_asset/images/gallery/menu-img.jpg') }}" class="img-fluid"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <!-- end col-3 -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </li> --}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                        data-bs-toggle="dropdown">
                                        Category <i class='bx bx-chevron-down ms-1'></i>
                                    </a>

                                    <ul class="dropdown-menu" style="width:350px;">
                                        @php
                                            $cate = categories();
                                        @endphp
                                        @foreach ($cate as $category)
                                            <li class="nav-item dropdown">
                                                <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="#" style="">{{ $category->name }} <i class='bx bx-chevron-right float-end'></i></a>
                                                <ul class="submenu dropdown-menu">
                                                    @foreach ($category->Subcategory as $subcategory)
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('subcategory.shop',$subcategory->id) }}">
                                                                {{ $subcategory->subcategory }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.shop') }}">Shop</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="">About</a>
                                </li>
                                
                                <li class="nav-item"> <a class="nav-link" href="">Our Store</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="">Blog</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="">Contact</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>


        @yield('content-frontend')

        <!--start footer section-->
        <footer>
            @php
                $conatact_info = contactInfo();
            @endphp
            <section class="py-5 border-top bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                        <div class="col">
                            <div class="footer-section1">
                                <h5 class="mb-4 text-uppercase fw-bold">Contact Info</h5>
                                <div class="address mb-3">
                                    <h6 class="mb-0 text-uppercase fw-bold">Address</h6>
                                    <p class="mb-0">{{ $conatact_info->address }}</p>
                                </div>
                                <div class="phone mb-3">
                                    <h6 class="mb-0 text-uppercase fw-bold">Phone</h6>
                                    <p class="mb-0">{{ $conatact_info->number }}</p>
                                </div>
                                <div class="email mb-3">
                                    <h6 class="mb-0 text-uppercase fw-bold">Email</h6>
                                    <p class="mb-0">{{ $conatact_info->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-section2">
                                <h5 class="mb-4 text-uppercase fw-bold">Categories</h5>
                                <ul class="list-unstyled">
                                    @php
                                        $cate = categories();
                                    @endphp
                                    @foreach ($cate as $category)
                                        <li class="mb-1"><a href="{{ route('category.shop', $category->id) }}"><i class='bx bx-chevron-right'></i>
                                                {{ $category->name }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-section3">
                                <h5 class="mb-4 text-uppercase fw-bold">Popular Tags</h5>
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
                        </div>
                        <div class="col">
                            <div class="footer-section4">
                                @php
                                    $stay_informed = stayInformed();
                                @endphp
                                <h5 class="mb-4 text-uppercase fw-bold">Stay informed</h5>
                                <div class="subscribe">
                                    <input type="text" class="form-control" placeholder="Enter Your Email" />
                                    <div class="mt-3 d-grid">
                                        <a href="javascript:;" class="btn btn-dark btn-ecomm">Subscribe</a>
                                    </div>
                                    <p class="mt-3 mb-0">{{ $stay_informed->description }}</p>
                                </div>
                                <div class="download-app mt-3">
                                    <h6 class="mb-3 text-uppercase fw-bold">Download our app</h6>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="javascript:;">
                                            <img src="{{ asset('frontend/new_asset/images/icons/apple-store.png') }}" class=""
                                                width="140" alt="" />
                                        </a>
                                        <a href="javascript:;">
                                            <img src="{{ asset('frontend/new_asset/images/icons/play-store.png') }}" class=""
                                                width="140" alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section>

            <section class="footer-strip text-center py-3 border-top positon-absolute bottom-0">
                <div class="container">
                    <div class="d-flex flex-column flex-lg-row align-items-center gap-3 justify-content-between">
                        @php
                            $copyright = copyright();
                        @endphp
                        <p class="mb-0">{{ $copyright->copyright }}</p>
                        <div class="payment-icon">
                            <div class="row row-cols-auto g-2 justify-content-end">
                                <div class="col">
                                    <img src="{{ asset('frontend/new_asset/images/icons/visa.png') }}" alt="" />
                                </div>
                                <div class="col">
                                    <img src="{{ asset('frontend/new_asset/images/icons/paypal.png') }}" alt="" />
                                </div>
                                <div class="col">
                                    <img src="{{ asset('frontend/new_asset/images/icons/mastercard.png') }}" alt="" />
                                </div>
                                <div class="col">
                                    <img src="{{ asset('frontend/new_asset/images/icons/american-express.png') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
        <!--end footer section-->


        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/new_asset/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('frontend/new_asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/new_asset/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/new_asset/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('frontend/new_asset/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('frontend/new_asset/js/app.js') }}"></script>
    <script src="{{ asset('frontend/new_asset/js/index.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- Sweetalert 2 -->
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>

    @endif
</body>

</html>
