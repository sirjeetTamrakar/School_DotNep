<div class="modal fade" id="add_content{{$content->id}}{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.staffbygrade.add') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Staff Association In Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>{{ getLanguage('grade') }}</label>
                        <select name="grade_id" class="form-control" required>
                            <option value="{{$content->id}}" selected>{{$content->title}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ getLanguage('subject') }}</label>
                        <select name="subject_id" class="form-control" required>
                            <option value="{{$subject->id}}" selected>{{$subject->title}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ getLanguage('staff') }}</label>
                        <br>
                        <select class="form-control js-example-basic-multiple" name="staff_id[]" multiple="multiple">
                            <option value="" disabled>Select Teachers</option>
                            @foreach($staffs as $staff)
                                <option value="{{$staff->id}}">{{$staff->name}}</option>
                            @endforeach
                        </select>
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