<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css')}}">

    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend/assets/images/logo.svg')}}" alt="logo" /></a>
            <a class="sidebar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend/assets/images/logo-mini.svg')}}" alt="logo" /></a>
          </div>
          <ul class="nav">
            <li class="nav-item profile">
              <div class="profile-desc">
                <div class="profile-pic">
                  <div class="count-indicator">
                      @php
                          $profile_image = Auth::guard('admin')->user()->profile_image;
                      @endphp
                    <img class="img-xs rounded-circle " src="{{ asset('storage/backend/admin/'.$profile_image) }}" alt="">
                    <span class="count bg-success"></span>
                  </div>
                  <div class="profile-name">
                    <h6 class="mb-0 font-weight-normal">{{ Auth::guard('admin')->user()->username }}</h6>
                    <span>Admin</span>
                  </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                  <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-onepassword  text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                    </div>
                  </a>

                </div>
              </div>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Navigation</span>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <!----category----->
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('category.index') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Category</span>
              </a>
            </li>
          <!----SubCategory----->
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('subCategory.index') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">SubCategory</span>
              </a>
            </li>
             <!----Products----->
              <li class="nav-item menu-items">
                  <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-icon">
                      <i class="mdi mdi-laptop"></i>
                  </span>
                  <span class="menu-title">Products</span>
                  <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                      {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('product.create') }}">Add Products</a></li> --}}
                      <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}">All Products</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('brand.index') }}">Brands</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('color.index') }}">Colors</a></li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('size.index') }}">Sizes</a></li>
                  </ul>
                  </div>
              </li>

            <!----Coupon----->
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('coupon.index') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Coupon</span>
              </a>
            </li>

            {{-- <li class="nav-item menu-items">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                  <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}">Add category</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">All category</a></li>
                </ul>
              </div>
            </li> --}}

          </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:../../partials/_navbar.html -->
          <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="{{ asset('backend/assets/images/logo-mini.svg ') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
              </button>
              <ul class="navbar-nav w-100">
                <li class="nav-item w-100">
                  <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                    <input type="text" class="form-control" placeholder="Search products">
                  </form>
                </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown d-none d-lg-block">
                  <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New Project</a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                    <h6 class="p-3 mb-0">Projects</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-file-outline text-primary"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Software Development</p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <p class="p-3 mb-0 text-center">See all projects</p>
                  </div>
                </li>
                <li class="nav-item dropdown border-left">
                  <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email"></i>
                    <span class="count bg-success"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0">Messages</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="{{ asset('backend/assets/images/faces/face4.jpg ') }}" alt="image" class="rounded-circle profile-pic">
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                        <p class="text-muted mb-0"> 1 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="../../assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                        <p class="text-muted mb-0"> 18 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <p class="p-3 mb-0 text-center">4 new messages</p>
                  </div>
                </li>
                <li class="nav-item dropdown border-left">
                  <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-bell"></i>
                    <span class="count bg-danger"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0">Notifications</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-calendar text-success"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Event today</p>
                        <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <p class="p-3 mb-0 text-center">See all notifications</p>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                      @php
                          $profile_image =Auth::guard('admin')->user()->profile_image;
                      @endphp
                      <img class="img-xs rounded-circle" src="{{ asset('storage/backend/admin/'.$profile_image) }}" alt="">
                      <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::guard('admin')->user()->username }}</p>
                      <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.profile') }}" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-account-plus  text-primary"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Profile</p>
                      </div>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.change.password') }}" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-onepassword text-primary"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Change password</p>
                      </div>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.logout') }}" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-logout text-danger"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Log out</p>
                      </div>
                    </a>
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
              </button>
            </div>
          </nav>
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">


              @yield('content')

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © HomeHutBd 2022</span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
        <!-- page-body-wrapper ends -->
    </div>
    <!-- plugins:js -->

    <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/select2/select2.min.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('backend/assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('backend/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('backend/assets/js/misc.js')}}"></script>
    <script src="{{ asset('backend/assets/js/settings.js')}}"></script>
    <script src="{{ asset('backend/assets/js/todolist.js')}}"></script>

    <script src="{{ asset('backend/assets/js/file-upload.js')}}"></script>
    <script src="{{ asset('backend/assets/js/typeahead.js')}}"></script>
    <script src="{{ asset('backend/assets/js/select2.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('scripts')
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>
