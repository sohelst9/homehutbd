@extends('layouts.admin.app')
@section('title', '| Edit Banner')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title">Edit Banner</h4>
            <form action="{{ url('/admin/banner/'.$banner_id->id) }}" method="post" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="title" class="form-control" id="title" value="{{ $banner_id->title }}">
                      @error('title')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="subtitle" class="col-sm-3 col-form-label">Sub Title</label>
                    <div class="col-sm-9">
                      <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{ $banner_id->subtitle }}">
                      @error('subtitle')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="discount" class="col-sm-3 col-form-label">Discount %</label>
                    <div class="col-sm-9">
                      <input type="text" name="discount" class="form-control" id="discount" value="{{ $banner_id->discount }}">
                      @error('discount')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
    
                  <div class="form-group row">
                    <label for="banner" class="col-sm-3 col-form-label">Banner</label>
                    <div class="col-sm-9">
                      <input type="file" name="banner" class="form-control" id="banner">

                      <img class="mt-2" src="{{ asset('storage/backend/upload/banner/'.$banner_id->banner) }}" height="80px" width="90px">
                    </div>
                  </div>

              <button type="submit" class="btn btn-primary mr-2">Update</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection
