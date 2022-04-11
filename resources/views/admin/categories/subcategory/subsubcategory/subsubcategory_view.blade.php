@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-header">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Our Sub-SUbCategories</h3>
                <div class="d-md-flex justify-content-md-end">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Add Sub-SubCateory</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>SubCategory</th>
                                <th>Sub-SubCategory Name En</th>
                                <th>Sub-SubCategory Name Lith</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subsubcategory as $subcat)
                            <tr>
                                <td>{{ $subcat['category']['category_name_en']}}</td>
                                <td>{{ $subcat['subcategory']['subcategory_name_en']}}</td>
                                <td>{{ $subcat->subsubcategory_name_en}}</td>
                                <td>{{ $subcat->subsubcategory_name_lith}}</td>
                                <td class="d-md-flex justify-content-center">
                                    <a href="{{ route('view.update.subsubcategory',$subcat->id) }}" class="btn btn-info" title="Update Data" style="margin-right: 10px;"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('delete.subsubcategory',$subcat->id) }}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@include('admin.categories.subcategory.subsubcategory.add_subsubcategory_view')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/sub-subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(date) {
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' +
                                value.subcategory_name_en + '</Option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection