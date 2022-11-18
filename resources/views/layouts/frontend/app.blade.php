{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HomeHutBd E-commerce</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/Maincustom.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                    @auth()
                    @else
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="{{ route('login') }}">Login</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="{{ route('register') }}">Register</a>

                    @endauth
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
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
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{ url('/') }}" class="text-decoration-none">
                    <h1 style="font-size:25px; color:rgb(221, 69, 27);" class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>HomeHutBD</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{ route('cart', '') }}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                @php
                    $cart = cartCount();
                @endphp
                <span class="badge">{{ $cart }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height:410px; background-color: #d8d8d8;">
                        @php
                        $cate = categories();
                    @endphp
                        @foreach ($cate as $category)
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link cat_menu" data-toggle="dropdown">{{ $category->name }} <i class="fa fa-angle-down float-right mt-1"></i></a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                        @foreach ($category->Subcategory as $subcategory)
                                        <a href="{{ route('subcategory.shop',$subcategory->id) }}" class="dropdown-item sub_cate_menu">{{ $subcategory->subcategory }}</a>
                                        @endforeach
                                    </div>
                            </div>
                        @endforeach

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="#" class="nav-item nav-link active">Home</a>
                            <a href="#" class="nav-item nav-link">Shop</a>
                            <a href="#" class="nav-item nav-link">About Us</a>
                            <a href="#" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            @auth('web')
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::guard('web')->user()->username }}</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="" class="dropdown-item">Manage My Account</a>
                                    <a href="" class="dropdown-item">My Order</a>
                                    <a href="" class="dropdown-item"></a>
                                    <a href="" class="dropdown-item">Checkout</a>
                                    <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <a href="" class="nav-item nav-link"></a>
                            @else
                            <a href="{{ route('login') }}" class="nav-item nav-link">My Account</a>
                            @endauth

                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('frontend/img/carousel-1.jpg')}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('frontend/img/carousel-2.jpg')}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('main_container')


     <!-- Subscribe Start -->
     <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('frontend/img/vendor-1.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('frontend/img/vendor-2.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('frontend/img/vendor-3.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('frontend/img/vendor-4.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('frontend/img/vendor-5.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('frontend/img/vendor-6.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('frontend/img/vendor-7.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{ asset('frontend/img/vendor-8.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="{{ asset('frontend/img/payments.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{ asset('frontend/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html> --}}



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('frontend/new_asset/images/favicon-32x32.png') }}" type="image/png" />
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
                                    <a href="index.html">
                                        <img src="{{ asset('frontend/new_asset/images/logo-icon.png')}}" class="logo-icon" alt="" />
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
                                    <h5 class="mb-0">+011 5827918</h5>
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
                                    <a class="nav-link" href="about-us.html">About</a>
                                </li>
                                
                                <li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Store</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact-us.html">Blog</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact-us.html">Contact</a>
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
            <section class="py-5 border-top bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                        <div class="col">
                            <div class="footer-section1">
                                <h5 class="mb-4 text-uppercase fw-bold">Contact Info</h5>
                                <div class="address mb-3">
                                    <h6 class="mb-0 text-uppercase fw-bold">Address</h6>
                                    <p class="mb-0">123 Street Name, City, Australia</p>
                                </div>
                                <div class="phone mb-3">
                                    <h6 class="mb-0 text-uppercase fw-bold">Phone</h6>
                                    <p class="mb-0">Toll Free (123) 472-796</p>
                                    <p class="mb-0">Mobile : +91-9910XXXX</p>
                                </div>
                                <div class="email mb-3">
                                    <h6 class="mb-0 text-uppercase fw-bold">Email</h6>
                                    <p class="mb-0">mail@example.com</p>
                                </div>
                                <div class="working-days mb-3">
                                    <h6 class="mb-0 text-uppercase fw-bold">WORKING DAYS</h6>
                                    <p class="mb-0">Mon - FRI / 9:30 AM - 6:30 PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="footer-section2">
                                <h5 class="mb-4 text-uppercase fw-bold">Categories</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i>
                                            Jeans</a>
                                    </li>
                                    <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i>
                                            T-Shirts</a>
                                    </li>
                                    <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i>
                                            Sports</a>
                                    </li>
                                    <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i>
                                            Shirts & Tops</a>
                                    </li>
                                    <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i>
                                            Clogs & Mules</a>
                                    </li>
                                    <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i>
                                            Sunglasses</a>
                                    </li>
                                    <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i>
                                            Bags & Wallets</a>
                                    </li>
                                    <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i>
                                            Sneakers & Athletic</a>
                                    </li>
                                    <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i>
                                            Electronis</a>
                                    </li>
                                    <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i>
                                            Furniture</a>
                                    </li>
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
                                <h5 class="mb-4 text-uppercase fw-bold">Stay informed</h5>
                                <div class="subscribe">
                                    <input type="text" class="form-control" placeholder="Enter Your Email" />
                                    <div class="mt-3 d-grid">
                                        <a href="javascript:;" class="btn btn-dark btn-ecomm">Subscribe</a>
                                    </div>
                                    <p class="mt-3 mb-0">Subscribe to our newsletter to receive early discount offers,
                                        updates and new products info.</p>
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
                        <p class="mb-0">Copyright © 2022. All right reserved.</p>
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
