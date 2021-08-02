
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Asset Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.asset.category.update') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <input type="hidden" name="asset_category_id" value="{{ $category->id }}" />
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $category->title }}" class="form-control" required placeholder="Title"/>
                    </div>

                    <div class="form-group">
                        <label>Remarks</label>
                        <textarea class="form-control" name="remarks">{{ $category->remarks }} </textarea>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
