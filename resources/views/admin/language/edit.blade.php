
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Language</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.language.update') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <input type="hidden" name="language_id" value="{{ $language->id }}" />
                    <div class="form-group">
                        <label>English</label>
                        <input type="text" name="english_name" value="{{ $language->english_name }}" class="form-control" required placeholder="English Title"/>
                    </div>
                    <div class="form-group">
                        <label>Nepali</label>
                        <input type="text" name="nepali_name" value="{{ $language->nepali_name }}" class="form-control" required placeholder="Nepali Title"/>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
