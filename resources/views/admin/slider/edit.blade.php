
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">{{ getLanguage('slider') }} {{getLanguage('edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.slider.update') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <input type="hidden" name="slider_id" value="{{ $slider->id }}" />
                    <div class="form-group">
                        <label>Slider {{ getLanguage('title') }}</label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control" required placeholder="{{ getLanguage('title') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Slider {{ getLanguage('image') }}</label>
                        <input type="file" name="image" class="form-control" required placeholder="{{ getLanguage('image') }}"/>
                        <br>
                        @if($slider->image)
                            <img src="{{ asset($slider->image) }}" height="100px" width="200px" style="width: 100px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label> Slider {{ getLanguage('status') }}</label>
                        <select class="form-control" name="status">
                            <option value="">{{ getLanguage('status') }} {{ getLanguage('select') }}</option>
                            <option value="Active" @if($slider->status == "Active") selected @endif >{{ getLanguage('active') }}</option>
                            <option value="Inactive" @if($slider->status == "Inactive") selected @endif >{{ getLanguage('inactive') }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Slider {{ getLanguage('link') }}</label>
                        <input type="text" value="{{ $slider->link }}" name="link" class="form-control" placeholder="{{ getLanguage('link') }}"/>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
