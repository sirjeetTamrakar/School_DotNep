<div class="modal fade edu-add-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add Language</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" id="languageForm" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                    <div class="form-group">
                        <label>English</label>
                        <input type="text" name="english_name" class="form-control" required placeholder="English Title"/>
                    </div>
                    <div class="form-group">
                        <label>Nepali</label>
                        <input type="text" name="nepali_name" class="form-control" placeholder="Nepali Title"/>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Save</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->