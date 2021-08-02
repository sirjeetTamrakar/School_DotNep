<div class="modal fade edu-add-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add Committee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.committee.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="Title"/>
                    </div>

                    <div class="form-group">
                        <label>Degination</label>
                        <input type="text" name="degination" class="form-control" required placeholder="Degination"/>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Image"/>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="">Select Status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Show in Front</label>
                        <select class="form-control" name="show_in_front">
                            <option value="">Select Show Type</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Messaage</label>
                        <textarea class="form-control" name="message">

                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Save</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->