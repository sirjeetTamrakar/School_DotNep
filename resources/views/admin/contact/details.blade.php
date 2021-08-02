{{--<div class="modal fade" id="view_content{{$content->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">{{ getLanguage('message') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ getLanguage('name') }}</strong>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ $content->name }}</strong>
                        </div>
                    </div>
                    <hr><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ getLanguage('email') }}</strong>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ $content->email }}</strong>
                        </div>
                    </div>
                    <hr><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ getLanguage('phone') }}</strong>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ $content->phone }}</strong>
                        </div>
                    </div>
                    <hr><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ getLanguage('subject') }}</strong>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ $content->subject }}</strong>
                        </div>
                    </div>
                    <hr><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>{{ getLanguage('message') }}</strong>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ $content->message }}</strong>
                        </div>
                    </div>
                    <hr><hr>

                    <div class="row">
                        <div class="col-md-2">
                            <strong>Content:</strong>
                        </div>
                        <div class="col-md-10">
                            <p>{!! $content->message !!}</p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
{{--</div>--}}