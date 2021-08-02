<div class="modal fade" id="view_content{{$content->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">File Title : {{$content->title}}t</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Status</strong>
                        </div>
                        <div class="col-md-6">
                            <strong>{{ $content->status == 1 ? "Active" : "Inactive" }}</strong>
                        </div>
                    </div>
                    <hr><hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>File Attachment:</strong>
                        </div>
                        <div class="col-md-6">
                            @if(isset($content->file))
                            <a href="{{ asset($content->file) }}" target="_blank">
                                <img src="{{ asset('admin/img/document_logo.png')}}" style="height: 100px; width: auto" alt="Event Thumbnail">
                            </a>
                            @else
                                <span>No Attachment for this File available.</span>
                            @endif
                        </div>
                    </div>
                    <hr><hr>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Content:</strong>
                        </div>
                        <div class="col-md-10">
                            <p>{!! $content->description !!}</p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>