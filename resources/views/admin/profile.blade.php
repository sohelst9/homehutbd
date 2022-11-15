@extends('layouts.admin.app')
@section('title', '| Admin Profile')
@section('content')

<div class="row">
    <div class="col-md-6 grid-margin stretch-card m-auto">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title">Profile</h4>
            <!----alerat profile update------->
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ route('admin.profile.update') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="admin_id" value="{{ $profile->id }}">
              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">User Name</label>
                <div class="col-sm-9">
                  <input type="text" name="username" class="form-control" id="exampleInputUsername2"  value="{{ $profile->username }}">
                  @error('username')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputPhone" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-9">
                  <input type="text" name="phone" class="form-control" id="exampleInputPhone" value="{{ $profile->phone }}">
                  @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="text" name="email" class="form-control" id="exampleInputEmail" value="{{ $profile->email }}">
                  @error('email')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputImage" class="col-sm-3 col-form-label">Profile Image</label>
                <div class="col-sm-9">
                  <input type="file" name="profile_image" class="form-control" id="exampleInputImage">
                  @error('profile_image')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <img class="mt-2" src="{{ asset('storage/backend/admin/'.$profile->profile_image) }}" height="80px" width="90px">
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Save</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection
