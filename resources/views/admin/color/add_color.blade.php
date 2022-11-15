@extends('layouts.admin.app')
@section('title', '| Add Color')
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card m-auto">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title">Add New Color</h4>
            <!----alerat------->
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ route('color.store') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Color Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name">
                  @error('name')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="code" class="col-sm-3 col-form-label">Color Code</label>
                <div class="col-sm-9">
                  <input type="text" name="code" class="form-control" id="code">
                  @error('code')
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
