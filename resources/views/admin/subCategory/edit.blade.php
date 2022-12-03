@extends('layouts.admin.app')
@section('title', '| Edit SubCayegory')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title">Edit SubCategory</h4>
            <!----alerat------->
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ url('admin/subCategory/'.$subcategory_id->id) }}" method="post" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                        <select name="category" class="form-control">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $subcategory_id->category ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                    </div>
                  </div>

              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Sub Category</label>
                <div class="col-sm-9">
                  <input type="text" name="subcategory" class="form-control" id="name" value="{{ $subcategory_id->subcategory }}">
                  @error('subcategory')
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
                  <img class="mt-2" src="{{ asset('images/subcategory/'.$subcategory_id->banner) }}" height="80px" width="90px">
                </div>
              </div>

              <div class="form-group row">
                <label for="meta_title" class="col-sm-3 col-form-label">Meta Title</label>
                <div class="col-sm-9">
                  <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ $subcategory_id->meta_title }}">
                  @error('meta_title')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="meta_descp" class="col-sm-3 col-form-label">Meta Description</label>
                <div class="col-sm-9">
                  <textarea name="meta_descp" id="meta_descp" cols="30" rows="10" class="form-control">{{ $subcategory_id->meta_descp }}</textarea>
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

