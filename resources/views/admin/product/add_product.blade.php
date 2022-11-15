
@extends('layouts.admin.app')
@section('title', '| Add Product')
@section('content')
<style>

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
<form action="{{ route('product.store') }}" method="POST" class="" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <!----product info start-->
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Product Information</h4>
                    <!---product Name--->
                    <div class="form-group row">
                        <label for="ProductName" class="col-sm-3 col-form-label">Product Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" name="ProductName" class="form-control" id="ProductName">
                        @error('ProductName')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <!---product Category--->
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 col-form-label">Category <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="js-example-basic-single" style="width:100%" name="category" id="category">
                                <option value="">--Categories--</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <!---product SubCategory--->
                    <div class="form-group row">
                        <label for="subcategory" class="col-sm-3 col-form-label">SubCategory <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                        <select name="subcategory" id="subcategory" class="js-example-basic-single" style="width:100%">
                            <option value="">--Subcategories--</option>
                        </select>
                        @error('subcategory')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <!---product Brand--->
                    <div class="form-group row">
                        <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                        <div class="col-sm-9">
                        <select name="brand" id="brand" class="js-example-basic-single" style="width:100%">
                            <option value="">--Brand--</option>
                            @foreach ($Brands as $Brand)
                                <option value="{{ $Brand->id }}">{{ $Brand->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <!---product Weight--->
                    <div class="form-group row">
                        <label for="weight" class="col-sm-3 col-form-label">Weight</label>
                        <div class="col-sm-9">
                        <input type="text" name="weight" class="form-control" id="weight" placeholder="0.00 g/kg">
                        </div>
                    </div>
                    <!---product Barcode--->
                    <div class="form-group row">
                        <label for="barcode" class="col-sm-3 col-form-label">Barcode <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" name="barcode" class="form-control" id="barcode">
                        @error('barcode')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>

                </div>
            </div>
            <!----start  product image-->
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Product Image</h4>
                    <!---product Image--->
                    <div class="form-group row">
                        <label for="galleryImage" class="col-sm-3 col-form-label">Gallery Image <span class="text-light">(600x600)</span></label>
                        <div class="col-sm-9">
                        <input type="file" multiple name="galleryImage[]" class="form-control" id="galleryImage">
                        </div>
                    </div>
                    <!---Thumbnail Image--->
                    <div class="form-group row">
                        <label for="ThumbnailImage" class="col-sm-3 col-form-label">Thumbnail Image <span class="text-danger">*</span> <span class="text-light">(400x400)</span></label>
                        <div class="col-sm-9">
                        <input type="file" name="ThumbnailImage" class="form-control" id="ThumbnailImage">
                        @error('ThumbnailImage')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>

                </div>
            </div>
            {{-- <!----start  product Variation-->
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Product Variation</h4>
                    <!---product color--->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Colors</label>
                        <div class="col-sm-9">
                            <select class="js-example-basic-multiple" multiple="multiple" style="width:100%" name="color[]">
                            <option value="">--select--</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <!---product size--->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Size</label>
                        <div class="col-sm-9">
                            <select class="js-example-basic-multiple" multiple="multiple" style="width:100%" name="size[]">
                            <option value="">--select--</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div> --}}
            <!----start  product price and Stock-->
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Product Price and Stock</h4>
                    <!---product price--->
                    <div class="form-group row">
                        <label for="ProductPrice" class="col-sm-3 col-form-label">Product Price <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                        <input type="number" name="ProductPrice" class="form-control" id="ProductPrice">
                        @error('ProductPrice')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <!---product discount date Range--->
                    <div class="form-group row">
                        <label for="discountDate" class="col-sm-3 col-form-label">Discount Date Range</label>
                        <div class="col-sm-9">
                        <input type="date" name="discountDate" class="form-control" id="discountDate">
                        </div>
                    </div>
                    <!---product discount--->
                    <div class="form-group row">
                        <label for="discount" class="col-sm-3 col-form-label">Discount <span class="text-light">(%)</span></label>
                        <div class="col-sm-9">
                        <input type="text" name="discount" class="form-control" id="discount">
                        </div>
                    </div>

                    {{-- <!---product Quantity--->
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Quantity <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                        <input type="number" name="quantity" class="form-control" id="quantity">
                        @error('quantity')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div> --}}

                </div>
            </div>
            <!----start  product Description-->
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Product Description</h4>
                    <!---Description--->
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Description <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!----start  product Seo Meta Tags-->
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Seo Meta Tags</h4>
                    <!---meta title--->
                    <div class="form-group row">
                        <label for="metaTitle" class="col-sm-3 col-form-label">Meta Title <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="metaTitle" class="form-control" id="metaTitle">
                        @error('metaTitle')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                        <!---meta description--->
                    <div class="form-group row">
                        <label for="metaDescription" class="col-sm-3 col-form-label">MetaDescription</label>
                        <div class="col-sm-9">
                            <textarea name="metaDescription" id="metaDescription" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!----Featured status-->
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Featured</h4>
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="margin-top:9px;">Status</label>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="featured" value="off" checked>off </label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="featured" value="on">on </label>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!----Todays Deal status-->
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Todays Deal</h4>
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="margin-top:9px;">Status</label>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="todayDeal" value="off" checked>off </label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="todayDeal" value="on">on </label>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
             <!----Flash Deal-->
             <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Flash Deal</h4>
                    <div class="form-group">
                        <label class="col-form-label">Add to Flash</label>
                        <select name="addToFlash" class="form-control">
                            <option value="">Select Flash</option>
                            <option value="winterSell">Winter Sell</option>
                            <option value="flashDeal">Flash Deal</option>
                            <option value="flashSeal">Flash Seal</option>
                        </select>
                    </div>
                </div>
            </div>
            <!---- vat and tax-->
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Vat and Tax</h4>
                    <div class="form-group">
                        <label class="col-form-label">Vat <span>(taka)</span></label>
                        <input type="number" name="vat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tax <span>(taka)</span></label>
                        <input type="number" name="tax" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary mr-2">Save & Publish</button>
        </div>
    </div>
</form>

@endsection

@section('scripts')
   <script>
     $('#category').change(function(){
        var category = $('#category').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'/getCategory',
            data:{'category_id':category},
            success:function(data){
                $('#subcategory').html(data);

            }
        });
     });
   </script>
@endsection
