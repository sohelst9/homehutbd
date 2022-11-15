@extends('layouts.admin.app')
@section('title', '| Add Inventory')
@section('content')
<style>
    .form-control:disabled, .asColorPicker-input:disabled, .dataTables_wrapper select:disabled, .jsgrid .jsgrid-table .jsgrid-filter-row input:disabled[type="text"], .jsgrid .jsgrid-table .jsgrid-filter-row select:disabled, .jsgrid .jsgrid-table .jsgrid-filter-row input:disabled[type="number"], .select2-container--default .select2-selection--single:disabled, .select2-container--default .select2-selection--single .select2-search__field:disabled, .typeahead:disabled, .tt-query:disabled, .tt-hint:disabled, .form-control[readonly], .asColorPicker-input[readonly], .dataTables_wrapper select[readonly], .jsgrid .jsgrid-table .jsgrid-filter-row input[readonly][type="text"], .jsgrid .jsgrid-table .jsgrid-filter-row select[readonly], .jsgrid .jsgrid-table .jsgrid-filter-row input[readonly][type="number"], .select2-container--default .select2-selection--single[readonly], .select2-container--default .select2-selection--single .select2-search__field[readonly], .typeahead[readonly], .tt-query[readonly], .tt-hint[readonly]{
        background-color: #101011 !important;
    }
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
 <div class="back">
    <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
 </div>
<div class="row">
    <div class="col-lg-8 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark" id="category">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th style="width:100px">Option</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($variations as $key=>$variation)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ substr($variation->product->productName, 1, 15).'..' }} </td>
                                <td> {{ $variation->colors->name ?? 'N/A' }} </td>
                                <td> {{ $variation->sizes->name ?? 'N/A' }} </td>
                                <td> {{ $variation->quantity }} </td>
                                <td>
                                    <a href="" class="btn btn-small btn-primary">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="" class="btn btn-small btn-danger">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <td colspan="6" class="text-center">No data Found</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 grid-margin stretch-card">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title">Product Inventory Information</h4>
            <form action="{{ route('productVariation.store') }}" method="POST" class="forms-sample">
                @csrf
              <div class="form-group">
                <label for="product_name" class="col-form-label">Product Name</label>
                  <input type="text" class="form-control" id="product_name" readonly value="{{ $products->productName }}">
                  <input type="hidden" class="form-control" name="product_id" value="{{ $products->id }}">
                  @error('meta_title')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>

                <div class="form-group">
                    <label for="color" class="col-form-label">Colors <span class="text-danger">*</span></label>
                    <select class="js-example-basic-single" style="width:100%" name="color_id" id="color">
                        <option value="">--Colors--</option>
                        @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                    @error('color')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="size" class="col-form-label">Sizes <span class="text-danger">*</span></label>
                    <select class="js-example-basic-single" style="width:100%" name="size_id" id="size">
                        <option value="">--Sizes--</option>
                        @foreach ($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                    @error('size')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quantity" class="col-form-label">Quantity <span class="text-danger">*</span></label>
                    <input type="number" name="quantity" class="form-control" id="quantity">
                    @error('quantity')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

              <button type="submit" class="btn btn-primary mr-2">Save</button>
            </form>
          </div>
        </div>
    </div>
</div>

@endsection

