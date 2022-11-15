@extends('layouts.admin.app')
@section('title', '| change password')
@section('content')

<div class="row">
    <div class="col-md-6 grid-margin stretch-card m-auto">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title">Change Password</h4>
            <!----alerat profile update------->
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ route('admin.password.update') }}" method="POST" class="forms-sample">
                @csrf
                <input type="hidden" name="admin_id" value="{{ $Auth_password_id->id }}">
              <div class="form-group row">
                <label for="exampleInputPassword" class="col-sm-3 col-form-label">New Password  <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" id="exampleInputPassword">
                  @error('password')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputCPassword" class="col-sm-3 col-form-label">Re-Type Password <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password_confirmation" id="exampleInputCPassword">
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

              <button type="submit" class="btn btn-primary mr-2">Save</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection
