<div class="modal fade edu-add-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.testimonial.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="Full Name"/>
                    </div>

                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control" required placeholder="Designation"/>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Image"/>
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea name="comment" class="form-control" required placeholder="Comment"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Save</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->