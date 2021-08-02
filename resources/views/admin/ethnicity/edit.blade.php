
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">{{ getLanguage('ethnicity').' '.getLanguage('edit') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.ethnicity.update') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <input type="hidden" name="ethnicity_id" value="{{ $ethnicity->id }}" />
                    <div class="form-group">
                        <label>{{ getLanguage('ethnicity').' '.getLanguage('title') }}</label>
                        <input type="text" name="title" value="{{ $ethnicity->title }}" class="form-control" required placeholder="Title"/>
                    </div>

                    <div class="form-group">
                        <label>{{ getLanguage('remarks') }}</label>
                        <textarea class="form-control" name="remarks">{{ $ethnicity->remarks }} </textarea>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
