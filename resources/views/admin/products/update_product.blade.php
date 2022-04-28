@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add New Product</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{route('update.product')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $products->id }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control" required="" data-validation-required-message="This field is required">
                                                <option value="" selected="" disabled="">Select Your Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected': '' }}>{{$category->category_name_en}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Subcategory Select</h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Your SubCategory</option>
                                                @foreach($sub_categories as $subcategory)
                                                <option value="{{ $subcategory->id }}" {{ $subcategory->id == $products->subcategory_id ? 'selected': '' }}>{{ $subcategory->subcategory_name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Sub-SubCategory Select</h5>
                                        <div class="controls">
                                            <select name="sub_subcategory_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Your Sub-SubCategory</option>
                                                @foreach($sub_subcategories as $sub_subcategory)
                                                <option value="{{ $sub_subcategory->id }}" {{ $sub_subcategory->id == $products->sub_subcategory_id ? 'selected': '' }}>{{ $sub_subcategory->sub_subcategory_name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Product Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_en" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_name_en }}">
                                            @error('product_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Product Name Lith <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_lith" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_name_lith }}">
                                            @error('product_name_lith')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_code" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_code }}">
                                            @error('product_code')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Product Model En</h5>
                                        <div class="controls">
                                            <input type="text" name="product_model_en" class="form-control" value="{{ $products->product_model_en }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Product Model Lith</h5>
                                        <div class="controls">
                                            <input type="text" name="product_model_lith" class="form-control" value="{{ $products->product_model_lith }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Product Qty <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_qty" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_qty }}">
                                            @error('product_qty')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Product Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_price" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_price }}">
                                            @error('product_price')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                <h5>Product Matirial Type En</h5>
                                                <div class="controls">
                                                    <input type="text" name="matirial_type_en" class="form-control"value="{{ $products->matirial_type_en }}">
                                                    @error('matirial_type_en')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Matirial Type Lith</h5>
                                                <div class="controls">
                                                    <input type="text" name="matirial_type_lith" class="form-control"value="{{ $products->matirial_type_lith }}">
                                                    @error('matirial_type_lith')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Height</h5>
                                                <div class="controls">
                                                    <input type="text" name="height" class="form-control" value="{{ $products->height }}">
                                                    @error('height')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Inner Diameter</h5>
                                                <div class="controls">
                                                    <input type="text" name="diameter_inner" class="form-control" value="{{ $products->diameter_inner }}">
                                                    @error('diameter_inner')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Outer Diameter</h5>
                                                <div class="controls">
                                                    <input type="text" name="diameter_outer" class="form-control" value="{{ $products->diameter_outer }}">
                                                    @error('diameter_outer')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Matirial Thickness <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="thickness" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->thickness }}">
                                                    @error('thickness')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Length</h5>
                                                <div class="controls">
                                                    <input type="text" name="length" class="form-control" value="{{ $products->length }}">
                                                    @error('length')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Radius</h5>
                                                <div class="controls">
                                                    <input type="text" name="radius" class="form-control" value="{{ $products->radius }}">
                                                    @error('radius')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Width</h5>
                                                <div class="controls">
                                                    <input type="text" name="width" class="form-control" value="{{ $products->width }}">
                                                    @error('width')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Short Discription En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="product_short_dic_en" id="textarea" class="form-control" required placeholder="Textarea text">
                                            {!! $products->product_short_dic_en !!}
                                            </textarea>
                                            @error('product_short_dic_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Short Discription Lith <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="product_short_dic_lith" class="form-control" required placeholder="Textarea text">
                                            {!! $products->product_short_dic_lith !!}
                                            </textarea>
                                            @error('product_short_dic_lith')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Long Discription En </h5>
                                        <div class="controls">
                                            <textarea id="editor1" name="product_long_dic_en" rows="10" cols="80">
                                            {!! $products->product_long_dic_en !!}
						                    </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Long Discription Lith </h5>
                                        <div class="controls">
                                            <textarea id="editor2" name="product_long_dic_lith" rows="10" cols="80">
                                            {!! $products->product_long_dic_lith !!}
						                    </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Products">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="row">
            <div class="col-md-12 ">
                <div class="box box-outline-primary">
                    <div class="box-header with-border">
                        <h5>Update Image <span class="text-danger">*</span></h5>
                    </div>
                    <form method="POST" action="{{ route('update.product.thumbnail') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <input type="hidden" name="old_img" value="{{ $products->product_thambnail }}">
                        <div class="row row-sm">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ asset($products->product_thambnail) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">
                                        <div class="form-group">
                                            <lable class="form-control-lable">
                                                Change Image
                                                <span class="tx-danger">*</span>
                                            </lable>
                                            <input type="file" class="form-control" name="product_thambnail">
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Update Image">
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="box box-outline-primary">
                    <div class="box-header with-border">
                        <h5>Update Multi Images <span class="text-danger">*</span></h5>
                    </div>
                    <form method="POST" action="{{ route('update.product.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            @foreach($multiImages as $image)
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ asset($image->img_name) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('product.multiImage.delete',$image->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </h5>
                                        <p class="card-text">
                                        <div class="form-group">
                                            <lable class="form-control-lable">
                                                Change Images
                                                <span class="tx-danger">*</span>
                                            </lable>
                                            <input type="file" class="form-control" name="img_name[{{ $image->id }}]">
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Update Image">
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

</div>
<!-- ===================== Select sub-sub-categories on select change -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{  url('/sub-subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="sub_subcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

        $('select[name="subcategory_id"]').on('change', function() {
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    url: "{{  url('/products/sub/subcategory/ajax') }}/" + subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="sub_subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="sub_subcategory_id"]').append('<option value="' + value.id + '">' + value.sub_subcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
<!-- ========== Preview Image -->
<script type="text/javascript">
    function mainImageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainImg').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!-- ======= Preview multi Images -->
<script>
    $(document).ready(function() {
        $('#multiImage').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                    .height(80); //create image element 
                                $('#showMultiImg').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>
@endsection