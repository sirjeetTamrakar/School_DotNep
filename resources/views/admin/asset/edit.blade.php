<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0">Edit Asset  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="" action="{{ route('admin.asset.update') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <input type="hidden" value="{{ $asset->id }}" name="asset_id">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" value="{{ $asset->title }}" name="title" class="form-control" required placeholder="Title"/>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" value="{{ $asset->quantity }}" name="quantity" class="form-control"  placeholder="Quantity"/>
                </div>

                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control" name="remarks">
                    {{$asset->remarks}}
                        </textarea>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->