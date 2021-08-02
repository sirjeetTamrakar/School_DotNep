<div class="modal fade" id="add_content" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.subject.add') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Class</label>
                        <select name="grade_id" id="grade" class="form-control" required>
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{ $grade->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="remarks">Remarks:</label>
                        <textarea  name="remarks" id="remarks" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>