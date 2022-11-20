@extends('layouts.admin.app')
@section('title', '/banner')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title">Banner Information</h4>
            <!----alerat------->
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ route('banner.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
              <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                  <input type="text" name="title" class="form-control" id="title">
                  @error('title')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="subtitle" class="col-sm-3 col-form-label">Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="subtitle" class="form-control" id="subtitle">
                  @error('subtitle')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="discount" class="col-sm-3 col-form-label">Discount %</label>
                <div class="col-sm-9">
                  <input type="text" name="discount" class="form-control" id="discount">
                  @error('discount')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="banner" class="col-sm-3 col-form-label">Banner</label>
                <div class="col-sm-9">
                  <input type="file" name="banner" class="form-control" id="banner">
                  @error('banner')
                    <p class="text-danger">{{ $message }}</p>
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