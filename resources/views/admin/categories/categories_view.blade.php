@extends('admin.admin_master')
@section('admin')

<div class="content-header">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Our Categories</h3>
                <div class="d-md-flex justify-content-md-end">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Add Cateory</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category Name En</th>
                                <th>Category Name Lith</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->category_name_en}}</td>
                                <td>{{ $category->category_name_lith}}</td>
                                <td class="d-md-flex justify-content-center">
                                    <a href="{{ route('view.update.category',$category->id) }}" class="btn btn-info" title="Update Data" style="margin-right: 10px;"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('delete.category',$category->id) }}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
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
@include('admin.categories.add_category_view')
@endsection