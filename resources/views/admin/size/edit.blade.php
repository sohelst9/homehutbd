@extends('layouts.admin.app')
@section('title', '| Edit Size')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title">Edit Size</h4>
            <!----alerat------->
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form action="{{ url('/admin/size/'.$size_id->id) }}" method="post" class="forms-sample">
                @csrf
                @method('PUT')
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Size Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name" value="{{ $size_id->name }}">
                  @error('name')
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
