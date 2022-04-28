@extends('admin.admin_master')
@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Sub SubCategory Info</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('update.subsubcategory',$subsubcategory->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $subsubcategory->id }}">
                            <div class="form-group">
                                <h5>Select Category<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Your Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subsubcategory->category_id ? 'selected' : ''}}>{{$category->category_name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Select SubCategory<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Your Category</option>
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $subsubcategory->subcategory_id ? 'selected' : ''}}>{{$subcategory->subcategory_name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>SubSubCategory Name EN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategory->sub_subcategory_name_en }}" required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                            @error('subsubcategory_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>SubSubCategory Name Lith<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_lith" value="{{ $subsubcategory->sub_subcategory_name_lith }}" class="form-control" required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                            @error('subsubcategory_name_lith')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                    </div>
                                </div>
                            </div>
                        </form>
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
@endsection