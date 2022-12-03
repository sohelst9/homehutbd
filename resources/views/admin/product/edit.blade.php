
@extends('layouts.admin.app')
@section('title', '| Edit Product')
@section('content')
<style>

</style>
<form action="{{ route('product.update') }}" method="POST" class="" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <!----product info start-->
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Edit Product</h4>
                    <input type="hidden" name="id" value="{{ $products->id }}">
                    <!---product Name--->
                    <div class="form-group row">
                        <label for="ProductName" class="col-sm-3 col-form-label">Product Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" name="ProductName" class="form-control" id="ProductName" value="{{ $products->productName }}">
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
                                <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                            @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                {{ $subcategory->id == $products->subcategory_id ? 'selected' : '' }}>
                                {{ $subcategory->subcategory }}</option>
                        @endforeach
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
                                <option value="{{ $Brand->id }}" {{ $Brand->id == $products->brand_id ? 'selected' : '' }}>{{ $Brand->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <!---product Weight--->
                    <div class="form-group row">
                        <label for="weight" class="col-sm-3 col-form-label">Weight</label>
                        <div class="col-sm-9">
                        <input type="text" name="weight" class="form-control" id="weight" placeholder="0.00 g/kg" value="{{ $products->weight }}">
                        </div>
                    </div>
                    <!---product Barcode--->
                    <div class="form-group row">
                        <label for="barcode" class="col-sm-3 col-form-label">Barcode <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" name="barcode" class="form-control" id="barcode" value="{{ $products->barcode }}">
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
                        @foreach ($products->galleryImages as $gallery)

                       <div class="delete_img" style="display: inline-block;">
                            <img class="mt-2" src="{{ asset('images/galleryImage/'.$gallery->gallery) }}" height="80px" width="90px">
                            <button style="padding:0px; margin-top: -54px; margin-left: -25px;" type="button" class="galleryImageDelete btn btn-danger btn-small" value="{{ $gallery->id }}"><i class="mdi mdi-backspace" ></i></button>
                       </div>
                        @endforeach
                        </div>
                    </div>
                    <!---Thumbnail Image--->
                    <div class="form-group row">
                        <label for="ThumbnailImage" class="col-sm-3 col-form-label">Thumbnail Image <span class="text-danger">*</span> <span class="text-light">(400x400)</span></label>
                        <div class="col-sm-9">
                        <input type="file" name="ThumbnailImage" class="form-control" id="ThumbnailImage">
                        <img class="mt-2" src="{{ asset('images/thumbnailImage/'.$products->thumbnailImage) }}" height="80px" width="90px">
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
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Color Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_color  as $product_c)


                                    <tr class="pro-color-tr">
                                        <td>{{ $product_c->colors->name }}</td>
                                        <td>
                                            <button type="button" value="{{ $product_c->id }}" class="productColorDelete btn btn-danger btn-sm text-white">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>Size Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_size  as $product_s)


                                    <tr class="pro-size-tr">
                                        <td>{{ $product_s->sizes->name }}</td>
                                        <td>
                                            <button type="button" value="{{ $product_s->id }}" class="productSizeDelete btn btn-danger btn-sm text-white">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                        <input type="number" name="ProductPrice" class="form-control" id="ProductPrice" value="{{ $products->productPrice }}">
                        @error('ProductPrice')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <!---product discount date Range--->
                    <div class="form-group row">
                        <label for="discountDate" class="col-sm-3 col-form-label">Discount Date Range</label>
                        <div class="col-sm-9">
                        <input type="date" name="discountDate" class="form-control" id="discountDate" value="">
                        </div>
                    </div>
                    <!---product discount--->
                    <div class="form-group row">
                        <label for="discount" class="col-sm-3 col-form-label">Discount <span class="text-light">(%)</span></label>
                        <div class="col-sm-9">
                        <input type="text" name="discount" class="form-control" id="discount" value="{{ $products->discount }}">
                        </div>
                    </div>

                    <!---product Quantity--->
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Quantity <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                        <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $products->quantity }}">
                        @error('quantity')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>

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
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $products->description }}</textarea>
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
                            <input type="text" name="metaTitle" class="form-control" id="metaTitle" value="{{ $products->meta_title }}">
                        @error('metaTitle')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                        <!---meta description--->
                    <div class="form-group row">
                        <label for="metaDescription" class="col-sm-3 col-form-label">MetaDescription</label>
                        <div class="col-sm-9">
                            <textarea name="metaDescription" id="metaDescription" cols="30" rows="10" class="form-control">{{ $products->meta_descp }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!----Featured status-->
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Featured</h4>
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label" style="margin-top:9px;">Status</label>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="featured" value="off" {{ $products->featured =="off" ? 'checked' : '' }}>off </label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="featured" value="on" {{ $products->featured =="on" ? 'checked' : '' }}>on </label>
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
                              <input type="radio" class="form-check-input" name="todayDeal" value="off" {{ $products->to_day_deal =="off" ? 'checked' : '' }}>off </label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="todayDeal" value="on" {{ $products->to_day_deal =="on" ? 'checked' : '' }}>on </label>
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
                        <select name="addTosFlash" class="form-control" >
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
                        <input type="number" name="vat" class="form-control" value="{{ $products->vat }}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tax <span>(taka)</span></label>
                        <input type="number" name="tax" class="form-control" value="{{ $products->tax }}">
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

        $.ajax({
            type:'POST',
            url:'/getCategory',
            data:{'category_id':category},
            success:function(data){
                $('#subcategory').html(data);

            }
        });
     });


     //galleryImageDelete
     $(document).on('click', '.galleryImageDelete', function(){
        var gallery_id = $(this).val();
        var thisclick =$(this);
        $.ajax({
            type:'GET',
            url:"/admin/galleryImage/"+gallery_id+"/delete",
            data:{
                'gallery_id':gallery_id
            },
            success: function(response){
                alert(response.message);
                thisclick.closest('.delete_img').remove();
            }
        });
     });
   </script>
@endsection
