<!-- =============================== Modals ======================================== -->
<!-- Modal add-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="modal center-modal fade" id="modal-add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Sub SubCategory</h5>
                <a type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form method="POST" action="{{ route('add.subsubcategory') }}">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h5>Select Category<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Your Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{$category->category_name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Select SubCategory<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Your SubCategory</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Sub SubCategory Name EN<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_name_en" class="form-control" required="" data-validation-required-message="This field is required">
                                    <div class="help-block"></div>
                                    @error('subsubcategory_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Sub SubCategory Name Lith<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_name_lith" class="form-control" required="" data-validation-required-message="This field is required">
                                    <div class="help-block"></div>
                                    @error('subsubcategory_name_lith')
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
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/sub-subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
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
