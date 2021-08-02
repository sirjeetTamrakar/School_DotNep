
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Committee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.committee.update') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <input type="hidden" name="committee_id" value="{{ $committee->id }}" />
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{ $committee->name }}" class="form-control" required placeholder="Title"/>
                    </div>

                    <div class="form-group">
                        <label>Degination</label>
                        <input type="text" name="degination" value="{{ $committee->degination }}" class="form-control" required placeholder="Degination"/>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Image"/>
                        @if($committee->image)
                            <img src="{{ asset('thumbnail/'.$committee->image) }}" style="width: 100px">
                            @endif
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option @if($committee->status == "Active") selected @endif value="Active">Active</option>
                            <option @if($committee->status == "Inactive") selected @endif value="Inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Show in Front</label>
                        <select class="form-control" name="show_in_front">
                            <option value="">Select Show Type</option>
                            <option @if($committee->show_in_front == "1") selected @endif value="1">Yes</option>
                            <option @if($committee->show_in_front == "0") selected @endif value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Messaage</label>
                        <textarea class="form-control" name="message">{{ $committee->message }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
