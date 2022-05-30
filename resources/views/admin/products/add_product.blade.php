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
                        <form method="POST" action="{{route('add.product')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control" required="" data-validation-required-message="This field is required">
                                                <option value="" selected="" disabled="">Select Your Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{$category->category_name_en}}</option>
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

                                            </select>
                                        </div>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Sub-SubCategory Select</h5>
                                        <div class="controls">
                                            <select name="sub_subcategory_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Your Sub-SubCategory</option>

                                            </select>
                                        </div>
                                        @error('sub_subcategory_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Product Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_en" class="form-control" required data-validation-required-message="This field is required">
                                            @error('product_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Product Name Lith <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_lith" class="form-control" required data-validation-required-message="This field is required">
                                            @error('product_name_lith')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_code" class="form-control" required data-validation-required-message="This field is required">
                                            @error('product_code')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Product Model En</h5>
                                        <div class="controls">
                                            <input type="text" name="product_model_en" class="form-control">
                                            @error('product_model_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Product Model Lith</h5>
                                        <div class="controls">
                                            <input type="text" name="product_model_lith" class="form-control">
                                            @error('product_model_lith')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Product Qty <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_qty" class="form-control" required data-validation-required-message="This field is required">
                                            @error('product_qty')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Product Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_price" class="form-control" required data-validation-required-message="This field is required">
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
                                                    <input type="text" name="matirial_type_en" class="form-control">
                                                    @error('matirial_type_en')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Matirial Type Lith</h5>
                                                <div class="controls">
                                                    <input type="text" name="matirial_type_lith" class="form-control">
                                                    @error('matirial_type_lith')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <h5>Product Height</h5>
                                                <div class="controls">
                                                    <input type="text" name="height" class="form-control">
                                                    @error('height')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Inner Diameter</h5>
                                                <div class="controls">
                                                    <input type="text" name="diameter_inner" class="form-control">
                                                    @error('diameter_inner')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Outer Diameter</h5>
                                                <div class="controls">
                                                    <input type="text" name="diameter_outer" class="form-control">
                                                    @error('diameter_outer')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div> -->
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Matirial Thickness <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="thickness" class="form-control" required data-validation-required-message="This field is required">
                                                    @error('thickness')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Length</h5>
                                                <div class="controls">
                                                    <input type="text" name="length" class="form-control">
                                                    @error('length')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Radius</h5>
                                                <div class="controls">
                                                    <input type="text" name="radius" class="form-control">
                                                    @error('radius')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Width</h5>
                                                <div class="controls">
                                                    <input type="text" name="width" class="form-control">
                                                    @error('width')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="product_thambnail" class="form-control" required onchange="mainImageUrl(this)">
                                                    @error('product_thambnail')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Product Multi-Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="img_name[]" class="form-control" multiple id="multiImage" required>
                                                    @error('img_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 offset-md-2">
                                            <img src="" id="mainImg">
                                            <div class="row" id="showMultiImg"></div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Short Discription En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="product_short_dic_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                            @error('product_short_dic_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Short Discription Lith <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="product_short_dic_lith" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                            @error('product_short_dic_lith')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Long Discription En </h5>
                                        <div class="controls">
                                            <textarea id="editor1" name="product_long_dic_en" rows="10" cols="80">
												
						                    </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Long Discription Lith </h5>
                                        <div class="controls">
                                            <textarea id="editor2" name="product_long_dic_lith" rows="10" cols="80">
												
						                    </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Add Products">
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