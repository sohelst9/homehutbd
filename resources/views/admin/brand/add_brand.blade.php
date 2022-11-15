@extends('layouts.admin.app')
@section('title', '| Add Brand')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title">Brand Information</h4>
            <!----alerat------->
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ route('brand.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Brand Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name">
                  @error('name')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="logo" class="col-sm-3 col-form-label">Logo (120x80)</label>
                <div class="col-sm-9">
                  <input type="file" name="logo" class="form-control" id="logo">
                  @error('logo')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="meta_title" class="col-sm-3 col-form-label">Meta Title</label>
                <div class="col-sm-9">
                  <input type="text" name="meta_title" class="form-control" id="meta_title">
                  @error('meta_title')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="meta_descp" class="col-sm-3 col-form-label">Meta Description</label>
                <div class="col-sm-9">
                  <textarea name="meta_descp" id="meta_descp" cols="30" rows="10" class="form-control"></textarea>
                  @error('meta_descp')
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
