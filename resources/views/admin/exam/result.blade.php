
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0">{{ getLanguage('result') }} : {{ getLanguage('date') }} "{{ $exam->start_date }}" | {{ getLanguage('class') }} {{ $grade->title }}  {{ $exam->title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="" action="{{ route('admin.exam.result.update') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <input type="hidden" name="exam_id" value="{{ $exam->id }}" />
                <input type="hidden" name="grade_id" value="{{ $grade->id }}" />
                <div class="form-group">
                    <label>{{ getLanguage('file') }}</label>
                    <input type="file" name="file" value="" class="form-control" placeholder="File"/>
                    @if(isset($result->file))
                        <a target="_blank" href="{{ asset($result->file) }}">View File</a>
                        @endif
                </div>



                <div class="form-group">
                    <label>{{ getLanguage('remarks') }}</label>
                    <textarea class="form-control" name="remarks">@if(isset($result->remarks)){{ $result->remarks }} @endif</textarea>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
