<div class="modal fade edu-add-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add Asset Caregory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.asset.category.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="Title"/>
                    </div>

                    <div class="form-group">
                        <label>Remarks</label>
                        <textarea class="form-control" name="remarks">

                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Save</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->