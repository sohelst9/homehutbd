@extends('layouts.admin.app')
@section('title', '| Edit Cayegory')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title">Edit Category</h4>
            <form action="{{ url('/admin/category/'.$category_id->id) }}" method="post" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name" value="{{ $category_id->name }}">
                  @error('name')
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
                  <img class="mt-2" src="{{ asset('images/category/'.$category_id->banner) }}" height="80px" width="90px">

                </div>
              </div>

              <div class="form-group row">
                <label for="meta_title" class="col-sm-3 col-form-label">Meta Title</label>
                <div class="col-sm-9">
                  <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ $category_id->meta_title }}">
                  @error('meta_title')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="meta_descp" class="col-sm-3 col-form-label">Meta Description</label>
                <div class="col-sm-9">
                  <textarea name="meta_descp" id="meta_descp" cols="30" rows="10" class="form-control">{{ $category_id->meta_descp }}</textarea>
                  @error('meta_descp')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Update</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection
