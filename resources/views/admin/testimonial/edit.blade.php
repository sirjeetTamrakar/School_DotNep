
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.testimonial.update') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <input type="hidden" name="testimonial_id" value="{{ $testimonial->id }}" />
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $testimonial->name }}" class="form-control" required placeholder="Full Name" />
                    </div>

                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" value="{{ $testimonial->designation }}" name="designation" required class="form-control" placeholder="Link"/>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Image"/>
                        @if($testimonial->image)
                            <img src="{{ asset('thumbnail/'.$testimonial->image) }}" style="width: 100px;">
                            @endif
                    </div>

                    <div class="form-group">
                        <label>Comment</label>
                        <textarea name="comment" class="form-control" required placeholder="Comment">{{ $testimonial->comment }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="Active" @if($testimonial->status == "Active") selected @endif >Active</option>
                            <option value="Inactive" @if($testimonial->status == "Inactive") selected @endif >Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
