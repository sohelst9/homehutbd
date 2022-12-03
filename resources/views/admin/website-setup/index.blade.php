@extends('layouts.admin.app')
@section('title', '| Website Setting')
@section('content')
    <style>

    </style>
    <!----alerat------->
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!----header setting---->
    <div class="row">
        <div class="col-md-12">
            <!----start Header Setting-->
            <form action="{{ route('headerSetting.store') }}" method="POST" class="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="headersetting_id" value="{{ $headerinfo->id ?? '' }}">
                <div class="card mt-2">
                    <div class="card-body">
                        <h4 class="card-title">Header Setting</h4>
                        <hr style="border-top: 1px dotted rgb(213, 203, 203);">
                        <!---site icon--->
                        <div class="form-group">
                            <label for="site_icon" class="col-form-label">Site Icon <span class="text-danger">*</span> <span
                                    class="text-light">(600x600)</span></label>
                            <div class="">
                                <input type="file" name="site_icon" class="form-control" id="site_icon">
                                @if ($headerinfo)
                                    <img class="mt-2" src="{{ asset('images/site_icon/'.$headerinfo->site_icon) }}" height="80px" width="90px">
                                @else

                                @endif
                                
                               
                            </div>
                        </div>
                        <!---site_logo--->
                        <div class="form-group">
                            <label for="site_logo" class="col-form-label">Site Logo <span class="text-danger">*</span> <span
                                    class="text-light">(400x400)</span></label>
                            <div class="">
                                <input type="file" name="site_logo" class="form-control" id="site_logo">
                                @if ($headerinfo)
                                    <img class="mt-2" src="{{ asset('images/site_logo/'.$headerinfo->site_logo) }}" height="80px" width="90px">
                                @else
                                @endif
                               
                            </div>
                        </div>
                        <!---Helpline Number--->
                        <div class="form-group">
                            <label for="help_number" class="col-form-label">Help Line Number </label>
                            <div class="">
                                <input type="text" name="help_number" class="form-control" id="help_number"
                                    placeholder="Help Line Number" value="{{ $headerinfo->help_number ?? '' }}">
                                
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary m-auto">Save & Publish</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!----end header setting---->

    <div class="row">
        <div class="col-md-12">
            <!----Footer Widget-->
            <div class="card mt-2">
                <div class="card-header">
                    <h4 class="card-title">Footer Widget</h4>
                    <hr style="border-top: 1px dotted rgb(213, 203, 203);">
                </div>
               <div class="row">
                    <div class="col-md-6">
                        <div class="card-body" style="background-color: rgb(30, 30, 30); margin: 30px; border-radius:8px;">
                            <form action="{{ route('contactInfoWidget.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="contaceinfowidget_id" value="{{ $contactinfoWidget->id ?? '' }}">
                                <h4 class="card-title">Contact Info Widget</h4>
                                <hr style="border-top: 1px dotted rgb(213, 203, 203);">
                                <!---address--->
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Contact Address</label>
                                    <div class="">
                                        <input type="text" multiple name="address" class="form-control" id="address" placeholder="Address" value="{{ $contactinfoWidget->address ?? '' }}">
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <!---Contact email--->
                                <div class="form-group">
                                    <label for="contact_email" class="col-form-label">Contact Email </label>
                                    <div class="">
                                        <input type="text" name="contact_email" class="form-control" id="contact_email" placeholder="example@gmail.com" value="{{ $contactinfoWidget->email ?? '' }}">
                                        @error('contact_email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <!---Contact phone--->
                                <div class="form-group">
                                    <label for="contact_phone" class="col-form-label">Contact Phone </label>
                                    <div class="">
                                        <input type="text" name="contact_phone" class="form-control" id="contact_phone"
                                            placeholder="contact phone" value="{{ $contactinfoWidget->number ?? '' }}">
                                        @error('contact_phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary m-auto">Save & Publish</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card-body" style="background-color: rgb(30, 30, 30); margin: 30px; border-radius:8px;">
                            <form action="{{ route('stayInformed.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="StayInformed_id" value="{{ $StayInformed->id ?? '' }}">
                                <h4 class="card-title">Stay informed</h4>
                                <hr style="border-top: 1px dotted rgb(213, 203, 203);">
                                <!---description--->
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description </label>
                                    <div class="">
                                        <textarea name="description" id="description" class="form-control" cols="10" rows="3">{{ $StayInformed->description ?? '' }}</textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <!---Play Store Link--->
                                <div class="form-group">
                                    <label for="play_Store" class="col-form-label">Play Store Link </label>
                                    <div class="">
                                        <input type="text" name="play_Store" class="form-control" id="play_Store" value="{{ $StayInformed->playstore_link ?? '' }}">
                                    </div>
                                </div>
                                <!---App Store Link--->
                                <div class="form-group">
                                    <label for="app_store" class="col-form-label">App Store Link </label>
                                    <div class="">
                                        <input type="text" name="app_store" class="form-control" id="app_store" value="{{ $StayInformed->appstore_link ?? '' }}">
                                    </div>
                                </div>
        
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary m-auto">Save & Publish</button>
                                </div>
                            </form>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!----Copyright Widget-->
            <form action="{{ route('copyright.store') }}" method="POST">
                @csrf
                <input type="hidden" name="copyright_id" value="{{ $copyright->id ?? '' }}">
                <div class="card mt-2">
                    <div class="card-body">
                        <h4 class="card-title">Copyright Widget</h4>
                        <hr style="border-top: 1px dotted rgb(213, 203, 203);">
                        
                        <!---Copyright Text--->
                        <div class="form-group">
                            <label for="copyright" class="col-form-label">Copyright Text</label>
                            <div class="">
                                <textarea name="copyright" class="form-control" id="copyright" rows="5">{{ $copyright->copyright ?? '' }}</textarea>
                                @error('copyright')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary m-auto">Save & Publish</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    
    {{-- <div class="row">
        <div class="col-md-12">
            <!----Payment Methods Widget-->
            <form action="" method="POST" class="" enctype="multipart/form-data">
                @csrf
                <div class="card mt-2">
                    <div class="card-body">
                        <h4 class="card-title">Payment Methods Widget</h4>
                        <hr style="border-top: 1px dotted rgb(213, 203, 203);">
                        
                        <!---payment method file--->
                        <div class="form-group">
                            <label for="payment_method" class="col-form-label">Payment Methods</label>
                            <div class="">
                                <input type="file" name="payment_method" class="form-control" id="payment_method">
                                @error('payment_method')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary m-auto">Save & Publish</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div> --}}
@endsection
