@extends('layouts.frontend.app')
@section('front_title', '/Register')
@section('content-frontend')
  <!--start page wrapper -->
  <div class="page-wrapper">
    <div class="page-content">
      <!--start breadcrumb-->
      <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
        <div class="container">
          <div class="page-breadcrumb d-flex align-items-center">
            <h3 class="breadcrumb-title pe-3">Sign Up</h3>
            <div class="ms-auto">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}"><i class="bx bx-home-alt"></i> Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Authentication</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!--end breadcrumb-->
      <!--start shop cart-->
      <section class="py-0 py-lg-5">
        <div class="container">
          <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5">
            <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
              <div class="col mx-auto">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="border p-4 rounded">
                      <div class="text-center">
                        <h3 class="">Sign Up</h3>
                        <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a>
                        </p>
                      </div>
                      <div class="d-grid">
                        <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                          <i class="bx bxl-google text-warning"></i>
                          <span>Sign Up with Google</span>
                          </span>
                        </a> <a href="javascript:;" class="btn btn-white"><i class="bx bxl-facebook text-primary"></i>Sign Up with Facebook</a>
                      </div>
                      <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                        <hr/>
                      </div>
                      <div class="form-body">
                        <form class="row g-3" action="{{ route('register') }}" method="POST">
                          @csrf
                          <div class="col-sm-6">
                            <label for="inputFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputFirstName" placeholder="Jhon" name="fname">
                            @error('fname')
                              <div>
                                  <p class="text-danger">{{ $message }}</p>
                              </div>
                          @enderror
                          </div>

                          <div class="col-sm-6">
                            <label for="inputLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputLastName" placeholder="Deo" name="lname">
                            @error('lname')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                          </div>

                          <div class="col-sm-6">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                            @error('username')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                          </div>

                          <div class="col-sm-6">
                            <label for="phone" class="form-label">Phone [BD]</label>
                            <input type="text" class="form-control" id="phone" placeholder="phone" name="phone">
                            @error('phone')
                                <div>
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                          </div>

                           <!----Email--------------->
                           <div class="col-md-12">
                              <label for="email">Email</label>
                              <input type="email" id="email" class="form-control" name="email">
                              @error('email')
                                  <div>
                                      <p class="text-danger">{{ $message }}</p>
                                  </div>
                              @enderror
                        </div>

                          <!----password--------------->
                          <div class="col-md-6">
                              <label for="password">Password</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                              @error('password')
                                  <div>
                                      <p class="text-danger">{{ $message }}</p>
                                  </div>
                              @enderror
                          </div>

                           <!----password--------------->
                           <div class="col-md-6">
                              <label for="password-confirm">Confirm Password</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              @error('password')
                                  <div>
                                      <p class="text-danger">{{ $message }}</p>
                                  </div>
                              @enderror
                          </div>
                         
                          <div class="col-12">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                              <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="d-grid">
                              <button type="submit" class="btn btn-dark"><i class='bx bx-user'></i>Sign up</button>
                            </div>
                          </div>
                        </form>
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
