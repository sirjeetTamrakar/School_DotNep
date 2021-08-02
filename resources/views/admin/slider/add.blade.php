<div class="modal fade edu-add-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">{{ getLanguage('slider') }} {{ getLanguage('add-new') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Slider {{ getLanguage('title') }}</label>
                        <input type="text" name="title" class="form-control" required placeholder="Slider {{ getLanguage('title') }}"/>
                    </div>

                    <div class="form-group">


                        <span>Slider {{ getLanguage('image') }}</span>


                        <input type="file" name="image" class="form-control" required placeholder="Slider {{ getLanguage('image') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Slider {{ getLanguage('status') }}</label>
                        <select class="form-control" name="status">
                            <option value="">{{ getLanguage('status') }} {{ getLanguage('select') }}</option>
                            <option value="Active">{{ getLanguage('active') }}</option>
                            <option value="Inactive">{{ getLanguage('inactive') }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Slider {{ getLanguage('link') }}</label>
                        <input type="text" name="link" class="form-control" placeholder="Slider {{ getLanguage('link') }}"/>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Save</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
