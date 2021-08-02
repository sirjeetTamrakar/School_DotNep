<div class="modal fade edu-add-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">{{ getLanguage('add-new').' '.getLanguage('exam') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.exam.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                    <div class="form-group">
                        <label>{{ getLanguage('exam').' '.getLanguage('title') }}</label>
                        <input type="text" name="title" class="form-control" required placeholder="Title"/>
                    </div>

                    <div class="form-group">
                        <label>{{ getLanguage('exam-start-date') }}</label>
                        <input type="text" class="form-control nepali-calendar" name="start_date" id="start_date"  required />
                    </div>

                    <div class="form-group">
                        <label>{{ getLanguage('grade').' '.getLanguage('select') }}</label>
                        <select class="form-control js-example-basic-multiple" name="grade_id[]" multiple="multiple">
                            <option value="" disabled>{{ getLanguage('grade').' '.getLanguage('select') }}</option>
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->subtitle}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>{{ getLanguage('remarks') }}</label>
                        <textarea class="form-control" name="remarks">

                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Save</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
