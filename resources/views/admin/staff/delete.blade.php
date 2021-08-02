<div class="modal fade" id="delete_content{{$content->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.staff.delete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ getLanguage('staff').' ' .getLanguage('delete').' ?' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ getLanguage('delete-msg') }}</p>
                    <p>{{ getLanguage('staff-del-warning') }}</p>
                    <input type="hidden" name="staff_id" value="{{ $content->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>