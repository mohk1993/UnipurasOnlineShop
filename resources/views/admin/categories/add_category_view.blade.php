<!-- =============================== Modals ======================================== -->
<!-- Modal add-->
<div class="modal center-modal fade" id="modal-add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <a type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form method="POST" action="{{ route('add.category') }}">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h5>Category Name EN<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_en" class="form-control" required="" data-validation-required-message="This field is required">
                                    <div class="help-block"></div>
                                    @error('category_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Category Name Lith<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_lith" class="form-control" required="" data-validation-required-message="This field is required">
                                    <div class="help-block"></div>
                                    @error('category_name_lith')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <a type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn btn-rounded btn-primary float-right" value="Save Changes">
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal add -->